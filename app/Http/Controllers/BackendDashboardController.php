<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BackendDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $users = User::all();
        return view('back_end.dashboard',compact('users'))->with('i');
    }
    public function fetchUsers()
    {
        // $users = User::all();
        $users = User::count();
        return response()->json([
            'users'=>$users,
        ]);
    }
}
