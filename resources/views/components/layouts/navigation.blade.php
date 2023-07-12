<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    @auth
    <a class="navbar-brand mr-4" href="/">
        <i class="fa-thin fa fa-house"></i>
    </a>
    <a class="navbar-brand dropdown-toggle" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"> Hola, {{ Auth::user()->usuario }} </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
        <a class="dropdown-item" href="{{ route('administrarcuenta') }}"><i class="fa-solid fa-user-gear"></i> Administrar cuenta</a>
        <div class="dropdown-divider"></div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="dropdown-item" href="{{ route('logout') }}"><i class="fa-solid fa-power-off"></i> Cerrar sesión</button>
        </form>
    </div>
    @endauth
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @can('inventario')
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('inventario') }}"><i class="fa-solid fa-boxes-stacked fa-lg"></i> Inventario <span class="sr-only">(current)</span></a>
            </li>
            @endcan
            @can('bitacoras')
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('bitacoras.index') }}"><i class="fa-regular fa-file-lines fa-lg"></i> Bitacoras</a>
            </li>
            @endcan
            @auth
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-toolbox fa-lg"></i> Recursos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @can('manuales')
                        <a class="dropdown-item" href="{{ route('manuales.index') }}"><i class="fa-solid fa-file-pdf fa-lg"></i> Manuales</a>
                        <div class="dropdown-divider"></div>
                    @endcan
                    @can('imagenes')
                        <a class="dropdown-item" href="{{ route('imagenes.index') }}"><i class="fa-solid fa-images fa-lg"></i> Imagenes</a>
                        <div class="dropdown-divider"></div>
                    @endcan
                    @can('verQRs')
                        <a class="dropdown-item" href="{{ route('imagenes.index') }}"><i class="fa-solid fa-qrcode fa-lg"></i> QR</a>
                    @endcan
                </div>
            </li> <!-- Cerrar la etiqueta li del menú desplegable "Recursos" -->
            @endauth
            <li class="nav-item dropdown"> <!-- Abrir una nueva etiqueta li para el menú desplegable "Administrar usuarios" -->
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-users-gear fa-lg"></i> Administrar usuarios
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                    @can('usuarios')
                    <a class="dropdown-item" href="{{ route('usuarios.index') }}"><i class="fa-solid fa-address-book fa-lg"></i> Administrar usuarios</a>
                    @endcan
                    @can('roles')
                    <a class="dropdown-item" href="{{ route('roles.index') }}"><i class="fa-solid fa-user-tie fa-lg"></i> Administrar roles</a>
                    @endcan
                    @can('RegistrarUsuario')
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('registrar') }}"><i class="fa-solid fa-user-plus fa-lg"></i> Registrar usuario</a>
                    @endcan
                </div>
            </li> <!-- Cerrar la etiqueta li del menú desplegable "Administrar usuarios" -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('estadisticas.index') }}"><i class="fa-solid fa-chart-line fa-lg"></i> Estadisticas <span class="sr-only">(current)</span></a>
            </li>
            @can('estadisticas')

            @endcan
        </ul>
        @auth
        @php
    // Obtiene el nombre de la ruta actual
    $currentRoute = request()->route()->getName();
    // Define los datos específicos de cada formulario según la ruta actual
    switch ($currentRoute) {
        case 'inventario':
        case 'inventario.buscar':
            $formRoute = 'inventario.buscar';
            $formPlaceholder = 'Buscar un equipo.';
            $formName = 'nombre';
            break;
        case 'bitacoras.index':
        case 'bitacoras.buscar':
            $formRoute = 'bitacoras.buscar';
            $formPlaceholder = 'Buscar una bitacora.';
            $formName = 'nombre';
            break;
        case 'usuarios.index':
        case 'usuarios.buscar':
            $formRoute = 'usuarios.buscar';
            $formPlaceholder = 'Buscar un usuario.';
            $formName = 'usuario';
            break;
        case 'roles.index':
        case 'roles.buscar':
            $formRoute = 'roles.buscar';
            $formPlaceholder = 'Buscar un rol.';
            $formName = 'name';
            break;
        case 'equipos.inactivos':
        case 'equipos.inactivos.buscar':
            $formRoute = 'equipos.inactivos.buscar';
            $formPlaceholder = 'Buscar un inactivo.';
            $formName = 'nombre';
            break;
        default:
            $formRoute = '';
            $formPlaceholder = '';
            $formName = '';
            break;
    }
@endphp

@if(!empty($formRoute))
    <form class="form-inline my-2 my-lg-0" action="{{ route($formRoute) }}" method="GET">
        <input class="form-control mr-sm-2" type="search" placeholder="{{ $formPlaceholder }}" aria-label="Search" name="{{ $formName }}">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
    </form>
@endif
  </div>
  @endauth
</nav>
