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
//user
Route::get('/', function () {
    return view('pages.user.main');
});
Route::get('/Contact', function () {
    return view('pages.user.contact');
});
Route::get('/User', function () {
    return view('pages.user.user');
});
Route::get('/Profile', function () {
    return view('pages.user.profile');
});
Route::get('/BorrowList', function () {
    return view('pages.user.borrowlist');
});
Route::get('/Changepass', function () {
    return view('pages.user.changepass');
});
//admin
Route::get('/Admin', function () {
    return view('pages.admin.main');
});
//resource User
Route::get('/Createaccount', function () {
    return view('user.create');
});
Route::get('/Manageuser', function () {
    return view('user.index');
});
Route::get('/Edituser', function () {
    return view('user.edit');
});
//resource Category
Route::get('/Category', function () {
    return view('category.index');
});
Route::get('/Createcategory', function () {
    return view('category.create');
});
Route::get('/Editcategory', function () {
    return view('category.edit');
});
//resource Book
Route::get('/Book', function () {
    return view('book.index');
});
Route::get('/Createbook', function () {
    return view('book.create');
});
Route::get('/Editbook', function () {
    return view('book.edit');
});
Route::get('/Showbook', function () {
    return view('book.show');
});
//
Route::get('/Historyborrow', function () {
    return view('pages.admin.historyborrow');
});
Route::get('/Createborrow', function () {
    return view('pages.admin.createborrow');
});
Route::get('/Turnbackborrow', function () {
    return view('pages.admin.turnbackborrow');
});
