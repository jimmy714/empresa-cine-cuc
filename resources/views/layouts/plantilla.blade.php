<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- titulo -->
    <title>@yield('title')</title>


    <!-- Styles-->
    @include('layouts.styles')
  
  </head>
  <body class="d-flex flex-column h-100">
    
    <!-- Header -->
    @include('layouts.header')


    <!-- Main Content -->
    @yield('content')



    <!-- Footer -->
    @include('layouts.footer')

    <!-- scripts -->
    @include('layouts.scripts')


  </body>
</html>
