

@extends('layouts.app')

@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_home.css') }}" rel="stylesheet">
@endpush

  <div class="d-flex h-300 text-center " style="height: 700px; background-color: #389144;">
  
<div class="mt-5 cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  
<main class="container" class="headercontent">
    <div class="row p-5" class="centrar">
        <div class="col colinputbuscador">
            <div id="divbuscador" class="input-group rounded">
                <div class="position-absolute mt-2">
                    <span class="" style="background-color: transparent; border: none; ">
                        <!-- <i class="bi bi-search"></i> -->
                    </span>
                </div>

                @if ($home)
                    <h1 class="titulohome">{{$home->titulobanner}}</h1>
                    <p class="descripcionhome">{{$home->descripcionbanner}}</p>
                @else
                    <h1 class="titulohome">Titulo</h1>
                    <p class="descripcionhome">Descripcion</p>
                @endif

                <form action="http://127.0.0.1:8000/buscador" method="GET" >
                    
                    
                    <div class="input-group input-group-rounded">
    <input class="input-group-field" id="inputbucador" name="q" type="search">
    <input type="submit" class="button secondary" value="Buscar">
</div>

   
</form>
            </div>
        </div>

        <div class="col">
        <div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/img/Rectangle13.png') }}" alt="Rectangle13" class="img-fluid">
        </div>
        <div class="col-md-6">
            <img src="{{ asset('storage/img/Rectangle14.png') }}" alt="Rectangle14" class="img-fluid">
        </div>
    </div>
</div>

        </div>
    </div>
</main>
 
</div>

  </div>

 <div class="esquina-curva"> </div>
<!--seccion de sala de prensa y tramite -->
<div class="container-fluid">

  <div class="container " > 
     <div  class=" d-flex justify-content-between">
        <h3 class="titleshome">Sala de prensa</h3>
        
        <div>
          
    <button type="button" class="btn btn-outline-warning text-truncate d-sm-inline" style="border-radius: 100px;">
        Galeria Fotografica
    </button>
    <button type="button" class="btn btn-outline-warning text-truncate d-sm-inline" style="border-radius: 100px;"> 
        Videos
    </button>
</div>

    </div>
    <p class="home-descripcion">
        Infórmate de los acontecimientos más recientes de nuestra región
        </p>
        <div class="mt-5 pb-5">
    <div id="thumbnail-slider" class="carousel">
    @foreach($salaprensa as $registro)
        <div class="carousel-item" style="position: relative;">
            <img src="{{ route('mostrar.imagen', ['carpeta' => 'salaprensa', 'imagen' => basename($registro->archivo_path)]) }}" class="img-fluid imagen-con-brillo" alt="{{ $registro->titulo }}" style="width: 300px; height: 292px; border-radius: 18px;">
            <div class="carousel-caption">
            <h5 style="" class="tituloprensa">{{ implode(' ', array_slice(str_word_count($registro->titulo, 1), 0, 4)) }}</h5>
            <h5 style="" class="descripcionprensa">{{ implode(' ', array_slice(str_word_count($registro->descripcion, 1), 0, 5)) }}</h5>
            <a style="right: 1px; bottom: 0px; position: absolute;" class="irnoticia" tabindex="-1">ir ahora <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    @endforeach
</div>




    <!-- Miniaturas -->
    <div class="carousel-indicators ">
      <button type="button" data-bs-target="#thumbnail-slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#thumbnail-slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>

   
        </div>


    <div class="row" style="justify-content: center;">
    <a href="{{ route('salaprensa.index') }}" class="btn btn-primary w-10 btn-vertodos mb-5" style="width:10rem;">Ver todos</a>


    </div>
  </div>
<div class="container mt-5">
<div class="d-flex justify-content-between">
    <h3 class="titleshome">Tramites Digitales  <a href="{{ route('salaprensa.index') }}" class="btn btn-primary btn-vertodos" style=" margin-right: 2vw;">Ver todos los Trámites</a></h3>
   
    <div>
        <button type="button" class="btn btn-outline-warning text-truncate d-sm-inline" style="border-radius: 100px;">
            Galeria Fotografica
        </button>
        <button type="button" class="btn btn-outline-warning text-truncate d-sm-inline" style="border-radius: 100px;"> 
            Videos
        </button>
    </div>
