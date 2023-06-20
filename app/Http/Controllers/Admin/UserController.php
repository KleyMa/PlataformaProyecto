<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:usuarios')->only('index', 'buscar');
        $this->middleware('can:usuariosVer')->only('show');
        $this->middleware('can:usuariosEditar')->only('edit', 'update');
        $this->middleware('can:usuariosEliminar')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        $usuarios = User::all();
        return view('usuarios', compact('usuarios', 'roles'));
    }

    public function buscar(Request $request)
    {
        $usuario = $request->input('usuario');

        $usuarios = User::where('usuario', 'like', '%' . $usuario . '%')->get();

        return view('usuarios', compact('usuarios'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $usuario)
    {
        return view('usuarios.show', ['usuario'=>$usuario]); //Equipo::findOrFail($equipo); es lo mismo
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $usuario)
    {
        $roles = Role::all();
        return view('usuarios.edit', ['usuario'=>$usuario, 'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $usuario)
    {
        $usuario->roles()->sync($request->roles);
        $request->validate([
            'usuario'=>['required','string','max:25', Rule::unique('users')->ignore($usuario->id)],
            'email'=>['required','string','email', Rule::unique('users')->ignore($usuario->id), 'max:255'],
        ]);

        $usuario->usuario = $request->input('usuario');
        $usuario->email = $request->input('email');
        $usuario->save();

        session()->flash('status','Usuario editado correctamente.');

        return to_route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();

        session()->flash('status','Usuario eliminado correctamente.');

        return to_route('usuarios.index');
    }
}
