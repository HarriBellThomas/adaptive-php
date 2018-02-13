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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('/user', 'UserController', ['only' => ['index', 'show']]);
Route::resource('/style', 'StyleController')->middleware('auth');

Route::get('/redirect/{provider}/{data?}', 'SocialAuthController@redirect');
Route::get('/callback/{provider}', 'SocialAuthController@callback');

Route::get('/make_default/{id}', 'StyleController@make_default_style')->middleware('auth');

Route::get('/api/login', function() {
  return view('api.login');
});

Route::auth();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');
