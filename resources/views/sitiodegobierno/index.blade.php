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
        <h1 class="titulodoc">Sitios de Gobierno </h1>
        <p>Infórmate aquí de las noticias más recientes del Gore</p>
    </div>
</div>

<div class="contenido bg-white rounded-left rounded-top-left-90 mt-n6" style="min-height: 800px; margin-top: -7vh; border-radius: 70px 0px 0px 0px;">
    <div class="row py-5 px-5">
        <div id="divformulario" class="col-md-8 col-lg-12" style="padding: 4%;">
            <h4 class="tituloform mb-5">Sitios de Gobierno</h4>

            <!-- Aquí se colocan las noticias -->
            <div class="row">
    @foreach($sitios as $sitio)
        <div class="col-md-12 mb-4">
            <div class="card card-noticias">
                <div class="row no-gutters">
                    <div class="col-md-2">
                        <img src="{{ asset($sitio->archivo_path) }}" style="max-height: 200px;max-width:200px" class="card-img img-fluid" alt="Imagen de la noticia">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text noticia-categoria">{{ $sitio->categoria }}</p>
                            <h5 class="card-title titulonoticia">{{ $sitio->titulo }}</h5>
                            <a href="{{ $sitio->url }}" class="btn btn-primary">Ir ahora</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>



            <!-- Paginación -->
            <div class="row">
                <div class="col-12">
                    {{ $sitios->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector('.navbar').style.setProperty('background-color', '#00548F', 'important');
    });
</script>

@endsection
