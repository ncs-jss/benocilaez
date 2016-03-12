
<?php
use App\User;
Route::group(['middleware' => ['web']], function () {
	Route::get('/', ['as'=>'root', 'uses'=>'PagesController@root']);
	Route::get('/add_society', ['as'=>'add_soc', 'uses'=>'PagesController@add_society']);
	Route::get('/event_approval', ['as'=>'event_approval', 'uses'=>'PagesController@event_approval']);
	Route::get('/view_event/{soc_id?}', ['as'=>'view_event', 'uses'=>'PagesController@view_events']);
	Route::get('/add_event',['as'=>'add_event', 'uses'=>'PagesController@add_event']);
	Route::get('/edit_event/{id}', ['as'=>'edit_event', 'uses'=>'OpController@edit']);
	Route::get('/delete/{id}', ['as'=>'delete' , 'uses'=>'OpController@delete']);
	Route::get('/add_winners', ['as'=>'add_winners', 'uses'=>'PagesController@add_winners']);
    Route::get('/acd/{id}', ['uses'=>'PagesController@get_soc_mem_details']);
    Route::get('/update_mem_details/{id}', ['uses'=>'OpController@update_mem_details']);
    Route::get('/del-det/{id}', ['uses'=>'OpController@delete_mem_details']);
    Route::get('/get_soc_events', ['uses'=>'PagesController@get_evesants']);
    Route::get('/xx/{id?}', ['uses'=>'ApiController@get_events']);
	Route::get('/logout', ['as'=>'logout', 'uses'=>'OpController@logout']);
	Route::get('/req/{id}', ['as'=>'request', 'uses'=>'OpController@request']);
	Route::get('/approve/{id}', ['as'=>'approve', 'uses'=>'OpController@approve']);
    Route::get('/admin',  ['as'=>'admin_panel', 'uses'=>'PagesController@admin']);
    Route::get('/soc_details/{id?}', ['as'=>'add_soc_details', 'uses'=>'PagesController@add_soc_details']);
    Route::get('/enable_feature/{what}', ['uses'=>'OpController@enable']);
    Route::get('/users-all', function(){
        return App\Status::first();
    });

    Route::get('/team/{team}', ['as'=>'core_team', 'uses'=> 'PagesController@add_soc_details']);
    Route::get('/team/{team}', ['as'=>'volunteer', 'uses'=> 'PagesController@add_soc_details_volunteer']);





    Route::get('/del_soc/{id?}', ['uses'=>'OpController@del_soc']);

    Route::post('team/save_mem_details', ['uses'=>'OpController@save_mem_details']);
    Route::post('/edit_soc/{id?}', ['uses'=>'OpController@edit_soc']);
		//POST Routes
	Route::post('/edit_event/{id}', ['as'=>'edit', 'before'=>'csrf', 'uses'=>'OpController@edit_event']);
	Route::post('/register_society', ['as'=>'register', 'before'=>'csrf', 'uses'=>'UserController@reg_society']);
	Route::post('/login_society',['as'=>'login', 'before'=>'csrf', 'uses'=>'UserController@login_society']);
	Route::post('/upload_add_event', ['as'=>'event_creation_upload', 'before'=>'csrf', 'uses'=>'UserController@upload_add_event']);
	Route::post('/add_event', ['as'=>'event_creation', 'before'=>'csrf', 'uses'=>'UserController@create_event']);
	Route::post('/add_winners', ['as'=>'create_winners', 'before'=>'csrf', 'uses'=>'OpController@add_winners']);
});
