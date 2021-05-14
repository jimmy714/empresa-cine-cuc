@if(session('status'))
<br>{{ session('status')}}<br>
@endif



<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal"><a href="/"><img src="storage/cineCUC.svg" height="80"></a></h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="{{url('/')}}">Cartelera</a>
    
  </nav>

  @auth
  <a class="p-2 text-dark" href="{{ url('user_panel')}}">Panel de usuario</a>
  @if(Auth::user()->nombre=='admin')
  <a class="btn btn btn-outline-secondary" href="{{ url('/admin') }}">Panel de administración</a>&nbsp
  @endif
  <form action="/logout" method="POST" style="display: inline">@csrf
  <a class="btn btn-outline-primary" href="#" onclick="this.closest('form').submit()">Cerrar Sesion</a>
  </form>
  @else
  <a class="btn btn-outline-primary" href="{{ url('/login') }}">Ingresar</a>&nbsp
  <a class="btn btn btn-outline-secondary" href="{{ url('/register') }}">Registrarse </a>
  @endauth


</div>