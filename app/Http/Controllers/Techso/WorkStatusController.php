<?php

namespace App\Http\Controllers;

use App\Models\Techso\WorkStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;

class WorkStatusController extends Controller
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
        $workStatuss = WorkStatus::all();
        return view('folder.workStatuss.folder',compact('workStatuss'))->with('i');
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
    public function show(WorkStatus $workStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkStatus $workStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WorkStatus $workStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkStatus $workStatus)
    {
        //
    }
}
