

@extends('layouts.app')

@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_home.css') }}" rel="stylesheet">
    <style>
  .mySwiper {
      width: 100%;
      height: 800px;
  }

  .swiper-slide img {
      width: 100%;
      height: auto;
      object-fit: cover;
      min-height: 800px;
      max-height: 800px ;
      filter: brightness(70%);

  }
  .mySwiper {
      position: relative;
   
     
  }

  .cover-container {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 10; /* Asegura que esté sobre el slider */
  }
</style>
@endpush

<div class="swiper mySwiper">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <div class="mt-5 cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  
  <main class="container" class="headercontent">
      <div class="row p-5" class="centrar ">
          <div class="col colinputbuscador">
              <div id="divbuscador" class="input-group rounded">
                 
  
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
      border: none;">
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
      <!--<div class="row">
          <div class="col-md-6">
              <img src="{{ asset('storage/img/Rectangle13.png') }}" alt="Rectangle13" class="img-fluid">
          </div>
          <div class="col-md-6">
              <img src="{{ asset('storage/img/Rectangle14.png') }}" alt="Rectangle14" class="img-fluid">
          </div>
      </div> -->
  </div>
  
          </div>
      </div>
  </main>
   
  </div>
    </div>

    <div class="swiper-wrapper">
        <!-- Slides -->
        @isset($home->slider1)
        <div class="swiper-slide">
       <img src="{{ route('mostrar.imagen', ['carpeta' => 'sliders', 'imagen' => basename($home->slider1)]) }}" > 
        </div>
        @endisset
        @isset($home->slider2)
        <div class="swiper-slide">
       <img src="{{ route('mostrar.imagen', ['carpeta' => 'sliders', 'imagen' => basename($home->slider2)]) }}" >
        </div>
        @endisset
        @isset($home->slider3)
        <div class="swiper-slide">
       <img src="{{ route('mostrar.imagen', ['carpeta' => 'sliders', 'imagen' => basename($home->slider3)]) }}" >
        </div>
        @endisset
        @isset($home->slider4)
        <div class="swiper-slide">
        <img src="{{ route('mostrar.imagen', ['carpeta' => 'sliders', 'imagen' => basename($home->slider4)]) }}" >
        </div>
        @endisset
        @isset($home->slider5) 
        <div class="swiper-slide">
       <img src="{{ route('mostrar.imagen', ['carpeta' => 'sliders', 'imagen' => basename($home->slider5)]) }}" > 
        </div>
        @endisset
       
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-scrollbar"></div>
</div>
 

 <div class="esquina-curva colorB"> </div>
<!--seccion de sala de prensa y tramite -->
<div class="container-fluid">

  <div class="container " > 
     <div id="containersalaprensa" class=" d-flex justify-content-between">
        <h3 class="titleshome">Sala de prensa</h3>
        
        <div>
          
        <a href="{{ url('/saladeprensa') }}" type="button" class="btn btn-outline-warning text-truncate d-sm-inline change-category" data-category="galeria" style="border-radius: 100px;">
    Galería fotográfica
</a>

<a href="{{ url('/saladeprensa') }}" type="button" class="btn btn-outline-warning text-truncate d-sm-inline change-category" data-category="videos" style="border-radius: 100px;"> 
    Videos
</a>
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
            <p style="" class="tituloprensa">{{ implode(' ', array_slice(str_word_count($registro->titulo, 1), 0, 5)) }}</p>
            
            <a href="{{ route('salaprensa.show', ['id' => $registro->id]) }}" style="right: 1px; bottom: 0px; position: absolute;" class="irnoticia" tabindex="-1">Ir ahora <i class="bi bi-arrow-right"></i></a>
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
    <h3 class="titleshome">Trámites Digitales  <a href="{{ url('/gobiernoregional/tramitesdigitales') }}" class="btn btn-primary btn-vertodos" style=" margin-right: 2vw;">Ver todos los trámites</a></h3>
   
    
</div>
<p class="home-descripcion">
Actividades planeadas que involucran un accionar más amplio que un proyecto
        </p>
    
<div class="mt-5 pb-5">
    <div id="thumbnail-slider2" class="carousel">
        @foreach($tramitesDigitales as $tramite)
        @if(isset($tramite->url_single))
         <a href="{{ $tramite->url_single }}" >
            @else
             <a href="{{ route('tramites.show', $tramite->id) }}" >
              @endif
         
        <div class="carousel-item">
                <img src="{{ route('mostrar.imagen', ['carpeta' => 'iconos', 'imagen' => basename($tramite->icono)]) }}" class="mb-3" style="width: 150px; height:130px" alt="{{ $tramite->titulo }}">
                <div class="carousel-caption mb-3">
                    
                </div>
                <h5 class="titulotramites">{{ $tramite->titulo }}</h5>
               
                 
            </div>
            </a>
        @endforeach
    </div>
</div>

  </div>



<!--Banner-->

<div class="bg-body-tertiary p-5 rounded mt-3 colorB" style="padding: 0px !important; position: relative; overflow: hidden;">
    <div style="background-image: url('{{ asset('img/bannerregion.png') }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                position: relative;
                
                display: flex;
                flex-direction: column;
                justify-content: center;" id="fondobanner"> 

        <!-- Capa adicional con filtro de brillo -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>

        <div class="container" id="contenidobannerregion" style="position: relative; z-index: 1;">
            <h1 class="bannerinferior">Ahora puedes estar actualizado sobre nuestra región</h1>
            <p class="contenidobannerinferior">En búsqueda del desarrollo equitativo del territorio, propendiendo a la participación ciudadana y a la conservación del medio ambiente.</p>
            <a class="btn btn-outline-primary" href="regionlagos/introduccion" role="button" style="border-radius: 21px; color: white; border-color: white;">Ver todos los detalles</a>
        </div>
    </div>  
</div>

<!--Cuadro dentro del banner-->
<div class="container" style="margin-top: -8vw;">
  <div class="row justify-content-end">
    <div class="col-md-4" style="margin-left: -3vw;">
    <div class="  text-center" style="position: relative;">
      <a href="https://fondocomunidad.goreloslagos.cl/login">
      <img src="{{ asset('img/politicaregionapersonas.png') }}" alt="Fondo Comunidad">
      </a>
      </div>
    </div>
    <div class="col-md-4" style="margin-left: -3vw;">
      <div class="  text-center" style="position: relative;">
      <a href="https://fondocomunidad.goreloslagos.cl/login">
      <img src="{{ asset('img/fondocomunidad.png') }}" alt="Fondo Comunidad">
      </a>
      </div>
    </div>
  </div>
</div>


