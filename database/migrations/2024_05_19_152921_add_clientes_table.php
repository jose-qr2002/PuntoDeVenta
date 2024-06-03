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
            [
                'dni' => '87654321',
                'nombres' => 'Carlos',
                'apellidos' => 'López',
                'correo' => 'carlos.lopez@example.com',
                'celular' => '976123456',
                'direccion' => 'Calle Verdadera 789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '23456789',
                'nombres' => 'Ana',
                'apellidos' => 'Martínez',
                'correo' => 'ana.martinez@example.com',
                'celular' => '946112233',
                'direccion' => 'Avenida Ficticia 321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '34567890',
                'nombres' => 'Pedro',
                'apellidos' => 'Sánchez',
                'correo' => 'pedro.sanchez@example.com',
                'celular' => '987654321',
                'direccion' => 'Boulevard Inventado 654',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '45678901',
                'nombres' => 'Luisa',
                'apellidos' => 'Fernández',
                'correo' => 'luisa.fernandez@example.com',
                'celular' => '945678912',
                'direccion' => 'Calle Imaginaria 567',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '56789012',
                'nombres' => 'Miguel',
                'apellidos' => 'Torres',
                'correo' => 'miguel.torres@example.com',
                'celular' => '954123789',
                'direccion' => 'Avenida Creativa 890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '67890123',
                'nombres' => 'Isabel',
                'apellidos' => 'Ramírez',
                'correo' => 'isabel.ramirez@example.com',
                'celular' => '932456789',
                'direccion' => 'Calle Inexistente 234',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '78901234',
                'nombres' => 'Javier',
                'apellidos' => 'Hernández',
                'correo' => 'javier.hernandez@example.com',
                'celular' => '921345678',
                'direccion' => 'Avenida Fabulosa 345',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '89012345',
                'nombres' => 'Carmen',
                'apellidos' => 'Díaz',
                'correo' => 'carmen.diaz@example.com',
                'celular' => '941234567',
                'direccion' => 'Calle Mítica 456',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '90123456',
                'nombres' => 'Andrés',
                'apellidos' => 'Ruiz',
                'correo' => 'andres.ruiz@example.com',
                'celular' => '953216547',
                'direccion' => 'Boulevard Leyenda 678',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '01234567',
                'nombres' => 'Elena',
                'apellidos' => 'Paredes',
                'correo' => 'elena.paredes@example.com',
                'celular' => '964317258',
                'direccion' => 'Avenida Mágica 789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '11234567',
                'nombres' => 'Ricardo',
                'apellidos' => 'Vargas',
                'correo' => 'ricardo.vargas@example.com',
                'celular' => '976452367',
                'direccion' => 'Calle Fantástica 012',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '22345678',
                'nombres' => 'Laura',
                'apellidos' => 'Navarro',
                'correo' => 'laura.navarro@example.com',
                'celular' => '965231478',
                'direccion' => 'Avenida Real 234',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '33456789',
                'nombres' => 'Fernando',
                'apellidos' => 'Mendoza',
                'correo' => 'fernando.mendoza@example.com',
                'celular' => '932145678',
                'direccion' => 'Calle Ilusión 345',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '44567890',
                'nombres' => 'Patricia',
                'apellidos' => 'Romero',
                'correo' => 'patricia.romero@example.com',
                'celular' => '954321765',
                'direccion' => 'Boulevard Sueño 456',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '55678901',
                'nombres' => 'Sebastián',
                'apellidos' => 'Cabrera',
                'correo' => 'sebastian.cabrera@example.com',
                'celular' => '943215678',
                'direccion' => 'Avenida Esperanza 678',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '66789012',
                'nombres' => 'Adriana',
                'apellidos' => 'Flores',
                'correo' => 'adriana.flores@example.com',
                'celular' => '932546789',
                'direccion' => 'Calle Ilusión 789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '77890123',
                'nombres' => 'Luis',
                'apellidos' => 'García',
                'correo' => 'luis.garcia@example.com',
                'celular' => '943216547',
                'direccion' => 'Boulevard Fantasía 012',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '88901234',
                'nombres' => 'Marta',
                'apellidos' => 'Vega',
                'correo' => 'marta.vega@example.com',
                'celular' => '932514678',
                'direccion' => 'Avenida Armonía 345',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '99012345',
                'nombres' => 'Gabriel',
                'apellidos' => 'Peña',
                'correo' => 'gabriel.pena@example.com',
                'celular' => '954321876',
                'direccion' => 'Calle Serenidad 456',
                'created_at' => now(),
                'updated_at' => now(),
            ]
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
