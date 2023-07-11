<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;
    protected $table = 'imagenes'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombre',
        'ruta',
        'equipo',
        'bitacora',
        'descripcion',
    ];
}
