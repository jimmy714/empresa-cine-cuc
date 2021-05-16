@extends('layouts.plantilla')

@section('title', 'Esta es una pagina de inicio de prueba')

@section('content')

@foreach ($pelicula_info as $info)
<div class="container">
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
          <span class="bg-danger text-white">+18</span>
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
      <th><!-- en este boton se ejecuta el facturador -->

      @if (($show->cupo)==0)

      <a href="#?showtime={{$show->id_funcion}}" class="btn btn-danger">No hay entradas disponibles</a>
      
      @else

      @guest

      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#staticBackdropRegister">Adquirir entradas</button>

      @else

      <a href="{{ url('get_ticket') }}?showtime={{$show->id_funcion}}&peliculaid={{$info->id_pelicula}}" class="btn btn-warning">Adquirir entradas</a>

      @endguest

      @endif

     

        </th>
    </tr>
  </tfoot>
</table>
<br>
    

@endforeach
</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdropRegister" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><img src="storage/cineCUC.svg" height="60"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Debes ser un usuario registrado e iniciar sesión para poder adquirir los tiquetes.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <a type="button" class="btn btn-primary" href="{{ url('/login') }}">Iniciar sesión</a>
        <a type="button" class="btn btn-primary" href="{{ url('/register') }}">Registrarse</a>
      </div>
    </div>
  </div>
</div>









@endsection
