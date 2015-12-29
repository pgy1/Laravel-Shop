<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/past/pay', 'PastController@pay');
Route::get('/past/list/', 'PastController@lists');
Route::get('/past/list/{pageNo}', 'PastController@listByPage');
Route::get('/past/show/{pastid}', 'PastController@show');
Route::get('/past/delete/{pastid}', 'PastController@delete');
Route::get('/past/clear', 'PastController@destroy');
Route::get('/past/create/{pid}', 'PastController@create');

Route::get('/favorite/list', 'FavoriteController@lists');
Route::get('/favorite/list/{pageNo}', 'FavoriteController@listByPage');
Route::get('/favorite/show/{fid}', 'FavoriteController@show');
Route::get('/favorite/delete/{fid}', 'FavoriteController@delete');
Route::get('/favorite/cancel/{pid}', 'FavoriteController@cancel');
Route::get('/favorite/clear', 'FavoriteController@destroy');
Route::get('/favorite/create/{pid}', 'FavoriteController@create');
Route::get('/favorite/cache/{pid}', 'FavoriteController@cache');
Route::get('/favorite/cachelist', 'FavoriteController@cacheList');

Route::get('/product/search', 'ProductController@lists');
Route::get('/product/list/{classid}', 'ProductController@showbyclass');
Route::get('/product/show/{pid}', 'ProductController@show');
Route::get('/product/edit', 'ProductController@edit');
Route::get('/product/delete', 'ProductController@delete');
Route::post('/product/create', 'ProductController@create');
Route::post('/product/update', 'ProductController@update');
Route::post('/product/upload', 'ProductController@upload');

Route::get('/userinfo/show/{uid}', 'UserinfoController@show');
Route::get('/userinfo/edit', 'UserinfoController@edit');
Route::post('/userinfo/update', 'UserinfoController@update');




Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
