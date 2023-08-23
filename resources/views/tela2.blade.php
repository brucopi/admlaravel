@extends('adminlte::page')

@section('title', 'Tela 2')

@section('content_header')
    <h1>Tela 2</h1>
@stop

@section('content')

   @php
   $palavra = "Compostagem";
        echo "<h1>$palavra</h1>";
   @endphp

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
    
@stop