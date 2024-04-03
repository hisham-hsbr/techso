<?php

namespace App\Http\Controllers\fixancare;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Imports\MobileComplaintImport;
use App\Models\Fixancare\MobileComplaint;
use Maatwebsite\Excel\Facades\Excel;

class MobileComplaintController extends Controller
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
        $mobile_complaints = MobileComplaint::all();
        return view('back_end.fixancare.mobile_complaints.index',compact('mobile_complaints'))->with('i');
    }

    public function mobileComplaintsGet()
    {

        $mobile_complaints = MobileComplaint::all();
        return Datatables::of($mobile_complaints)

        ->setRowId(function ($mobile_complaint) {
            return $mobile_complaint->id;
            })

            ->editColumn('status', function (MobileComplaint $mobile_complaint) {

                $active='<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive='<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($mobile_complaint->status);

                    if($activeId==1){
                        $activeId = $active;
                    }
                    else {
                        $activeId = $inActive;
                    }
                    return $activeId;
            })


        ->editColumn('created_by', function (MobileComplaint $mobile_complaint) {

            return ucwords($mobile_complaint->CreatedBy->name);
        })


        ->editColumn('updated_by', function (MobileComplaint $mobile_complaint) {

            return ucwords($mobile_complaint->UpdatedBy->name);
        })
        ->addColumn('created_at', function (MobileComplaint $mobile_complaint) {
            return $mobile_complaint->created_at->format('d-M-Y h:m');
        })
        ->addColumn('updated_at', function (MobileComplaint $mobile_complaint) {

            return $mobile_complaint->updated_at->format('d-M-Y h:m');
        })

        ->addColumn('editLink', function (MobileComplaint $mobile_complaint) {

            $editLink ='<a href="'. route('mobile-complaints.edit', $mobile_complaint->id) .'" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
               return $editLink;
        })
        ->addColumn('deleteLink', function (MobileComplaint $mobile_complaint) {
           $CSRFToken = "csrf_field()";
            $deleteLink ='
                        <button class="btn btn-link delete-mobile_complaint" data-mobile_complaint_id="'.$mobile_complaint->id.'" type="submit"><i
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
        return view('back_end.fixancare.mobile_complaints.create');
    }

    public function mobileComplaintsImport()
    {
        return view('back_end.fixancare.mobile_complaints.import');
    }

    public function mobileComplaintsDownload()
    {
        $path=public_path('downloads/sample_excels/mobile_complaints_import_sample.xlsx');
        return response()->download($path);
    }

    public function mobileComplaintsUpload(Request $request)
    {
        $request->validate([
            'data'=>'required'
        ]);

        try {
            Excel::import(new MobileComplaintImport,$request->file('data'));
            return redirect()->route('mobile-complaints.index')
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
            'code' => 'required|unique:mobile_complaints,code',
            'name' => 'required',
        ]);
        $mobile_complaint = new MobileComplaint();


        $mobile_complaint->code  = $request->code;
        $mobile_complaint->name = $request->name;


        if ($request->status==0)
            {
                $mobile_complaint->status==0;
            }

        $mobile_complaint->status = $request->status;

        $mobile_complaint->created_by = Auth::user()->id;
        $mobile_complaint->updated_by = Auth::user()->id;

        $mobile_complaint->save();

        return redirect()->route('mobile-complaints.index')
                        ->with('message_store', 'Mobile Complaint Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(MobileComplaint $mobile_complaint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mobile_complaint = MobileComplaint::find($id);
        return view('back_end.fixancare.mobile_complaints.edit',compact('mobile_complaint'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => "required|unique:mobile_complaints,code,$id",
        ]);
        $mobile_complaint = MobileComplaint::find($id);


        $mobile_complaint->code  = $request->code;
        $mobile_complaint->name = $request->name;


        if ($request->status==0)
            {
                $mobile_complaint->status==0;
            }

        $mobile_complaint->status = $request->status;

        $mobile_complaint->updated_by = Auth::user()->id;

        $mobile_complaint->save();

        return redirect()->route('mobile-complaints.index')
                        ->with('message_store', 'Mobile Complaint Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mobile_complaint  = MobileComplaint::findOrFail($id);
        $mobile_complaint->delete();

        return redirect()->route('mobile-complaints.index')
                ->with('message_update', 'Mobile Complaint Deleted Successfully');
    }
}
