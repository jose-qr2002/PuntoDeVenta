<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\utils\LogHelper;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function index()
    {
    $clientes = Cliente::all();
    return view('Clientes', compact('clientes'));
    }

    public function create() {
        return view('rClientes');
    }


    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required|string|min:8|max:8|unique:clientes,dni',
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'correo' => 'required|string|email|max:45',
            'celular' => 'required|string|min:9|max:9',
            'direccion' => 'required|string',
        ]);
        
        DB::beginTransaction();

        try {
            $cliente = new Cliente();
            $cliente->dni = $request->dni;
            $cliente->nombres = $request->nombres;
            $cliente->apellidos = $request->apellidos;
            $cliente->correo = $request->correo;
            $cliente->celular = $request->celular;
            $cliente->direccion = $request->direccion;
            $cliente->save();

            DB::commit();
            
            return redirect()->route('clientes.index')->with('success', 'Cliente registrado exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            LogHelper::logError($this,$e);

            $fechaHoraActual = date("Y-m-d H:i:s");
            return redirect()->route('clientes.create')->with('error', $fechaHoraActual.' Ocurrió un error al registrar el cliente.');
        }
    }

    public function edit($id) {
        $cliente = Cliente::findOrFail($id);
        return view('editarCliente', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'dni' => 'required|string|min:8|max:8|unique:clientes,dni,'.$id,
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'correo' => 'required|string|email|max:45',
            'celular' => 'required|string|min:9|max:9',
            'direccion' => 'required|string',
        ]);

        try {
            DB::beginTransaction();
            $cliente = Cliente::findOrFail($id);

            $cliente->update([
                'dni' => $request->dni,
                'nombres' => $request->nombres,
                'apellidos' => $request->apellidos,
                'correo' => $request->correo,
                'celular' => $request->celular,
                'direccion' => $request->direccion
            ]);

            DB::commit();
            return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente.');
        } catch (\Exception $e) {
            DB::rollback();
            LogHelper::logError($this,$e);

            $fechaHoraActual = date("Y-m-d H:i:s");
            return redirect()->route('clientes.edit',$cliente->id)->with('error', $fechaHoraActual.' Ocurrió un error al actualizar el cliente.');
        }
    }
}


