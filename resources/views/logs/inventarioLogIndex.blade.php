<x-layouts.app title="Log Inventario" meta-description="Pagina de visualizacion de logs"> <!-- Para las etiquetas se usa kebab-case y para componentes camelCase, Laravel lo interpreta solo-->
    <div class="container">
        <h1>Logs de inventario</h1>
    </div>
    <div class="container">
        <div class="row">
            <a class="btn btn-primary ml-2" href="{{ route('historiales.inventarioLogIndex')}}">Inventario</a>
            <a class="btn btn-primary ml-2" href="{{ route('historiales.bitacorasLogIndex')}}">Bitacoras</a>
            <a class="btn btn-primary ml-2" href="{{ route('historiales.imagenesLogIndex')}}">Imagenes</a>
            <a class="btn btn-primary ml-2" href="{{ route('historiales.manualesLogIndex')}}">Manuales</a>
            <a class="btn btn-primary ml-2" href="{{ route('historiales.usuariosLogIndex')}}">Usuarios</a>
            <a class="btn btn-primary ml-2" href="{{ route('historiales.rolesLogIndex')}}">Roles</a>
            <a class="btn btn-primary ml-2" href="{{ route('historiales.sesionesUsuariosLogIndex')}}">Sesiones</a>
        </div>
        <table class="table table-bordered table-striped mt-3">
            <thead class="thead-dark">
              <tr>
                <th class="col-1 text-center">ID Log</th>
                <th class="col-1 text-center">ID Usuario</th>
                <th class="col-2 text-center">Usuario</th>
                <th class="col-1 text-center">ID Equipo</th>
                <th class="col-1 text-center">Equipo</th>
                <th class="col-1 text-center">Fecha</th>
                <th class="col-1 text-center">Accion</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($inventarioLogs as $inventarioLog)
              <tr>
                <td class="text-center">{{$inventarioLog->id}}</td>
                <td class="text-center">{{$inventarioLog->id_usuario}}</td>
                <td class="text-center">{{$inventarioLog->usuario}}</td>
                <td class="text-center">{{$inventarioLog->id_equipo}}</td>
                <td class="text-center">{{$inventarioLog->nombre_equipo}}</td>
                <td class="text-center">{{$inventarioLog->fecha}}</td>
                <td class="text-center">{{$inventarioLog->accion}}</td>
              </tr>
            @endforeach
            </tbody>
        </table>     
    </div> 
</x-layout>