<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Events\UserLoggedOut;
use Illuminate\Support\Facades\Password;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request){
        $credentials = $request->validate([
            'usuario' => ['required', 'string'],
            'password'=> ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            $usuario = Auth::user();
            $usuario->last_login = Carbon::now();
            $usuario->save();
        
            $request->session()->regenerate();
        
            return redirect()->intended()->with('status', 'Has iniciado sesión correctamente');
        } 
        elseif (!Auth::attempt($credentials, $request->boolean('recuerdame'))) {
            // Autenticación fallida
            throw ValidationException::withMessages([
                'usuario' => __('auth.failed')
            ]);
        }

        $request ->session()->regenerate();

        return redirect()->intended()->with('status','Has iniciado sesion correctamente');
    }

    public function destroy(Request $request){
        $user = Auth::user();
        event(new UserLoggedOut($user, now()));
        
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login')->with('status','Se ha cerrado sesion correctamente');
    }
}
