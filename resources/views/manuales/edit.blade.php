<div class="modal fade" id="modal-update-{{$manual->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('manuales.update', $manual)}}" method="POST" enctype="multipart/form-data">
            @csrf @method('PATCH')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar manual de {{$manual->equipo}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <label>Subir nuevo manual:</label>
                        <input type="file" class="form-control-file" name="manual" accept=".pdf">
                        @error('archivo')
                            <small style="color:red"> {{ $message }}</small>
                        @enderror
                        <label for="descripcion" class="mt-3">Descripcion</label>
                        <input value="{{ old('descripcion', $manual->descripcion) }}" name="descripcion" type="text" class="form-control" id="descripcion" placeholder="Agregue una descripcion al manual." >
                        @error('descripcion')
                            <small style="color:red"> {{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning">Editar manual</button>
                </div>
            </div>
        </form>
    </div>
</div>