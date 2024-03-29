<?php

use Illuminate\Http\Request;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('register_users', 'RegisterUserController@index');
Route::get('register_users/{id}', 'RegisterUserController@show');
Route::post('register_users', 'RegisterUserController@store');
Route::put('register_users/{id}', 'RegisterUserController@update');
Route::delete('register_users/{id}', 'RegisterUserController@destroy');

Route::post('signup', 'AuthController@register');
Route::post('login', 'AuthController@login');

Route::group(['prefix' => 'auth', 'middleware' => 'jwt.auth'], function () {
    Route::get('user', 'AuthController@user');
    Route::post('logout', 'AuthController@logout');
});

Route::middleware('jwt.refresh')->get('/token/refresh', 'AuthController@refresh');
