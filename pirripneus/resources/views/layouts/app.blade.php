<!DOCTYPE html>
<html>

<head>
    <title>Pirripneus | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    @section('css')
    <link rel="stylesheet" href='{{url("css/common.css")}}'>
    @show
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href='{{url("img/favicon.png")}}' />
    @section('js')
    <script> const BASE_PATH = '{{url("/")}}' + "/"; </script>
    @show
</head>

<body>
    <header>
        <nav>
            <a href='{{ url("/")}}' id="logo">Pirripneus</a>
            <div id="collegamenti">
                <a href='{{ url("sedi")}}'>Sedi</a>
                <a href='{{ url("servizi")}}'>Servizi</a>
                <span class="prodotti">
                    Prodotti
                    <div>
                        <a href='{{ url("cerchi")}}'>Cerchi</a>
                        <a href='{{ url("pneumatici")}}'>Pneumatici</a>
                    </div>
                </span>
                @if(session('email'))
                    <span class="prodotti button">
                        {{ session('nome') }}
                        <div>
                            <a href='{{ url("profilo")}}' class="profilo"> Profilo </a>
                            <a href='{{ url("carrello")}}' class="profilo"> Carrello </a>
                            <a href='{{ url("logout")}}' class="profilo"> Logout </a>
                        </div>
                    </span>
                @else
                    <a href='{{ url("login/".Request::path())}}' class="button"> Accedi</a>
                @endif
            </div>
            <div id="hamburger">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div id="hamburgermenu" class = "hidden">
                <img src='{{url("img/rimuovi.svg")}}' id="chiudimenu">
                <a href='{{ url("sedi")}}' class="hamburgeritem"> Sedi </a>
                <a href='{{ url("servizi")}}' class="hamburgeritem"> Servizi </a>
                <strong class="hamburgeritem"> Prodotti </strong>
                <a href='{{ url("cerchi")}}' class="hamburgeritem"> Cerchi </a>
                <a href='{{ url("pneumatici")}}' class="hamburgeritem"> Pneumatici </a>
                @if(session('email'))
                    <strong class="hamburgeritem">{{ session('nome') }}</strong>
                    <a href='{{ url("profilo")}}' class="hamburgeritem"> Profilo </a>
                    <a href='{{ url("carrello")}}' class="hamburgeritem"> Carrello </a>
                    <a href='{{ url("logout")}}' class="hamburgeritem"> Logout </a>
                @else
                    <a href='{{ url("login")}}' class="hamburgeritem"> Accedi</a>
                @endif
            <div>            
        </nav>
        
        <h1>
            
        @yield('headertitle')
        
        </h1>
        @yield('meteo')

    </header>
    @yield('corpo')    
    <footer>
        <div id="colonne">
            <div class="colonna">
                <strong>Ordini</strong>
                <a>Metodi di pagamento</a>
                <a>Spedizione</a>
                <a>Tracking</a>
            </div>
            <div class="colonna">
                <strong>Servizio clienti</strong>
                <a>Contatti</a>
                <a>Newsletter</a>
                <a>Guida sigle pneumatici</a>
            </div>
            <div class="colonna">
                <strong>Sede legale</strong>
                <span>Via Etnea, 254</span>
                <span>Catania</span>
                <strong> Area riservata </strong>
                <a href='{{url("loginriservata")}}'>Accedi</a>
            </div>
        </div>
        <div id="nomematricola">Alessio Pirri O46002008</div>
    </footer>
</body>

</html>