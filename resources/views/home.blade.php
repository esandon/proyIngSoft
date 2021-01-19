<style>
body {
  font-family: "Lato", sans-serif;
}

/* Fixed sidenav, full height */
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 175px;
  left: 0;
  background-color: #23415B;
  overflow-x: hidden;
  padding-top: 20px;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 30px 16px;
  text-decoration: none;
  font-size: 15px;
  color: #ffffff;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  color: #f1f1f1;
}

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

/* Add an active class to the active dropdown button */
.active {
  background-color: green;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}

/* Some media queries for responsiveness */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 10px;}
  .sidenav a {font-size: 10px;}
}
</style>
@extends('layouts.layout')

@section('content')
<div class= "col-md-2">
  <div class="fixed-section affix" data-spy="affix" data-offset-top="400">
    <div class="sidenav" >

      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif
      <a href="{{url('home')}}"><span class="fa fa-tachometer"></span> Inicio</a>
      <a href="{{route('usuario.index')}}"><span class="fa fa-user-circle-o"></span> Usuarios</a>
      <a href ="{{url('importE')}}" class="btn btn-primary btn-medium btn-block"> Cargar Estudiantes</a>
      <a href ="{{url('importA')}}" class="btn btn-primary btn-medium btn-block"> Cargar Asignaturas</a>
      <a href ="{{route('estudiante.index')}}" class="btn btn-primary btn-medium btn-block">Cambiar Correo electronico</a>
    
      <a href ="{{route('registroAtencion')}}" class="btn btn-primary btn-medium btn-block"> Registrar atención</a>
      <a href ="#" class="btn btn-primary btn-medium btn-block"> Fichas Estudiantes</a>
      <a href ="#" class="btn btn-primary btn-medium btn-block"> Consulta Profesor</a>
      <a href ="#" class="btn btn-primary btn-medium btn-block"> Consulta Asignatura</a>
      <a href ="#" class="btn btn-primary btn-medium btn-block"> Reportar situación</a>
    </div>
  </div> 
</div>
@yield('contents  ')
<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection
