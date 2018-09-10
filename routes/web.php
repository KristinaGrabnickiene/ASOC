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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile.index');
Route::get('/profile/create/{id}', 'ProfileController@create')->name('profile.create');
Route::post('/profile/store', 'ProfileController@store')->name('profile.store'); 
Route::get("/profile/{id}/edit", "ProfileController@edit")->name('profile.edit');
Route::post("/profile/{id}/update", "ProfileController@update")->name('profile.update');
Route::post('/profile/{id}/delete', 'ProfileController@destroy')->name('profile.delete');

Route::get('/user', 'UserController@index')->name('user.index');


Route::get('/profile/create', 'ProfileController@userCreate')->name('user.create');