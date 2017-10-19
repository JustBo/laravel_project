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

Route::get('/about', 'AboutController@get_content');

Route::resource('articles', 'ArticlesController');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
  ]);
Route::auth();


// Route::get('/articles', 'ArticlesController@get_content');
// Route::get('/articles/create', 'ArticlesController@create');
// Route::get('/articles/{id}', 'ArticlesController@get_specific_article');
// Route::post('/articles', 'ArticlesController@store');

// Route::auth();
//
// Route::get('/home', 'HomeController@index');
