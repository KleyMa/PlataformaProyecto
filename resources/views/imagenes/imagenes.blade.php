<x-layouts.app title="Imagenes" meta-description="Pagina de visualizacion de imagenes"> <!-- Para las etiquetas se usa kebab-case y para componentes camelCase, Laravel lo interpreta solo-->
    <div class="container mb-5">
        <h1>Imagenes</h1>
    </div>
    <div class="container">
        <div class="card-columns">
            @foreach($imagenes as $imagen)
            <div class="card">
                <img src="{{Storage::url($imagen->ruta)}}" alt="" class="img-fluid">
                <div class="card-footer">
                <h6><center>{{$imagen->equipo}}</h5></center>
                @if($imagen->descripcion)
                    <center><p>{{$imagen->descripcion}}</p></center>
                @endif
                <center><a class="btn btn-primary" href="{{Storage::url($imagen->ruta)}}" target="_blank"><i class="fa-regular fa-eye"></i></a>
                @can('imagenesEditar')
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-{{$imagen->id}}"><i class="fa-regular fa-pen-to-square fa-lg"></i></button>
                @endcan
                @can('imagenesEliminar')
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$imagen->id}}"><i class="fa-regular fa-trash-can fa-lg"></i></button></center>
                @endcan
                </div>
            </div>
            @include('imagenes.edit')
            @include('imagenes.delete')
            @endforeach
        </div>
    </div>
</x-layout>