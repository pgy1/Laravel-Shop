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

Route::get('/past/list', 'PastController@lists');
Route::get('/past/show/{pid}', 'PastController@show');
Route::get('/past/delete', 'PastController@delete');
Route::post('/past/create', 'PastController@create');

Route::get('/favorite/list', 'FavoriteController@lists');
Route::get('/favorite/list/{pageNo}', 'FavoriteController@listByPage');
Route::get('/favorite/show/{fid}', 'FavoriteController@show');
Route::get('/favorite/delete/{fid}', 'FavoriteController@delete');
Route::get('/favorite/create/{pid}', 'FavoriteController@create');

Route::get('/product/search', 'ProductController@lists');
Route::get('/product/list/{classid}', 'ProductController@showbyclass');
Route::get('/product/show/{pid}', 'ProductController@show');
Route::get('/product/edit', 'ProductController@edit');
Route::get('/product/delete', 'ProductController@delete');
Route::post('/product/create', 'ProductController@create');
Route::post('/product/update', 'ProductController@update');

Route::get('/userinfo/show/{uid}', 'UserinfoController@show');
Route::get('/userinfo/edit', 'UserinfoController@edit');
Route::post('/userinfo/update', 'UserinfoController@update');




Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
