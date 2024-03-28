<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('productos'); });


Route::get('/rVenta', function () {
    return view('rVenta');
});