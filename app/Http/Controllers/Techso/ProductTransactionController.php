<?php

namespace App\Http\Controllers;

use App\Models\Techso\ProductTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;

class ProductTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('permission:ProductTransaction Read', ['only' => ['index']]);
        // $this->middleware('permission:ProductTransaction Create', ['only' => ['create','store']]);
        // $this->middleware('permission:ProductTransaction Edit', ['only' => ['Edit','Update']]);
        // $this->middleware('permission:ProductTransaction Delete', ['only' => ['destroy']]);

    }

    public function index()
    {
        $product_transactions = ProductTransaction::all();
        $createdByUsers = $product_transactions->sortBy('createdBy')->pluck('createdBy')->unique();
        $updatedByUsers = $product_transactions->sortBy('updatedBy')->pluck('updatedBy')->unique();
        return view('folder.product_transactions.index', compact('product_transactions', 'createdByUsers', 'updatedByUsers'))->with('i');
    }

    public function productTransactionsGet()
    {

        $productTransactions = ProductTransaction::all();
        return Datatables::of($productTransactions)

            ->setRowId(function ($productTransaction) {
                return $productTransaction->id;
            })

            ->editColumn('status', function (ProductTransaction $productTransaction) {

                $active = '<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive = '<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($productTransaction->status);

                if ($activeId == 1) {
                    $activeId = $active;
                } else {
                    $activeId = $inActive;
                }
                return $activeId;
            })


            ->editColumn('created_by', function (ProductTransaction $productTransaction) {

                return ucwords($productTransaction->CreatedBy->name);
            })


            ->editColumn('updated_by', function (ProductTransaction $productTransaction) {

                return ucwords($productTransaction->UpdatedBy->name);
            })
            ->addColumn('created_at', function (ProductTransaction $productTransaction) {
                return $productTransaction->created_at->format('d-M-Y h:m');
            })
            ->addColumn('updated_at', function (ProductTransaction $productTransaction) {

                return $productTransaction->updated_at->format('d-M-Y h:m');
            })

            ->addColumn('editLink', function (ProductTransaction $productTransaction) {

                $editLink = '<a href="' . route('ProductTransactions.edit', $productTransaction->id) . '" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
                return $editLink;
            })
            ->addColumn('deleteLink', function (ProductTransaction $productTransaction) {
                $CSRFToken = "csrf_field()";
                $deleteLink = '
                        <button class="btn btn-link delete-productTransaction" data-productTransaction_id="' . $productTransaction->id . '" type="submit"><i
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
        return view('folder.productTransactions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:productTransactions,code',
            'name' => 'required',
        ]);
        $productTransaction = new ProductTransaction();


        $productTransaction->code  = $request->code;
        $productTransaction->name = $request->name;


        if ($request->status == 0) {
            $productTransaction->status == 0;
        }

        $productTransaction->status = $request->status;

        $productTransaction->created_by = Auth::user()->id;
        $productTransaction->updated_by = Auth::user()->id;

        $productTransaction->save();

        return redirect()->route('productTransactions.index')
            ->with('message_store', 'ProductTransaction Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductTransaction $productTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $productTransactions = ProductTransaction::find($id);
        return view('folder.productTransactions.edit', compact('productTransactions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => "required|unique:productTransactions,code,$id",
        ]);
        $productTransaction = ProductTransaction::find($id);


        $productTransaction->code  = $request->code;
        $productTransaction->name = $request->name;


        if ($request->status == 0) {
            $productTransaction->status == 0;
        }

        $productTransaction->status = $request->status;

        $productTransaction->updated_by = Auth::user()->id;

        $productTransaction->save();

        return redirect()->route('productTransactions.index')
            ->with('message_store', 'ProductTransaction Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $productTransaction  = ProductTransaction::findOrFail($id);
        $productTransaction->delete();

        return redirect()->route('productTransactions.index')->with('message_update', 'ProductTransaction Deleted Successfully');
    }
}
