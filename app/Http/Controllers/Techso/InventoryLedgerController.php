<?php

namespace App\Http\Controllers\Techso;

use App\Models\Techso\InventoryLedger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class InventoryLedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('permission:InventoryLedger Read', ['only' => ['index']]);
        // $this->middleware('permission:InventoryLedger Create', ['only' => ['create','store']]);
        // $this->middleware('permission:InventoryLedger Edit', ['only' => ['Edit','Update']]);
        // $this->middleware('permission:InventoryLedger Delete', ['only' => ['destroy']]);

    }

    public function index()
    {
        $inventory_ledgers = InventoryLedger::all();
        $createdByUsers = $inventory_ledgers->sortBy('createdBy')->pluck('createdBy')->unique();
        $updatedByUsers = $inventory_ledgers->sortBy('updatedBy')->pluck('updatedBy')->unique();
        return view('folder.inventory_ledgers.index', compact('inventory_ledgers', 'createdByUsers', 'updatedByUsers'))->with('i');
    }

    public function inventoryLedgersGet()
    {

        $inventory_ledgers = InventoryLedger::all();
        return Datatables::of($inventory_ledgers)

            ->setRowId(function ($inventoryLedger) {
                return $inventoryLedger->id;
            })

            ->editColumn('status', function (InventoryLedger $inventoryLedger) {

                $active = '<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive = '<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($inventoryLedger->status);

                if ($activeId == 1) {
                    $activeId = $active;
                } else {
                    $activeId = $inActive;
                }
                return $activeId;
            })


            ->editColumn('created_by', function (InventoryLedger $inventoryLedger) {

                return ucwords($inventoryLedger->CreatedBy->name);
            })


            ->editColumn('updated_by', function (InventoryLedger $inventoryLedger) {

                return ucwords($inventoryLedger->UpdatedBy->name);
            })
            ->addColumn('created_at', function (InventoryLedger $inventoryLedger) {
                return $inventoryLedger->created_at->format('d-M-Y h:m');
            })
            ->addColumn('updated_at', function (InventoryLedger $inventoryLedger) {

                return $inventoryLedger->updated_at->format('d-M-Y h:m');
            })

            ->addColumn('editLink', function (InventoryLedger $inventoryLedger) {

                $editLink = '<a href="' . route('InventoryLedgers.edit', $inventoryLedger->id) . '" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
                return $editLink;
            })
            ->addColumn('deleteLink', function (InventoryLedger $inventoryLedger) {
                $CSRFToken = "csrf_field()";
                $deleteLink = '
                        <button class="btn btn-link delete-inventoryLedger" data-inventoryLedger_id="' . $inventoryLedger->id . '" type="submit"><i
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
        return view('folder.inventoryLedgers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:inventoryLedgers,code',
            'name' => 'required',
        ]);
        $inventoryLedger = new InventoryLedger();


        $inventoryLedger->code  = $request->code;
        $inventoryLedger->name = $request->name;


        if ($request->status == 0) {
            $inventoryLedger->status == 0;
        }

        $inventoryLedger->status = $request->status;

        $inventoryLedger->created_by = Auth::user()->id;
        $inventoryLedger->updated_by = Auth::user()->id;

        $inventoryLedger->save();

        return redirect()->route('inventoryLedgers.index')
            ->with('message_store', 'InventoryLedger Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(InventoryLedger $inventoryLedger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $inventory_ledgers = InventoryLedger::find($id);
        return view('folder.inventoryLedgers.edit', compact('inventoryLedgers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => "required|unique:inventoryLedgers,code,$id",
        ]);
        $inventoryLedger = InventoryLedger::find($id);


        $inventoryLedger->code  = $request->code;
        $inventoryLedger->name = $request->name;


        if ($request->status == 0) {
            $inventoryLedger->status == 0;
        }

        $inventoryLedger->status = $request->status;

        $inventoryLedger->updated_by = Auth::user()->id;

        $inventoryLedger->save();

        return redirect()->route('inventoryLedgers.index')
            ->with('message_store', 'InventoryLedger Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $inventoryLedger  = InventoryLedger::findOrFail($id);
        $inventoryLedger->delete();

        return redirect()->route('inventoryLedgers.index')->with('message_update', 'InventoryLedger Deleted Successfully');
    }
}
