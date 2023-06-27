<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActionUsersLog extends Model
{
    use HasFactory;
    protected $table = 'user_changes_logs'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'id_usuario',
        'usuario',
        'id_usuario_editado',
        'usuario_editado',
        'fecha',
        'accion',
    ];
}
