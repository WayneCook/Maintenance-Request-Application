<?php

namespace App\Http\Middleware;

use Auth;
use Closure; //at the top

class Admin {

public function handle($request, Closure $next)
{

    if (Auth::check() && Auth::user()->role_id == 1) {
      return $next($request);
      }
      elseif (Auth::check() && Auth::user()->role_id == 2) {
          return redirect('dashboard');
      }
      else {
          return redirect('dashboard');
      }
    }
}
