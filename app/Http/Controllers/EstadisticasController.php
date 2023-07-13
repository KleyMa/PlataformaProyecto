<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Equipo;
use App\Models\Imagen;
use App\Models\Manual;
use App\Models\User;
use Illuminate\Http\Request;

class EstadisticasController extends Controller
{
    public function index()
    {
        $equipos = Equipo::count();
        $bitacoras = Bitacora::count();
        $manuales = Manual::count();
        $imagenes = Imagen::count();
        $usuarios = User::count();
        return view('estadisticas.index', compact('equipos', 'bitacoras', 'manuales', 'imagenes', 'usuarios'));
    }
}
