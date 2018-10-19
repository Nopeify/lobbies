<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lobby;
use App\site_settings;

class Main extends Controller
{
  public function main()
  {
    $maintance = site_settings::where("for", "=", "site_maintanace")->first();
    if($maintance && $maintance->content == "true"){return "Site under maintance";}

    $list = Lobby::orderBy('updated_at', 'ascending')->get()->take(20);
    return view('main', ['list' => $list]);
  }

  public function more()
  {
    $maintance = site_settings::where("for", "=", "site_maintanace")->first();
    if($maintance && $maintance->content == "true"){return "Site under maintance";}

    return view('more');
  }

  public function premium()
  {
    $maintance = site_settings::where("for", "=", "site_maintanace")->first();
    if($maintance && $maintance->content == "true"){return "Site under maintance";}

    return view('premium');
  }
  public function policy()
  {
    $maintance = site_settings::where("for", "=", "site_maintanace")->first();
    if($maintance && $maintance->content == "true"){return "Site under maintance";}

    return view('policy');
  }

}
