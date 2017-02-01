<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title') | Bienal del arte</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('img/faviconbienal.png') }}" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- jquery CDN -->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/bienalArte.css')}}">
        @yield('resources')  

    </head>
    <body id="app-layout">
        <div id="cargando">
            <img src="{{ URL::asset('img/cargando.gif') }}">
        </div>
        <nav class="navbar navbar-default navbar-static-top navbienal">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ URL::asset('img/logo_bienal.png') }}">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="content">
                @yield('content')
            </div>
        </div>
         <div class="row" id="rowFooter">
            <div class="col-md-4 centerdiv">
                <img id="imgFooter" src="{{URL::asset('img/logofooter.jpg')}}">
            </div>
            <div class="col-md-4">
                <p id="pFooter">Esta Bienal internacional de arte Neosurrealista fue creada el 13 de abril de 2010 y registrada en Bogotá Colombia. Por el artista Colombiano Ricardo pulido. Creador y fundador del movimiento Neosurrealista y pionero del Neosurrealismo en Colombia el 22 de diciembre de 2016.</p>
                <!--<footer></footer>-->
            </div>
            <div class="col-md-4">
                <footer id="copyrigth">© 2017 Todos los derechos reservados | Sitio Diseñado por Innclod</footer>
            </div>
        </div>
    </body>
    @yield('scripts')
</html>
