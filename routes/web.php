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

Route::get('/', ['as' => 'home', function () {
    return view('welcome');
}]);

Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index'])->middleware('islogged');
Route::get('/dashboard/privacy', ['as' => 'privacy', 'uses' => 'DashboardController@privacy'])->middleware('islogged');
Route::get('/dashboard/exchange', ['as' => 'exchange', 'uses' => 'DashboardController@exchange'])->middleware('islogged');

Route::get('/login', "LoginController@index");
Route::post('/login', "LoginController@show");
Route::get('/logout', "Logout@index");
