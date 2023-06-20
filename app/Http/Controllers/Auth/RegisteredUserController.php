<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use App\Models\User;

use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::all();
        return view('auth.registrar', compact('roles'));
    }

    public function store(Request $request){
        $request->validate([
            'usuario'=>['required','string','max:25', 'unique:users'],
            'email'=>['required','string','email', 'unique:users', 'max:255'],
            'password'=>['required','confirmed','string', Rules\Password::defaults()],
        ]);

        $usuario = User::create([
            'usuario' => $request->usuario,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        
        $usuario->roles()->sync($request->roles);
        $usuario->save();

        //Auth::login($usuario); para iniciar sesion despues de registrar el usuario
        return to_route('inventario')->with('status', 'Cuenta creada con exito.');
    }
}
