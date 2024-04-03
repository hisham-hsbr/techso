<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Spatie\Activitylog\Models\Activity;

class ActivitylogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('permission:Permission Read', ['only' => ['index']]);
        // $this->middleware('permission:Permission Create', ['only' => ['create','store']]);
        // $this->middleware('permission:Permission Edit', ['only' => ['Edit','Update']]);
        // $this->middleware('permission:Permission Delete', ['only' => ['destroy']]);

    }

    public function index()
    {
        $activityLogs = Activity::all();
        return view('back_end.users_management.activity-log.index',compact('activityLogs'))->with('i');
    }
    public function show($id)
    {
        $activityLog = Activity::find($id);
        $users = User::all();
        return view('back_end.users_management.activity-log.show',compact('activityLog','users'));
    }
    public function activityLogsGet()
    {

        $activity = Activity::all();
        return Datatables::of($activity)

        ->setRowId(function ($activity) {
            return $activity->id;
            })
            ->addColumn('created_at', function (Activity $activity) {
                return $activity->created_at->format('d-M-Y h:m');
            })

            ->addColumn('updated_at', function (Activity $activity) {

                return $activity->updated_at->format('d-M-Y h:m');
            })
            ->editColumn('created_user', function (Activity $activity) {

                return ucwords($activity->activityUser->name);
            })
            ->addColumn('viewLink', function (Activity $activity) {

                $viewLink ='<a href="'. route('activityLogs.show', $activity->id) .'" class="ml-2"><i class="fa-solid fa fa-eye"></i></a>';
                   return $viewLink;
            })

           ->rawColumns(['status','viewLink','created_user'])
            ->toJson();
    }
}
