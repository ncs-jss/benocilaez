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

Route::get('/', function () {
    return view('society.login');
});

Route::post('login', 'SocietyController@login');

Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['middleware' => ['auth']], function () {
	Route::get('home', function () {
	    return view('society.home');
	});

	Route::get('event', function () {
	    return view('society.add-event');
	});

	Route::post('event', 'EventController@store');
});
