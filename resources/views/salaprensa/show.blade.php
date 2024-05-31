<!-- resources/views/documentos/show.blade.php -->

@extends('layouts.app')

@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_salaprensa.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush

<div id="banner" class="h-500 text-light d-flex align-items-center colorB" style="background: #00548F ; height: 502px; display: flex; padding-left: 50px;">
    <div class="container">
        <h5>Home / Sala de prensa</h5>
        <h1 class="titulobannernoticia" style="text-align: left;">Sala de prensa </h1>
        <p>Visualiza aquí las noticias, fotografías y videos relacionados a nuestra región</p>
    </div>
</div>

<div class="contenido bg-white rounded-left rounded-top-left-90 mt-n6 colorB" style="min-height: 800px; margin-top: -7vh; border-radius: 70px 0px 0px 0px;">
    <div class="row py-5 px-5">
        <div id="divformulario" class="col-md-8 col-lg-12" style="padding: 4%;">
            <!-- Aquí se coloca el detalle de la noticia -->
            <div class="container">
                <h1 class="tituloform mb-1 colorB">{{ $noticia->titulo }}</h1>
                <p class="mb-5" style="color: #565656; font-family: Inter; font-size: 16px; font-style: italic; font-weight: 600; line-height: normal;">{{ $noticia->categoria }}</p>

                <div class="text-center">
                    @php
                        $fileExtension = pathinfo($noticia->archivo_path, PATHINFO_EXTENSION);
                        $isImage = in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']);
                        $isVideo = in_array($fileExtension, ['mp4', 'webm', 'ogg']);
                    @endphp

                    @if($isVideo)
                        <video class="card-img-top image-container img-fluid mx-auto d-block" controls style="max-width: 600px; max-height: 600px;">
                            <source src="{{ route('mostrar.video', ['carpeta' => 'saladeprensa', 'video' => basename($noticia->archivo_path)]) }}" type="video/{{ $fileExtension }}">
                            Tu navegador no soporta la reproducción de video.
                        </video>
                    @elseif($isImage)
                        <img src="{{ route('mostrar.imagen', ['carpeta' => 'saladeprensa', 'imagen' => basename($noticia->archivo_path)]) }}" class="card-img-top image-container img-fluid mx-auto d-block" alt="Imagen de la noticia" style="max-width: 600px; max-height: 600px;">
                    @endif
                </div>

                <p class="mt-5 colorB" style="color: #565656; font-family: Inter; font-size: 16px; font-style: normal; font-weight: 400; line-height: normal; white-space: pre-line;">{{ $noticia->descripcion }}</p>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector('.nav-head').style.setProperty('background-color', '#00548F');
        document.querySelector('.backgroundB').style.setProperty('background-color', '#00548F');
    });
</script>

@endsection
