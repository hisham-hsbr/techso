<?php

namespace App\Http\Controllers\Techso;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Techso\JobType;
use App\Models\Techso\Product;
use App\Models\Techso\Service;
use App\Models\Techso\Customer;
use App\Models\Techso\Complaint;
use App\Models\Techso\JobStatus;
use Yajra\Datatables\Datatables;
use App\Models\Techso\WorkStatus;
use App\Notifications\JobRegister;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Techso\CustomerAccessories;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class ServiceController extends Controller
{
    private $head_name = 'Service';
    private $route_name = 'services';
    private $snake_name = 'service';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $services = Service::all();
        $createdByUsers = $services->sortBy('createdBy')->pluck('createdBy')->unique();
        $updatedByUsers = $services->sortBy('updatedBy')->pluck('updatedBy')->unique();
        $job_number = $services->sortBy('job_number')->pluck('job_number')->unique();
        $job_types = $services->sortBy('jobType')->pluck('jobType')->unique();
        $job_statuses = $services->sortBy('jobStatus')->pluck('jobStatus')->unique();
        $work_statuses = $services->sortBy('workStatus')->pluck('workStatus')->unique();
        $complaints = $services->sortBy('complaint')->pluck('complaint')->unique();
        $products = $services->sortBy('product')->pluck('product')->unique();
        // return view('back_end.techso.services.index',compact('services','createdByUsers','updatedByUsers'))->with('i');
        return view('back_end.techso.services.index')->with(
            [
                'head_name' => $this->head_name,
                'route_name' => $this->route_name,
                'services' => $services,
                'job_number' => $job_number,
                'job_types' => $job_types,
                'job_statuses' => $job_statuses,
                'work_statuses' => $work_statuses,
                'complaints' => $complaints,
                'products' => $products,
                'createdByUsers' => $createdByUsers,
                'updatedByUsers' => $updatedByUsers,
            ]
        );
    }

    public function createNotification()
    {

        return view('back_end.users_management.notifications.create')->with(
            [
                'head_name' => 'Service Notification',
                'route_name' => $this->route_name
            ]
        );
    }
    public function serviceNotification(Request $request)
    {
        $users = User::all();
        $delay = Carbon::now()->addSeconds(10);
        // User::find(2)->notify(new JobRegister)->delay($delay);
        // User::find(1)->notify(new JobRegister);
        Notification::send($users, new JobRegister($request));
        // Notification::send($users, new JobRegister);
        // $data="hai mr hisham";

        // Notification::route('mail', 'hisham9393@gmail.com')
        //     // ->route('vonage', '5555555555')
        //     // ->route('slack', '#slack-channel')
        //     // ->route('broadcast', [new Channel('channel-name')])
        //     // ->notify(new JobRegister);
        //     ->notify(new JobRegister($data));

        return redirect()->route('services.index')
            ->with('message_store', 'Notification send Successfully');
    }
    public function servicesGet()
    {

        $services = Service::all();

        // $services = Service::with('customerAccessories')->get();
        // $services = Service::orderByRaw('ISNULL(display_order), display_order ASC')->get();
        // $services = Service::orderBy('job_number', 'DESC');
        return Datatables::of($services)

            ->setRowId(function ($service) {
                return $service->id;
            })

            ->editColumn('status', function (Service $service) {

                $active = '<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive = '<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($service->status);

                if ($activeId == 1) {
                    $activeId = $active;
                } else {
                    $activeId = $inActive;
                }
                return $activeId;
            })

            ->editColumn('date', function (Service $service) {

                if (is_string($service->date)) {
                    $date = Carbon::parse($service->date);
                } else {
                    // If $service->date is already a DateTime object, use it directly
                    $date = $service->date;
                }
                return $date->format('d-M-Y');
            })
            ->addColumn('jobNumber', function (Service $service) {
                return "TJ-" . $service->job_number;
            })



            ->editColumn('jobType', function (Service $service) {

                return ucwords($service->jobType->name);
            })

            ->editColumn('customerName', function (Service $service) {

                return ucwords($service->customer->name);
            })

            ->editColumn('productName', function (Service $service) {

                return ucwords($service->product->name);
            })

            ->editColumn('customerAccessories', function (Service $service) {

                // $data=[];

                //     foreach ($service->customerAccessories as $accessories){

                //         $id=$accessories->customer_accessories_id;

                //         $name = CustomerAccessories::find($id)->name;


                //         $data[]=array_push($data, $name);
                //         // $data[] = '<label class="badge badge-warning">'.$name.'</label>';

                //     }

                // return $data;

                $customer_accessories = CustomerAccessories::all();
                $name = "";
                foreach ($customer_accessories as $accessories) {

                    $data = $service->customerAccessories;
                    $array = json_decode($data, true);

                    foreach ($array as $item) {
                        if ($item['customer_accessories_id'] == $accessories->id) {
                            $name = $accessories->name;
                        }
                        $name = $name . ", " . $name;
                    }
                    // return $name;
                }

                return $name;

                //     {{ $item['customer_accessories_id'] == $accessories->id ? 'selected' : '' }} endforeach
                //     value="{{ $accessories->id }}">{{ $accessories->name
                // endforeach






            })

            // ->addColumn('customerAccessories', function (Service $service) {
            //     return $service->customerAccessories->pluck('name'); // Access the related posts' titles
            // })

            // ---------

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

            ->addColumn('viewLink', function (Service $service) {

                $viewLink = '<a href="' . route('services.show', $service->id) . '" class="ml-2"><i class="fa-solid fa fa-eye"></i></a>';
                return $viewLink;
            })

            ->addColumn('editLink', function (Service $service) {

                $editLink = '<a href="' . route('services.edit', $service->id) . '" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
                return $editLink;
            })
            ->addColumn('pdfLink', function (Service $service) {

                $pdfLink = '<a href="' . route('services.pdf', $service->id) . '" class="ml-2"><i class="fa-solid fa-file-pdf"></i></a>';
                return $pdfLink;
            })
            ->addColumn('deleteLink', function (Service $service) {
                $CSRFToken = "csrf_field()";
                $deleteLink = '
                        <button class="btn btn-link delete-service" data-service_id="' . $service->id . '" type="submit"><i
                                class="fa-solid fa-trash-can text-danger"></i>
                        </button>';
                return $deleteLink;
            })
            ->addColumn('action', function (Service $service) {
                $CSRFToken = "csrf_field()";
                $action =
                    '
                        <a href="' . route('services.show', $service->id) . '" class="ml-2"><i class="fa-solid fa fa-eye text-success"></i></a>
                        <a href="' . route('services.pdf', $service->id) . '" class="ml-2"><i class="fa-solid fa-file-pdf"></i></a>
                        <a href="' . route('services.edit', $service->id) . '" class="ml-2"><i class="fa-solid fa-edit text-warning"></i></a>
                        <button class="btn btn-link delete-service" data-service_id="' . $service->id . '" type="submit"><i
                                class="fa-solid fa-trash-can text-danger"></i>
                        </button>
                        ';
                return $action;
            })


            ->rawColumns(['jobStatus', 'date', 'customerAccessories', 'pendingStatus', 'jobType', 'workStatus', 'mobileModel', 'mobileComplaint', 'status', 'editLink', 'pdfLink', 'viewLink', 'deleteLink', 'action'])
            ->toJson();
    }
    public function create()
    {
        $job_number = Service::max('job_number') + 1;
        $customers = Customer::where('status', 1)->get();
        $Services = JobType::where('status', 1)->get();
        $products = Product::where('status', 1)->get();
        $complaints = Complaint::where('status', 1)->get();
        $work_statuses = WorkStatus::where('status', 1)->get();
        $job_statuses = JobStatus::where('status', 1)->get();
        $customer_accessories = CustomerAccessories::where('status', 1)->get();
        return view('back_end.techso.services.create')->with(
            [
                'head_name' => $this->head_name,
                'route_name' => $this->route_name,
                'job_number' => $job_number,
                'customers' => $customers,
                'job_types' => $Services,
                'products' => $products,
                'complaints' => $complaints,
                'work_statuses' => $work_statuses,
                'job_statuses' => $job_statuses,
                'customer_accessories' => $customer_accessories,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'job_number' => 'required|unique:services,job_number',
            'date' => 'required',
            'job_type_id' => 'required',
            'customer_id' => 'required',
            'product_id' => 'required',
            'serial_number' => 'required',
        ]);
        $Service = new Service();

        $job_number = $request->job_number;

        $job_number_trim = substr($job_number, 3);


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
        // $Service->customer_accessories = $request->customer_accessories;
        // $Service->customer_accessories_id = $request->customer_accessories;
        $Service->delivered_date = $request->delivered_date;
        $Service->payment = $request->payment;
        $Service->advance = $request->advance;
        $Service->balance = $request->balance;
        $Service->description = $request->description;


        if ($request->status == 0) {
            $Service->status == 0;
        }

        $Service->status = $request->status;

        $Service->created_by = Auth::user()->id;
        $Service->updated_by = Auth::user()->id;

        $Service->save();



        $customerAccessories = $request->customer_accessories;

        for ($i = 0; $i < count((is_countable($customerAccessories) ? $customerAccessories : [])); $i++) {
            // for ($i=0; $i<count($education);$i++){
            $datasaveCustomerAccessories = [
                // 'user_id'=>$id,
                'service_id' => $Service->id,
                'customer_accessories_id' => $customerAccessories[$i],
            ];
            DB::table('accessories_customers')->insert($datasaveCustomerAccessories);
        }

        return redirect()->route('services.index')
            ->with('message_store', 'Service Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $service = Service::find($id);
        $customers = Customer::where('status', 1)->get();
        $job_types = JobType::where('status', 1)->get();
        $products = Product::where('status', 1)->get();
        $complaints = Complaint::where('status', 1)->get();
        $work_statuses = WorkStatus::where('status', 1)->get();
        $job_statuses = JobStatus::where('status', 1)->get();
        $customer_accessories = CustomerAccessories::where('status', 1)->get();
        return view('back_end.techso.services.show')->with(
            [
                'head_name' => $this->head_name,
                'route_name' => $this->route_name,
                'customers' => $customers,
                'service' => $service,
                'products' => $products,
                'complaints' => $complaints,
                'work_statuses' => $work_statuses,
                'job_types' => $job_types,
                'job_statuses' => $job_statuses,
                'customer_accessories' => $customer_accessories,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $service = Service::find($id);
        $customers = Customer::where('status', 1)->get();
        $job_types = JobType::where('status', 1)->get();
        $products = Product::where('status', 1)->get();
        $complaints = Complaint::where('status', 1)->get();
        $work_statuses = WorkStatus::where('status', 1)->get();
        $job_statuses = JobStatus::where('status', 1)->get();
        $customer_accessories = CustomerAccessories::where('status', 1)->get();
        return view('back_end.techso.services.edit')->with(
            [
                'head_name' => $this->head_name,
                'route_name' => $this->route_name,
                'customers' => $customers,
                'service' => $service,
                'products' => $products,
                'complaints' => $complaints,
                'work_statuses' => $work_statuses,
                'job_types' => $job_types,
                'job_statuses' => $job_statuses,
                'customer_accessories' => $customer_accessories,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'job_number' => "required|unique:services,job_number,$id",
            'date' => 'required',
            'job_type_id' => 'required',
            'customer_id' => 'required',
            'product_id' => 'required',
            'serial_number' => 'required',
        ]);
        $Service = Service::find($id);

        $job_number = $request->job_number;
        $job_number_trim = substr($job_number, 3);

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
        $Service->delivered_date = $request->delivered_date;
        $Service->payment = $request->payment;
        $Service->advance = $request->advance;
        $Service->balance = $request->balance;
        $Service->description = $request->description;


        if ($request->status == 0) {
            $Service->status == 0;
        }

        $Service->status = $request->status;

        $Service->created_by = Auth::user()->id;
        $Service->updated_by = Auth::user()->id;

        $Service->save();
        DB::table('accessories_customers')->where('service_id', $id)->delete();

        $customerAccessories = $request->customer_accessories;

        for ($i = 0; $i < count((is_countable($customerAccessories) ? $customerAccessories : [])); $i++) {

            $dataSaveCustomerAccessories = [
                'service_id' => $Service->id,
                'customer_accessories_id' => $customerAccessories[$i],
            ];
            DB::table('accessories_customers')->insert($dataSaveCustomerAccessories);
        }

        return redirect()->route('services.index')
            ->with('message_store', 'Service Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $job_type  = Service::findOrFail($id);
        $job_type->delete();

        return redirect()->route('job-types.index')->with('message_update', 'Service Deleted Successfully');
    }

    public function servicesPDF($id)
    {
        $services = Service::find($id);
        $products = Product::all();
        $job_types = JobType::all();
        $job_statuses = JobStatus::all();
        $work_statuses = WorkStatus::all();
        $complaints = Complaint::all();
        $job_number = $services->job_number;
        $pdf_name = 'Job Number TF-' . $job_number;
        $data = [
            'services' => $services,
            'products' => $products,
            'job_types' => $job_types,
            'job_statuses' => $job_statuses,
            'work_statuses' => $work_statuses,
            'complaints' => $complaints,
        ];
        // return view('back_end.fixancare.services.generate_pdf.blade',compact('services','products','job_types','job_statuses','work_statuses','complaints'));

        $pdf = Pdf::loadView('back_end.techso.services.generate_pdf', $data)->setPaper('a7', 'portrait')->setWarnings(false);
        return $pdf->download($pdf_name . '.pdf');
    }
}
