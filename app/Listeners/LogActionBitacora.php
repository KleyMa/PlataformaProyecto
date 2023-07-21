<?php

namespace App\Listeners;

use App\Events\UserActionBitacora;
use App\Models\UserActionBitacoraLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;

class LogActionBitacora
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
        $bitacora = $event->bitacora;
        $fecha = $event->fecha;
        $accion = $event->accion;

        // Obtener información del usuario y tiempo de sesión
        $idUsuario = $user->id;
        $nombreUsuario = $user->usuario;
        $idBitacora = $bitacora->id;
        $bitacora = $bitacora->numero_servicio;
        $fecha = Carbon::now();
        

        // Guardar información en la tabla de registros de sesión
        $actionLog = new UserActionBitacoraLog();
        $actionLog->id_usuario = $idUsuario;
        $actionLog->usuario = $nombreUsuario;
        $actionLog->id_bitacora_editada = $idBitacora;
        $actionLog->bitacora_editada = $bitacora;
        $actionLog->fecha = $fecha;
        $actionLog->accion = $accion;
        $actionLog->save();
    }
}
