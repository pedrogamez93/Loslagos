

@extends('layouts.app')

@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_home.css') }}" rel="stylesheet">
@endpush

  <div class="d-flex h-300 text-center " style="height: 700px; background-color: #389144;">
  
<div class="mt-5 cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  
<main class="container" class="headercontent">
    <div class="row p-5"  class="centrar">
        <div class="col colinputbuscador" >
            <div class="input-group rounded">
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
<div class="container-fluid">
  <div class="container mt-5" > 
            <div  class=" d-flex justify-content-between">
        <h3 style="">Sala de prensa</h3>
        <div>
    <button type="button" class="btn btn-outline-warning text-truncate d-sm-inline" style="border-radius: 100px;">
        Galeria Fotografica
    </button>
    <button type="button" class="btn btn-outline-warning text-truncate d-sm-inline" style="border-radius: 100px;"> 
        Videos
    </button>
</div>

    </div>
    
    <div class="mt-5 pb-5">
    <div id="thumbnail-slider" class="carousel">
        @foreach($salaprensa as $registro)
            <div class="carousel-item">
                <img src="{{ route('mostrar.imagen', ['carpeta' => 'salaprensa', 'imagen' => basename($registro->archivo_path)]) }}" class="img-fluid" alt="{{ $registro->titulo }}" style="width: 300px; height: 292px;">
                <div class="carousel-caption">
                    <h5>{{ $registro->titulo }}</h5>
                    <p>{{ $registro->descripcion }}</p>
                </div>
            </div>
        @endforeach
    </div>
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
    <h3 style="">Tramites Digitales  <a href="{{ route('salaprensa.index') }}" class="btn btn-primary btn-vertodos" style=" margin-right: 2vw;">Ver todos los Trámites</a></h3>
   
    <div>
        <button type="button" class="btn btn-outline-warning text-truncate d-sm-inline" style="border-radius: 100px;">
            Galeria Fotografica
        </button>
        <button type="button" class="btn btn-outline-warning text-truncate d-sm-inline" style="border-radius: 100px;"> 
            Videos
        </button>
    </div>
</div>

    
<div class="mt-5 pb-5">
    <div id="thumbnail-slider2" class="carousel">
        @foreach($tramitesDigitales as $tramite)
            <div class="carousel-item">
                <img src="{{ route('mostrar.imagen', ['carpeta' => 'iconos', 'imagen' => basename($tramite->icono)]) }}" class="mb-3" style="width: 150px; height:130px" alt="{{ $tramite->titulo }}">
                <div class="carousel-caption mb-3">
                    
                </div>
                <h5 class="titulotramites">{{ $tramite->titulo }}</h5>
                    <p class="descripciontramites">{{ $tramite->descripcion }}</p>
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

<div class="row py-5 my-5">
<div class="col">
    <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners1)]) }}" class="mb-3">
    <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners2)]) }}" class="mb-3">
    <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners3)]) }}" class="mb-3">
</div>
<div class="col">
    <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners4)]) }}" class="mb-3">
    <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners5)]) }}" class="mb-3">
    <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners6)]) }}" class="mb-3">
</div>
<div class="col">
    <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners7)]) }}" class="mb-3">
    <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners8)]) }}" class="mb-3">
    <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners9)]) }}" class="mb-3">
</div>
<div class="col">
    <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners10)]) }}" class="mb-3">
    <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners11)]) }}" class="mb-3">
    <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners12)]) }}" class="mb-3">
</div>

</div>


</div>
</div>





@endsection