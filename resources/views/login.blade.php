<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Signin Template · Bootstrap v4.6</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">

    <!-- Recepción de errores de login provenientes de UsuariosController@login -->
   {{--  @error('email')){{'Usuario o contraseña incorrecta'}}@enderror --}}
   @if($errors->any())
    <ul>
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
   </ul>
   @endif



    <pre>{{ Auth::user()}}</pre>


    
<form class="form-signin" method="POST">
    <!-- usamos un token -->
    @csrf


  <img class="mb-4" src="storage/cineCUC.svg" height="80">
  <h1 class="h3 mb-3 font-weight-normal">Por favor, inicie sesión</h1>
  
  <!-- label e input para email -->
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" value="{{ old('email')}}" id="inputEmail" name="email" class="form-control" placeholder="Dirección de E-mail" required autofocus>


  <!-- label e input para password -->
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Contraseña" required>

  <!-- checkbox para recordar datos -->
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Recordarme
    </label>
  </div>

<!-- boton sumit para enviar el formulario -->
  <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2021</p>
</form>

  </body>
</html>
