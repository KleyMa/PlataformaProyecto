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
        Schema::create('roles_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_usuario');
            $table->string('usuario');
            $table->integer('id_rol_editado');
            $table->string('rol_editado');
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
        Schema::dropIfExists('roles_logs');
    }
};
