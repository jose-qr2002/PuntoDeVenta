<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Utils\LogHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProveedorController extends Controller
{
    public function index() {
        $proveedores = Proveedor::all();
        return view('proveedores.index', compact('proveedores'));
    }

    public function create(){
        return view('proveedores.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'ruc' => 'required|string|max:20|unique:proveedores,ruc',
            'razon_social' => 'required|string',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email',
            'direccion' => 'required|string',
            'ciudad' => 'required|string',
            'provincia' => 'required|string',
            'codigo_postal' => 'required|string|max:5',
            'estado' => 'required|string|max:20',
        ]);

        DB::beginTransaction();

        try {
            $proveedor = new Proveedor();
            $proveedor->ruc = $request->ruc;
            $proveedor->razon_social = $request->razon_social;
            $proveedor->telefono = $request->telefono;
            $proveedor->correo = $request->correo;
            $proveedor->direccion = $request->direccion;
            $proveedor->ciudad = $request->ciudad;
            $proveedor->provincia = $request->provincia;
            $proveedor->codigo_postal = $request->codigo_postal;
            $proveedor->estado = $request->estado;
            $proveedor->save();

            DB::commit();
        
            return redirect()->route('proveedores.index')->with('msn_success', 'Proveedor registrado exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al registrar el proveedor: '.$e->getMessage());

            $fechaHoraActual = date("Y-m-d H:i:s");
            return redirect()->route('proveedores.create')->with('msn_error', $fechaHoraActual.' Ocurrió un error al registrar el proveedor.');
        }
    }

    public function destroy($id) {
        try {
            DB::beginTransaction();
            $proveedor = Proveedor::findOrFail($id);
            $proveedor->delete();
            DB::commit();
            return redirect()->route('proveedores.index')->with('msn_success', 'Proveedor eliminado exitosamente');
        } catch (\Exception $e) {
            DB::rollback();
            LogHelper::logError($this, $e);
    
            $fechaHoraActual = date("Y-m-d H:i:s");
            return redirect()->route('proveedores.index')->with('msn_error', $fechaHoraActual.' Ocurrió un error al eliminar el proveedor.');
        }
    }
    
}
