<x-layouts.app title="Bitacoras" meta-description="Pagina de administracion de bitacoras"> <!-- Para las etiquetas se usa kebab-case y para componentes camelCase, Laravel lo interpreta solo-->
    <div class="container">
        <h1>Bitacoras</h1>
    </div>
    <div class="container">
      @can('bitacorasAgregarBitacora')
        <a class="btn btn-success my-2 my-sm-0 mb-4" href="{{ route('bitacoras.create')}}"><i class="fa-solid fa-file-circle-plus"></i> Nueva bitacora</a><br>
      @endcan
        <table class="table table-bordered table-striped mt-3">
            <thead class="thead-dark">
              <tr>
                <th class="col-1 text-center">No. servicio</th>
                <th class="col-1 text-center">Equipo</th>
                <th class="col-2 text-center">Falla</th>
                <th class="col-1 text-center">Fecha</th>
                <th class="col-1 text-center">En fisico</th>
                <th class="col-1 text-center">Administrar</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($bitacoras as $bitacora)
              <tr>
                <td class="text-center">{{$bitacora->numero_servicio}}</td>
                <td class="text-center">{{$bitacora->equipo}}</td>
                <td class="text-center">{{$bitacora->descripcion_falla}}</td>
                <td class="text-center">{{$bitacora->fecha}}</td>
                <td class="text-center">
                @if($bitacora->bitacora_fisica != null)
                    <div class="btn-group">
                      @can('bitacorasVerBitacoraFisica')
                      <a href="{{Storage::url($bitacora->bitacora_fisica)}}" class="btn btn-primary"><i class="fa-regular fa-file"></i></a>
                      @endcan
                      @can('bitacorasEliminarBitacoraFisica')
                      <button type="button" target="_blank" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-file-{{$bitacora->id}}"><i class="fa-regular fa-trash-can"></i></button>
                      @endcan
                    </div>
                    @include('bitacoras.delete-file')
                @else
                  <i class="fa-solid fa-file-excel fa-2xl"></i>
                @endif
                </td>
                <td class="text-center">
                    <div class="container">
                        <div class="row">
                          <div class="col">
                            <div class="btn-group">
                              @can('bitacorasVer')
                              <a class="btn btn-primary" href="{{ route('bitacoras.show', $bitacora) }}"><i class="fa-regular fa-eye"></i></a>
                              @endcan
                              @can('bitacorasEditarBitacora')
                              <a class="btn btn-warning" href="{{ route('bitacoras.edit', $bitacora) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                              @endcan
                              @can('bitacorasEliminarBitacora')
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$bitacora->id}}"><i class="fa-regular fa-circle-xmark"></i></button>
                              @endcan
                            </div>
                            @include('bitacoras.delete')
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