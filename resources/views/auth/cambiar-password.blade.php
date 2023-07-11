<x-layouts.app title="Cambiar contraseña" meta-description="Página de cambio de contraseña">
    <div class="container">
        <div class="mb-5">
            <h1>Cambiar contraseña</h1>
        </div>
        <form action="{{ route('usuario.updatepassword') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputPassword1">Contraseña actual</label>
                <input type="password" class="form-control" name="old_password" value="{{ old('old_password') }}" placeholder="Ingresa la contraseña.">
                @error('old_password')
                <small style="color:red"> {{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nueva contraseña</label>
                <input type="password" class="form-control" name="new_password" value="{{ old('new_password') }}" placeholder="Ingresa la contraseña.">
                @error('new_password')
                <small style="color:red"> {{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Confirmar contraseña</label>
                <input type="password" class="form-control" name="new_password_confirmation" value="{{ old('new_password_confirmation') }}" placeholder="Ingresa nuevamente la contraseña.">
                @error('new_password_confirmation')
                <small style="color:red"> {{ $message }}</small><br>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i> Cambiar contraseña</button>
            <a class="btn btn-warning" href="{{ route('administrarcuenta') }}"><i class="fa-solid fa-circle-arrow-left"></i> Regresar</a>
        </form>
    </div>
</x-layout>