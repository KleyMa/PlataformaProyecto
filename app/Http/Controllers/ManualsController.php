<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Manual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ManualsController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:manuales')->only('index', 'buscar');
        $this->middleware('can:manualesVer')->only('show');
        $this->middleware('can:manualesEditar')->only('edit', 'update');
        $this->middleware('can:manualesEliminar')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $manuales = Manual::all();
        return view('manuales.manuales', compact('manuales'));
    }

    public function buscar(Request $request)
    {
        $busqueda = $request->input('nombre');

        $manuales = Manual::where('equipo', 'like', '%' . $busqueda . '%')
        ->orWhere('descripcion', 'like', '%' . $busqueda . '%')
        ->orWhere('created_at', 'like', '%' . $busqueda . '%')
        ->get();

        return view('manuales.manuales', compact('manuales'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manual $manual)
    {
        $urlAnterior = url()->previous();
        Session::put('urlAnterior', $urlAnterior);
        return view('manuales.edit', ['manual'=>$manual]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Manual $manual)
    {
        $user = Auth::user();
        $equipo = Equipo::where('manual', $manual->ruta)->first();
        $request->validate([
            'manual' => ['file', 'mimes:pdf'],
        ]);
        
        $manual->descripcion = $request->descripcion;
        
        if ($request->hasFile('manual')) {
            // Eliminar el archivo anterior
            Storage::delete($manual->ruta);
            
            // Guardar el nuevo archivo
            $nombreArchivo = $equipo->nombre . '_Manual_' . date('Ymd') . '_' . time() . '.' . $request->file('manual')->getClientOriginalExtension();
            $manual->ruta = $request->file('manual')->storeAs('public/manuales', $nombreArchivo);
            $equipo->manual = $manual->ruta;
        }
        
        $manual->save();
        $equipo->save();
        
        //event(new UserActionInventory($user, $equipo , now() , 'Se edito: ' . $equipo->nombre));
        session()->flash('status', 'Manual editado correctamente.');
        
        return redirect()->route('manuales.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $manual = Manual::findOrFail($id);
        // Obtener la ruta del archivo manual
        $rutaManual = $manual->ruta;

        // Verificar si el archivo existe en el almacenamiento
        if (Storage::exists($rutaManual)) {
            // Eliminar el archivo manual del almacenamiento
            Storage::delete($rutaManual);
        }

        // Obtener el equipo relacionado
        $equipo = Equipo::where('manual', $manual->ruta)->first();

        if ($equipo) {
            // Actualizar el campo manual del equipo a null
            $equipo->manual = null;
            $equipo->save();
        }

        // Eliminar el registro del manual
        $manual->delete();

        session()->flash('status', 'El manual se ha eliminado correctamente.');

        return redirect()->route('manuales.index');
        }
}
