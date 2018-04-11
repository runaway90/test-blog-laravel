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
     *
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
        dd($request->get('requestUri'));
        $visit = $session = Cookie::get('visit');
        if($visit == null){
           $uid = Uuid::uuid1();
           Cookie::queue('visit', $uid, 525600);
           $visit= new Controller();
           $visiter = $visit->getVisit($request);

           $user=DB::table('users')->where('token', $session)->first();
           $visiter->user_id = $user->id;

        $visiter->name = 'log';
        $visiter->session_id = $uid;
        $visiter->save();
            dd('d');
        }


        //$visitor = $session = Cookie::get('visitor_session');
                    Cookie::queue('log', '123', 120);
        //$request->session()->setName('21654', '4');//put('s','s');
//
//        $user=DB::table('users')->where('token', $session)->first();
//        //dd($user);
//


//        //dd($request);
        //dd($value);

        return $next($request);
    }
}
