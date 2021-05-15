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



<div class="container">
  <div class="py-5 text-center">
    <h2>Adquirir tiquetes para:</h2>
    <p class="lead">{{$showtime_for_ticket[0]->nombre_pelicula}}</p>
  </div>

  <form class="needs-validation" novalidate>
  <div class="row">
    
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        
        <label class="text-muted" for="exampleFormControlSelect1">Cantidad tiquetes</label>
        
        <select name="tiquetes" class="badge badge-secondary badge-pill"  id="exampleFormControlSelect1">
          <option value="1">Para 1 persona</option>
          @if ($showtime_for_ticket[0]->cupo>=2)
          <option value="2">Para 2 personas</option>
          @endif
          @if (($showtime_for_ticket[0]->cupo>=3))
          <option value="3">Para 3 personas</option>
          @endif
        </select>
      

      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">{{$showtime_for_ticket[0]->nombre_pelicula}}</h6>
            <small class="text-muted">Nombre de la función</small>
          </div>
          <span class="text-muted"></span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">{{$showtime_for_ticket[0]->nombre_lugar}}</h6>
            <small class="text-muted">Sala de exibición</small>
          </div>
          <span class="text-muted"></span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">{{$showtime_for_ticket[0]->direccion}}</h6>
            <small class="text-muted">Dirección</small>
          </div>
          <span class="text-muted"></span>
        </li>
        <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-success">
            <h6 class="my-0">{{$showtime_for_ticket[0]->hora_inicio}}</h6>
            <small>Hora de inicio</small>
          </div>
          <span class="text-success"></span>
        </li>
        <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-success">
            <h6 class="my-0">{{$showtime_for_ticket[0]->hora_fin}}</h6>
            <small>Hora de fin</small>
          </div>
          <span class="text-success"></span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Cupos disponibles:</span>
          <strong>{{$showtime_for_ticket[0]->cupo}}</strong>
        </li>
      </ul>

      <form class="card p-2">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Promo code">
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Datos de contacto</h4>
      
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Primer nombre</label>
            <input name="nombre" type="text" class="form-control" id="firstName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Segundo nombre</label>
            <input name="apellido" type="text" class="form-control" id="lastName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="username">Usuario</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input name='username' type="text" class="form-control" id="username" placeholder="Username" required>
            <div class="invalid-feedback" style="width: 100%;">
              Your username is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Correo electrónico </label>
          <input type="email" class="form-control" id="email" placeholder="you@example.com" required>
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Dirección de residencia <span class="text-muted">(Optional)</span></label>
          <input type="text" class="form-control" id="address" placeholder="1234 Main St" >
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        <div class="mb-3">
          <label for="address2">Celular</label>
          <input type="text" class="form-control" id="address2" placeholder="Apartment or suite" required>
          <div class="invalid-feedback">
            Please provide a valid state.
          </div>
        </div>

        <div class="mb-3">
          <label for="address2">Otro número de contacto <span class="text-muted">(Optional)</span></label>
          <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
        </div>

        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">Pais</label>
            <select class="custom-select d-block w-100" id="country" required>
              <option value="">Choose...</option>
              <option>Colombia</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">Ciudad</label>
            <select class="custom-select d-block w-100" id="state" required>
              <option value="">Choose...</option>
              <option>Barranquilla</option>
              <option>Soledad</option>
              <option>Baranoa</option>
              <option>Cartagena</option>
              <option>Santa Marta</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Zip <span class="text-muted">(Optional)</span></label>
            <input type="text" class="form-control" id="zip" placeholder="">
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="same-address" required>
          <label class="custom-control-label" for="same-address">Autorizo a Cine Cuc para el tratamiento de mis datos personales, así como también ponerse en contacto conmigo. </label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="save-info" required>
          <label class="custom-control-label" for="save-info">Entiendo que la función puede ser cancelada o modificada por parte de Cine Cuc con o sin previo aviso. </label>
        </div>
        <hr class="mb-4">

        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Obtener Tiquetes :)</button>
      </form>
    </div>
  </div>




@endguest
    


<script src="js/form-validation.js"></script>



@endsection