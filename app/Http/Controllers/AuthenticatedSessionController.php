<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Events\UserLoggedOut;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
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

    public function changePassword(Request $request){
        return view('auth.cambiar-password');
    }

    public function updatePassword(Request $request){
        $request->validate([
            'old_password'=>['required','string', Rules\Password::defaults()],
            'new_password'=>['required','confirmed','string', Rules\Password::defaults()],
        ]);

        if(Hash::check($request->old_password, Auth::user()->password)){
            $user = Auth::user();
            $user->update([
                'password'=>bcrypt($request->new_password)
            ]);
            session()->flash('status', 'La contraseña se ha actualizado con exito.');
        }
        else{
            session()->flash('status', 'La contraseña actual no es correcta.');
            session()->flash('status-class', 'alert-danger');
        }
        return to_route('administrarcuenta');
    }

    public function changeEmail(){
        return view('auth.cambiar-email');
    }
    
    public function updateEmail(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', Rules\Password::defaults()],
            'email' => ['required', 'string', 'email', 'unique:users', 'max:255'],
        ]);

        if (Hash::check($request->password, Auth::user()->password)) {
            $user = Auth::user();
            $user->update([
                'email' => $request->email,
            ]);
            session()->flash('status', 'El email se ha actualizado con éxito.');
            session()->flash('status-class', 'alert-success');
        } else {
            session()->flash('status', 'La contraseña no es correcta.');
            session()->flash('status-class', 'alert-danger');
        }
        return to_route('administrarcuenta');
    }
}
