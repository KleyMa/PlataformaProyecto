<x-layouts.app title="Equipos Inactivos">
    <div class="container mt-3">
        <div class="mb-3">
            <h1>Equipos inactivos</h1>
        </div>
        <div style="display: flex; justify-content: flex-end;">
            <div>
                <a class="btn btn-outline-warning my-2 my-sm-0" href="{{ route('inventario')}}">Ver equipos activos</a><br>
            </div>
        </div>
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
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-alta-{{$equipo->id}}">
                                        Dar de alta
                                    </button>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            @include('equipos.alta')
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
