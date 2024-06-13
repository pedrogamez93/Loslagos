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
        font-family: 'Inter';
        font-Weight: 500;
        font-Size: 16px;
        Line-height: 24px;
        color: #565656;
        text-align: justify;
        white-space: pre-wrap;
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
        position: absolute;
        top: 8rem;
        border-radius: 10px;
        border-radius: 10px;
        background-color: #00548F;
        color:#FFFFFF;
    }
    .items {
        display: contents;
        align-items: flex-start; /* Alinea los elementos en la parte superior del contenedor */
        margin-bottom: 10px; /* Otra propiedad de estilo para ajustar el espacio entre los elementos */
    }

    .items img {
        width: 35px;
        height: 35px;
        display: inline-block;
        vertical-align: middle;
    }

    .items p {
        font-family: 'Inter';
        font-weight: 500;
        font-size: 16px;
        line-height: 19.36px;
        display: inline-block;
        vertical-align: middle;
        margin-left: 10px; /* Ajusta el espacio entre la imagen y el texto */
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
    .enlaces{
        top: 0rem;
    }
    .container.img {
        margin-top: 14rem;
    }
    a.location-movil {
    position: absolute;
    top: 81rem;
    left: 7rem;
    }
    p.style-down {
        margin-bottom: 2rem;
    }
    .container-fluid.cat{
        padding-left: 30px;
    }
    .container.enlaces{
        margin-left: 2rem;
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
<div class="container-fluid color">
    <div class="row">
        <div class="col-md-12">
            <div class="container second content-breadc pt-5 pb-5">
                <div class="row">
                    <div class="col-md-12" style="padding: 0;">
                        <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/<a href="/gobiernoregional/acerca"> Gobierno Regional </a>/ <a href="/gobiernoregional/acerca"> Acerca</a> / <span style="font-Weight: 700;"><a href="/gobiernoregional/acerca/misiongobierno">Misión Gobierno Regional</a></span></p>
                    </div>
                </div>
                    
                <div class="container content-prin pt-4 p-0">
                    <div class="row">
                        <div class="col-md-12  p-0">
                            <p class="one-title pb-5">Gobierno Regional</p>
                        </div>
                        <div class="col-md-6  p-0">
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
            <div class="col-md-12  p-0">
                <div class="container set p-0">
                    @include('layouts.listacategorias')
                </div>
                <div class="container mt-5 mb-5  p-0">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="container int">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="style-tag pt-4 pb-4">{{ $mision->tag_comentario }}</p>
                                        <p class="title-cat pt-2 pb-2">{{ $mision->titulo }}</p>
                                        <p class="style-down pt-2 pb-5">{{ $mision->bajada }}</p>

                                        <div class="location-final">
                                            <a class="location-movil" style="width: 178px; height:40px; border-radius:100px; font-family: 'Inter'; font-weight: 700; font-size: 16px; background-color: #F59120; color: #FFFFFF; padding: 10px;" href="{{ $mision->enlace }}">Más Información</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" style="position: relative;">
                            <div class="container img">
                                <div class="row">
                                    <div class="col-md-12" style="text-align: -webkit-center;">
                                        <img src="{{ asset($mision->img) }}" alt="Imagen actual">    
                                    </div>
                                </div>
                            </div>
                            <div class="container enlaces">
                                <div class="row" style="padding-top: 2rem; padding-left: 2rem; row-gap: 2rem;">
                                    <div class="container items">
                                        <div class="items">
                                            <a href="/gobiernoregional/acerca/comofunciona">
                                                <img src="{{ asset('storage/images/check.png') }}" alt="Descripción de la imagen">
                                                <p class="p-doc">Cómo Funciona el Gobierno Regional</p>
                                            </a>
                                        </div>

                                        <div class="items">
                                            <a href="/gobiernoregional/acerca/estrategiaregional">
                                                <img src="{{ asset('storage/images/check.png') }}" alt="Descripción de la imagen">
                                                <p class="p-doc">Estrategia Regional de Desarrollo</p>
                                            </a>
                                        </div>

                                        <div class="items">
                                            <a href="/gobiernoregional/acerca/inversionpublica">
                                                <img src="{{ asset('storage/images/check.png') }}" alt="Descripción de la imagen">
                                                <p class="p-doc">Inversión Pública en la Región</p>
                                            </a>
                                        </div>

                                        <div class="items">
                                            <a href="/gobiernoregional/acerca/misiongobierno">
                                                <img src="{{ asset('storage/images/check.png') }}" alt="Descripción de la imagen">
                                                <p class="p-doc">Misión</p>
                                            </a>
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
</body>
</html>
@endsection