<div class="mt-5 pb-5" id="mibannermobil">
    <div id="thumbnail-slider3" class="carousel">
        
             <a href="" >
            <div class="carousel-item">
                    <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners1)]) }}" class="mb-3" style="width: 100%; height:auto" alt="">
                    <div class="carousel-caption mb-3">                       
                    </div>
                        <h5 class=""></h5>                                    
                    </div>
            </a>

            <a href="" >
                 <div class="carousel-item">
                    <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners2)]) }}" class="mb-3" style="width: 100%; height:auto" alt="">
                        <div class="carousel-caption mb-3">                       
                        </div>
                        <h5 class=""></h5>                                    
                 </div>
            </a>


                <a href="" >                 
                    <div class="carousel-item">
                        <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners3)]) }}" class="mb-3" style="width: 100%; height:auto" alt="">
                            <div class="carousel-caption mb-3">                        
                        </div>
                        <h5 class=""></h5>                                    
                    </div>
                </a>


                <a href="" >                 
                    <div class="carousel-item">
                        <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners4)]) }}" class="mb-3" style="width: 100%; height:auto" alt="">
                            <div class="carousel-caption mb-3">                        
                        </div>
                        <h5 class=""></h5>                                    
                    </div>
                </a>



                <a href="" >                 
                    <div class="carousel-item">
                        <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners6)]) }}" class="mb-3" style="width: 100%; height:auto"" alt="">
                            <div class="carousel-caption mb-3">                        
                        </div>
                        <h5 class=""></h5>                                    
                    </div>
                </a>


                <a href="" >                 
                    <div class="carousel-item">
                        <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners7)]) }}" class="mb-3" style="width: 100%; height:auto" alt="">
                            <div class="carousel-caption mb-3">                        
                        </div>
                        <h5 class=""></h5>                                    
                    </div>
                </a>


                <a href="" >                 
                    <div class="carousel-item">
                        <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners8)]) }}" class="mb-3" style="width: 100%; height:auto" alt="">
                            <div class="carousel-caption mb-3">                        
                        </div>
                        <h5 class=""></h5>                                    
                    </div>
                </a>


                <a href="" >                 
                    <div class="carousel-item">
                        <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners9)]) }}" class="mb-3" style="width: 100%; height:auto" alt="">
                            <div class="carousel-caption mb-3">                        
                        </div>
                        <h5 class=""></h5>                                    
                    </div>
                </a>


                <a href="" >                 
                    <div class="carousel-item">
                        <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners10)]) }}" class="mb-3" style="width: 100%; height:auto" alt="">
                            <div class="carousel-caption mb-3">                        
                        </div>
                        <h5 class=""></h5>                                    
                    </div>
                </a>


                <a href="" >                 
                    <div class="carousel-item">
                        <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners11)]) }}" class="mb-3" style="width: 100%; height:auto" alt="">
                            <div class="carousel-caption mb-3">                        
                        </div>
                        <h5 class=""></h5>                                    
                    </div>
                </a>

                <a href="" >                 
                    <div class="carousel-item">
                        <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners12)]) }}" class="mb-3" style="width: 100%; height:auto" alt="">
                            <div class="carousel-caption mb-3">                        
                        </div>
                        <h5 class=""></h5>                                    
                    </div>
                </a>


                <a href="" >                 
                    <div class="carousel-item">
                        <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners13)]) }}" class="mb-3" style="width: 100%; height:auto" alt="">
                            <div class="carousel-caption mb-3">                        
                        </div>
                        <h5 class=""></h5>                                    
                    </div>
                </a>


                <a href="" >                 
                    <div class="carousel-item">
                        <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners14)]) }}" class="mb-3" style="width: 100%; height:auto" alt="">
                            <div class="carousel-caption mb-3">                        
                        </div>
                        <h5 class=""></h5>                                    
                    </div>
                </a>


                <a href="" >                 
                    <div class="carousel-item">
                        <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners15)]) }}" class="mb-3" style="width: 100%; height:auto" alt="">
                            <div class="carousel-caption mb-3">                        
                        </div>
                        <h5 class=""></h5>                                    
                    </div>
                </a>


                <a href="" >                 
                    <div class="carousel-item">
                        <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners16)]) }}" class="mb-3" style="width: 100%; height:auto" alt="">
                            <div class="carousel-caption mb-3">                        
                        </div>
                        <h5 class=""></h5>                                    
                    </div>
                </a>


                

      
    </div>
</div>


