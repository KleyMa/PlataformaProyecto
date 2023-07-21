<?php

namespace App\Listeners;

use App\Models\UserActionRolLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;

class LogActionRol
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
        $rol = $event->rol;
        $fecha = $event->fecha;
        $accion = $event->accion;

        // Obtener información del usuario y tiempo de sesión
        $idUsuario = $user->id;
        $nombreUsuario = $user->usuario;
        $idRol = $rol->id;
        $rol = $rol->name;
        $fecha = Carbon::now();
        

        // Guardar información en la tabla de registros de sesión
        $actionLog = new UserActionRolLog();
        $actionLog->id_usuario = $idUsuario;
        $actionLog->usuario = $nombreUsuario;
        $actionLog->id_rol_editado = $idRol;
        $actionLog->rol_editado = $rol;
        $actionLog->fecha = $fecha;
        $actionLog->accion = $accion;
        $actionLog->save();
    }
}
