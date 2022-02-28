<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IkuController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SsController;
use App\Models\Program;

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

//Iku Controller
Route::get('/iku', [IkuController::class, 'index'])->name('iku.index');
Route::get('/iku/data', [IkuController::class, 'fetch_data'])->name('iku.fetch_data');
Route::post('/iku/tambah', [IkuController::class, 'store'])->name('iku.store');
Route::post('/iku/aksi', [IkuController::class, 'action'])->name('iku.action');

//Ss Controller
Route::get('/ss', [SsController::class, 'index'])->name('ss.index');
Route::get('/ss/data', [SsController::class, 'fetch_data'])->name('ss.fetch_data');
Route::post('/ss/tambah', [SsController::class, 'store'])->name('ss.store');
Route::post('/ss/aksi', [SsController::class, 'action'])->name('ss.action');


//Program Controller
Route::get('/program', [ProgramController::class, 'index'])->name('program.index');
Route::get('/program/data', [ProgramController::class, 'fetch_data'])->name('program.fetch_data');
Route::post('/program/tambah', [ProgramController::class, 'store'])->name('program.store');
Route::post('/program/aksi', [ProgramController::class, 'action'])->name('program.action');

// Route::get('/tes', function () {
//     $programs = Program::all();
//     return view("tes", compact('programs'));
// });
