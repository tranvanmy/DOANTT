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
    return view('sites.home.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('category', 'Admins\categoryController');

//facebook
Route::get('auth/facebook', 'SocialiteController@redirect')->name('facebook.login');
Route::get('callback/facebook', 'SocialiteController@callback');

//Logout
Route::get('logout', [ 'as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::post('postLogin', ['as' => 'postLogin', 'uses' => 'SocialiteController@postLogin']);
