<div class="modal fade" id="modal-delete-{{$manual->id}}" tabindex="-1" manual="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" manual="document">
    <form action="{{route('manuales.destroy', $manual)}}" method="POST">
    @csrf @method('DELETE')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Eliminar {{$manual->name}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ¿Deseas eliminar el manual del equipo {{$manual->equipo}}?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Eliminar manual</button>
        </div>
      </div>
    </form>
    </div>
  </div>