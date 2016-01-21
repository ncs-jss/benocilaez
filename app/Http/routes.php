<?php

Route::get('/',['as'=>'userdashboard','uses'=>'UserController@index']);
Route::get('user_signup',['as'=>'usersignup','uses'=>'UserController@usignup']);
Route::get('user_login',['as'=>'userlogin','uses'=>'UserController@ulogin']);
Route::get('home',['as' => 'home','uses' => function () {
    return view('home');

}]);

Route::get('society_login',['uses'=>'SocietyController@slogin']);




Route::get('social/login/redirect/{provider}',array('as'=>'social_login', 'uses'=>'Auth\AuthController@redirectToProvider'));
Route::get('social/login/{provider}','Auth\AuthController@handleProviderCallback');
Route::post('usersignup',['before'=>'csrf', 'uses'=> 'UserController@usersignup']);
Route::post('userlogin',['before'=>'csrf','uses'=>'UserController@userlogin']);
Route::post('societylogin',['before'=>'csrf','uses'=>'SocietyController@societylogin']);

?>
