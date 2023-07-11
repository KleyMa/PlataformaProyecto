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
                <a class="btn btn-primary" href="{{ route('imagenes.edit', $imagen) }}">Editar</a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$imagen->id}}">Eliminar</button>
                </div>
            </div>
            @endforeach
            @include('imagenes.delete')
        </div>
    </div>
</x-layout>