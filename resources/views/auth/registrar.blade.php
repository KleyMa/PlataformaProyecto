<x-layouts.app title="Registrar usuario" meta-description="Pagina de registro"> <!-- Para las etiquetas se usa kebab-case y para componentes camelCase, Laravel lo interpreta solo-->
    <div class="container">
        <h1>Registrar un nuevo usuario</h1><br>
        <form action="{{ route('registrar')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Usuario</label>
              <input type="text" class="form-control" name="usuario" value="{{ old('usuario') }}" placeholder="Ingresa el nombre de usuario." autofocus="autofocus">
            @error('usuario')
                <small style="color:red"> {{ $message }}</small>
            @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Ingresa el email del usuario." value="{{ old('email') }}">
                @error('email')
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
                <label for="exampleInputPassword1">Confirmar contraseña</label>
                <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Ingresa nuevamente la contraseña.">
                @error('password_confirmation')
                    <small style="color:red"> {{ $message }}</small><br>
                @enderror  
            </div>
            @foreach($roles as $role)
                <label><input type="radio" value="{{$role->id}}" name="roles[]"> {{$role->name}}</label><br>
            @endforeach
            <button type="submit" class="btn btn-primary">Registrar</button>
          </form>
    </div>
</x-layout>