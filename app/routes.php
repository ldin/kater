<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', function()
// {
// 	return View::make('hello');
// });

Route::get('/', 'HomeController@showWelcome');


Route::controller('auth', 'AuthController');
Route::controller('password', 'RemindersController');

Route::controller('admin', 'AdminController');

//Route::post('/form-request', 'HomeController@postFormRequest');

//all

Route::post('more-photos', array('before'=>'csrf-ajax', 'as'=>'more-photos', 'uses'=>'HomeController@getMorePhotos'));

Route::get('/rate/{slug?}', 'HomeController@getRate');
Route::get('/{type}/{slug?}', 'HomeController@getPage');
Route::get('/{type}/{post}/{item}', 'HomeController@getItem');
Route::controller('/', 'HomeController');
