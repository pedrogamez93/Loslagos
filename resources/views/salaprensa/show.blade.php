<!-- resources/views/documentos/index.blade.php -->

@extends('layouts.app')

@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_salaprensa.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush

<div id="banner" class="h-500 text-light d-flex align-items-center" style="background: #00548F !important; height: 502px; display: flex; padding-left: 50px;">
    <div>
        <h5>Home / Gobierno Regional</h5>
        <h1 class="titulobannernoticia" style="text-align: left;">Sala de prensa </h1>
        <p>Infórmate aquí de las noticias más recientes del Gore</p>
    </div>
</div>

<div class="contenido bg-white rounded-left rounded-top-left-90 mt-n6" style="min-height: 800px; margin-top: -7vh; border-radius: 70px 0px 0px 0px;">
    <div class="row py-5 px-5">
        <div id="divformulario" class="col-md-8 col-lg-12" style="padding: 4%;">
           

            <!-- Aquí se colocan las noticias -->
            <div class="row">
            <div class="container">
    <h1 class="tituloform mb-1">{{ $noticia->titulo }}</h1>
    <p class="mb-5" style="color: #565656; font-family: Inter; font-size: 16px; font-style: italic; font-weight: 600; line-height: normal;">{{ $noticia->categoria }}</p>

    <div class="text-center">
        <img src="{{ route('mostrar.imagen', ['carpeta' => 'saladeprensa', 'imagen' => basename($noticia->archivo_path)]) }}" class="card-img-top image-container img-fluid mx-auto d-block" alt="Imagen de la noticia" style="max-width: 600px; max-height: 600px; ">
       
    </div>

    <p class="mt-5" style="color: #565656; font-family: Inter; font-size: 16px; font-style: normal; font-weight: 400; line-height: normal; white-space: pre-line;">{{ $noticia->descripcion }}</p>
</div>

</div>




            <!-- Paginación -->
            <div class="row">
                
            </div>
        </div>
    </div>
</div>


<script>
   
   document.addEventListener("DOMContentLoaded", function() {
     
       document.querySelector('.nav-head').style.setProperty('background-color', '#00548F', 'important');
       document.querySelector('.backgroundB').style.setProperty('background-color', '#00548F', 'important');
   });
</script> 

@endsection
