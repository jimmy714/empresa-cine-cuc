@extends('layouts.plantilla')

@section('title', 'Esta es una pagina de inicio de prueba')

@section('content')




@guest
    mostrar en un modal:
    Debes registrarte para comprar entradas<br>
    Mostrar boton registrare si no<br>
   retroceder a la pagína anterior de las funciones<br>


@else

Ya puedes comprar  {{auth()->user() }}<br>



@endguest
    




{{$showtime_for_ticket}}

@endsection