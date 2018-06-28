<?php

namespace App\Http\Middleware;

use Closure;

class maintenance
{


     public function handle($request, Closure $next)
     {


         if (Auth::check() && Auth::user()->role_id == 2) {
           return $next($request);
           }
           elseif (Auth::check() && Auth::user()->role_id == 1) {
               return redirect('admin');
           }
           else {
               return redirect('dashboard');
           }

         }
}
