<?php

namespace App\Http\Controllers\Techso;

use Illuminate\Http\Request;
use App\Models\Techso\Account;
use App\Models\Techso\Product;
use Yajra\Datatables\Datatables;
use App\Models\Techso\VoucherType;
use Illuminate\Support\Facades\DB;
use App\Models\Techso\SaleRegister;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class SaleRegisterController extends Controller
{

    private $head_name = 'Sales';
    private $route_name = 'sales-registers';

    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('permission:SaleRegister Read', ['only' => ['index']]);
        // $this->middleware('permission:SaleRegister Create', ['only' => ['create','store']]);
        // $this->middleware('permission:SaleRegister Edit', ['only' => ['Edit','Update']]);
        // $this->middleware('permission:SaleRegister Delete', ['only' => ['destroy']]);

    }

    public function index()
    {
        $sale_registers = SaleRegister::all();
        $createdByUsers = $sale_registers->sortBy('createdBy')->pluck('createdBy')->unique();
        $updatedByUsers = $sale_registers->sortBy('updatedBy')->pluck('updatedBy')->unique();

        return view('back_end.techso.sale_registers.index')->with(
            [
                'head_name' => $this->head_name,
                'route_name' => $this->route_name,
                'sale_registers' => $sale_registers,
                'createdByUsers' => $createdByUsers,
                'updatedByUsers' => $updatedByUsers,
            ]
        );
    }

    public function saleRegisterGet()
    {

        $sale_registers = SaleRegister::all();
        return Datatables::of($sale_registers)

            ->setRowId(function ($sale_register) {
                return $sale_register->id;
            })

            ->editColumn('status', function (SaleRegister $sale_register) {

                $active = '<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive = '<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($sale_register->status);

                if ($activeId == 1) {
                    $activeId = $active;
                } else {
                    $activeId = $inActive;
                }
                return $activeId;
            })


            ->editColumn('created_by', function (SaleRegister $sale_register) {

                return ucwords($sale_register->CreatedBy->name);
            })


            ->editColumn('updated_by', function (SaleRegister $sale_register) {

                return ucwords($sale_register->UpdatedBy->name);
            })
            ->addColumn('created_at', function (SaleRegister $sale_register) {
                return $sale_register->created_at->format('d-M-Y h:m');
            })
            ->addColumn('updated_at', function (SaleRegister $sale_register) {

                return $sale_register->updated_at->format('d-M-Y h:m');
            })

            ->editColumn('date', function (SaleRegister $sale_register) {

                if (is_string($sale_register->date)) {
                    $date = Carbon::parse($sale_register->date);
                } else {
                    // If $sale_register->date is already a DateTime object, use it directly
                    $date = $sale_register->date;
                }
                return $date->format('d-M-Y');
            })
            ->addColumn('saleNumber', function (SaleRegister $sale_register) {
                return "TSS-" . $sale_register->sale_number;
            })

            ->editColumn('customerName', function (SaleRegister $sale_register) {

                return ucwords($sale_register->customer->name);
            })

            ->addColumn('editLink', function (SaleRegister $sale_register) {

                $editLink = '<a href="' . route('purchase-registers.edit', $sale_register->id) . '" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
                return $editLink;
            })
            ->addColumn('deleteLink', function (SaleRegister $sale_register) {
                $CSRFToken = "csrf_field()";
                $deleteLink = '
                        <button class="btn btn-link delete-saleRegister" data-saleRegister_id="' . $sale_register->id . '" type="submit"><i
                                class="fa-solid fa-trash-can text-danger"></i>
                        </button>';
                return $deleteLink;
            })

            ->addColumn('action', function (SaleRegister $sale_register) {
                $CSRFToken = "csrf_field()";
                $action =
                    '
                        <a href="' . route('purchase-registers.show', $sale_register->id) . '" class="ml-2"><i class="fa-solid fa fa-eye text-success"></i></a>
                        <a href="' . route('purchase-registers.pdf', $sale_register->id) . '" class="ml-2"><i class="fa-solid fa-file-pdf"></i></a>
                        <a href="' . route('purchase-registers.edit', $sale_register->id) . '" class="ml-2"><i class="fa-solid fa-edit text-warning"></i></a>
                        <button class="btn btn-link delete-service" data-service_id="' . $sale_register->id . '" type="submit"><i
                                class="fa-solid fa-trash-can text-danger"></i>
                        </button>
                        ';
                return $action;
            })


            ->rawColumns(['status', 'editLink', 'deleteLink', 'action'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::where('status', 1)->get();
        $accounts = Account::where('parent_id', 9)->get();
        $voucher_types = VoucherType::where('status', 1)
            ->where('name', 'Sales Invoice')
            ->get();
        $list_number = SaleRegister::max('sale_number') + 1;
        $editDays = auth()->user()->settings['sale_edit_days'];



        // // Fetch products with their average cost
        // $products = Product::with('transactions')
        //     ->get()
        //     ->map(function ($product) {
        //         // Calculate average cost
        //         $totalQuantity = $product->transactions->sum('received_quantity');
        //         $totalCost = $product->transactions->sum(function ($transaction) {
        //             return $transaction->received_quantity * $transaction->received_price;
        //         });

        //         $averageCost = $totalQuantity > 0 ? $totalCost / $totalQuantity : 0;

        //         return [
        //             'id' => $product->id,
        //             'name' => $product->name,
        //             'average_cost' => $averageCost,
        //         ];
        //     });

        $products = Product::with('transactions')
            ->get()
            ->map(function ($product) {
                $totalReceived = $product->transactions->sum('received_quantity');
                $totalIssued = $product->transactions->sum('issued_quantity');
                $totalReceivedCost = $product->transactions->sum(function ($transaction) {
                    return $transaction->received_quantity * $transaction->received_price;
                });

                $averageCost = $totalReceived > 0 ? $totalReceivedCost / $totalReceived : 0;
                $totalBalance = $totalReceived - $totalIssued;

                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'average_cost' => $averageCost,
                    'total_balance' => $totalBalance,
                ];
            });


        return view('back_end.techso.sale_registers.create')->with(
            [
                'head_name' => $this->head_name,
                'route_name' => $this->route_name,
                'products' => $products,
                'accounts' => $accounts,
                'editDays' => $editDays,
                'voucher_types' => $voucher_types,
                'list_number' => $list_number,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            // 'code' => 'required|unique:saleRegisters,code',
            // 'name' => 'required',
        ]);
        $sale_register = new SaleRegister();




        $sale_number = $request->sale_number;

        $sale_number_trim = substr($sale_number, 4);


        $sale_register->date = $request->date;
        $sale_register->sale_number = $sale_number_trim;
        $sale_register->voucher_type_id = $request->voucher_type_id;
        $sale_register->account_id = $request->account_id;
        $sale_register->voucher_narration = $request->voucher_narration;
        $sale_register->voucher_remarks = $request->voucher_remarks;
        $sale_register->voucher_description = $request->voucher_description;


        if ($request->status == 0) {
            $sale_register->status == 0;
        }

        $sale_register->status = $request->status;

        $sale_register->created_by = Auth::user()->id;
        $sale_register->updated_by = Auth::user()->id;

        $sale_register->save();

        //product_transactions
        $sale_register_id = $sale_register->id;
        $date = $request->date;
        $document_number = $request->sale_number;
        $voucher_type_id = $request->voucher_type_id;
        $account_id = $request->account_id;
        $supplier_invoice = $request->supplier_invoice;
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $price = $request->price;
        $line_description = $request->line_description;

        for ($i = 0; $i < count((is_countable($product_id) ? $product_id : [])); $i++) {
            $data_save_product_transaction = [
                'sale_register_id' => $sale_register_id,
                'date' => $date,
                'document_number' => $document_number,
                'voucher_type_id' => $voucher_type_id,
                'account_id' => $account_id,
                'supplier_invoice' => $supplier_invoice,
                'product_id' => $product_id[$i],
                'issued_quantity' => $quantity[$i],
                'issued_price' => $price[$i],
                'document_line_description' => $line_description[$i],
            ];
            DB::table('product_transactions')->insert($data_save_product_transaction);
        }


        return redirect()->route('sales-registers.index')
            ->with('message_store', 'Sales Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(SaleRegister $saleRegister)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $saleRegisters = SaleRegister::find($id);
        return view('folder.saleRegisters.edit', compact('saleRegisters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => "required|unique:saleRegisters,code,$id",
        ]);
        $saleRegister = SaleRegister::find($id);


        $saleRegister->code  = $request->code;
        $saleRegister->name = $request->name;


        if ($request->status == 0) {
            $saleRegister->status == 0;
        }

        $saleRegister->status = $request->status;

        $saleRegister->updated_by = Auth::user()->id;

        $saleRegister->save();

        return redirect()->route('saleRegisters.index')
            ->with('message_store', 'SaleRegister Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $saleRegister  = SaleRegister::findOrFail($id);
        $saleRegister->delete();

        return redirect()->route('saleRegisters.index')->with('message_update', 'SaleRegister Deleted Successfully');
    }
}
