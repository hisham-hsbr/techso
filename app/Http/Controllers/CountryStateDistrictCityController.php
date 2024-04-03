<?php

namespace App\Http\Controllers;

use App\Models\CountryStateDistrictCity;
use Illuminate\Http\Request;

class CountryStateDistrictCityController extends Controller
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
        $countryStateDistrictCitys = CountryStateDistrictCity::all();
        return view('folder.CountryStateDistrictCitys.folder',compact('CountryStateDistrictCitys'))->with('i');
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
    public function show(CountryStateDistrictCity $countryStateDistrictCity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CountryStateDistrictCity $countryStateDistrictCity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CountryStateDistrictCity $countryStateDistrictCity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CountryStateDistrictCity $countryStateDistrictCity)
    {
        //
    }
}
