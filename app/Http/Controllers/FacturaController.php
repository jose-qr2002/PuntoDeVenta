<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\utils\LogHelper;
use App\Models\Cliente;
use App\Models\Factura;
use Illuminate\Support\Facades\DB;

class FacturaController extends Controller
{
    public function index()
    {
        return view('ventas');
    }

    public function create() {
        return view('atenderVenta');
    }

    public function buscarCliente(Request $request)
    {
        $dni = $request->input('dniCliente');
        $cliente = Cliente::where('dni', $dni)->first();

        if ($cliente) {
            return view('atenderVenta', ['cliente' => $cliente]);
        } else {
            return redirect()->route('factura.create')->with('msn_error', 'Cliente no encontrado.');
        }
    }

    public function store(Request $request)
{
    $request->validate([
        'cliente_id' => 'required|exists:clientes,id',
    ]);
    
    DB::beginTransaction();

    try {
        $cliente_id = $request->cliente_id;

        $factura = new Factura();
        $factura->fecha = now();
        $factura->estado = 'pendiente';
        $factura->metodopago_id = 1;
        $factura->cliente_id = $cliente_id;
        $factura->monto_total = 0;
        $factura->save();

        DB::commit();
        
        return redirect()->route('registrar.venta')->with('msn_success', 'La factura se ha confirmado correctamente.');
    } catch (\Exception $e) {
        DB::rollBack();
        LogHelper::logError($this,$e);

        $fechaHoraActual = date("Y-m-d H:i:s");
        return redirect()->route('registrar.venta')->with('msn_error',$fechaHoraActual. 'Ocurrió un error al confirmar la factura. Por favor, inténtelo de nuevo.');
    }
}
}
