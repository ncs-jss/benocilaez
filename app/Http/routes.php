<?php
Route::group(['middleware' => ['web']], function () {


	Route::get('/', ['as'=>'root', 'uses'=>'PagesController@root']);
	Route::get('/register', function () {
		return view('add_society');
	});
	Route::get('/add_society', ['as'=>'add_soc', 'uses'=>'PagesController@add_society']);
	Route::get('/event_approval', ['as'=>'event_approval', 'uses'=>'PagesController@event_approval']);
	Route::get('/view_event', ['as'=>'view_event', 'uses'=>'PagesController@view_events']);

	Route::get('/ss', function(){
		$events =[];
		$societies = App\User::where('email', 'abhayrawat26952@gmail.com')->get();
		$events_des = App\User::where('email', 'abhayrawat26952@gmail.com')
								->join('events','events.society_email', '=', 'users.email')
								->join('event_details', 'events.event_id', '=', 'event_details.event_id')
								->select('users.society', 'events.event_id', 'event_details.event_name', 
									'event_details.event_description','event_details.approved')
								->get();
					
					array_push($events, array('society_name'=>$societies[0]->society, 'society_events'=>$events_des));
					return $events;
	});



	//POST Routes

Route::post('/register_society', ['as'=>'register', 'before'=>'csrf', 'uses'=>'UserController@reg_society']);
Route::post('/login_society',['as'=>'login', 'before'=>'csrf', 'uses'=>'UserController@login_society']);
});
