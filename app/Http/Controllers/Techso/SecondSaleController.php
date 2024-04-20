<?php

namespace App\Http\Controllers\Techso;


use App\Models\Techso\SecondSale;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SecondSaleController extends Controller
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
        $secondSales = SecondSale::all();
        return view('folder.SecondSales.folder',compact('SecondSales'))->with('i');
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
    public function show(SecondSale $secondSale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SecondSale $secondSale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SecondSale $secondSale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SecondSale $secondSale)
    {
        //
    }
}
