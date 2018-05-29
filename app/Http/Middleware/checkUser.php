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

      if (auth()->check() || auth()->guard('facebookUser')->check())
           {
             $user = User::guard('facebookUser')->whereEmail($providerUser->getEmail())->first();


                    return $next($request);
           } else
           {
                    return redirect()->route('home');
           }


        return $next($request);
    }
}
