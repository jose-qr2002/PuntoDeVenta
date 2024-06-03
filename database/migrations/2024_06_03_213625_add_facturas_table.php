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
        DB::table('facturas')->insert([
            [
                'fecha' => '2024-01-01',
                'estado' => 'pendiente',
                'metodopago_id' => 1,
                'cliente_id' => 4,
                'monto_total' => 200.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fecha' => '2024-01-02',
                'estado' => 'pagado',
                'metodopago_id' => 2,
                'cliente_id' => 7,
                'monto_total' => 150.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fecha' => '2024-01-03',
                'estado' => 'pendiente',
                'metodopago_id' => 3,
                'cliente_id' => 8,
                'monto_total' => 150.00,
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
