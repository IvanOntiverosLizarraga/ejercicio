<div class="container myContainer">
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="{{ ('/') }}">Inicio</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <!-- Validar con el middleware  -->
        @if(!Auth::guest())
          @if(Auth::user()->type == 'admin')
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.users.index') }}">Usuarios</a>
            </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.autores.index') }}">Autores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.categorias.index') }}">Categorias</a>
          </li>
        @endif   
          <li class="nav-item">
            <a class="nav-link" href="{{ ('/libros') }}">Libros</a>
          </li>      

        <!-- Fin validar con el middleware  -->
    </ul>

    @if(Auth::guest())
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ '/login' }}">Ingresar</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="{{ '/register' }}">Regístrate</a>
      </li> 
    </ul>
    @else
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a  class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ Auth::user()->name }} <span class="caret"></span>
        </a>
          <ul class="dropdown-menu dropdown-menu-right myDrop" role="menu">
            <li>
              <a class="myA" href="{{ url('/logout') }}">Salir</a>
            </li>
          </ul>
      </li>
    </ul>
    @endif
  </div>
</nav>
