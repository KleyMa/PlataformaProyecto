<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\UserActionInventoryLog;
use Illuminate\Support\Carbon;

class LogActionInventory
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
        $equipo = $event->equipo;
        $fecha = $event->fecha;
        $accion = $event->accion;

        // Obtener información del usuario y tiempo de sesión
        $idUsuario = $user->id;
        $nombreUsuario = $user->usuario;
        $idEquipo = $equipo->id;
        $nombreEquipo = $equipo->nombre;
        $fecha = Carbon::now();
        

        // Guardar información en la tabla de registros de sesión
        $actionLog = new UserActionInventoryLog();
        $actionLog->id_usuario = $idUsuario;
        $actionLog->usuario = $nombreUsuario;
        $actionLog->id_equipo = $idEquipo;
        $actionLog->nombre_equipo = $nombreEquipo;
        $actionLog->fecha = $fecha;
        $actionLog->accion = $accion;
        $actionLog->save();
    }
}
