<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
    public function log(Request $request)
    {
        $users = DB::table('users')->where('name', 'Tim User')->first();
    //dd($users->name);
        return view("log", ['users' => $users->name]);

    }
}
