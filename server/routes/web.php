<?php
use App\Category;

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
        $category = Category::all();
        return view('society.add-event', ['category' => $category]);
    });

    Route::post('event', 'EventController@store');

    Route::get('events', 'EventController@index');

    Route::get('events/{event}/edit', 'EventController@edit');

    Route::put('events/{event}', 'EventController@update');

    Route::delete('events/{event}', 'EventController@delete')->name('event.destroy');

    Route::get('ctc', function () {
        return view('society.add-ctc');
    });

    Route::get('ctcs', 'CtcController@index');

    Route::get('ctcs/{ctc}/edit', 'CtcController@edit');

    Route::post('ctc', 'CtcController@store');
});
