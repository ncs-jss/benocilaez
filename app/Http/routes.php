<?php

Route::get('/',['as'=>'login','uses'=>'pagesController@login']);
Route::get('/register',['as'=>'registration','uses'=>'pagesController@registration']);

Route::post('/verification',['as'=>'verification','uses'=>'UserController@ulogin']);
Route::post('/signup',['as'=>'signup','uses'=>'UserController@usersignup']);
?>
