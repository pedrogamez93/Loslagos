<style>
    .second{
       /* width: 100%;*/
        height: 450px;
        color: #fff; /* Cambia esto al color de texto que desees */
        padding: 20px; /* Añade relleno si es necesario */
        margin: 0; /* Elimina el margen para que ocupe toda la pantalla hacia los lados */
        /*position: fixed;*/
        top: 0; /* Lo fija en la parte superior */
        left: 0; /* Lo fija en la parte izquierda */
        z-index: 1000;
    }
    .top-bar{
        border-bottom: 1px solid #FFFFFF;
    }
    nav ul {
        list-style: none; 
        padding: 0; 
        display: flex; 
    }

    nav a {
        text-decoration: none; 
    }
    p.style-bread{
        font-family:'Inter';
        font-Weight: 500;
        font-Size: 16px;
        Line-height: 19.36px;
        color: #FFFFFF;
    }
    p.style-tag{
        font-family: 'Inter';
        font-Weight: 600;
        font-Style: italic;
        font-Size: 16px;
        color: #00548F;
    }
    p.finalp.mb-4{
        font-family: 'Inter';
        font-Weight: 600;
        font-Size: 16px;
        color: #00548F;
    }
    p.title-cat{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 30px;
        Line-height: 36.31px;
        color: #565656;
    }
    p.style-down{
        width: 580px;
        font-family: 'Inter';
        font-Weight: 500;
        font-Size: 16px;
        Line-height: 24px;
        color: #565656;
        text-align: justify;
    }
    p.style-btn {
        padding: 7px 27px;
    }
    a.style-btn, p.style-btn{
        Width: 175px;
        Height: 40px;
        background-color: #FFFFFF33;
        color: #FFFFFF;
        font-family:'Inter';
        font-Weight: 700;
        font-Size: 16px;
        border-radius: 100px;
    }
    p.one-title{
        font-family:'Inter';
        font-Weight: 700;
        font-Size: 50px;
        line-height: 60.51px;
        color: #FFFFFF;
    }
    .cat{
        margin-top: -5rem;
        background-color: #FFFFFF;
        border-radius: 100px 0 0 0;
    }
    .enlaces{
        Width: 392px !important;
        Height: 292px!important;
        border-radius: 10px;
        background-color: #00548F;
        color:#FFFFFF;
    }
    /*css contenido*/
    h1.mititulo{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 30px;
        color: #565656;
    }
    .accordion-item {
    		border: none !important;
		}
		button.accordion-button {
    		background-color: rgba(0, 0, 0, 0) !important;
		}
        .accordion-button:focus, .accordion-button:not(.collapsed) {
            border: none !important;
            box-shadow: none !important;
        }
        button.accordion-button::before, button.accordion-button::after{
            border: none !important;
        }

    p.title-acord-one{
		font-family: 'Inter';
		font-Weight: 700;
		font-Size: 30px;
		color: #565656;0
	}

    p.title-acord{
			font-family: 'Inter';
			font-Weight: 700;
			font-Size: 20px;
			color: #565656;0
		}
	.bajada-acord{
			font-family: 'Inter';
			font-Weight: 500;
			font-Size: 16px;
			Line-height: 19.36px;
			color: #565656;
			text-align: justify;
	}

    p.title-categ{
        font-family: 'Inter';
        font-style: italic;
        font-Weight: 700;
        font-Size: 20px;
        line-height: 24.2px;
        color: #00548F;
    }

    h2.mi-style-h2{
        font-family: 'Inter';
        font-Weight: 600;
        font-Size: 20px;
        font-style: italic;
        line-height: 24.2px;
        color: #F59120;
        
    }
    .mi-documento{
        display: flex;
    }
    p.mistyle-final-pcateg{
        font-family: 'Inter';
        font-weight: 500;
        font-size: 16px;
        line-height: 19.36px;
        color: #565656;
    }
    h2.h2-seccion-btn-extras{
        font-family: 'Inter';
        font-weight: 700;
        font-Size: 16px;
        line-height: 19.36px;
        color: #565656;
    }
    a.final-btn{
        padding: 10px 20px;
        border-Radius: 100px;
        background-color: #F59120;
        color: #FFFFFF;
        font-Weight: 700;
    }
    a.mifinal-a{
        width: 146px;
        height: 40px;
        padding: 10px 20px;
        border-radius: 100px;
        background-color: #F59120;
        font-family: 'Inter';
        color: #FFFFFF;
        font-weight: 700;
        font-size: 16px;
        line-height: 19.36px;
        text-align: Center;
    }
    .container-fluid.color{
            background-color:#00548F;
    }
    .nav-head {
        background-color: #00548f !important;
    }
    .container-fluid.nav-head {
    background-color: #00548f;
    }
    nav.navbar.navbar-expand-lg.px-5.backgroundB.container {
    background-color: #00548f;
    }
    @media only screen and (max-width: 600px) {
    /* Estilos para pantallas móviles aquí */
    p.one-title{
        font-size:30px !important;
        padding-bottom: 0px!important;
    }
}

.botones-container {
        display: block;
        justify-content: space-around; /* Ajusta según necesites */
        align-items: center;
    }

    .btn-landing {
        padding: 10px;
        margin: 5px;
        text-decoration: none;
        background-color: #007bff; /* Color de fondo del botón */
        color: white; /* Color del texto */
        border-radius: 5px; /* Bordes redondeados */
    }
    .grid-container {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 10px;
}

