<html>
    <head>
        <title>Pirripneus | Accedi</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <link rel="stylesheet" href= ' {{ url("css/common.css") }} '>
        <link rel="stylesheet" href=' {{ url("css/login.css") }}'>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="icon" type="image/png" href=' {{ url("img/favicon.png") }} ' />
    </head>

    <body>
        <article>
            <div id="formcontainer">
                <a href='{{url("/")}}' id="logobanner"> Pirripneus</a>
                <form name="login" method="POST">
                    <input type="hidden" name="_token" value='{{ $csrf_token}}'>
                    <div id="containeroggetti">
                        <div id="accedi">
                            <p>Accedi</p>                          
                        </div>
                        @if($errors->any())
                        <p id="error"> {{$errors->first()}} </p>
                        @endif
                        
                        <div class="oggetto">
                            <p>E-mail:</p>
                            <input type="email" name='email' class="textbox" autocomplete="email" value= '{{old("email")}}'>
                        </div>
                        <div class="oggetto">
                            <p>Password:</p>
                            <input type="password" name='password' class="textbox" autocomplete="current-password" value= '{{old("password")}}'>
                        </div>
                        <input type="submit" value="Accedi">
                        <div class="oggetto">
                            <p>Non sei registrato?</p>
                            <a href='{{ url("/registrazione")}}' id="registrati"> Registrati </a>
                        </div>
                    </div>
                </form>
            </div>
        </article>
    </body>

</html>