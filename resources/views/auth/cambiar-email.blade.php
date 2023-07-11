<x-layouts.app title="Cambiar email" meta-description="Página de cambio de email">
    <div class="container">
        <div class="mb-5">
            <h1>Cambiar email</h1>
        </div>
        <form action="{{ route('usuario.updateemail') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Nuevo email</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" placeholder="Ingresa el nuevo email." value="{{ old('email') }}">
                @error('email')
                    <small style="color:red"> {{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Ingrese su contraseña</label>
                <input type="password" class="form-control" id="password" name="password" value="{{ old('old_password') }}" placeholder="Ingrese su contraseña.">
                @error('password')
                <small style="color:red"> {{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i> Cambiar email</button>
            <a class="btn btn-warning" href="{{ route('administrarcuenta') }}"><i class="fa-solid fa-circle-arrow-left"></i> Regresar</a>
        </form>
    </div>
</x-layout>