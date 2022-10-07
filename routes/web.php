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
use App\Http\Controllers\EventController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\MembrosController;
use App\Http\Controllers\DizimosController;
use App\Http\Controllers\BatismosController;
use App\Http\Controllers\RelCultoController;
use App\Http\Controllers\ListaPresencaController;

Route::get('/listaPresenca', [ListaPresencaController::class, 'index']); 
Route::get('/gerarLista', [ListaPresencaController::class, 'gerarLista']); 

Route::get('/', [SiteController::class, 'index']); 
// Route::get('/index', [SiteController::class, 'index']); 
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth'); 
Route::get('/events/{id}', [EventController::class, 'show']); 
Route::post('/events', [EventController::class, 'store'])->middleware('auth'); 
Route::delete('/events/del/{id}', [EventController::class, 'destroy'])->middleware('auth'); 

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth'); 
Route::get('/dashboardEventos', [DashboardController::class, 'eventosAll'])->middleware('auth'); 
Route::get('/niver', [DashboardController::class, 'niverMes'])->middleware('auth'); 
// Route::get('/niver', function () {return view ('/dashboard/niverMes');});

Route::get('/galeria', [GaleriaController::class, 'index']); 
Route::get('/galeriaForm', [GaleriaController::class, 'form'])->middleware('auth'); 
Route::post('/galeriaAdd', [GaleriaController::class, 'add'])->middleware('auth'); 
Route::get('/galeria/{id}', [GaleriaController::class, 'show']); 

Route::get('/membros', [MembrosController::class, 'index']); 
Route::get('/membroForm', function () {return view ('/membros/add');})->middleware('auth');
Route::post('/membrosAdd', [MembrosController::class, 'add'])->middleware('auth'); 
Route::get('/membros/edit/{id}', [MembrosController::class, 'edit'])->middleware('auth'); 
Route::put('/membros/update/{id}', [MembrosController::class, 'update'])->middleware('auth'); 

Route::get('/dizimo', [DizimosController::class, 'index']); 
Route::get('/dizimoCadastroIndex', [DizimosController::class, 'cadastroIndex'])->middleware('auth'); 
Route::post('/dizimoAdd', [DizimosController::class, 'add'])->middleware('auth'); 
Route::get('/relatorioDizimo', [DizimosController::class, 'relatorioIndex'])->middleware('auth'); 
Route::post('/relatorio', [DizimosController::class, 'relatorio'])->middleware('auth'); 
Route::post('/relatorioMes', [DizimosController::class, 'relatorioMes'])->middleware('auth'); 

Route::get('/batismoIndex', [BatismosController::class, 'index'])->middleware('auth'); 
Route::post('/batismoRelatorio', [BatismosController::class, 'relatorio'])->middleware('auth'); 
Route::post('/gerarCertificado', [BatismosController::class, 'gerarCertificado'])->middleware('auth'); 

Route::get('/relIndex', [RelCultoController::class, 'index'])->middleware('auth'); 
Route::post('/relCultoAdd', [RelCultoController::class, 'add'])->middleware('auth'); 
Route::get('/relCultoIndex', [RelCultoController::class, 'relatorioIndex'])->middleware('auth'); 
Route::post('/relCultoDizimo', [RelCultoController::class, 'relCultoDizimo'])->middleware('auth'); 
Route::get('/relId/{id}', [RelCultoController::class, 'relId'])->middleware('auth'); 
Route::get('/relMeia/{id}', [RelCultoController::class, 'relMeia'])->middleware('auth'); 
Route::get('/rel/edit/{id}', [RelCultoController::class, 'edit'])->middleware('auth'); 
Route::put('/rel/update/{id}', [RelCultoController::class, 'update'])->middleware('auth'); 
// Route::get('/relCulto', [RelCultoController::class, 'index']); 

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::get('/sobre', function () {
    return view ('/sobre');
});
Route::get('/contato', function () {
    return view ('/contato');
});
// Route::get('/apresentacao', function () {
//     return view ('/layouts/apresentacao');
// });
// Route::get('/galeria', function () {
//     return view ('/galeria');
// });
