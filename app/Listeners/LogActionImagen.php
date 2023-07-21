<?php

namespace App\Listeners;

use App\Events\UserActionImagen;
use App\Models\UserActionImagenLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;

class LogActionImagen
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $user = $event->user;
        $imagen = $event->imagen;
        $fecha = $event->fecha;
        $accion = $event->accion;

        // Obtener información del usuario y tiempo de sesión
        $idUsuario = $user->id;
        $nombreUsuario = $user->usuario;
        $idImagen = $imagen->id;
        $imagen = $imagen->equipo;
        $fecha = Carbon::now();
        

        // Guardar información en la tabla de registros de sesión
        $actionLog = new UserActionImagenLog();
        $actionLog->id_usuario = $idUsuario;
        $actionLog->usuario = $nombreUsuario;
        $actionLog->id_imagen_editada = $idImagen;
        $actionLog->imagen_editada = $imagen;
        $actionLog->fecha = $fecha;
        $actionLog->accion = $accion;
        $actionLog->save();
    }
}
