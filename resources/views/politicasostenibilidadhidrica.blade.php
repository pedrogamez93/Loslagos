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

    h2.mititulo{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 25px;
        color: #565656;
    }
	p.bajada-acord{
			font-family: 'Inter';
			font-Weight: 500;
			font-Size: 16px;
			Line-height: 19.36px;
			color: #565656;
			text-align: justify;
	}
    a.final-btn {
    padding: 10px 20px;
    border-Radius: 100px;
    background-color: #F59120;
    color: #FFFFFF;
    font-Weight: 700;
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
    .item {
        padding-bottom: 40px;

    }
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
<div class="container-fluid color">
    <div class="row">
        <div class="col-md-12">
            <div class="container second content-breadc pt-5 pb-5">
                <div class="row">
                    <div class="col-md-12 p-0">
                        <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/<a href="/gobiernoregional/acerca"> Gobierno Regional</a> / <span style="font-Weight: 700;"><a href="/gobiernoregional/dptogestionpersonas">Política Sostenibilidad Hídrica</a></span></p>
                    </div>
                </div>
                    
                <div class="container content-prin pt-4 p-0">
                    <div class="row" >
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
                <div class="container principal">
                    <div class="row">
                        <div class="col-md-12 style-cont">
                            <h1 class="mititulo mb-2">{{ $ultimoRegistro->titulo }}</h1>
                            <p class="bajada-acord">{!! $ultimoRegistro->bajada ?? '' !!}</p>
                            <h2 class="mititulo mt-3" style="font-style: italic;">{{ $ultimoRegistro->titulo_seccion_form }}</h2>
                            <!-- Mostrar formularios -->
                             @if($formularios->isNotEmpty())
                            @foreach($formularios as $formulario)
                             <div class="container mt-4 mb-5" style="padding: 0px;">
                                <div class="item">
                                    <a class="final-btn" href="{{ $formulario->url_btn_form }}" target="_blank">{{ $formulario->nombre_btn_form }}</a>
                                </div>
                            </div>   
                            @endforeach       
                            @else
                            <p>No hay formularios disponibles.</p>
                            @endif
                            <div class="container style-cont  seccionencuestas" style="padding: 0px;">
                                <h2 class="mititulo mb-2">{{ $ultimoRegistro->titulo_seccion_encue }}</h2>
                                <p>{!! $ultimoRegistro->bajada_seccion_encue ?? '' !!}</p>
                            </div>
                            <!-- Mostrar encuestas -->
                            @if($encuestas->isNotEmpty())
                            <div class="container mt-5 mb-5" style="padding: 0px;">
                                <div class="row">
                                    @foreach($encuestas as $encuesta)
                                    <div class="col-md-4"> <!-- Puedes ajustar el tamaño de la columna según tus necesidades -->
                                        <div class="item">
                                            <p class="mip mb-3"><strong>{{ $encuesta->nombre_encuesta }}</strong></p>
                                            <a class="final-btn mt-3" href="{{ $encuesta->url_btn_encuesta }}" target="_blank">{{ $encuesta->nombre_btn_encuesta }}</a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>                
                            @else
                            <p>No hay encuestas disponibles.</p>
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