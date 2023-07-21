<x-layouts.app title="Log Manuales" meta-description="Pagina de visualizacion de logs"> <!-- Para las etiquetas se usa kebab-case y para componentes camelCase, Laravel lo interpreta solo-->
    <div class="container">
        <h1>Logs de manuales</h1>
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
                <th class="col-1 text-center">ID Manual</th>
                <th class="col-1 text-center">Manual</th>
                <th class="col-1 text-center">Fecha</th>
                <th class="col-1 text-center">Accion</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($manualesLogs as $manualesLog)
              <tr>
                <td class="text-center">{{$manualesLog->id}}</td>
                <td class="text-center">{{$manualesLog->id_usuario}}</td>
                <td class="text-center">{{$manualesLog->usuario}}</td>
                <td class="text-center">{{$manualesLog->id_manual_editado}}</td>
                <td class="text-center">{{$manualesLog->manual_editado}}</td>
                <td class="text-center">{{$manualesLog->fecha}}</td>
                <td class="text-center">{{$manualesLog->accion}}</td>
              </tr>
            @endforeach
            </tbody>
        </table>     
    </div> 
</x-layout>