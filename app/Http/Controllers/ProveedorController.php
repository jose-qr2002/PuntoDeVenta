<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Utils\LogHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    public function index() {
        $proveedores = Proveedor::all();
        return view('proveedores.index', compact('proveedores'));
    }

    public function edit($id) {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'ruc' => 'required|string|max:11|unique:proveedores,ruc,'.$id,
            'razon_social' => 'required|string',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email',
            'direccion' => 'required|string',
            'ciudad' => 'required|string',
            'provincia' => 'required|string',
            'codigo_postal' => 'required|string|max:5',
            'estado' => 'required|string|in:activo,inactivo',

        ]);

        try {
            DB::beginTransaction();
            $proveedor = Proveedor::findOrFail($id);
    
            $proveedor->update([
                'ruc' => $request->ruc,
                'razon_social' => $request->razon_social,
                'telefono' => $request->telefono,
                'correo' => $request->correo,
                'direccion' => $request->direccion,
                'ciudad' => $request->ciudad,
                'provincia' => $request->provincia,
                'codigo_postal' => $request->codigo_postal,
                'estado' => $request->estado
            ]);

            DB::commit();
            return redirect()->route('proveedores.index')->with('msn_success', 'Proveedor Actualizado');;
        } catch (\Exception $e) {
            DB::rollback();
            LogHelper::logError($this,$e);

            $fechaHoraActual = date("Y-m-d H:i:s");
            return redirect()->route('proveedores.edit', $proveedor->id)->with('msn_error', $fechaHoraActual.' No se logro actualizar el Proveedor');
        }
    }
}
