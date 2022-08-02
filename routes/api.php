<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ROUTE AMBIL SELURUH DATA
Route::get('/seragam', [App\Http\Controllers\ApiController::class, 'index']);

// ROUTE TAMBAH DATA
Route::post('/seragam', [App\Http\Controllers\ApiController::class, 'store']);


Route::put('/seragam/{id}', [ApiController::class, 'update']);
Route::delete('/seragam/{id}', [ApiController::class, 'destroy']);
