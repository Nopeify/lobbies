<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Larinfo;
use App\User;
use App\Lobby;
Use App\Activity;

class Admin extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {

    $users_total = User::get();
    $users_total_count = User::count();
    $users_leaderboard = User::orderBy('lobbies', 'decending')->take(20)->get();
    $users_today = Activity::where("updated_at", ">", (new \DateTime())->modify('-1 day'))->where("action_type", "=", 3)->count();
    $users_week = Activity::where("updated_at", ">", (new \DateTime())->modify('-1 week'))->where("action_type", "=", 3)->count();
    $users_month = Activity::where("updated_at", ">", (new \DateTime())->modify('-1 month'))->where("action_type", "=", 3)->count();

    $lobbies_total = Lobby::get();
    $lobbies_total_count = Lobby::count();
    $lobbies_made_today = Activity::where("updated_at", ">", (new \DateTime())->modify('-1 day'))->where("action_type", "=", 2)->count();
    $lobbies_made_week = Activity::where("updated_at", ">", (new \DateTime())->modify('-1 week'))->where("action_type", "=", 2)->count();
    $lobbies_made_month = Activity::where("updated_at", ">", (new \DateTime())->modify('-1 month'))->where("action_type", "=", 2)->count();

    $lobbies_clicked_total = Activity::where("action_type", "=", 1)->get();
    $lobbies_clicked_total_count = Activity::where("action_type", "=", 1)->count();
    $lobbies_clicked_today = Activity::where("updated_at", ">", (new \DateTime())->modify('-1 day'))->where("action_type", "=", 1)->count();
    $lobbies_clicked_week = Activity::where("updated_at", ">", (new \DateTime())->modify('-1 week'))->where("action_type", "=", 1)->count();
    $lobbies_clicked_month = Activity::where("updated_at", ">", (new \DateTime())->modify('-1 month'))->where("action_type", "=", 1)->count();

    $user = Auth::User();
    if($user->role_id != 3){return back();}

    return view('admin/home',
    [
    'users_total' => $users_total,
    'users_total_count' => $users_total_count,
    'users_leaderboard' => $users_leaderboard,
    'users_today' => $users_today,
    'users_week' => $users_week,
    'users_month' => $users_month,
    'lobbies_total' => $lobbies_total,
    'lobbies_total_count' => $lobbies_total_count,
    'lobbies_made_today' => $lobbies_made_today,
    'lobbies_made_week' => $lobbies_made_week,
    'lobbies_made_month' => $lobbies_made_month,
    'lobbies_clicked_total' => $lobbies_clicked_total,
    'lobbies_clicked_total_count' => $lobbies_clicked_total_count,
    'lobbies_clicked_today' => $lobbies_clicked_today,
    'lobbies_clicked_week' => $lobbies_clicked_week,
    'lobbies_clicked_month' => $lobbies_clicked_month

    ]);
  }

  public function manage_users()
  {
    $users = User::get();
    return view('admin/manage/users/users', ["users" => $users]);
  }

  public function server()
  {
    $info = Larinfo::getServerInfo();
    return view('admin/manage/server', ['info' => $info]);
  }

  public function manage_lobbies()
  {
    $lobbies = Lobby::get();
    return view("admin/manage/lobbies/lobbies", ["lobbies" => $lobbies]);
  }

  public function manage_lobbies_delete_lobby($id)
  {
    $lobby = Lobby::whereId($id)->first();
    $lobby->delete();
    $lobbies = Lobby::get();
    return view("admin/manage/lobbies/lobbies", ["lobbies" => $lobbies]);
  }

  public function manage_remove_all_lobbies()
  {
    $lobbies = Lobby::get();
    foreach($lobbies as $index=>$value){
      $value->delete();
    }
    return redirect("admin/manage/lobbies");
  }

  public function manage_user($id)
  {
    $user = User::whereId($id)->first();
    return view('admin/manage/users/user', ["user" => $user]);
  }

  public function manage_user_submit($id)
  {
    $user = User::whereId($id)->first();
    $user->role_id = request("role_id");
    $user->name = request("name");
    $user->lobbies = request("lobbies");
    $user->acc_url = request("acc_url");
    $user->avatar = request("avatar");
    $user->primaryclan = request("primaryclan");
    $user->steamid = request("steamid");
    $user->save();
    $users = User::get();
    return view('admin/manage/users/users', ["users" => $users]);
  }

  public function manage_user_removelobbies($id)
  {
    $user = User::whereId($id)->first();
    $lobbies = Lobby::where("owner_id", "=", $user->id)->get();

    foreach($lobbies as $index=>$value){
      $value->delete();
    }
    if(!$lobbies->isEmpty()){
      $user->lobbies = $user->lobbies-1;
    }
    $user->save();
    $users = User::get();
    return view('admin/manage/users/users', ["users" => $users]);
  }

  public function manage_user_ban($id)
  {
    $user = User::whereId($id)->first();
    $user->role_id = 99;
    $user->save();
    $users = User::get();
    return view('admin/manage/users/users', ["users" => $users]);
  }

}
