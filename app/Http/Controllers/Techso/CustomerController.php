<?php

namespace App\Http\Controllers\Techso;

use App\Models\Techso\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
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
        $customers = Customer::all();
        $createdByUsers = $customers->sortBy('createdBy')->pluck('createdBy')->unique();
        $updatedByUsers = $customers->sortBy('updatedBy')->pluck('updatedBy')->unique();
        return view('back_end.techso.masters.customers.index',compact('customers','createdByUsers','updatedByUsers'))->with('i');
    }

    public function customersGet()
    {

        $customers = Customer::all();
        return Datatables::of($customers)

        ->setRowId(function ($customer) {
            return $customer->id;
            })

            ->editColumn('status', function (Customer $customer) {

                $active='<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive='<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($customer->status);

                    if($activeId==1){
                        $activeId = $active;
                    }
                    else {
                        $activeId = $inActive;
                    }
                    return $activeId;
            })


        ->editColumn('created_by', function (Customer $customer) {

            return ucwords($customer->CreatedBy->name);
        })


        ->editColumn('updated_by', function (Customer $customer) {

            return ucwords($customer->UpdatedBy->name);
        })
        ->addColumn('created_at', function (Customer $customer) {
            return $customer->created_at->format('d-M-Y h:m');
        })
        ->addColumn('updated_at', function (Customer $customer) {

            return $customer->updated_at->format('d-M-Y h:m');
        })

        ->addColumn('editLink', function (Customer $customer) {

            $editLink ='<a href="'. route('customers.edit', $customer->id) .'" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
               return $editLink;
        })
        ->addColumn('deleteLink', function (Customer $customer) {
            $CSRFToken = "csrf_field()";
             $deleteLink ='
                         <button class="btn btn-link delete-customer" data-customer_id="'.$customer->id.'" type="submit"><i
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
        return view('back_end.techso.masters.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'phone_1' => 'required|unique:customers,phone_1',
            'name' => 'required',
            'contact_name' => 'required',
        ]);
        $customer = new Customer();


        $customer->name = $request->name;
        $customer->local_name = $request->local_name;
        $customer->contact_name = $request->contact_name;
        $customer->phone_1 = $request->phone_1;
        $customer->phone_2 = $request->phone_2;
        $customer->address = $request->address;
        $customer->description = $request->description;


        if ($request->status==0)
            {
                $customer->status==0;
            }

        $customer->status = $request->status;

        $customer->created_by = Auth::user()->id;
        $customer->updated_by = Auth::user()->id;

        $customer->save();

        return redirect()->route('customers.index')
                        ->with('message_store', 'Customer Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('back_end.techso.masters.customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'phone_1' => "required|unique:customers,phone_1,$id",
            'name' => 'required',
            'contact_name' => 'required',
        ]);
        $customer = Customer::find($id);


        $customer->name = $request->name;
        $customer->local_name = $request->local_name;
        $customer->contact_name = $request->contact_name;
        $customer->phone_1 = $request->phone_1;
        $customer->phone_2 = $request->phone_2;
        $customer->address = $request->address;
        $customer->description = $request->description;


        if ($request->status==0)
            {
                $customer->status==0;
            }

        $customer->status = $request->status;

        $customer->updated_by = Auth::user()->id;

        $customer->save();

        return redirect()->route('customers.index')
                        ->with('message_store', 'Customer Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer  = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index')
                ->with('message_update', 'Customer Deleted Successfully');
    }
}
