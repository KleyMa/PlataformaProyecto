<x-layouts.app title="Nuevo equipo" meta-description="Agregar un nuevo equipo">
<div class="container">
    <h1>Agregar un nuevo equipo</h1>
    <div class="container d-md-flex justify-content-md-end">
        <a class="btn btn-warning" href="{{ route('inventario') }}">Regresar</a>
    </div>
    <form action="{{ route('equipos.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container d-md-flex justify-content-md-end">
            <div class="form-group">
                <label>Seleccionar imagen principal:</label>
                <input type="file" class="form-control-file" name="imagen_principal" accept=".jpg, .png, .gif">
                @error('archivo')
                    <small style="color:red"> {{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Nombre</label>
            <input value="{{ old('nombre') }}" name="nombre" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese el nombre del equipo." >
            @error('nombre')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Tipo de equipo</label>
            <input value="{{ old('tipo_de_equipo') }}" name="tipo_de_equipo" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese el tipo de equipo, definido por su naturaleza." >
            @error('tipo_de_equipo')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Descripcion</label>
            <textarea name="descripcion" type="text" class="form-control" id="formGroupExampleInput2" rows=3 placeholder="Ingrese una descripcion basica y fundamental del equipo." >{{old('descripcion')}}</textarea>
            @error('descripcion')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Fabricante</label>
            <input value="{{ old('') }}" name="fabricante" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese el fabricante del equipo." >
            @error('fabricante')
                <small style="color:red"> {{ $message }}</small>
            @enderror        
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Modelo</label>
            <input value="{{ old('') }}" name="modelo" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese el modelo del equipo" >
            @error('modelo')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Numero de serie</label>
            <input value="{{ old('') }}" name="numero_de_serie" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese el numero de serie del equipo." >
            @error('numero_de_serie')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Ubicacion</label>
            <input value="{{ old('') }}" name="ubicacion" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese la ubicacion actual del equipo." >
            @error('ubicacion')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Estatus operativo</label>
            <select name="estatus_operativo" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese el estatus operativo del equipo." >
                <option value="" disabled selected>Seleccione una opción</option>
                <option>Funcional</option>
                <option>No funcional</option>
              </select>
              @error('estatus_operativo')
                <small style="color:red"> {{ $message }}</small>
              @enderror
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Alimentacion electrica</label>
            <input value="{{ old('')}}" name="alimentacion_electrica" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese la alimentacion electrica que recibe el equipo." >
            @error('alimentacion_electrica')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Requisitos de funcionamiento</label>
            <textarea name="requisitos_de_funcionamiento" type="text" class="form-control" id="formGroupExampleInput2" rows=3 placeholder="Ingrese los requisitos fundamentales del equipo." ></textarea>
            @error('requisitos_de_funcionamiento')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Proveedor de mantenimiento</label>
            <input value="{{ old('') }}" name="proveedor_de_mantenimiento" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese el proveedor de mantenimiento del equipo." >
            @error('proveedor_de_mantenimiento')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Proveedor de compra</label>
            <input value="{{ old('') }}" name="proveedor_de_compra" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese el proveedor de compra del equipo." >
            @error('proveedor_de_compra')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Subir manual:</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile2">
        </div>
        <button type="submit" class="btn btn-primary">Subir</button>
    </form>
    <a class="btn btn-outline-warning my-2 my-sm-0" href="{{ route('inventario') }}">Regresar</a><br>
</div>
</x-layouts.app>
