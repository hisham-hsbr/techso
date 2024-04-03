<?php

namespace App\Http\Controllers;

use App\Models\Blood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BloodController extends Controller
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
        $bloods = Blood::all();
        return view('back_end.masters.bloods.index',compact('bloods'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $bloods = Blood::all();
        return view('back_end.masters.bloods.create',compact('bloods'))->with('i');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:bloods',
            'description' => 'required',
            ]);

        $blood = new Blood();
        $blood->name = $request->name;
        $blood->description = $request->description;

        if ($request->status==0)
        {
            $blood->status==0;
        }

        $blood->status = $request->status;

        $blood->created_by = Auth::user()->id;
        $blood->updated_by = Auth::user()->id;

        $blood->save();
        return redirect(route('bloods.index'))->with('message_store', 'Blood Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blood $blood)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blood $blood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blood $blood)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blood $blood)
    {
        //
    }
}
