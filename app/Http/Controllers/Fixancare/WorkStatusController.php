<?php

namespace App\Http\Controllers\fixancare;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Imports\WorkStatusImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Fixancare\workStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class workStatusController extends Controller
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
        $work_statuses = WorkStatus::all();
        return view('back_end.fixancare.work_statuses.index',compact('work_statuses'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function workStatusesGet()
    {

        $work_statuses = WorkStatus::all();
        return Datatables::of($work_statuses)

        ->setRowId(function ($work_status) {
            return $work_status->id;
            })

            ->editColumn('status', function (workStatus $work_status) {

                $active='<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive='<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($work_status->status);

                    if($activeId==1){
                        $activeId = $active;
                    }
                    else {
                        $activeId = $inActive;
                    }
                    return $activeId;
            })


        ->editColumn('created_by', function (workStatus $work_status) {

            return ucwords($work_status->CreatedBy->name);
        })


        ->editColumn('updated_by', function (workStatus $work_status) {

            return ucwords($work_status->UpdatedBy->name);
        })
        ->addColumn('created_at', function (workStatus $work_status) {
            return $work_status->created_at->format('d-M-Y h:m');
        })
        ->addColumn('updated_at', function (workStatus $work_status) {

            return $work_status->updated_at->format('d-M-Y h:m');
        })

        ->addColumn('editLink', function (workStatus $work_status) {

            $editLink ='<a href="'. route('work-statuses.edit', $work_status->id) .'" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
               return $editLink;
        })
        ->addColumn('deleteLink', function (workStatus $work_status) {
           $CSRFToken = "csrf_field()";
            $deleteLink ='

                        <button class="btn btn-link delete-work_status" data-work_status_id="'.$work_status->id.'" type="submit"><i
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
        return view('back_end.fixancare.work_statuses.create');
    }

    public function workStatusesImport()
    {
        return view('back_end.fixancare.work_statuses.import');
    }

    public function workStatusesDownload()
    {
        $path=public_path('downloads/sample_excels/work_statuses_import_sample.xlsx');
        return response()->download($path);
    }

    public function workStatusesUpload(Request $request)
    {
        $request->validate([
            'data'=>'required'
        ]);

        try {
            Excel::import(new WorkStatusImport,$request->file('data'));
            return redirect()->route('work-statuses.index')
            ->with('message_store', 'Work Statuses Import Successfully');
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
            'code' => 'required|unique:work_statuses,code',
            'name' => 'required',
        ]);
        $work_status = new WorkStatus();


        $work_status->code  = $request->code;
        $work_status->name = $request->name;


        if ($request->status==0)
            {
                $work_status->status==0;
            }

        $work_status->status = $request->status;

        $work_status->created_by = Auth::user()->id;
        $work_status->updated_by = Auth::user()->id;

        $work_status->save();

        return redirect()->route('work-statuses.index')
                        ->with('message_store', 'Work Status Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(workStatus $workStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $work_status = workStatus::find($id);
        return view('back_end.fixancare.work_statuses.edit',compact('work_status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => "required|unique:work_statuses,code,$id",
        ]);
        $work_status = WorkStatus::find($id);


        $work_status->code  = $request->code;
        $work_status->name = $request->name;


        if ($request->status==0)
            {
                $work_status->status==0;
            }

        $work_status->status = $request->status;

        $work_status->updated_by = Auth::user()->id;

        $work_status->save();

        return redirect()->route('work-statuses.index')
                        ->with('message_store', 'Work status Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $work_status  = WorkStatus::findOrFail($id);
        $work_status->delete();

        return redirect()->route('work-statuses.index')
                ->with('message_update', 'Work Status Deleted Successfully');
    }
}
