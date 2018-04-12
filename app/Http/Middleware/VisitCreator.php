<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Http\Request;
use App\Visit;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class VisitCreator
{
    /**
     * @var Request
     */
    private $request;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     * @throws \RuntimeException
     */
    public function handle(Request $request, Closure $next)
    {
        $path =str_replace($request->root().'/', '',$request->fullUrl());
        $visiter =new Visit();

        $cookie=cookie::get();
        if(!isset($cookie['visit'])){
            $uid = Uuid::uuid1();
            Cookie::queue('visit', $uid, 525600);
        }

        $sessionToken = $request->session()->token();
        $user=DB::table('users')->where('token', $sessionToken)->first();
        if($user != null){
            $visiter->user_id = $user->id;
        }

        $visiter->name_page = $path;
        $visiter->session_id = $cookie['visit'];
        $visiter->save();
        return $next($request);
    }
}
