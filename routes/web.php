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

Route::get('/', 'PagesController@index');
Route::resource('profile', 'ProfileController');
Route::resource('members', 'MembersController');
Route::resource('events', 'EventsController');
Route::get('/newsfeed', 'NewsfeedController@index');
Route::get('/finance', function () {
  return view('pages.finance');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
