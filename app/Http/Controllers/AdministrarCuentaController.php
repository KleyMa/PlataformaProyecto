<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrarCuentaController extends Controller
{
    public function index(Request $request)
    {
        return view('administrar-cuenta');
    }
}
