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
    Route::get('dashboard', 'Admins\UserController@report')->name('report');
    Route::resource('user', 'Admins\UserController');
    Route::put('profile/{id}', 'Admins\UserController@showAdmin')->name('profile');
    Route::put('update/profile/{id}', 'Admins\UserController@updaeAdmin')->name('profile');
    Route::resource('subcrice', 'Admins\SubcriceController');
    Route::resource('category', 'Admins\CategoryController');
    Route::resource('ingredient', 'Admins\IngredientController');
    Route::resource('post', 'Admins\PostController');
    Route::resource('cooking', 'Admins\CookingController');
    Route::resource('order', 'Admins\OrderController');
});


Route::group(['prefix' => 'site', 'as' => 'site.'], function () {
    Route::resource('profile/user', 'ProfileController');
    Route::get('master', 'ProfileController@showMaster')->name('master');
    Route::get('cooking/{id}', 'Sites\CookingController@show');

    Route::get('comment/{id}', 'Sites\CookingController@showComment');
    Route::post('comment', 'Sites\CookingController@submitComment');
    Route::put('comment', 'Sites\CookingController@submitComment');
    Route::delete('comment/{id}', 'Sites\CookingController@deleteComment');
    Route::get('rate/{id}', 'Sites\CookingController@showRate');
    Route::resource('blog', 'BlogController');
    Route::get('showDetail/{id}', 'BlogController@showDetail');
    Route::resource('cooking', 'Sites\CookingController');
    Route::get('showCategory/{id}', 'HomeController@showCategory')->name('showCategory');

    Route::resource('follow', 'FollowController');
    Route::resource('wislish', 'WishlishController');
    Route::post('subcrice', 'ProfileController@subcrice');
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
//facebook
Route::get('auth/facebook', 'SocialiteController@redirect')->name('facebook.login');
Route::get('callback/facebook', 'SocialiteController@callback');
//Logout
Route::get('logout', [ 'as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::post('postLogin', ['as' => 'postLogin', 'uses' => 'SocialiteController@postLogin']);

Route::resource('cooking', 'Sites\SubmitCookingController');
Route::get('/search/cooking', 'Sites\SubmitCookingController@search');
Route::get('/units/cooking', 'Sites\SubmitCookingController@getUnits');
Route::post('upload/cooking', 'Sites\SubmitCookingController@uploadImage');
Route::delete('cancel/cooking/{id}', 'Sites\SubmitCookingController@cancelCooking');
Route::post('ingredient/cooking', 'Sites\SubmitCookingController@addIngredient');
Route::delete('ingredient/cooking/{id}', 'Sites\SubmitCookingController@deleteIngredient');
Route::post('step/cooking', 'Sites\SubmitCookingController@addStep');
Route::delete('step/cooking/{id}', 'Sites\SubmitCookingController@deleteStep');
Route::get('categories/cooking', 'Sites\SubmitCookingController@getCookingCategories');
Route::post('categories/cooking', 'Sites\SubmitCookingController@storeCookingCategories');

Route::get('search', 'Sites\SearchController@index');
Route::get('search/name', 'Sites\SearchController@searchName');
Route::get('search/ingredient', 'Sites\SearchController@searchIngredient');

Route::resource('cart', 'Sites\CartController');
Route::get('show/cart', 'Sites\CartController@showCart');
Route::get('checkout', 'Sites\CartController@checkout')->middleware('auth');
Route::post('checkout', 'Sites\CartController@storeOrder')->middleware('auth');
Route::get('order', 'Sites\CartController@showOrder')->middleware('auth');
Route::get('order/sell', 'Admins\OrderController@orderSell')->middleware('auth');
Route::get('invoice/{id}', 'Sites\CartController@showInvoice')->middleware('auth');
Route::get('order/show/{id}', 'Admins\OrderController@show')->middleware('auth');
Route::put('order/show/{id}', 'Admins\OrderController@update')->middleware('auth');
