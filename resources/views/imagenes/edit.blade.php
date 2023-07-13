<div class="modal fade" id="modal-update-{{$imagen->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('imagenes.update', $imagen)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar imagen de {{$imagen->equipo}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="imagen_principal">Seleccionar nueva imagen principal:</label>
                    <input type="file" class="form-control-file" id="imagen_principal" name="imagen_principal" accept=".jpg, .png, .gif">
                    @error('imagen_principal')
                        <small style="color:red"> {{ $message }}</small>
                    @enderror
                </div>
                <div class="container mb-4">
                    <label for="descripcion">Descripcion de la imagen:</label>
                    <textarea name="descripcion" id="descripcion" type="text" class="form-control" rows="2" placeholder="Agrega una descripcion a la imagen.">{{old('descripcion', $imagen->descripcion)}}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning">Editar imagen</button>
                </div>
            </div>
        </form>
    </div>
</div>