<?php

namespace App\Listeners;

use App\Models\UserActionImagenLog;
use App\Models\UserActionManualLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;

class LogActionManual
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
        $manual = $event->manual;
        $fecha = $event->fecha;
        $accion = $event->accion;

        // Obtener información del usuario y tiempo de sesión
        $idUsuario = $user->id;
        $nombreUsuario = $user->usuario;
        $idManual = $manual->id;
        $manual = $manual->equipo;
        $fecha = Carbon::now();
        

        // Guardar información en la tabla de registros de sesión
        $actionLog = new UserActionmanualLog();
        $actionLog->id_usuario = $idUsuario;
        $actionLog->usuario = $nombreUsuario;
        $actionLog->id_manual_editado = $idManual;
        $actionLog->manual_editado = $manual;
        $actionLog->fecha = $fecha;
        $actionLog->accion = $accion;
        $actionLog->save();
    }
}
