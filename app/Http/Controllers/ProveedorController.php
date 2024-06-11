<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index() {
        $proveedores = Proveedor::all();
        return view('proveedores.index', compact('proveedores'));
    }
}
