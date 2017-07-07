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


//admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('dashboard', function () {
        return view('admin.master');
    });
    Route::resource('user', 'Admins\UserController');
    Route::resource('category', 'Admins\CategoryController');
    Route::resource('profile', 'Admins\ProfileCotroller');
    Route::resource('ingredient', 'Admins\IngredientController');
    // Route::resource('product', 'ProductController');
    // Route::resource('order', 'OrderController');
    // Route::resource('comment', 'CommentController');
    // Route::get('rate', 'RateController@index')->name('rate');
});

//auth
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::resource('category', 'Admins\categoryController');
//facebook
Route::get('auth/facebook', 'SocialiteController@redirect')->name('facebook.login');
Route::get('callback/facebook', 'SocialiteController@callback');
//Logout
Route::get('logout', [ 'as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::post('postLogin', ['as' => 'postLogin', 'uses' => 'SocialiteController@postLogin']);
