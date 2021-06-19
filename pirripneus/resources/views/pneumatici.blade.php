@extends('layouts.app')

@section('title', 'Pneumatici')
@section('css')
    @parent
    <link rel="stylesheet" href='{{url("css/pneumatici.css")}}'>
@endsection

@section('js')
    @parent
    <script src='{{url("js/pneumatici.js")}}' defer></script>
    <script src='{{url("js/trovapneumatici.js")}}' defer></script>
    <script src='{{url("js/mobile.js")}}' defer></script>
@endsection
@section('headertitle', 'Pneumatici')

@section('corpo')
<article>
        <div id="containertrovamisura">
            <div id="trovaMisura">
                <h1>
                    Cerca le misure degli pneumatici compatibili con il tuo veicolo utilizzando questo strumento
                </h1>
                <div class="campo">
                    <div>Anno: </div>
                    <select id="anno"></select>
                </div>
                <div class="hidden campo">
                    <div>Marca: </div>
                    <select id="marca"></select>
                </div>
                <div class="hidden campo">
                    <div>Modello: </div>
                    <select id="modello"></select>
                </div>
                <div class="hidden campo">
                    <div>Allestimento: </div>
                    <select id="allestimento"></select>
                </div>
                <div class="hidden campo">
                    <div>Misura: </div>
                    <select id="misura"></select>
                </div>
                <p> <strong>N.B.</strong> Lo strumento fornisce tutti gli pneumatici aventi le stesse misure del veicolo ricercato e gli indici di velocità e carico maggiori o uguali a quelli prescritti. <br>
                Vengono inoltre visualizzati anche gli pneumatici per i quali non sono definiti all'interno dei nostri sistemi indice di carico e di velocita.
                </p>
            </div>
        </div>
        <div id="container">
            <!-- Tutti gli pneumatici -->
        </div>
</article>
@endsection