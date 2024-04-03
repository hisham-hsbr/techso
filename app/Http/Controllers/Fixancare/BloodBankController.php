<?php

namespace App\Http\Controllers\fixancare;

use App\Models\Blood;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Models\Fixancare\BloodBank;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BloodBankController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        // $this->middleware('auth');

    }

    public function index()
    {
        $blood_banks = BloodBank::all();
        return view('front_end.blood_bank.index',compact('blood_banks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bloods = Blood::where('status', 1)->get();
        $country_list = DB::table('country_state_district_cities')
                        ->groupBy('country')
                        ->where('status', 1)->get();
        return view('front_end.blood_bank.create',compact('bloods','country_list'));
    }

    function csdcsGet(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('country_state_district_cities')
        ->where($select, $value)
        ->groupBy($dependent)
        ->get();
        $output = '<option value="">Select '.ucfirst($dependent).'</option>';
        foreach($data as $row)
        {
        $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }
        echo $output;
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
    public function show(BloodBank $bloodBank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BloodBank $bloodBank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BloodBank $bloodBank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BloodBank $bloodBank)
    {
        //
    }
}
