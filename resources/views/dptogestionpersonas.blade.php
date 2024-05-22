<!DOCTYPE html>
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
    h1.mititulo{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 30px;
        color: #565656;
    }
    p.title-doc{
        font-family: 'Inter';
        font-Weight: 600;
        font-Style: italic;
        font-Size: 30px;
        color: #F59120;
    }
    p.p-down, .mi-span{
        font-family: 'Inter';
        font-Weight: 500;
        font-Size: 16px;
        Line-height: 19.36px;
        color: #565656;
    }
    li.mi-list {
    margin-bottom: 15px;
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
    <title>Gobierno Regional</title>
    <!-- Agrega aquí tus enlaces a hojas de estilo CSS, si es necesario -->
    <!-- Jquery -->
</head>
<body>
@extends('layouts.app')
@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_documentos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush
    <!--Contenido principal de tu página -->
<div class="container-fluid color">
    <div class="row">
        <div class="col-md-12">
            <div class="container second content-breadc pt-5 pb-5">
                <div class="row">
                    <div class="col-md-12 p-0">
                        <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/<a href="/gobiernoregional/acerca"> Gobierno Regional</a> / <span style="font-Weight: 700;"><a href="/gobiernoregional/dptogestionpersonas">Gestión y Desarrollo de Personas</a></span></p>
                    </div>
                </div>
                    
                <div class="container content-prin pt-4 p-0">
                    <div class="row">
                        <div class="col-md-12 p-0">
                            <p class="one-title pb-5">Gobierno Regional</p>
                        </div>
                        <div class="col-md-6 p-0">
                            <p>El Gobierno Regional (GORE) es un organismo autónomo, que tiene por objetivo la administración de la región, impulsando su desarrollo económico, cultural y social</p>
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
                            <p class="title-cat">Selecciona una Categoría</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="container set pb-4 p-0">
                    @include('layouts.listacategorias')
                </div>
                <div class="container content mt-5 mb-5 p-0">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="bajada">
                                <h1 class="mititulo pb-4">{{ $departamento->titulo }}</h1>
                                <p class="p-down">{{ $departamento->bajada }}</p>
                            </div>
                        </div>
                        <div class="col-md-4" style="border-left: 2px solid #F59120;padding-left: 2rem;">
                            <p class="title-doc pb-4">Documentos</p>
                            @if (count($documentosTodos) > 0)
                                <ul>
                                    @foreach ($documentosTodos as $documento)
                                        <li class="mi-list">
                                            <a href="{{ asset('storage/' . $documento['ruta']) }}" target="_blank">
                                                <img width=43px height=44px src="{{ asset('storage/images/pdf.png') }}" alt="Descripción de la imagen" style="display: inline-block; vertical-align: middle;">    
                                                <span class="mi-span" style="display: inline-block; vertical-align: middle;">{{ $documento->nombre }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                @else
                                <p>No hay documentos disponibles en todos los departamentos.</p>
                            @endif
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
