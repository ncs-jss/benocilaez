<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('login', 'Api\SocietyController@login');
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('details', 'Api\SocietyController@details');
    Route::get('update', 'Api\SocietyController@update');
});

Route::get('category', 'Api\CategoryController@index');
Route::get('event/category/{category_id}', 'Api\EventController@indexCategory');
Route::resource('event', 'Api\EventController');
