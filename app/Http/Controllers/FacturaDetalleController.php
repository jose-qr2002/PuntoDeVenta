<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\FacturaDetalle;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\utils\LogHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\UniqueConstraintViolationException;

class FacturaDetalleController extends Controller
{
    public function index($idFactura) {
        $factura = Factura::findOrFail($idFactura);
        $productos = Producto::all();
        return view('rVenta', compact('factura', 'productos'));
    }
    
    public function store(Request $request) {
        $request->validate([
            'producto_id' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $producto = Producto::findOrFail($request->producto_id);
            $producto->stock = $producto->stock - 1;

            $factura = Factura::findOrFail($request->factura_id);
            $facturaDetalle = new FacturaDetalle();
            $facturaDetalle->producto_id = $request->producto_id;
            $facturaDetalle->factura_id = $request->factura_id;
            $facturaDetalle->cantidad = 1;
            $facturaDetalle->precion_unitario = $producto->precio;
            $facturaDetalle->save();
            
            $factura->monto_total = $factura->monto_total + $facturaDetalle->precion_unitario;
            $factura->save();

            DB::commit();
            return redirect()->route('detalles.index', $factura->id)->with('msn_success', 'El Producto se agrego a la factura');
        } catch (UniqueConstraintViolationException $e) {
            DB::rollBack();
            LogHelper::logError($this,$e);

            $fechaHoraActual = date("Y-m-d H:i:s");
            return redirect()->route('detalles.index', $factura->id)->with('msn_error', $fechaHoraActual.' El producto ya esta agregado a la factura');
        } catch (\Exception $e) {
            DB::rollBack();
            LogHelper::logError($this,$e);

            $fechaHoraActual = date("Y-m-d H:i:s");
            return redirect()->route('detalles.index', $factura->id)->with('msn_error', $fechaHoraActual.' Ocurrió un error al registrar el producto.');
        }
    }
}
