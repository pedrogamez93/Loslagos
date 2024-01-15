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
    footer{
        height:535px;
        background-color: #389144;
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

<div class="container-fluid" style="background-color:#00548F;">
    <div class="row">
        <div class="col-md-12">
            <div class="container second content-breadc pt-5 pb-5">
                <div class="row" style="padding: 10px 0px 20px 55px;">
                    <div class="col-md-12" style="padding: 0;">
                        <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/<a href="/gobiernoregional/acerca"> Gobierno Regional</a> / <span><a href="/gobiernoregional/tramitesdigitales">Tramites Digitales</a></span>/ <span style="font-Weight: 700;"><a href="">{{ $tramites->titulo }}</a></span></p>
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
<div class="container-fluid cat">
        <div class="row">
            <div class="col-md-12 pt-4 pb-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6" style="padding: 0 0 0 2.5rem;">
                            <p class="title-cat">Trámite digital: {{ $tramites->titulo }}</p>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                @if($tramites->icono)
                                    <img src="{{ asset($tramites->icono) }}" alt="Icono actual" style="max-width: 100px; max-height: 100px;">
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

                    <p class="style-tag pt-4 pb-4">{{ $tramites->tags }}</p>
                        
                    <div class="style-cont mt-4 mb-4">{!! $tramites->descripcion !!}</div>

                    @if ($tramites->fecha_apertura || $tramites->fecha_cierre)
                        <div class="row mt-4">
                            @if ($tramites->fecha_apertura)
                                <div class="col-md-6">
                                    <p><strong>FECHA DE APERTURA</strong></p>
                                    <p>{{ $tramites->fecha_apertura }}</p>
                                </div>
                            @endif

                            @if ($tramites->fecha_cierre)
                                <div class="col-md-6">
                                    <p><strong>FECHA DE CIERRE</strong></p>
                                    <p>{{ $tramites->fecha_cierre }}</p>
                                </div>
                            @endif
                        </div>
                    @endif

                    @foreach ($tramites as $tramite)
                        @if (!empty($tramite['nombre_btn']) && !empty($tramite['url']))
                            <div class="container add-boton mt-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="style-label" for="url">Nombre del botón externo:</label>
                                        <input class="form-control mt-2 mb-4" type="text" name="nombre_btn[]" placeholder="Nombre del botón externo" value="{{ $tramite['nombre_btn'] }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="style-label" for="url">URL del botón externo:</label>
                                        <input class="form-control mt-2 mb-4" type="text" name="url[]" placeholder="URL del botón externo" value="{{ $tramite['url'] }}">
                                    </div>
                                </div>     
                            </div>
                        @endif
                    @endforeach

                    @if ($tramites->documentos->isNotEmpty() && $tramites->documentos->every(function($documento) { return !empty($documento->nombre_documento) && !empty($documento->ruta_documento); }))
                        <div class="container docs">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="mi-h3 mt-4">Documentos Adjuntos</h3>
                                    @foreach ($tramites->documentos as $documento)
                                        @if (!empty($documento->nombre_documento) && !empty($documento->ruta_documento))
                                            <p>Nombre del Documento: {{ $documento->nombre_documento }}</p>
                                            <p>Ruta del Documento: {{ $documento->ruta_documento }}</p>
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
<script>  
    document.addEventListener("DOMContentLoaded", function() {
      
        document.querySelector('.navbar').style.cssText = 'background-color: #00548F !important; border-bottom: 1px solid #FFFFFF;';
        document.querySelector('.nav-head').style.cssText = 'background-color: #00548F !important; border-bottom: 1px solid #FFFFFF;border-bottom:none !important;';
    });
</script>
@endsection