<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Cliente;
use App\Models\Factura;
use App\Models\User;

class FacturaTest extends TestCase
{
    use RefreshDatabase;

    public function test_example_factura(): void
    {
        $user = User::findOrFail(1);
        $this->actingAs($user);

        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_factura_create_success(): void
{
    $user = User::findOrFail(1);
    $this->actingAs($user);

    $clienteId = 10;

    $facturaData = [
        'cliente_id' => $clienteId,
        'fecha' => now()->toDateString(),
        'estado' => 'pendiente',
        'metodopago_id' => 1,
        'monto_total' => 0,
    ];

    $response = $this->post(route('factura.store'), $facturaData);
    $response->assertStatus(302);

   $this->assertDatabaseHas('facturas',[
        'cliente_id' => $clienteId,
        'fecha' => now()->toDateString(),
        'estado' => 'pendiente',
        'metodopago_id' => 1,
        'monto_total' => 0,
        ]);
    
    $response->assertStatus(302);
}

public function test_factura_create_validation(): void
{
    $user = User::findOrFail(1);
    $this->actingAs($user);

    $facturaData = [
        'fecha' => now()->toDateString(),
        'estado' => 'pendiente',
        'metodopago_id' => 1,
        'monto_total' => 0,
    ];
    $response = $this->post(route('factura.store'), $facturaData);
    $response->assertStatus(302);
    $response->assertSessionHasErrors(['cliente_id']);
}

public function test_generar_factura_success(): void
{
    $user = User::findOrFail(1);
    $this->actingAs($user);

    $data = [
        'metodopago_id' => 1, 
    ];

    $response = $this->post(route('factura.generar', 1), $data);

    $response->assertRedirect(route('ventas'));
}


}

