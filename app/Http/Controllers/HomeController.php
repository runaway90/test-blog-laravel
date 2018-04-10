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
        $token = $request->session()->get('_token');
        $user=DB::table('users')->where('token', $token)->first();
        //dd($user);
        $visit=$this->getVisit($request);
        $visit->user_id = $user->id;
        $visit->name = 'log';
        $visit->save();
        dd($request);
        $users = DB::table('users')->where('name', 'Tim User')->first();
        //dd($users->name);
        return view("log", ['users' => $users->name]);

    }

        public function index(Request $request)
    {
        $visit=$this->getVisit($request);
        dd($request);
        $users = DB::table('users')->where('name', 'Tim User')->first();
        //dd($users->name);
        return view("log", ['users' => $users->name]);

    }
}
