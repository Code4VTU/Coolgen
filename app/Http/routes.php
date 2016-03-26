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

    Route::get('/', function () {
        return view('landing');
    });

    Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
        Route::get('/', 'DashboardController@index');
    });

    //Twitter
    Route::get('/twitter/login', [
        'as' => 'twitter_login', 'uses' => 'TwitterController@login'
    ]);

    Route::get('/twitter/callback', [
        'as' => 'twitter_callback', 'uses' => 'TwitterController@callback'
    ]);

    Route::get('twitter/error', ['as' => 'twitter_error', function(){
        // Something went wrong, add your own error handling here
    }]);

    Route::get('twitter/logout', ['as' => 'twitter.logout', function(){
        Session::forget('access_token');
        return Redirect::to('/')->with('flash_notice', 'You\'ve successfully logged out!');
    }]);

    Route::get('/twitter/feed', [
        'as' => 'twitter_feed', 'uses' => 'TwitterController@newsFeed'
    ]);
    
});

