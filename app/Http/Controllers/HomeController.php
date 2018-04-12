<?php

namespace App\Http\Controllers;

use App\Article;
use Carbon\Carbon;
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
    public function article(Request $request)
    {

        return view("article/add");
    }

    public function articleAdd(Request $request)
    {
        $data =$request->input();
        //dd($data);
        $article = new Article();
        $article->title =$data['title'];
        $article->main_description =$data['main_description'];
        $article->article =$data['article'];
        $article->tags =$data['tag'];
        $article->date = Carbon::now();
        $article->save();
        dd('s');

        return view("article/add");
    }

    public function findUser(Request $request, $var = null)
    {
        $users = DB::table('users')->where('name', $var)->first();
        return view("user/find", ['users' => $users->name]);
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
