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
    .enlaces{
        Width: 392px !important;
        Height: 292px!important;
        border-radius: 10px;
        background-color: #00548F;
        color:#FFFFFF;
    }
    h1.mititulo{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 30px;
        color: #565656;
    }
    p.mi-style-onep{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 16px;
        color: #565656;
        padding-bottom: 2%;
    }
    p.mi-style-onet{
        font-family: 'Inter';
        font-Weight: 500;
        font-Size: 16px;
        color: #565656;
        padding-bottom: 2%;
    }
    .container.contenido-ley{
        padding: 3rem;
        border: 1px solid #F59120;
    }
    a.final-btn{
        padding: 10px 20px;
        border-Radius: 100px;
        background-color: #F59120;
        color: #FFFFFF;
        font-Weight: 700;
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
    <link rel="shortcut icon" type="image/png" href="{{ asset('storage/img/Favicon.png') }}">
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
                        <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/<a href="/gobiernoregional/acerca"> Gobierno Regional</a> / <span style="font-Weight: 700;"><a href="/gobiernoregional/leygobiernoregional">Ley Gobierno Regional</a></span></p>
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
                        <div class="col-md-12">
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
                <div class="container titulo">
                    <div class="row">
                        <div class="col-md-12" >
                            <p style="font-family: 'Inter'; font-weight: 600; font-style: italic; font-size: 16px; color: #00548F;">Infórmate sobre nuestra Región...</p>
                            <h1 class="mititulo mt-4">Ley</h1>
                        </div>
                    </div>
                </div>
                <div class="container contenido-ley mt-4 mb-5">
                    <div class="row">    
                        <div class="col-md-6">
                            <p class="mi-style-onep mt-4">Tipo de Norma:</p>

                            <p class="mi-style-onet">{{ $ley->tipo_norma }}</p>

                            <p class="mi-style-onep">Fecha publicación:</p>

                            <p class="mi-style-onet">{{ $ley->fecha_publicacion }}</p>

                            <p class="mi-style-onep">Fecha promulgación:</p>

                            <p class="mi-style-onet">{{ $ley->fecha_promulgacion }}</p>

                            <p class="mi-style-onep" >Organismo:</p>

                            <p class="mi-style-onet">{{ $ley->organismo }}</p>

                        </div>
                        <div class="col-md-6">

                            <p class="mi-style-onep mt-4">Título:</p>

                            <p class="mi-style-onet">{{ $ley->titulo }}</p>

                            <p class="mi-style-onep">Tipo de Versión:</p>

                            <p class="mi-style-onet">{{ $ley->tipo_version }}</p>

                            <p class="mi-style-onep">Inicio de Vigencia:</p>

                            <p class="mi-style-onet">{{ $ley->inicio_vigencia }}</p>

                            <p class="mi-style-onep">Url:</p>

                            <p class="mi-style-onet pb-4"><a style="color:#00548F; font-Weight:600;" href="{{ $ley->url }}">{{ $ley->url }}</a></p>

                            @if ($ley->enlacedoc)
                                <a class="final-btn" href="{{ route('ley.download', $ley->id) }}" target="_blank" style="position: absolute; margin-top: -1.5rem; right: 6.5rem;">Descarga Ley / PDF</a>
                            @else
                                <p>No hay documento PDF disponible.</p>
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
