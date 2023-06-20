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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('tipo_de_equipo');
            $table->string('descripcion');
            $table->string('fabricante');
            $table->string('modelo');
            $table->string('numero_de_serie');
            $table->string('ubicacion');
            $table->string('estatus_operativo');
            $table->string('alimentacion_electrica');
            $table->string('requisitos_de_funcionamiento');
            $table->string('proveedor_de_mantenimiento');
            $table->string('proveedor_de_compra');
            $table->string('imagen_principal')->nullable()->default('imagenes/default.jpg');
            $table->string('manual')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
