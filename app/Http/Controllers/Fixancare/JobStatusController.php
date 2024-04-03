<?php

namespace App\Http\Controllers\fixancare;

use Illuminate\Http\Request;
use App\Imports\JobStatusImport;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Models\Fixancare\JobStatus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class JobStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth');
         $this->middleware('permission:Job Status Read', ['only' => ['index']]);
         $this->middleware('permission:Job Status Create', ['only' => ['create','store']]);
         $this->middleware('permission:Job Status Edit', ['only' => ['Edit','Update']]);
         $this->middleware('permission:Job Status Delete', ['only' => ['destroy']]);

     }

    public function index()
    {
        $jobStatuses = JobStatus::all();
        return view('back_end.fixancare.job_statuses.index',compact('jobStatuses'))->with('i');
    }

    public function JobStatusesGet()
    {

        $job_statuses = JobStatus::all();
        return Datatables::of($job_statuses)

        ->setRowId(function ($job_status) {
            return $job_status->id;
            })

            ->editColumn('status', function (JobStatus $job_status) {

                $active='<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive='<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($job_status->status);

                    if($activeId==1){
                        $activeId = $active;
                    }
                    else {
                        $activeId = $inActive;
                    }
                    return $activeId;
            })


        ->editColumn('created_by', function (JobStatus $job_status) {

            return ucwords($job_status->CreatedBy->name);
        })


        ->editColumn('updated_by', function (JobStatus $job_status) {

            return ucwords($job_status->UpdatedBy->name);
        })
        ->addColumn('created_at', function (JobStatus $job_status) {
            return $job_status->created_at->format('d-M-Y h:m');
        })
        ->addColumn('updated_at', function (JobStatus $job_status) {

            return $job_status->updated_at->format('d-M-Y h:m');
        })

        ->addColumn('editLink', function (JobStatus $job_status) {

            $editLink ='<a href="'. route('job-statuses.edit', $job_status->id) .'" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
               return $editLink;
        })
        ->addColumn('deleteLink', function (JobStatus $job_status) {
           $CSRFToken = "csrf_field()";
            $deleteLink ='
                        <button class="btn btn-link delete-job_status" data-job_status_id="'.$job_status->id.'" type="submit"><i
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
        return view('back_end.fixancare.job_statuses.create');
    }

    public function jobStatusesImport()
    {
        return view('back_end.fixancare.job_statuses.import');
    }

    public function jobStatusesDownload()
    {
        $path=public_path('downloads/sample_excels/job_statuses_import_sample.xlsx');
        return response()->download($path);
    }

    public function jobStatusesUpload(Request $request)
    {
        $request->validate([
            'data'=>'required'
        ]);

        try {
            Excel::import(new JobStatusImport,$request->file('data'));
            return redirect()->route('job-statuses.index')
            ->with('message_store', 'Job Statuses Import Successfully');
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
            'code' => 'required|unique:job_statuses,code',
            'name' => 'required',
        ]);
        $job_status = new JobStatus();


        $job_status->code  = $request->code;
        $job_status->name = $request->name;


        if ($request->status==0)
            {
                $job_status->status==0;
            }

        $job_status->status = $request->status;

        $job_status->created_by = Auth::user()->id;
        $job_status->updated_by = Auth::user()->id;

        $job_status->save();

        return redirect()->route('job-statuses.index')
                        ->with('message_store', 'Job status Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobStatus $jobStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $job_status = JobStatus::find($id);
        return view('back_end.fixancare.job_statuses.edit',compact('job_status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => "required|unique:job_statuses,code,$id",
        ]);
        $job_status = JobStatus::find($id);


        $job_status->code  = $request->code;
        $job_status->name = $request->name;


        if ($request->status==0)
            {
                $job_status->status==0;
            }

        $job_status->status = $request->status;

        $job_status->updated_by = Auth::user()->id;

        $job_status->save();

        return redirect()->route('job-statuses.index')
                        ->with('message_store', 'Job Status Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $job_status  = JobStatus::findOrFail($id);
        $job_status->delete();

        return redirect()->route('job-statuses.index')
                ->with('message_update', 'Job Status Deleted Successfully');
    }
}
