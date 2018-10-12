<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\site_settings;

class SiteSettings extends Controller
{
  public function view()
  {
    $list = site_settings::orderBy('updated_at', 'ascending')->get();
    return view('admin/manage/settings/settings', ['list' => $list]);
  }

  public function create()
  {
    return view('admin/manage/settings/creating');
  }

  public function create_submit()
  {
    site_settings::create([
    'for' => request('for'),
    'content' => request('content'),
    ]);
    $list = site_settings::orderBy('updated_at', 'ascending')->get();
    return view('admin/manage/settings/settings', ['list' => $list]);
  }

  public function edit($id)
  {
    $settings = site_settings::whereId($id)->first();
    return view('admin/manage/settings/edit', ["settings" => $settings]);
  }

  public function edit_submit($id)
  {
    $settings = site_settings::whereId($id)->first();
    $settings->for = request("for");
    $settings->content = request("content");
    $settings->save();
    $list = site_settings::orderBy('updated_at', 'ascending')->get();
    return view('admin/manage/settings/settings', ['list' => $list]);
  }

  public function delete($id)
  {
    $settings = site_settings::whereId($id)->first();
    $settings->delete();
    $list = site_settings::orderBy('updated_at', 'ascending')->get();
    return view('admin/manage/settings/settings', ['list' => $list]);
  }

}
