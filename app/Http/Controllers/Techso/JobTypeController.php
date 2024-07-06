<?php

namespace App\Http\Controllers\Techso;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\JobTypeImport;
use App\Models\Techso\JobType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class JobTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $head_name = 'Job Type New';
    private $route_name = 'job-types';
    private $snake_name = 'job_type';
    // private $snake_name='$job_type->id';

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('permission:Job Type Read', ['only' => ['index']]);
        $this->middleware('permission:Job Type Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Job Type Edit', ['only' => ['Edit', 'Update']]);
        $this->middleware('permission:Job Type Delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $job_types = JobType::all();
        $createdByUsers = $job_types->sortBy('createdBy')->pluck('createdBy')->unique();
        $updatedByUsers = $job_types->sortBy('updatedBy')->pluck('updatedBy')->unique();

        return view('back_end.techso.masters.job_types.index')->with(
            [
                'head_name' => $this->head_name,
                'route_name' => $this->route_name,
                'job_types' => $job_types,
                'createdByUsers' => $createdByUsers,
                'updatedByUsers' => $updatedByUsers,
            ]
        );
    }

    public function jobTypesGet()
    {

        $job_types = JobType::all();
        return Datatables::of($job_types)

            ->setRowId(function ($job_type) {
                return $job_type->id;
            })

            ->editColumn('status', function (JobType $job_type) {

                $active = '<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive = '<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($job_type->status);

                if ($activeId == 1) {
                    $activeId = $active;
                } else {
                    $activeId = $inActive;
                }
                return $activeId;
            })


            ->editColumn('created_by', function (JobType $job_type) {

                return ucwords($job_type->CreatedBy->name);
            })


            ->editColumn('updated_by', function (JobType $job_type) {

                return ucwords($job_type->UpdatedBy->name);
            })
            ->addColumn('created_at', function (JobType $job_type) {
                return $job_type->created_at->format('d-M-Y h:m');
            })
            ->addColumn('updated_at', function (JobType $job_type) {

                return $job_type->updated_at->format('d-M-Y h:m');
            })

            ->addColumn('editLink', function (JobType $job_type) {

                $editLink = '<a href="' . route('job-types.edit', $job_type->id) . '" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
                return $editLink;
            })
            ->addColumn('deleteLink', function (JobType $job_type) {
                $CSRFToken = "csrf_field()";
                $deleteLink = '
                         <button class="btn btn-link delete-job_type" data-job_type_id="' . $job_type->id . '" type="submit"><i
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

        return view('back_end.techso.masters.job_types.create')->with(
            [
                'head_name' => $this->head_name,
                'route_name' => $this->route_name
            ]
        );
    }

    public function jobTypesImport()
    {
        return view('back_end.techso.masters.job_types.import');
    }

    public function jobTypesDownload()
    {
        $path = public_path('downloads/sample_excels/job_types_import_sample.xlsx');
        return response()->download($path);
    }

    public function jobTypesUpload(Request $request)
    {
        $request->validate([
            'data' => 'required'
        ]);

        try {
            Excel::import(new JobTypeImport, $request->file('data'));
            return redirect()->route('job-types.index')
                ->with('message_store', 'Job Type Import Successfully');
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
            'code' => 'required|unique:job_types,code',
            'name' => 'required',
        ]);

        $job_type = new JobType();
        $job_type->code  = $request->code;
        $job_type->name = $request->name;
        $job_type->local_name = $request->local_name;

        if ($request->default == 0) {
            $job_type->default == 0;
        } else {
            $default = (DB::table('job_types')->where('default', 1)->first())->id;

            $update_default = JobType::find($default);
            $update_default->default = null;
            $update_default->update();
        }

        $job_type->default = $request->default;

        if ($request->status == 0) {
            $job_type->status == 0;
        }

        $job_type->status = $request->status;

        $job_type->created_by = Auth::user()->id;
        $job_type->updated_by = Auth::user()->id;

        $job_type->save();

        return redirect()->route('job-types.index')
            ->with('message_store', 'Job Type Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobType $job_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $job_type = JobType::find($id);
        return view('back_end.techso.masters.job_types.edit')->with(
            [
                'head_name' => $this->head_name,
                'route_name' => $this->route_name,
                'snake_name' => $this->snake_name,
                'job_type' => $job_type,
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
            'code' => "required|unique:job_types,code,$id",
        ]);

        if ($request->default == 1) {
            $default = (DB::table('job_types')->where('default', 1)->first())->id;

            $update_default = JobType::find($default);
            $update_default->default = null;
            $update_default->update();
        }

        $job_type = JobType::find($id);



        $job_type->code  = $request->code;
        $job_type->name = $request->name;

        $job_type->local_name = $request->local_name;
        $job_type->default = $request->default;


        if ($request->status == 0) {
            $job_type->status == 0;
        }

        $job_type->status = $request->status;

        $job_type->updated_by = Auth::user()->id;

        $job_type->save();

        return redirect()->route('job-types.index')
            ->with('message_store', 'Job Type Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $job_type  = JobType::findOrFail($id);
        $job_type->delete();

        return redirect()->route('job-types.index')->with('message_update', 'Job Type Deleted Successfully');
    }
}
