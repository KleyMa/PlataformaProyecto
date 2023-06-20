<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarioController extends Controller
{
    public function index(Request $request)
    {
        $equipos = Equipo::all();
        return view('inventario', compact('equipos'));
    }

    public function buscar(Request $request)
    {
        $nombre = $request->input('nombre');

        $equipos = Equipo::where('nombre', 'like', '%' . $nombre . '%')->get();

        return view('inventario', compact('equipos'));
    }

    public function show(Equipo $equipo) //solo $equipo
    {
        return view('equipos.show', ['equipo'=>$equipo]); //Equipo::findOrFail($equipo); es lo mismo
    }
    public function create()
    {
        return view('equipos.agregarequipo');
    }
    public function store(Request $request)
    {
        $request -> validate([
            'nombre' => ['required'],
            'tipo_de_equipo' => ['required'],
            'descripcion' => ['required'],
            'fabricante' => ['required'],
            'modelo' => ['required'],
            'numero_de_serie' => ['required'],
            'ubicacion' => ['required'],
            'estatus_operativo' => ['required'],
            'alimentacion_electrica' => ['required'],
            'requisitos_de_funcionamiento' => ['required'],
            'proveedor_de_mantenimiento' => ['required'],
            'proveedor_de_compra' => ['required'],
            'imagen_principal' => ['file','mimes:jpeg,png,gif'],
            'manual' => ['file', 'mimes:pdf'],
        ]);
        $equipo = new Equipo;
        $equipo->nombre = $request->input('nombre');
        $equipo->tipo_de_equipo = $request->input('tipo_de_equipo');
        $equipo->descripcion = $request->input('descripcion');
        $equipo->fabricante = $request->input('fabricante');
        $equipo->modelo = $request->input('modelo');
        $equipo->numero_de_serie = $request->input('numero_de_serie');
        $equipo->ubicacion = $request->input('ubicacion');
        $equipo->estatus_operativo = $request->input('estatus_operativo');
        $equipo->alimentacion_electrica = $request->input('alimentacion_electrica');
        $equipo->requisitos_de_funcionamiento = $request->input('requisitos_de_funcionamiento');
        $equipo->proveedor_de_mantenimiento = $request->input('proveedor_de_mantenimiento');
        $equipo->proveedor_de_compra = $request->input('proveedor_de_compra');
        if($request->hasFile('imagen_principal'))
        {
            $equipo->imagen_principal = $request->file('imagen_principal')->store('public/imagenes');
        }
        if($request->hasFile('manual'))
        {
            $equipo->manual = $request->file('manual')->store('public/manuales');
        }
        $equipo->save();

        session()->flash('status','Equipo agregado correctamente.');

        return to_route('inventario');
    }

    public function edit(Equipo $equipo)
    {
        return view('equipos.edit', ['equipo'=>$equipo]);
    }
    
    public function update(Request $request, Equipo $equipo)
    {
        $request -> validate([
            'nombre' => ['required'],
            'tipo_de_equipo' => ['required'],
            'descripcion' => ['required'],
            'fabricante' => ['required'],
            'modelo' => ['required'],
            'numero_de_serie' => ['required'],
            'ubicacion' => ['required'],
            'estatus_operativo' => ['required'],
            'alimentacion_electrica' => ['required'],
            'requisitos_de_funcionamiento' => ['required'],
            'proveedor_de_mantenimiento' => ['required'],
            'proveedor_de_compra' => ['required'],
            'imagen_principal' => ['file', 'mimes:jpg,png,gif'],
            'manual' => ['file', 'mimes:pdf'],
        ]);

        $equipo->nombre = $request->input('nombre');
        $equipo->tipo_de_equipo = $request->input('tipo_de_equipo');
        $equipo->descripcion = $request->input('descripcion');
        $equipo->fabricante = $request->input('fabricante');
        $equipo->modelo = $request->input('modelo');
        $equipo->numero_de_serie = $request->input('numero_de_serie');
        $equipo->ubicacion = $request->input('ubicacion');
        $equipo->estatus_operativo = $request->input('estatus_operativo');
        $equipo->alimentacion_electrica = $request->input('alimentacion_electrica');
        $equipo->requisitos_de_funcionamiento = $request->input('requisitos_de_funcionamiento');
        $equipo->proveedor_de_mantenimiento = $request->input('proveedor_de_mantenimiento');
        $equipo->proveedor_de_compra = $request->input('proveedor_de_compra');

        if($request->hasFile('imagen_principal'))
        {
            $equipo->imagen_principal = $request->file('imagen_principal')->store('public/imagenes');
        }
        if($request->hasFile('manual'))
        {
            $equipo->manual = $request->file('manual')->store('public/manuales');
        }
        $equipo->save();

        session()->flash('status','Equipo editado correctamente.');

        return to_route('inventario');
    }

    public function destroy(Equipo $equipo)
    {
        $equipo->delete();

        session()->flash('status','Equipo eliminado correctamente.');

        return to_route('inventario');
    }
}