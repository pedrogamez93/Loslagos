<!DOCTYPE html>
<style>
    p.enlaceM {
        color: #565656;
    }
    p.enlaceM:hover {
        font-Weight: 700;
    }
    .enlaceM{
        padding: 10px 0px;
    }
    .infoR{
        font-family: Inter;
         font-size: 20px;
          font-weight: 700;
           line-height: 24px;
            letter-spacing: 0em;
             text-align: left;
              color: #F59120;
    }
    .borderR{
        border-left: 2px solid #F59120;
    }
    .borderM {
        border-top: 2px solid #F59120;
        border-bottom: 2px solid #F59120;
        padding: 24px 0px;
        margin-bottom: 20px;
    }
    header{
       /* width: 100%;*/
        height: 450px;
        background-color: #00548F;
        color: #fff; /* Cambia esto al color de texto que desees */
        padding: 20px; /* Añade relleno si es necesario */
        margin: 0; /* Elimina el margen para que ocupe toda la pantalla hacia los lados */
        /*position: fixed;*/
        top: 0; /* Lo fija en la parte superior */
        left: 0; /* Lo fija en la parte izquierda */
        z-index: 1000;
    }
    .top-bar{
        border-bottom: 1px solid #FFFFFF;
    }
    nav ul {
        list-style: none; 
        padding: 0; 
        display: flex; 
    }



    nav a {
        text-decoration: none; 
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
        width: auto;
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
    /*lista categorias*/
    .lista-categorias {
        width: 100%;
        box-sizing: border-box;
    }

    #categoriasToggle {
        display: none;
    }

    #categorylist {
        display: table;
    
    }

    #categorylist li:first-child {
        position: relative;
    }

    #categorylist li {
        margin-right: 30px;
        margin-top: 10px;
        float: left;
    }

    #categorylist li a {
        box-sizing: border-box;
        font-family: 'Inter';
        background: none repeat scroll 0 0 #E5E8ED;;
        border: 1px solid #E5E8ED;
        border-radius: 8px;
        color: #565656;
        display: block;
        font-size: 16px;
        font-weight: 400;
        padding: 4px 12px;
        margin-top: 5px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        text-decoration: none;
    }

    #categorylist li a:hover{
        background-color: #64C69F;
        color: #FFFFFF;
    }

    #categoriasToggle {
        display: none;
    }
    .enlaces{
        Width: 392px !important;
        Height: 292px!important;
        border-radius: 10px;
        background-color: #00548F;
        color:#FFFFFF;
    }
    footer{
        height:535px;
        background-color: #389144;
    }
    .backgroundB{
        background-color: #00548F !important;
    }
    .descripB{
        font-family: Inter;
        font-size: 16px;
        font-weight: 500;
        line-height: 19px;
        letter-spacing: 0em;
        text-align: left;
        color:#fff;

    }
    a.a2 {
    color: #00548F !important;
    border-radius: 100px !important;
    border: 1px solid #00548F !important;
    font-weight: 700 !important;
}
.colorB{
            background-color:#00548F;
        }
        .nav-head{
            background-color:#00548f !important;
        }    
</style>
<html>
<head>
    <meta charset="utf-8">
    <title>Región de los Lagos</title>
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
<div class="container-fluid colorB">
    <div class="row">
        <div class="col-md-12">
            <div class="container pt-5 pb-5">
                <div class="row" >
                    <div class="col-md-12" >
                        <p class="style-bread"><a href="/">Home </a> / <span style="font-Weight: 700;"><a href="/gobiernoregional/asambleaclimatica">Región de los Lagos</a></span></p>                    </div>
                    </div>
                    <div class="col-md-12 pt-5 pb-5">
                        <p class="one-title pb-4">Región de los Lagos</p>

                        <p style="Width:623px;"  class="mb-3 descripB">Es considerada como la puerta del sur de nuestro país. Aquí comienza a sentirse de verdad el rigor del invierno</p>
                    </div>
                    
                <div class="container pt-4">
                    <div class="row">
                        
                    </div>
                </div>   
            </div>
        </div>
    </div>
