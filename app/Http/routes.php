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
    return view('pages.main');
});
Route::get('/Contact', function () {
    return view('pages.contact');
});
Route::get('/User', function () {
    return view('pages.user');
});
Route::get('/Profile', function () {
    return view('pages.profile');
});
Route::get('/BorrowList', function () {
    return view('pages.borrowlist');
});
Route::get('/Changepass', function () {
    return view('pages.changepass');
});
