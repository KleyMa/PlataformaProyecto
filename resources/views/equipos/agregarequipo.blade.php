<x-layouts.app title="Nuevo equipo" meta-description="Agregar un nuevo equipo">
<div class="container">
    <h1>Agregar un nuevo equipo</h1>
    <div class="mt-4 mb-3">
        <a class="btn btn-warning btn-lg btn-block my-2 my-sm-0" href="{{ route('inventario') }}"><i class="fa-solid fa-circle-arrow-left"></i> Regresar</a>
    </div>
    <form action="{{ route('equipos.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container d-md-flex justify-content-md-end">
            <div class="form-group">
                <label for="imagen_principal">Seleccionar imagen principal:</label>
                <input type="file" class="form-control-file" name="imagen_principal" id="imagen_principal" accept=".jpg, .png, .gif">
                @error('archivo')
                    <small style="color:red"> {{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input value="{{ old('nombre') }}" name="nombre" type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre del equipo." >
            @error('nombre')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="tipo_de_equipo">Tipo de equipo</label>
            <input value="{{ old('tipo_de_equipo') }}" name="tipo_de_equipo" type="text" class="form-control" id="tipo_de_equipo" placeholder="Ingrese el tipo de equipo, definido por su naturaleza." >
            @error('tipo_de_equipo')
                <small style="color:red"> {{ $message }}</small>
            @enderror
            <div id="tipo_de_equipo_lista"></div>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea name="descripcion" type="text" class="form-control" id="descripcion" rows=3 placeholder="Ingrese una descripcion basica y fundamental del equipo." >{{old('descripcion')}}</textarea>
            @error('descripcion')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="fabricante">Fabricante</label>
            <input value="{{ old('fabricante') }}" name="fabricante" type="text" class="form-control" id="fabricante" placeholder="Ingrese el fabricante del equipo." >
            @error('fabricante')
                <small style="color:red"> {{ $message }}</small>
            @enderror        
        </div>
        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input value="{{ old('modelo') }}" name="modelo" type="text" class="form-control" id="modelo" placeholder="Ingrese el modelo del equipo" >
            @error('modelo')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="numero_de_serie">Numero de serie</label>
            <input value="{{ old('numero_de_serie') }}" name="numero_de_serie" type="text" class="form-control" id="numero_de_serie" placeholder="Ingrese el numero de serie del equipo." >
            @error('numero_de_serie')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="ubicacion">Ubicacion</label>
            <input value="{{ old('ubicacion') }}" name="ubicacion" type="text" class="form-control" id="ubicacion" placeholder="Ingrese la ubicacion actual del equipo." >
            @error('ubicacion')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="estatus_operativo">Estatus operativo</label>
            <select name="estatus_operativo" type="text" class="form-control" id="estatus_operativo" placeholder="Ingrese el estatus operativo del equipo." >
                <option value="" disabled selected>Seleccione una opción</option>
                <option>Funcional</option>
                <option>No funcional</option>
              </select>
              @error('estatus_operativo')
                <small style="color:red"> {{ $message }}</small>
              @enderror
        </div>
        <div class="form-group">
            <label for="alimentacion_electrica">Alimentacion electrica</label>
            <input value="{{ old('alimentacion_electrica')}}" name="alimentacion_electrica" type="text" class="form-control" id="alimentacion_electrica" placeholder="Ingrese la alimentacion electrica que recibe el equipo." >
            @error('alimentacion_electrica')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="requisitos_de_funcionamiento">Requisitos de funcionamiento</label>
            <textarea name="requisitos_de_funcionamiento" type="text" class="form-control" id="requisitos_de_funcionamiento" rows=3 placeholder="Ingrese los requisitos fundamentales del equipo." >{{old('requisitos_de_funcionamiento')}}</textarea>
            @error('requisitos_de_funcionamiento')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="proveedor_de_mantenimiento">Proveedor de mantenimiento</label>
            <input value="{{ old('proveedor_de_mantenimiento') }}" name="proveedor_de_mantenimiento" type="text" class="form-control" id="proveedor_de_mantenimiento" placeholder="Ingrese el proveedor de mantenimiento del equipo." >
            @error('proveedor_de_mantenimiento')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="proveedor_de_compra">Proveedor de compra</label>
            <input value="{{ old('proveedor_de_compra') }}" name="proveedor_de_compra" type="text" class="form-control" id="proveedor_de_compra" placeholder="Ingrese el proveedor de compra del equipo." >
            @error('proveedor_de_compra')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="manual">Subir manual:</label>
            <input type="file" class="form-control-file" id="manual" name="manual">
            @error('archivo')
                <small style="color:red"> {{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Subir</button>
        @include('autocompletado-equipo')
    </form>
    <a class="btn btn-outline-warning my-2 my-sm-0" href="{{ route('inventario') }}">Regresar</a><br>
</div>
</x-layouts.app>
