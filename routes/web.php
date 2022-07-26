<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\medicoController;
use App\Http\Controllers\recepcionistaController;

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

Route::get('/', [homeController::class, 'index']);
Route::get('/create', [homeController::class, 'create']);
Route::post('/store', [homeController::class, 'store']);
Route::get('/{id}/edit', [homeController::class, 'edit']);
Route::put('/{id}', [homeController::class, 'update']);
Route::post('/destroy/{id}', [homeController::class, 'destroy']);

Route::prefix('medico')->group(function(){
    Route::get('/', [medicoController::class, 'index']);
    Route::get('/create', [medicoController::class, 'create']);
    Route::post('/store', [medicoController::class, 'store']);
    Route::get('/{id}/edit', [medicoController::class, 'edit']);
    Route::put('/{id}', [medicoController::class, 'update']);
    Route::post('/destroy/{id}', [medicoController::class, 'destroy']);
});

Route::prefix('recepcionista')->group(function(){
    Route::get('/', [recepcionistaController::class, 'index']);
    Route::get('/create', [recepcionistaController::class, 'create']);
    Route::post('/store', [recepcionistaController::class, 'store']);
    Route::get('/{id}/edit', [recepcionistaController::class, 'edit']);
    Route::put('/{id}', [recepcionistaController::class, 'update']);
    Route::post('/destroy/{id}', [recepcionistaController::class, 'destroy']);
});