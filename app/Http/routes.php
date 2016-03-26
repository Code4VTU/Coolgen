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

Route::group(['middleware' => ['web']], function () {
    Route::auth();

    Route::get('/', 'HomeController@index');

    Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
        Route::get('/', 'DashboardController@index');
    });

    //Twitter
    Route::get('/twitter/login', [
        'as' => 'profile', 'uses' => 'TwitterController@login'
    ]);


});

