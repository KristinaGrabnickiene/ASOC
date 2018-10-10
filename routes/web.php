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
Route::post('/search', 'HomeController@searchPost');



//profile routai
Route::get('/profile', 'ProfileController@index')->name('profile.index');
Route::get('/profile/create', 'ProfileController@create')->name('profile.create');
Route::post('/profile/store', 'ProfileController@store')->name('profile.store'); 
Route::get("/profile/{id}/edit", "ProfileController@edit")->name('profile.edit');
Route::post("/profile/{id}/update", "ProfileController@update")->name('profile.update');
Route::post('/profile/{id}/delete', 'ProfileController@destroy')->name('profile.delete');

//user routai
Route::get('/user', 'UserController@index')->name('user.index');

Route::get('/profile/{id}/documents', 'ProfileController@documents')->name('profile.documents'); 

//profile routai
Route::get('/document', 'DocumentsController@index')->name('document.index');
Route::get('/document/{document}/{profile}/show', 'DocumentsController@show')->name('document.show');
Route::get('/document/create', 'DocumentsController@create')->name('document.create');
Route::post('/document/store', 'DocumentsController@store')->name('document.store'); 
Route::get("/document/{id}/edit", "DocumentsController@edit")->name('document.edit');
Route::post("/document/{id}/update", "DocumentsController@update")->name('document.update');
Route::post('/document/{id}/delete', 'DocumentsController@destroy')->name('document.delete');

//dokumento pasirašymas
Route::post('/document/{document}/{profile}/{accept}/updateAccept', 'DocumentsController@accept')->name('document.accept');