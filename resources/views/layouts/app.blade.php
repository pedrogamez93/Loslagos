<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GORE Los lagos</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
       

    footer {
            background-color: #389144;
            color: white;
            width: 100%;
            position: relative; /* Cambiado de fixed a relative */
            bottom: 0;
            left: 0;
            padding: 10px 0; /* Ajusta el relleno según sea necesario */
        }
    </style>

@stack('styles')
</head>
<body id="app-layout"  class=" " style="">

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #389144 !important;">
  <a class="navbar-brand" href="{{ url('/') }}">
  <img src="{{ asset('storage/img/Logo-Gore-Blanco.png') }}" alt="Logo Gore Blanco">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#" style="color:white">Home </a>
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white">
              Gobierno Regional
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item style-a-menu" href="{{ url('/gobiernoregional/acerca') }}">Acerca del Gobierno Regional </a>
              <a class="dropdown-item style-a-menu" href="{{ url('/gobiernoregional/leygobiernoregional') }}">Gobierno Regional Ley</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/gobiernoregional/organigrama') }}">Organigrama</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/#') }}">Documentos de Gestión</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/gobiernoregional/dptogestionpersonas') }}">Gestión y Desarrollo de Personas</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/gobiernoregional/tramitesdigitales') }}">Trámites Digitales</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/gobiernoregional/asambleaclimatica') }}">Asamblea Climatica</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/#') }}">Politica de Sostenibilidad Hidrica</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/#') }}">Politica de Personas Mayores</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/#') }}">Planificación Institucional</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/#') }}">Concurso Público</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/#') }}">Comité Ciencia Tecnologia e innovación</a>
          </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white">
          Consejo Regional
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white">
          Region de los Lagos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
  </div>
</nav>



    @yield('content')
   
<footer class="row row-cols-1 row-cols-sm-2 row-cols-md-4 border-top " style="padding: 5%;">
    
    <div class="col mb-3">
      <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
        <img src="{{ asset('storage/img/logo_gore_vertical-blanco.png') }}" >
      </a>
      <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
        <img src="{{ asset('storage/img/Logo-Core-blanco.png') }}" >
      </a>
    </div>

    

    <div class="col mb-3 ">
      <h5>Menu</h5>
      <ul class="nav flex-column ">
        <li class="nav-item mb-2 text-light">
            <a href="#" class="nav-link p-0 text-muted">Gobierno Regional</a>
         
        </li>
        <li class="nav-item mb-2 "><a href="#" class="nav-link p-0 text-muted">Consejo Regional</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Región de los Lagos</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Directorio de Funciones</a></li>
      
      </ul>
    </div>

    <div class="col mb-3">
      <h5>Enlaces directos</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Fondo comunidad (Evaluación)</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Creando y Cuidando la Región</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Información de la región</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Directorio de funcionarios</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Qué es el Gobierno Regional</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Organigrama</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Trámites</a></li>
      </ul>
    </div>

    <div class="col mb-3">
      <h5>Contacta con nosotras aquí</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Contacta con nosotras aquí</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Comunícate con nosotros a través nuestro correo electrónico y nos pondremos en contacto de inmediato</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><div class="d-flex flex-column flex-sm-row w-100 gap-2">
            <label for="newsletter1" class="visually-hidden">Email address</label>
            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
            <button class="btn btn-primary" type="button">Subscribe</button>
          </div></a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Copyright © GORE Los Lagos 2023</a></li>
      
      </ul>
    </div>
  </footer>  
    <!-- JavaScripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

</body>
</html>