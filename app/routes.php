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

Route::get('/', function()
{
	
	print_r(Input::all());
	$user = User::first();
	print_r($user->networks);
	return View::make('hello');
});



Route::resource('users', 'UsersController');
