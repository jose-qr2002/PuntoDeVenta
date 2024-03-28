<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('productos'); });


Route::get('/rVenta', function () {
    return view('rVenta');
});

Route::get('/rClientes', function () {
    return view('rClientes');
});
