<?php

namespace App\Http\Controllers\Techso;

use App\Http\Controllers\Controller;
use App\Models\Techso\CustomerType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;

class CustomerTypeController extends Controller
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
        $customerTypes = CustomerType::all();
        return view('folder.customerTypes.folder',compact('customerTypes'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerType $customerType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerType $customerType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomerType $customerType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerType $customerType)
    {
        //
    }
}
