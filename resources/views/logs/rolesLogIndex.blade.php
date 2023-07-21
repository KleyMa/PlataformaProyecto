<x-layouts.app title="Log Roles" meta-description="Pagina de visualizacion de logs"> <!-- Para las etiquetas se usa kebab-case y para componentes camelCase, Laravel lo interpreta solo-->
    <div class="container">
        <h1>Logs de roles</h1>
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
                <th class="col-1 text-center">ID Rol editado</th>
                <th class="col-1 text-center">Rol editado</th>
                <th class="col-1 text-center">Fecha</th>
                <th class="col-1 text-center">Accion</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($rolesLogs as $rolesLog)
              <tr>
                <td class="text-center">{{$rolesLog->id}}</td>
                <td class="text-center">{{$rolesLog->id_usuario}}</td>
                <td class="text-center">{{$rolesLog->usuario}}</td>
                <td class="text-center">{{$rolesLog->id_rol_editado}}</td>
                <td class="text-center">{{$rolesLog->rol_editado}}</td>
                <td class="text-center">{{$rolesLog->fecha}}</td>
                <td class="text-center">{{$rolesLog->accion}}</td>
              </tr>
            @endforeach
            </tbody>
        </table>     
    </div> 
</x-layout>