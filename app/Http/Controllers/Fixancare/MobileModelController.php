<?php

namespace App\Http\Controllers\fixancare;

use Illuminate\Http\Request;
use App\Models\Fixancare\Brand;
use Yajra\Datatables\Datatables;
use App\Imports\MobileModelImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Fixancare\MobileModel;

class MobileModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $mobile_models = MobileModel::all();
        return view('back_end.fixancare.mobile_models.index',compact('mobile_models'))->with('i');
    }

    public function MobileModelsGet()
    {

        $mobile_models = MobileModel::all();
        return Datatables::of($mobile_models)

        ->setRowId(function ($mobile_model) {
            return $mobile_model->id;
            })

            ->editColumn('status', function (MobileModel $mobile_model) {

                $active='<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive='<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($mobile_model->status);

                    if($activeId==1){
                        $activeId = $active;
                    }
                    else {
                        $activeId = $inActive;
                    }
                    return $activeId;
            })

        ->addColumn('mobileBrand', function (MobileModel $mobile_model) {

            return ucwords($mobile_model->brand->name);
        })

        ->editColumn('created_by', function (MobileModel $mobile_model) {

            return ucwords($mobile_model->CreatedBy->name);
        })


        ->editColumn('updated_by', function (MobileModel $mobile_model) {

            return ucwords($mobile_model->UpdatedBy->name);
        })
        ->addColumn('created_at', function (MobileModel $mobile_model) {
            return $mobile_model->created_at->format('d-M-Y h:m');
        })
        ->addColumn('updated_at', function (MobileModel $mobile_model) {

            return $mobile_model->updated_at->format('d-M-Y h:m');
        })

        ->addColumn('editLink', function (MobileModel $mobile_model) {

            $editLink ='<a href="'. route('mobile-models.edit', $mobile_model->id) .'" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
               return $editLink;
        })

        ->addColumn('deleteLink', function (MobileModel $mobile_model) {
            $CSRFToken = "csrf_field()";
             $deleteLink ='
                         <button class="btn btn-link delete-mobile_model" data-mobile_model_id="'.$mobile_model->id.'" type="submit"><i
                                 class="fa-solid fa-trash-can text-danger"></i>
                         </button>';
                return $deleteLink;
         })


       ->rawColumns(['mobileBrand','status','editLink','deleteLink'])
        ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mobile_brands = Brand::all();
        return view('back_end.fixancare.mobile_models.create',compact('mobile_brands'));
    }

    public function mobileModelsImport()
    {
        return view('back_end.fixancare.mobile_models.import');
    }

    public function mobileModelsDownload()
    {
        $path=public_path('downloads/sample_excels/mobile_models_import_sample.xlsx');
        return response()->download($path);
    }

    public function mobileModelsUpload(Request $request)
    {
        $request->validate([
            'data'=>'required'
        ]);

        try {
            Excel::import(new MobileModelImport,$request->file('data'));
            return redirect()->route('mobile-models.index')
            ->with('message_store', 'Mobile Models Import Successfully');
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
            'code' => 'required|unique:mobile_models,code',
            'name' => 'required',
            'mobile_brand_id' => 'required',
        ]);
        $mobile_model = new MobileModel();


        $mobile_model->code  = $request->code;
        $mobile_model->name = $request->name;
        $mobile_model->brand_id = $request->mobile_brand_id;


        if ($request->status==0)
            {
                $mobile_model->status==0;
            }

        $mobile_model->status = $request->status;

        $mobile_model->created_by = Auth::user()->id;
        $mobile_model->updated_by = Auth::user()->id;

        $mobile_model->save();

        return redirect()->route('mobile-models.index')
                        ->with('message_store', 'Mobile Model Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(MobileModel $MobileModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mobile_model = MobileModel::find($id);
        $mobile_brands = Brand::all();
        return view('back_end.fixancare.mobile_models.edit',compact('mobile_model','mobile_brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => "required|unique:mobile_models,code,$id",
            'mobile_brand_id' => 'required',
        ]);
        $mobile_model = MobileModel::find($id);


        $mobile_model->code  = $request->code;
        $mobile_model->name = $request->name;
        $mobile_model->brand_id = $request->mobile_brand_id;


        if ($request->status==0)
            {
                $mobile_model->status==0;
            }

        $mobile_model->status = $request->status;

        $mobile_model->updated_by = Auth::user()->id;

        $mobile_model->save();

        return redirect()->route('mobile-models.index')
                        ->with('message_store', 'Mobile Model Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mobile_model  = MobileModel::findOrFail($id);
        $mobile_model->delete();

        return redirect()->route('mobile-models.index')
                ->with('message_update', 'Mobile Model Deleted Successfully');
    }
}
