<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        //$this->middleware('can:roles')->only('index', 'buscar');
        $this->middleware('can:AgregarRol')->only('create', 'store');
        $this->middleware('can:rolesVer')->only('show');
        $this->middleware('can:rolesEditar')->only('edit', 'update');
        $this->middleware('can:rolesEliminar')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.roles', compact('roles'));
    }

    public function buscar(Request $request)
    {
        $roles = $request->input('name');

        $roles = Role::where('name', 'like', '%' . $roles . '%')->get();

        return view('roles.roles', compact('roles'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permisos = Permission::all();
        return view('roles.create', compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $role = Role::create($request->all());

        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.index')->with('status', 'El rol se ha creado con exito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('roles.show', ['role'=>$role]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permisos = Permission::all();
        return view('roles.edit', compact('role', 'permisos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $role->update($request->all());

        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.index')->with('status', 'El rol se ha editado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        session()->flash('status','Rol eliminado correctamente.');

        return to_route('roles.index');
    }
}
