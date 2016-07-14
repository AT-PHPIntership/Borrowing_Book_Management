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

Route::get('/login', ['as' => 'admin.login', 'uses' => 'Backend\AuthController@getlogin']);
Route::post('/login', ['uses' => 'Backend\AuthController@postlogin']);
Route::get('/logout', ['as' => 'admin.logout', 'uses' => 'Backend\AuthController@logout']);
Route::get('/', ['as' => 'home.admin', 'uses' => 'Backend\HomeController@index', 'middleware' => 'auth:admin']);
