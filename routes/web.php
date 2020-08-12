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

Route::get('/', 'IndexController@index');

Route::get('/blog', 'IndexController@blog');
Route::get('/blog/{slug}', 'IndexController@show');

Route::post('/blog/{slug}/comment', 'IndexController@comment')->name('post.comment');
Route::get('/blog/category/{slug}', 'IndexController@blogCategory');
Route::get('/search', 'IndexController@blogSearch');

// Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::get('/home', 'HomeController@index')->name('home'); //->middleware('auth');;


// Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
Route::resource('kades', 'KepalaDesaController');
Route::post('getregency', 'KepalaDesaController@getregency')->name('kades.getregency');
Route::post('getdistrict', 'KepalaDesaController@getdistrict')->name('kades.getdistrict');
Route::post('getvillage', 'KepalaDesaController@getvillage')->name('kades.getvillage');
Route::resource('umkm', 'UmkmController');
Route::get('/umkm', 'UmkmController@index')->name('umkm'); //->middleware('auth');

//});

// Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
//     Route::get('/', 'HomeController@index')->name('index');
//     Route::resource('users', 'UsersController');
// });

Route::get('/api/datatable/umkm', 'UmkmController@dataTable')->name('api.datatable.umkm');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/api/datatable/users', 'UsersController@dataTable')->name('api.datatable.users');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
