<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Cliente;

class ClienteTest extends TestCase
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

    public function test_cliente_create():void
    {
        $clienteData = [
            'dni' => '66666666',
            'nombres' => 'Juan',
            'apellidos' => 'Perez',
            'correo' => 'juan.perez@example.com',
            'celular' => '987654321',
            'direccion' => '123 Calle Falsa',
        ];

        $response = $this->post(route('clientes.store'), $clienteData);
        $response->assertStatus(302);

        $this->assertDatabaseHas('clientes',[
            'dni' => '66666666',
            'nombres' => 'Juan',
            'apellidos' => 'Perez',
            'correo' => 'juan.perez@example.com',
            'celular' => '987654321',
            'direccion' => '123 Calle Falsa',
        ]);
        
        $response->assertRedirect(route('clientes.index'));
    }

    public function test_cliente_create_validation(): void
{
    $clienteData = [
        'dni' => '',
        'nombres' => '',
        'apellidos' => '',
        'correo' => '',
        'celular' => '',
        'direccion' => '',
    ];

    $response = $this->post(route('clientes.store'), $clienteData);
    $response->assertStatus(302);
    $response->assertSessionHasErrors([
        'dni',
        'nombres',
        'apellidos',
        'correo',
        'celular',
        'direccion',
    ]);

    $correosInvalidos = ['sin@', ' ', '123'];

    foreach ($correosInvalidos as $correo) {
        $clienteData['correo'] = $correo;
        $response = $this->post(route('clientes.store'), $clienteData);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('correo');
    }

    $existeCliente = Cliente::create([
        'dni' => '12345678',
        'nombres' => 'aaaaa',
        'apellidos' => 'aaa',
        'correo' => 'a@a',
        'celular' => '123456789',
        'direccion' => 'aaaa',
    ]);

    $clienteData = [
        'dni' => '12345678',
        'nombres' => 'bbb',
        'apellidos' => 'bbb',
        'correo' => 'b@b',
        'celular' => '987654321',
        'direccion' => 'bbbbb',
    ];

    $response = $this->post(route('clientes.store'), $clienteData);
    $response->assertStatus(302);
    $response->assertSessionHasErrors('dni');
}

/*
public function test_cliente_create_exception(): void
{
    $response = $this->post(route('clientes.store'), [
        'dni' => '12345678',
        'nombres' => 'Test',
        'apellidos' => 'User',
        'correo' => 'testuser@example.com',
        'celular' => '123',
        'direccion' => '123 Test Street',
    ]);
    $response->assertStatus(302);
    $response->assertSessionHasErrors(['celular']);
}*/



public function test_cliente_create_exception(): void
{

    $nombrel = "";
    for($i =0; $i <255;$i++){
        $nombrel .='luis';
    }
    $response = $this->post(route('clientes.store'), [
        
        'dni' => '99999999',
        'nombres' => $nombrel,
        'apellidos' => 'User',
        'correo' => 'testuser@example.com',
        'celular' => '123456789',
        'direccion' => '123 Test Street',
    ]);

    $response->assertStatus(302);
    $response->assertSessionHas('error');
}




}
