<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Proveedor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class ProveedorTest extends TestCase
{
    use RefreshDatabase;
    public function test_proveedor_store_succes(): void
    {
        $user = User::findOrFail(1);
        $this->actingAs($user);
    
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
        $user = User::findOrFail(1);
        $this->actingAs($user);
    
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
        $user = User::findOrFail(1);
        $this->actingAs($user);
    
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


    public function test_proveedor_update_success(): void
    {
        $user = User::findOrFail(1);
        $this->actingAs($user);
        $proveedor = Proveedor::findOrFail(1);

        $proveedorData = [
            'ruc' => '12345678901',
            'razon_social' => 'Proveedor Actualizado',
            'telefono' => '123456789',
            'correo' => 'proveedor@actualizado.com',
            'direccion' => 'Calle Actualizada 123',
            'ciudad' => 'Ciudad Actualizada',
            'provincia' => 'Provincia Actualizada',
            'codigo_postal' => '12345',
            'estado' => 'activo',
        ];

        $response = $this->put(route('proveedores.update', $proveedor->id), $proveedorData);
        $response->assertStatus(302);
        $response->assertRedirect(route('proveedores.index'));
        $response->assertSessionHas('msn_success');

        $proveedorData['id'] = $proveedor->id;
        $proveedorDataActual = $proveedor->toArray();
        unset($proveedorDataActual['created_at']);
        unset($proveedorDataActual['updated_at']);
        $this->assertDatabaseMissing('proveedores', $proveedorDataActual);
        $this->assertDatabaseHas('proveedores', $proveedorData);
    }

    public function test_proveedor_update_validation(): void
    {
        $user = User::findOrFail(1);
        $this->actingAs($user);
        $proveedor = Proveedor::findOrFail(1);

        $dataWithoutValues = [
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

        $response = $this->put(route('proveedores.update', $proveedor->id), $dataWithoutValues);
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

        $invalidData = [
            [
                'campo' => 'ruc',
                'valores' => ['20234567890', '']
            ],
            [
                'campo' => 'correo',
                'valores' => ['proveedorc', 'proveedor.com', '']
            ],
            [
                'campo' => 'telefono',
                'valores' => ['1234567890123456789011231313', '']
            ],
            [
                'campo' => 'codigo_postal',
                'valores' => ['123456', '']
            ],
            [
                'campo' => 'estado',
                'valores' => ['invalid', '']
            ]
        ];

        foreach ($invalidData as $campo) {
            foreach ($campo['valores'] as $valor) {
                $data = [
                    $campo['campo'] => $valor
                ];
                $response = $this->put(route('proveedores.update', $proveedor->id), $data);
                $response->assertStatus(302);
                $response->assertSessionHasErrors($campo['campo']);
            }
        }
    }

    public function test_proveedor_update_exception(): void
    {
        $user = User::findOrFail(1);
        $this->actingAs($user);
        $proveedor = Proveedor::findOrFail(1);

        $direccion = str_repeat('Nuevo Ilo', 256);
        $ciudad = str_repeat('Lima', 256);
        $provincia = str_repeat('Tumbes', 256);

        $proveedorData = $proveedor->toArray();
        $proveedorData['direccion'] = $direccion;
        $response = $this->put(route('proveedores.update', $proveedor->id), $proveedorData);
        $response->assertStatus(302);
        $response->assertRedirect(route('proveedores.edit', $proveedor->id));
        $response->assertSessionHas('msn_error');

        $proveedorData = $proveedor->toArray();
        $proveedorData['ciudad'] = $ciudad;

        $response = $this->put(route('proveedores.update', $proveedor->id), $proveedorData);
        $response->assertStatus(302);
        $response->assertRedirect(route('proveedores.edit', $proveedor->id));
        $response->assertSessionHas('msn_error');

        $proveedorData = $proveedor->toArray();
        $proveedorData['provincia'] = $provincia;

        $response = $this->put(route('proveedores.update', $proveedor->id), $proveedorData);
        $response->assertStatus(302);
        $response->assertRedirect(route('proveedores.edit', $proveedor->id));
        $response->assertSessionHas('msn_error');
    }

    public function test_proveedor_destroy_succes():void
    {
        $user = User::findOrFail(1);
        $this->actingAs($user);

        $proveedor = Proveedor::findOrFail(1);
        $response = $this->delete(route('proveedores.destroy', $proveedor->id));
        $response->assertStatus(302);
        $response->assertRedirect(route('proveedores.index'));
        $this->assertDatabaseMissing('proveedores', $proveedor->toArray());
    }

    public function test_proveedor_destroy_exception(): void
    {
        $user = User::findOrFail(1);
        $this->actingAs($user);

        $response = $this->delete(route('proveedores.destroy', 99999999));
        $response->assertStatus(302);
        $response->assertRedirect(route('proveedores.index'));
        $this->assertNotNull(session('msn_error'));
    }
}