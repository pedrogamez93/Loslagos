

@extends('layouts.app')

@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_home.css') }}" rel="stylesheet">
@endpush

  <div id="header" class="d-flex h-300 text-center colorB" style="">
  
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

                <form action="{{ url('/buscador') }}" method="GET" id="formbuscador">
                    
                    
                <div id="divformbuscador" class="input-group input-group-rounded">
    <div class="input-group-prepend">
        <span class="input-group-text" style="position: absolute;
    background-color: transparent !important;
    border: none;height: -webkit-fill-available;">
        <i class="bi bi-search"></i> <!-- Assuming you are using Font Awesome for icons -->
        </span>
    </div>
    <input class="input-group-field" id="inputbucador" name="q" type="search" placeholder="Buscar aquí">
    <div class="input-group-append">
        <input type="submit" class="button secondary" value="Buscar" id="btnbuscador">
    </div>
</div>


   
</form>
            </div>
        </div>

        <div id="columnaimg" class="col">
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

 <div class="esquina-curva colorB"> </div>
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
            <img src="{{ route('mostrar.imagen', ['carpeta' => 'saladeprensa', 'imagen' => basename($registro->archivo_path)]) }}" class="img-fluid imagen-con-brillo" alt="{{ $registro->titulo }}" style="width: 300px; height: 292px; border-radius: 18px;">
            <div class="carousel-caption">
            <p style="" class="tituloprensa">{{ implode(' ', array_slice(str_word_count($registro->titulo, 1), 0, 4)) }}</p>
            <p style="" class="descripcionprensa">{{ implode(' ', array_slice(str_word_count($registro->descripcion, 1), 0, 5)) }}</p>
            <a href="{{ route('salaprensa.show', ['id' => $registro->id]) }}" style="right: 1px; bottom: 0px; position: absolute;" class="irnoticia" tabindex="-1">ir ahora <i class="bi bi-arrow-right"></i></a>
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
    <h3 class="titleshome">Tramites Digitales  <a href="{{ url('/gobiernoregional/tramitesdigitales') }}" class="btn btn-primary btn-vertodos" style=" margin-right: 2vw;">Ver todos los Trámites</a></h3>
   
    
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

    <div class="bg-body-tertiary p-5 rounded mt-3 colorB">
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
        <div class="col-md-3">
        @isset($home->minibanners1) <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners1)]) }}" class="img-fluid mb-3">  @endisset
        @isset($home->minibanners2) <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners2)]) }}" class="img-fluid mb-3"> @endisset
        @isset($home->minibanners3) <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners3)]) }}" class="img-fluid mb-3"> @endisset
        </div>
        <div class="col-md-3">
        @isset($home->minibanners4) <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners4)]) }}" class="img-fluid mb-3"> @endisset
        @isset($home->minibanners5) <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners5)]) }}" class="img-fluid mb-3"> @endisset
        @isset($home->minibanners6) <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners6)]) }}" class="img-fluid mb-3"> @endisset
        </div>
        <div class="col-md-3">
        @isset($home->minibanners7) <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners7)]) }}" class="img-fluid mb-3"> @endisset
        @isset($home->minibanners8) <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners8)]) }}" class="img-fluid mb-3"> @endisset
        @isset($home->minibanners9) <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners9)]) }}" class="img-fluid mb-3"> @endisset
        </div>
        <div class="col-md-3">
        @isset($home->minibanners10)<img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners10)]) }}" class="img-fluid mb-3"> @endisset
        @isset($home->minibanners11)<img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners11)]) }}" class="img-fluid mb-3"> @endisset
        @isset($home->minibanners12)<img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners12)]) }}" class="img-fluid mb-3"> @endisset
        </div>
    </div>
</div>



</div>
</div>





@endsection