<x-layouts.app title="Inventario">
    <div class="container">
        <div class="mb-3">
            <h1>Inventario</h1>
        </div>
        <div style="display: flex; justify-content: space-between;">
            @can('inventarioAgregarEquipo')
                <div><a class="btn btn-success my-2 my-sm-0" href="{{ route('equipos.agregarequipo')}}"><i class="fa-solid fa-file-circle-plus"></i> Nuevo equipo</a><br></div>
            @endcan
            @can('inventarioInactivos')
                <div><a class="btn btn-warning my-2 my-sm-0" href="{{ route('equipos.inactivos')}}"><i class="fa-solid fa-folder-open"></i> Equipos inactivos</a><br></div>
            @endcan
        </div>
    </div>
    <div class="container d-flex justify-content-between">
        <div class="row">
            @foreach ($equipos as $equipo)
            <div class="mt-3">
                <div class="card" style="width: 18rem; margin-left: 40px; margin-right: 40px;">
                    <img class="card-img-top" style="height: 200px; width:286px;" src="{{Storage::url($equipo->imagen_principal)}}" alt=".">
                    <div class="card-body">
                        <h5 class="card-title">{{$equipo->nombre}}</h5>
                        <p class="card-text text-truncate">{{$equipo->descripcion}}</p><br>
                        <div class="container">
                            @can('inventarioVer')
                            <div class="row align-items-start">
                                <a href="{{ route('equipos.show', $equipo) }}" class="btn btn-primary btn-block w-100"><i class="fa-regular fa-eye"></i> Ver Equipo</a>
                            </div>
                            @endcan
                            @can('inventarioEditarEquipo')
                                <div class="row align-items-center">
                                    <a href="{{ route('equipos.edit', $equipo) }}" class="btn btn-warning btn-block w-100"><i class="fa-regular fa-pen-to-square"></i> Editar Informacion</a><br>
                                </div>
                            @endcan
                            @can('inventarioDarBaja')
                                <div class="row align-items-end">
                                    <button type="button" class="btn btn-danger btn-block w-100" data-toggle="modal" data-target="#modal-baja-{{$equipo->id}}">
                                        <i class="fa-regular fa-circle-xmark"></i> Dar de baja
                                    </button>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            @include('equipos.baja')
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
