<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

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
                //$request->session()->setName('21654', '4');//put('s','s');
                    //Cookie::queue('1', '123', 120);

        $token = $request->session()->get('_token');
        $user=DB::table('users')->where('token', $token)->first();
        //dd($user);
//        $visit=$this->getVisit($request);
//        $visit->user_id = $user->id;
//        $visit->name = 'log';
//        $visit->save();
        $uuid1 = Uuid::uuid1();
    echo $uuid1->toString() . "\n"; // i.e. e4eaaaf2-d142-11e1-b3e4-080027620cdd

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
