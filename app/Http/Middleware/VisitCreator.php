<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Http\Request;
use App\Visit;
use App\Player;
use App\Events\NewVisitorEvent;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
//        Mail::to('vsbezgin@gmail.com')
//            ->cc('runaway90@zoho.com')
//            ->send('d');laravel_session

        $session = Cookie::get('laravel_session');

        $user=DB::table('users')->where('token', $session)->first();
        dd($user);

        $visit= new Controller();
        $some = $visit->getVisit($request);
        dd($some);
        if($visit)
        $visit->user_id = $user->id;
        $visit->name = 'log';
        $visit->save();

        dd($request);
        //dd($value);

        return $next($request);
    }
}
