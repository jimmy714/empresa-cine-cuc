@extends('layouts.plantilla')

@section('title', 'Esta es una pagina de inicio de prueba')


@section('content')




<div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
       <!-- Aqui inicia reacuadro de pelicula -->

      @foreach ($cartelera as $titulo)



        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">

            <!-- Remplazar ppor el lector de imagenes -->
            <svg class="bd-placeholder-img card-img-top" width="100%" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
                <!-- Remplazar por las propiedades de la pelicula -->
              <p class="card-text">{{ $titulo->nombre_pelicula }} <br>Género: {{ $titulo->genero }} @if ($titulo->solo_adultos)
                 +18<br>
              @endif</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">

                  <!-- en este boton se ejecuta un modal con la ficha de la pelicula -->
                  <button type="button" class="btn btn-sm btn-outline-secondary" 
                  onclick="showFicha([
                    
                    '{{$titulo->nombre_pelicula}}',
                    '{{$titulo->descripcion}}',
                    '{{$titulo->director}}',
                    '{{$titulo->genero}}',
                    '{{$titulo->solo_adultos}}',
                    '{{$titulo->id_pelicula}}',

                ])">Ver ficha</button>

                  <!-- este botón envía a la pagina para obtener los tiquetes -->
                  {{-- <button type="button" class="btn btn-sm btn-outline-secondary">Comprar tiquetes</button> --}}
                  <a href="{{ url('get_ticket') }}?cartelera={{$titulo->id_pelicula}}" class="btn btn-sm btn-outline-secondary">Comprar tiquetes</a>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>

        <!-- Aqui finaliza reacuadro de pelicula -->


      @endforeach

      </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="fichaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-light">
          <thead class="thead-light">
                  <tr><th>Descripción:</th><td class="descripcion"></th></tr>
                  <tr><th>Director:</td><td class="director"></td></tr>
                  <tr><th>Género:</td><td class="genero"></td></tr>
                  <tr><th>Clasificación</td><td class="solo_adultos"></td></tr>
          </thead>
      </table>

      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>

<!-- Script para el modal -->
<script type="text/javascript">
function showFicha(datatitulo)
{
   
   $("#fichaModal .modal-title").html(datatitulo[0]);
   $("#fichaModal .descripcion").html(datatitulo[1]);
   $("#fichaModal .director").html(datatitulo[2]);
   $("#fichaModal .genero").html(datatitulo[3]);
   if(datatitulo[4]=='1')
   {
    $("#fichaModal .solo_adultos").html("+18<br>");
   }
   else
   {
    $("#fichaModal .solo_adultos").html("Todo público<br>");
   }
   
   $("#fichaModal .modal-footer").html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button><a href=/get_ticket?cartelera='+datatitulo[5]+' class="btn btn-primary">Ver funciones</a>');
   $("#fichaModal").modal();
}


</script>


@endsection