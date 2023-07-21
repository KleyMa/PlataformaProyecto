<?php

namespace App\Http\Controllers;

use App\Models\UserActionBitacoraLog;
use App\Models\UserActionImagenLog;
use App\Models\UserActionInventoryLog;
use App\Models\UserActionManualLog;
use App\Models\UserActionRolLog;
use App\Models\UserActionUsersLog;
use App\Models\UserSessionLog;
use Illuminate\Http\Request;

class HistorialesController extends Controller
{
    public function inventarioLog()
    {
        $inventarioLogs = UserActionInventoryLog::all();
        return view('logs.inventarioLogIndex', compact('inventarioLogs'));
    }
    public function bitacorasLog()
    {
        $bitacorasLogs = UserActionBitacoraLog::all();
        return view('logs.bitacorasLogIndex', compact('bitacorasLogs'));
    }
    public function imagenesLog()
    {
        $imagenesLogs = UserActionImagenLog::all();
        return view('logs.imagenesLogIndex', compact('imagenesLogs'));
    }
    public function manualesLog()
    {
        $manualesLogs = UserActionManualLog::all();
        return view('logs.manualesLogIndex', compact('manualesLogs'));
    }
    public function usuariosLog()
    {
        $usuariosLogs = UserActionUsersLog::all();
        return view('logs.usuariosLogIndex', compact('usuariosLogs'));
    }
    public function rolesLog()
    {
        $rolesLogs = UserActionRolLog::all();
        return view('logs.rolesLogIndex', compact('rolesLogs'));
    }
    public function sesionesUsuariosLog()
    {
        $sesionesUsuariosLogs = UserSessionLog::all();
        return view('logs.sesionesUsuariosLogIndex', compact('sesionesUsuariosLogs'));
    }
}
