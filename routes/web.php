<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('productos'); });
Route::get('/registrar-producto', function () { return view('registrarProducto'); });
Route::get('/ventas', function () { return view('ventas'); });

Route::get('/rVenta', function () {
    return view('rVenta');
});

Route::get('/rClientes', function () {
    return view('rClientes');
});

Route::get('/Clientes', function () {
    return view('Clientes');
});
