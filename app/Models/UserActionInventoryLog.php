<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActionInventoryLog extends Model
{
    use HasFactory;
    protected $table = 'inventario_logs'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'id_usuario',
        'usuario',
        'id_equipo',
        'nombre_equipo',
        'fecha',
        'accion',
    ];
}
