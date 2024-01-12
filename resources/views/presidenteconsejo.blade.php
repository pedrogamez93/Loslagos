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
.items {
        display: grid;
        row-gap: 1rem;
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
    .itemss p{
        font-family: 'Inter';
        font-weight: 700;
        font-Size: 16px;
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
<div class="container-fluid" style="background-color:#00548F;">
    <div class="row">
        <div class="col-md-12">
            <div class="container second content-breadc pt-5 pb-5">
                <div class="row" style="padding: 10px 0px 20px 55px;">
                    <div class="col-md-12" style="padding: 0;">
                        <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/<a href="/consejoregional/introduccion"><span> Consejo Regional</span></a> /<a href="/consejoregional/presidenteconsejo"> <span style="font-Weight: 700;">Presidente del Consejo</span></a></p>
                    </div>
                </div>
                    
                <div class="container content-prin pt-4">
                    <div class="row" style="padding: 10px 0px 0px 25px;">
                        <div class="col-md-12">
                            <p class="one-title pb-5">Consejo Regional</p>

                            <p style="Width:623px;">Tiene por finalidad hacer efectiva la participación de la comunidad regional y está investido de facultades normativas, resolutivas y fiscalizadoras.</p>
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
            <div class="col-md-12 pt-5 pb-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12" style="padding: 0 0 0 2.9rem;">
                        <p class="style-tag">Presidente Consejo...</p>
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
                <p></p>
                </div>
                <div class="container titulo">
                    <div class="row">
                        <div class="col-md-12" style="padding: 0 0 0 3rem;">
                            <h1 class="mititulo mt-2 mb-2">Presidente del Consejo</h1>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mb-4" style="padding: 0 0 0 2.5rem;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="mititulo mt-2 mb-2">{{ $presidente->nombres ?? '' }} {{ $presidente->apellidos ?? '' }}</h1>
                                        <div class="itemss">
                                            <p class="itemss">Actividad o Profesión: <span style="font-family: 'Inter'; font-weight: 400; font-size: 16px;">{{ $presidente->profesion ?? '' }}</span></p>
                                            <p class="itemss">Partido Político: <span style="font-family: 'Inter'; font-weight: 400; font-size: 16px;">{{ $presidente->partidopolitico ?? '' }}</span></p>
                                        </div>
                                        <h1 class="mititulo mt-4 mb-4">Datos del Servicio</h1>
                                        <div class="container items">
                                            <div class="itemss">
                                                    <img src="{{ asset('storage/images/check2.png') }}" alt="Descripción de la imagen">
                                                    <p class="itemss">Cargo: <span style="font-family: 'Inter'; font-weight: 400; font-size: 16px;">{{ $presidente->cargo ?? '' }}</span></p>
                                            </div>
                                            <div class="itemss">
                                                    <img src="{{ asset('storage/images/check2.png') }}" alt="Descripción de la imagen">
                                                    <p class="itemss">Institución: <span style="font-family: 'Inter'; font-weight: 400; font-size: 16px;"> {{ $presidente->institucion ?? '' }}</span></p>
                                            </div>        
                                            <div class="itemss">
                                                    <img src="{{ asset('storage/images/check2.png') }}" alt="Descripción de la imagen">
                                                    <p class="itemss">Dirección: <span style="font-family: 'Inter'; font-weight: 400; font-size: 16px;"> {{ $presidente->direccion ?? '' }}</span></p>
                                            </div> 
                                            <div class="itemss">
                                                    <img src="{{ asset('storage/images/check2.png') }}" alt="Descripción de la imagen">
                                                    <p class="itemss">Telefono: <span style="font-family: 'Inter'; font-weight: 400; font-size: 16px;"> {{ $presidente->telefono ?? '' }}</span></p>
                                            </div> 
                                            <div class="itemss">
                                                    <img src="{{ asset('storage/images/check2.png') }}" alt="Descripción de la imagen">
                                                    <p class="itemss">E-Mail: <span style="font-family: 'Inter'; font-weight: 400; font-size: 16px;"> {{ $presidente->correo ?? '' }}</span></p>
                                            </div> 
                                            <div class="itemss">
                                                    <img src="{{ asset('storage/images/check2.png') }}" alt="Descripción de la imagen">
                                                    <p class="itemss">Provincia: <span style="font-family: 'Inter'; font-weight: 400; font-size: 16px;"> {{ $presidente->provincia ?? '' }}</span></p>
                                            </div> 
                                            <div class="itemss">
                                                    <img src="{{ asset('storage/images/check2.png') }}" alt="Descripción de la imagen">
                                                    <p class="itemss">Comuna: <span style="font-family: 'Inter'; font-weight: 400; font-size: 16px;"> {{ $presidente->comuna ?? '' }}</span></p>
                                            </div>                     
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 muestraimagen mb-4">
                        @if($presidente && $presidente->imagen)
                        <img src="{{ asset($presidente->imagen) }}" style="width:300px;height: 300px;" alt="Imagen del presidente">
                        @else
                        <p>No hay imagen disponible</p>
                        @endif
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
