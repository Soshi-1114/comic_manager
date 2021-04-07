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
Auth::routes();
// Route::get('/', 'HomeController@home');
Route::get('/', 'HomeController@index')->name('home');
// Route::get('/logout', 'HomeController@index')->name('logout');
Route::get('/shelf', 'ShelfController@index');

Route::get('/shelf/editShelves', 'ShelfController@editor');
// Route::post('/shelf/editShelves', 'ShelfController@update');

Route::get('/shelf/editShelves/add', 'ShelfController@add');
Route::post('/shelf/editShelves/add', 'ShelfController@create');

Route::get('/shelf/editShelves/delete/{id}', 'ShelfController@del');
Route::post('/shelf/editShelves/delete', 'ShelfController@remove');

Route::get('/shelf/editShelves/edit/{id}', 'ShelfController@edit');
Route::post('/shelf/editShelves/edit/', 'ShelfController@update');


Route::get('/shelf/{id}/comics', 'ComicController@index')->name('comics');

Route::get('/shelf/{id}/comics/add', 'ComicController@add');
Route::post('/shelf/{id}/comics/add', 'ComicController@create');

Route::get('/shelf/{id}/comics/delete/{comic_id}', 'ComicController@del');
Route::post('/shelf/{id}/comics/delete', 'ComicController@remove');

Route::get('/shelf/{id}/comics/search/', 'ComicController@search');
Route::get('/shelf/{id}/comics/readCode/', 'ComicController@readCode');
