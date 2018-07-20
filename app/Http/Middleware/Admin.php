<?php

namespace App\Http\Middleware;

use Auth;
use Closure; //at the top

class Admin {

public function handle($request, Closure $next)
{

  if (Auth::user()->role_id == 1) {
    return $next($request);
   }

     return redirect('dashboard');

    }
}
