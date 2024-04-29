<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index() {
        $productos = Producto::all();
        return view('productos', compact('productos'));
    }

    public function create() {
        return view('registrarProducto');
    }

    public function store() {

    }

    public function edit($id) {
        return view('editarProducto');
    }

    public function update($id) {

    }

    public function destroy() {

    }
}
