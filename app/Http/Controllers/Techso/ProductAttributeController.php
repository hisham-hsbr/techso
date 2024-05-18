<?php

namespace App\Http\Controllers\Techso;

use App\Models\Techso\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('permission:ProductAttribute Read', ['only' => ['index']]);
        // $this->middleware('permission:ProductAttribute Create', ['only' => ['create','store']]);
        // $this->middleware('permission:ProductAttribute Edit', ['only' => ['Edit','Update']]);
        // $this->middleware('permission:ProductAttribute Delete', ['only' => ['destroy']]);

    }

    public function index()
    {
        $product_attributes = ProductAttribute::all();
        $createdByUsers = $product_attributes->sortBy('createdBy')->pluck('createdBy')->unique();
        $updatedByUsers = $product_attributes->sortBy('updatedBy')->pluck('updatedBy')->unique();
        return view('folder.product_attributes.index', compact('product_attributes', 'createdByUsers', 'updatedByUsers'))->with('i');
    }

    public function productAttributesGet()
    {

        $productAttributes = ProductAttribute::all();
        return Datatables::of($productAttributes)

            ->setRowId(function ($productAttribute) {
                return $productAttribute->id;
            })

            ->editColumn('status', function (ProductAttribute $productAttribute) {

                $active = '<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive = '<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($productAttribute->status);

                if ($activeId == 1) {
                    $activeId = $active;
                } else {
                    $activeId = $inActive;
                }
                return $activeId;
            })


            ->editColumn('created_by', function (ProductAttribute $productAttribute) {

                return ucwords($productAttribute->CreatedBy->name);
            })


            ->editColumn('updated_by', function (ProductAttribute $productAttribute) {

                return ucwords($productAttribute->UpdatedBy->name);
            })
            ->addColumn('created_at', function (ProductAttribute $productAttribute) {
                return $productAttribute->created_at->format('d-M-Y h:m');
            })
            ->addColumn('updated_at', function (ProductAttribute $productAttribute) {

                return $productAttribute->updated_at->format('d-M-Y h:m');
            })

            ->addColumn('editLink', function (ProductAttribute $productAttribute) {

                $editLink = '<a href="' . route('ProductAttributes.edit', $productAttribute->id) . '" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
                return $editLink;
            })
            ->addColumn('deleteLink', function (ProductAttribute $productAttribute) {
                $CSRFToken = "csrf_field()";
                $deleteLink = '
                        <button class="btn btn-link delete-productAttribute" data-productAttribute_id="' . $productAttribute->id . '" type="submit"><i
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
        return view('folder.productAttributes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:productAttributes,code',
            'name' => 'required',
        ]);
        $productAttribute = new ProductAttribute();


        $productAttribute->code  = $request->code;
        $productAttribute->name = $request->name;


        if ($request->status == 0) {
            $productAttribute->status == 0;
        }

        $productAttribute->status = $request->status;

        $productAttribute->created_by = Auth::user()->id;
        $productAttribute->updated_by = Auth::user()->id;

        $productAttribute->save();

        return redirect()->route('productAttributes.index')
            ->with('message_store', 'ProductAttribute Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductAttribute $productAttribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $productAttributes = ProductAttribute::find($id);
        return view('folder.productAttributes.edit', compact('productAttributes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => "required|unique:productAttributes,code,$id",
        ]);
        $productAttribute = ProductAttribute::find($id);


        $productAttribute->code  = $request->code;
        $productAttribute->name = $request->name;


        if ($request->status == 0) {
            $productAttribute->status == 0;
        }

        $productAttribute->status = $request->status;

        $productAttribute->updated_by = Auth::user()->id;

        $productAttribute->save();

        return redirect()->route('productAttributes.index')
            ->with('message_store', 'ProductAttribute Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $productAttribute  = ProductAttribute::findOrFail($id);
        $productAttribute->delete();

        return redirect()->route('productAttributes.index')->with('message_update', 'ProductAttribute Deleted Successfully');
    }
}
