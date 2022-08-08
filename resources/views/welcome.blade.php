<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        
    </head>
    <body>
    <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        ONEP
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if (Auth::check())
                            <li><a href="{{ url('affectation') }}">Affectation</a></li>
                            <li><a href="{{ url('materiaux') }}">Materiaux</a></li>
                            <li><a href="{{ url('employees') }}">Personnel</a></li>
                            <li><a href="{{ url('fournisseurs') }}">Fournisseur</a></li>    
                        @else
                            <li><a href="{{ url('materiaux') }}">Materiaux</a></li>
                            <li><a href="{{ url('employees') }}">Personnel</a></li>
                            <li><a href="{{ url('fournisseurs') }}">Fournisseur</a></li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::check())
                            <a href="{{ url('materiaux') }}">Home</a>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>    
    
    </body>
</html>
