

@extends('layouts.app')

@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_home.css') }}" rel="stylesheet">
@endpush

  <div class="d-flex h-300 text-center " style="height: 700px; background-color: #389144;">
  
<div class="mt-5 cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  
<main class="px-3" class="headercontent">
    <div class="row">
        <div class="col colinputbuscador" >
            <div class="input-group rounded">
            <div class="position-absolute mt-2">
                    <span class="" style="background-color: transparent; border: none; ">
                        <!-- <i class="bi bi-search"></i> -->
                    </span>
                </div>
                <input type="text" id="inputbucador" class="form-control rounded-right" placeholder="Buscar" aria-label="Buscar" style="border-radius: 0px 12px 12px 0px; padding-left: 40;">
                <div class="input-group-append">
              <!-- <button class="btn btn-outline-secondary rounded-left" type="button" style="border-radius: 18px">Buscar</button> -->
                </div>
            </div>
        </div>
        <div class="col">
    <div class="d-flex " style="margin-left: -4vw;">
        <img src="{{ asset('storage/img/Rectangle13.png') }}" alt="Rectangle13" style="margin-right: 5px;height: 380px;margin-top: 30px;">
        <img src="{{ asset('storage/img/Rectangle14.png') }}" alt="Rectangle14" style="height: 420px;">
    </div>
</div>

    </div>
</main>



  
</div>
  </div>
<!--seccion de sala de prensa y tramite -->
<div class="container">
  <div class="" style="width: 100%;
    padding: 50px;
    margin: 0px;
    /* border-radius: 35px 35px 0px 0px !important; */
    background-color: white;
   
    /* margin-top: -5vh;*/"> 
            <div  class="d-flex justify-content-between">
                         <h3 style="">Sala de prensa</h3>
                         <div>
                                 <button type="button" class="btn btn-outline-warning" style="border-radius: 100px;">
                                    Galeria Fotografica
                                 </button >
                                 <button type="button" class="btn btn-outline-warning" style="border-radius: 100px;"> 
                                        Videos
                                 </button>
                        </div>

            </div>
    
            
            <div class=" mt-5 pb-5">
  <div id="thumbnail-slider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <!-- Primer Slide -->
      <div class="carousel-item active">
        <div class="row">
          <div class="col-md-3">
            <img src="{{ asset('storage/img/aventura.png') }}" class="d-block w-80" alt="Imagen 1">
          </div>
          <div class="col-md-3">
            <img src="{{ asset('storage/img/Rectangle45.png') }}" class="d-block w-80" alt="Imagen 2">
          </div>
          <div class="col-md-3">
            <img src="{{ asset('storage/img/aventura.png') }}" class="d-block w-80" alt="Imagen 3">
          </div>
          <div class="col-md-3">
            <img src="{{ asset('storage/img/Rectangle45.png') }}" class="d-block w-80" alt="Imagen 4">
          </div>
        </div>
      </div>

      <!-- Segundo Slide -->
      <div class="carousel-item">
        <div class="row">
          <div class="col-md-3">
            <img src="{{ asset('storage/img/Rectangle45.png') }}" class="d-block w-80" alt="Imagen 5">
          </div>
          <div class="col-md-3">
            <img src="{{ asset('storage/img/Rectangle45.png') }}" class="d-block w-80" alt="Imagen 6">
          </div>
          <div class="col-md-3">
            <img src="{{ asset('storage/img/aventura.png') }}" class="d-block w-80" alt="Imagen 7">
          </div>
          <div class="col-md-3">
            <img src="{{ asset('storage/img/Rectangle45.png') }}" class="d-block w-80" alt="Imagen 8">
          </div>
        </div>
      </div>
    </div>

    <!-- Miniaturas -->
    <div class="carousel-indicators pt-5">
      <button type="button" data-bs-target="#thumbnail-slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#thumbnail-slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>

   
        </div>
</div>

    <div class="row" style="justify-content: center;">
    <button class="btn btn-primary w-10" style="width:10rem;"> Ver todos </button>
    </div>
  </div>
