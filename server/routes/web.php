<?php
use App\Category;
use App\Event;
use App\Branch;
use App\MemberType;
use App\Winner;

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

    Route::get('member', function () {
        $branch = Branch::all();
        $member_type = MemberType::all();
        return view('society.add-member', ['branch' => $branch, 'member_type' => $member_type]);
    });

    Route::get('members', 'MemberController@index');

    Route::get('members/{member}/edit', 'MemberController@edit');

    Route::post('member', 'MemberController@store');

    Route::put('members/{member}', 'MemberController@update');

    Route::delete('members/{member}', 'MemberController@delete')->name('member.destroy');

    Route::get('winner', function () {
        $events = Event::where('society_id', Auth::id())->get();
        return view('society.add-winner', ['events' => $events]);
    });

    Route::get('winners', 'WinnerController@index');

    Route::get('winners/{winner}/edit', 'WinnerController@edit');

    Route::post('winner', 'WinnerController@store');

    Route::put('winners/{winner}', 'WinnerController@update');

    Route::delete('winners/{winner}', 'WinnerController@delete')->name('winner.destroy');

    Route::get('files', 'FileController@index');

    Route::post('file', 'FileController@store');

    Route::get('file', 'FileController@all');

    Route::get('file/delete/{id}', 'FileController@delete');

    Route::get('export/events', function () {
        $event = Event::with('category')->OrderBy('name')->get();
        return view('society.export_events', ['events' => $event]);
    });

    Route::get('export/winners', function () {
        $winner = Winner::with('event')->OrderBy('event_id')->OrderBy('rank')->get();
        return view('society.export_winners', ['winners' => $winner]);
    });
});
