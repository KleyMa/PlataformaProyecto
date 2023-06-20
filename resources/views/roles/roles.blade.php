<x-layouts.app title="Administrar roles" meta-description="Pagina de administracion de roles"> <!-- Para las etiquetas se usa kebab-case y para componentes camelCase, Laravel lo interpreta solo-->
    <div class="container mt-3 mb-4">
        <h1>Administrar roles</h1>
    </div>
    <div class="container">
        <div class="container d-md-flex justify-content-md-end mb-4">
            <a class="btn btn-outline-success my-2 my-sm-0" href="{{ route('roles.create')}}">Nuevo rol</a><br>
        </div>
        <table class="table table-bordered table-striped">
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
                            <a class="btn btn-primary" href="{{ route('roles.show', $role) }}">Ver rol</a>
                            <a class="btn btn-warning" href="{{ route('roles.edit', $role) }}">Editar</a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$role->id}}">Eliminar</button>
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