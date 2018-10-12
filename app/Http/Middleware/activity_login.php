<?php

namespace App\Http\Middleware;

use Closure;
use App\activity;

class activity_login
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


    activity::create([
      'action_type' => 3,
      'ip' => $request->ip(),
    ]);

    return $next($request);
  }
}
