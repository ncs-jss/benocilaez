<?php

use Illuminate\Http\Request;

Route::group([ 'middleware' => ['cors'],], function ($router) {
    Route::get('login', 'Api\SocietyController@login');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('details', 'Api\SocietyController@details');
        Route::get('update', 'Api\SocietyController@update');
    });

    Route::get('society', 'Api\SocietyController@index');

    Route::get('category', 'Api\CategoryController@index');
    Route::get('event/category/{category_id}', 'Api\EventController@indexCategory');
    Route::resource('event', 'Api\EventController');
});
