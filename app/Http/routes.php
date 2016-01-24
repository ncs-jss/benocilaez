<?php

Route::group(['middleware' => ['web']], function () {


	Route::get('/', ['as'=>'root', 'uses'=>'PagesController@root']);
	Route::get('/register', function () {
		return view('add_society');
	});
	Route::get('/add_society', ['as'=>'add_soc', 'uses'=>'PagesController@add_society']);
	Route::get('/event_approval', ['as'=>'event_approval', 'uses'=>'PagesController@event_approval']);

	Route::get('/ss', function(){
		return App\Events::all();
	});

	/*
	Route::get('/register', function () {
		return view('');
	});
*/

	//POST Routes

	Route::post('/register_society', ['as'=>'register', 'before'=>'csrf', 'uses'=>'UserController@reg_society']);
	Route::post('/login_society',['as'=>'login', 'before'=>'csrf', 'uses'=>'UserController@login_society']);
});
