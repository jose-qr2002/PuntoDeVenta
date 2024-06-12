<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProveedorTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_proveedor_store_succes(): void
{
    $proveedorData = [
        'ruc' => '1234567890123',
        'razon_social' => 'proveedor vientito de la rosa',
        'telefono' => '666666666',
        'correo' => 'proveedor@holis.com',
        'direccion' => 'calle holiwis 666',
        'ciudad' => 'ciudad de los holis',
        'provincia' => 'provincia de tangamandapio',
        'codigo_postal' => '12345',
        'estado' => 'Activo',
    ];

    $response = $this->post(route('proveedores.store'), $proveedorData);

    $response->assertStatus(302);

    $this->assertDatabaseHas('proveedores', [
        'ruc' => '1234567890123',
        'razon_social' => 'proveedor vientito de la rosa',
        'telefono' => '666666666',
        'correo' => 'proveedor@holis.com',
        'direccion' => 'calle holiwis 666',
        'ciudad' => 'ciudad de los holis',
        'provincia' => 'provincia de tangamandapio',
        'codigo_postal' => '12345',
        'estado' => 'Activo',
    ]);
    $response->assertRedirect(route('proveedores.index'));
}

public function test_proveedor_store_validation(): void
{
    $proveedorData = [
        'ruc' => '',
        'razon_social' => '',
        'telefono' => '',
        'correo' => '',
        'direccion' => '',
        'ciudad' => '',
        'provincia' => '',
        'codigo_postal' => '',
        'estado' => '',
    ];

    $response = $this->post(route('proveedores.store'), $proveedorData);

    $response->assertStatus(302);

    $response->assertSessionHasErrors([
        'ruc',
        'razon_social',
        'telefono',
        'correo',
        'direccion',
        'ciudad',
        'provincia',
        'codigo_postal',
        'estado',
    ]);

    $correosInvalidos = ['holiwis', 'holis.com', '@holis.com'];

    foreach ($correosInvalidos as $correo) {
        $proveedorData['correo'] = $correo;

        $response = $this->post(route('proveedores.store'), $proveedorData);

        $response->assertStatus(302);

        $response->assertSessionHasErrors('correo');
    }

    $codigoPostalInvalido = ['holiwis', '123456'];

    foreach ($codigoPostalInvalido as $codigo) {
        $proveedorData['codigo_postal'] = $codigo;

        $response = $this->post(route('proveedores.store'), $proveedorData);

        $response->assertStatus(302);

        $response->assertSessionHasErrors('codigo_postal');
    }
}

public function test_proveedor_store_exception(): void
{
    $correo = "";
    for ($i = 0; $i < 255; $i++) { 
        $correo .= 'a';
    }
    $razon = "";
    for ($i = 0; $i < 255; $i++) { 
        $razon .= 'b';
    }
    $direccion = "";
    for ($i = 0; $i < 255; $i++) { 
        $direccion .= 'c';
    }
    $ciudad = "";
    for ($i = 0; $i < 255; $i++) { 
        $ciudad .= 'd';
    }
    $provincia = "";
    for ($i = 0; $i < 255; $i++) { 
        $provincia .= 'holiwis';
    }
    $response = $this->post(route('proveedores.store'), [
        'ruc' => '1234567890123',
        'razon_social' => $razon,
        'telefono' => '123456789',
        'correo' => $correo . '@holis.com',
        'direccion' => $direccion,
        'ciudad' => $ciudad,
        'provincia' => $provincia,
        'codigo_postal' => '12345',
        'estado' => 'Activo',
    ]);

    $response->assertStatus(302);
    $response->assertSessionHas('msn_error');
}



}
