<!-- resources/views/documentos/index.blade.php -->

@extends('layouts.app')

@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_salaprensa.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .card-noticias .image-container {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }
        .card-noticias .video-placeholder {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #000;
            height: 200px;
            width: 100%;
        }
        .card-body {
            position: absolute;
            bottom: 0;
          
            width: 100%;
        }
        .card-title {
            margin: 0;
        }
    </style>
@endpush

<div id="banner" class="h-500 text-light d-flex align-items-center colorB" style="background: #00548F ; height: 502px; display: flex; padding-left: 50px;">
    <div class="container">
        <h5>Home / Sala de prensa</h5>
        <h1 class="titulobannernoticia" style="text-align: left;">Sala de prensa </h1>
        <p>Visualiza aquí las noticias, fotografías y videos relacionados a nuestra región</p>
    </div>
</div>

<div class="contenido bg-white rounded-left rounded-top-left-90 mt-n6 colorB" style="min-height: 800px; margin-top: -7vh; border-radius: 70px 0px 0px 0px;">
    <div class="row px-5" style="padding-right: 10rem!important; padding-left: 10rem!important;">
        <div id="divformulario" class="col-md-8 col-lg-12" style="padding: 4%;">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="tituloform mb-5 colorB">Sala de Prensa</h4>
                
                <div>
                    <a type="button" class="btn btn-outline-warning text-truncate d-sm-inline change-category" data-category="Noticia" style="border-radius: 100px;">Noticias</a>
                    <a type="button" class="btn btn-outline-warning text-truncate d-sm-inline change-category" data-category="Video" style="border-radius: 100px;">Videos</a>
                    <a type="button" class="btn btn-outline-warning text-truncate d-sm-inline change-category" data-category="Galeria fotografica" style="border-radius: 100px;">Galería fotográfica</a>
                </div>
            </div>
            <!-- Aquí se colocan las noticias -->
            <div class="row" id="noticias-container">
                @foreach($noticias as $noticia)
                    <div class="col-md-3 mb-4 categoria-noticia" data-categoria="{{ $noticia->categoria }}">
                        <div class="card card-noticias">
                            @php
                                $fileExtension = pathinfo($noticia->archivo_path, PATHINFO_EXTENSION);
                                $isImage = in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']);
                                $isVideo = in_array($fileExtension, ['mp4', 'webm', 'ogg']);
                            @endphp

                            @if($isImage)
                                <img src="{{ route('mostrar.imagen', ['carpeta' => 'saladeprensa', 'imagen' => basename($noticia->archivo_path)]) }}" class="card-img-top image-container img-fluid" alt="Imagen de la noticia">
                            @elseif($isVideo)
                                <div class="video-placeholder image-container">
                                    <i class="bi bi-camera-video-fill" style="font-size: 4rem; color: white;"></i>
                                </div>
                            @endif

                            <div class="card-img-overlay">
                                <div class="card-body text-white">
                                    <h5 class="card-title titulonoticia mb-4">{{ $noticia->titulo }}</h5>
                                    <a href="{{ route('salaprensa.show', ['id' => $noticia->id]) }}" class="btn " style="color:white; padding: 6%; position: absolute; bottom: 0; right: 25px;">Ir ahora <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Paginación -->
            <div class="row">
                <div class="col-12">
                    {{ $noticias->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelector('.nav-head').style.setProperty('background-color', '#00548F');
        document.querySelector('.backgroundB').style.setProperty('background-color', '#00548F');

        // Agregar evento de clic a los botones de categoría
        var categoryButtons = document.querySelectorAll('.change-category');

        categoryButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                // Obtener la categoría de datos
                var category = button.dataset.category;

                // Filtrar noticias según la categoría
                filterNoticias(category);
            });
        });

        // Función para filtrar noticias
        function filterNoticias(category) {
            // Mostrar todas las noticias
            var noticias = document.querySelectorAll('.categoria-noticia');
            noticias.forEach(function (noticia) {
                noticia.style.display = 'block';
            });

            // Ocultar las noticias que no son de la categoría seleccionada
            var filteredNoticias = document.querySelectorAll('.categoria-noticia:not([data-categoria="' + category + '"])');
            filteredNoticias.forEach(function (noticia) {
                noticia.style.display = 'none';
            });
        }
    });
</script>

@endsection
