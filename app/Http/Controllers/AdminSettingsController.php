<?php

namespace App\Http\Controllers;

use App\Models\AppSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $default_layout = AppSettings::firstWhere('name', 'default layout');

        return view('back_end.settings.admin_settings',compact('default_layout'));
    }


    public function update(Request $request)
    {

        $this->validate($request, [
            // 'app_name' => 'required',
            // 'app_version' => 'required',
        ]);

        //default layout Settings
        $default_layout = AppSettings::firstWhere('name', 'default layout');

        if ($request->card_footer==0){$default_layout->status==0;}
        if ($request->card_header==0){$default_layout->status==0;}
        if ($request->sidebar_collapse==0){$default_layout->status==0;}
        if ($request->dark_mode==0){$default_layout->status==0;}
        if ($request->default_status==0){$user->default_status==0;}
        if ($request->default_time_zone==0){$user->default_time_zone==0;}

        $default_layout->data= [
            'card_footer'=>$request->card_footer,
            'card_header'=>$request->card_header,
            'sidebar_collapse'=>$request->sidebar_collapse,
            'dark_mode'=>$request->dark_mode,
        ];
        $default_layout->updated_by = Auth::user()->id;
        $default_layout->save();

        //default layout Settings
        $default_action = AppSettings::firstWhere('name', 'default action');
        $default_action->data= [
            'default_status'=>$request->default_status,
            'default_time_zone'=>$request->default_time_zone,
        ];
        $default_action->updated_by = Auth::user()->id;
        $default_action->save();


        return redirect()->route('admin-settings.index')
                        ->with('message_store', 'Settings Are Updated Successfully');
    }


}
