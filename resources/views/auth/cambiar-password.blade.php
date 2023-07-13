<div class="modal fade" id="modal-update-password-{{Auth::user()->usuario}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('usuario.updatepassword') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar contraseña</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contraseña actual</label>
                            <input type="password" class="form-control" name="old_password" value="{{ old('old_password') }}" placeholder="Ingresa la contraseña.">
                            @error('old_password')
                            <small style="color:red"> {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nueva contraseña</label>
                            <input type="password" class="form-control" name="new_password" value="{{ old('new_password') }}" placeholder="Ingresa la contraseña.">
                            @error('new_password')
                            <small style="color:red"> {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Confirmar contraseña</label>
                            <input type="password" class="form-control" name="new_password_confirmation" value="{{ old('new_password_confirmation') }}" placeholder="Ingresa nuevamente la contraseña.">
                            @error('new_password_confirmation')
                            <small style="color:red"> {{ $message }}</small><br>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i> Editar contraseña</button>
                </div>
            </div>
        </form>
    </div>
</div>