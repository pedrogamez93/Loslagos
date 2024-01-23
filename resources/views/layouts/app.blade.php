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
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
 
<!-- Agrega tu hoja de estilo CSS personalizada para manejar cambios de accesibilidad -->
 <link rel="stylesheet" href="{{ asset('css/accessibility.css') }}">

<!-- Agrega tu script JavaScript personalizado para manejar cambios de accesibilidad -->
<script src="{{ asset('js/accessibility.js') }}" defer></script>
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
        .nav-link{
    font-family: 'Inter' !important;
      src: url('/fonts/Inter-Regular.ttf') format('truetype');
      color: white !important;
    
  }
  h1.menu{
    text-align: center;
}

    footer {
            background-color: #389144;
            color: white;
            width: 100%;
            position: relative; /* Cambiado de fixed a relative */
            bottom: 0;
            left: 0;
            padding: 5%; /* Ajusta el relleno según sea necesario */
        }
        .backgroundB{
          background-color: #389144 ;padding-left: 3vw;    border-bottom: 1px solid #fff;
        }

        h5.footer-col-title {
  padding-bottom: 20px;
}


        .dropdown-menu a{
          color: #565656;
          font-size: 16px;
          font-weight: 400;
          font-style: normal;
          line-height: 40px;
          font-family: 'Inter' !important;
          background: url("storage/images/arrow.png") no-repeat;
          background-position: 97% 50%;
          padding: 4px 60px 4px 20px;
        }
        .linea-separadora {
          border-top: 1px solid #00548F;
          margin: 20px 10px;
        }
        .nav-head{
          background-color: #389144;
        }
        
#newsletter12::placeholder {
  color: #ffff !important; /* Puedes ajustar el color según tus preferencias */
}
    </style>

