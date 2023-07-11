<x-layouts.app title="Administrar cuenta" meta-description="Pagina de administracion de la cuenta"> <!-- Para las etiquetas se usa kebab-case y para componentes camelCase, Laravel lo interpreta solo-->
    <div class="container mt-3">
        <h1>Administrar cuenta: {{ Auth::user()->usuario }}</h1>
        <label>Miembro de la plataforma desde: {{ Auth::user()->created_at->format('d-m-Y')}}</label>
        <div class="d-flex align-items-center">
            <label class="mr-3">Usuario: {{ Auth::user()->usuario}}</label>
            <div class="my-3">
                <a href="#"><i class="fa-regular fa-pen-to-square fa-2xl"></i></a>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <label class="mr-3">Email: {{ Auth::user()->email }}</label>
            <div class="my-3">
                <a href="{{ route('usuario.changeemail')}}"><i class="fa-regular fa-pen-to-square fa-2xl"></i></a>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <label class="mr-3">Contraseña:   ••••••••••••</label>
            <div class="my-3">
                <a href="{{ route('usuario.changepassword') }}"><i class="fa-regular fa-pen-to-square fa-2xl"></i></a>
            </div>
        </div>
        <a class="btn btn-warning" href="{{ Session::get('urlAnterior') }}"><i class="fa-solid fa-circle-arrow-left"></i> Regresar</a>
    </div>
</x-layout>