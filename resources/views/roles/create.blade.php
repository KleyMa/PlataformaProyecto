<x-layouts.app title="Nuevo rol" meta-description="Crear un nuevo rol"> <!-- Para las etiquetas se usa kebab-case y para componentes camelCase, Laravel lo interpreta solo-->
    <div class="container mt-3">
        <h1>Crear un nuevo rol</h1>
    </div>
    <div class="container">
        <form action="{{ route('roles.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <div class="mt-3">
                    <label for="exampleInputEmail1">Nombre del rol</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Ingresa el nombre del rol.">
                    @error('name')
                        <small style="color:red"> {{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="mt-3 mb-3">
                <h3>Asignar permisos:</h3>
            </div>
            @foreach($permisos as $permiso)
            <div class="container">
                <label><input type="checkbox" name="permissions[]" value="{{ $permiso->id }}"> {{ $permiso->description}}</label>
            </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Crear rol</button>
        </form>
    </div>
</x-layout>