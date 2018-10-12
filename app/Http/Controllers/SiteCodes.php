<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\codes;
use Auth;
use Session;

class SiteCodes extends Controller
{
  public function view()
  {
    $list = codes::orderBy('updated_at', 'ascending')->get();
    return view('admin/manage/codes/codes', ['list' => $list]);
  }

  public function create()
  {
    return view('admin/manage/codes/creating');
  }

  public function create_submit()
  {

    if(request('multiple_lines')){
      $lines = explode("\n", request('multiple_lines'));
      foreach($lines as $line)
      {
        if($line){

          codes::create([
            'for' => request('for'),
            'code' => trim($line),
          ]);
        }
      }
    } else {
      codes::create([
        'for' => request('for'),
        'code' => request('code'),
      ]);
    }
    $list = codes::orderBy('updated_at', 'ascending')->get();
    return view('admin/manage/codes/codes', ['list' => $list]);
  }

  public function edit($id)
  {
    $code = codes::whereId($id)->first();
    return view('admin/manage/codes/edit', ["code" => $code]);
  }

  public function edit_submit($id)
  {
    $code = codes::whereId($id)->first();
    $code->for = request("for");
    $code->code = request("code");
    $code->save();
    $list = codes::orderBy('updated_at', 'ascending')->get();
    return view('admin/manage/codes/codes', ['list' => $list]);
  }

  public function delete($id)
  {
    $code = codes::whereId($id)->first();
    $code->delete();
    $list = codes::orderBy('updated_at', 'ascending')->get();
    return view('admin/manage/codes/codes', ['list' => $list]);
  }

  public function redeem()
  {
    $user = Auth::User();
    $code = codes::where("code", "=", request('code'))->first();
    if($code == null)
    {
      return back();
    } else {
      if($user->role_id == 3){
        return "You're admin, action impossible.";
      } else {
        $code->delete();
        $user->role_id = 2;
        $user->save();
        Session::flash('success', 'Your account is now premium.');
        return view("premium");
      }
    }
  }


}
