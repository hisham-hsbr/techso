<?php

namespace App\Http\Controllers\Techso;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Techso\Product;
use App\Models\Techso\Inventory;
use Yajra\Datatables\Datatables;
use App\Models\Techso\VoucherType;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Techso\ProductTransaction;

class InventoryController extends Controller
{
    private $head_name = 'Products';
    private $route_name = 'products';
    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('permission:Inventory Read', ['only' => ['index']]);
        // $this->middleware('permission:Inventory Create', ['only' => ['create','store']]);
        // $this->middleware('permission:Inventory Edit', ['only' => ['Edit','Update']]);
        // $this->middleware('permission:Inventory Delete', ['only' => ['destroy']]);

    }

    public function stockLedger()
    {
        $products = Product::all();
        $voucher_types = VoucherType::all();

        return view('back_end.techso.inventories.stock_ledger')->with(
            [
                'head_name' => $this->head_name,
                'route_name' => $this->route_name,
                'products' => $products,
                'voucher_types' => $voucher_types,
            ]
        );
    }
    public function stockLedgerReport(Request $request)
    {

        $products = Product::where('id', $request->product_id)->first();

        // dd($voucher_type);

        $dateRange = $request->input('date_range');
        list($startDate, $endDate) = explode(' - ', $dateRange);
        $startDate = Carbon::parse($startDate);
        $endDate = Carbon::parse($endDate);
        $inventories = ProductTransaction::where('product_id', $request->product_id)
            ->whereBetween('date', [$startDate, $endDate])->get();

        if ($dateRange) {
            $inventories->whereBetween('date', [$startDate, $endDate]);
        }


        $voucher_types = $inventories->sortBy('voucherType')->pluck('voucherType')->unique();
        $document_numbers = $inventories->sortBy('document_number')->pluck('document_number')->unique();

        $balanceQuantity = 0;
        $balanceSum = 0;
        $averagePrice = 0;
        // dd($inventories);
        foreach ($inventories as $index => $inventory) {
            $balanceQuantity = ($balanceQuantity + $inventory->received_quantity) - $inventory->issued_quantity;

            if ($index == 0) {
                $averagePrice = ($inventory->received_price);
            } else {
                if ($inventory->received_price == 0) {
                    $averagePrice = ($averagePrice * 2) / 2;
                } else {

                    $averagePrice = ((($inventory->received_quantity * $inventory->received_price) + $balanceSum) / $balanceQuantity);
                }
            }
            $balanceSum = $balanceQuantity * $averagePrice;

            $inventory->index = $index + 1;
            $inventory->balanceQuantity = $balanceQuantity;
            $inventory->balanceSum = $balanceSum;
            $inventory->averagePrice = $averagePrice;
        }


        return view('back_end.techso.inventories.stock_ledger_report')->with(
            [
                'head_name' => $this->head_name,
                'route_name' => $this->route_name,
                'products' => $products,
                'dateRange' => $dateRange,
                'inventories' => $inventories,
                'voucher_types' => $voucher_types,
                'document_numbers' => $document_numbers,
            ]
        );
        // return view('back_end.techso.inventories.stock_ledger', compact('inventories', 'createdByUsers', 'updatedByUsers'))->with('i');
    }
    public function stockValuation()
    {

        $products = Product::with('transactions')->get();

        $products->each(function ($product) {
            $receivedQuantity = $product->transactions->sum('received_quantity');
            $issuedQuantity = $product->transactions->sum('issued_quantity');
            $currentStock = $receivedQuantity - $issuedQuantity;

            // Calculating the average price
            $totalReceivedCost = $product->transactions->sum(function ($transaction) {
                return $transaction->received_quantity * $transaction->received_price;
            });
            $totalReceivedQuantity = $product->transactions->sum('received_quantity');
            $averagePrice = $totalReceivedQuantity ? $totalReceivedCost / $totalReceivedQuantity : 0;

            $product->current_stock = $currentStock;
            $product->average_price = $averagePrice;

            // echo "Product ID: {$product->id}, Current Stock: {$product->current_stock}, Average Price: {$product->average_price}\n";
        });

        return view('back_end.techso.inventories.stock_valuation')->with(
            [
                'head_name' => $this->head_name,
                'route_name' => $this->route_name,
                'products' => $products,
                'i'
            ]
        );
        // return view('back_end.techso.inventories.stock_valuation', compact('products'))->with('i');
    }

    public function inventoriesGet()
    {

        $inventories = Inventory::all();
        return Datatables::of($inventories)

            ->setRowId(function ($inventory) {
                return $inventory->id;
            })

            ->editColumn('status', function (Inventory $inventory) {

                $active = '<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive = '<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($inventory->status);

                if ($activeId == 1) {
                    $activeId = $active;
                } else {
                    $activeId = $inActive;
                }
                return $activeId;
            })

            ->editColumn('product', function (Inventory $inventory) {

                return ucwords($inventory->product->name);
            })


            ->editColumn('created_by', function (Inventory $inventory) {

                return ucwords($inventory->CreatedBy->name);
            })


            ->editColumn('updated_by', function (Inventory $inventory) {

                return ucwords($inventory->UpdatedBy->name);
            })
            ->addColumn('created_at', function (Inventory $inventory) {
                return $inventory->created_at->format('d-M-Y h:m');
            })
            ->addColumn('updated_at', function (Inventory $inventory) {

                return $inventory->updated_at->format('d-M-Y h:m');
            })

            ->addColumn('editLink', function (Inventory $inventory) {

                $editLink = '<a href="' . route('Inventorys.edit', $inventory->id) . '" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
                return $editLink;
            })
            ->addColumn('deleteLink', function (Inventory $inventory) {
                $CSRFToken = "csrf_field()";
                $deleteLink = '
                        <button class="btn btn-link delete-inventory" data-inventory_id="' . $inventory->id . '" type="submit"><i
                                class="fa-solid fa-trash-can text-danger"></i>
                        </button>';
                return $deleteLink;
            })


            ->rawColumns(['status', 'editLink', 'deleteLink'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('folder.inventorys.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:inventorys,code',
            'name' => 'required',
        ]);
        $inventory = new Inventory();


        $inventory->code  = $request->code;
        $inventory->name = $request->name;


        if ($request->status == 0) {
            $inventory->status == 0;
        }

        $inventory->status = $request->status;

        $inventory->created_by = Auth::user()->id;
        $inventory->updated_by = Auth::user()->id;

        $inventory->save();

        return redirect()->route('inventorys.index')
            ->with('message_store', 'Inventory Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $inventories = Inventory::find($id);
        return view('folder.inventorys.edit', compact('inventorys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => "required|unique:inventorys,code,$id",
        ]);
        $inventory = Inventory::find($id);


        $inventory->code  = $request->code;
        $inventory->name = $request->name;


        if ($request->status == 0) {
            $inventory->status == 0;
        }

        $inventory->status = $request->status;

        $inventory->updated_by = Auth::user()->id;

        $inventory->save();

        return redirect()->route('inventorys.index')
            ->with('message_store', 'Inventory Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $inventory  = Inventory::findOrFail($id);
        $inventory->delete();

        return redirect()->route('inventorys.index')->with('message_update', 'Inventory Deleted Successfully');
    }
}
