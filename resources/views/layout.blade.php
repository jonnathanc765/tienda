<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="icon shortcut" href="{{ asset('img/logo.jpg') }}">
    <title>Tienda</title>
</head>
<body>

        <nav>
            <div class="nav-wrapper cyan darken-2">
                <a href="#" class="brand-logo center">
                    <i class="fas fa-store"></i>
                    Tienda
                </a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons"><i class="fas fa-bars"></i></i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="{{ route('product.index') }}"><i class="fas fa-cart-plus"></i> Productos</a></li>
                    <li><a href="badges.html">Components</a></li>
                    <li><a href="collapsible.html">Javascript</a></li>
                    <li><a href="mobile.html">Mobile</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <nav>
                <div class="nav-wrapper cyan darken-1">
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

        <ul class="sidenav" id="mobile-demo">
            <li><a href="{{ route('product.index') }}">Productos</a></li>
            <li><a href="badges.html">Components</a></li>
            <li><a href="collapsible.html">Javascript</a></li>
            <li><a href="mobile.html">Mobile</a></li>
        </ul>

    
    @yield('content')
    



    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>
        M.AutoInit();
    </script>
    @yield('additional-scripts')
</body>
</html>