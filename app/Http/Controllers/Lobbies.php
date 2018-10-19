<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lobby;
use Auth;
use Session;

class Lobbies extends Controller
{
  protected function make()
  {
    $user = Auth::User();
    // Check if lobby link is an actual lobby.
    if(strpos(request('lobby_link'), "steam://joinlobby/730/") === false) {
      Session::flash('error', 'That lobby link didn\'t seem to work. Please try another.');
      return redirect('/');
    }

    // Check if the user is banned.
    if($user->role_id == 99){return "Your account is restricted.";}

    // Grab lobbies where there could be some clashes
    $lobby = Lobby::where("lobby_link", request('lobby_link'))
    ->orderBy('updated_at', 'desc')
    ->take(20)
    ->get();

    // Check if there's any lobbies in our search for 'em
    if(!$lobby->isEmpty())
    {
      Session::flash('error', 'That lobby already exists.');
      return redirect('/');
    }

    // Fix Exploit
    $Ranks = [
      'Any Rank',
      'Gold Nova 3+',
      'Master Guardian +',
      'Master Guardian Elite+',
      'DMG+',
      'Legendary Eagle'
    ];
    $Regions = [
      'Any Region',
      'North America',
      'Europe',
      'Australia',
      'Asia+',
      'South America'
    ];
    $Types = [
      'Legit/Cheat/Rage',
      'No Cheaters',
      'Allow Cheating',
      'Cheating but no rage',
    ];
    $Prime = [
      'Prime/Non-Prime',
      'Prime',
      'Non-Prime',
      'Cheating but no rage',
    ];

    if (!in_array(request('rank'), $Ranks)) {
      return redirect()->back();
    }
    if (!in_array(request('region'), $Regions)) {
      return redirect()->back();
    }
    if (!in_array(request('type'), $Types)) {
      return redirect()->back();
    }
    if (!in_array(request('prime'), $Prime)) {
      return redirect()->back();
    }

    // Check if someone is spamming the system with multiple Lobbies
    try{
      $lobby1 = Lobby::take(2)->first();
      if($lobby1->owner_id == $user->id){
        Session::flash('error', 'You can\'t post more than one lobby at a time.');
        return redirect('/');
      }
    } catch (\Exception $e) {}

    // Check if user is premium
    if($user->role_id == 2 || $user->role_id == 3){
      Lobby::create([
      'owner_id' => $user->id,
      'owner_name' => $user->name,
      'owner_url' => $user->acc_url,
      'lobby_type' => 2,
      'lobby_link' => request('lobby_link'),
      'rank' => request('rank'),
      'region' => request('region'),
      'type' => request('type'),
      'Prime' => request('prime'),
      ]);
    } else {
      Lobby::create([
      'owner_id' => $user->id,
      'owner_name' => $user->name,
      'owner_url' => $user->acc_url,
      'lobby_type' => 1,
      'lobby_link' => request('lobby_link'),
      'rank' => request('rank'),
      'region' => request('region'),
      'type' => request('type'),
      'Prime' => request('prime'),
      ]);
    }
    $user->lobbies = $user->lobbies+1;
    $user->save();
    return redirect('/');
  }

  protected function join($id){
    $lobby = Lobby::whereId($id)->first();
    return redirect($lobby->lobby_link);
  }


}
