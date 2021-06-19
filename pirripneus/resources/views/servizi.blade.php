@extends('layouts.app')

@section('title', 'Servizi')
@section('css')
    @parent
    <link rel="stylesheet" href='{{url("css/servizi.css")}}'>
@endsection

@section('js')
    @parent
    <script src='{{url("js/servizi.js")}}' defer></script>
    <script src='{{url("js/mobile.js")}}' defer></script>
@endsection

@section('headertitle', 'Servizi')

@section('corpo')
<article>
        <section id="servizi">
            <strong>I nostri servizi</strong>
            <div class="container">
            </div>
        </section>    
</article>
@endsection

