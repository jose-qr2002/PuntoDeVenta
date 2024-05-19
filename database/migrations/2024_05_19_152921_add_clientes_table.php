<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('clientes')->insert([
            [
                'dni' => '12345678',
                'nombres' => 'Juan',
                'apellidos' => 'Pérez',
                'correo' => 'juan.perez@example.com',
                'celular' => '978298536',
                'direccion' => 'Calle Falsa 123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '98765432',
                'nombres' => 'María',
                'apellidos' => 'Gómez',
                'correo' => 'maria.gomez@example.com',
                'celular' => '947289618',
                'direccion' => 'Avenida Siempre Viva 456',
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
        DB::table('clientes')->where('dni', '123456789')->delete();
        DB::table('clientes')->where('dni', '987654321')->delete();
    }
};
