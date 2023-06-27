<x-layouts.app title="Administrar cuenta" meta-description="Pagina de administracion de la cuenta"> <!-- Para las etiquetas se usa kebab-case y para componentes camelCase, Laravel lo interpreta solo-->
    <div class="container mt-3">
        <h1>Administrar cuenta: {{ Auth::user()->usuario }}</h1>
        <div style="display: flex; justify-content: end;">
            <div><a href="{{ route('password.request') }}">Cambiar contraseña</a><br></div>
        </div>
    </div>
</x-layout>