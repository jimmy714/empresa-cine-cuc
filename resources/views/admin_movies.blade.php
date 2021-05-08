@extends('layouts.plantilla')

@section('title', 'Esta es una pagina de inicio de prueba')


@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection
    
    