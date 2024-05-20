<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
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
            'dni' => 'required|string|max:45',
            'nombres' => 'required|string|max:45',
            'apellidos' => 'required|string|max:45',
            'correo' => 'required|string|email|max:45',
            'celular' => 'required|string|max:45',
            'direccion' => 'required|string|max:45',
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
            // Aquí deberías implementar LogHelper::logError para registrar errores
            // LogHelper::logError($this, $e);

            $fechaHoraActual = date("Y-m-d H:i:s");
            return redirect()->route('clientes.create')->with('error', $fechaHoraActual.' Ocurrió un error al registrar el cliente.');
        }
    }

    public function edit($id) {
        $cliente = Cliente::findOrFail($id);
        return view('editarCliente', compact('cliente'));
    }
}


