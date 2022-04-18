<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IkController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SsController;
use App\Http\Controllers\RpkController;
use App\Http\Controllers\KkController;
use App\Http\Controllers\RincianProgramController;
use App\Http\Controllers\KKmentriController;
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
Route::post('/ik/del', [IkController::class, 'del'])->name('ik.del');
Route::post('/ik/add', [IkController::class, 'add'])->name('ik.add');

//Ss Controller
Route::get('/ss', [SsController::class, 'index'])->name('ss.index');
Route::post('/ss/del', [SsController::class, 'del'])->name('ss.del');
Route::post('/ss/add', [SsController::class, 'add'])->name('ss.add');

//Program Controller
Route::get('/program', [ProgramController::class, 'index'])->name('program.index');
Route::post('/program/del', [ProgramController::class, 'del'])->name('program.del');
Route::post('/program/add', [ProgramController::class, 'add'])->name('program.add');

//KK Menteri Controller
Route::get('/kkmentri', [KKmentriController::class, 'index'])->name('kkmentri.index');
Route::post('/kkmentri/del', [KKmentriController::class, 'del'])->name('kkmentri.del');
Route::post('/kkmentri/add', [KKmentriController::class, 'add'])->name('kkmentri.add');
Route::get('/kkmentri/get', [KKmentriController::class, 'get'])->name('kkmentri.get');

//Rincian Program Controller
Route::get('/rincianprogram', [RincianProgramController::class, 'index'])->name('rincianprogram.index');
Route::post('/rincianprogram/del', [RincianProgramController::class, 'del'])->name('rincianprogram.del');
Route::post('/rincianprogram/add', [RincianProgramController::class, 'add'])->name('rincianprogram.add');

//KK Controller
Route::get('/kk', [KkController::class, 'index'])->name('kk.index');
Route::post('/kk/del', [KkController::class, 'del'])->name('kk.del');
Route::post('/kk/add', [KkController::class, 'add'])->name('kk.add');

//RPK Controller
Route::get('/rpk', [RpkController::class, 'index'])->name('rpk.index');
Route::post('/rpk/del', [RpkController::class, 'del'])->name('rpk.del');
Route::get('/rpk/get', [RpkController::class, 'get'])->name('rpk.get');
Route::post('/rpk/add', [RpkController::class, 'add'])->name('rpk.add');
Route::get('/rpk/getSingleProg', [RpkController::class, 'getSingleProg'])->name('rpk.getSingleProg');
Route::post('/rpk/insertImg', [RpkController::class, 'insertImg'])->name('rpk.insertImg');

Route::get('/tes', function () {
    $ss = Ss::pluck('kode_ss', 'id');
    return dd($ss);
});
