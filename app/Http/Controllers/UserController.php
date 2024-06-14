<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Blood;
use App\Models\TimeZone;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('permission:User Read', ['only' => ['index']]);
        $this->middleware('permission:User Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:User Edit', ['only' => ['Edit', 'Update']]);
        $this->middleware('permission:User Delete', ['only' => ['destroy']]);

        // $this->middleware(['role:manager','permission:publish articles|edit articles']);

    }

    public function index()
    {
        if (Auth::user()->hasRole('Developer')) {
            $users = User::all();
        } else {
            $users = User::where('id', '>', 2)->get();
        }

        return view('back_end.users_management.users.index', compact('users'))->with('i');
    }
    public function usersGet()
    {
        if (Auth::user()->hasRole('Developer')) {
            $users = User::all();
        } else {
            $users = User::where('id', '>', 2)->get();
        }
        return Datatables::of($users)

            ->setRowId(function ($User) {
                return $User->id;
            })

            ->editColumn('status', function (User $user) {

                $active = '<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive = '<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($user->status);

                if ($activeId == 1) {
                    $activeId = $active;
                } else {
                    $activeId = $inActive;
                }
                return $activeId;
            })

            ->editColumn('emailVerified', function (User $user) {

                $verified = '<span style="background-color: #190482;color: white;padding: 3px;width:100px;">Verified</span>';
                $pending = '<span style="background-color: #C70039;color: white;padding: 3px;width:100px;">Pending</span>';

                $verifiedStatus = ($user->email_verified_at);

                if ($verifiedStatus == NULL) {
                    $verifiedStatus = $pending;
                } else {
                    $verifiedStatus = $verified;
                }
                return $verifiedStatus;

                return ucwords($user->email_verified_at->name);
            })
            ->editColumn('created_by', function (User $user) {

                return ucwords($user->CreatedBy->name);
            })
            ->editColumn('cityName', function (User $user) {

                return ucwords($user->cityName->city);
            })
            ->editColumn('timeZone', function (User $user) {

                return ucwords($user->timeZone->time_zone);
            })
            ->editColumn('blood', function (User $user) {

                return ucwords($user->blood->name);
            })
            ->editColumn('roles', function (User $user) {

                $label = "";
                if (!empty($user->getRoleNames())) {

                    foreach ($user->getRoleNames() as $v) {

                        $label = '<label class="badge badge-info">' . $v . '</label>';
                    }
                }

                return $label;
            })
            ->editColumn('permissions', function (User $user) {

                $label = "";
                if (!empty($user->getPermissionNames())) {

                    foreach ($user->getPermissionNames() as $v) {

                        $label = '<label class="badge badge-warning">' . $v . '</label>';
                    }
                }

                return $label;
            })



            ->editColumn('updated_by', function (User $user) {

                return ucwords($user->UpdatedBy->name);
            })
            ->addColumn('created_at', function (User $User) {
                return $User->created_at->format('d-M-Y h:m');
            })
            ->addColumn('updated_at', function (User $User) {

                return $User->updated_at->format('d-M-Y h:m');
            })

            ->addColumn('editLink', function (User $user) {

                $editLink = '<a href="' . route('users.edit', $user->id) . '" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
                return $editLink;
            })
            ->addColumn('deleteLink', function (User $user) {
                $CSRFToken = "csrf_field()";
                $deleteLink = '
                        <button class="btn btn-link delete-user" data-user_id="' . $user->id . '" type="submit"><i
                                class="fa-solid fa-trash-can text-danger"></i>
                        </button>';
                return $deleteLink;
            })


            ->rawColumns(['emailVerified', 'roles', 'permissions', 'status', 'editLink', 'deleteLink'])
            ->toJson();
    }


    public function create()
    {
        //
        $bloods = Blood::where('status', 1)->get();
        $time_zones = TimeZone::where('status', 1)->get();
        $country_list = DB::table('country_state_district_cities')
            ->groupBy('country')
            ->where('status', 1)->get();

        if (Auth::user()->hasRole('Developer')) {
            $roles = Role::all();
        } else {
            $roles = Role::where('status', 1)
                ->where('id', '>', 1)
                ->get();
        }

        $users = User::all();
        $permissions = Permission::all()->groupBy('parent');


        return view('back_end.users_management.users.create', compact('roles', 'permissions', 'users', 'bloods', 'time_zones', 'country_list'));
    }
    function csdcsGet(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('country_state_district_cities')
            ->where($select, $value)
            ->groupBy($dependent)
            ->get();
        $output = '<option value="">Select ' . ucfirst($dependent) . '</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->$dependent . '">' . $row->$dependent . '</option>';
        }
        echo $output;
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'dob' => 'required',
            'phone1' => 'required',
            'blood_id' => 'required',
            'time_zone_id' => 'required',
            'city' => 'required',
            'gender' => 'required',

            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:password_confirm',
            'roles' => 'required'
        ]);

        $city_id = (DB::table('country_state_district_cities')->where('city', $request->city)->first())->id;

        $user = new User();


        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->dob  = $request->dob;
        $user->phone1  = $request->phone1;
        $user->phone2  = $request->phone2;
        $user->blood_id  = $request->blood_id;
        $user->city_id  = $city_id;
        $user->time_zone_id  = $request->time_zone_id;
        $user->gender  = $request->gender;

        $user->email  = $request->email;
        $user->password = Hash::make($request['password']);


        if ($request->status == 0) {
            $user->status == 0;
        }

        $user->status = $request->status;

        $user->created_by = Auth::user()->id;
        $user->updated_by = Auth::user()->id;

        $user->save();
        $user->assignRole($request->input('roles'));
        $user->givePermissionTo($request->input('permission'));

        return redirect()->route('users.index')
            ->with('message_store', 'User Created Successfully');
    }

    public function profileEdit()
    {
        $bloods = Blood::where('status', 1)->get();
        $time_zones = TimeZone::where('status', 1)->get();
        $country_list = DB::table('country_state_district_cities')
            ->groupBy('country')
            ->where('status', 1)->get();
        return view('back_end.users_management.users.profile', compact('bloods', 'time_zones', 'country_list'));
    }

    public function profileUpdate(Request $request)
    {
        $id = Auth::user()->id;
        $this->validate($request, [
            'name' => 'required',
            'last_name' => 'required',
            'dob' => 'required',
            'phone1' => 'required',
            'blood_id' => 'required',
            'time_zone_id' => 'required',
            'city' => 'required',
            'gender' => 'required',

            'email' => "required|unique:users,email,$id",

        ]);

        $city_id = (DB::table('country_state_district_cities')->where('city', $request->city)->first())->id;

        if ($request->changePassword == 1) {
            $this->validate($request, [
                'password' => 'required|same:password_confirm',
            ]);
        }



        // if ($request->changePassword==1)
        //     {
        //         $input = $request->all();
        //         if(!empty($input['password'])){
        //             $input['password'] = Hash::make($input['password']);
        //         }else{
        //             $input = Arr::except($input,array('password'));
        //         }
        //     }


        $user = User::find($id);



        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->dob  = $request->dob;
        $user->phone1  = $request->phone1;
        $user->phone2  = $request->phone2;
        $user->blood_id  = $request->blood_id;
        $user->city_id  = $city_id;
        $user->time_zone_id  = $request->time_zone_id;
        // $user->email_verified_at  = $request->email_verified_at;
        $user->gender  = $request->gender;

        $user->email  = $request->email;

        if ($request->changePassword == 1) {
            $user->password = Hash::make($request['password']);
        }



        if ($request->card_footer == 0) {
            $user->card_footer == 0;
        }
        if ($request->card_header == 0) {
            $user->card_header == 0;
        }
        if ($request->sidebar_collapse == 0) {
            $user->sidebar_collapse == 0;
        }
        if ($request->dark_mode == 0) {
            $user->dark_mode == 0;
        }
        if ($request->default_status == 0) {
            $user->default_status == 0;
        }
        if ($request->default_time_zone == 0) {
            $user->default_time_zone == 0;
        }

        if (Auth::user()->settings['personal_settings'] == 1) {
            $personal_settings = 1;
        }
        if (Auth::user()->settings['personal_settings'] == null) {
            $personal_settings = null;
        }

        $user->settings = [
            'personal_settings' => $personal_settings,
            'card_footer' => $request->card_footer,
            'card_header' => $request->card_header,
            'sidebar_collapse' => $request->sidebar_collapse,
            'dark_mode' => $request->dark_mode,
            'default_status' => $request->default_status,
            'default_time_zone' => $request->default_time_zone,
            'permission_view' => $request->permission_view,
        ];


        $user->updated_by = Auth::user()->id;

        $user->update();

        return redirect()->route('profile.edit')
            ->with('message_store', 'User Updated Successfully');
    }

    public function edit($id)
    {
        $bloods = Blood::where('status', 1)->get();
        $time_zones = TimeZone::where('status', 1)->get();
        $country_list = DB::table('country_state_district_cities')
            ->groupBy('country')
            ->where('status', 1)->get();

        if (Auth::user()->hasRole('Developer')) {
            $roles = Role::all();
        } else {
            $roles = Role::where('status', 1)
                ->where('id', '>', 1)
                ->get();
        }
        $user = User::find($id);
        $permissions = Permission::all()->groupBy('parent');


        return view('back_end.users_management.users.edit', compact('roles', 'permissions', 'user', 'bloods', 'time_zones', 'country_list'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'last_name' => 'required',
            'dob' => 'required',
            'phone1' => 'required',
            'blood_id' => 'required',
            'time_zone_id' => 'required',
            'city' => 'required',
            'gender' => 'required',

            'email' => "required|unique:users,email,$id",
            // 'password' => 'required|same:password_confirm',
            'roles' => 'required'
        ]);

        if ($request->changePassword == 1) {
            $this->validate($request, [
                'password' => 'required|same:password_confirm',
            ]);
        }

        $city_id = (DB::table('country_state_district_cities')->where('city', $request->city)->first())->id;

        $user = User::find($id);


        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->dob  = $request->dob;
        $user->phone1  = $request->phone1;
        $user->phone2  = $request->phone2;
        $user->blood_id  = $request->blood_id;
        $user->city_id  = $city_id;
        $user->time_zone_id  = $request->time_zone_id;
        $user->email_verified_at  = $request->email_verified_at;
        $user->gender  = $request->gender;

        $user->email  = $request->email;

        if ($request->changePassword == 1) {
            $user->password = Hash::make($request['password']);
        }


        if ($request->status == 0) {
            $user->status == 0;
        }
        $user->status = $request->status;


        if ($request->personal_settings == 0) {
            $user->personal_settings == 0;
        }
        if ($request->card_footer == 0) {
            $user->card_footer == 0;
        }
        if ($request->card_header == 0) {
            $user->card_header == 0;
        }
        if ($request->sidebar_collapse == 0) {
            $user->sidebar_collapse == 0;
        }
        if ($request->dark_mode == 0) {
            $user->dark_mode == 0;
        }
        if ($request->default_status == 0) {
            $user->default_status == 0;
        }
        if ($request->default_time_zone == 0) {
            $user->default_time_zone == 0;
        }
        $user->settings = [
            'personal_settings' => $request->personal_settings,
            'card_footer' => $request->card_footer,
            'card_header' => $request->card_header,
            'sidebar_collapse' => $request->sidebar_collapse,
            'dark_mode' => $request->dark_mode,
            'default_status' => $request->default_status,
            'default_time_zone' => $request->default_time_zone,
            'permission_view' => $request->permission_view,
        ];


        $user->updated_by = Auth::user()->id;

        $user->save();

        DB::table('model_has_roles')->where('model_id', $id)->delete();
        DB::table('model_has_permissions')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));
        $user->givePermissionTo($request->input('permission'));

        return redirect()->route('users.index')
            ->with('message_store', 'User Updated Successfully');
    }
    public function destroy($id)
    {
        $user  = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')
            ->with('message_update', 'User Deleted Successfully');
    }

    public function avatarUpdate(request $request)
    {
        if ($oldAvatar = $request->user()->avatar) {
            Storage::disk('public')->delete($oldAvatar);
        }
        $file_name = Auth::user()->email . '.jpg';

        $file = $request->file('avatar');

        $path = Storage::disk('public')->putFileAs('images/avatars/users', $file, $file_name);
        $id = Auth::user()->id;
        $user  = User::findOrFail($id);
        $user->avatar = $path;
        $user->update();


        return Redirect::route('profile.edit')->with('status', 'profile-avatar-updated');
    }

    public function avatarDelete(request $request)
    {
        $old_avatar = $request->user()->avatar;

        // dd($old_avatar);
        Storage::disk('public')->delete($old_avatar);

        $path = "";
        $id = Auth::user()->id;
        $user  = User::findOrFail($id);
        $user->avatar = $path;
        $user->update();

        return Redirect()->back()->with('message_update', 'Profile Avatar Deleted');
    }
}
