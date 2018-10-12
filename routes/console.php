<?php

use Illuminate\Foundation\Inspiring;
use App\User;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('op {user}', function ($user) {
  $user = User::whereId($user)->first();
  if($user->role_id == 3){
    $this->comment("De-Opping: " . $user->name . "...");
    $user->role_id = 1;
    $user->save();
    $this->comment("Done, " . $user->name . " is now a normal user.");
  } else {
    $this->comment("Opping: " . $user->name . "...");
    $user->role_id = 3;
    $user->save();
    $this->comment("Done, welcome " . $user->name . " to the staff team.");
  }
})->describe('Toggle User\'s admin admin status.');
