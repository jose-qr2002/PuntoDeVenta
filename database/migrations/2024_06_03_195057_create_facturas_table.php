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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->enum('estado', ['pendiente', 'pagado']);
            $table->unsignedBigInteger('metodopago_id');
            $table->unsignedBigInteger('cliente_id');
            $table->decimal('monto_total', 10, 2);
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreign('metodopago_id')->references('id')->on('metodopagos')->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
