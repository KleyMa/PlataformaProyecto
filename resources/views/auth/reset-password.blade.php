<x-layouts.app title="Cambiar contraseña" meta-description="Página de registro">
    <div class="container">
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Ingresa el email del usuario." value="{{ old('email') }}">
                @error('email')
                <small style="color:red"> {{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Contraseña</label>
                <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Ingresa la contraseña.">
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
            <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
        </form>
    </div>
</x-layout>