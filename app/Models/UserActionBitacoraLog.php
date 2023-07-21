<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActionBitacoraLog extends Model
{
    use HasFactory;
    protected $table = 'bitacoras_logs'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'id_usuario',
        'usuario',
        'id_bitacora_editada',
        'imagen_editada',
        'fecha',
        'accion',
    ];
}
