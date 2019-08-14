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

use App\Mail\ContactMessageCreated;

Route::get('/', 'PagesController@home')->name('home');

Route::get('/about', 'PagesController@about')->name('about');

Route::get('/contact', 'ContactsController@create')->name('contacts.create');

Route::get('/contact', 'ContactsController@create')->name('contacts.create');

Route::post('/contact', 'ContactsController@store')->name('contacts.store');

Route::middleware('auth'/*, 'verified'*/)->group(function () {
    Route::resource('profiles', 'ProfileController', [
        'only' => ['edit', 'update', 'destroy', 'show'],
        'parameters' => ['profiles' => 'user']
    ]);
});

Auth::routes(['verify' => true]);

/*Route::get('/home', 'HomeController@index')->name('home');*/
