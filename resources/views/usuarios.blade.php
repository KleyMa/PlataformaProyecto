<x-layouts.app title="Usuarios" meta-description="Pagina de administracion de usuarios"> <!-- Para las etiquetas se usa kebab-case y para componentes camelCase, Laravel lo interpreta solo-->
    <div class="container">
        <h1>Usuarios</h1>
    </div>
    <div class="container">
        <div class="container d-md-flex justify-content-md-end mb-4">
          <a class="btn btn-outline-success my-2 my-sm-0" href="{{ route('registrar')}}">Nuevo usuario</a><br>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
              <tr>
                <th class="col-1 text-center">ID</th>
                <th class="col-2 text-center">Usuario</th>
                <th class="col-2 text-center">Email</th>
                <th class="col-1 text-center">Rol</th>
                <th class="col-1 text-center">Administrar</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($usuarios as $usuario)
              <tr>
                <th class="text-center">{{$usuario->id}}</td>
                <td class="text-center">{{$usuario->usuario}}</td>
                <td class="text-center">{{$usuario->email}}</td>
                <td class="text-center">
                    @foreach ($roles as $rol)
                        @if ($usuario->hasRole($rol->name))
                            {{ $rol->name }}
                        @endif
                    @endforeach
                </td>
                <td class="text-center">
                    <div class="container">
                        <div class="row">
                          <div class="col">
                            <div class="btn-group">
                              <a class="btn btn-primary" href="{{ route('usuarios.show', $usuario) }}">Ver usuario</a>
                              <a class="btn btn-warning" href="{{ route('usuarios.edit', $usuario) }}">Editar</a>
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$usuario->id}}">Eliminar</button>
                            </div>
                          </div>
                        </div>
                      </div>
                </td>
              </tr>
            @include('usuarios.delete')
            @endforeach
            </tbody>
          </table>     
    </div> 
</x-layout>