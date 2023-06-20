<x-layouts.app :title="$equipo->nombre"> <!-- Los dos puntos permiten que se ejecute php aqui dentro-->
    <div class="container">
    <h1>Editar {{$equipo->nombre}}</h1>
    <div class="container d-md-flex justify-content-md-end">
        <a class="btn btn-warning" href="{{ route('inventario') }}">Regresar</a>
    </div>
    <form action="{{ route('equipos.update', $equipo)}}" method="POST" enctype="multipart/form-data">
        @csrf @method('PATCH')
        <div class="container d-md-flex justify-content-md-end">
            <div class="form-group">
                <label>Seleccionar imagen principal:</label>
                <input type="file" class="form-control-file" name="imagen_principal" accept=".jpg, .png, .gif">
                @error('imagen_principal')
                    <small style="color:red"> {{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Nombre</label>
            <input value=" {{ old('nombre', $equipo->nombre) }}" name="nombre" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese el nombre del equipo." >
            @error('nombre')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Tipo de equipo</label>
            <input value=" {{ old('tipo_de_equipo', $equipo->tipo_de_equipo )}}" name="tipo_de_equipo" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese el tipo de equipo, definido por su naturaleza." >
            @error('tipo_de_equipo')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Descripcion</label>
            <textarea name="descripcion" type="text" class="form-control" id="formGroupExampleInput2" rows=3 placeholder="Ingrese una descripcion basica y fundamental del equipo." >{{old('descripcion', $equipo->descripcion)}}</textarea>
            @error('descripcion')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Fabricante</label>
            <input value=" {{ old('fabricante', $equipo->fabricante) }}" name="fabricante" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese el fabricante del equipo." >
            @error('fabricante')
                <small style="color:red"> {{ $message }}</small>
            @enderror        
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Modelo</label>
            <input value=" {{ old('modelo', $equipo->modelo) }}" name="modelo" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese el modelo del equipo" >
            @error('modelo')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Numero de serie</label>
            <input value=" {{ old('numero_de_serie', $equipo->numero_de_serie )}}" name="numero_de_serie" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese el numero de serie del equipo." >
            @error('numero_de_serie')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Ubicacion</label>
            <input value=" {{ old('ubicacion', $equipo->ubicacion )}}" name="ubicacion" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese la ubicacion actual del equipo." >
            @error('ubicacion')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Estatus operativo</label>
            <select value="{{ old('estatus_operativo', $equipo->estatus_operativo) }}" name="estatus_operativo" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese el estatus operativo del equipo." >
                <option disabled >Seleccione una opción</option>
                <option @if ($equipo->estatus_operativo === 'Funcional') selected @endif>Funcional</option>
                <option @if ($equipo->estatus_operativo === 'No funcional') selected @endif>No funcional</option>
              </select>
              @error('estatus_operativo')
                <small style="color:red"> {{ $message }}</small>
              @enderror
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Alimentacion electrica</label>
            <input value=" {{ old('alimentacion_electrica', $equipo->alimentacion_electrica) }}" name="alimentacion_electrica" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese la alimentacion electrica que recibe el equipo." >
            @error('alimentacion_electrica')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Requisitos de funcionamiento</label>
            <textarea name="requisitos_de_funcionamiento" type="text" class="form-control" id="formGroupExampleInput2" rows=3 placeholder="Ingrese los requisitos fundamentales del equipo." >{{ old('requisitos_de_funcionamiento', $equipo->requisitos_de_funcionamiento) }}</textarea>
            @error('requisitos_de_funcionamiento')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Proveedor de mantenimiento</label>
            <input value=" {{ old('proveedor_de_mantenimiento', $equipo->proveedor_de_mantenimiento) }}" name="proveedor_de_mantenimiento" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese el proveedor de mantenimiento del equipo." >
            @error('proveedor_de_mantenimiento')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Proveedor de compra</label>
            <input value=" {{ old('proveedor_de_compra', $equipo->proveedor_de_compra) }}" name="proveedor_de_compra" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese el proveedor de compra del equipo." >
            @error('proveedor_de_compra')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Subir manual:</label>
            <input type="file" class="form-control-file" name="manual" accept=".pdf">
            @error('archivo')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Subir</button>
    </form>
    <div class="container d-md-flex justify-content-md-end">
        <a class="btn btn-warning" href="{{ route('inventario') }}">Regresar</a>
    </div>
    </div>
</x-layouts.app>