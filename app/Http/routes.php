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

Route::get('/', function () {
    if (App::environment('production')) {
        return redirect('app/');
    }
    // Or if locale or testing
    return view('welcome');
});

Route::post('authenticate', 'AuthenticateController@authenticate');
Route::post('invalidate', ['uses' => 'AuthenticateController@invalidate', 'middleware' => 'jwt.auth']);
Route::post('user', ['uses' => 'AuthenticateController@user', 'middleware' => 'jwt.auth']);
