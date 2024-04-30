<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('dashboard'); })->name('dashboard');
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos/store', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos/edit/{idProducto}', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/update/{idProducto}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/delete/{idProducto}', [ProductoController::class, 'destroy'])->name('productos.destroy');

Route::get('/ventas', function () { return view('ventas'); })->name('ventas');

Route::get('/rVenta', function () {
    return view('rVenta');
})->name('registrar.venta');

Route::get('/rClientes', function () {
    return view('rClientes');
})->name('registrar.cliente');

Route::get('/Clientes', function () {
    return view('Clientes');
})->name('cliente');
