<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\MovieController@index')->name('homescreen');
Route::get('/detail/{id}', 'App\Http\Controllers\MovieController@show')->name('detail');
Route::get('/search', 'App\Http\Controllers\SearchController@search_by_query')->name('search');
Route::get('/genre/{id}', 'App\Http\Controllers\SearchController@search_by_genre')->name('genre');
Route::get('/country/{id}', 'App\Http\Controllers\SearchController@search_by_country')->name('country');

