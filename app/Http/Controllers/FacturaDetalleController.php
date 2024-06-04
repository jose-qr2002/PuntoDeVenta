<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use App\utils\LogHelper;

class FacturaDetalleController extends Controller
{
    public function index($idFactura) {
        $factura = Factura::findOrFail($idFactura);
        return view('rVenta', compact('factura'));
    }
    
    public function store() {

    }
}