<div class="container" id="minibanners">
    <div class="row py-5 my-5" style="display: flex;
    justify-content: center;">
        <div class="col-lg-2">
        @isset($home->minibanners1) <a href="{{$home->url_minibanner1}}"><img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners1)]) }}" class="img-fluid mb-3"> </a> @endisset
        @isset($home->minibanners2) <a href="{{$home->url_minibanner2}}"> <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners2)]) }}" class="img-fluid mb-3"></a> @endisset
        @isset($home->minibanners3) <a href="{{$home->url_minibanner3}}"> <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners3)]) }}" class="img-fluid mb-3"></a> @endisset
        @isset($home->minibanners4) <a href="{{$home->url_minibanner4}}"> <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners4)]) }}" class="img-fluid mb-3"></a> @endisset   
    </div>
        <div class="col-lg-2">
        @isset($home->minibanners5) <a href="{{$home->url_minibanner5}}"> <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners5)]) }}" class="img-fluid mb-3"></a> @endisset
        @isset($home->minibanners6) <a href="{{$home->url_minibanner6}}"> <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners6)]) }}" class="img-fluid mb-3"></a> @endisset
        @isset($home->minibanners7) <a href="{{$home->url_minibanner7}}"> <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners7)]) }}" class="img-fluid mb-3"></a> @endisset
        @isset($home->minibanners8) <a href="{{$home->url_minibanner8}}"> <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners8)]) }}" class="img-fluid mb-3"></a> @endisset   
    </div>
        <div class="col-lg-2">
        @isset($home->minibanners9) <a href="{{$home->url_minibanner9}}"> <img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners9)]) }}" class="img-fluid mb-3"> </a>@endisset
        @isset($home->minibanners10) <a href="{{$home->url_minibanner10}}"><img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners10)]) }}" class="img-fluid mb-3"></a> @endisset
        @isset($home->minibanners11) <a href="{{$home->url_minibanner11}}"><img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners11)]) }}" class="img-fluid mb-3"></a> @endisset
        @isset($home->minibanners12) <a href="{{$home->url_minibanner12}}"><img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners12)]) }}" class="img-fluid mb-3"></a> @endisset   
    </div>
        <div class="col-lg-2">
        @isset($home->minibanners13) <a href="{{$home->url_minibanner13}}"><img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners13)]) }}" class="img-fluid mb-3"></a> @endisset
        @isset($home->minibanners14) <a href="{{$home->url_minibanner14}}"><img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners14)]) }}" class="img-fluid mb-3"></a> @endisset
        @isset($home->minibanners15) <a href="{{$home->url_minibanner15}}"><img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners15)]) }}" class="img-fluid mb-3"></a> @endisset
        @isset($home->minibanners16) <a href="{{$home->url_minibanner16}}"><img src="{{ route('mostrar.imagen', ['carpeta' => 'minibanners', 'imagen' => basename($home->minibanners16)]) }}" class="img-fluid mb-3"></a> @endisset    
    </div>
       
    </div>
</div>






</div>
</div>


@if ($popupUnico)
    <div class="modal fade" id="miModal" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <!-- Agrega la clase `modal-dialog-centered` para centrar el modal -->
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="miModalLabel"><b>{{ $popupUnico->title }}</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
            @if ($popupUnico->description!="")
            <div class="modal-body">
                {!! $popupUnico->description ?? '' !!}
            </div>
            @else
            <div class="modal-body p-0">
                <a href="{{ $popupUnico->url }}"><img src="{{ asset($popupUnico->image_url) }}" alt="Imagen actual" ></a>
            </div>
            @endif
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
    </div>
    @endif


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


@push('scripts')


<script>
// Función para mostrar el modal al cargar la página
    $(document).ready(function() {
        $('#miModal').modal('show');
    });
</script>
<!-- Agrega aquí tus scripts de JavaScript, si es necesario -->
<script>
$(document).ready(function() {
    $('.swiper-slide img').each(function() {
        var img = $(this);

        // Función para ajustar el estilo
        function adjustImageStyle() {
            var aspectRatio = img[0].naturalWidth / img[0].naturalHeight;

            if (aspectRatio > 3) {
                img.css({
                    'object-fit': 'contain',
                    'height': 'auto',
                    'width': '100%'
                });
            }
        }

        // Ajusta la imagen si ya está cargada
        if (img[0].complete) {
            adjustImageStyle();
        } else {
            // Ajusta la imagen una vez se haya cargado
            img.on('load', adjustImageStyle);
        }
    });
});

</script>


@endpush

@endsection