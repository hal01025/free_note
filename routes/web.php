<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('my-page', 'TopController@index')->name('my-page');
});


Route::get('auth.login', function() {return view('auth.login');})->name('auth.login');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('notes', 'NotesController');
    Route::get('search', 'SearchController@index')->name('search.index');
    Route::resource('note_details', 'NoteDetailsController', ['only' => ['show']]);
    Route::group(['prefix' => 'my-page/{id}'], function() {
       Route::get('notes', 'NotesController@show')->name('notes.show');
       Route::get('notes', 'NotesController@create')->name('notes.create');
       Route::post('notes', 'NotesController@store')->name('notes.store');
       Route::post('share', 'ShareController@store')->name('notes.share');
       Route::delete('protect', 'ShareController@destroy')->name('notes.protect');
   });
    
});

