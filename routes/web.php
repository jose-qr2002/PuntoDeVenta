<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\FacturaDetalleController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
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


Route::delete('/facturas/{idFactura}/deletewithd', [FacturaController::class, 'destroyWithDetalles'])->name('facturas.destroy.with.detalles');

Route::get('/factura/{idFactura}/detalles', [FacturaDetalleController::class, 'index'])->name('detalles.index');
Route::post('/factura/{idFactura}/detalles/store', [FacturaDetalleController::class, 'store'])->name('detalles.store');
Route::get('/facturas/detalle/{idDetalle}/edit', [FacturaDetalleController::class, 'edit'])->name('detalles.edit');
Route::put('/facturas/detalle/{idDetalle}/update', [FacturaDetalleController::class, 'update'])->name('detalles.update');
Route::delete('/facturas/detalle/{idDetalle}/delete', [FacturaDetalleController::class, 'destroy'])->name('detalles.destroy');
Route::delete('/facturas/detalles/{idFactura}/deleteAll', [FacturaDetalleController::class, 'destroyAll'])->name('detalles.destroy.all');

Route::get('/factura/create', [FacturaController::class, 'create'])->name('factura.create');
Route::get('/aVenta', [FacturaController::class, 'index'])->name('atender.venta');
Route::post('/buscar-cliente', [FacturaController::class, 'buscarCliente'])->name('buscar.cliente');
Route::post('/factura/store', [FacturaController::class, 'store'])->name('factura.store');

Route::get('/generar/{idFactura}', [FacturaController::class, 'generarVenta'])->name('generar.venta');
Route::post('/factura/generar/{idFactura}', [FacturaController::class, 'generarFactura'])->name('factura.generar');

Route::get('/proveedores', [ProveedorController::class, 'index'])->name('proveedores.index');
Route::get('/proveedores/create', [ProveedorController::class, 'create'])->name('proveedores.create');
Route::post('/proveedores/store', [ProveedorController::class, 'store'])->name('proveedores.store');