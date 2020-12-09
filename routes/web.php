<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

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



//clientes
Route::get('/', [ClienteController::class, 'index'])->name('cliente.index');
Route::get('/clientes/crear', [ClienteController::class, 'create'])->name('cliente.create');
Route::get('/clientes/buscar/{valor}', [ClienteController::class, 'buscar'])->name('cliente.buscar');
Route::post('/clientes', [ClienteController::class, 'store'])->name('cliente.store');
Route::get('/clientes/{cliente}', [ClienteController::class, 'show'])->name('cliente.show');
Route::get('/clientes/{id}/edit', [ClienteController::class, 'edit'])->name('cliente.edit');
Route::put('/clientes/{id}', [ClienteController::class, 'update'])->name('cliente.update');
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])->name('cliente.destroy');

