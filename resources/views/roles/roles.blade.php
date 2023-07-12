<x-layouts.app title="Administrar roles" meta-description="Pagina de administracion de roles"> <!-- Para las etiquetas se usa kebab-case y para componentes camelCase, Laravel lo interpreta solo-->
    <div class="container mt-3 mb-4">
        <h1>Administrar roles</h1>
    </div>
    <div class="container">
        @can('AgregarRol')
        <a class="btn btn-success my-2 my-sm-0" href="{{ route('roles.create') }}"><i class="fa-solid fa-user-plus"></i> Nuevo rol</a>
        @endcan
        <table class="table table-bordered table-striped mt-3">
            <thead class="thead-dark">
            <tr>
                <th class="col-1 text-center">ID</th>
                <th class="col-1 text-center">Rol</th>
                <th class="col-1 text-center">Administrar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
            <tr>
                <th class="text-center">{{$role->id}}</td>
                <td class="text-center">{{$role->name}}</td>
                <td class="text-center">
                    <div class="container">
                        <div class="row">
                        <div class="col">
                            <div class="btn-group">
                            @can('rolesVer')
                            <a class="btn btn-primary" href="{{ route('roles.show', $role) }}"><i class="fa-regular fa-eye"></i></a>
                            @endcan
                            @can('rolesEditar')
                            <a class="btn btn-warning" href="{{ route('roles.edit', $role) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                            @endcan
                            @can('rolesEliminar')
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$role->id}}"><i class="fa-regular fa-circle-xmark"></i></button>
                            @endcan
                            </div>
                        </div>
                        </div>
                    </div>
                </td>
            </tr>
            @include('roles.delete')
            @endforeach
            </tbody>
        </table>     
    </div> 
</x-layout>