<?php

namespace App\Http\Controllers\Techso;

use App\Models\Techso\FinancialLedger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class FinancialLedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('permission:FinancialLedger Read', ['only' => ['index']]);
        // $this->middleware('permission:FinancialLedger Create', ['only' => ['create','store']]);
        // $this->middleware('permission:FinancialLedger Edit', ['only' => ['Edit','Update']]);
        // $this->middleware('permission:FinancialLedger Delete', ['only' => ['destroy']]);

    }

    public function index()
    {
        $financial_ledgers = FinancialLedger::all();
        $createdByUsers = $financial_ledgers->sortBy('createdBy')->pluck('createdBy')->unique();
        $updatedByUsers = $financial_ledgers->sortBy('updatedBy')->pluck('updatedBy')->unique();
        return view('folder.financial_ledgers.index', compact('financial_ledgers', 'createdByUsers', 'updatedByUsers'))->with('i');
    }

    public function financialLedgersGet()
    {

        $financial_ledgers = FinancialLedger::all();
        return Datatables::of($financial_ledgers)

            ->setRowId(function ($financialLedger) {
                return $financialLedger->id;
            })

            ->editColumn('status', function (FinancialLedger $financialLedger) {

                $active = '<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive = '<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($financialLedger->status);

                if ($activeId == 1) {
                    $activeId = $active;
                } else {
                    $activeId = $inActive;
                }
                return $activeId;
            })


            ->editColumn('created_by', function (FinancialLedger $financialLedger) {

                return ucwords($financialLedger->CreatedBy->name);
            })


            ->editColumn('updated_by', function (FinancialLedger $financialLedger) {

                return ucwords($financialLedger->UpdatedBy->name);
            })
            ->addColumn('created_at', function (FinancialLedger $financialLedger) {
                return $financialLedger->created_at->format('d-M-Y h:m');
            })
            ->addColumn('updated_at', function (FinancialLedger $financialLedger) {

                return $financialLedger->updated_at->format('d-M-Y h:m');
            })

            ->addColumn('editLink', function (FinancialLedger $financialLedger) {

                $editLink = '<a href="' . route('FinancialLedgers.edit', $financialLedger->id) . '" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
                return $editLink;
            })
            ->addColumn('deleteLink', function (FinancialLedger $financialLedger) {
                $CSRFToken = "csrf_field()";
                $deleteLink = '
                        <button class="btn btn-link delete-financialLedger" data-financialLedger_id="' . $financialLedger->id . '" type="submit"><i
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
        return view('folder.financialLedgers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:financialLedgers,code',
            'name' => 'required',
        ]);
        $financialLedger = new FinancialLedger();


        $financialLedger->code  = $request->code;
        $financialLedger->name = $request->name;


        if ($request->status == 0) {
            $financialLedger->status == 0;
        }

        $financialLedger->status = $request->status;

        $financialLedger->created_by = Auth::user()->id;
        $financialLedger->updated_by = Auth::user()->id;

        $financialLedger->save();

        return redirect()->route('financialLedgers.index')
            ->with('message_store', 'FinancialLedger Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(FinancialLedger $financialLedger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $financial_ledgers = FinancialLedger::find($id);
        return view('folder.financialLedgers.edit', compact('financialLedgers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => "required|unique:financialLedgers,code,$id",
        ]);
        $financialLedger = FinancialLedger::find($id);


        $financialLedger->code  = $request->code;
        $financialLedger->name = $request->name;


        if ($request->status == 0) {
            $financialLedger->status == 0;
        }

        $financialLedger->status = $request->status;

        $financialLedger->updated_by = Auth::user()->id;

        $financialLedger->save();

        return redirect()->route('financialLedgers.index')
            ->with('message_store', 'FinancialLedger Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $financialLedger  = FinancialLedger::findOrFail($id);
        $financialLedger->delete();

        return redirect()->route('financialLedgers.index')->with('message_update', 'FinancialLedger Deleted Successfully');
    }
}
