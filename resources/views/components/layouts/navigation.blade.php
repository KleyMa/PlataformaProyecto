<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    @auth
    <a class="navbar-brand dropdown-toggle" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Bienvenido, {{ Auth::user()->usuario }}</a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
        <a class="dropdown-item" href="{{ route('registrar') }}">Administrar cuenta</a>
        <div class="dropdown-divider"></div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="dropdown-item" href="{{ route('logout') }}">Cerrar sesión</button>
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
                <a class="nav-link" href="{{ route('inventario') }}">Inventario <span class="sr-only">(current)</span></a>
            </li>
            @endcan
            @can('bitacoras')
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('bitacoras.index') }}">Bitacoras</a>
            </li>
            @endcan
            @auth
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Recursos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('manuales.index') }}">Manuales</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('imagenes.index') }}">Imagenes</a>
                </div>
            </li> <!-- Cerrar la etiqueta li del menú desplegable "Recursos" -->
            @endauth
            @can('usuarios')
            <li class="nav-item dropdown"> <!-- Abrir una nueva etiqueta li para el menú desplegable "Administrar usuarios" -->
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Administrar usuarios
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                    <a class="dropdown-item" href="{{ route('usuarios.index') }}">Administrar usuarios</a>
                    <a class="dropdown-item" href="{{ route('roles.index') }}">Administrar roles</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('registrar') }}">Registrar usuario</a>
                </div>
            </li> <!-- Cerrar la etiqueta li del menú desplegable "Administrar usuarios" -->
            @endcan
        </ul>
        @auth
        @if(request()->routeIs('inventario') || request()->routeIs('inventario.buscar'))
            <form class="form-inline my-2 my-lg-0" action="{{route('inventario.buscar')}}" method="GET">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar un equipo." aria-label="Search" name="nombre">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        @elseif(request()->routeIs('bitacoras.index') || request()->routeIs('bitacoras.buscar'))
            <form class="form-inline my-2 my-lg-0" action="{{route('bitacoras.buscar')}}" method="GET">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar una bitacora." aria-label="Search" name="nombre">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        @elseif(request()->routeIs('usuarios.index') || request()->routeIs('usuarios.buscar'))
            <form class="form-inline my-2 my-lg-0" action="{{route('usuarios.buscar')}}" method="GET">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar un usuario." aria-label="Search" name="usuario">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        @elseif(request()->routeIs('roles.index') || request()->routeIs('roles.buscar'))
            <form class="form-inline my-2 my-lg-0" action="{{route('roles.buscar')}}" method="GET">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar un rol." aria-label="Search" name="name">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        @endif
      @endauth
  </div>
</nav>
