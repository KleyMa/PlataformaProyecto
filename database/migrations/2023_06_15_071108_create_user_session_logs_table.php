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
        Schema::create('user_session_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_usuario');
            $table->string('nombre_usuario');
            $table->timestamp('fecha_login');
            $table->timestamp('fecha_logout');
            $table->integer('tiempo_de_sesion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_session_logs');
    }
};
