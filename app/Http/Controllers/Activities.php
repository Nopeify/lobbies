<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\activity;

class Activities extends Controller
{
  public function view()
  {
    $list = activity::get();
    return view("admin/manage/activities/activities", ["list" => $list]);
  }

  public function delete($id)
  {
    $activity = activity::whereId($id)->first();
    $activity->delete();
    $list = activity::get();
    return view("admin/manage/activities/activities", ["list" => $list]);
  }

  public function delete_all()
  {
    $list = activity::get();
    foreach($list as $index=>$value){
      $value->delete();
    }
    return redirect("admin/manage/activities");
  }

}
