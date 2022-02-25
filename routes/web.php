<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IkuController;

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

Route::get('/iku', [IkuController::class, 'index'])->name('iku.index');
Route::post('/iku/tambah', [IkuController::class, 'store'])->name('iku.tambah');


// Route::get('/', function () {
//     return view('welcome');
// });
