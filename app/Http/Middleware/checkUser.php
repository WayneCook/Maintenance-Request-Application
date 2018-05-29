<?php

namespace App\Http\Middleware;
use App\FacebookUser;
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

      if (auth()->check() || auth()->guard('facebookUser')->check())
           {
             $user = FacebookUser::whereEmail(auth()->guard('facebookUser')->email)->first();


                    return $next($request);
           } else
           {
                    return redirect()->route('home');
           }


        return $next($request);
    }
}
