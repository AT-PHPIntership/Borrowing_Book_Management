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

Route::group(['prefix' => 'admin', 'namespace' => 'Backend'], function () {
    //login
    Route::get('/login', ['as' => 'admin.login', 'uses' => 'AuthController@getlogin']);
    Route::post('/login', ['uses' => 'AuthController@postlogin']);
    Route::get('/logout', ['as' => 'admin.logout', 'uses' => 'AuthController@logout']);
    
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/', ['as' => 'home.admin', 'uses' => 'HomeController@index']);
        //user
        Route::resource('user', 'UserController');
        //book
        Route::resource('book', 'BookController');
        //category
        Route::resource('category', 'CategoryController');
        //bookItem
        Route::resource('bookItem', 'BookItemController');
        //borrow
        Route::resource('borrow', 'BorrowController');
        // additional Book
        Route::resource('addbook', 'AddBookController');
    });
});
Route::group(['namespace' => 'Frontend'], function () {
    //User login
    Route::get('/login', ['as' => 'login', 'uses' => 'AuthController@getlogin']);
    Route::post('/login', ['as' => 'login', 'uses' => 'AuthController@postlogin']);
    //User logout
    Route::get('/logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

    Route::group(['middleware' => ['auth']], function () {
        //borrow
        Route::resource('borrow', 'BorrowDetailController');
    });
    //Search
    Route::get('/', ['as' => '/','uses' => 'SearchController@getsearch']);
    Route::get('/search/book', ['uses' => 'SearchController@getjson']);
});
