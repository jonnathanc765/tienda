<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#1565C0" />
    <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="icon shortcut" href="{{ asset('img/logo.jpg') }}">
    <title>Cochonito</title>
</head>
<body>

        <nav>
           
            <div class="nav-wrapper blue darken-4">
                <a href="{{ route('login') }}" class="brand-logo" style="margin-left: 5px;">
                    <i class="fas fa-store"></i>
                    Cochonito
                </a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons"><i class="fas fa-bars"></i></i></a>
                @if (Auth::check())
                <ul class="right hide-on-med-and-down">
                    <li class="@yield('product-nav')"><a href="{{ route('product.index') }}"><i class="fas fa-cart-plus"></i> Productos</a></li>
                    <li class="@yield('cart-nav')"><a href="{{ route('cart.index') }}"><i class="fas fa-file-invoice-dollar"></i> Factura</a></li>
                    <li class="@yield('report-nav')"><a href="collapsible.html"><i class="fas fa-chart-pie"></i> Reportes</a></li>
                    <li><a class="dropdown-trigger" href="#!" data-target="nav-dropdown"><i class="fas fa-user"></i> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}<i class="material-icons right"><i class="fas fa-caret-down"></i></i></a></li>
                </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <ul id="nav-dropdown" class="dropdown-content">
                    <li><a href="#!">Comming Soon</a></li>
                    <li><a href="#!">Comming Soon</a></li>
                    <li class="divider"></li>
                    <li><a class="logout">Cerrar Sesión</a></li>
                </ul>
                <ul class="sidenav" id="mobile-demo">
                        <li><a href="{{ route('product.index') }}"><i class="fas fa-cart-plus"></i> Productos</a></li>
                        <li><a href="{{ route('cart.index') }}"><i class="fas fa-file-invoice-dollar"></i> Factura</a></li>
                        
                </ul>
                @endif
            </div>
        </nav>
        @if (Auth::check())
        <div class="container">
            <nav>
                <div class="nav-wrapper blue darken-3">
                    <form>
                    <div class="input-field">
                        <input id="search" type="search" required>
                        <label class="label-icon" for="search">
                            <i class="material-icons">
                                <i class="fas fa-search"></i>
                            </i></label>
                        <i class="material-icons"><i class="fas fa-times"></i></i>
                    </div>
                    </form>
                </div>
            </nav
        </div>
        @endif


    
    @yield('content')
    



    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
        M.AutoInit();
        $('.logout').click(function() {
            $('#logout-form').submit();
        });
    </script>
    @yield('additional-scripts')
</body>
</html>