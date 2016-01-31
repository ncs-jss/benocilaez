<?php
Route::group(['middleware' => ['web']], function () {


	Route::get('/', ['as'=>'root', 'uses'=>'PagesController@root']);
	Route::get('/add_society', ['as'=>'add_soc', 'uses'=>'PagesController@add_society']);
	Route::get('/event_approval', ['as'=>'event_approval', 'uses'=>'PagesController@event_approval']);
	Route::get('/view_event/{soc_id?}', ['as'=>'view_event', 'uses'=>'PagesController@view_events']);
	Route::get('/add_event',['as'=>'add_event', 'uses'=>'PagesController@add_event']);
	Route::get('/edit_event/{id}', ['as'=>'edit_event', 'uses'=>'OpController@edit']);
	Route::get('/delete/{id}', ['as'=>'delete' , 'uses'=>'OpController@delete']);
	Route::get('/add_winners', ['as'=>'add_winners', 'uses'=>'OpController@add_winners']);

	Route::get('/logout',['as'=>'logout', 'uses'=>'OpController@logout']);

		//POST Routes

	Route::post('/edit_event/{id}', ['as'=>'edit', 'before'=>'csrf', 'uses'=>'OpController@edit_event']);
	Route::post('/register_society', ['as'=>'register', 'before'=>'csrf', 'uses'=>'UserController@reg_society']);
	Route::post('/login_society',['as'=>'login', 'before'=>'csrf', 'uses'=>'UserController@login_society']);
	Route::post('/add_event', ['as'=>'event_creation', 'before'=>'csrf', 'uses'=>'UserController@create_event']);
});
