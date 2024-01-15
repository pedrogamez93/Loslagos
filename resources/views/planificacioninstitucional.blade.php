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
    h2.mistyle{
        font-family: 'Inter';
        font-weight: 600;
        font-Size: 20px;
        color:#565656;
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
</style>
<html>
<head>
    <meta charset="utf-8">
    <title>Tu Título Aquí</title>
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
    <!--<header>
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

         Contenido del encabezado principal breadcumbs, titulo, bajadas
        </header>
Contenido principal de tu página -->
<div class="container-fluid" style="background-color:#00548F;">
    <div class="row">
        <div class="col-md-12">
            <div class="container second content-breadc pt-5 pb-5">
                <div class="row" style="padding: 10px 0px 20px 55px;">
                    <div class="col-md-12" style="padding: 0;">
                        <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/<a href="/gobiernoregional/acerca"> Gobierno Regional</a> / <span style="font-Weight: 700;"><a href="/gobiernoregional/planificacioninstitucional">Planificación Institucional</a></span></p>
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
                <div class="container content mt-5 mb-5" style="padding-left: 3rem !important;">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="mistyle mb-5">Planificación Institucional</h2>
                                <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1rem;float: inline-start;">
                                    @foreach ($planificacion as $arti)
                                        <a href="{{ asset('storage/' . $arti->urldocs) }}" target="_blank" style="display: block; text-align: center;">
                                            <img width=43px height=44px src="{{ asset('storage/images/pdf.png') }}" alt="Descripción de la imagen" style="display: inline-block; vertical-align: middle;">    
                                            <span class="mi-span" style="display: inline-block; vertical-align: middle; width: 234px; text-align: left;">{{ $arti->titulo }}</span>
                                        </a>
                                    @endforeach
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>              
</main>
</html>
<script>  
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector('.nav-head').style.cssText = 'background-color: #00548F !important; border-bottom: 1px solid #FFFFFF;border-bottom:none !important;';
        document.querySelector('.navbar').style.cssText = 'background-color: #00548F !important; border-bottom: 1px solid #FFFFFF;';
    });
</script>
@endsection
