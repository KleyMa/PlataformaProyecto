<x-layouts.app title="Iniciar sesion" meta-description="Pagina de inicio de sesion"> <!-- Para las etiquetas se usa kebab-case y para componentes camelCase, Laravel lo interpreta solo-->
    <div class="container">
        <div class="mt-4">
            <h1>Iniciar sesion</h1><br>
        </div>
        <form action="{{ route('login')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Usuario</label>
              <input type="text" class="form-control" name="usuario" value="{{ old('usuario') }}" placeholder="Ingresa el nombre de usuario.">
            @error('usuario')
                <small style="color:red"> {{ $message }}</small>
            @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Contraseña</label>
              <input type="password" class="form-control" name="password" value="{{ old('password') }}"placeholder="Ingresa la contraseña.">
                @error('password')
                    <small style="color:red"> {{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <div style="display: flex; justify-content: space-between;">
                    <div><label><input type="checkbox" id="cbox1" name="recuerdame"> Recuerdame</label><br></div>
                    <div><a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a><br></div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar sesion</button>
          </form>
    </div>
</x-layout>