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
        DB::table('metodopagos')->insert([
            ['metodo' => 'Efectivo', 'created_at' => now(), 'updated_at' => now()],
            ['metodo' => 'Tarjeta de Crédito', 'created_at' => now(), 'updated_at' => now()],
            ['metodo' => 'Yape', 'created_at' => now(), 'updated_at' => now()],
            ['metodo' => 'Plin', 'created_at' => now(), 'updated_at' => now()],
            ['metodo' => 'Transferencia Bancaria', 'created_at' => now(), 'updated_at' => now()],
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
