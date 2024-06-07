<?php

namespace App\Http\Controllers;

use App\Exceptions\NoStockException;
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
            $factura = Factura::findOrFail($request->factura_id);
            $producto = Producto::findOrFail($request->producto_id);
            $producto->stock = $producto->stock - 1;
            $producto->save();
            if($producto->stock < 1) {
                throw new NoStockException("No hay stock disponible para el producto");
            }
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
        } catch (NoStockException $e) {
            DB::rollBack();
            LogHelper::logError($this,$e);
            $fechaHoraActual = date("Y-m-d H:i:s");
            return redirect()->route('detalles.index', $factura->id)->with('msn_error', $fechaHoraActual.' El producto no tiene stock disponible');
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

    public function edit($idDetalle) {
        $facturaDetalle = FacturaDetalle::findOrFail($idDetalle);
        return view('editarDetalle', compact('facturaDetalle'));
    }

    public function update(Request $request, $idDetalle) {
        $request->validate([
            'precion_unitario' => 'required|numeric|min:0.1',
            'cantidad' => 'required|integer|min:1'
        ]);

        DB::beginTransaction();

        try {
            $detalle = FacturaDetalle::findOrFail($idDetalle);
            $factura = $detalle->factura;
            $producto = $detalle->producto;
            // Actualizando monto total
            $factura->monto_total = $factura->monto_total - ($detalle->precion_unitario * $detalle->cantidad);
            $factura->monto_total = $factura->monto_total + ($request->precion_unitario * $request->cantidad);
            $factura->save();
            // Actualizando stock
            $producto->stock = $producto->stock - $request->cantidad;
            $producto->stock = $producto->stock + $detalle->cantidad;
            if($producto->stock < 0) {
                throw new NoStockException("No hay stock disponible para el producto");
            }
            $producto->save();
            // Actualizando detalle
            $detalle->precion_unitario = $request->precion_unitario;
            $detalle->cantidad = $request->cantidad;
            $detalle->save();
            DB::commit();
            return redirect()->route('detalles.index', $factura->id)->with('msn_success', 'El Detalle se actualizo correctamente');
        } catch (NoStockException $e) {
            DB::rollBack();
            LogHelper::logError($this,$e);
            $fechaHoraActual = date("Y-m-d H:i:s");
            return redirect()->route('detalles.index', $factura->id)->with('msn_error', $fechaHoraActual.' El producto no tiene stock disponible');
        } catch (\Exception $e) {
            DB::rollBack();
            LogHelper::logError($this,$e);

            $fechaHoraActual = date("Y-m-d H:i:s");
            return redirect()->route('detalles.edit', $idDetalle)->with('msn_error', $fechaHoraActual.' El detalle no se pudo actualizar');
        }
    }

    public function destroy($idDetalle) {
        try {
            DB::beginTransaction();
            // Reservando registros
            $detalle = FacturaDetalle::findOrFail($idDetalle);
            $producto = $detalle->producto;
            $factura = $detalle->factura;
            // Devolucion de stock
            $producto->stock = $producto->stock + $detalle->cantidad;
            $producto->save();
            // Actualizando monto
            $factura->monto_total = $factura->monto_total - $detalle->cantidad * $detalle->precion_unitario;
            $factura->save();
            // Eliminando detalle
            $detalle->delete();
            DB::commit();
            return redirect()->route('detalles.index', $factura->id)->with('msn_success', 'El producto se quito de la factura');
        } catch (\Exception $e) {
            DB::rollback();
            LogHelper::logError($this,$e);

            $fechaHoraActual = date("Y-m-d H:i:s");
            return redirect()->route('detalles.index', $factura->id)->with('msn_error', $fechaHoraActual.' Ocurrió un error al quitar el producto.');
        }
    }

    public function destroyAll($idFactura) {
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
            // Actualizando monto
            $factura->monto_total = 0;
            $factura->save();
            
            DB::commit();
            return redirect()->route('detalles.index', $factura->id)->with('msn_success', 'Todos los productos se quitaron de la factura');
        } catch (\Exception $e) {
            DB::rollback();
            LogHelper::logError($this,$e);

            $fechaHoraActual = date("Y-m-d H:i:s");
            return redirect()->route('detalles.index', $factura->id)->with('msn_error', $fechaHoraActual.' Ocurrió un error al quitar los productos.');
        }
    }
}
