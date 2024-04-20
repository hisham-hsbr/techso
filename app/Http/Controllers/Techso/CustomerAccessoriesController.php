<?php

namespace App\Http\Controllers\Techso;

use App\Models\Techso\CustomerAccessories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class CustomerAccessoriesController extends Controller
{
    private $head_name='Customer Accessories';
    private $route_name='customer-accessories';
    private $snake_name='customer_accessories';

    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('permission:CustomerAccessories Read', ['only' => ['index']]);
        // $this->middleware('permission:CustomerAccessories Create', ['only' => ['create','store']]);
        // $this->middleware('permission:CustomerAccessories Edit', ['only' => ['Edit','Update']]);
        // $this->middleware('permission:CustomerAccessories Delete', ['only' => ['destroy']]);

    }

    public function index()
    {
        $customer_accessories = CustomerAccessories::all();
        $createdByUsers = $customer_accessories->sortBy('createdBy')->pluck('createdBy')->unique();
        $updatedByUsers = $customer_accessories->sortBy('updatedBy')->pluck('updatedBy')->unique();
        return view('back_end.techso.masters.customer_accessories.index')->with(
           [
               'head_name'=>$this->head_name,
               'route_name'=>$this->route_name,
               'customer_accessories' => $customer_accessories,
               'createdByUsers' => $createdByUsers,
               'updatedByUsers' => $updatedByUsers,
           ]
       );
    }

    public function customerAccessoriesGet()
    {

        $customerAccessories = CustomerAccessories::all();
        return Datatables::of($customerAccessories)

        ->setRowId(function ($customerAccessories) {
            return $customerAccessories->id;
            })

            ->editColumn('status', function (CustomerAccessories $customerAccessories) {

                $active='<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive='<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($customerAccessories->status);

                    if($activeId==1){
                        $activeId = $active;
                    }
                    else {
                        $activeId = $inActive;
                    }
                    return $activeId;
            })


        ->editColumn('created_by', function (CustomerAccessories $customerAccessories) {

            return ucwords($customerAccessories->CreatedBy->name);
        })


        ->editColumn('updated_by', function (CustomerAccessories $customerAccessories) {

            return ucwords($customerAccessories->UpdatedBy->name);
        })
        ->addColumn('created_at', function (CustomerAccessories $customerAccessories) {
            return $customerAccessories->created_at->format('d-M-Y h:m');
        })
        ->addColumn('updated_at', function (CustomerAccessories $customerAccessories) {

            return $customerAccessories->updated_at->format('d-M-Y h:m');
        })

        ->addColumn('editLink', function (CustomerAccessories $customerAccessories) {

            $editLink ='<a href="'. route('customer-accessories.edit', $customerAccessories->id) .'" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
               return $editLink;
        })
        ->addColumn('deleteLink', function (CustomerAccessories $customerAccessories) {
           $CSRFToken = "csrf_field()";
            $deleteLink ='
                        <button class="btn btn-link delete-customer_accessories" data-customer_accessories_id="'.$customerAccessories->id.'" type="submit"><i
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
        return view('back_end.techso.masters.customer_accessories.create')->with(
            [
                'head_name'=>$this->head_name,
                'route_name'=>$this->route_name,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:customer_accessories,code',
            'name' => 'required',
        ]);
        $customerAccessories = new CustomerAccessories();


        $customerAccessories->code  = $request->code;
        $customerAccessories->name = $request->name;


        if ($request->status==0)
            {
                $customerAccessories->status==0;
            }

        $customerAccessories->status = $request->status;

        $customerAccessories->created_by = Auth::user()->id;
        $customerAccessories->updated_by = Auth::user()->id;

        $customerAccessories->save();

        return redirect()->route('customer-accessories.index')
                        ->with('message_store', 'CustomerAccessories Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerAccessories $customerAccessories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer_accessories = CustomerAccessories::find($id);
        return view('back_end.techso.masters.customer_accessories.edit')->with(
            [
                'head_name'=>$this->head_name,
                'route_name'=>$this->route_name,
                'customer_accessories'=>$customer_accessories,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => "required|unique:customer_accessories,code,$id",
        ]);
        $customerAccessories = CustomerAccessories::find($id);


        $customerAccessories->code  = $request->code;
        $customerAccessories->name = $request->name;


        if ($request->status==0)
            {
                $customerAccessories->status==0;
            }

        $customerAccessories->status = $request->status;

        $customerAccessories->updated_by = Auth::user()->id;

        $customerAccessories->save();

        return redirect()->route('customer-accessories.index')
                        ->with('message_store', 'CustomerAccessories Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
    {
        $customerAccessories  = CustomerAccessories::findOrFail($id);
        $customerAccessories->delete();

        return redirect()->route('customer-accessories.index')->with('message_update', 'CustomerAccessories Deleted Successfully');
    }
}
