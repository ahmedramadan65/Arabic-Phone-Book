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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/addcontact', 'contactCont@addContact')->name('add.contact')->middleware('auth');
Route::post('/addcontact', 'contactCont@addContactForm')->name('add.contactForm')->middleware('auth');

Route::get('/deletecontact/{id}', 'contactCont@deleteContact')->name('delete.contact')->middleware('auth');

Route::get('/updatecontact/{id}', 'contactCont@updateContact')->name('update.contact')->middleware('auth');
Route::post('/updatecontact/{id}', 'contactCont@updateContactForm')->name('update.contactForm')->middleware('auth');

Route::get('/search','contactCont@searchContact')->name('search.contact')->middleware('auth');

