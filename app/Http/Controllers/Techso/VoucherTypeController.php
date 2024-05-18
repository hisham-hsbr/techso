<?php

namespace App\Http\Controllers\Techso;

use App\Models\Techso\VoucherType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class VoucherTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('permission:VoucherType Read', ['only' => ['index']]);
        // $this->middleware('permission:VoucherType Create', ['only' => ['create','store']]);
        // $this->middleware('permission:VoucherType Edit', ['only' => ['Edit','Update']]);
        // $this->middleware('permission:VoucherType Delete', ['only' => ['destroy']]);

    }

    public function index()
    {
        $voucher_types = VoucherType::all();
        $createdByUsers = $voucher_types->sortBy('createdBy')->pluck('createdBy')->unique();
        $updatedByUsers = $voucher_types->sortBy('updatedBy')->pluck('updatedBy')->unique();
        return view('folder.voucher_types.index', compact('voucher_types', 'createdByUsers', 'updatedByUsers'))->with('i');
    }

    public function voucherTypesGet()
    {

        $voucherTypes = VoucherType::all();
        return Datatables::of($voucherTypes)

            ->setRowId(function ($voucherType) {
                return $voucherType->id;
            })

            ->editColumn('status', function (VoucherType $voucherType) {

                $active = '<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive = '<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($voucherType->status);

                if ($activeId == 1) {
                    $activeId = $active;
                } else {
                    $activeId = $inActive;
                }
                return $activeId;
            })


            ->editColumn('created_by', function (VoucherType $voucherType) {

                return ucwords($voucherType->CreatedBy->name);
            })


            ->editColumn('updated_by', function (VoucherType $voucherType) {

                return ucwords($voucherType->UpdatedBy->name);
            })
            ->addColumn('created_at', function (VoucherType $voucherType) {
                return $voucherType->created_at->format('d-M-Y h:m');
            })
            ->addColumn('updated_at', function (VoucherType $voucherType) {

                return $voucherType->updated_at->format('d-M-Y h:m');
            })

            ->addColumn('editLink', function (VoucherType $voucherType) {

                $editLink = '<a href="' . route('VoucherTypes.edit', $voucherType->id) . '" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
                return $editLink;
            })
            ->addColumn('deleteLink', function (VoucherType $voucherType) {
                $CSRFToken = "csrf_field()";
                $deleteLink = '
                        <button class="btn btn-link delete-voucherType" data-voucherType_id="' . $voucherType->id . '" type="submit"><i
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
        return view('folder.voucherTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:voucherTypes,code',
            'name' => 'required',
        ]);
        $voucherType = new VoucherType();


        $voucherType->code  = $request->code;
        $voucherType->name = $request->name;


        if ($request->status == 0) {
            $voucherType->status == 0;
        }

        $voucherType->status = $request->status;

        $voucherType->created_by = Auth::user()->id;
        $voucherType->updated_by = Auth::user()->id;

        $voucherType->save();

        return redirect()->route('voucherTypes.index')
            ->with('message_store', 'VoucherType Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(VoucherType $voucherType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $voucherTypes = VoucherType::find($id);
        return view('folder.voucherTypes.edit', compact('voucherTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => "required|unique:voucherTypes,code,$id",
        ]);
        $voucherType = VoucherType::find($id);


        $voucherType->code  = $request->code;
        $voucherType->name = $request->name;


        if ($request->status == 0) {
            $voucherType->status == 0;
        }

        $voucherType->status = $request->status;

        $voucherType->updated_by = Auth::user()->id;

        $voucherType->save();

        return redirect()->route('voucherTypes.index')
            ->with('message_store', 'VoucherType Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $voucherType  = VoucherType::findOrFail($id);
        $voucherType->delete();

        return redirect()->route('voucherTypes.index')->with('message_update', 'VoucherType Deleted Successfully');
    }
}
