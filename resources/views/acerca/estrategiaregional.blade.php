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
</style>
<html>
<head>
    <meta charset="utf-8">
    <title>Tu Título Aquí</title>
    <!-- Agrega aquí tus enlaces a hojas de estilo CSS, si es necesario -->
    <!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body>
@extends('layouts.app')
@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_documentos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush
   <!-- <header>
         Contenido del encabezado barra de arriba logo, menu, etc...
        <div class="container top-bar">
            <div class="row" style="padding: 10px 0px 20px 50px;">
                <div class="col-md-2">
                    <img src="{{ asset('storage/images/logo.png') }}" alt="logo" style="max-width: 218px; max-height: 61px;">
                </div>
                <div class="col-md-8" style="align-self: center;">
                    <nav style="margin-left: 5rem;">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="/acerca">Gobierno Regional</a></li>
                            <li><a href="/contacto">Concejo Regional</a></li>
                            <li><a href="/contacto">Region de Los Lagos</a></li>
                            <li><a href="/contacto">Directorio de Funciones</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-2" style="align-self: center;">
                    <a href="" class="style-btn"><p class="style-btn">Infórmate aquí</p></a>
                </div>
            </div>
        </div>
    </header>
     Contenido principal de tu página -->
<div class="container-fluid" style="background-color:#00548F;">
    <div class="row">
        <div class="col-md-12">
            <div class="container second content-breadc pt-5 pb-5">
                <div class="row" style="padding: 10px 0px 20px 55px;">
                    <div class="col-md-12" style="padding: 0;">
                        <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/<a href="/gobiernoregional/acerca"> Gobierno Regional </a>/ <a href="/gobiernoregional/acerca"> Acerca</a> / <span style="font-Weight: 700;"><a href="/gobiernoregional/acerca/estrategiaregional">Estrategia Regional</a></span></p>
                    </div>
                </div>
                    
                <div class="container content-prin pt-4">
                    <div class="row" style="padding: 10px 0px 0px 25px;">
                        <div class="col-md-12">
                            <p class="one-title pb-5">Gobierno Regional</p>

                            <p style="Width:623px;">El Gobierno Regional (GORE) es un organismo autónomo, que tiene por objetivo la administración de la región, impulsando su desarrollo económico, cultural y social</p>
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
                        <div class="col-md-12" style="padding: 0 0 0 2.9rem;">
                            <p class="title-cat">Selecciona una Categoría</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container set pb-4">
                @include('layouts.listacategorias')
                </div>
                <div class="container mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="container int">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="style-tag pt-4 pb-4">{{ $estrategia->tag_comentario }}</p>
                                        <p class="title-cat pt-2 pb-2">{{ $estrategia->titulo }}</p>
                                        <p class="style-down pt-2 pb-2">{{ $estrategia->bajada }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" style="position: relative;">
                            <div class="container img">
                                <div class="row">
                                    <div class="col-md-12" style="text-align: -webkit-center;">
                                        <img src="{{ asset('storage/' . $estrategia->img) }}" alt="Imagen actual" style="max-width: 499px; max-height: 567px;">    
                                    </div>
                                </div>
                            </div>
                            <div class="container enlaces" style="position:absolute; top: 8rem;">
                                <div class="row" style="padding-top: 2rem; padding-left: 2rem; row-gap: 2rem;">
                                    <div class="container items">
                                        <div class="items">
                                            <a href="/gobiernoregional/acerca/comofunciona" target="_blank">
                                                <img src="{{ asset('storage/images/check.png') }}" alt="Descripción de la imagen">
                                                <p class="p-doc">Cómo Funciona el Gobierno Regional</p>
                                            </a>
                                        </div>

                                        <div class="items">
                                            <a href="/gobiernoregional/acerca/estrategiaregional" target="_blank">
                                                <img src="{{ asset('storage/images/check.png') }}" alt="Descripción de la imagen">
                                                <p class="p-doc">Estrategia Regional de Desarrollo</p>
                                            </a>
                                        </div>

                                        <div class="items">
                                            <a href="/gobiernoregional/acerca/inversionpublica" target="_blank">
                                                <img src="{{ asset('storage/images/check.png') }}" alt="Descripción de la imagen">
                                                <p class="p-doc">Inversión Pública en la Región</p>
                                            </a>
                                        </div>

                                        <div class="items">
                                            <a href="/gobiernoregional/acerca/misiongobierno" target="_blank">
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
<script>  
    document.addEventListener("DOMContentLoaded", function() {
      
        document.querySelector('.navbar').style.cssText = 'background-color: #00548F !important; border-bottom: 1px solid #FFFFFF;';
    });
</script>
@endsection
