<?php

namespace App\Http\Middleware;

use Closure;
use App\activity;

class activity_lobby_click
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

    $activity = activity::where("ip", $request->ip())
    ->orderBy('updated_at', 'desc')
    ->where("action_type", 1)
    ->take(20)
    ->get();

    if($activity->isEmpty()) // So all clicks are unique
    {
      activity::create([
        'action_type' => 1,
        'ip' => $request->ip(),
      ]);
    }

    return $next($request);
  }
}
