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
        Schema::create('facturas_detalles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('factura_id');
            $table->integer('cantidad');
            $table->decimal('precion_unitario', 10, 2);
            $table->timestamps();

            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreign('factura_id')->references('id')->on('facturas')->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas_detalles');
    }
};
