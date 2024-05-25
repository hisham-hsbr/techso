<?php

namespace App\Http\Controllers\Techso;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Imports\ProductTypeImport;
use App\Models\Techso\ProductType;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class ProductTypeController extends Controller
{
    private $head_name = 'Product Type';
    private $route_name = 'product-types';
    private $snake_name = 'product_type';

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('permission:Product Type Read', ['only' => ['index']]);
        $this->middleware('permission:Product Type Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Product Type Edit', ['only' => ['Edit', 'Update']]);
        $this->middleware('permission:Product Type Delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $product_types = ProductType::all();
        $createdByUsers = $product_types->sortBy('createdBy')->pluck('createdBy')->unique();
        $updatedByUsers = $product_types->sortBy('updatedBy')->pluck('updatedBy')->unique();
        return view('back_end.techso.masters.product_types.index')->with(
            [
                'head_name' => $this->head_name,
                'route_name' => $this->route_name,
                'product_types' => $product_types,
                'createdByUsers' => $createdByUsers,
                'updatedByUsers' => $updatedByUsers,
                'i'
            ]
        );
    }

    public function productTypesGet()
    {

        $product_types = ProductType::all();
        return Datatables::of($product_types)

            ->setRowId(function ($product_type) {
                return $product_type->id;
            })

            ->editColumn('status', function (ProductType $product_type) {

                $active = '<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive = '<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($product_type->status);

                if ($activeId == 1) {
                    $activeId = $active;
                } else {
                    $activeId = $inActive;
                }
                return $activeId;
            })


            ->editColumn('created_by', function (ProductType $product_type) {

                return ucwords($product_type->CreatedBy->name);
            })


            ->editColumn('updated_by', function (ProductType $product_type) {

                return ucwords($product_type->UpdatedBy->name);
            })
            ->addColumn('created_at', function (ProductType $product_type) {
                return $product_type->created_at->format('d-M-Y h:m');
            })
            ->addColumn('updated_at', function (ProductType $product_type) {

                return $product_type->updated_at->format('d-M-Y h:m');
            })

            ->addColumn('editLink', function (ProductType $product_type) {

                $editLink = '<a href="' . route('product-types.edit', $product_type->id) . '" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
                return $editLink;
            })
            ->addColumn('deleteLink', function (ProductType $product_type) {
                $CSRFToken = "csrf_field()";
                $deleteLink = '
                         <button class="btn btn-link delete-product_type" data-product_type_id="' . $product_type->id . '" type="submit"><i
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
        return view('back_end.techso.masters.product_types.create');
    }

    public function productTypesImport()
    {
        return view('back_end.techso.masters.product_types.import');
    }

    public function productTypesDownload()
    {
        $path = public_path('downloads/sample_excels/product_types_import_sample.xlsx');
        return response()->download($path);
    }

    public function productTypesUpload(Request $request)
    {
        $request->validate([
            'data' => 'required'
        ]);

        try {
            Excel::import(new ProductTypeImport, $request->file('data'));
            return redirect()->route('product-types.index')
                ->with('message_store', 'Product Type Import Successfully');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            return redirect()->back()->with('import_errors', $failures);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:product_types,code',
            'name' => 'required',
        ]);
        $product_type = new ProductType();


        $product_type->code  = $request->code;
        $product_type->name = $request->name;
        $product_type->local_name = $request->local_name;

        if ($request->default == 0) {
            $product_type->default == 0;
        } else {
            $default = (DB::table('product_types')->where('default', 1)->first())->id;

            $update_default = ProductType::find($default);
            $update_default->default = null;
            $update_default->update();
        }

        $product_type->default = $request->default;


        if ($request->status == 0) {
            $product_type->status == 0;
        }

        $product_type->status = $request->status;

        $product_type->created_by = Auth::user()->id;
        $product_type->updated_by = Auth::user()->id;

        $product_type->save();

        return redirect()->route('product-types.index')
            ->with('message_store', 'Product Type Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductType $product_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product_type = ProductType::find($id);
        return view('back_end.techso.masters.product_types.edit', compact('product_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => "required|unique:product_types,code,$id",
        ]);
        if ($request->default == 1) {
            $default = (DB::table('product_types')->where('default', 1)->first())->id;

            $update_default = ProductType::find($default);
            $update_default->default = null;
            $update_default->update();
        }


        $product_type = ProductType::find($id);


        $product_type->code  = $request->code;
        $product_type->name = $request->name;
        $product_type->local_name = $request->local_name;
        $product_type->default = $request->default;


        if ($request->status == 0) {
            $product_type->status == 0;
        }

        $product_type->status = $request->status;

        $product_type->updated_by = Auth::user()->id;

        $product_type->save();

        return redirect()->route('product-types.index')
            ->with('message_store', 'Product Type Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product_type  = ProductType::findOrFail($id);
        $product_type->delete();

        return redirect()->route('product-types.index')->with('message_update', 'Product Type Deleted Successfully');
    }
}
