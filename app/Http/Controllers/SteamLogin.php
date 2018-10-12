<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Invisnik\LaravelSteamAuth\SteamAuth;
use App\User;
use Auth;

class SteamLogin extends Controller
{
  protected $steam;

  /**
  * The redirect URL.
  *
  * @var string
  */
  protected $redirectURL = '/';

  /**
  * AuthController constructor.
  *
  * @param SteamAuth $steam
  */
  public function __construct(SteamAuth $steam)
  {
    $this->steam = $steam;
  }

  /**
  * Redirect the user to the authentication page
  *
  * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
  */
  public function redirectToSteam()
  {
    return $this->steam->redirect();
  }

  /**
  * Get user info and log in
  *
  * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
  */
  public function handle()
  {
    if ($this->steam->validate()) {
      $info = $this->steam->getUserInfo();

      if (!is_null($info)) {
        $user = $this->findOrNewUser($info);

        if($user->role_id == 99){return "Your account is restricted. You will no longer be able to login using this account.";}

        Auth::login($user, true);

        return redirect($this->redirectURL); // redirect to site
      }
    }
    return $this->redirectToSteam();
  }

  /**
  * Getting user by info or created if not exists
  *
  * @param $info
  * @return User
  */
  protected function findOrNewUser($info)
  {
    $user = User::where('steamid', $info->steamID64)->first();

    if (!is_null($user)) {
      return $user;
    }


    return User::create([
    'name' => $info->personaname,
    'acc_url' => $info->profileurl,
    'avatar' => $info->avatarfull,
    'steamid' => $info->steamID64,
    'primaryclan' => $info->primaryclanid,
    ]);
  }
}
