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

Route::get('/iku', 'App\Http\Controllers\ikuController@index');
Route::post('/iku/tambah', 'App\Http\Controllers\ikuController@store');


// Route::get('/', function () {
//     return view('welcome');
// });
