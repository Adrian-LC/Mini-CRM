<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EmpleadoController;

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
    return redirect()->route('empresa.index');
});

Auth::routes(['register' => false, 'reset' => false]);

Route::group(['middleware' => 'auth'], function () {
    /* Empresa */
    Route::get('empresa', [EmpresaController::class, 'index'])->name('empresa.index');
    Route::get('empresa/create', [EmpresaController::class, 'create'])->name('empresa.create');
    Route::post('empresa', [EmpresaController::class, 'store'])->name('empresa.store');
    Route::get('empresa/{empresa}', [EmpresaController::class, 'show'])->name('empresa.show');
    Route::get('empresa/{empresa}/edit', [EmpresaController::class, 'edit'])->name('empresa.edit');
    Route::put('empresa/{empresa}', [EmpresaController::class, 'update'])->name('empresa.update');
    Route::delete('empresa/{empresa}', [EmpresaController::class, 'destroy'])->name('empresa.destroy');

    /* Empleado */
    Route::get('empleado', [EmpleadoController::class, 'index'])->name('empleado.index');
    Route::get('empleado/create', [EmpleadoController::class, 'create'])->name('empleado.create');
    Route::post('empleado', [EmpleadoController::class, 'store'])->name('empleado.store');
    Route::get('empleado/{empleado}', [EmpleadoController::class, 'show'])->name('empleado.show');
    Route::get('empleado/{empleado}/edit', [EmpleadoController::class, 'edit'])->name('empleado.edit');
    Route::put('empleado/{empleado}', [EmpleadoController::class, 'update'])->name('empleado.update');
    Route::delete('empleado/{empleado}', [EmpleadoController::class, 'destroy'])->name('empleado.destroy');
});
