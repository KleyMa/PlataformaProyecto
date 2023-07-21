<x-layouts.app title="Bienvenido" meta-description="Pagina de bienvenida"> <!-- Para las etiquetas se usa kebab-case y para componentes camelCase, Laravel lo interpreta solo-->
    <div class="container mb-3">
        <h1>Bienvenido, {{Auth::user()->usuario}}.</h1>
    </div>
    @canany(['inventario', 'bitacoras', 'manuales', 'imagenes'])
    <div class="container mt-3">
        <div class="card-group">
            @can('inventario')
            <div class="card">
            <img class="card-img-top" style="height: 400px; width:100%;" src="{{Storage::url('/imagenes/inventario.png')}}" alt="Inventario">
            <div class="card-body">
                <h5 class="card-title">Acceder al inventario</h5>
                <a class="btn btn-primary btn-block" href="{{ route('inventario') }}">Inventario</a>
            </div>
            </div>
            @endcan
            @can('bitacoras')
            <div class="card">
            <img class="card-img-top" style="height: 400px; width:100%;" src="{{Storage::url('/imagenes/bitacora.png')}}" alt="Bitacoras">
            <div class="card-body">
                <h5 class="card-title">Acceder a las bitacoras</h5>
                <a class="btn btn-primary btn-block" href="{{ route('bitacoras.index') }}">Bitacoras</a>
            </div>
            </div>
            @endcan
            @canany(['manuales', 'imagenes'])
            <div class="card">
            <img class="card-img-top" style="height: 400px; width:100%px;" src="{{Storage::url('/imagenes/recursos.png')}}" alt="Recursos">
            <div class="card-body">
                <h5 class="card-title">Acceder a los recursos</h5>
                @can('manuales')
                <a class="btn btn-primary btn-block" href="{{ route('manuales.index') }}">Manuales</a>
                @endcan
                @can('imagenes')
                <a class="btn btn-primary btn-block" href="{{ route('imagenes.index') }}">Imagenes</a>
                @endcan
            </div>
            </div>
            @endcanany
        </div>
    </div>
    @endcanany
</x-layout>