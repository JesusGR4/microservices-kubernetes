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

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login')->name('login');
});
Route::post('createUser', 'Auth\RegisterController@create')->name('createUser');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('logout', 'AuthController@logout')->name('logout');
    Route::group(['prefix' => 'tweet'], function () {
        Route::post('create', 'TweetController@create')->name('create');
        Route::get('getAll', 'TweetController@getAll')->name('getAll');
    });
});

