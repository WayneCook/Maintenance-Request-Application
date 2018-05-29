<?php

namespace App\Http\Middleware;
use App\FacebookUser;
use App\User;
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
      $facebookAccount = auth()->guard('facebookUser')->user();
      $userAccount = auth()->user();

      // $userEmail = User::whereEmail($facebookAccount);

      if ($userEmail) {
        return 'email found';
      } else {
        return 'no email found';
      }

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
