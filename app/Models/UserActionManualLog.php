<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActionManualLog extends Model
{
    use HasFactory;
    protected $table = 'manuales_logs'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'id_usuario',
        'usuario',
        'id_manual_editado',
        'manual_editado',
        'fecha',
        'accion',
    ];
}
