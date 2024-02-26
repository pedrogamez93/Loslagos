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
    .top-bar{
        border-bottom: 1px solid #FFFFFF;
    }
    nav ul {
        list-style: none; 
        padding: 0; 
        display: flex; 
    }

    nav li {
        margin-right: 20px; 
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
    /*css contenido*/
    h1.mititulo{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 30px;
        color: #565656;
    }
    .accordion-item {
    		border: none !important;
		}
		button.accordion-button {
    		background-color: rgba(0, 0, 0, 0) !important;
		}
        .accordion-button:focus, .accordion-button:not(.collapsed) {
            border: none !important;
            box-shadow: none !important;
        }
        button.accordion-button::before, button.accordion-button::after{
            border: none !important;
        }

    p.title-acord-one{
		font-family: 'Inter';
		font-Weight: 700;
		font-Size: 30px;
		color: #565656;0
	}

    p.title-acord{
			font-family: 'Inter';
			font-Weight: 700;
			font-Size: 20px;
			color: #565656;0
		}
	.bajada-acord{
			font-family: 'Inter';
			font-Weight: 500;
			font-Size: 16px;
			Line-height: 19.36px;
			color: #565656;
			text-align: justify;
	}

    p.title-categ{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 20px;
        line-height: 24.2px;
        color: #F59120
    }

    h2.mi-style-h2{
        font-family: 'Inter';
        font-Weight: 600;
        font-Size: 20px;
        font-style: italic;
        line-height: 24.2px;
        color: #F59120;
        
    }
    .mi-documento{
        display: flex;
    }
    p.mistyle-final-pcateg{
        font-family: 'Inter';
        font-weight: 500;
        font-size: 16px;
        line-height: 19.36px;
        color: #565656;
    }
    h2.h2-seccion-btn-extras{
        font-family: 'Inter';
        font-weight: 700;
        font-Size: 16px;
        line-height: 19.36px;
        color: #565656;
    }
    a.final-btn{
        padding: 10px 20px;
        border-Radius: 100px;
        background-color: #F59120;
        color: #FFFFFF;
        font-Weight: 700;
    }
    a.mifinal-a{
        width: 146px;
        height: 40px;
        padding: 10px 20px;
        border-radius: 100px;
        background-color: #F59120;
        font-family: 'Inter';
        color: #FFFFFF;
        font-weight: 700;
        font-size: 16px;
        line-height: 19.36px;
        text-align: Center;
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
    <!-- DATEPICKER-->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <!-- Incluye los archivos JS de CKEditor -->
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
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
                <div class="row" style="padding: 10px 0px 20px 55px;">
                    <div class="col-md-12" style="padding: 0;">
                        <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/<a href="/gobiernoregional/acerca"> Gobierno Regional</a> / <span><a href="/gobiernoregional/tramitesdigitales">Tramites Digitales</a></span>/ <span style="font-Weight: 700;"><a href="">{{ $tramite->titulo }}</a></span></p>
                    </div>
                </div>
                    
                <div class="container content-prin pt-4">
                    <div class="row" style="padding: 10px 0px 0px 25px;">
                        <div class="col-md-12">
                            <p class="one-title pb-5">Gobierno Regional</p>
                        </div>
                        <div class="col-md-6">
                            <p>El Gobierno Regional (GORE) es un organismo autónomo, que tiene por objetivo la administración de la región, impulsando su desarrollo económico, cultural y social</p>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </div>
</div>
<div class="container-fluid cat">
        <div class="row">
            <div class="col-md-12 pt-4 pb-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6" style="padding: 0 0 0 2.5rem;">
                            <p class="title-cat">Trámite digital: {{ $tramite->titulo }}</p>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                @if($tramite->icono)
                                    <img src="{{ asset($tramite->icono) }}" alt="Icono actual" style="max-width: 100px; max-height: 100px;">
                                @else
                                    <p>No hay icono actual.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container body">
    <div class="row">
        <div class="col-md-10">
            <div class="container principal" style="padding: 0 0 0 2.5rem;">
                <div class="row">

                    <p class="style-tag pt-4 pb-4">{{ $tramite->tags }}</p>
                        
                    <div class="style-cont mt-4 mb-4">{!! $tramite->descripcion !!}</div>

                    @if ($tramite->fecha_apertura || $tramite->fecha_cierre)
                        <div class="row mt-4">
                            @if ($tramite->fecha_apertura)
                                <div class="col-md-6">
                                    <p><strong>FECHA DE APERTURA</strong></p>
                                    <p>{{ $tramite->fecha_apertura }}</p>
                                </div>
                            @endif

                            @if ($tramite->fecha_cierre)
                                <div class="col-md-6">
                                    <p><strong>FECHA DE CIERRE</strong></p>
                                    <p>{{ $tramite->fecha_cierre }}</p>
                                </div>
                            @endif
                        </div>
                    @endif

                    @if ($tramite->btns->isNotEmpty())
                        @foreach ($tramite->btns as $btn)
                            <div class="container add-boton mt-5 mb-4">
                            <h2 style="font-family: 'Inter'; font-weight: 700; font-size: 16px; line-height: 19.36px; color: #565656;">Visita los siguientes sitios externos</h2>
                                <div class="row">
                                    <div class="col-md-6 mt-4 mb-4">
                                        <a class="mifinal-a" href="{{ $btn->url }}">{{ $btn->nombre_btn }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    @if ($tramite->documentos->isNotEmpty() && $tramite->documentos->every(function($documento) { return !empty($documento->nombre_documento) && !empty($documento->ruta_documento); }))
                        <div class="container docs">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 style="font-family: 'Inter';font-weight: 600; font-style: italic; font-size: 20px; color: #F59120; line-height: 24.2px;" class="mt-4">Documentos Adjuntos</h3>
                                    @foreach ($tramite->documentos as $documento)
                                        @if (!empty($documento->nombre_documento) && !empty($documento->ruta_documento))
                                        <li class="mi-list mt-4">
                                            <a href="{{ asset('storage/' . $documento->ruta_documento) }}" target="_blank">
                                                <img width="43px" height="44px" src="{{ asset('storage/images/pdf.png') }}" alt="Descripción de la imagen" style="display: inline-block; vertical-align: middle;">
                                                <span class="mi-span" style="display: inline-block; vertical-align: middle;">{{ $documento->nombre_documento }}</span>
                                            </a>
                                        </li>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                                

                    <div class="container mt-5 mb-4">
                        <a href="/gobiernoregional/tramitesdigitales" class="btn btn-secondary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
</script>
@endsection