<div class="container">
    <div  class=" d-flex justify-content-between">
        <h3 style="">Tramites Digitales</h3>
        <div>
                <button type="button" class="btn btn-outline-warning" style="border-radius: 100px;">
                Galeria Fotografica
                </button >
                <button type="button" class="btn btn-outline-warning" style="border-radius: 100px;"> 
                    Videos
                </button>
        </div>
    </div>
    

    <div id="thumbnail-slider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <!-- Primer Slide -->
      <div class="carousel-item active pt-5">
        <div class="row">
          <div class="col-md-3">
            <img src="{{ asset('storage/img/icono-abeja.png') }}" class="d-block w-80" alt="Imagen 1">
            <p class="TitulocarouselTD pt-3">Fondos concursables FNDR</p>
             <p>Sistema de postulación y gestión de proyectos fondo comunidad...</p>
          </div>
          <div class="col-md-3">
            <img src="{{ asset('storage/img/icono-turismo.png') }}" class="d-block w-80" alt="Imagen 2">
              <p class="TitulocarouselTD pt-3">Sistema de Gestión Fondo</p>
               <p>La importancia de la realización de los concursos FIC radica en el trabajo...</p>
          </div>
          <div class="col-md-3">
            <img src="{{ asset('storage/img/lenguaje-señas.png') }}" class="d-block w-80" alt="Imagen 3">
              <p  class="TitulocarouselTD pt-3">Solicitud de Acceso</p>
               <p>Busca dentro de la información pública de la Institución...</p>
          </div>
          <div class="col-md-3">
            <img src="{{ asset('storage/img/arreglos-2.png') }}" class="d-block w-80" alt="Imagen 4">
              <p  class="TitulocarouselTD pt-3">Solicitud de Audiencia</p>
               <p>Ingresa a la PlataformaLey del Lobby y visualiza las solicitudes...</p>
          </div>
        </div>
      </div>

      <!-- Segundo Slide -->
      <div class="carousel-item pt-5">
      <div class="row">
          <div class="col-md-3 ">
            <img src="{{ asset('storage/img/icono-abeja.png') }}" class="d-block w-80" alt="Imagen 1">
            <p class="TitulocarouselTD pt-3">lorem ipsu</p>
             <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
          </div>
          <div class="col-md-3">
            <img src="{{ asset('storage/img/icono-turismo.png') }}" class="d-block w-80" alt="Imagen 2">
            <p class="TitulocarouselTD pt-3">lorem ipsu</p>
             <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
          </div>
          <div class="col-md-3">
            <img src="{{ asset('storage/img/lenguaje-señas.png') }}" class="d-block w-80" alt="Imagen 3">
            <p class="TitulocarouselTD pt-3">lorem ipsu</p>
             <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
          </div>
          <div class="col-md-3">
            <img src="{{ asset('storage/img/arreglos-2.png') }}" class="d-block w-80" alt="Imagen 4">
            <p class="TitulocarouselTD pt-3">lorem ipsu</p>
             <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Miniaturas -->
    <div class="carousel-indicators pt-5">
      <button type="button" data-bs-target="#thumbnail-slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#thumbnail-slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>

   
  </div>

  </div>



<!--Banner-->
<article class=" ">
    
    <h2>Add borders 123</h2>
    <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure to look under the hood at the source HTML here as we've adjusted the alignment and sizing of both column's content for equal-height.</p>
    <button class="btn btn-outline-secondary" type="button">Example button</button>

</article>
<!--Cuadro dentro del banner-->
<div class="row">
    <div class="col-md-4" style="height: 100%; margin-top: 12vw; background-color:#D9D9D980" id="banner">
        <div class="h-100 p-2 bg-body-tertiary border rounded-3">
            <h2>Add borders</h2>
            <p>Or, keep it light and add a border Or, keep it light and add a border</p>
            <button class="btn btn-outline-secondary" type="button">Example button</button>
        </div>
    </div>
   
    
    <div class="col-md-4" style="height: 100%; margin-top: 12vw; background-color:#D9D9D980" id="banner">
        <div class="h-100 p-2 bg-body-tertiary border rounded-3">
            <h2>Add borders</h2>
            <p>Or, keep it light and add a border Or, keep it light and add a border</p>
            <button class="btn btn-outline-secondary" type="button">Example button</button>
        </div>
    </div>
</div>

</div>
@endsection