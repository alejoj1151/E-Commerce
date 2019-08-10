
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Estilos -->
        <title>E-Commerce - @yield('title')</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.min.css')}}" /> 

        <link rel="stylesheet" href="{{url('css/estilos.css')}}"/>
        <script src="{{url('js/jquery.min.js')}}"></script>
        <script src="{{url('js/popper.min.js')}}"></script>
        <script src="{{url('js/bootstrap.min.js')}}"></script>
        <script type="text/javascript">
            $(window).on('load', function () { 
                $(".loader-page").css(
                    {
                        visibility:"hidden",opacity:"0"
                    })
                });
        </script>
    </head>

    <body>
        <div class="loader-page"></div>    
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="mr-1">
                        <img src="https://cdn.pixabay.com/photo/2015/08/22/00/29/ecommerce-899962_960_720.png" height="60" width="60" alt="">
                </div>
                <a class="navbar-brand" href="/productos">e-Commerce</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                       
                    <i class="fas fa-search" aria-hidden="true"></i>
                    <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="¿Qué estás buscando?" aria-label="Search">
                             
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                                </li>
                            @endif
                        @else
                            <div class="mr-1">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png" height="42" width="42" alt="">
                            </div>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{Auth::user()->name}}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/publicaciones">Mis publicaciones</a>
                                    <a class="dropdown-item" href="#">Ventas</a>
                                    <a class="dropdown-item" href="#">Configuración</a>
                                    <!-- Ruta cerrar cesión -->
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        Cerrar sesión
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="col">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
                
                <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/productos">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/productos/create">Crear Producto</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Categorias</a>
                            <!-- LISTA CATEGORIAS -->
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Tecnología</a>
                                <a class="dropdown-item" href="#">Ropa</a>
                                <a class="dropdown-item" href="#">Calzado</a>
                                <a class="dropdown-item" href="#">Hogar</a>
                            </div>
                        </li>
                    </ul>
               
            </nav> 
        </div>
        <!-- Contenido -->
        @yield('content') 
        </div>
    </body>
</html>
