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
    return view('home');
});


//CONTACT
Route::get('/contact/index', 'ContactController@index')->name('contact.index');
Route::get('/contact/create', 'ContactController@create')->name('contact.create');
Route::post('/contact/store', 'ContactController@store')->name('contact.store');
Route::get('/contact/delete/{id}', 'ContactController@destroy')->name('contact.delete');
Route::get('/contact/edit/{id}', 'ContactController@edit')->name('contact.edit');
Route::post('/contact/update/{id}', 'ContactController@update')->name('contact.update');

//GROUP
Route::get('/group/index', 'GroupController@index')->name('group.index');
Route::get('/group/create', 'GroupController@create')->name('group.create');
Route::post('/group/store', 'GroupController@store')->name('group.store');
Route::get('/group/delete/{id}', 'GroupController@destroy')->name('group.delete');
Route::get('/group/edit/{id}', 'GroupController@edit')->name('group.edit');
Route::post('/group/update/{id}', 'GroupController@update')->name('group.update');
