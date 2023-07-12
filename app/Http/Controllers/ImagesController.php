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
        return view('imagenes.edit');
    }

    public function update(Request $request, string $id)
    {
        //
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
