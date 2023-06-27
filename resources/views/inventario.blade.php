<x-layouts.app title="Inventario">
    <div class="container mt-3">
        <div class="mb-3">
            <h1>Inventario</h1>
        </div>
        @can('inventarioAgregarEquipo')
            <a class="btn btn-outline-success my-2 my-sm-0" href="{{ route('equipos.agregarequipo')}}">Agregar nuevo equipo</a><br>
        @endcan
    </div>
    <div class="container d-flex justify-content-between">
        <div class="row">
            @foreach ($equipos as $equipo)
            <div class="mt-3">
                <div class="card" style="width: 18rem; margin-left: 40px; margin-right: 40px;">
                    <img class="card-img-top" src="{{Storage::url($equipo->imagen_principal)}}" alt=".">
                    <div class="card-body">
                        <h5 class="card-title">{{$equipo->nombre}}</h5>
                        <p class="card-text">{{$equipo->descripcion}}</p><br>
                        <div class="container">
                            @can('inventarioVer')
                            <div class="row align-items-start">
                                <a href="{{ route('equipos.show', $equipo) }}" class="btn btn-primary">Ver Equipo</a>
                            </div>
                            @endcan
                            @can('inventarioEditarEquipo')
                                <div class="row align-items-center">
                                    <a href="{{ route('equipos.edit', $equipo) }}" class="btn btn-warning">Editar Informacion</a><br>
                                </div>
                            @endcan
                            @can('inventarioEliminarEquipo')
                                <div class="row align-items-end">
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$equipo->id}}">
                                        Eliminar
                                    </button>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            @include('equipos.delete')
            @endforeach
        </div>
    </div>
    <div class="container mt-3">
        <div class="d-flex justify-content-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    {{ $equipos->links() }}
                </ul>
            </nav>
        </div>
    </div>
</x-layouts.app>
