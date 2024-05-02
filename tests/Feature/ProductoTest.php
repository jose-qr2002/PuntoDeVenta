<?php

namespace Tests\Feature;

use App\Models\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductoTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_producto_index(): void
    {
    $response = $this->get(route('productos.index'));
    $response->assertStatus(200);
    }


    public function test_producto_create(): void
    {

    $productoData = [
        'nombre' => 'cepillin',
        'stock' => 10,
        'precio' => 99.99,
        'medida' => 'pieza',
        'categoria_id' => 1,
    ];


    $response = $this->post(route('productos.store'), $productoData);

    $response->assertStatus(302);

    $this->assertDatabaseHas('productos', [
        'nombre' => 'cepillin',
        'stock' => 10,
        'precio' => 99.99,
        'medida' => 'pieza',
        'categoria_id' => 1,
    ]);

    $response->assertRedirect(route('productos.index'));
    }


    public function test_producto_create_validation(): void
{
    $productoData = [
        'nombre' => '',
        'stock' => '',
        'precio' => '',
        'medida' => '',
        'categoria_id' => '',
    ];

    $response = $this->post(route('productos.store'), $productoData);

    $response->assertStatus(302);

    $response->assertSessionHasErrors([
        'nombre',
        'stock',
        'precio',
        'medida',
        'categoria_id',
    ]);

    $preciosInvalidos = ['0', '-10', 'abc'];

    foreach ($preciosInvalidos as $precio) {
        $productoData['precio'] = $precio;

        $response = $this->post(route('productos.store'), $productoData);

        $response->assertStatus(302);

        $response->assertSessionHasErrors('precio');
    }
}


public function test_producto_create_exception(): void
{
    $productoData = [
        'nombre' => 'maletin',
        'stock' => 6666666666666666,
        'precio' => 10.02,
        'medida' => 'pieza',
        'categoria_id' => 1,
    ];

    $response = $this->post(route('productos.store'), $productoData);
    $response->assertStatus(302);
    $response->assertSessionHas([
        'error',
    ]);
}



    public function test_producto_update():void
    {
        $producto = Producto::findOrFail(1); // Obtiene el registro de Martillo
        $productoData = [
            'nombre' => $producto->nombre,
            'stock' => 5, // Cambiamos el stock pasa de 10 a 5
            'precio' => $producto->precio,
            'medida' => $producto->medida,
            'categoria_id' => $producto->categoria_id,
        ];
        $response = $this->put(route('productos.update', $producto->id), $productoData);
        $response->assertStatus(302);
        $response->assertRedirect(route('productos.index'));
        $this->assertDatabaseHas('productos', [
            'id' => $producto->id, // Verificamos que se hayan hecho los cambios en el registro seleccionado
            'nombre' => $productoData["nombre"],
            'stock' => $productoData["stock"],
            'precio' => $productoData["precio"],
            'medida' => $productoData["medida"],
            'categoria_id' => $productoData["categoria_id"]
        ]);
    }

    public function test_producto_update_validation():void 
    {
        $producto = Producto::findOrFail(1); // Obtiene el registro de Martillo
        $dataProductoErrors = [
            [
                'nombre' => '',
                'stock' => '', // Cambiamos el stock pasa de 10 a 5
                'precio' => '',
                'medida' => '',
                'categoria_id' => '',
            ],
            [
                'nombre' => '',
                'stock' => 'Juan', // Cambiamos el stock pasa de 10 a 5
                'precio' => 'JOSE',
                'medida' => 'pares',
                'categoria_id' => 10000,
            ],
            [
                'nombre' => '',
                'stock' => -1000, // Cambiamos el stock pasa de 10 a 5
                'precio' => -1000,
                'medida' => 'pierzzaaa',
                'categoria_id' => 'caracter',
            ],
        ];

        foreach($dataProductoErrors as $dataProductoError) {
            $response = $this->put(route('productos.update', $producto->id), $dataProductoError);
            $response->assertStatus(302);
            $response->assertSessionHasErrors([
                'nombre',
                'stock',
                'precio',
                'medida',
                'categoria_id'
            ]);
            $this->assertDatabaseMissing('productos', [
                'id' => $producto->id, // Verificamos que no se hayan hecho los cambios en el registro seleccionado
                'nombre' => $dataProductoError["nombre"],
                'stock' => $dataProductoError["stock"],
                'precio' => $dataProductoError["precio"],
                'medida' => $dataProductoError["medida"],
                'categoria_id' => $dataProductoError["categoria_id"]
            ]);
        }
    }

    public function test_producto_update_exception():void
    {
        $producto = Producto::findOrFail(1); // Obtiene el registro de Martillo
        // Preparando el dato nombre
        $nombre = '';
        for($i = 0; $i < 255; $i++) $nombre.= 'jose';
        
        // Las siguientes datos en la tabla productos pueden causar "Excepciones" en las columnas respectivas 
        $datosVulnerables = [
            [
                'campo' => 'nombre',
                'valor' => $nombre, // La longitud de un campo varchar es de 255 caracteres
            ],
            [
                'campo' => 'stock',
                'valor' => 12345678901 // La longitud de el integer en la base de datos es de 10 digitos
            ],
            [
                'campo' => 'precio',
                'valor' => 121312313451.12 // La longitud de el decimal en la base de datos es de 10 digitos
            ]
        ];

        foreach($datosVulnerables as $datoVulnerable) {
            $productoTest = $producto->toArray();
            $productoTest[$datoVulnerable['campo']] = $datoVulnerable['valor'];
            unset($productoTest['created_at']);
            unset($productoTest['updated_at']);
            $response = $this->put(route('productos.update', $producto->id), $productoTest);
            $response->assertStatus(302);
            $response->assertSessionHas([
                'error'
            ]);

        }

    }

    public function test_producto_delete():void
    {
        $producto = Producto::findOrFail(1);
        $response = $this->delete(route('productos.destroy',$producto->id));
        $response->assertStatus(302);
        $this->assertDatabaseMissing('productos', $producto->toArray());
    }

    public function test_producto_delete_exception():void
    {
        $response = $this->delete(route('productos.destroy', 500000));
        $response->assertStatus(302);
        $response->assertRedirect(route('productos.index'));
        $response->assertSessionHas('error');
    }
}
