<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use App\utils\LogHelper;
use Illuminate\Support\Facades\DB;

class FacturaController extends Controller
{
    public function index() {
        return view('ventas');
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
}
