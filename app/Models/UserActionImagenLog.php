<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActionImagenLog extends Model
{
    use HasFactory;
    protected $table = 'imagenes_logs'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'id_usuario',
        'usuario',
        'id_imagen_editada',
        'imagen_editada',
        'fecha',
        'accion',
    ];
}
