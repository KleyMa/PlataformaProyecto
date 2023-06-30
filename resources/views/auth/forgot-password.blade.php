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
            <div class="container">
              <div class="" style="width: 50%">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-envelope"></i> Enviar correo</button>
              </div>
              <div class="mt-3" style="width: 50%">
                <a class="btn btn-warning my-2 my-sm-0" href="{{ route('login') }}"><i class="fa-solid fa-circle-arrow-left"></i> Regresar</a><br>
              </div>
            </div>
          </form>
    </div>
</x-layout>