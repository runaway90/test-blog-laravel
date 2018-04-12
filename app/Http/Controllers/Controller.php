<?php

namespace App\Http\Controllers;

use App\User;
use App\Visit;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function getVisit(Request $request): ?Visit
    {
        $cookieVisit = $request->cookie('visit');
        $visitString = $cookieVisit->toString();

        if ($request->session()->has(Visit::SESSION_VAR)) {
            return Visit::find($visitString);

        } else {
            $visit = new Visit();
            return $visit;
        }

        return null;
    }

    protected function getUser(Request $request): User
    {

        //return User::getIdentifiedUser($request) ?: new User();
        return new User();

    }
}
