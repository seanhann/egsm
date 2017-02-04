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

Route::get('token', 'YgController@token');
Route::get('captcha', 'YgController@captcha');
Route::get('/', 'YgController@index');
Route::get('near', 'YgController@near');
Route::get('staff', 'YgController@staff');
Route::get('detail/{id?}', 'YgController@detail');
Route::get('search/{keywords?}', 'YgController@search');
Route::get('content', 'YgController@content');
Route::get('login', 'YgController@getLogin');
Route::post('login', 'YgController@login');
Route::get('regist', 'YgController@getRegist');
Route::post('regist', 'YgController@regist');
Route::get('points', 'YgController@points');
Route::get('info', 'YgController@info');
Route::post('info', 'YgController@postInfo');
Route::get('comments', 'YgController@comments');
Route::get('favorites', 'YgController@favorites');
Route::post('favorite', 'YgController@postFavorite');
Route::get('about', 'YgController@about');

Route::group(['prefix' => 'api'], function () {
	Route::post('login', 'ApiController@login');
	Route::post('regist', 'ApiController@regist');
	Route::get('search/{keyWords}', 'ApiController@search');
	Route::get('hotSearch', 'ApiController@hotSearch');
	Route::get('user/{token}', 'ApiController@user');
	Route::get('comments/{token}', 'ApiController@comments');
	Route::get('favorites/{token}', 'ApiController@favorites');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
