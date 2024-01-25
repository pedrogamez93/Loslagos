<!DOCTYPE html>
<style>
    .second{
        height: 450px;
        color: #fff; /* Cambia esto al color de texto que desees */
        padding: 20px; /* Añade relleno si es necesario */
        margin: 0; /* Elimina el margen para que ocupe toda la pantalla hacia los lados */
        top: 0; /* Lo fija en la parte superior */
        left: 0; /* Lo fija en la parte izquierda */
        z-index: 1000;
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
    p.title-cat{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 30px;
        Line-height: 36.31px;
        color: #565656;
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
    h1.mititulo{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 30px;
        color: #565656;
    }
    h2.mi-style{
        font-family: 'Inter';
        font-weight: 700;
        font-size: 20px;
        line-height: 24.2px;
        color: #F59120;
    }
    p.p-doc-tit{
        font-family: 'Inter';
        font-weight: 700;
        font-size: 20px;
        color: #565656;
    }
    p.p-doc-baj{
        font-family: 'Inter';
        font-weight: 400;
        font-size: 16px;
        color: #565656;  
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
</style>
<html>
<head>
    <meta charset="utf-8">
    <title>Tu Título Aquí</title>
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
                <div class="row">
                    <div class="col-md-12 p-0">
                    <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/<a href="/consejoregional/introduccion"><span> Consejo Regional</span></a> /<a href="/consejoregional/actas"> <span style="font-Weight: 700;">Actas</span></a></p>
                    </div>
                </div>
                    
                <div class="container content-prin pt-4 p-0">
                    <div class="row" >
                        <div class="col-md-12 p-0">
                            <p class="one-title pb-5">Consejo Regional</p>
                        </div>
                        <div class="col-md-6 p-0">
                            <p>Tiene por finalidad hacer efectiva la participación de la comunidad regional y está investido de facultades normativas, resolutivas y fiscalizadoras.</p>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </div>
</div>  
<main>
    <div class="container-fluid cat">
        <div class="row">
            <div class="col-md-12 pt-4 pb-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 p-0">
                        <p class="style-tag">Infórmate sobre nuestra Región...</p>

                        <h1 class="mititulo mt-4 mb-4">Actas</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container second mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        @foreach ($actas as $acta)
                            @if ($acta->documentonew)
                                <div class="col-md-3 mb-4">
                                    <div class="mi-documento d-flex align-items-center" style="border: 1px solid #F59120; padding: 5px;"><!-- Añade flexbox aquí -->
                                        <a href="{{ route('actas.showActa', $acta->id) }}" target="_blank" class="d-flex align-items-center"> <!-- Añade flexbox al enlace -->
                                            <img width="43px" height="44px" src="{{ asset('storage/images/pdf.png') }}" alt="Acta" style="margin-right: 10px;"> <!-- Añade margen a la imagen -->
                                            <div> <!-- Contenedor para los textos -->
                                                <p class="p-doc-tit">{{ $acta->documentonew->tema }}</p>
                                                <p class="p-doc-baj">Fecha y Hora: {{ $acta->documentonew->fecha_hora }}</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <!-- Enlaces de paginación -->
                    <div class="row">
                        <div class="col-12">
                            {{ $actas->links() }} <!-- Muestra los enlaces de paginación -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
@endsection