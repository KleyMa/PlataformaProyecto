<x-layouts.app title="Manuales" meta-description="Pagina de visualizacion de manuales"> <!-- Para las etiquetas se usa kebab-case y para componentes camelCase, Laravel lo interpreta solo-->
    <div class="container">
        <h1>Manuales</h1>
    </div>
    <div class="container">
        <!--<a class="btn btn-success my-2 my-sm-0 mb-4" href="{{ route('manuales.create')}}"><i class="fa-solid fa-file-circle-plus"></i> Nuevo manual</a><br>-->
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
                <td class="text-center">{{$manual->equipo}}</td>
                <td class="text-center">{{$manual->descripcion}}</td>
                <td class="text-center">{{$manual->created_at->format('d-m-Y')}}</td>
                <td class="text-center">
                  @can('manualesVer')
                    <a href="{{Storage::url($manual->ruta)}}" class="btn btn-primary"><i class="fa-regular fa-file"></i></a>
                  @endcan
                </td>
                <td class="text-center">
                    <div class="container">
                        <div class="row">
                          <div class="col">
                            <div class="btn-group">
                              @can('manualesVer')
                              <a class="btn btn-primary" href="{{ route('manuales.show', $manual) }}"><i class="fa-regular fa-eye"></i></a>
                              @endcan
                              @can('manualesEditar')
                              <a class="btn btn-warning" href="{{ route('manuales.edit', $manual) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                              @endcan
                              @can('manualesEliminar')
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$manual->id}}"><i class="fa-regular fa-circle-xmark"></i></button>
                              @endcan
                            </div>
                            @include('manuales.delete')
                          </div>
                        </div>
                      </div>
                </td>
              </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-layout>