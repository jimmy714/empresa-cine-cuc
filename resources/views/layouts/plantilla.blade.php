
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- favicon -->

    <!-- styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="css/headers.css" rel="stylesheet">
    

    <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }
    
        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
    </style>





</head>
<body>
  <main>
    <!-- header -->
    @section('header')

      @include('layouts.header')
        
    @show
    


   
    <!-- nav -->

    @section('sidebar')

      @include('layouts.admin_sidebar')
        Master sidebar <br>

    @show
   

    <!-- content -->
    <div class="container">

            @yield('content')

    </div>


    <!-- footer -->
    @include('layouts.footer')


    
    <!-- script -->

    <script src="{{ asset('js/bootstrap.min.js') }}" defer type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

  </main>

</body>
</html>