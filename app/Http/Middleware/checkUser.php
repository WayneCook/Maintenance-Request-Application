<?php

namespace App\Http\Middleware;
use App\FacebookUser;
use Closure;
use Auth;
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

        dd(auth()->guard('facebookUser')->user());

      if (auth()->check() || auth()->guard('facebookUser')->check())
           {



                    return $next($request);
           } else
           {
                    return redirect()->route('home');
           }


        return $next($request);
    }
}
