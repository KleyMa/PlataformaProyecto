<x-layouts.app title="Nueva bitacora" meta-description="Pagina de creacion de bitacora"> <!-- Para las etiquetas se usa kebab-case y para componentes camelCase, Laravel lo interpreta solo-->
    <div class="container">
        <h1>Editar bitacora</h1>
        <a class="btn btn-warning btn-lg btn-block my-2 my-sm-0" href="{{ Session::get('urlAnterior') }}"><i class="fa-solid fa-circle-arrow-left"></i> Regresar</a><br>
        <form action="{{ route('bitacoras.update', $bitacora) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PATCH')
            <div class="container d-md-flex justify-content-md-end">
                <div class="form-group">
                    <label for="bitacora_fisica">Bitacora en fisico:</label>
                    <input type="file" class="form-control-file" name="bitacora_fisica" id="bitacora_fisica" accept=".jpg, .png, .pdf">
                    @error('archivo')
                        <small style="color:red"> {{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha de servicio:</label><br>
                <input type="date" name="fecha" id="fecha" value="{{ old('fecha', $bitacora->fecha) }}">
                @error('fecha')
                    <small style="color:red"> {{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="numero_servicio">Numero de servicio</label>
                <input value="{{ old('numero_servicio', $bitacora->numero_servicio) }}" name="numero_servicio" type="text" class="form-control" id="numero_servicio" placeholder="Ingrese el numero de servicio de la bitacora." >
                @error('numero_servicio')
                    <small style="color:red"> {{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="equipo">Equipo</label>
                <input value="{{ old('equipo', $bitacora->equipo) }}" name="equipo" type="text" class="form-control" id="equipo" placeholder="Ingrese el nombre del equipo." >
                @error('equipo')
                    <small style="color:red"> {{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="numero_de_serie">Numero de serie</label>
                <input value="{{ old('numero_de_serie', $bitacora->numero_de_serie) }}" name="numero_de_serie" type="text" class="form-control" id="numero_de_serie" placeholder="Ingrese el numero de serie del equipo." >
                @error('numero_de_serie')
                    <small style="color:red"> {{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="modalidad">Modalidad</label>
                <input value="{{ old('modalidad', $bitacora->modalidad) }}" name="modalidad" type="text" class="form-control" id="modalidad" placeholder="Ingrese la modalidad." >
                @error('modalidad')
                    <small style="color:red"> {{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="descripcion_falla">Descripcion de falla</label>
                <input value="{{ old('descripcion_falla', $bitacora->descripcion_falla) }}" name="descripcion_falla" type="text" class="form-control" id="descripcion_falla" placeholder="Ingrese la falla." >
                @error('descripcion_falla')
                    <small style="color:red"> {{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="tipo_servicio">Tipo de servicio</label>
                <input value="{{ old('tipo_servicio', $bitacora->tipo_servicio) }}" name="tipo_servicio" type="text" class="form-control" id="tipo_servicio" placeholder="Ingrese el tipo de servicio realizado." >
                @error('tipo_servicio')
                    <small style="color:red"> {{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="materiales_utilizados">Materiales utilizados</label>
                <textarea name="materiales_utilizados" type="text" class="form-control" id="materiales_utilizados" rows=3 placeholder="Ingrese los materiales utilizados." >{{old('materiales_utilizados', $bitacora->materiales_utilizados)}}</textarea>
                @error('materiales_utilizados')
                    <small style="color:red"> {{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="trabajo_realizado">Trabajo realizado</label>
                <textarea name="trabajo_realizado" type="text" class="form-control" id="trabajo_realizado" rows=5 placeholder="Ingrese los detalles del trabajo realizado." >{{old('trabajo_realizado', $bitacora->trabajo_realizado)}}</textarea>
                @error('trabajo_realizado')
                    <small style="color:red"> {{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="estatus_operativo">Estatus operativo</label>
                <select name="estatus_operativo" type="text" class="form-control" id="estatus_operativo" placeholder="Ingrese el estatus operativo del equipo">
                    <option value="" disabled>Seleccione una opción</option>
                    <option value="Funcional" @if($bitacora->estatus_operativo == 'Funcional') selected @endif>Funcional</option>
                    <option value="No funcional" @if($bitacora->estatus_operativo == 'No funcional') selected @endif>No funcional</option>
                </select>
                @error('estatus_operativo')
                    <small style="color:red">{{ $message }}</small>
                @enderror
            </div>    
            <div class="form-group">
                <p>Trabajo terminado</p>
                <label for="trabajo_terminado_si">
                    <input type="radio" value="Si" id="trabajo_terminado_si" name="trabajo_terminado" @if($bitacora->trabajo_terminado == 'Si') checked @endif> Si
                </label>
                <label for="trabajo_terminado_no">
                    <input type="radio" value="No" id="trabajo_terminado_no" name="trabajo_terminado" @if($bitacora->trabajo_terminado == 'No') checked @endif> No
                </label>
                @error('trabajo_terminado')
                    <small style="color:red">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-upload"></i> Subir</button>
        </form>
    </div>
</x-layout>