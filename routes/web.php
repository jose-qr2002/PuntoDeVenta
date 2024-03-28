<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('dashboard'); })->name('dashboard');
Route::get('/productos', function () { return view('productos'); })->name('productos');
Route::get('/registrar-producto', function () { return view('registrarProducto'); })->name('registrar.producto');
Route::get('/ventas', function () { return view('ventas'); })->name('ventas');

Route::get('/rVenta', function () {
    return view('rVenta');
});

Route::get('/rClientes', function () {
    return view('rClientes');
});

Route::get('/Clientes', function () {
    return view('Clientes');
});
