<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::table('categorias')->insert([
            ['nombre' => 'Herramientas', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Materiales de Contruccion', 'created_at' => now(), 'updated_at' => now()]
        ]);

        DB::table('productos')->insert([
            [
                'codigo' => '5901234123457',
                'nombre' => 'Llave Inglesa',
                'stock' => 10,
                'precio' => 999.99,
                'medida' => 'pieza',
                'categoria_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '5901244128657',
                'nombre' => 'Taladro Electrico',
                'stock' => 20,
                'precio' => 19.99,
                'medida' => 'pieza',
                'categoria_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ]
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
