@extends('layouts.plantilla')

@section('title', 'Esta es una pagina de inicio de prueba')

@section('content')

@foreach ($pelicula_info as $info)
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">{{ $info->nombre_pelicula }}</h1>
  <p class="lead">{{ $info->descripcion }}. </p>
  <table class="table table-dark">
    <thead class="thead-light">
      <tr>
        <th>Director</th>
        <th>Genero</th>
        <th>Clasificación</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$info->director}}</td>
        <td>{{$info->genero}}</td>
        <td>@if ($info->solo_adultos)  
          +18
          @else Apto para todo público
          @endif</td>
      </tr>
    </tbody>
  </table>
</div>
@endforeach

<h2 class="display-5">Próximas funciones</h2>

@foreach ($showtimes_con_lugares as $show)
<table class="table table-dark">
  <thead class="thead-dark">
    <tr>
      <th>Sala</th>
      <th>Direccion</th>
      <th>Entradas disponibles</th>
      <th>Hora de inicio</th>
      <th>Hora de fin</th>
      <th></th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{$show->nombre_lugar}}</td>
      <td>{{$show->direccion }}</td>
      <td>{{$show->cupo }} de {{$show->aforo_max}}</td>
      <td>{{$show->hora_inicio}}</td>
      <td>{{$show->hora_fin}}</td>
      <td></td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <th><!-- en este boton se ejecuta un modal con la ficha para comprar el tiquete -->
        <button type="button" class="btn btn-warning">Adquirir entradas</button></th>
    </tr>
  </tfoot>
</table>
<br>
    

@endforeach




@endsection
