<x-layouts.app title="Administrar cuenta" meta-description="Pagina de administracion de la cuenta">
    <div class="container mt-3">
        <h1>Administrar cuenta: {{ Auth::user()->usuario }}</h1>
        <label>Miembro de la plataforma desde: {{ Auth::user()->created_at->format('d-m-Y')}}</label>
        <div class="d-flex align-items-center mt-3">
            <label class="mr-3">Usuario: {{ Auth::user()->usuario}}</label>
        </div>
        <div class="d-flex align-items-center mt-3">
            <label class="mr-3">Email: {{ Auth::user()->email }}</label>
            <div class="my-3">
                <button class="btn btn-warning" data-toggle="modal" data-target="#modal-update-email-{{ Auth::user()->usuario }}"><i class="fa-regular fa-pen-to-square fa-xl"></i></button>
            </div>
        </div>
        <div class="d-flex align-items-center mb-4">
            <label class="mr-3">Contraseña:   ••••••••••••</label>
            <div class="my-3">
                <button class="btn btn-warning" data-toggle="modal" data-target="#modal-update-password-{{ Auth::user()->usuario }}"><i class="fa-regular fa-pen-to-square fa-xl"></i></button>
            </div>
        </div>
        <a class="btn btn-primary" href="{{ Session::get('urlAnterior') }}"><i class="fa-solid fa-circle-arrow-left"></i> Regresar</a>
    </div>
    <div class="container">
        @include('auth.cambiar-email')
    </div>
    <div class="container">
        @include('auth.cambiar-password')
    </div>
</x-layout>