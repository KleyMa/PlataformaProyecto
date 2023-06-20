<x-layouts.app title="Editar usuario" meta-description="Pagina de edicion de usuario"> <!-- Para las etiquetas se usa kebab-case y para componentes camelCase, Laravel lo interpreta solo-->
    <div class="container">
        <h1>Editar usuario</h1><br>
        <form action="{{ route('usuarios.update', $usuario)}}" method="POST">
            @csrf @method('PATCH')
            <div class="form-group">
              <label for="exampleInputEmail1">Usuario</label>
              <input type="text" class="form-control" name="usuario" value="{{ old('usuario', $usuario->usuario) }}" placeholder="Ingresa el nombre de usuario." autofocus="autofocus">
            @error('usuario')
                <small style="color:red"> {{ $message }}</small>
            @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Ingresa el email del usuario." value="{{ old('email', $usuario->email) }}">
                @error('email')
                    <small style="color:red"> {{ $message }}</small>
                @enderror
            </div>
            @foreach($roles as $role)
                <label><input type="radio" value="{{$role->id}}" name="roles[]" @if($usuario->hasRole($role->name)) checked @endif> {{$role->name}}</label><br>
            @endforeach
            <button type="submit" class="btn btn-primary">Editar</button>
          </form>
    </div>
</x-layout>