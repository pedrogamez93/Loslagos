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
    .contenido-ley{
        border: 1px solid #F59120;
    }
    .card {
    border: none !important;
}
h5.card-title{
    font-family: 'Inter';
    font-Weight: 700;
    font-Size: 20px;
    Line-height: 24.2px;
    color: #565656;
}
    img.img-fluid.icon-style {
    width: 90px;
    height: 75px;
}
    a.final-btn{
        padding: 10px 20px;
        border-Radius: 100px;
        background-color: #F59120;
        color: #FFFFFF;
        font-Weight: 700;
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
Contenido del encabezado principal breadcumbs, titulo, bajadas
</header>
Contenido principal de tu página -->
<div class="container-fluid" style="background-color:#00548F;">
    <div class="row">
        <div class="col-md-12">
            <div class="container second content-breadc pt-5 pb-5">
                <div class="row" style="padding: 10px 0px 20px 55px;">
                    <div class="col-md-12" style="padding: 0;">
                        <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/<a href="/gobiernoregional/acerca"> Gobierno Regional</a> / <span style="font-Weight: 700;"><a href="/gobiernoregional/tramitesdigitales">Tramites Digitales</a></span></p>
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
                <div class="container titulo">
                    <div class="row">
                        <div class="col-md-12" style="padding: 0 0 0 3rem;">
                            <h1 class="mititulo mt-4 mb-2">Trámites Digitales</h1>

                            <div class="ve-tramites">
                                <h1 class="style-h1 mt-2 mb-5">It is a long will be distracted by the readable content of a page...</h1>
                                <div class="row">
                                    @forelse($tramites as $index => $tramite)
                                    <div class="col-md-3 mb-4">
                                        @if(isset($tramite->url_single))
                                            <a href="{{ $tramite->url_single }}" class="card-link">
                                        @else
                                            <a href="{{ route('tramites.show', $tramite->id) }}" class="card-link">
                                        @endif
                                            <div class="card">
                                                <img src="{{ asset($tramite->icono) }}" alt="" class="img-fluid icon-style">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $tramite->titulo }}</h5>
                                                    <p style="font-family: 'Inter'; font-weight: 400; font-size: 16px; line-height: 19.36px; color:#565656;">{{ $tramite->tags }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                        @if(($index + 1) % 4 == 0)
                                            </div>
                                            <div class="row">
                                        @endif
                                    @empty
                                        <p>No hay trámites disponibles.</p>
                                    @endforelse
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
