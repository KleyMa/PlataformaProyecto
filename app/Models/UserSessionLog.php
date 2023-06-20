<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSessionLog extends Model
{
    use HasFactory;

    protected $table = 'user_session_logs'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'id_usuario',
        'nombre_usuario',
        'fecha_login',
        'fecha_logout',
        'tiempo_de_sesion',
    ];
}
