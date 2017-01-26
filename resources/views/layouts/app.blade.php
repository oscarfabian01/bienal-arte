<!DOCTYPE html>
<html lang="en">
    <head>
       
        <title>@yield('title') | Bienal del arte</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('img/faviconbienal.png') }}" />
        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        
        <!-- jquery CDN -->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/bienalArte.css')}}">
        @yield('resources') 


    </head>
    <body id="app-layout">
        <nav class="navbar navbar-default navbar-static-top navbienal">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ URL::asset('img/logo_bienal.png') }}">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/home') }}" class="aBienal">Home</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}" class="aBienal">Acceder</a></li>
                            <li><a href="{{ url('/register') }}" class="aBienal">Registrar</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle aBienal" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('inscripcion.index') }}"><i class="fa fa-btn fa-eye"></i> Inscripciones</a></li>
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Salir</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="content">
                @yield('content')
                <div class="row" id="rowFooter">
                    <div class="col-md-4 centerdiv">
                        <img id="imgFooter" src="{{URL::asset('img/logofooter.jpg')}}">
                    </div>
                    <div class="col-md-8">
                        <blockquote id="blockquoteFooter">
                            <p id="pFooter">Esta Bienal internacional de arte Neosurrealista fue creada el 13 de abril de 2010 y registrada en Bogotá Colombia. Por el artista Colombiano Ricardo pulido. Creador y fundador del movimiento Neosurrealista y pionero del Neosurrealismo en Colombia el 22 de diciembre de 2016.</p>
                            <!--<footer></footer>-->
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </body>
    @yield('scripts')    
</html>
