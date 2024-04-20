<?php

namespace App\Http\Controllers\Techso;

use App\Imports\BrandImport;
use App\Models\Techso\Brand;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('permission:Brand Read', ['only' => ['index']]);
        $this->middleware('permission:Brand Create', ['only' => ['create','store']]);
        $this->middleware('permission:Brand Edit', ['only' => ['Edit','Update']]);
        $this->middleware('permission:Brand Delete', ['only' => ['destroy']]);

    }

    public function index()
    {
        $brands = Brand::all();
        $createdByUsers = $brands->sortBy('createdBy')->pluck('createdBy')->unique();
        $updatedByUsers = $brands->sortBy('updatedBy')->pluck('updatedBy')->unique();
        return view('back_end.techso.masters.brands.index',compact('brands','createdByUsers','updatedByUsers'))->with('i');
    }

    public function brandsGet()
    {

        $brands = Brand::all();
        return Datatables::of($brands)

        ->setRowId(function ($brand) {
            return $brand->id;
            })

            ->editColumn('status', function (Brand $brand) {

                $active='<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive='<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($brand->status);

                    if($activeId==1){
                        $activeId = $active;
                    }
                    else {
                        $activeId = $inActive;
                    }
                    return $activeId;
            })


        ->editColumn('created_by', function (Brand $brand) {

            return ucwords($brand->CreatedBy->name);
        })


        ->editColumn('updated_by', function (Brand $brand) {

            return ucwords($brand->UpdatedBy->name);
        })
        ->addColumn('created_at', function (Brand $brand) {
            return $brand->created_at->format('d-M-Y h:m');
        })
        ->addColumn('updated_at', function (Brand $brand) {

            return $brand->updated_at->format('d-M-Y h:m');
        })

        ->addColumn('editLink', function (Brand $brand) {

            $editLink ='<a href="'. route('brands.edit', $brand->id) .'" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
               return $editLink;
        })
        ->addColumn('deleteLink', function (Brand $brand) {
           $CSRFToken = "csrf_field()";
            $deleteLink ='
                        <button class="btn btn-link delete-brand" data-brand_id="'.$brand->id.'" type="submit"><i
                                class="fa-solid fa-trash-can text-danger"></i>
                        </button>';
               return $deleteLink;
        })


       ->rawColumns(['status','editLink','deleteLink'])
        ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back_end.techso.masters.brands.create');
    }

    public function brandsImport()
     {
         return view('back_end.techso.masters.brands.import');
     }

     public function brandsDownload()
     {
         $path=public_path('downloads/sample_excels/brands_import_sample.xlsx');
         return response()->download($path);
     }

     public function brandsUpload(Request $request)
     {
        $request->validate([
            'data'=>'required'
        ]);

        try {
            Excel::import(new BrandImport,$request->file('data'));
            return redirect()->route('brands.index')
            ->with('message_store', 'Brands Import Successfully');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
             $failures = $e->failures();
             return redirect()->back()->with('import_errors',$failures);
        }
     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:brands,code',
            'name' => 'required',
        ]);
        $brand = new Brand();


        $brand->code  = $request->code;
        $brand->name = $request->name;


        if ($request->status==0)
            {
                $brand->status==0;
            }

        $brand->status = $request->status;

        $brand->created_by = Auth::user()->id;
        $brand->updated_by = Auth::user()->id;

        $brand->save();

        return redirect()->route('brands.index')
                        ->with('message_store', 'Brand Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('back_end.techso.masters.brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => "required|unique:brands,code,$id",
        ]);
        $brand = Brand::find($id);


        $brand->code  = $request->code;
        $brand->name = $request->name;


        if ($request->status==0)
            {
                $brand->status==0;
            }

        $brand->status = $request->status;

        $brand->updated_by = Auth::user()->id;

        $brand->save();

        return redirect()->route('brands.index')
                        ->with('message_store', 'Brand Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $brand  = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->route('brands.index')->with('message_update', 'Brand Deleted Successfully');

    }
}
