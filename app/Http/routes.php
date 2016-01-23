<?php

Route::group(['middleware' => ['web']], function () {


	Route::get('/', ['as'=>'root', 'uses'=>'PagesController@root']);
	Route::get('/register', function () {
		return view('add_society');
	});
	/*Route::get('/', function () {
		return view('');
	});
	Route::get('/register', function () {
		return view('');
	});
*/

	//POST Routes

	Route::post('/register_society', ['as'=>'register', 'before'=>'csrf', 'uses'=>'UserController@reg_society']);
	Route::post('/login_society',['as'=>'login', 'before'=>'csrf', 'uses'=>'UserController@login_society']);
});