</div> 
    <!-- Contenido principal de tu página -->
    <main>
    <div class="container-fluid cat">
        <div class="row">
            <div class="col-md-12 pt-4 pb-4">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-12 mt-5 pb-4">
                            <p class="title-cat mt-5">Selecciona una Categoría</p>
                        </div>
                    </div>
                </div>
                <div class="container set pb-4">
                    @include('layouts.listacategoriasRegionLagos')
                </div>
                <div class="container mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-4 d-block d-lg-none borderM">
                            <div class="container img">
                                <div class="row">
                                    <div class="col-md-12">
                                    <p class="infoR pb-4">Información de la Región</p>
                                    <p class="enlaceM"><a href="{{ route('Regionlagosprovincias.show', 'Antecedentes de la Región') }}" style="{{ request()->is('regionlagos/antecedentesregion*') ? 'font-weight: 700;' : '' }}">Antecedentes de la Región</a></p>
                                    <p class="enlaceM"><a href="{{ route('Regionlagosprovincias.show', 'Provincia de Osorno') }}">Provincia de Osorno</a></p>
                                    <p class="enlaceM"><a href="{{ route('Regionlagosprovincias.show', 'Provincia de Llanquihue') }}">Provincia de Llanquihue</a></p>
                                    <p class="enlaceM"><a href="{{ route('Regionlagosprovincias.show', 'Provincia de Chiloé') }}">Provincia de Chiloé</a></p>
                                    <p class="enlaceM"><a href="{{ route('Regionlagosprovincias.show', 'Provincia de Palena') }}">Provincia de Palena</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 pl-0">
                            <div class="container int p-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="style-tag pt-0 pb-4">{{ $introduccion->subtitulo }}</p>
                                        <p class="title-cat pt-2 pb-2">{{ $introduccion->nombreseccion }}</p>
                                        <p class="style-down pt-2 pb-2 pr-4">{!! $introduccion->descripcion ?? '' !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                            

                        <div class="col-md-4 d-none d-lg-block borderR">
                            <div class="container  img">
                                <div class="row">
                                    <div class="col-md-12">
                                    <p class="infoR pb-4">Información de la Región</p>
                                    <p class="enlaceM"><a href="{{ route('Regionlagosprovincias.show', 'Antecedentes de la Región') }}" style="{{ request()->is('regionlagos/antecedentesregion*') ? 'font-weight: 700;' : '' }}">Antecedentes de la Región</a></p>
                                    <p class="enlaceM"><a href="{{ route('Regionlagosprovincias.show', 'Provincia de Osorno') }}">Provincia de Osorno</a></p>
                                    <p class="enlaceM"><a href="{{ route('Regionlagosprovincias.show', 'Provincia de Llanquihue') }}">Provincia de Llanquihue</a></p>
                                    <p class="enlaceM"><a href="{{ route('Regionlagosprovincias.show', 'Provincia de Chiloé') }}">Provincia de Chiloé</a></p>
                                    <p class="enlaceM"><a href="{{ route('Regionlagosprovincias.show', 'Provincia de Palena') }}">Provincia de Palena</a></p>
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
    <!-- Agrega aquí tus scripts de JavaScript, si es necesario -->
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Obtenemos la URL actual
        var currentUrl = window.location.href;

        // Seleccionamos todos los enlaces dentro de #categorylist
        var links = document.querySelectorAll("#categorylist li a");

        // Iteramos sobre los enlaces
        links.forEach(function (link) {
            // Verificamos si la URL actual coincide con la href del enlace
            if (currentUrl.includes(link.getAttribute("href"))) {
                // Agregamos la clase activa
                link.classList.add("active");
            }
        });
    });
</script>
</body>
</html>

@endsection