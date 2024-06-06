<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\FacturaDetalleController;
use App\Http\Controllers\ProductoController;
use App\Models\FacturaDetalle;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('dashboard'); })->name('dashboard');
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos/store', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos/edit/{idProducto}', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/update/{idProducto}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/delete/{idProducto}', [ProductoController::class, 'destroy'])->name('productos.destroy');

Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('clientes/store', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('clientes/edit/{idCliente}', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('clientes/update/{idAlumno}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('clientes/delete/{idAlumno}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

Route::get('/ventas', [FacturaController::class, 'index'])->name('ventas');

Route::get('/rVenta', function () {
    return view('rVenta');
})->name('registrar.venta');

Route::get('/factura/{idFactura}/detalles', [FacturaDetalleController::class, 'index'])->name('detalles.index');
Route::post('/factura/{idFactura}/detalles/store', [FacturaDetalleController::class, 'store'])->name('detalles.store');
Route::get('/facturas/detalle/{idDetalle}/edit', [FacturaDetalleController::class, 'edit'])->name('detalles.edit');
Route::put('/facturas/detalle/{idDetalle}/update', [FacturaDetalleController::class, 'update'])->name('detalles.update');
Route::delete('/facturas/detalle/{idDetalle}/delete', [FacturaDetalleController::class, 'destroy'])->name('detalles.destroy');