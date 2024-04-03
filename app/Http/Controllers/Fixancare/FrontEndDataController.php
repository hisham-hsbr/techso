<?php

namespace App\Http\Controllers\fixancare;

use Illuminate\Http\Request;
use App\Models\Fixancare\Image;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\fixancare\FrontEndData;

class FrontEndDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */

   

    public function homeCarouselShow()
    {
        $frontEndDatas = FrontEndData::all();
        return view('back_end.fixancare.front_end_data.home_carousel');
    }
    public function index()
    {
        $images = Image::all();
        $images_portfolio = Image::all()
                            ->where('type', 'portfolio')
                            ->groupBy('group');
        return view('front_end.welcome',compact('images','images_portfolio'))->with('i');
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
    public function show(FrontEndData $frontEndData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FrontEndData $frontEndData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FrontEndData $frontEndData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FrontEndData $frontEndData)
    {
        //
    }
}