@stack('styles')
</head>
<body id="app-layout"  class=" " style="">
<div class="container-fluid nav-head">
<nav class="navbar navbar-expand-lg px-5 backgroundB container" >
  
  <a class="navbar-brand" href="{{ url('/') }}">
  <img src="{{ asset('storage/img/Logo-Gore-Blanco.png') }}" alt="Logo Gore Blanco">
  </a>
  <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-movil" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>-->
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu-movil" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse" id="menu-movil" style="    ">
    <ul class="navbar-nav  mr-auto ml-auto" >
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}" style="color:white">Home </a>
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white">
              Gobierno Regional
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item style-a-menu" href="{{ url('/gobiernoregional/acerca') }}">Acerca del Gobierno Regional </a>
              <a class="dropdown-item style-a-menu" href="{{ url('/gobiernoregional/leygobiernoregional') }}">Gobierno Regional Ley</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/gobiernoregional/organigrama') }}">Organigrama</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/gobiernoregional/documentosdegestion') }}">Documentos de Gestión</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/gobiernoregional/dptogestionpersonas') }}">Gestión y Desarrollo de Personas</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/gobiernoregional/tramitesdigitales') }}">Trámites Digitales</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/gobiernoregional/asambleaclimatica') }}">Asamblea Climática</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/gobiernoregional/politicasostenibilidadhidrica') }}">Política de Sostenibilidad Hídrica</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/gobiernoregional/disenopoliticapersonasmayores') }}">Política de Personas Mayores</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/gobiernoregional/planificacioninstitucional') }}">Planificación Institucional</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/gobiernoregional/concursopublico') }}">Concurso Público</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/gobiernoregional/comitecienciastecnologias') }}">Comité Ciencia Tecnología e Innovación</a>
          </div>
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white">
              Consejo Regional
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
              <a class="dropdown-item style-a-menu" href="{{ url('/consejoregional/introduccion') }}">Introducción</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/consejoregional/presidenteconsejo') }}">Presidente del Consejo</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/consejoregional/consejerososorno') }}">Consejeros Regionales</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/consejoregional/actas') }}">Actas</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/consejoregional/certificadosdeacuerdos') }}">Certificados de Acuerdos</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/consejoregional/resumendegastos') }}">Resumen de Gastos</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/consejoregional/tablassesionesconsejo') }}">Tabla de Sesiones Consejo Regional de Los Lagos</a>
          </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white">
              Región los Lagos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item style-a-menu" href="{{ url('/regionlagos/introduccion') }}">Introducción </a>
              <a class="dropdown-item style-a-menu" href="{{ url('/regionlagos/antecedentesregion') }}">Información de la Región</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/regionlagos/autoridades/Gobernador%20Regional') }}">Autoridades</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/regionlagos/PoblacionSuperficie') }}">Estadísticas</a>
              <a class="dropdown-item style-a-menu" href="{{ url('/regionlagos/InversionesD') }}">Inversiones</a>
          </div>
      </li>

      <li class="nav-item active">
        <a class="nav-link"  style="color:white, margin-right: 12px;" href="{{ url('/funcionario') }}"> Directorio de Funcionarios </a>
      </li>
      </ul>
       
      <li class="nav-item dropdown d-none d-lg-block" style="margin-left:auto; list-style: none;">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 18px; background-color: rgb(255 255 255 / 34%);color: #ffffff; padding:0.5rem;">
            <i class="bi bi-grid" style="color: white;"></i>Infórmate aquí
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item style-a-menu" href="{{ url('/saladeprensa') }}">Sala de prensa</a>
            <a class="dropdown-item style-a-menu" href="{{ url('/documentos') }}">Documentos</a>
            <a class="dropdown-item style-a-menu" href="{{ url('/mapa') }}">Mapa del Sitio</a>
            <a class="dropdown-item style-a-menu" href="{{ url('/sitiodegobierno') }}">Sitio de Gobierno</a>
            <a class="dropdown-item style-a-menu"  href="{{ url('/regionlagos/PoliticaPrivacidad') }}">Politicas de privacidad</a>
            <a class="dropdown-item style-a-menu" href="{{ url('/todoslosprogramas') }}">Programas</a>
            <a class="dropdown-item style-a-menu" href="{{ url('/preguntasfrecuentes') }}">Preguntas frecuentes</a>
        <div class="linea-separadora"></div>
            <a class="dropdown-item style-a-menu" href="{{ url('/contactanos') }}">Formulario de contacto</a>

        </div>
    </li>
   


    
    <img src="{{ asset('storage/images/accessibility_icon.png') }}" alt="accessibilidad_icon" data-bs-toggle="modal" data-bs-target="#staticBackdrop" width="36px" style="margin-left:auto;" class="d-none d-lg-block">
    <ul class="navbar-nav text-light d-lg-none">

            <li class="nav-item dropdown" style="margin-right:auto; list-style: none;">
                <a class="nav-link dropdown-toggle mt-4 mb-4" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 18px; background-color: rgb(255 255 255 / 34%);color: #ffffff; padding:0.5rem 1.7rem;">
                    <i class="bi bi-grid" style="color: white;"></i>Infórmate aquí
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item style-a-menu" href="{{ url('/saladeprensa') }}">Sala de prensa</a>
                    <a class="dropdown-item style-a-menu" href="{{ url('/documentos') }}">Documentos</a>
                    <a class="dropdown-item style-a-menu" href="{{ url('/mapa') }}">Mapa del Sitio</a>
                    <a class="dropdown-item style-a-menu" href="{{ url('/sitiodegobierno') }}">Sitio de Gobierno</a>
                    <a class="dropdown-item style-a-menu"  href="{{ url('/regionlagos/PoliticaPrivacidad') }}">Politicas de privacidad</a>
                    <a class="dropdown-item style-a-menu" href="{{ url('/todoslosprogramas') }}">Programas</a>
                    <a class="dropdown-item style-a-menu" href="{{ url('/preguntasfrecuentes') }}">Preguntas frecuentes</a>
                <div class="linea-separadora"></div>
                    <a class="dropdown-item style-a-menu" href="{{ url('/contactanos') }}">Formulario de contacto</a>

                </div>
            </li>        
            <hr size="5px">

           <li class="nav-item col-6 col-md-auto p-3" style="display:flex">
                <img src="{{ asset('storage/images/icon-plataforma-1.png') }}" alt="icon" style="margin-right: 10px;">
                <small class="ms-2">Plataforma <br><strong>Ley del Lobby</strong></small>  
            </li>

            <li class="nav-item col-6 col-md-auto p-3" style="display:flex">
              <img src="{{ asset('storage/images/icon-plataforma-2.png') }}" alt="icon" style="margin-right: 10px;">
              <small class="ms-2">Transparencia activa <br><strong>Ley de Transparencia</strong></small>

            </li>

            <li class="nav-item col-6 col-md-auto p-3" style="display:flex">
              <img src="{{ asset('storage/images/icon-plataforma-3.png') }}" alt="icon" style="margin-right: 10px;">
              <small class="ms-2">Solicitar información <br><strong>Ley de Transparencia</strong></small>

            </li>
    </ul>
                 <!--
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
                </ul> -->
  </div>
