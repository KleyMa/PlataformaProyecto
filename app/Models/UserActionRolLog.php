<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActionRolLog extends Model
{
    use HasFactory;
    protected $table = 'roles_logs'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'id_usuario',
        'usuario',
        'id_rol',
        'rol_editado',
        'fecha',
        'accion',
    ];
}
