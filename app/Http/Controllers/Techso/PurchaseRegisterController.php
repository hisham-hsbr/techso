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

class PurchaseRegisterController extends Controller
{
    private $head_name = 'Purchase';
    private $route_name = 'purchases';
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
    }

    public function purchaseRegistersGet()
    {

        $purchaseRegisters = PurchaseRegister::all();
        return Datatables::of($purchaseRegisters)

            ->setRowId(function ($purchaseRegister) {
                return $purchaseRegister->id;
            })

            ->editColumn('status', function (PurchaseRegister $purchaseRegister) {

                $active = '<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive = '<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($purchaseRegister->status);

                if ($activeId == 1) {
                    $activeId = $active;
                } else {
                    $activeId = $inActive;
                }
                return $activeId;
            })


            ->editColumn('created_by', function (PurchaseRegister $purchaseRegister) {

                return ucwords($purchaseRegister->CreatedBy->name);
            })


            ->editColumn('updated_by', function (PurchaseRegister $purchaseRegister) {

                return ucwords($purchaseRegister->UpdatedBy->name);
            })
            ->addColumn('created_at', function (PurchaseRegister $purchaseRegister) {
                return $purchaseRegister->created_at->format('d-M-Y h:m');
            })
            ->addColumn('updated_at', function (PurchaseRegister $purchaseRegister) {

                return $purchaseRegister->updated_at->format('d-M-Y h:m');
            })

            ->addColumn('editLink', function (PurchaseRegister $purchaseRegister) {

                $editLink = '<a href="' . route('PurchaseRegisters.edit', $purchaseRegister->id) . '" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
                return $editLink;
            })
            ->addColumn('deleteLink', function (PurchaseRegister $purchaseRegister) {
                $CSRFToken = "csrf_field()";
                $deleteLink = '
                        <button class="btn btn-link delete-purchaseRegister" data-purchaseRegister_id="' . $purchaseRegister->id . '" type="submit"><i
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
        $list_number = SecondSale::max('list_number') + 1;
        return view('back_end.techso.purchases.create')->with(
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
            'code' => 'required|unique:purchaseRegisters,code',
            'name' => 'required',
        ]);
        $purchaseRegister = new PurchaseRegister();


        $purchaseRegister->code  = $request->code;
        $purchaseRegister->name = $request->name;


        if ($request->status == 0) {
            $purchaseRegister->status == 0;
        }

        $purchaseRegister->status = $request->status;

        $purchaseRegister->created_by = Auth::user()->id;
        $purchaseRegister->updated_by = Auth::user()->id;

        $purchaseRegister->save();

        return redirect()->route('purchaseRegisters.index')
            ->with('message_store', 'PurchaseRegister Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(PurchaseRegister $purchaseRegister)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $purchaseRegisters = PurchaseRegister::find($id);
        return view('folder.purchaseRegisters.edit', compact('purchaseRegisters'));
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
        $purchaseRegister = PurchaseRegister::find($id);


        $purchaseRegister->code  = $request->code;
        $purchaseRegister->name = $request->name;


        if ($request->status == 0) {
            $purchaseRegister->status == 0;
        }

        $purchaseRegister->status = $request->status;

        $purchaseRegister->updated_by = Auth::user()->id;

        $purchaseRegister->save();

        return redirect()->route('purchaseRegisters.index')
            ->with('message_store', 'PurchaseRegister Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $purchaseRegister  = PurchaseRegister::findOrFail($id);
        $purchaseRegister->delete();

        return redirect()->route('purchaseRegisters.index')->with('message_update', 'PurchaseRegister Deleted Successfully');
    }
}
