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
    nav ul {
        list-style-type: none !important;
        list-style: none; 
        padding: 0; 
        display: flex; 
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
			color: #565656;
		}
	.bajada-acord{
			font-family: 'Inter';
			font-Weight: 500;
			font-Size: 16px;
			Line-height: 19.36px;
			color: #565656;
			text-align: justify;
            white-space: pre-wrap;
	}

    p.title-categ{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 20px;
        line-height: 24.2px;
        color: #F59120
    }

    h1.mi-title{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 30px;
        line-height: 36.31px;
        color: #565656;
    }
    .mi-bajada{
        font-family: 'Inter';
        font-weight: 500;
        font-size: 16px;
        line-height: 19.36px;
        color: #565656;
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
    .mi-bajada p {
    margin-bottom: 10px; /* Ajusta el valor según tus necesidades */
}
    ul, ol {
    margin-bottom: 10px; /* Ajusta el valor según tus necesidades */
}
ul {
    list-style-type: disc !important; /* Estilo de viñeta para listas no ordenadas */
    padding-left: 20px !important; /* Espaciado para la indentación de la lista */
}

ul li {
    margin-bottom: 5px !important; /* Espaciado entre elementos de la lista */
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
                        <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/<a href="/gobiernoregional/acerca"> Gobierno Regional</a> / <a href="/gobiernoregional/asambleaclimatica">Asamblea Climatica Ciudadana</a>/ <a style="font-Weight: 700;" href ="">Audiencias de Partes Interesadas</a></p>
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
                <div class="container content mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="container" style="padding-left: 2rem;">
                                <div class="row">
                                    <div class="col-md-12 style-cont">
                                        <h1 class="mi-title mb-5">{{ $audiencia->titulo ?? '' }}</h1>
                                        
                                        <div class="style-cont mi-bajada" id="editor">{!! $audiencia->bajada ?? '' !!}</div>

                                        {{-- Verifica si $audiencia no es nulo antes de intentar acceder a sus propiedades --}}
                                            @if($audiencia && $audiencia->documentos->count() > 0)
                                                {{-- Itera sobre los documentos solo si $audiencia y $audiencia->documentos no son nulos --}}
                                                <h2 class="mi-style-h2 mt-5 mb-5">{{ $audiencia->titulo_secciontwo ?? '' }}</h2>
                                                @foreach ($audiencia->documentos as $documento)
                                                    {{-- Aquí puedes acceder a las propiedades del documento --}}
                                                    <div class="mi-documento mt-3 mb-3">
                                                        <a href="{{ asset($documento->url_doc) }}" target="_blank">
                                                            <img width="43px" height="44px" src="{{ asset('storage/images/pdf.png') }}" alt="Descripción de la imagen" style="display: inline-block; vertical-align: middle;">
                                                            <p class="p-doc mt-2 mb-2" style="font-family: 'Inter'; font-weight: 500; font-size: 16px; line-height: 19.36px; display: inline-block; vertical-align: middle; color:#565656;">{{ $documento->nombre_doc }}</p>
                                                        </a>
                                                    </div>
                                                    {{-- ... --}}
                                                @endforeach
                                            @else
                                                {{-- Maneja el caso en que $audiencia o $audiencia->documentos sea nulo --}}
                                                <p>No hay documentos disponibles</p>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4" style="border-left: 2px solid #F59120;">
                            <p class="title-categ pb-4">Categorias Asamblea Climática</p>
                            {{-- Para el enlace "Asamblea Climática Ciudadana" --}}
                                <p class="mistyle-final-pcateg mt-2 mb-2" style="{{ request()->is('gobiernoregional/asambleaclimatica*') ? 'font-weight: 700;' : '' }}">
                                    <a href="/gobiernoregional/asambleaclimatica">Asamblea Climática Ciudadana</a>
                                </p>

                                {{-- Para el enlace "Audiencias de Partes Interesadas" --}}
                                <p class="mistyle-final-pcategoff mt-2 mb-2" style="{{ request()->is('gobiernoregional/asambleaclimatica/audienciadepartes*') ? 'font-weight: 700;' : '' }}">
                                    <a href="/gobiernoregional/asambleaclimatica/audienciadepartes">Audiencias de Partes Interesadas</a>
                                </p>
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