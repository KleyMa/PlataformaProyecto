<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Imagen;
use App\Models\Manual;
use Illuminate\Http\Request;
use App\Events\UserActionInventory;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\BinaryOp\Equal;

class InventarioController extends Controller
{
    public function index(Request $request)
    {
        $equipos = Equipo::where('estatus_inventario', 'activo')->paginate(3);
        return view('inventario', compact('equipos'));
    }
    
    public function indexInactivos(Request $request)
    {
        $equipos = Equipo::where('estatus_inventario', 'inactivo')->paginate(3);
        return view('inventarioInactivos', compact('equipos'));
    }

    public function buscar(Request $request)
    {
        $nombre = $request->input('nombre');

        $equipos = Equipo::where('nombre', 'like', '%' . $nombre . '%')->where('estatus_inventario', 'activo')->paginate(3);

        return view('inventario', compact('equipos'));
    }

    public function buscarInactivos(Request $request)
    {
        $nombre = $request->input('nombre');

        $equipos = Equipo::where('nombre', 'like', '%' . $nombre . '%')->where('estatus_inventario', 'inactivo')->paginate(3);

        return view('inventarioInactivos', compact('equipos'));
    }

    public function show(Equipo $equipo) //solo $equipo
    {
        $urlAnterior = url()->previous();
        Session::put('urlAnterior', $urlAnterior);
        $user = Auth::user();
        event(new UserActionInventory($user, $equipo , now() , 'Se vio: ' . $equipo->nombre));
        if ($equipo->manual && !Storage::has($equipo->manual)) {
            //Storage::delete($equipo->manual); // Eliminar físicamente el archivo
            $equipo->manual = null;
            $equipo->save();
        }
        return view('equipos.show', ['equipo'=>$equipo]); //Equipo::findOrFail($equipo); es lo mismo
    }
    public function create(Request $request)
    {
        return view('equipos.agregarequipo');
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        $equipo = new Equipo;
        $equipo = $this->validateInputs($request, $equipo);
        /*$url = route('equipos.show', $equipo->id);
        $qr = QrCode::format('png')
                 ->size(200)
                 ->generate($url);
        $qrFileName = 'equipo-' . $equipo->id . '.png';
        $qrFilePath = 'img/qr-code/' . $qrFileName;
        Storage::disk('local')->put($qrFilePath, $qr); //storage/app/public/img/qr-code/img-1557309130.png

        // Actualizar la propiedad "codigo_qr" del equipo con la ruta del código QR
        $equipo->codigo_qr = $qrFilePath;
        $equipo->save();*/
        event(new UserActionInventory($user, $equipo , now() , 'Se creo: ' . $equipo->nombre));

        session()->flash('status','Equipo agregado correctamente.');

        return to_route('inventario');
    }

    public function edit(Equipo $equipo)
    {
        $urlAnterior = url()->previous();
        Session::put('urlAnterior', $urlAnterior);
        return view('equipos.edit', ['equipo'=>$equipo]);
    }
    
    public function update(Request $request, Equipo $equipo)
    {
        $user = Auth::user();
        $equipo = $this->validateInputs($request, $equipo);
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

    public function validateInputs(Request $request, Equipo $equipo)
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
            $imagen = new Imagen();
            $imagen->ruta = $equipo->imagen_principal;
            $imagen->equipo = $equipo->nombre;
            $imagen->save();
        }
        
        if ($request->hasFile('manual')) {
            $nombreArchivo = $equipo->nombre . '_Manual_' . date('Ymd') . '_' . time() . '.' . $request->file('manual')->getClientOriginalExtension();
            
            // Verificar si existe un manual en el equipo
            if ($equipo->manual) {
                $manual = Manual::where('ruta', $equipo->manual)->first();
                // Eliminar el manual actual
                Storage::delete($equipo->manual);
                
                // Reemplazar los datos del manual existente
                $equipo->manual = $request->file('manual')->storeAs('public/manuales', $nombreArchivo);
                
                // Actualizar la ruta del manual en la tabla de manuales
                $manual->ruta = $equipo->manual;
                $manual->equipo = $equipo->nombre;
                $manual->save();
            } else {
                // Crear un nuevo manual en el equipo
                $equipo->manual = $request->file('manual')->storeAs('public/manuales', $nombreArchivo);
                
                $manual = new Manual();
                $manual->ruta = $equipo->manual;
                $manual->equipo = $equipo->nombre;
                $manual->save();
            }
        }
        $equipo->save();
        return $equipo;
    }

    public function baja(Equipo $equipo)
    {
        $user = Auth::user();
        $equipo->update(['estatus_inventario' => 'inactivo']);
        event(new UserActionInventory($user, $equipo , now() , 'Se dio de baja: ' . $equipo->nombre));
        session()->flash('status','Equipo dado de baja correctamente.');
        return to_route('equipos.inactivos');
    }

    public function alta(Equipo $equipo)
    {
        $user = Auth::user();
        $equipo->update(['estatus_inventario' => 'activo']);
        event(new UserActionInventory($user, $equipo , now() , 'Se dio de alta: ' . $equipo->nombre));
        session()->flash('status','Equipo dado de alta correctamente.');
        return to_route('inventario');
    }

    public function tipoDeEquipoBuscar(Request $request)
    {
        if($request->get('value')){
            $data = Equipo::where('tipo_de_equipo', 'LIKE', '%' . $request->tipo_de_equipo. '%')->get();
            $output = '';
            if(count($data) > 0){
                $output = '<ul class="dropdown-menu" style="display:block;position:relative;>"';
                foreach($data as $row){
                    $output .= '<li><a class="dropdown-item" href="#">' . $row->tipo_de_equipo . '</a></li>';
                }
                $output .= '</ul>';
            }
            else{
                $output .= '<li class="dropdown-item">Nueva entrada</li>';
            }
            return $output;
        }
    }
}