</nav>
</div>


    @yield('content')

 <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="menu modal-title fs-5" id="staticBackdropLabel">Accesibilidad</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div id="accessibility-controls">
      <p><button  id="increase-font">Aumentar Tamaño de Fuente</button></p>
      <p><button id="decrease-font">Disminuir Tamaño de Fuente</button></p>
      <p><button id="toggle-contrast">Alternar Alto Contraste</button></p>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<footer class="row row-cols-1 row-cols-sm-2 row-cols-md-4 border-top" style="">
    <div class="col mb-3">

        <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
            <img src="{{ asset('storage/img/logo_gore_vertical-blanco.png') }}" alt="Logo GORE Vertical Blanco">
        </a>
        <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
            <img src="{{ asset('storage/img/Logo-Core-blanco.png') }}" alt="Logo Core Blanco">
        </a>
    </div>

    <div class="col mb-3">
        <h5 class="footer-col-title">Menú</h5>
        <ul class="nav flex-column">
            <li class="nav-item mb-2 text-light">
                <a href="#" class="nav-link p-0 text-muted">Gobierno Regional</a>
            </li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Consejo Regional</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Región de los Lagos</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Directorio de Funciones</a></li>
        </ul>
    </div>

    <div class="col mb-3">
        <h5 class="footer-col-title" >Enlaces directos</h5>
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
    <a style="text-decoration: none;
    color: white;" href="{{ url('/contactanos') }}"><h5 class="footer-col-title" >Contacta con nosotros aquí</h5></a>
        <ul class="nav flex-column">
            
            <li class="nav-item mb-4"><a href="#" class="nav-link p-0 text-muted">Comunícate con nosotros a través de nuestro correo electrónico y nos pondremos en contacto de inmediato</a></li>
            <li class="nav-item mb-2">
            <a href="#" class="nav-link p-0 text-muted">
                <div class="d-flex  flex-sm-row w-100 gap-2" style="border-radius: 100px; background: rgba(255, 255, 255, 0.20);">
                    
                    

                    <a href="{{ url('/contactanos') }}" class="btn " type="button" style="color: white;">Contactanos</a>
                </div>
            </a>
            </li>
            <li class="nav-item mt-3"><a href="#" class="nav-link p-0 text-muted">Copyright © GORE Los Lagos 2023</a></li>
            <li class="nav-item mt-3">
                <a href="https://www.facebook.com/GoreLosLagosOficial" style="padding-right: 20px;">
                    <img src="{{ asset('img/fb.png') }}" alt="" class="img-fluid">
                </a>
                <a href="https://twitter.com/GoreLosLagos" style="padding-right: 20px;">
                    <img src="{{ asset('img/twitter.png') }}" alt="" class="img-fluid">
                </a>
                <a href="https://www.instagram.com/goreloslagos/" style="padding-right: 20px;">
                    <img src="{{ asset('img/insta.png') }}" alt="" class="img-fluid">
                </a>
            </li>
        </ul>
    </div>
</footer>
  
    <!-- JavaScripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    <script>
   jQuery(document).ready(function(){
    $('#thumbnail-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        dots: true, 
        responsive: [
            {
              breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1 // Agrega esta línea para que también se desplace 1 slide en dispositivos móviles
                }
            },
            {
                breakpoint: 600,
                settings: {
                  slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                  slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
});


    jQuery(document).ready(function(){
      $('#thumbnail-slider2').slick({
            slidesToShow: 4, // Cambia según tus preferencias
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000, // Tiempo en milisegundos entre cada cambio de slide
            dots: true,
            responsive: [
            {
              breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1 // Agrega esta línea para que también se desplace 1 slide en dispositivos móviles
                }
            },
            {
                breakpoint: 600,
                settings: {
                  slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                  slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
        });
    });
</script>



</body>
</html>