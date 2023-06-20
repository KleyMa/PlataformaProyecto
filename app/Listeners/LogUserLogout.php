<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Carbon;
use App\Models\UserSessionLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogUserLogout
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
    public function handle(Logout $event): void
    {
        $user = $event->user;

        // Obtener información del usuario y tiempo de sesión
        $idUsuario = $user->id;
        $nombreUsuario = $user->usuario;
        $loginTime = $user->last_login;
        $logoutTime = Carbon::now();
        $sessionDuration = $logoutTime->diffInSeconds($loginTime);

        // Guardar información en la tabla de registros de sesión
        $sessionLog = new UserSessionLog();
        $sessionLog->id_usuario = $idUsuario;
        $sessionLog->nombre_usuario = $nombreUsuario;
        $sessionLog->fecha_login = $loginTime;
        $sessionLog->fecha_logout = $logoutTime;
        $sessionLog->tiempo_de_sesion = $sessionDuration;
        $sessionLog->save();
    }
}
