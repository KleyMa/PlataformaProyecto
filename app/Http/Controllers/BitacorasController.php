<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;

class BitacorasController extends Controller
{
    public function index(Request $request)
    {
        $bitacoras = Bitacora::all();
        return view('bitacoras.bitacoras', compact('bitacoras'));
    }

    public function buscar(Request $request)
    {
        $nombre = $request->input('nombre');

        $bitacoras = Bitacora::where('nombre', 'like', '%' . $nombre . '%')->get();

        return view('bitacoras.bitacoras', compact('bitacoras'));
    }

    public function show(Bitacora $bitacora) //solo $equipo
    {
        return view('bitacoras.show', ['bitacora'=>$bitacora]); //Equipo::findOrFail($equipo); es lo mismo
    }
    public function create()
    {
        return view('bitacoras.agregarequipo');
    }
    public function store(Request $request)
    {
        $request -> validate([
            'id_inventario' => ['required'],
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
            'proveedor_de_compra' => ['required']
        ]);
        $equipo = new Bitacora;
        $equipo->id_inventario = $request->input('id_inventario');
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
        $equipo->url_imagen_principal = $request->input('url_imagen_principal');
        $equipo->url_manual = $request->input('url_manual');
        $equipo->save();

        session()->flash('status','Bitacora agregada correctamente.');

        return to_route('bitacoras');
    }

    public function edit(Bitacora $bitacora)
    {
        return view('bitacoras.edit', ['bitacora'=>$bitacora]);
    }
    
    public function update(Request $request, Bitacora $bitacora)
    {
        $request -> validate([
            'id_inventario' => ['required'],
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
            'proveedor_de_compra' => ['required']
        ]);

        $bitacora->id_inventario = $request->input('id_inventario');
        $bitacora->nombre = $request->input('nombre');
        $bitacora->tipo_de_bitacora = $request->input('tipo_de_bitacora');
        $bitacora->descripcion = $request->input('descripcion');
        $bitacora->fabricante = $request->input('fabricante');
        $bitacora->modelo = $request->input('modelo');
        $bitacora->numero_de_serie = $request->input('numero_de_serie');
        $bitacora->ubicacion = $request->input('ubicacion');
        $bitacora->estatus_operativo = $request->input('estatus_operativo');
        $bitacora->alimentacion_electrica = $request->input('alimentacion_electrica');
        $bitacora->requisitos_de_funcionamiento = $request->input('requisitos_de_funcionamiento');
        $bitacora->proveedor_de_mantenimiento = $request->input('proveedor_de_mantenimiento');
        $bitacora->proveedor_de_compra = $request->input('proveedor_de_compra');
        $bitacora->save();

        session()->flash('status','Bitacora editada correctamente.');

        return to_route('bitacoras');
    }

    public function destroy(Bitacora $bitacora)
    {
        $bitacora->delete();

        session()->flash('status','Bitacora eliminada correctamente.');

        return to_route('bitacoras');
    }
}