.grid-item {
    /* Estilos para cada ítem, si necesitas */
}

img.mi-img-landing {
    height: 200px;
    width: 100%;
    object-fit: cover;
}
a.mifinal-a{
    padding: 10px 20px;
    border-radius: 100px;
    background-color: #F59120;
    font-family: 'Inter';
    color: #FFFFFF;
    font-weight: 700;
    font-size: 16px;
    line-height: 19.36px;
    text-align: Center;
}
p.text-sm.text-gray-700.leading-5 {
    display: none;
}
</style>
<html>
<head>
    <meta charset="utf-8">
    <title>Tu Título Aquí</title>
    <!-- Incluir jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Incluir Owl Carousel CSS y JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

<!-- Fancybox CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />

<!-- Fancybox JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
</head>
<body>
        @extends('layouts.app')
        @section('content')
        @push('styles')
            <link href="{{ asset('css/estilos_documentos.css') }}" rel="stylesheet">
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @endpush

        <div class="container-fluid color">
            <div class="row">
                <div class="col-md-12">
                    <div class="container second content-breadc pt-5 pb-5">
                        <div class="row" style="padding: 10px 0px 20px 55px;">
                            <div class="col-md-12" style="padding: 0;">
                                <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a> / <span><a href="">Landing Pages</a></span> / <span style="font-Weight: 700;"><a href="">{{ $landing->titulo }}</a></span></p>
                            </div>
                        </div>
                            
                        <div class="container content-prin pt-4">
                            <div class="row" style="padding: 10px 0px 0px 25px;">
                                <div class="col-md-12">
                                    <p class="one-title pb-5">{{ $landing->titulo }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $landing->tags }}</p>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid cat">
            <div class="row">
                <div class="col-md-12 pt-4 pb-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6" style="padding: 0 0 0 2.5rem;">
                                    <p class="title-categ mb-4"></p>

                                <h1 class="mititulo">{{ $landing->titulo }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container body">
            <div class="row">
                <div class="col-md-10">
                    <div class="container principal" style="padding: 0 0 0 2.5rem;">
                        <div class="row">
                            <div class="col-md-8">
                                <p>{{ $landing->descripcion }}</p>
                            </div>
                            <div class="col-md-4">
                                @foreach($landing->images as $image)
                                    <div>
                                        <img src="{{ Storage::url($image->ruta_imagen) }}" alt="{{ $image->nombre_imagen }}">
                                    </div>
                                    @break {{-- Sale del bucle después de imprimir la primera imagen --}}
                                @endforeach
                            </div>

                            @if($landing->btns->isNotEmpty())
                                <p class="finalp mb-4">Ir a las siguientes secciones</p>
                                <div class="botones-container mb-4">
                                    @foreach($landing->btns as $btn)
                                        @if($btn->url && $btn->nombre_btn) <!-- Verifica que el botón tenga URL y nombre -->
                                            <a class="mifinal-a mt-4" href="{{ $btn->url }}" class="btn-landing">{{ $btn->nombre_btn }}</a>
                                        @endif
                                    @endforeach
                                </div>
                            @endif

                            @if($landing->documentos->isNotEmpty())
                                <p class="finalp mb-4 mt-5">Documentos</p>
                                @foreach($landing->documentos as $documento)
                                    <div class="mi-documento mb-3">
                                        <a href="{{ route('downloaddocslanding', $documento->id) }}" target="_blank">
                                            <img width="43px" height="44px" src="{{ asset('storage/images/pdf.png') }}" alt="Descripción de la imagen" style="display: inline-block; vertical-align: middle;">
                                            <p class="p-doc mt-2 mb-2" style="font-family: 'Inter'; font-weight: 500; font-size: 16px; line-height: 19.36px; display: inline-block; vertical-align: middle; color:#565656;">{{ $documento->nombre_documento }}</p>
                                        </a>
                                    </div>
                                @endforeach
                            @endif

                            @if($images->isNotEmpty())
                                <p class="finalp mb-4 mt-5">Imágenes</p>
                                <div class="grid-container mt-4 mb-5">
                                    @foreach ($images as $image)
                                        <div class="grid-item">
                                            <a href="{{ Storage::url($image->ruta_imagen) }}" data-fancybox="gallery1">
                                                <img class="mi-img-landing" src="{{ Storage::url($image->ruta_imagen) }}" alt="{{ $image->nombre }}">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Mostrar links de paginación para las imágenes -->
                                <div>
                                    Mostrando {{ $images->firstItem() }} a {{ $images->lastItem() }} de {{ $images->total() }} resultados
                                </div>

                                <div class="pagi mb-5">
                                    {{ $images->links() }}
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <!-- Tu script personalizado para inicializar Owl Carousel y Fancybox -->
        <script>
            $(document).ready(function(){
                $('.slick-slider.mioe').slick({
                    dots: true,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 3, // Ajusta según el espacio disponible y el tamaño del ítem
                    slidesToScroll: 1,
                    autoplay: true, // Habilitar autoplay
                    autoplayTimeout: 3000, // Tiempo en milisegundos antes de pasar a la siguiente imagen
                    autoplayHoverPause: true,
                    // Añadir otras opciones de Slick aquí si es necesario
                });

                // Inicializar Fancybox para la galería
                $('[data-fancybox="gallery1"]').fancybox({
                    // Opciones de Fancybox aquí si es necesario
                });
            });
        </script>
    </body>
</html>
@endsection