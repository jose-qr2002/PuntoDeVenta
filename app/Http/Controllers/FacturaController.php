<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use App\utils\LogHelper;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class FacturaController extends Controller
{
    public function index()
    {
        $facturas = Factura::paginate(5);
        return view('ventas', compact('facturas'));
    }

    public function destroyWithDetalles($idFactura) {
        try {
            DB::beginTransaction();
            // Reservando registros
            $factura = Factura::findOrFail($idFactura);
            
            foreach($factura->detalles as $detalle) {
                $producto = $detalle->producto;
                // Devolucion de stock
                $producto->stock = $producto->stock + $detalle->cantidad;
                $producto->save();
                // Eliminando detalle
                $detalle->delete();
            }
            // Eliminamos Factura
            $factura->delete();
            
            DB::commit();
            return redirect()->route('ventas')->with('msn_success', 'Se elimino la factura');
        } catch (\Exception $e) {
            DB::rollback();
            LogHelper::logError($this,$e);

            $fechaHoraActual = date("Y-m-d H:i:s");
            return redirect()->route('detalles.index', $idFactura)->with('msn_error', $fechaHoraActual.' Ocurrió un error al cancela la factura');
        }
    }

    public function generarVenta(Request $request, $idFactura)
    {
        $factura = Factura::findOrFail($idFactura);
        $cliente = $factura->cliente;
        return view('generarVenta', compact('cliente', 'factura'));
    }

    public function create()
    {
        return view('atenderVenta');
    }

    public function buscarCliente(Request $request)
    {
        $dni = $request->input('dniCliente');
        $cliente = Cliente::where('dni', $dni)->first();

        if ($cliente) {
            $request->session()->put('cliente', $cliente);
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

            $request->session()->put('factura_id', $factura->id);

            DB::commit();

            return redirect()->route('detalles.index', $factura->id)->with('msn_success', 'La factura se ha confirmado correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            LogHelper::logError($this, $e);

            $fechaHoraActual = date("Y-m-d H:i:s");
            return redirect()->route('registrar.venta')->with('msn_error', $fechaHoraActual . ' Ocurrió un error al confirmar la factura. Por favor, inténtelo de nuevo.');
        }
    }

    public function generarFactura(Request $request, $facturaId)
{

    $factura = Factura::find($facturaId);

    if (!$factura) {
        return redirect()->route('generar.venta')->with('msn_error', 'No se pudo encontrar la factura.');
    }

    $factura->metodopago_id = $request->metodopago_id;

    $factura->estado = 'pagado';
    $factura->save();

    return redirect()->route('ventas')->with('msn_success', 'La factura se ha generado y pagado correctamente.');
}

}
