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
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->id();
            $table->string('bitacora_fisica')->nullable();
            $table->date('fecha');
            $table->integer('numero_servicio');
            $table->string('equipo');
            $table->string('numero_de_serie');
            $table->string('modalidad');
            $table->string('descripcion_falla');
            $table->string('tipo_servicio');
            $table->string('materiales_utilizados')->nullable();
            $table->string('trabajo_realizado');
            $table->string('estatus_operativo');
            $table->string('trabajo_terminado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bitacoras');
    }
};
