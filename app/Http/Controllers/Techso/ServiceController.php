<?php

namespace App\Http\Controllers\Techso;

use Illuminate\Http\Request;
use App\Models\Techso\JobType;
use App\Models\Techso\Product;
use App\Models\Techso\Service;
use App\Models\Techso\Customer;
use App\Models\Techso\Complaint;
use App\Models\Techso\JobStatus;
use Yajra\Datatables\Datatables;
use App\Models\Techso\WorkStatus;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Techso\CustomerAccessories;

class ServiceController extends Controller
{
    private $head_name='Service';
    private $route_name='services';
    private $snake_name='service';

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $services = Service::all();
        $createdByUsers = $services->sortBy('createdBy')->pluck('createdBy')->unique();
        $updatedByUsers = $services->sortBy('updatedBy')->pluck('updatedBy')->unique();
        return view('back_end.techso.services.index',compact('services','createdByUsers','updatedByUsers'))->with('i');
    }

    public function servicesGet()
    {

        $services = Service::all();
        // $services = Service::orderByRaw('ISNULL(display_order), display_order ASC')->get();
        // $services = Service::orderBy('job_number', 'DESC');
        return Datatables::of($services)

        ->setRowId(function ($service) {
            return $service->id;
            })

            ->editColumn('status', function (Service $service) {

                $active='<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive='<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($service->status);

                    if($activeId==1){
                        $activeId = $active;
                    }
                    else {
                        $activeId = $inActive;
                    }
                    return $activeId;
            })

        // ->addColumn('date', function (Service $service) {
        //     return $service->date->format('d-M-Y');
        // })
        ->addColumn('jobNumber', function (Service $service) {
            return "F-".$service->job_number;
        })



        ->editColumn('jobType', function (Service $service) {

            return ucwords($service->jobType->name);
        })

        ->editColumn('customerName', function (Service $service) {

            return ucwords($service->customerName->name);
        })

        ->editColumn('productName', function (Service $service) {

            return ucwords($service->productName->name);
        })


        // ----------

        ->editColumn('created_by', function (Service $service) {

            return ucwords($service->CreatedBy->name);
        })

        ->editColumn('updated_by', function (Service $service) {

            return ucwords($service->UpdatedBy->name);
        })
        ->addColumn('created_at', function (Service $service) {
            return $service->created_at->format('d-M-Y h:m');
        })
        ->addColumn('updated_at', function (Service $service) {

            return $service->updated_at->format('d-M-Y h:m');
        })

        ->addColumn('editLink', function (Service $service) {

            $editLink ='<a href="'. route('services.edit', $service->id) .'" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
               return $editLink;
        })
        ->addColumn('pdfLink', function (Service $service) {

            $pdfLink ='<a href="'. route('services.pdf', $service->id) .'" class="ml-2"><i class="fa-solid fa-file-pdf"></i></a>';
               return $pdfLink;
        })
        ->addColumn('deleteLink', function (Service $service) {
           $CSRFToken = "csrf_field()";
            $deleteLink ='
                        <button class="btn btn-link delete-Service" data-Service_id="'.$service->id.'" type="submit"><i
                                class="fa-solid fa-trash-can text-danger"></i>
                        </button>';
               return $deleteLink;
        })


       ->rawColumns(['jobStatus','pendingStatus','jobType','workStatus','mobileModel', 'mobileComplaint','status','editLink','pdfLink','deleteLink'])
        ->toJson();
    }
    public function create()
    {
        $job_number = Service::max('job_number')+1;
        $customers = Customer::where('status', 1)->get();
        $Services = JobType::where('status', 1)->get();
        $products = Product::where('status', 1)->get();
        $complaints = Complaint::where('status', 1)->get();
        $work_statuses = WorkStatus::where('status', 1)->get();
        $job_statuses = JobStatus::where('status', 1)->get();
        $customer_accessories = CustomerAccessories::where('status', 1)->get();
        return view('back_end.techso.services.create')->with(
            [
            'head_name'=>$this->head_name,
            'route_name'=>$this->route_name,
            'job_number'=>$job_number,
            'customers'=>$customers,
            'job_types'=>$Services,
            'products'=>$products,
            'complaints'=>$complaints,
            'work_statuses'=>$work_statuses,
            'job_statuses'=>$job_statuses,
            'customer_accessories'=>$customer_accessories,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'job_number' => 'required|unique:services,job_number',
            'date' => 'required',
            'job_number' => 'required',
            'job_type_id' => 'required',
            'customer_id' => 'required',
            'product_id' => 'required',
            'serial_number' => 'required',
        ]);
        $Service = new Service();

        $job_number = $request->job_number;
        $job_number_trim = substr($job_number, 2);

        $Service->date = $request->date;
        $Service->job_number = $job_number_trim;
        $Service->date = $request->date;
        $Service->job_type_id = $request->job_type_id;
        $Service->customer_id = $request->customer_id;
        $Service->product_id = $request->product_id;
        $Service->serial_number = $request->serial_number;
        $Service->lock = $request->lock;
        $Service->complaint_id = $request->complaint_id;
        $Service->complaint_details = $request->complaint_details;
        $Service->work_status_id = $request->work_status_id;
        $Service->work_status_details = $request->work_status_details;
        $Service->job_status_id = $request->job_status_id;
        $Service->job_status_details = $request->job_status_details;
        $Service->customer_accessories = $request->customer_accessories;
        // $Service->customer_accessories_id = $request->customer_accessories;
        $Service->delivered_date = $request->delivered_date;
        $Service->payment = $request->payment;
        $Service->advance = $request->advance;
        $Service->balance = $request->balance;
        $Service->description = $request->description;


        if ($request->status==0)
            {
                $Service->status==0;
            }

        $Service->status = $request->status;

        $Service->created_by = Auth::user()->id;
        $Service->updated_by = Auth::user()->id;

        $Service->save();

        return redirect()->route('services.index')
                        ->with('message_store', 'Service Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
