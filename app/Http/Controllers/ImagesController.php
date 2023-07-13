<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:imagenes')->only('index', 'buscar');
        $this->middleware('can:imagenesAgregar')->only('create', 'store');
        $this->middleware('can:imagenesEditar')->only('edit', 'update');
        $this->middleware('can:imagenesEliminar')->only('destroy');
    }
    public function index()
    {
        /*$imagenes = Equipo::where('imagen_principal', '!=', 'default.jpg')
            ->where('imagen_principal', 'not like', '%imagenes/default.jpg')
            ->pluck('imagen_principal');*/
        $imagenes = Imagen::all();
        return view('imagenes.imagenes', compact('imagenes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        
    }

    public function update(Request $request, string $id)
    {
        $imagen = Imagen::findOrFail($id);
        $equipo = Equipo::where('imagen_principal', $imagen->ruta)->first();
        if ($request->hasFile('imagen_principal')) 
        {
            $imagenPrincipalActual = $equipo->imagen_principal;
            // Eliminar la imagen principal actual si existe
            if (!empty($imagenPrincipalActual) && $imagenPrincipalActual != 'imagenes/default.jpg') {
                $imagen = Imagen::where('ruta', $imagenPrincipalActual)->first();
                $imagen ->delete();
                // Eliminar la imagen principal del almacenamiento
                Storage::delete($imagenPrincipalActual);
                // Eliminar la referencia de la imagen principal del equipo
                $equipo->imagen_principal = null;
                $equipo->save();
            }
            $nombreArchivo = $equipo->nombre . '_Imagen_' . date('Ymd') . '_' . time() . '.' . $request->file('imagen_principal')->getClientOriginalExtension();
            $equipo->imagen_principal = $request->file('imagen_principal')->storeAs('public/imagenes', $nombreArchivo);
            $imagen->ruta = $equipo->imagen_principal;
            $imagen->equipo = $equipo->nombre;
        }
        $imagen->descripcion = $request->descripcion;
        $equipo->save();
        $imagen->save();
        session()->flash('status','Imagen editada correctamente.');
        return to_route('imagenes.index');
    }

    public function destroy(string $id)
    {
        $imagen = Imagen::findOrFail($id);
        
        $equipo = Equipo::where('imagen_principal', 'like', '%' . $imagen->ruta . '%')->get();
        if ($equipo->isNotEmpty()) {
            foreach ($equipo as $equipoItem) {
                Storage::delete($equipoItem->imagen_principal);
                $equipoItem->imagen_principal = "imagenes/default.jpg";
                $equipoItem->save();
            }
        }
        Storage::delete($imagen->ruta);
        $imagen->delete();
        
        session()->flash('status', 'Imagen eliminada correctamente.');
        
        return redirect()->route('imagenes.index');
    }
}
