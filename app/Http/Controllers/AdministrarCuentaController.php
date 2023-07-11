<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdministrarCuentaController extends Controller
{
    public function index(Request $request)
    {
        $urlAnterior = url()->previous();
        Session::put('urlAnterior', $urlAnterior);
        return view('administrar-cuenta');
    }
}
