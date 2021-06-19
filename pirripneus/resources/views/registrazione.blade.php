<html>

    <head>
        <title>Pirripneus | Registrati</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/login.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="icon" type="image/png" href="img/favicon.png" />
        <script src="js/signup.js" defer></script>
    </head>


    <body>
        <article>
            <div id="formcontainer">
                <a href='{{url("/")}}' id="logobanner"> Pirripneus</a>
                <form name="signup" method="POST">
                    <input type="hidden" name="_token" value='{{ $csrf_token}}'>
                    <div id="containeroggetti">
                        <div id="accedi">
                            <p>Registrati</p>
                        </div>
                        @if($errors->any())
                            @foreach ($errors->all() as $error)
                                <p class="error"> {{$error}} </p>
                            @endforeach
                        @endif
                        <p id="error" class="hidden">Riempi tutti i campi e/o verifica che non ci siano errori</p>
                        <div class="oggetto">
                            <p>Nome:</p>
                            <input type="text" name="nome" class="textbox" autocomplete="given-name" value= '{{old("nome")}}'>
                            <p class="hidden" id="nome">Inserisci il nome</p>
                            <p class="hidden" id="nomelungo">Il nome può essere lungo al massimo 32 caratteri</p>
                        </div>
                        <div class="oggetto">
                            <p>Cognome:</p>
                            <input type="text" name="cognome" class="textbox" autocomplete="family-name" value= '{{old("cognome")}}'>
                            <p class="hidden" id="cognome">Inserisci il cognome</p>
                        </div>
                        <div class="oggetto">
                            <p>E-mail:</p>
                            <input type="email" name="email" class="textbox" autocomplete="email" value= '{{old("email")}}'>
                            <p class="hidden" id="emailvalid">Email non valida</p>
                            <p class="hidden" id="emailinuse">Email gia in uso</p>
                            <p class="hidden" id="email">Inserisci e-mail</p>
                        </div>
                        <div class="oggetto">
                            <p>Password:</p>
                            <input type="password" name="password" class="textbox" autocomplete="new-password" value= '{{old("password")}}'>
                            <p class="hidden" id="password">Inserisci una password</p>
                            <p class="hidden" id="passwordnotvalid">Password non valida, assicurati che la lunghezza sia compresa tra 8 e 15 caratteri e che contenga una maiuscola, un numero e un carattere speciale (! ? @ # $ % ^ & *)</p>
                        </div>
                        <div class="oggetto">
                            <p>Ripeti password:</p>
                            <input type="password" name="ripetipassword" class="textbox" autocomplete="new-password" value= '{{old("ripetipassword")}}'>
                            <p class="hidden" id="repeatpassword">Reinserisci la password</p>
                            <p class="hidden" id="passwordmatch">Le password non coincidono</p>
                        </div>
                        <div class="oggetto">
                            <p>Codice fiscale:</p>
                            <input type="text" name="cf" class="textbox" value= '{{old("cf")}}'>
                            <p class="hidden" id="cf">Inserisci il codice fiscale</p>
                            <p class="hidden" id="cferrato">Codice fiscale errato</p>
                        </div>
                        <input type="submit" name="submit" value="Registrati">
                        <div class="oggetto">
                            <p>Sei gia registrato?</p>
                            <a href='{{url("/login")}}' id="registrati"> Accedi </a>
                        </div>

                    </div>
                </form>
            </div>
        </article>
    </body>
</html>