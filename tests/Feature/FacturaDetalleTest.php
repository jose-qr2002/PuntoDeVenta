<?php

namespace Tests\Feature;

use App\Models\Factura;
use App\Models\FacturaDetalle;
use App\Models\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FacturaDetalleTest extends TestCase
{
    use RefreshDatabase;

    public function test_factura_detalle_success(): void
    {
        // Crear producto de prueba
        $producto = Producto::findOrFail(6);

        // Crear factura de prueba
        $factura = Factura::findOrFail(1);

        // Simular solicitud
        $response = $this->post(route('detalles.store', $factura->id), [
            'producto_id' => $producto->id,
            'factura_id' => $factura->id,
        ]);

        // Verificar que la transacción se completó correctamente
        $response->assertRedirect(route('detalles.index', $factura->id));
        $response->assertSessionHas('msn_success');

        // Verificar que el producto fue agregado a la factura
        $this->assertDatabaseHas('facturas_detalles', [
            'producto_id' => $producto->id,
            'factura_id' => $factura->id,
            'cantidad' => 1,
            'precion_unitario' => $producto->precio,
        ]);

        // Verificar que el stock del producto se redujo
        $this->assertDatabaseHas('productos', [
            'id' => $producto->id,
            'stock' => $producto->stock - 1,
        ]);

        // Verificar que el monto total de la factura fue actualizado
        $this->assertDatabaseHas('facturas', [
            'id' => $factura->id,
            'monto_total' => $factura->monto_total + $producto->precio,
        ]);
    }

    public function test_factura_detalle_validation(): void
    {
        // Crear producto de prueba
        $producto = Producto::findOrFail(6);

        // Crear factura de prueba
        $factura = Factura::findOrFail(1);

        // Simular solicitud
        $response = $this->post(route('detalles.store', $factura->id), [
            'producto_id' => '',
            'factura_id' => $factura->id,
        ]);
        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'producto_id'
        ]);
    } 

    public function test_factura_detalle_exception(): void
    {
        // Crear producto de prueba
        $producto = Producto::findOrFail(6);

        // Crear factura de prueba
        $factura = Factura::findOrFail(1);

        // Agregando producto ya existente
        $response = $this->post(route('detalles.store', $factura->id), [
            'producto_id' => '5',
            'factura_id' => '1',
        ]);
        $response->assertStatus(302);
        $response->assertSessionHas('msn_error');
    } 

    public function test_factura_detalle_update(): void
    {
        // Crear factura de prueba
        $detalle = FacturaDetalle::findOrFail(1);

        // Simular solicitud
        $response = $this->put(route('detalles.update', $detalle->id), [
            'precion_unitario' => 40,
            'cantidad' => 4,
        ]);

        // Verificar que la transacción se completó correctamente
        $response->assertRedirect(route('detalles.index', $detalle->factura_id));
        $response->assertSessionHas('msn_success');

        $this->assertDatabaseHas('facturas_detalles', [
            'producto_id' => $detalle->producto_id,
            'factura_id' => $detalle->factura_id,
            'cantidad' => 4,
            'precion_unitario' => 40,
        ]);
    }

    public function test_factura_detalle_update_validation(): void
    {
        // Crear factura de prueba
        $detalle = FacturaDetalle::findOrFail(1);

        // Simular solicitud
        $response = $this->put(route('detalles.update', $detalle->id), [
            'precion_unitario' => 'dada',
            'cantidad' => 'nada',
        ]);
        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'precion_unitario',
            'cantidad'
        ]);
    }

    public function test_factura_detalle_update_exception(): void
    {
        // Crear factura de prueba
        $detalle = FacturaDetalle::findOrFail(1);

        // Simular solicitud
        $response = $this->put(route('detalles.update', $detalle->id), [
            'precion_unitario' => 4,
            'cantidad' => 123456789104,
        ]);
        $response->assertStatus(302);
        $response->assertSessionHas('msn_error');
    }

    public function test_factura_detalle_destroy_success() {
        $detalle = FacturaDetalle::findOrFail(1);
        $response = $this->delete(route('detalles.destroy',1));
        $response->assertStatus(302);
        $response->assertSessionHas('msn_success');
        $response->assertRedirect(route('detalles.index', $detalle->factura_id));
        $this->assertDatabaseMissing('facturas_detalles',$detalle->toArray());
    }
}
