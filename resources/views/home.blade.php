@extends('layouts.plantilla')

@section('title', 'Esta es una pagina de inicio de prueba')

@section('header')
    @parent
    
@endsection
    
@section('sidebar')

@if (false)
    @parent
@endif
    

    <p>This is appended to the master sidebar.</p>
@endsection
    