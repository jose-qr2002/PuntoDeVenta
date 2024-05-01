<?php

namespace Tests\Feature;

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

    }

    public function test_producto_create_exception(): void
    {

    }

    public function test_producto_update():void
    {

    }

    public function test_producto_update_validation():void 
    {

    }

    public function test_producto_update_exception():void
    {

    }

    public function test_producto_delete():void
    {

    }

    public function test_producto_delete_exception():void
    {

    }
}
