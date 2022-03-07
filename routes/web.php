<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IkController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SsController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KkController;
use App\Http\Controllers\IkkController;
use App\Http\Controllers\KegiatanRinciController;
use App\Http\Controllers\KomponenController;
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

//IKK Controller
Route::get('/ikk', [IkkController::class, 'index'])->name('ikk.index');
Route::get('/ikk/data', [IkkController::class, 'fetch_data'])->name('ikk.fetch_data');
Route::post('/ikk/tambah', [IkkController::class, 'store'])->name('ikk.store');
Route::post('/ikk/aksi', [IkkController::class, 'action'])->name('ikk.action');

//Kegiatan Rinci Controller
Route::get('/KegiatanRinci', [KegiatanRinciController::class, 'index'])->name('kegiatanRinci.index');
Route::get('/KegiatanRinci/data', [KegiatanRinciController::class, 'fetch_data'])->name('kegiatanRinci.fetch_data');
Route::post('/KegiatanRinci/tambah', [KegiatanRinciController::class, 'store'])->name('kegiatanRinci.store');
Route::post('/KegiatanRinci/aksi', [KegiatanRinciController::class, 'action'])->name('kegiatanRinci.action');

//Komponen Controller
Route::get('/Komponen', [KomponenController::class, 'index'])->name('komponen.index');
Route::get('/Komponen/data', [KomponenController::class, 'fetch_data'])->name('komponen.fetch_data');
Route::post('/Komponen/tambah', [KomponenController::class, 'store'])->name('komponen.store');
Route::post('/Komponen/aksi', [KomponenController::class, 'action'])->name('komponen.action');

//Spesifikasi Controller
Route::get('/Spesifikasi', [SpesifikasiController::class, 'index'])->name('spesifikasi.index');
Route::get('/Spesifikasi/data', [SpesifikasiController::class, 'fetch_data'])->name('spesifikasi.fetch_data');
Route::post('/Spesifikasi/tambah', [SpesifikasiController::class, 'store'])->name('spesifikasi.store');
Route::post('/Spesifikasi/aksi', [SpesifikasiController::class, 'action'])->name('spesifikasi.action');

Route::get('/tes', function () {
    $ss = Ss::pluck('kode_ss', 'id');
    return dd($ss);
});
