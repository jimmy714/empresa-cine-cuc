@extends('layouts.plantilla')

@section('title', 'Esta es una pagina de inicio de prueba')


@section('content')
    


<div class="container">

    <form method="POST" {{-- class="needs-validation" --}} novalidate >
      @csrf

        <h4 class="mb-3 center">Registro nuevo usuario</h4>
          
        <div class="mb-3">
                <label for="email">Correo electrónico </label>
                <input name="email" type="email"  class="form-control @error('email') is-invalid @enderror" id="email" placeholder="you@example.com" value="{{old('email')}}"  autofocus required>
                <div class="invalid-feedback">
                    Correo electrónico inválido.
                </div>
        </div>

        <div class="mb-3">
            <label for="username">Usuario</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                </div>
                <input name='usuario_nickname' type="text" class="form-control @error('usuario_nickname') is-invalid @enderror" id="username" placeholder="Username" value="{{old('usuario_nickname')}}"  required>
                <div class="invalid-feedback" style="width: 100%;">
                    Nombre de usuario inválido.
              </div>
            </div>
        </div>

        <div class="row">
            
            <div class="col-md-6 mb-3">
              <label for="password1">Contraseña <span id="inpassword"></span></label> </label>
              <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Contraseña" onchange="pass()" onkeyup="pass()"  required>
              <div class="invalid-feedback">
                    Contraseña no válida, debe poseer minimo 8 caracteres.
              </div>
              
            </div>
            <div class="col-md-6 mb-3">
                <label for="password2">Confirme Contraseña <span id="resultado"></span></label>
                <input type="password" class="form-control" id="password2" placeholder="Repita contraseña" onchange="pass()" onkeyup="pass()" required>
                <div class="invalid-feedback">
                    Las contraseñas deben ser iguales.
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">Primer nombre</label>
              <input name="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" id="firstName" placeholder="Tu nombre" value="{{old('nombre')}}" required>
              <div class="invalid-feedback">
                    Primer nombre requerido.
              </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="lastName">Segundo nombre</label>
                <input name="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" id="lastName" placeholder="Tu apellido" value="{{old('apellido')}}"  required>
                <div class="invalid-feedback">
                    Segundo nombre requerido.
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="num_identificacion">Número de identificación</label>
            <input name="num_identificacion" type="text" class="form-control @error('num_identificacion') is-invalid @enderror" id="num_identificacion" placeholder="10001234567" value="{{old('num_identificacion')}}" required>
            <div class="invalid-feedback">
                Por favor ingrese un número de identificación.
            </div>
        </div>
  
        <div class="mb-3">
                <label for="celular">Celular</label>
                <input name="celular" type="text" class="form-control @error('celular') is-invalid @enderror" id="celular" placeholder="300-1234567" value="{{old('celular')}}" required>
                <div class="invalid-feedback">
                    Por favor ingrese un número válido.
                </div>
        </div>
        <hr class="mb-4">
        <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="same-address" required>
                <label class="custom-control-label" for="same-address">Autorizo a Cine Cuc para el tratamiento de mis datos personales, así como también ponerse en contacto conmigo. </label>
        </div>
        
        <hr class="mb-4">

        <button class="btn btn-primary btn-lg btn-block" type="submit" id="submit-btn" disabled>Registrarse</button>

        <hr class="mb-4">
        
    </form>
    

    @if($errors->any())
    <ul>
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
   </ul>
   @endif

    <script src="js/password-validation.js"></script>
    <script src="js/form-validation.js"></script>
    

@endsection


    
    