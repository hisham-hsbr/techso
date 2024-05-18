<?php

namespace App\Http\Controllers\Techso;

use App\Models\Techso\ProductAttributeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class ProductAttributeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('permission:ProductAttributeType Read', ['only' => ['index']]);
        // $this->middleware('permission:ProductAttributeType Create', ['only' => ['create','store']]);
        // $this->middleware('permission:ProductAttributeType Edit', ['only' => ['Edit','Update']]);
        // $this->middleware('permission:ProductAttributeType Delete', ['only' => ['destroy']]);

    }

    public function index()
    {
        $product_attribute_types = ProductAttributeType::all();
        $createdByUsers = $product_attribute_types->sortBy('createdBy')->pluck('createdBy')->unique();
        $updatedByUsers = $product_attribute_types->sortBy('updatedBy')->pluck('updatedBy')->unique();
        return view('folder.product_attribute_types.index', compact('product_attribute_types', 'createdByUsers', 'updatedByUsers'))->with('i');
    }

    public function productAttributeTypesGet()
    {

        $product_attribute_types = ProductAttributeType::all();
        return Datatables::of($product_attribute_types)

            ->setRowId(function ($productAttributeType) {
                return $productAttributeType->id;
            })

            ->editColumn('status', function (ProductAttributeType $productAttributeType) {

                $active = '<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive = '<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($productAttributeType->status);

                if ($activeId == 1) {
                    $activeId = $active;
                } else {
                    $activeId = $inActive;
                }
                return $activeId;
            })


            ->editColumn('created_by', function (ProductAttributeType $productAttributeType) {

                return ucwords($productAttributeType->CreatedBy->name);
            })


            ->editColumn('updated_by', function (ProductAttributeType $productAttributeType) {

                return ucwords($productAttributeType->UpdatedBy->name);
            })
            ->addColumn('created_at', function (ProductAttributeType $productAttributeType) {
                return $productAttributeType->created_at->format('d-M-Y h:m');
            })
            ->addColumn('updated_at', function (ProductAttributeType $productAttributeType) {

                return $productAttributeType->updated_at->format('d-M-Y h:m');
            })

            ->addColumn('editLink', function (ProductAttributeType $productAttributeType) {

                $editLink = '<a href="' . route('ProductAttributeTypes.edit', $productAttributeType->id) . '" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
                return $editLink;
            })
            ->addColumn('deleteLink', function (ProductAttributeType $productAttributeType) {
                $CSRFToken = "csrf_field()";
                $deleteLink = '
                        <button class="btn btn-link delete-productAttributeType" data-productAttributeType_id="' . $productAttributeType->id . '" type="submit"><i
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
        return view('folder.productAttributeTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:productAttributeTypes,code',
            'name' => 'required',
        ]);
        $productAttributeType = new ProductAttributeType();


        $productAttributeType->code  = $request->code;
        $productAttributeType->name = $request->name;


        if ($request->status == 0) {
            $productAttributeType->status == 0;
        }

        $productAttributeType->status = $request->status;

        $productAttributeType->created_by = Auth::user()->id;
        $productAttributeType->updated_by = Auth::user()->id;

        $productAttributeType->save();

        return redirect()->route('productAttributeTypes.index')
            ->with('message_store', 'ProductAttributeType Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductAttributeType $productAttributeType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product_attribute_types = ProductAttributeType::find($id);
        return view('folder.productAttributeTypes.edit', compact('productAttributeTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => "required|unique:productAttributeTypes,code,$id",
        ]);
        $productAttributeType = ProductAttributeType::find($id);


        $productAttributeType->code  = $request->code;
        $productAttributeType->name = $request->name;


        if ($request->status == 0) {
            $productAttributeType->status == 0;
        }

        $productAttributeType->status = $request->status;

        $productAttributeType->updated_by = Auth::user()->id;

        $productAttributeType->save();

        return redirect()->route('productAttributeTypes.index')
            ->with('message_store', 'ProductAttributeType Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $productAttributeType  = ProductAttributeType::findOrFail($id);
        $productAttributeType->delete();

        return redirect()->route('productAttributeTypes.index')->with('message_update', 'ProductAttributeType Deleted Successfully');
    }
}
