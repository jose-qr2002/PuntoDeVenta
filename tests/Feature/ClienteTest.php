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


    
    public function test_cliente_update_success():void
    {
        $cliente = Cliente::findOrFail(1);

        $clienteData = [
            'dni' => '78484461',
            'nombres' => 'Mitka',
            'apellidos' => 'Martinez',
            'correo' => 'mitk_24@gmail.com',
            'celular' => '988464689',
            'direccion' => 'Asociacion Los Angeles Calle 13',
        ];

        $response = $this->put(route('clientes.update', $cliente->id), $clienteData);
        $response->assertStatus(302);
        $response->assertRedirect(route('clientes.index'));
        $response->assertSessionHas('success');

        $clienteData['id'] = $cliente->id; // Para que compruebe en la base de datos el mismo registro
        $clienteDataActual = $cliente->toArray();
        unset($clienteDataActual['created_at']);
        unset($clienteDataActual['updated_at']);
        $this->assertDatabaseMissing('clientes', $clienteDataActual);
        $this->assertDatabaseHas('clientes', $clienteData);
    }

    public function test_cliente_update_validation():void
    {
        $cliente = Cliente::findOrFail(1);

        $dataWithoutValors = [
            'dni' => '',
            'nombres' => '',
            'apellidos' => '',
            'correo' => '',
            'celular' => '',
            'direccion' => '',
        ];

        $response = $this->put(route('clientes.update', $cliente->id), $dataWithoutValors);
        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'dni',
            'nombres',
            'apellidos',
            'correo',
            'celular',
            'direccion',
        ]);

        // Testeando datos no validos
        $datosNoValidos = [
            [
                'campo' => 'dni',
                'valores' => ['7987', '9879879879889', '98765432']
            ],
            [
                'campo' => 'correo',
                'valores' => ['jacintogmail.com', 'jacintogmail', 'jacinto'] // Correos no validos
            ],
            [
                'campo' => 'celular',
                'valores' => ['912', '9797987987979', ''] // Telefonos no validos
            ]
        ];


        foreach($datosNoValidos as $campo) {
            foreach($campo['valores'] as $valor ) {
                $data = [
                    $campo['campo'] => $valor
                ];
                $response = $this->put(route('clientes.update', $cliente->id), $data);
                $response->assertStatus(302);
                $response->assertSessionHasErrors($campo['campo']);
            }
        }
    }

    public function test_cliente_update_exception() {
        $cliente = Cliente::findOrFail(1);

        $nombre = 'Lique';
        $apellido = 'Rarmirez';
        $direccion = 'Asociacion';

        for($i = 0; $i < 255; $i++) {
            $nombre .= 'Lique';
            $apellido .= 'Rarmirez';
            $direccion .= 'Asociacion';
        }

        $clienteData = $cliente->toArray();
        $clienteData['nombres'] = $nombre;

        $response = $this->put(route('clientes.update', $cliente->id), $clienteData);
        $response->assertStatus(302);
        $response->assertRedirect(route('clientes.edit', $cliente->id));
        $response->assertSessionHas('error');

        $clienteData = $cliente->toArray();
        $clienteData['apellidos'] = $apellido;
        
        $response = $this->put(route('clientes.update', $cliente->id), $clienteData);
        $response->assertStatus(302);
        $response->assertRedirect(route('clientes.edit', $cliente->id));
        $response->assertSessionHas('error');

        $clienteData = $cliente->toArray();
        $clienteData['direccion'] = $direccion;

        $response = $this->put(route('clientes.update', $cliente->id), $clienteData);
        $response->assertStatus(302);
        $response->assertRedirect(route('clientes.edit', $cliente->id));
        $response->assertSessionHas('error');
    }

}
