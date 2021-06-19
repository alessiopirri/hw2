@extends('layouts.app')

@section('title', 'Home')
@section('css')
    @parent
    <link rel="stylesheet" href='{{url("css/style.css")}}'>
@endsection
<!-- //TODO METEO -->
@section('js')
    @parent
    <script src='{{url("js/ultimiarrivi.js")}}' defer></script>
    <script src='{{url("js/mobile.js")}}' defer></script>
    <script src='{{url("js/meteo.js")}}' defer></script>
@endsection    
@section('headertitle', 'Benvenuto')

@section('meteo')
<div class="meteo hidden">
            <div class="cittameteo" id="meteocatania">
                <div>
                    Catania
                </div>
                <div class="temperatura">

                </div>
            </div>
            <div class="cittameteo" id="meteomessina">
                <div>
                    Messina
                </div>
                <div class="temperatura">

                </div>
            </div>
            <div class="cittameteo" id="meteopalermo">
                <div>
                    Palermo
                </div>
                <div class="temperatura">

                </div>
            </div>
            <div class="cittameteo" id="meteoposizione">
                <div id="nomeposizione">

                </div>
                <div class="temperatura">

                </div>
            </div>
</div>
@endsection

@section('corpo')
<article id="corpo">
        <h1>Pirripneus, leader nazionale nel settore degli pneumatici</h1>
        <p>Con migliaia di clienti che ogni giorno acquistano da Pirripneus siamo divendati leader del mercato disponendo di migliaia di pneumatici e offrendo diversi servizi
        </p>
        <section id="sedi">
            <strong>Le nostre sedi</strong>
            <div class="container">
            </div>
            <a href='{{url("sedi")}}' class="button">Visualizza tutte le sedi</a>
        </section>
        <section id="servizi">
            <strong>I nostri Servizi</strong>
            <div class="container">
            </div>
            <a href='{{url("servizi")}}' class="button">Visualizza tutti i nostri servizi</a>
        </section>
        <section id="cerchi">
            <strong>Ultimi cerchi arrivati</strong>
            <div class="container">
            </div>
            <a href='{{url("cerchi")}}' class="button">Visualizza tutti i nostri cerchi</a>
        </section>
        <section id="pneumatici">
            <strong>Ultimi pneumatici arrivati</strong>
            <div class="container">
            </div>
            <a href='{{url("pneumatici")}}' class="button">Visualizza tutti i nostri pneumatici</a>
        </section>
    </article>
@endsection