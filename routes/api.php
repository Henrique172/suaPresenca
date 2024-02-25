<?php

use App\Http\Controllers\BatismosController;
use App\Http\Controllers\DizimosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MembrosController;
use App\Http\Controllers\RelCultoController;
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

// Route::get('/membros', [MembrosController::class, 'index']);
Route::get('relCultoPdf/{id}', [RelCultoController::class, 'relCultoDizimo']);
Route::resource('relCulto', RelCultoController::class);
Route::resource('dizimo', DizimosController::class);
Route::resource('membros', MembrosController::class);

Route::post('/gerarCertificado', [BatismosController::class, 'gerarCertificado']);
Route::post('/login', [LoginController::class, 'index']);

