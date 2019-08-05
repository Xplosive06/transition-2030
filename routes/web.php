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

Route::get('/', 'PagesController@home')->name('root_path');

Route::get('/test-email', function ()
{
    return new ContactMessageCreated('Mike', 'mike@mail.com', 'salut ça va');
});

Route::get('/about', 'PagesController@about')->name('about_path');

Route::get('/contact', 'ContactsController@create')->name('contact_path');

Route::post('/contact', 'ContactsController@store')->name('contact_path');
