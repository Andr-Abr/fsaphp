<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\HistorialController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/vehicles/comparar', [VehicleController::class, 'comparar'])->name('vehicles.comparar');
Route::get('/vehicles/busqueda-avanzada', [VehicleController::class, 'busquedaAvanzada'])->name('vehicles.busquedaAvanzada');
Route::get('/vehicles/buscar-sugerencias', [VehicleController::class, 'buscarSugerencias'])->name('vehicles.buscarSugerencias');
Route::get('/vehicles/buscar', [VehicleController::class, 'buscar'])->name('vehicles.buscar');
Route::get('/vehicles/resultados', [VehicleController::class, 'resultados'])->name('vehicles.resultados');
Route::get('/vehicles/{id}', [VehicleController::class, 'getVehicleDetails']);
Route::get('/vehicles/modelos', [VehicleController::class, 'getModelos']);
Route::get('/vehicles/anios', [VehicleController::class, 'getAnios']);
Route::resource('vehicles', VehicleController::class);

Route::get('/cuenta', [CuentaController::class, 'index'])->name('cuenta.index');
Route::get('/cuenta/register', [CuentaController::class, 'register'])->name('cuenta.register');
Route::post('/cuenta', [CuentaController::class, 'store'])->name('cuenta.store');
Route::post('/cuenta/login', [CuentaController::class, 'login'])->name('cuenta.login');
Route::post('/logout', [CuentaController::class, 'logout'])->name('logout');

Route::middleware(['auth.cuenta'])->group(function () {
    Route::get('/cuenta/profile', [CuentaController::class, 'profile'])->name('cuenta.profile');
    Route::put('/cuenta/update-email', [CuentaController::class, 'updateEmail'])->name('cuenta.updateEmail');
    Route::put('/cuenta/update-password', [CuentaController::class, 'updatePassword'])->name('cuenta.updatePassword');
    Route::delete('/cuenta/destroy', [CuentaController::class, 'destroy'])->name('cuenta.destroy')->middleware('auth.cuenta');

    Route::get('/favoritos', [FavoritoController::class, 'index'])->name('favoritos.index');
    Route::post('/favoritos', [FavoritoController::class, 'store'])->name('favoritos.store');
    Route::delete('/favoritos/{favorito}', [FavoritoController::class, 'destroy'])->name('favoritos.destroy');
    Route::put('/favoritos/{favorito}/categoria', [FavoritoController::class, 'updateCategoria'])->name('favoritos.updateCategoria');
    Route::put('/favoritos/{favorito}/etiqueta', [FavoritoController::class, 'updateEtiqueta'])->name('favoritos.updateEtiqueta');

    Route::get('/historial', [HistorialController::class, 'index'])->name('historial.index');
    Route::post('/historial', [HistorialController::class, 'store'])->name('historial.store');
    Route::delete('/historial', [HistorialController::class, 'destroy'])->name('historial.destroy');
});
