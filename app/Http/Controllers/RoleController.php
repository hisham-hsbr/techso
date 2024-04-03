<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('permission:Role Read', ['only' => ['index']]);
        $this->middleware('permission:Role Create', ['only' => ['create','store']]);
        $this->middleware('permission:Role Edit', ['only' => ['Edit','Update']]);
        $this->middleware('permission:Role Delete', ['only' => ['destroy']]);

    }

    public function index()
    {
        if(Auth::user()->hasRole('Developer')){
            $roles = Role::all();
        }else{
            $roles = Role::where('id','>',1)->get();
        }

        return view('back_end.users_management.roles.index',compact('roles'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all()->groupBy('parent');
        return view('back_end.users_management.roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);


            $role = new Role();
            $role->name = $request->name;

        if ($request->status==0)
        {
            $role->status==0;
        }

        $role->status = $request->status;

        $role->created_by = Auth::user()->id;
        $role->updated_by = Auth::user()->id;

        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')->with('message_store', "{$request->name} -  Role Created Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role        = Role::find($id);
        $role        = $role->load('permissions');
        $permissions = Permission::all()->groupBy('parent');
        return view('back_end.users_management.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => "required|unique:roles,name,$id",
            'permission' => 'required',
        ]);


            $role = Role::find($id);
            $role->name = $request->name;

        if ($request->status==0)
        {
            $role->status==0;
        }

        $role->status = $request->status;

        $role->updated_by = Auth::user()->id;

        $role->update($request->all());
        $role->syncPermissions($request->permission);

        return redirect()->route('roles.index')->with('message_store', "{$request->name} -  Role Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $role  = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index')
                ->with('message_update', 'Role Deleted Successfully');
    }

}
