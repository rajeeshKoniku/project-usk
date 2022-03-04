<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IkController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SsController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KkController;
use App\Models\Ik;
use App\Models\Program;
use App\Models\Ss;

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

//Ik Controller
Route::get('/ik', [IkController::class, 'index'])->name('ik.index');
Route::get('/ik/data', [IkController::class, 'fetch_data'])->name('ik.fetch_data');
Route::post('/ik/tambah', [IkController::class, 'store'])->name('ik.store');
Route::post('/ik/aksi', [IkController::class, 'action'])->name('ik.action');

//Ss Controller
Route::get('/ss', [SsController::class, 'index'])->name('ss.index');
Route::get('/ss/data', [SsController::class, 'fetch_data'])->name('ss.fetch_data');
Route::post('/ss/tambah', [SsController::class, 'store'])->name('ss.store');
Route::post('/ss/aksi', [SsController::class, 'action'])->name('ss.action');

//Kegiatan Controller
Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
Route::get('/kegiatan/data', [KegiatanController::class, 'fetch_data'])->name('kegiatan.fetch_data');
Route::post('/kegiatan/tambah', [KegiatanController::class, 'store'])->name('kegiatan.store');
Route::post('/kegiatan/aksi', [KegiatanController::class, 'action'])->name('kegiatan.action');

//Program Controller
Route::get('/program', [ProgramController::class, 'index'])->name('program.index');
Route::get('/program/data', [ProgramController::class, 'fetch_data'])->name('program.fetch_data');
Route::post('/program/tambah', [ProgramController::class, 'store'])->name('program.store');
Route::post('/program/aksi', [ProgramController::class, 'action'])->name('program.action');

//KK Controller
Route::get('/kk', [KkController::class, 'index'])->name('kk.index');
Route::get('/kk/data', [KkController::class, 'fetch_data'])->name('kk.fetch_data');
Route::post('/kk/tambah', [KkController::class, 'store'])->name('kk.store');
Route::post('/kk/aksi', [KkController::class, 'action'])->name('kk.action');

Route::get('/tes', function () {
    $ss = Ss::pluck('kode_ss', 'id');
    return dd($ss);
});
