<?php

namespace App\Http\Controllers\Techso;

use App\Models\Techso\SaleRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class SaleRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('permission:SaleRegister Read', ['only' => ['index']]);
        // $this->middleware('permission:SaleRegister Create', ['only' => ['create','store']]);
        // $this->middleware('permission:SaleRegister Edit', ['only' => ['Edit','Update']]);
        // $this->middleware('permission:SaleRegister Delete', ['only' => ['destroy']]);

    }

    public function index()
    {
        $sale_registers = SaleRegister::all();
        $createdByUsers = $sale_registers->sortBy('createdBy')->pluck('createdBy')->unique();
        $updatedByUsers = $sale_registers->sortBy('updatedBy')->pluck('updatedBy')->unique();
        return view('folder.sale_registers.index', compact('sale_registers', 'createdByUsers', 'updatedByUsers'))->with('i');
    }

    public function saleRegistersGet()
    {

        $saleRegisters = SaleRegister::all();
        return Datatables::of($saleRegisters)

            ->setRowId(function ($saleRegister) {
                return $saleRegister->id;
            })

            ->editColumn('status', function (SaleRegister $saleRegister) {

                $active = '<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive = '<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($saleRegister->status);

                if ($activeId == 1) {
                    $activeId = $active;
                } else {
                    $activeId = $inActive;
                }
                return $activeId;
            })


            ->editColumn('created_by', function (SaleRegister $saleRegister) {

                return ucwords($saleRegister->CreatedBy->name);
            })


            ->editColumn('updated_by', function (SaleRegister $saleRegister) {

                return ucwords($saleRegister->UpdatedBy->name);
            })
            ->addColumn('created_at', function (SaleRegister $saleRegister) {
                return $saleRegister->created_at->format('d-M-Y h:m');
            })
            ->addColumn('updated_at', function (SaleRegister $saleRegister) {

                return $saleRegister->updated_at->format('d-M-Y h:m');
            })

            ->addColumn('editLink', function (SaleRegister $saleRegister) {

                $editLink = '<a href="' . route('SaleRegisters.edit', $saleRegister->id) . '" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
                return $editLink;
            })
            ->addColumn('deleteLink', function (SaleRegister $saleRegister) {
                $CSRFToken = "csrf_field()";
                $deleteLink = '
                        <button class="btn btn-link delete-saleRegister" data-saleRegister_id="' . $saleRegister->id . '" type="submit"><i
                                class="fa-solid fa-trash-can text-danger"></i>
                        </button>';
                return $deleteLink;
            })


            ->rawColumns(['status', 'editLink', 'deleteLink'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('folder.saleRegisters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:saleRegisters,code',
            'name' => 'required',
        ]);
        $saleRegister = new SaleRegister();


        $saleRegister->code  = $request->code;
        $saleRegister->name = $request->name;


        if ($request->status == 0) {
            $saleRegister->status == 0;
        }

        $saleRegister->status = $request->status;

        $saleRegister->created_by = Auth::user()->id;
        $saleRegister->updated_by = Auth::user()->id;

        $saleRegister->save();

        return redirect()->route('saleRegisters.index')
            ->with('message_store', 'SaleRegister Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(SaleRegister $saleRegister)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $saleRegisters = SaleRegister::find($id);
        return view('folder.saleRegisters.edit', compact('saleRegisters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => "required|unique:saleRegisters,code,$id",
        ]);
        $saleRegister = SaleRegister::find($id);


        $saleRegister->code  = $request->code;
        $saleRegister->name = $request->name;


        if ($request->status == 0) {
            $saleRegister->status == 0;
        }

        $saleRegister->status = $request->status;

        $saleRegister->updated_by = Auth::user()->id;

        $saleRegister->save();

        return redirect()->route('saleRegisters.index')
            ->with('message_store', 'SaleRegister Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $saleRegister  = SaleRegister::findOrFail($id);
        $saleRegister->delete();

        return redirect()->route('saleRegisters.index')->with('message_update', 'SaleRegister Deleted Successfully');
    }
}
