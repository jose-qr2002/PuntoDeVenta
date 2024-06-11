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
        DB::table('proveedores')->insert([
            [
                'ruc' => '20123456789',
                'razon_social' => 'Comercial ABC S.A.',
                'telefono' => '01-2345678',
                'correo' => 'contacto@comercialabc.com',
                'direccion' => 'Av. Siempre Viva 123',
                'ciudad' => 'Lima',
                'provincia' => 'Lima',
                'codigo_postal' => '15001',
                'estado' => 'activo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'ruc' => '20234567890',
                'razon_social' => 'Tecnologías XYZ S.R.L.',
                'telefono' => '01-3456789',
                'correo' => 'info@tecnologiasxyz.com',
                'direccion' => 'Calle Falsa 456',
                'ciudad' => 'Arequipa',
                'provincia' => 'Arequipa',
                'codigo_postal' => '04001',
                'estado' => 'activo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'ruc' => '20345678901',
                'razon_social' => 'Servicios Integrales QWE E.I.R.L.',
                'telefono' => '01-4567890',
                'correo' => 'servicios@integralesqwe.com',
                'direccion' => 'Jirón Ficticio 789',
                'ciudad' => 'Trujillo',
                'provincia' => 'La Libertad',
                'codigo_postal' => '13001',
                'estado' => 'inactivo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'ruc' => '20456789012',
                'razon_social' => 'Construcciones PQR S.A.C.',
                'telefono' => '01-5678901',
                'correo' => 'ventas@construccionespqr.com',
                'direccion' => 'Pasaje Imaginario 012',
                'ciudad' => 'Cusco',
                'provincia' => 'Cusco',
                'codigo_postal' => '08001',
                'estado' => 'activo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'ruc' => '20567890123',
                'razon_social' => 'Comercial XYZ Ltda.',
                'telefono' => '01-6789012',
                'correo' => 'ventas@comercialxyz.com',
                'direccion' => 'Calle Principal 345',
                'ciudad' => 'Iquitos',
                'provincia' => 'Loreto',
                'codigo_postal' => '16001',
                'estado' => 'inactivo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'ruc' => '20678901234',
                'razon_social' => 'Distribuidora MNO E.I.R.L.',
                'telefono' => '01-7890123',
                'correo' => 'contacto@distribuidoramno.com',
                'direccion' => 'Av. Secundaria 678',
                'ciudad' => 'Chiclayo',
                'provincia' => 'Lambayeque',
                'codigo_postal' => '14001',
                'estado' => 'activo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'ruc' => '20789012345',
                'razon_social' => 'Servicios y Logística DEF S.A.',
                'telefono' => '01-8901234',
                'correo' => 'info@serviciosdef.com',
                'direccion' => 'Jirón Tercero 901',
                'ciudad' => 'Tacna',
                'provincia' => 'Tacna',
                'codigo_postal' => '23001',
                'estado' => 'activo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'ruc' => '20890123456',
                'razon_social' => 'Importadora GHI S.A.C.',
                'telefono' => '01-9012345',
                'correo' => 'ventas@importadoraghi.com',
                'direccion' => 'Pasaje Cuarto 234',
                'ciudad' => 'Piura',
                'provincia' => 'Piura',
                'codigo_postal' => '20001',
                'estado' => 'activo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'ruc' => '20901234567',
                'razon_social' => 'Transporte y Logística JKL S.A.',
                'telefono' => '01-0123456',
                'correo' => 'info@transportejkl.com',
                'direccion' => 'Calle Quinta 567',
                'ciudad' => 'Huancayo',
                'provincia' => 'Junín',
                'codigo_postal' => '12001',
                'estado' => 'inactivo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'ruc' => '21012345678',
                'razon_social' => 'Comercial MNP Ltda.',
                'telefono' => '01-1234567',
                'correo' => 'contacto@comercialmnp.com',
                'direccion' => 'Av. Sexta 890',
                'ciudad' => 'Puno',
                'provincia' => 'Puno',
                'codigo_postal' => '21001',
                'estado' => 'activo',
                'created_at' => now(),
                'updated_at' => now()
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
