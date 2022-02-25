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
Route::get('/', 'App\Http\Controllers\homeController@home');
//Iku
Route::get('/iku', 'App\Http\Controllers\ikuController@index');
Route::post('/iku/tambah', 'App\Http\Controllers\ikuController@tambah');
Route::get('/iku/edit/{id}', 'App\Http\Controllers\ikuController@edit');
Route::post('/iku/update/{id}', 'App\Http\Controllers\ikuController@update');
Route::post('/iku/delete/{id}', 'App\Http\Controllers\ikuController@delete');

//Perkin
Route::get('/perkin', 'App\Http\Controllers\perkinController@index');
Route::get('/perkin/formTambah', 'App\Http\Controllers\perkinController@formTambah');
Route::post('/perkin/tambah', 'App\Http\Controllers\perkinController@tambah');
Route::get('/perkin/edit/{id}', 'App\Http\Controllers\perkinController@edit');
Route::post('/perkin/update/{id}', 'App\Http\Controllers\perkinController@update');
Route::post('/perkin/delete/{id}', 'App\Http\Controllers\perkinController@delete');

// Route::get('/', function () {
//     return view('welcome');
// });
