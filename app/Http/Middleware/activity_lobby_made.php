<?php

namespace App\Http\Middleware;

use Closure;
use App\activity;
use Auth;

class activity_lobby_made
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

    if(Auth::User()){
      $user = Auth::User();
      if(!$user->role_id == 99){
        activity::create([
          'action_type' => 2,
          'ip' => $request->ip(),
        ]);
      }
    } else {
      activity::create([
        'action_type' => 2,
        'ip' => $request->ip(),
      ]);
    }

    return $next($request);
  }
}
