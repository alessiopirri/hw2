@extends('layouts.app')

@section('title', 'Sedi')
@section('css')
    @parent
    <link rel="stylesheet" href='{{url("css/sedi.css")}}'>
@endsection

@section('js')
    @parent
    <script src='{{url("js/sedi.js")}}' defer></script>
    <script src='{{url("js/mobile.js")}}' defer></script>
@endsection
@section('headertitle', 'Sedi')

@section('corpo')
<article>
        <section id="sedi">
            <strong>Le nostre sedi</strong>
            <div class="container">
            </div>
        </section>
</article>
@endsection