<x-layouts.app :title="$equipo->nombre"> <!-- Los dos puntos permiten que se ejecute php aqui dentro-->
    <div class="container">
        <div class="container mb-4">
            <h1>{{$equipo->nombre}}</h1>
        </div>
        <div class="container">
            @if($equipo->manual && Storage::exists($equipo->manual))
            <div class="d-md-flex justify-content-md-end">
                <label class="mr-2">Manual del equipo:</label>
                <a target="_blank" href="{{Storage::url($equipo->manual)}}"><i class="fa-sharp fa-solid fa-file-pdf fa-2xl"></i></a>
            </div>
            @endif
            <label>Tipo de equipo: {{$equipo->tipo_de_equipo}}</label><br>
            <label>Descripcion: {{$equipo->descripcion}}</label><br>
            <label>Fabricante: {{$equipo->fabricante}}</label><br>
            <label>Modelo: {{$equipo->modelo}}</label><br>
            <label>Numero de serie: {{$equipo->numero_de_serie}}</label><br>
            <label>Ubicacion: {{$equipo->ubicacion}}</label><br>
            <label>Estatus operativo: {{$equipo->estatus_operativo}}</label><br>
            <label>Alimentacion electrica: {{$equipo->alimentacion_electrica}}</label><br>
            <label>Requisitos de funcionamiento: {{$equipo->requisitos_de_funcionamiento}}</label><br>
            <label>Proveedor de mantenimiento: {{$equipo->proveedor_de_mantenimiento}}</label><br>
            <label>Proveedor de compra: {{$equipo->proveedor_de_compra}}</label><br>
            <a class="btn btn-warning btn-lg btn-block my-2 my-sm-0" href="{{ Session::get('urlAnterior') }}"><i class="fa-solid fa-circle-arrow-left"></i> Regresar</a><br>
            @if($equipo->estatus_inventario == "inactivo")
            @can('inventarioEliminarEquipo')
            <button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#modal-delete-{{$equipo->id}}">
                <i class="fa-solid fa-trash-can"></i> Eliminar equipo permanentemente
            </button>
            @endcan
            @include('equipos.delete')
            @endif
        </div>
    </div>
</x-layouts.app>