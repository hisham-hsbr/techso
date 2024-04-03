<?php

namespace App\Http\Controllers\fixancare;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Fixancare\JobType;
use Illuminate\Support\Facades\DB;
use App\Models\Fixancare\JobStatus;
use App\Http\Controllers\Controller;
use App\Models\Fixancare\WorkStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Fixancare\MobileModel;
use App\Models\Fixancare\MobileService;
use App\Models\Fixancare\MobileComplaint;
use Barryvdh\DomPDF\Facade\Pdf;

class MobileServiceController extends Controller
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
        $mobile_services = MobileService::all();
        $job_number = $mobile_services->sortBy('job_number')->pluck('job_number')->unique();
        $mobile_models = $mobile_services->sortBy('mobileModel')->pluck('mobileModel')->unique();
        $job_types = $mobile_services->sortBy('jobType')->pluck('jobType')->unique();
        $job_statuses = $mobile_services->sortBy('jobStatus')->pluck('jobStatus')->unique();
        $work_statuses = $mobile_services->sortBy('workStatus')->pluck('workStatus')->unique();
        $mobile_complaints = $mobile_services->sortBy('mobileComplaint')->pluck('mobileComplaint')->unique();

        return view('back_end.fixancare.mobile_services.index',compact('mobile_services','mobile_models','job_types','job_statuses','work_statuses','mobile_complaints','job_number'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mobile_services = MobileService::all();
        $job_number = MobileService::max('job_number')+1;
        $mobile_models = MobileModel::all();
        $job_types = JobType::all();
        $job_statuses = JobStatus::all();
        $work_statuses = WorkStatus::all();
        $mobile_complaints = MobileComplaint::all();
        return view('back_end.fixancare.mobile_services.create',compact('mobile_services','mobile_models','job_types','job_statuses','work_statuses','mobile_complaints','job_number'));
    }

    public function mobileServicesGet()
    {

        $mobile_services = MobileService::all();
        // $mobile_services = MobileService::orderByRaw('ISNULL(display_order), display_order ASC')->get();
        // $mobile_services = MobileService::orderBy('job_number', 'DESC');
        return Datatables::of($mobile_services)

        ->setRowId(function ($mobile_service) {
            return $mobile_service->id;
            })

            ->editColumn('status', function (MobileService $mobile_service) {

                $active='<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive='<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($mobile_service->status);

                    if($activeId==1){
                        $activeId = $active;
                    }
                    else {
                        $activeId = $inActive;
                    }
                    return $activeId;
            })

        ->addColumn('date', function (MobileService $mobile_service) {
            return $mobile_service->date->format('d-M-Y');
        })
        ->addColumn('jobNumber', function (MobileService $mobile_service) {
            return "F-".$mobile_service->job_number;
        })

        ->editColumn('jobStatus', function (MobileService $mobile_service) {
            $jobStatus=($mobile_service->jobStatus->name);


            $delivered='<span style="background-color: green;color: white;padding: 3px;width:100px;border-radius: 8px;">Delivered</span>';
            $pending='<span style="background-color: red;color: white;padding: 3px;width:100px;border-radius: 8px;">Pending</span>';
            $workStarted='<span style="background-color: yellow;color: black;padding: 3px;padding-left: 5px;padding-right: 5px;width:100px;border-radius: 8px;">Work started</span>';
            $other='<span style="background-color: orange;color: white;padding: 3px;padding-left: 5px;padding-right: 5px;width:100px;border-radius: 8px;">' . $jobStatus .'</span>';



            if($jobStatus=="Pending"){
                $jobStatus = $pending;
            }
            else if($jobStatus=="Delivered") {
                $jobStatus = $delivered;
            }
            else if($jobStatus=="Work started") {
                $jobStatus = $workStarted;
            }
            else {
                $jobStatus = $other;
            }

            return $jobStatus;

            return ucwords($mobile_service->job_status_id->name);
        })
        ->editColumn('jobType', function (MobileService $mobile_service) {

            return ucwords($mobile_service->jobType->name);
        })
        ->editColumn('workStatus', function (MobileService $mobile_service) {

            return ucwords($mobile_service->workStatus->name);
        })
        ->editColumn('mobileModel', function (MobileService $mobile_service) {

            return ucwords($mobile_service->mobileModel->name);
        })
        ->editColumn('mobileComplaint', function (MobileService $mobile_service) {

            return ucwords($mobile_service->mobileComplaint->name);
        })
        ->editColumn('mobileModel', function (MobileService $mobile_service) {

            return ucwords($mobile_service->MobileModel->name);
        })


        // ----------

        ->editColumn('created_by', function (MobileService $mobile_service) {

            return ucwords($mobile_service->CreatedBy->name);
        })

        ->editColumn('updated_by', function (MobileService $mobile_service) {

            return ucwords($mobile_service->UpdatedBy->name);
        })
        ->addColumn('created_at', function (MobileService $mobile_service) {
            return $mobile_service->created_at->format('d-M-Y h:m');
        })
        ->addColumn('updated_at', function (MobileService $mobile_service) {

            return $mobile_service->updated_at->format('d-M-Y h:m');
        })

        ->addColumn('editLink', function (MobileService $mobile_service) {

            $editLink ='<a href="'. route('mobile-services.edit', $mobile_service->id) .'" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
               return $editLink;
        })
        ->addColumn('pdfLink', function (MobileService $mobile_service) {

            $pdfLink ='<a href="'. route('mobile-services.pdf', $mobile_service->id) .'" class="ml-2"><i class="fa-solid fa-file-pdf"></i></a>';
               return $pdfLink;
        })
        ->addColumn('deleteLink', function (MobileService $mobile_service) {
           $CSRFToken = "csrf_field()";
            $deleteLink ='
                        <button class="btn btn-link delete-MobileService" data-MobileService_id="'.$mobile_service->id.'" type="submit"><i
                                class="fa-solid fa-trash-can text-danger"></i>
                        </button>';
               return $deleteLink;
        })


       ->rawColumns(['jobStatus','jobType','workStatus','mobileModel', 'mobileComplaint','status','editLink','pdfLink','deleteLink'])
        ->toJson();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            // 'job_number_trim' => 'required|unique:mobile_services,job_number',
            'job_type_id' => 'required',
            'contact_name' => 'required',
            'contact_number' => 'required',
            'contact_address' => 'required',
            'imei' => 'required',
            'lock' => 'required',
            'mobile_model_id' => 'required',
            'mobile_complaint_id' => 'required',
            'job_status_id' => 'required',
            'work_status_id' => 'required',
            'payment' => 'required',
            'advance' => 'required',
            'balance' => 'required',
        ]);


        $mobile_services = new MobileService();

        $job_number = $request->job_number;
        $job_number_trim = substr($job_number, 2);

        $mobile_services->date = $request->date;
        $mobile_services->job_number = $job_number_trim;
        $mobile_services->job_type_id = $request->job_type_id;
        $mobile_services->contact_name = $request->contact_name;
        $mobile_services->contact_number = $request->contact_number;
        $mobile_services->contact_address = $request->contact_address;
        $mobile_services->imei = $request->imei;
        $mobile_services->lock = $request->lock;
        $mobile_services->mobile_model_id = $request->mobile_model_id;
        $mobile_services->mobile_complaint_id = $request->mobile_complaint_id;
        $mobile_services->complaint_details = $request->complaint_details;
        $mobile_services->work_details = $request->work_details;
        $mobile_services->delivered_at = $request->delivered_at;
        $mobile_services->job_status_id = $request->job_status_id;
        $mobile_services->work_status_id = $request->work_status_id;
        $mobile_services->payment = $request->payment;
        $mobile_services->advance = $request->advance;
        $mobile_services->balance = $request->balance;
        $mobile_services->description = $request->description;

        if ($request->status==0)
            {
                $mobile_services->status==0;
            }

        $mobile_services->status = $request->status;

        $mobile_services->created_by = Auth::User()->id;
        $mobile_services->updated_by = Auth::User()->id;

        $mobile_services->save();

        return redirect()->route('mobile-services.index')
                        ->with('message_store', 'mobile services created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(MobileService $mobileService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mobile_services = MobileService::find($id);
        $mobile_models = MobileModel::all();
        $job_types = JobType::all();
        $job_statuses = JobStatus::all();
        $work_statuses = WorkStatus::all();
        $mobile_complaints = MobileComplaint::all();
        return view('back_end.fixancare.mobile_services.edit',compact('mobile_services','mobile_models','job_types','job_statuses','work_statuses','mobile_complaints'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'date' => 'required',
            // 'job_number_trim' => 'required|unique:mobile_services,job_number',
            'job_number' => "required|unique:mobile_services,job_number,$id",
            'job_type_id' => 'required',
            'contact_name' => 'required',
            'contact_number' => 'required',
            'contact_address' => 'required',
            'imei' => 'required',
            'lock' => 'required',
            'mobile_model_id' => 'required',
            'mobile_complaint_id' => 'required',
            'job_status_id' => 'required',
            'work_status_id' => 'required',
            'payment' => 'required',
            'advance' => 'required',
            'balance' => 'required',
        ]);


        $mobile_services = MobileService::find($id);

        $job_number = $request->job_number;
        $job_number_trim = substr($job_number, 2);

        $mobile_services->date = $request->date;
        $mobile_services->job_number = $job_number_trim;
        $mobile_services->job_type_id = $request->job_type_id;
        $mobile_services->contact_name = $request->contact_name;
        $mobile_services->contact_number = $request->contact_number;
        $mobile_services->contact_address = $request->contact_address;
        $mobile_services->imei = $request->imei;
        $mobile_services->lock = $request->lock;
        $mobile_services->mobile_model_id = $request->mobile_model_id;
        $mobile_services->mobile_complaint_id = $request->mobile_complaint_id;
        $mobile_services->complaint_details = $request->complaint_details;
        $mobile_services->work_details = $request->work_details;
        $mobile_services->delivered_at = $request->delivered_at;
        $mobile_services->job_status_id = $request->job_status_id;
        $mobile_services->work_status_id = $request->work_status_id;
        $mobile_services->payment = $request->payment;
        $mobile_services->advance = $request->advance;
        $mobile_services->balance = $request->balance;
        $mobile_services->description = $request->description;

        if ($request->status==0)
            {
                $mobile_services->status==0;
            }

        $mobile_services->status = $request->status;


        $mobile_services->updated_by = Auth::User()->id;

        $mobile_services->save();

        return redirect()->route('mobile-services.index')
                        ->with('message_store', 'mobile services Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MobileService $mobileService)
    {
        //
    }

    public function mobileServicesPDF($id)
    {
        $mobile_services = MobileService::find($id);
        $mobile_models = MobileModel::all();
        $job_types = JobType::all();
        $job_statuses = JobStatus::all();
        $work_statuses = WorkStatus::all();
        $mobile_complaints = MobileComplaint::all();
        $data=[
            'mobile_services'=>$mobile_services,
            'mobile_models'=>$mobile_models,
            'job_types'=>$job_types,
            'job_statuses'=>$job_statuses,
            'work_statuses'=>$work_statuses,
            'mobile_complaints'=>$mobile_complaints,
        ];
        // return view('back_end.fixancare.mobile_services.generate_pdf.blade',compact('mobile_services','mobile_models','job_types','job_statuses','work_statuses','mobile_complaints'));

        $pdf = Pdf::loadView('back_end.fixancare.mobile_services.generate_pdf', $data)->setPaper('a7', 'portrait')->setWarnings(false);
        return $pdf->download('invoice.pdf');
    }

}
