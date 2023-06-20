<x-layouts.app title="Iniciar sesion" meta-description="Pagina de inicio de sesion"> <!-- Para las etiquetas se usa kebab-case y para componentes camelCase, Laravel lo interpreta solo-->
    <div class="container">
        <div class="mt-4">
            <h1>Recuperar contraseña</h1><br>
        </div>
        <form action="{{ route('login')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="text" class="form-control" name="usuario" value="{{ old('usuario') }}" placeholder="Ingresa el nombre de usuario.">
            @error('usuario')
                <small style="color:red"> {{ $message }}</small>
            @enderror
            <button type="submit" class="btn btn-primary">Iniciar sesion</button>
          </form>
    </div>
</x-layout>