<?php

namespace App\Http\Controllers;

use App\Models\DeveloperSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class DeveloperSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');

    }


    public function developerIndex()
    {
        $application = DeveloperSettings::firstWhere('name', 'application');
        $page = DeveloperSettings::firstWhere('name', 'page');
        $developer = DeveloperSettings::firstWhere('name', 'developer');

        return view('back_end.settings.developer_settings',compact('application','page','developer'));
    }
    public function faviconUpdate(request $request)
    {

        $oldFavicon= 'images/app/favicon.png';
        $file_name='favicon'.'.png';
        $file=$request->file('favicon');
        // delete old
        Storage::disk('public')->delete($oldFavicon);
        // update new
        Storage::disk('public')->putFileAs('images/app',$file,$file_name);

        return Redirect::route('developer-settings.index')->with('message_store', 'Favicon is updated');
    }
    public function logoBlackUpdate(request $request)
    {

        $oldLogoBlack= 'images/app/logo_black.png';
        $file_name='logo_black'.'.png';
        $file=$request->file('logo_black');
        // delete old
        Storage::disk('public')->delete($oldLogoBlack);
        // update new
        Storage::disk('public')->putFileAs('images/app',$file,$file_name);

        return Redirect::route('developer-settings.index')->with('message_store', 'Logo black is updated');
    }
    public function logoWhiteUpdate(request $request)
    {

        $oldLogoWhite= 'images/app/logo_white.png';
        $file_name='logo_white'.'.png';
        $file=$request->file('logo_white');
        // delete old
        Storage::disk('public')->delete($oldLogoWhite);
        // update new
        Storage::disk('public')->putFileAs('images/app',$file,$file_name);

        return Redirect::route('developer-settings.index')->with('message_store', 'Logo white is updated');
    }
}
