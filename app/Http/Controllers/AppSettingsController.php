<?php

namespace App\Http\Controllers;

use App\Models\AppSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DeveloperSettings;

class AppSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function appIndex()
    {
        $application = DeveloperSettings::firstWhere('name', 'application');
        $page = DeveloperSettings::firstWhere('name', 'page');
        $developer = DeveloperSettings::firstWhere('name', 'developer');
        $message = AppSettings::firstWhere('name', 'default message');

        return view('back_end.settings.app_settings',compact('application','page','developer','message'));
    }

    public function appUpdate(Request $request)
    {

        $this->validate($request, [
            'app_name' => 'required',
            'app_version' => 'required',
            'page_title_prefix' => 'required',
            'page_title_suffix' => 'required',
            'home_toolbar_message' => 'required',
            'name' => 'required',
            'website' => 'required',
            'mail' => 'required',
            'starting_year' => 'required',
            'ending_year' => 'required',
        ]);

        //Application Settings
        $application = DeveloperSettings::firstWhere('name', 'application');
        $application->data= [
            'app_name'=>$request->app_name,
            'app_version'=>$request->app_version,
        ];
        $application->updated_by = Auth::user()->id;
        $application->save();

        //Page Settings
        $page = DeveloperSettings::firstWhere('name', 'page');
        $page->data= [
            'page_title_prefix'=>$request->page_title_prefix,
            'page_title_suffix'=>$request->page_title_suffix
        ];
        $page->updated_by = Auth::user()->id;
        $page->save();

        //Developer Settings
        $developer = DeveloperSettings::firstWhere('name', 'developer');
        $developer->data= [
            'name'=>$request->name,
            'website'=>$request->website,
            'mail'=>$request->mail,
            'starting_year'=>$request->starting_year,
            'ending_year'=>$request->ending_year,
        ];
        $developer->updated_by = Auth::user()->id;
        $developer->save();

        //Logo Settings
        $logo = DeveloperSettings::firstWhere('name', 'logo');
        $logo->data= [
            'sidebar_logo'=>$request->sidebar_logo,
            'sidebar_mini_logo'=>$request->sidebar_mini_logo,
            'sign_logo'=>$request->sign_logo,
            'sign_mini_logo'=>$request->sign_mini_logo,
            'sign_with_google'=>$request->sign_with_google,
            'sign_with_facebook'=>$request->sign_with_facebook,
        ];
        $logo->updated_by = Auth::user()->id;
        $logo->save();

        //Logo Settings
        $frontend_blood_bank_settings = AppSettings::firstWhere('name', 'default front end layout');
        $frontend_blood_bank_settings->data= [
            'home_carousel_section'=>$request->home_carousel_section,
            'about_section'=>$request->about_section,
            'features_section'=>$request->features_section,
            'call_to_action_section'=>$request->call_to_action_section,
            'services_section'=>$request->services_section,
            'portfolio_section'=>$request->portfolio_section,
            'testimonials_section'=>$request->testimonials_section,
            'pricing_section'=>$request->pricing_section,
            'faq_section'=>$request->faq_section,
            'team_section'=>$request->team_section,
            'contact_section'=>$request->contact_section,
        ];
        $frontend_blood_bank_settings->updated_by = Auth::user()->id;
        $frontend_blood_bank_settings->save();

        //message Settings
        $message = AppSettings::firstWhere('name', 'default message');
        $message->data= [
            'home_toolbar_message'=>$request->home_toolbar_message,
            'message'=>$request->message,
        ];
        $message->updated_by = Auth::user()->id;
        $message->save();



        return redirect()->route('app-settings.index')
                        ->with('message_store', 'Application settings are updated successfully');
    }


    public function bloodBankIndex()
    {
        $frontend_blood_bank_settings = AppSettings::firstWhere('name', 'default front end blood bank layout');

        return view('back_end.settings.blood_bank_settings',compact('frontend_blood_bank_settings'));
    }

    public function bloodBankUpdate(Request $request)
    {

        $this->validate($request, [
            // 'app_name' => 'required',
        ]);



        //Blood Bank  Settings
        $frontend_blood_bank_settings = AppSettings::firstWhere('name', 'default front end blood bank layout');
        $frontend_blood_bank_settings->data= [
            'banner_section'=>$request->banner_section ,
            'donation_process_section'=>$request->donation_process_section,
            'campaigns_section'=>$request->campaigns_section,
            'appointment_section'=>$request->appointment_section,
            'cta_section'=>$request->cta_section,
            'gallery_section'=>$request->gallery_section,
            'blog_section'=>$request->blog_section,
        ];
        $frontend_blood_bank_settings->updated_by = Auth::user()->id;
        $frontend_blood_bank_settings->save();


        return redirect()->route('blood-bank-settings.index')
                        ->with('message_store', 'Blood Bank settings are updated successfully');
    }


    // public function index()
    // {
    //     $application = AppSettings::firstWhere('name', 'application');

    //     // view()->share('Application', DeveloperSettings::firstWhere('name', 'application'));
    //     return view('back_end.settings.app_settings',compact('application'));
    // }


    // public function update(Request $request, AppSettings $appSettings)
    // {
    //     $this->validate($request, [
    //         'app_name' => 'required',
    //     ]);
    //     $application = AppSettings::firstWhere('name', 'application');
    //     // $application= AppSettings::find(1);

    //     dd($application);

    //     $Application->data['app_name']= $request->app_name;


    //     if ($request->status==0)
    //         {
    //             $application->status==0;
    //         }

    //     $application->status = $request->status;

    //     $application->updated_by = Auth::user()->id;

    //     $application->save();

    //     return redirect()->route('app-settings.index')
    //                     ->with('message_store', 'application Updated Successfully');
    // }
}
