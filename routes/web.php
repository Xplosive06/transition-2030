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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'PagesController@home')->name('home');

Route::get('/about', 'PagesController@about')->name('about');

Route::get('/users_list', 'PagesController@users_list')->name('users_list')->middleware('auth');

Route::get('/contact', 'ContactsController@create')->name('contacts.create');

Route::get('/contact', 'ContactsController@create')->name('contacts.create');

Route::post('/contact', 'ContactsController@store')->name('contacts.store');

Route::get('/show_delete/{id}', 'ProfileController@show_delete')->name('profiles.show_delete')->middleware('auth');

Route::middleware('auth'/*, 'verified'*/)->group(function () {
    Route::resource('profiles', 'ProfileController', [
        'only' => ['edit', 'update', 'destroy', 'show'],
        'parameters' => ['profiles' => 'user']
    ]);
});

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});

Auth::routes(['verify' => true]);
