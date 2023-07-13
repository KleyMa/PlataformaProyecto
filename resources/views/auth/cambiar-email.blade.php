<div class="modal fade" id="modal-update-email-{{Auth::user()->usuario}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('usuario.updateemail') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="form-group">
                            <label for="email">Nuevo email</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" placeholder="Ingresa el nuevo email." value="{{ old('email') }}">
                            @error('email')
                                <small style="color:red"> {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Ingrese su contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" value="{{ old('old_password') }}" placeholder="Ingrese su contraseña.">
                            @error('password')
                            <small style="color:red"> {{ $message }}</small>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i> Editar email</button>
                </div>
            </div>
        </form>
    </div>
</div>