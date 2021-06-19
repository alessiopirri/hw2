@extends('layouts.app')

@section('title', 'Profilo')
@section('css')
    @parent
    <link rel="stylesheet" href='{{url("css/profilo.css")}}'>
@endsection

@section('js')
    @parent
    <script src='{{url("js/mobile.js")}}' defer></script>
    <script src='{{url("js/profilo.js")}}' defer></script>
@endsection
@section('headertitle', 'Profilo')

@section('corpo')
<article>
</article>
@endsection