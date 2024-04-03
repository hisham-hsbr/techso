<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Imports\PermissionsImport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('permission:Permission Read', ['only' => ['index']]);
        $this->middleware('permission:Permission Create', ['only' => ['create','store']]);
        $this->middleware('permission:Permission Edit', ['only' => ['Edit','Update']]);
        $this->middleware('permission:Permission Delete', ['only' => ['destroy']]);

    }

    public function index()
    {

        if(Auth::user()->hasRole('Developer')){
            $permissions = Permission::all();
        }else{
            $permissions = Permission::where('id','>',2)->get();
        }
        return view('back_end.users_management.permissions.index',compact('permissions'))->with('i');
    }

    public function permissionsGet()
    {
        return Datatables::of(Permission::query())

        ->setRowId(function ($permission) {
            return $permission->id;
            })

        ->editColumn('status', function (Permission $permission) {

            $active='<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
            $inActive='<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

            $activeId = ($permission->status);

                if($activeId==1){
                    $activeId = $active;
                }
                else {
                    $activeId = $inActive;
                }
                return $activeId;
        })
        ->addColumn('created_at', function (Permission $permission) {
            return $permission->created_at->format('d-M-Y h:m');
        })
        ->addColumn('updated_at', function (Permission $permission) {

            return $permission->updated_at->format('d-M-Y h:m');
        })
        ->editColumn('created_by', function (Permission $permission) {

            return ucwords($permission->CreatedBy->name);
        })
        ->editColumn('updated_by', function (Permission $permission) {
        return ucwords($permission->UpdatedBy->name);
        })
        ->addColumn('editLink', function (Permission $permission) {

            $editLink ='<a href="'. route('permissions.edit', $permission->id) .'" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
               return $editLink;
        })
        ->addColumn('deleteLink', function (Permission $permission) {
           $CSRFToken = "csrf_field()";
            $deleteLink ='
                                           <button class="btn btn-link delete-permission" data-permission_id="'.$permission->id.'" type="submit"><i
                                                   class="fa-solid fa-trash-can text-danger"></i>
                                           </button>';
               return $deleteLink;
        })

       ->rawColumns(['status','editLink','deleteLink'])
        ->toJson();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back_end.users_management.permissions.create');
    }

    public function permissionsImport()
    {
        return view('back_end.users_management.permissions.import');
    }

    /**
     * Store a newly created resource in storage.
     */


    public function permissionsDownload()
    {
        $path=public_path('downloads/sample_excels/permissions_import_sample.xlsx');
        return response()->download($path);
    }

    public function permissionsUpload(Request $request)
    {
        // dd($request->all());
        Excel::import(new PermissionsImport,$request->file('data'));
        return redirect()->route('permissions.index')
        ->with('message_store', 'Permission Import Successfully');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'parent' => 'required',
        ]);
        $permission = new Permission();


        $permission->name = $request->name;
        $permission->parent  = $request->parent;
        $permission->guard_name = "web";


        if ($request->status==0)
            {
                $permission->status==0;
            }

        $permission->status = $request->status;

        $permission->created_by = Auth::user()->id;
        $permission->updated_by = Auth::user()->id;

        $permission->save();

        return redirect()->route('permissions.index')
                        ->with('message_store', 'Permission Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $permission  = Permission::find($id);
        return view('back_end.users_management.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'parent' => 'required',
        ]);
        $permission = Permission::find($id);


        $permission->name = $request->name;
        $permission->parent  = $request->parent;
        $permission->guard_name = "web";


        if ($request->status==0)
            {
                $permission->status==0;
            }

        $permission->status = $request->status;

        $permission->updated_by = Auth::user()->id;

        $permission->save();

        return redirect()->route('permissions.index')
                        ->with('message_store', 'Permission Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

         $permission  = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('permissions.index')
                ->with('message_update', 'Permission Deleted Successfully');
    }
}
