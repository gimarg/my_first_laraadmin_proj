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
    return view('welcome');
});

Route::get('/users', 'LA\UsersController@react_native_api');
Route::get('/user_costs', 'LA\Costs_per_UserController@show');
/* ================== Homepage + Admin Routes ================== */

require __DIR__.'/admin_routes.php';
