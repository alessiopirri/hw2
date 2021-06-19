@extends('layouts.app')

@section('title', 'Prodotto')
@section('css')
    @parent
    <link rel="stylesheet" href='{{url("css/prodotto.css")}}'>
@endsection

@section('js')
    @parent
    <script src='{{url("js/mobile.js")}}' defer></script>
    <script src='{{url("js/prodotto.js")}}' defer></script>
    <script> 
        const type = '{{$type}}';
        const code = '{{$code}}';
    </script>
@endsection
@section('headertitle', 'Prodotto')

@section('corpo')
<article>
    <section id="containerprodotto"></section>
    <section id="modal-view" class="hidden">
            <div id="accedimodale">
                <p> Non sei autenticato, &nbsp<p>
                <a > clicca qui per accedere </a>
            <div>
        </section>
</article>
@endsection