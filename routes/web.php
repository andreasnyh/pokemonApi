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

Route::get('/', 'PokeApiController@index');
// ID or name works
Route::get('/{id}', 'PokeApiController@findById');

//Route::get('/pokemon', 'PokeApiController@index');
