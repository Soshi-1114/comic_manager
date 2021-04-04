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

Route::get('/', 'ShelfController@index')->name('home');

Route::get('/editShelves', 'ShelfController@edit');
Route::post('/editShelves', 'ShelfController@update');

Route::get('/editShelves/add', 'ShelfController@add');
Route::post('/editShelves/add', 'ShelfController@create');

Route::get('/editShelves/delete/{id}', 'ShelfController@del');
Route::post('/editShelves/delete', 'ShelfController@remove');

Route::get('/shelf/{id}/comics', 'ComicController@index');

Route::get('/shelf/{id}/comics/add', 'ComicController@add');
Route::post('/shelf/{id}/comics/add', 'ComicController@create');
