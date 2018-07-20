<?php

namespace App\Http\Middleware;
use Closure;
use Auth;

class role_redirect
{

  public function handle($request, Closure $next)
  {

   if (Auth::check()) {

     if (Auth::user()->role_id == 1) {
       return redirect('admin');

       }
       elseif (Auth::user()->role_id == 2) {
           return redirect('maintenance');
       }
       elseif(Auth::user()->role_id == 3) {
           return $next($request);
       }

     } else {
       return redirect('/');

      }
   }
}
