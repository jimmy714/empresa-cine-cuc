@extends('layouts.plantilla')

@section('title', 'Esta es una pagina de inicio de prueba')

@section('content')

<div class="container">
<h2>Mis datos de usuario </h2>
    
@foreach ($datos_usuario as $item)
<table class="table table-dark">
    <thead class="thead-light">
            <tr><th>Nombre</th><td>{{ $item->nombre }}</th></tr>
            <tr><th>Apellido</td><td>{{ $item->apellido }}</td></tr>
            <tr><th>Numero de identificación</td><td>{{ $item->num_identificacion }}</td></tr>
            <tr><th>Celular</td><td>{{ $item->celular }}</td></tr>
    </thead>
</table>
@endforeach

<h2>Historial de mis tiquetes</h2>
@foreach ($histotial_tiq as $item)
<table class="table table-light">
    <thead class="thead-dark">
        <tr>
            <th>Número de tiquete</th>
            <th>Función</th>
            <th>Fecha de compra</th>
            <th>Fecha Incio de función</th>
            <th>Fecha Fin de función</th>
            <th>Estado de la función</th> 

        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$item->num_boleta}}</td>
            <td>{{$item->id_funcion}}</td>
            <td>{{$item->fecha_up}}</td>
            <td></td>
            <td></td>
            <td>Vigente, Vencida, o cancelada</td>
        </tr>
    </tbody>
</table>

@endforeach
</div>


@endsection
    
    