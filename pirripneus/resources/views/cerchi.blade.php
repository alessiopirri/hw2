@extends('layouts.app')

@section('title', 'Cerchi')
@section('css')
    @parent
    <link rel="stylesheet" href='{{url("css/cerchi.css")}}'>
@endsection

@section('js')
    @parent
    <script src='{{url("js/cerchi.js")}}' defer></script>
    <script src='{{url("js/mobile.js")}}' defer></script>
@endsection
@section('headertitle', 'Cerchi')

@section('corpo')
<article>
        <div class="hidden">
            <h1 class="nomesezione">
                Sezione preferiti
            </h1>
            <div id="preferiti"></div>
        </div>
        <div id="containerricerca">
            <h1 class="nomesezione">
                Tutti i cerchi
            </h1>
            <input type="text" placeholder="Cerca" id="barradiricerca">
        </div>
        <div id="container"> </div>
</article>
@endsection