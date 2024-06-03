<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('facturas_detalles')->insert([
            [
                'producto_id' => 4,
                'factura_id' => 1,
                'cantidad' => 2,
                'precion_unitario' => 50.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'producto_id' => 5,
                'factura_id' => 1,
                'cantidad' => 1,
                'precion_unitario' => 100.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'producto_id' => 7,
                'factura_id' => 2,
                'cantidad' => 3,
                'precion_unitario' => 50.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'producto_id' => 3,
                'factura_id' => 3,
                'cantidad' => 1,
                'precion_unitario' => 150.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
