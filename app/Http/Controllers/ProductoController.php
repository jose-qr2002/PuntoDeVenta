<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function index() {
        $productos = Producto::all();
        return view('productos', compact('productos'));
    }

    public function create() {
        return view('registrarproducto');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'stock' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0.01',
            'medida' => 'required|in:pieza,rollo,galon',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        DB::beginTransaction();

        try {
            $producto = new Producto();
            $producto->nombre = $request->nombre;
            $producto->stock = $request->stock;
            $producto->precio = $request->precio;
            $producto->medida = $request->medida;
            $producto->categoria_id = $request->categoria_id;
            $producto->save();

            DB::commit();
        
            return redirect()->route('productos.index')->with('success', 'Producto registrado exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('productos.create')->with('error', 'Ocurrió un error al registrar el producto.');
        }
    }

    public function edit($id) {
        return view('editarProducto');
    }

    public function update($id) {

    }

    public function destroy() {

    }
}
