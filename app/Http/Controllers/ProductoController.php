<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\utils\LogHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function index() {
        $productos = Producto::paginate(10);
        return view('productos', compact('productos'));
    }

    public function create() {
        return view('registrarProducto');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:productos,codigo',
            'nombre' => 'required|string|max:255',
            'stock' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0.01',
            'medida' => 'required|in:pieza,rollo,galon',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        DB::beginTransaction();

        try {
            $producto = new Producto();
            $producto->codigo = $request->codigo;
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
            LogHelper::logError($this,$e);

            $fechaHoraActual = date("Y-m-d H:i:s");
            return redirect()->route('productos.create')->with('error', $fechaHoraActual.' Ocurrió un error al registrar el producto.');
        }
    }

    public function edit($id) {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        return view('editarProducto', compact('producto', 'categorias'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'codigo' => 'required|unique:productos,codigo,'.$id,
            'nombre' => 'required|string',
            'stock' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0.01',
            'medida' => 'required|in:pieza,rollo,galon',
            'categoria_id' => 'required|exists:categorias,id'
        ]);

        try {
            DB::beginTransaction();
            $producto = Producto::findOrFail($id);
    
            $producto->update([
                'nombre' => $request->nombre,
                'stock' => $request->stock,
                'precio' => $request->precio,
                'medida' => $request->medida,
                'categoria_id' => $request->categoria_id
            ]);

            DB::commit();
            return redirect()->route('productos.index')->with('success', 'Producto Actualizado');;
        } catch (\Exception $e) {
            DB::rollback();
            LogHelper::logError($this,$e);

            $fechaHoraActual = date("Y-m-d H:i:s");
            return redirect()->route('productos.edit', $producto->id)->with('error', $fechaHoraActual.' No se logro actualizar el producto');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $producto = Producto::findOrFail($id);
            $producto->delete();

            DB::commit();
            
            return redirect()->route('productos.index')->with('success', 'Producto eliminado');
        } catch (\Exception $e) {
            DB::rollBack();
            LogHelper::logError($this,$e);

            $fechaHoraActual = date("Y-m-d H:i:s");
            return redirect()->route('productos.index')->with('error', $fechaHoraActual.' Fallo al eliminar el producto');
        }
    }

}
