<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;
use App\Events\UserActionInventory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\BinaryOp\Equal;

class InventarioController extends Controller
{
    public function index(Request $request)
    {
        $equipos = Equipo::where('estatus_inventario', 'activo')->paginate(3);
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
        $user = Auth::user();
        event(new UserActionInventory($user, $equipo , now() , 'Se vio: ' . $equipo->nombre));
        return view('equipos.show', ['equipo'=>$equipo]); //Equipo::findOrFail($equipo); es lo mismo
    }
    public function create()
    {
        return view('equipos.agregarequipo');
    }
    public function store(Request $request)
    {
        $user = Auth::user();
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
            $nombreArchivo = $equipo->nombre . '_Manual_' . date('Ymd') . '_' . time() . '.' . $equipo->manual->getClientOriginalExtension();
            $equipo->manual = $request->file('manual')->storeAs('public/manuales', $nombreArchivo);
        }
        $equipo->save();
        event(new UserActionInventory($user, $equipo , now() , 'Se creo: ' . $equipo->nombre));

        session()->flash('status','Equipo agregado correctamente.');

        return to_route('inventario');
    }

    public function edit(Equipo $equipo)
    {
        return view('equipos.edit', ['equipo'=>$equipo]);
    }
    
    public function update(Request $request, Equipo $equipo)
    {
        $user = Auth::user();
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
            $nombreArchivo = $equipo->nombre . '_Manual_' . date('Ymd') . '_' . time() . '.' . $request->file('manual')->getClientOriginalExtension();
            $equipo->manual = $nombreArchivo;
            $request->file('manual')->storeAs('public/manuales', $nombreArchivo);
        }
        $equipo->save();

        event(new UserActionInventory($user, $equipo , now() , 'Se edito: ' . $equipo->nombre));
        session()->flash('status','Equipo editado correctamente.');

        return to_route('inventario');
    }

    public function destroy(Equipo $equipo)
    {
        $user = Auth::user();
        $equipo->delete();

        session()->flash('status','Equipo eliminado correctamente.');
        event(new UserActionInventory($user, $equipo , now() , 'Se elimino: ' . $equipo->nombre));

        return to_route('inventario');
    }

    public function baja(Equipo $equipo)
    {
        $user = Auth::user();
        $equipo->estatus_inventario = 'inactivo';
        $equipo->save();
        event(new UserActionInventory($user, $equipo , now() , 'Se dio de baja: ' . $equipo->nombre));
        return to_route('inventario')->with('success', 'Equipo dado de baja correctamente.');
    }
}