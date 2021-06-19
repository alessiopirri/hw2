@extends('layouts.app')

@section('title', 'Carrello')
@section('css')
    @parent
    <link rel="stylesheet" href='{{url("css/carrello.css")}}'>
@endsection

@section('js')
    @parent
    <script src='{{url("js/mobile.js")}}' defer></script>
    <script src='{{url("js/carrello.js")}}' defer></script>
@endsection
@section('headertitle', 'Carrello')

@section('corpo')
<article>
    <section id="carrello">
    </section>
</article>
@endsection