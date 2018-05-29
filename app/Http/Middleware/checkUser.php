<?php

namespace App\Http\Middleware;

use Closure;

class checkUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

      if (Auth::check() || Auth::guard('facebookUser')->check())
           {
                    return $next($request);
           } else
           {
                    return redirect()->route('home');
           }


        return $next($request);
    }
}
