<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manual extends Model
{
    use HasFactory;
    protected $table = 'manuales'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombre',
        'ruta',
        'equipo',
        'descripcion',
    ];
}
