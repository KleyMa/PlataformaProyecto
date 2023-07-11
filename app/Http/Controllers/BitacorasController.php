<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BitacorasController extends Controller
{
    public function index(Request $request)
    {
        $bitacoras = Bitacora::all();
        return view('bitacoras.bitacoras', compact('bitacoras'));
    }

    public function buscar(Request $request)
    {
        $busqueda = $request->input('nombre');

        $bitacoras = Bitacora::where('numero_servicio', 'like', '%' . $busqueda . '%')
        ->orWhere('descripcion_falla', 'like', '%' . $busqueda . '%')
        ->orWhere('equipo', 'like', '%' . $busqueda . '%')
        ->get();

        return view('bitacoras.bitacoras', compact('bitacoras'));
    }

    public function show(Bitacora $bitacora) //solo $equipo
    {
        $urlAnterior = url()->previous();
        Session::put('urlAnterior', $urlAnterior);
        return view('bitacoras.show', ['bitacora'=>$bitacora]); //Equipo::findOrFail($equipo); es lo mismo
    }
    public function create()
    {
        $urlAnterior = url()->previous();
        Session::put('urlAnterior', $urlAnterior);
        return view('bitacoras.create');
    }
    public function store(Request $request)
    {
        $bitacora = new Bitacora();
        $this->validateInputs($request, $bitacora);
        session()->flash('status','Bitacora agregada correctamente.');

        return to_route('bitacoras.index');
    }

    public function edit(Bitacora $bitacora)
    {
        $urlAnterior = url()->previous();
        Session::put('urlAnterior', $urlAnterior);
        return view('bitacoras.edit', ['bitacora'=>$bitacora]);
    }
    
    public function update(Request $request, Bitacora $bitacora)
    {
        $this->validateInputs($request, $bitacora);
        session()->flash('status','Bitacora editada correctamente.');

        return to_route('bitacoras.index');
    }

    public function destroy(Bitacora $bitacora)
    {
        $bitacora->delete();

        session()->flash('status','Bitacora eliminada correctamente.');

        return to_route('bitacoras.index');
    }

    public function destroyFile(string $id)
    {
        $bitacora = Bitacora::findOrFail($id);
        // Eliminar el archivo físico de la bitácora
        if (Storage::exists($bitacora->bitacora_fisica)) {
            Storage::delete($bitacora->bitacora_fisica);
        }

        // Actualizar el campo 'bitacora_fisica' a null
        $bitacora->bitacora_fisica = null;
        $bitacora->save();

        session()->flash('status', 'Bitácora física eliminada correctamente.');
        return redirect()->route('bitacoras.index');
    }

    private function validateInputs(Request $request, Bitacora $bitacora)
    {
        $request -> validate([
            'bitacora_fisica' => ['file', 'mimes:jpg,png,pdf'],
            'fecha' => ['required'],
            'numero_servicio' => ['required', 'integer'],
            'equipo' => ['required'],
            'numero_de_serie' => ['required'],
            'modalidad' => ['required'],
            'descripcion_falla' => ['required'],
            'tipo_servicio' => ['required'],
            'trabajo_realizado' => ['required'],
            'estatus_operativo' => ['required'],
            'trabajo_terminado' => ['required', 'min:1'],
        ]);

        if ($request->hasFile('bitacora_fisica')) 
        {
            $nombreArchivo = 'Bitacora_' . $bitacora->numero_servicio . '_' . $bitacora->equipo . '_' . date('Ymd') . '_' . time() . '.' . $request->file('bitacora_fisica')->getClientOriginalExtension();
            $bitacora->bitacora_fisica = $request->file('bitacora_fisica')->storeAs('public/bitacoras', $nombreArchivo);
        }
        $bitacora->numero_servicio = $request->input('numero_servicio');
        $bitacora->equipo = $request->input('equipo');
        $bitacora->fecha = $request->input('fecha');
        $bitacora->numero_de_serie = $request->input('numero_de_serie');
        $bitacora->modalidad = $request->input('modalidad');
        $bitacora->descripcion_falla = $request->input('descripcion_falla');
        $bitacora->tipo_servicio = $request->input('tipo_servicio');
        $bitacora->materiales_utilizados = $request->input('materiales_utilizados');
        $bitacora->trabajo_realizado = $request->input('trabajo_realizado');
        $bitacora->estatus_operativo = $request->input('estatus_operativo');
        $bitacora->trabajo_terminado = $request->input('trabajo_terminado');
        $bitacora->save();

    }
}
