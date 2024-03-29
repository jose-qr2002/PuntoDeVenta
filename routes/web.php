<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('dashboard'); })->name('dashboard');
Route::get('/productos', function () { return view('productos'); })->name('productos');
Route::get('/registrar-producto', function () { return view('registrarProducto'); })->name('registrar.producto');
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
