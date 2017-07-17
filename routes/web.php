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
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    Route::get('dashboard', function () {
        return view('admin.master');
    });
    Route::resource('user', 'Admins\UserController');
    Route::resource('category', 'Admins\CategoryController');
    Route::resource('ingredient', 'Admins\IngredientController');
    Route::resource('post', 'Admins\PostController');
    // Route::resource('order', 'OrderController');
    // Route::resource('comment', 'CommentController');
    // Route::get('rate', 'RateController@index')->name('rate');
});

 
Route::group(['prefix' => 'site', 'as' => 'site.'], function () {
    Route::resource('profile/user', 'ProfileController');
    Route::resource('blog', 'BlogController');
    Route::resource('cooking', 'Sites\CookingController');
    Route::resource('follow', 'FollowController');
    Route::get('master', 'ProfileController@showMater')->name('master');
    Route::put('profile/changepass/{id}', 'ProfileController@changePass');
    Route::get('profile/editpost/{id}', 'ProfileController@editPost')->name('editPost');
    Route::put('profile/updatePost/{id}', 'ProfileController@updatePost')->name('updatePost');
    Route::put('profile/deletePost/{id}', 'ProfileController@deletePost')->name('deletePost');
    Route::get('listPost/user/{id}', 'BlogController@showList')->name('listPost');
    Route::get('listCooking/user/{id}', 'Sites\CookingController@showCooking')->name('cooking');
    Route::get('listFollows/user/{id}', 'FollowController@showFollow')->name('follow');
    Route::get('listByFollows/user/{id}', 'FollowController@showByFollow')->name('byfollow');
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
