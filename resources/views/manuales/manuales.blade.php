<x-layouts.app title="Manuales" meta-description="Pagina de visualizacion de manuales">
    <div class="container">
        <h1>Manuales</h1>
    </div>
    <div class="container">
        <table class="table table-bordered table-striped mt-3">
            <thead class="thead-dark">
                <tr>
                    <th class="col-1 text-center">Equipo</th>
                    <th class="col-1 text-center">Descripcion</th>
                    <th class="col-1 text-center">Fecha</th>
                    <th class="col-1 text-center">Archivo</th>
                    <th class="col-1 text-center">Administrar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($manuales as $manual)
                    <tr>
                        <td class="text-center">{{ $manual->equipo }}</td>
                        <td class="text-center">{{ $manual->descripcion }}</td>
                        <td class="text-center">{{ $manual->created_at->format('d-m-Y') }}</td>
                        <td class="text-center">
                            @can('manualesVer')
                                <a href="{{ Storage::url($manual->ruta) }}" class="btn btn-primary" target="_blank"><i class="fa-regular fa-file"></i></a>
                            @endcan
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                @can('manualesVer')
                                    <a class="btn btn-primary" href="{{ Storage::url($manual->ruta) }}" target="_blank"><i class="fa-regular fa-eye"></i></a>
                                @endcan
                                @can('manualesEditar')
                                    <a class="btn btn-warning" data-toggle="modal" data-target="#modal-update-{{ $manual->id }}"><i class="fa-regular fa-pen-to-square"></i></a>
                                @endcan
                                @can('manualesEliminar')
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $manual->id }}"><i class="fa-regular fa-circle-xmark"></i></button>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @include('manuales.edit')
                @include('manuales.delete')
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.app>
