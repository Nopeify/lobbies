<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Main@main')->name('main');
Route::get('+', 'Main@more')->name('more');
Route::get('p', 'Main@premium')->name('premium');
Route::get('policy', 'Main@policy')->name('policy');
// Auth::routes();

Route::get('/admin', 'Admin@index')->name('admin');

Route::get('/admin/manage/users', 'Admin@manage_users')->name('admin.manage_users');
Route::get('/admin/manage/lobbies', 'Admin@manage_lobbies')->name('admin.manage_lobbies');
Route::get('/admin/manage/settings', 'SiteSettings@view')->name('settings.view');
Route::get('/admin/manage/codes', 'SiteCodes@view')->name('codes.view');
Route::get('/admin/manage/activities', 'Activities@view')->name('activities.view');
Route::get('/admin/manage/server', 'Admin@server')->name('admin.server');

Route::post('/admin/manage/activities/delete/{id}', 'Activities@delete')->name('activities.delete');
Route::post('/admin/manage/activities/all/delete', 'Activities@delete_all')->name('activities.delete.all');

Route::get('/admin/manage/codes/create', 'SiteCodes@create')->name('codes.create');
Route::post('/code/redeem', 'SiteCodes@redeem')->name('codes.redeem');
Route::post('/admin/manage/codes/create/submit', 'SiteCodes@create_submit')->name('codes.new');
Route::get('/admin/manage/codes/edit/{id}', 'SiteCodes@edit')->name('codes.edit');
Route::post('/admin/manage/codes/edited/{id}/submit', 'SiteCodes@edit_submit')->name('codes.edited');
Route::post('/admin/manage/codes/edited/{id}/delete', 'SiteCodes@delete')->name('codes.delete');

Route::get('/admin/manage/settings/create', 'SiteSettings@create')->name('settings.create');
Route::get('/admin/manage/settings/edit/{id}', 'SiteSettings@edit')->name('settings.edit');
Route::post('/admin/manage/settings/edited/{id}/delete', 'SiteSettings@delete')->name('settings.delete');
Route::post('/admin/manage/settings/edited/{id}/submit', 'SiteSettings@edit_submit')->name('settings.edited');
Route::post('/admin/manage/settings/create/submit', 'SiteSettings@create_submit')->name('settings.new');

Route::post('/admin/manage/lobbies/delete/{id}', 'Admin@manage_lobbies_delete_lobby')->name('admin.manage_lobbies_delete_lobby');
Route::post('/admin/manage/lobbies/all/delete', 'Admin@manage_remove_all_lobbies')->name('admin.remove_all_lobbies');

Route::get('/admin/manage/user/{id}', 'Admin@manage_user')->name('admin.manage_user');
Route::post('/admin/manage/user/{id}/submit', 'Admin@manage_user_submit')->name('admin.manage_user.submit');
Route::post('/admin/manage/user/{id}/removelobbies', 'Admin@manage_user_removelobbies')->name('admin.manage_user.removelobbies');
Route::post('/admin/manage/user/{id}/ban', 'Admin@manage_user_ban')->name('admin.manage_user.ban');

Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::get('auth/steam', 'SteamLogin@redirectToSteam')->name('login');
Route::get('auth/steam/handle', 'SteamLogin@handle')->name('login.handle')->middleware('activity.login');;

Route::post('l/m', 'Lobbies@make')->name('lobby.make')->middleware('activity.lobby.made');
Route::get('j/{id}', 'Lobbies@join')->name('lobby.join')->middleware('activity.lobby.click');