</div>
<p class="home-descripcion">
Actividades planeadas que involucran un accionar más amplio que un proyecto...
        </p>
    
<div class="mt-5 pb-5">
    <div id="thumbnail-slider2" class="carousel">
        @foreach($tramitesDigitales as $tramite)
            <div class="carousel-item">
                <img src="{{ route('mostrar.imagen', ['carpeta' => 'iconos', 'imagen' => basename($tramite->icono)]) }}" class="mb-3" style="width: 150px; height:130px" alt="{{ $tramite->titulo }}">
                <div class="carousel-caption mb-3">
                    
                </div>
                <h5 class="titulotramites">{{ $tramite->titulo }}</h5>
                <p style="" class="descripciontramites">{{ implode(' ', array_slice(str_word_count($tramite->descripcion, 1), 0, 4)) }}</p>
                  
            </div>
        @endforeach
    </div>
</div>

  </div>



<!--Banner-->

    <div class="bg-body-tertiary p-5 rounded mt-3">
        <h1 class="bannerinferior">Ahora puedes estar actualizado sobre nuestra región</h1>
        <p class="contenidobannerinferior">En búsqueda del desarrollo equitativo del territorio, propendiendo a la participación ciudadana y a la conservación del medio ambiente.</p>
        <a class="btn btn-outline-primary" href="/docs/5.3/components/navbar/" role="button" style="border-radius: 21px;">Ver todos los detalles</a>
    </div>

<!--Cuadro dentro del banner-->
<div class="container" style="margin-top: -8vw;">
  <div class="row justify-content-end">
    <div class="col-md-4" style="margin-left: -3vw;">
      <div class="card bg-gray-300 text-center" style="position: relative;">
        <div class="card-body">
          <h5 class="card-title" style="position: absolute; bottom: 15%; left: 0; width: 100%;">Resultados 2023</h5>
          <p class="card-text" style="position: absolute; bottom: 1%; left: 0; width: 100%;">Fondo comunidad (Evaluación)</p>
        </div>
      </div>
    </div>
    <div class="col-md-4" style="margin-left: -3vw;">
      <div class="card bg-gray-300 text-center" style="position: relative;">
        <div class="card-body">
        <h5 class="card-title" style="position: absolute; bottom: 15%; left: 0; width: 100%;">Fondo Comunidad</h5>
          <p class="card-text" style="position: absolute; bottom: 1%; left: 0; width: 100%;">Creando y Cuidando la Región</p>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="container">
    <div class="row py-5 my-5">
        <div class="col-3">
            <img src="{{ optional($home)->minibanners1 ?? asset('path/to/default_image.jpg') }}" class="mb-3">
            <img src="{{ optional($home)->minibanners2 ?? asset('path/to/default_image.jpg') }}" class="mb-3">
            <img src="{{ optional($home)->minibanners3 ?? asset('path/to/default_image.jpg') }}" class="mb-3">
        </div>
        <div class="col-3">
            <img src="{{ optional($home)->minibanners4 ?? asset('path/to/default_image.jpg') }}" class="mb-3">
            <img src="{{ optional($home)->minibanners5 ?? asset('path/to/default_image.jpg') }}" class="mb-3">
            <img src="{{ optional($home)->minibanners6 ?? asset('path/to/default_image.jpg') }}" class="mb-3">
        </div>
        <div class="col-3">
            <img src="{{ optional($home)->minibanners7 ?? asset('path/to/default_image.jpg') }}" class="mb-3">
            <img src="{{ optional($home)->minibanners8 ?? asset('path/to/default_image.jpg') }}" class="mb-3">
            <img src="{{ optional($home)->minibanners9 ?? asset('path/to/default_image.jpg') }}" class="mb-3">
        </div>
        <div class="col-3">
            <img src="{{ optional($home)->minibanners10 ?? asset('path/to/default_image.jpg') }}" class="mb-3">
            <img src="{{ optional($home)->minibanners11 ?? asset('path/to/default_image.jpg') }}" class="mb-3">
            <img src="{{ optional($home)->minibanners12 ?? asset('path/to/default_image.jpg') }}" class="mb-3">
        </div>
    </div>
</div>



</div>
</div>





@endsection