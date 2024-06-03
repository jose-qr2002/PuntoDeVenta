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
            ['nombre' => 'Herramientas Manuales', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Materiales de Construcción', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Herramientas Eléctricas', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Pinturas y Acabados', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Electricidad', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Jardinería', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Adhesivos y Selladores', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Seguridad y Cerraduras', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Iluminación', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Tuberías y Accesorios', 'created_at' => now(), 'updated_at' => now()],
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
            ],
            [
                'codigo' => '5901254138768',
                'nombre' => 'Sierra Circular',
                'stock' => 15,
                'precio' => 49.99,
                'medida' => 'pieza',
                'categoria_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '5901264149879',
                'nombre' => 'Martillo',
                'stock' => 30,
                'precio' => 9.99,
                'medida' => 'pieza',
                'categoria_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '5901274150980',
                'nombre' => 'Destornillador',
                'stock' => 50,
                'precio' => 5.99,
                'medida' => 'pieza',
                'categoria_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '5901284162091',
                'nombre' => 'Cinta Métrica',
                'stock' => 40,
                'precio' => 3.99,
                'medida' => 'pieza',
                'categoria_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '5901294173102',
                'nombre' => 'Nivel de Burbuja',
                'stock' => 25,
                'precio' => 7.99,
                'medida' => 'pieza',
                'categoria_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '5901304184213',
                'nombre' => 'Alicate',
                'stock' => 35,
                'precio' => 4.99,
                'medida' => 'pieza',
                'categoria_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '5901314195324',
                'nombre' => 'Multímetro',
                'stock' => 10,
                'precio' => 29.99,
                'medida' => 'pieza',
                'categoria_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '5901324206435',
                'nombre' => 'Pinzas de Corte',
                'stock' => 15,
                'precio' => 6.99,
                'medida' => 'pieza',
                'categoria_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '5901324206444',
                'nombre' => 'Manguera',
                'stock' => 15,
                'precio' => 6.99,
                'medida' => 'pieza',
                'categoria_id' => 1,
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
