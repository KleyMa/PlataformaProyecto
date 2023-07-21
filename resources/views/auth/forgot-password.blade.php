<x-layouts.app title="Iniciar sesion" meta-description="Pagina de inicio de sesion"> <!-- Para las etiquetas se usa kebab-case y para componentes camelCase, Laravel lo interpreta solo-->
    <div class="container">
        <div class="">
            <h1>Recuperar contraseña</h1><br>
        </div>
        <form action="{{ route('password.email')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Ingresa tu email.">
            </div>
            <div class="form-group">
              @error('email')
                <small style="color:red"> {{ $message }}</small>
            @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block"><i class="fa-solid fa-envelope"></i> Enviar correo</button>
            <a class="btn btn-warning my-2 my-sm-0 btn-block" href="{{ route('login') }}"><i class="fa-solid fa-circle-arrow-left"></i> Regresar</a><br>
          </form>
    </div>
</x-layout>