<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class maintenance
{
   public function handle($request, Closure $next)
   {

     if (Auth::user()->role_id <= 2) {

          return $next($request);
      }

      return redirect('dashboard');

   }
}
