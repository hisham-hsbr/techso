<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Fixancare\MobileService;

class FrontendDashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');

    // }
    public function trackSearchJob()
    {

        $track_test = $_GET['job_number'];

         $job_numbers = MobileService::where('job_number','LIKE',$track_test)->get();
         if ($track_test == "") {

          return view('front_end.tr');
            }
            else {
          return view('front_end.track',compact('job_numbers'));

        }
    }
    public function trackSearchPhone()
    {

        $track_test = $_GET['phone_number'];

         $phone_numbers = MobileService::where('contact_number','LIKE',$track_test)->get();
         if ($track_test == "") {

          return view('front_end.tr');
            }
            else {
          return view('front_end.track',compact('phone_numbers'));

        }
    }
    public function portfolioDetails($id)
    {
        $image = Image::find($id);
        return view('front_end.portfolio-details',compact('image'));
    }
    public function index()
    {
        $images = Image::all();
        $images_portfolio = Image::all()
                            ->where('type', 'portfolio')
                            ->groupBy('group');
        return view('front_end.welcome',compact('images','images_portfolio'))->with('i');
    }
}
