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
        Schema::create('inventario_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_usuario');
            $table->string('usuario');
            $table->integer('id_equipo');
            $table->string('nombre_equipo');
            $table->timestamp('fecha');
            $table->string('accion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario_logs');
    }
};