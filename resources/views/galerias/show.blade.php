<!DOCTYPE html>
<style>
    header{
       /* width: 100%;*/
        height: 450px;
        background-color: #00548F;
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

    nav li {
        margin-right: 20px; 
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
    h1.titles{
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
    .descripB{
        font-family: Inter;
        font-size: 16px;
        font-weight: 500;
        line-height: 19px;
        letter-spacing: 0em;
        text-align: left;
        color:#fff;

    }

    .backgroundB{
          background-color: #F59120 !important;padding-left: 3vw;    border-bottom: 1px solid #fff;
        }
        .colorB{
            background-color:#F59120;
        }
        .nav-head{
            background-color:#F59120 !important;
        } 
        form label{
    font-family: Inter !important;
    font-Weight: 700;
    font-Size: 18px;
    Line-height: 36.31px;
    color: #565656;
    padding-top: 16px;
}
select option{
    font-family: Inter !important;
    font-Weight: 400;
    font-Size: 17px;
    Line-height: 36.31px;
    color: #565656;
}
form input, select, textarea{
    border: 1px solid #d7d2d2 !important;
    border-radius: 5px !important;
}
div#campoSugerencias {
    background-color: #e9e9e9;
    padding: 20px;
    margin: 15px 0;
}

label {
    display: block;
    margin-bottom: 5px;
}

input,
select,
textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
}

/* Estilo para ocultar campos específicos */
.campoOculto {
    display: none;
}  
.btn-enviar{
        padding: 10px 20px !important;
        border-Radius: 100px !important;
        background-color: #F59120 !important;
        color: #FFFFFF !important;
        font-Weight: 700 !important;
    }
    .slick-slider.mioev .item {
    width: 284px; /* Ancho del ítem */
    padding: 10px; /* Espaciado interno */
    box-sizing: border-box; /* Incluye el padding en el ancho total */
    }

    .slick-slider.mioev .item img {
        width: 100%; /* Asegura que la imagen ocupe todo el ancho del ítem */
        height: 284px; /* Altura fija para la imagen */
        object-fit: cover; /* Ajusta la imagen para cubrir todo el espacio, recortando lo que sobre */
    }
    .slick-slide img {
    display: block;
    width: 384px;
    height: 284px;
    object-fit: cover;
}

</style>
<html>
    <head>
        <meta charset="utf-8">
        <title>Región de los Lagos</title>
        <!-- Agrega aquí tus enlaces a hojas de estilo CSS, si es necesario -->
        <!-- Jquery -->
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
        <div class="container-fluid colorB">
            <div class="row">
                <div class="col-md-12">
                    <div class="container pt-5 pb-5">
                        <div class="row" >
                            <div class="col-md-12" >
                            <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/<a href=""></a><span style="font-Weight: 700;"><a href="/agenda">Galeria</a></span></p>
                            </div>
                            <div class="col-md-12 pt-5 pb-5">
                                <p class="one-title pb-4">Formulación Política de Turismo</p>

                                <p style="Width:623px;"  class="mb-3 descripB">Impulsar un diálogo regional e institucional con el propósito de formular una Política Regional de Turismo e Imagen Región</p>
                            </div>
                            
                        <div class="container pt-4">
                            <div class="row">
                                
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div> 
        <!-- Contenido principal de tu página -->
        <main>
            <div class="container-fluid cat">
                <div class="row">
                    <div class="col-md-12 pt-4 pb-4">                                  
                        <div class="container mt-5 mb-5">
                            <div class="row">
                                <div class="col-md-12 p-0">
                                    <div class="container int p-0">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h1 class="titles">Galerias</h1>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container mt-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="container">
                                                    {{-- Título de la Galería --}}
                                                    <h1 class="titles mb-4">{{ $galeria->nombre }}</h1>

                                                    <div class="slick-slider mioev">
                                                        @foreach ($galeria->imagenes as $imagen)
                                                            <div>
                                                                {{-- Enlace para abrir la imagen en Fancybox --}}
                                                                <a href="{{ route('imagen.mostrar', ['id' => $imagen->id]) }}" data-fancybox="gallery">
                                                                    <img src="{{ route('imagen.mostrar', ['id' => $imagen->id]) }}" alt="{{ $imagen->nombre }}" class="img-fluid">
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <!-- Tu script personalizado para inicializar Owl Carousel y Fancybox -->
        <script>
            $(document).ready(function(){
                $('.slick-slider.mioev').slick({
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
                $('[data-fancybox="gallery"]').fancybox({
                    // Opciones de Fancybox aquí si es necesario
                });
            });
        </script>
    </body>
</html>
@endsection
