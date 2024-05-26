<?php

namespace App\Http\Controllers\Techso;

use App\Models\Techso\Brand;
use Illuminate\Http\Request;
use App\Imports\ProductImport;
use App\Models\Techso\Product;
use Yajra\Datatables\Datatables;
use App\Models\Techso\ProductType;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    private $head_name = 'Products';
    private $route_name = 'products';

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('permission:Product Read', ['only' => ['index']]);
        $this->middleware('permission:Product Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Product Edit', ['only' => ['Edit', 'Update']]);
        $this->middleware('permission:Product Delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $products = Product::all();
        $createdByUsers = $products->sortBy('createdBy')->pluck('createdBy')->unique();
        $updatedByUsers = $products->sortBy('updatedBy')->pluck('updatedBy')->unique();
        return view('back_end.techso.masters.products.index')->with(
            [
                'head_name' => $this->head_name,
                'route_name' => $this->route_name,
                'products' => $products,
                'createdByUsers' => $createdByUsers,
                'updatedByUsers' => $updatedByUsers,
                'i'
            ]
        );
    }


    public function productsGet()
    {

        $products = Product::all();
        return Datatables::of($products)

            ->setRowId(function ($product) {
                return $product->id;
            })

            ->editColumn('status', function (Product $product) {

                $active = '<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive = '<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($product->status);

                if ($activeId == 1) {
                    $activeId = $active;
                } else {
                    $activeId = $inActive;
                }
                return $activeId;
            })


            ->editColumn('product_type', function (Product $product) {

                return ucwords($product->product_type->name);
            })

            ->editColumn('brand', function (Product $product) {

                return ucwords($product->brand->name);
            })
            ->editColumn('created_by', function (Product $product) {

                return ucwords($product->CreatedBy->name);
            })


            ->editColumn('updated_by', function (Product $product) {

                return ucwords($product->UpdatedBy->name);
            })
            ->addColumn('created_at', function (Product $product) {
                return $product->created_at->format('d-M-Y h:m');
            })
            ->addColumn('updated_at', function (Product $product) {

                return $product->updated_at->format('d-M-Y h:m');
            })

            ->addColumn('editLink', function (Product $product) {

                $editLink = '<a href="' . route('products.edit', $product->id) . '" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
                return $editLink;
            })
            ->addColumn('deleteLink', function (Product $product) {
                $CSRFToken = "csrf_field()";
                $deleteLink = '
                         <button class="btn btn-link delete-product" data-product_id="' . $product->id . '" type="submit"><i
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

    public function getPrice(Product $product)
    {
        return response()->json(['price' => $product->price]);
    }
    public function create()
    {
        $product_types = ProductType::all();
        $brands = Brand::all();
        return view('back_end.techso.masters.products.create')->with(
            [
                'head_name' => $this->head_name,
                'route_name' => $this->route_name,
                'product_types' => $product_types,
                'brands' => $brands,
            ]
        );
    }

    public function productsImport()
    {
        return view('back_end.techso.masters.products.import');
    }

    public function productsDownload()
    {
        $path = public_path('downloads/sample_excels/products_import_sample.xlsx');
        return response()->download($path);
    }

    public function productsUpload(Request $request)
    {
        $request->validate([
            'data' => 'required'
        ]);

        try {
            Excel::import(new ProductImport, $request->file('data'));
            return redirect()->route('products.index')
                ->with('message_store', 'Product Import Successfully');
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
        dd($request->all());
        $this->validate($request, [
            // 'code' => 'required|unique:products,code',
            // 'name' => 'required',
            // 'product_type_id' => 'required',
            // 'brand_id' => 'required',
        ]);
        $product = new Product();


        $product->code  = $request->code;
        $product->name = $request->name;
        $product->local_name = $request->local_name;
        $product->product_barcode_1 = $request->product_barcode_1;
        $product->product_barcode_2 = $request->product_barcode_2;
        $product->product_type_id = $request->product_type_id;
        $product->brand_id = $request->brand_id;


        if ($request->status == 0) {
            $product->status == 0;
        }

        $product->status = $request->status;

        $product->created_by = Auth::user()->id;
        $product->updated_by = Auth::user()->id;

        $product->save();

        return redirect()->route('products.index')
            ->with('message_store', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $product_types = ProductType::all();
        $brands = Brand::all();
        return view('back_end.techso.masters.products.edit')->with(
            [
                'head_name' => $this->head_name,
                'route_name' => $this->route_name,
                'product' => $product,
                'product_types' => $product_types,
                'brands' => $brands,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => "required|unique:products,code,$id",
            'product_type_id' => 'required',
            'brand_id' => 'required',
        ]);
        $product = Product::find($id);


        $product->code  = $request->code;
        $product->name = $request->name;
        $product->local_name = $request->local_name;
        $product->product_barcode_1 = $request->product_barcode_1;
        $product->product_barcode_2 = $request->product_barcode_2;
        $product->product_type_id = $request->product_type_id;
        $product->brand_id = $request->brand_id;


        if ($request->status == 0) {
            $product->status == 0;
        }

        $product->status = $request->status;

        $product->updated_by = Auth::user()->id;

        $product->save();

        return redirect()->route('products.index')
            ->with('message_store', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product  = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('message_update', 'Product Deleted Successfully');
    }
}
