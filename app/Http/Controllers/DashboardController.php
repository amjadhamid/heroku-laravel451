<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // يكون المعرف نفسه 
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('Dashboard')->with('posts', $user->posts);
    }
}
