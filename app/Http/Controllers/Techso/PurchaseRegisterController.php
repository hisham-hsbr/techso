<?php

namespace App\Http\Controllers\Techso;

use Illuminate\Http\Request;
use App\Models\Techso\Account;
use App\Models\Techso\Product;
use Yajra\Datatables\Datatables;
use App\Models\Techso\SecondSale;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Techso\ProductAttribute;
use App\Models\Techso\PurchaseRegister;
use App\Models\Techso\ProductAttributeType;
use App\Models\Techso\VoucherType;
use Carbon\Carbon;

class PurchaseRegisterController extends Controller
{
    private $head_name = 'Purchase';
    private $route_name = 'purchase-registers';
    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('permission:PurchaseRegister Read', ['only' => ['index']]);
        // $this->middleware('permission:PurchaseRegister Create', ['only' => ['create','store']]);
        // $this->middleware('permission:PurchaseRegister Edit', ['only' => ['Edit','Update']]);
        // $this->middleware('permission:PurchaseRegister Delete', ['only' => ['destroy']]);

    }

    public function index()
    {
        $purchase_registers = PurchaseRegister::all();
        $createdByUsers = $purchase_registers->sortBy('createdBy')->pluck('createdBy')->unique();
        $updatedByUsers = $purchase_registers->sortBy('updatedBy')->pluck('updatedBy')->unique();

        return view('back_end.techso.purchase_registers.index')->with(
            [
                'head_name' => $this->head_name,
                'route_name' => $this->route_name,
                'purchase_registers' => $purchase_registers,
                'createdByUsers' => $createdByUsers,
                'updatedByUsers' => $updatedByUsers,
            ]
        );
    }

    public function purchaseRegistersGet()
    {

        $purchase_registers = PurchaseRegister::all();
        return Datatables::of($purchase_registers)

            ->setRowId(function ($purchase_register) {
                return $purchase_register->id;
            })

            ->editColumn('status', function (PurchaseRegister $purchase_register) {

                $active = '<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive = '<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($purchase_register->status);

                if ($activeId == 1) {
                    $activeId = $active;
                } else {
                    $activeId = $inActive;
                }
                return $activeId;
            })


            ->editColumn('created_by', function (PurchaseRegister $purchase_register) {

                return ucwords($purchase_register->CreatedBy->name);
            })


            ->editColumn('updated_by', function (PurchaseRegister $purchase_register) {

                return ucwords($purchase_register->UpdatedBy->name);
            })
            ->addColumn('created_at', function (PurchaseRegister $purchase_register) {
                return $purchase_register->created_at->format('d-M-Y h:m');
            })
            ->addColumn('updated_at', function (PurchaseRegister $purchase_register) {

                return $purchase_register->updated_at->format('d-M-Y h:m');
            })

            ->editColumn('date', function (PurchaseRegister $purchase_register) {

                if (is_string($purchase_register->date)) {
                    $date = Carbon::parse($purchase_register->date);
                } else {
                    // If $purchase_register->date is already a DateTime object, use it directly
                    $date = $purchase_register->date;
                }
                return $date->format('d-M-Y');
            })
            ->addColumn('purchaseNumber', function (PurchaseRegister $purchase_register) {
                return "TSS-" . $purchase_register->purchase_number;
            })

            ->editColumn('supplierName', function (PurchaseRegister $purchase_register) {

                return ucwords($purchase_register->supplier->name);
            })

            ->addColumn('editLink', function (PurchaseRegister $purchase_register) {

                $editLink = '<a href="' . route('purchase-registers.edit', $purchase_register->id) . '" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
                return $editLink;
            })
            ->addColumn('deleteLink', function (PurchaseRegister $purchase_register) {
                $CSRFToken = "csrf_field()";
                $deleteLink = '
                        <button class="btn btn-link delete-purchaseRegister" data-purchaseRegister_id="' . $purchase_register->id . '" type="submit"><i
                                class="fa-solid fa-trash-can text-danger"></i>
                        </button>';
                return $deleteLink;
            })

            ->addColumn('action', function (PurchaseRegister $purchase_register) {
                $CSRFToken = "csrf_field()";
                $action =
                    '
                        <a href="' . route('purchase-registers.show', $purchase_register->id) . '" class="ml-2"><i class="fa-solid fa fa-eye text-success"></i></a>
                        <a href="' . route('purchase-registers.pdf', $purchase_register->id) . '" class="ml-2"><i class="fa-solid fa-file-pdf"></i></a>
                        <a href="' . route('purchase-registers.edit', $purchase_register->id) . '" class="ml-2"><i class="fa-solid fa-edit text-warning"></i></a>
                        <button class="btn btn-link delete-service" data-service_id="' . $purchase_register->id . '" type="submit"><i
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
        $accounts = Account::where('parent_id', 17)->get();
        $voucher_types = VoucherType::where('status', 1)
            ->where('name', 'Purchase Invoice')
            ->get();

        $types = ProductAttributeType::where('status', 1)->get();
        $product_attributes = ProductAttribute::where('status', 1)->get()
            ->where('product_attribute_type_id', '<>', '1')
            ->groupBy('product_attribute_type_id');


        $product_price_lists = ProductAttribute::where('status', 1)->get()
            ->where('product_attribute_type_id', '1')
            ->groupBy('product_attribute_type_id');
        $list_number = PurchaseRegister::max('purchase_number') + 1;
        return view('back_end.techso.purchase_registers.create')->with(
            [
                'head_name' => $this->head_name,
                'route_name' => $this->route_name,
                'products' => $products,
                'accounts' => $accounts,
                'voucher_types' => $voucher_types,
                'product_attributes' => $product_attributes,
                'types' => $types,
                'product_price_lists' => $product_price_lists,
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
            // 'code' => 'required|unique:purchaseRegisters,code',
            // 'name' => 'required',
        ]);
        $purchase_register = new PurchaseRegister();




        $purchase_number = $request->purchase_number;

        $purchase_number_trim = substr($purchase_number, 4);


        $purchase_register->date = $request->date;
        $purchase_register->purchase_number = $purchase_number_trim;
        $purchase_register->voucher_type_id = $request->voucher_type_id;
        $purchase_register->account_id = $request->account_id;
        $purchase_register->supplier_invoice = $request->supplier_invoice;
        $purchase_register->voucher_narration = $request->voucher_narration;
        $purchase_register->voucher_remarks = $request->voucher_remarks;
        $purchase_register->voucher_description = $request->voucher_description;


        if ($request->status == 0) {
            $purchase_register->status == 0;
        }

        $purchase_register->status = $request->status;

        $purchase_register->created_by = Auth::user()->id;
        $purchase_register->updated_by = Auth::user()->id;

        $purchase_register->save();

        //product_transactions
        $purchase_register_id = $purchase_register->id;
        $date = $request->date;
        $document_number = $request->purchase_number;
        $voucher_type_id = $request->voucher_type_id;
        $account_id = $request->account_id;
        $supplier_invoice = $request->supplier_invoice;
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $price = $request->price;
        $line_description = $request->line_description;

        for ($i = 0; $i < count((is_countable($product_id) ? $product_id : [])); $i++) {
            $data_save_product_transaction = [
                'purchase_register_id' => $purchase_register_id,
                'date' => $date,
                'document_number' => $document_number,
                'voucher_type_id' => $voucher_type_id,
                'account_id' => $account_id,
                'supplier_invoice' => $supplier_invoice,
                'product_id' => $product_id[$i],
                'received_quantity' => $quantity[$i],
                'received_price' => $price[$i],
                'document_line_description' => $line_description[$i],
            ];
            DB::table('product_transactions')->insert($data_save_product_transaction);
        }


        return redirect()->route('purchase-registers.index')
            ->with('message_store', 'PurchaseRegister Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(PurchaseRegister $purchase_register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $purchase_registers = PurchaseRegister::find($id);
        return view('folder.purchase-registers.edit', compact('purchaseRegisters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => "required|unique:purchaseRegisters,code,$id",
        ]);
        $purchase_register = PurchaseRegister::find($id);


        $purchase_register->code  = $request->code;
        $purchase_register->name = $request->name;


        if ($request->status == 0) {
            $purchase_register->status == 0;
        }

        $purchase_register->status = $request->status;

        $purchase_register->updated_by = Auth::user()->id;

        $purchase_register->save();

        return redirect()->route('purchase-registers.index')
            ->with('message_store', 'PurchaseRegister Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $purchase_register  = PurchaseRegister::findOrFail($id);
        $purchase_register->delete();

        return redirect()->route('purchase-registers.index')->with('message_update', 'PurchaseRegister Deleted Successfully');
    }
}
