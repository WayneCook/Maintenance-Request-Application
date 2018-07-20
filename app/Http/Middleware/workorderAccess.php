<?php

namespace App\Http\Middleware;
use Closure;
use User;
use Auth;

class workorderAccess
{

    public function handle($request, Closure $next)
    {




        if ( Auth::user()->role_id == 1 || Auth::user()->role_id == 2 ) {

          return $next($request);
        }


    // return redirect('dashboard');

    }
}
