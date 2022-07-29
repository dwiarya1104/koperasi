<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SeragamController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('auth.login');
});
Route::group(['middleware' => 'auth'],function() {
    Route::group(['prefix' => 'siswa'],function() {
        Route::get('/', [App\Http\Controllers\SiswaController::class ,'index'])->name('siswa.index');
        Route::get('/search', [App\Http\Controllers\SiswaController::class ,'search'])->name('siswa.search');
        Route::get('/sortir', [App\Http\Controllers\SiswaController::class ,'sortir'])->name('siswa.sortir');
        Route::get('/filter', [App\Http\Controllers\SiswaController::class ,'filter'])->name('siswa.filter');
        Route::post('/store', [App\Http\Controllers\SiswaController::class ,'store'])->name('siswa.store');
        Route::put('/update/{id}', [App\Http\Controllers\SiswaController::class ,'update'])->name('siswa.update');
        Route::delete('/delete/{id}', [App\Http\Controllers\SiswaController::class ,'destroy'])->name('siswa.destroy');
    });

    Route::group(['prefix' => 'seragam'],function() {
        Route::get('/', [App\Http\Controllers\SeragamController::class ,'index'])->name('seragam.index');
        Route::get('/search', [App\Http\Controllers\SeragamController::class ,'search'])->name('seragam.search');
        Route::get('/sortir', [App\Http\Controllers\SeragamController::class ,'sortir'])->name('seragam.sortir');
        Route::get('/filter', [App\Http\Controllers\SeragamController::class ,'filter'])->name('siswa.filter');
        Route::post('/store', [App\Http\Controllers\SeragamController::class ,'store'])->name('seragam.store');
        Route::put('/update/{id}', [App\Http\Controllers\SeragamController::class ,'update'])->name('seragam.update');
        Route::delete('/delete/{id}', [App\Http\Controllers\SeragamController::class ,'destroy'])->name('siswa.destroy');
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
