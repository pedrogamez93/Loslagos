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
    p.itemss{
        font-family: 'Inter';
        font-weight: 700;
        font-Size: 16px;
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
    <title>Consejo Regional</title>
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
                        <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/<a href="/consejoregional/actas"> Consejo Regional</a> / <span style="font-Weight: 700;"><a href=""></a></span></p>
                    </div>
                </div>
                    
                <div class="container content-prin pt-4 p-0">
                    <div class="row">
                        <div class="col-md-12 p-0">
                            <p class="one-title pb-5">Consejo Regional</p>
                        </div>
                        <div class="col-md-6 p-0">
                            <p>Tiene por finalidad hacer efectiva la participación de la comunidad regional y está investido de facultades normativas, resolutivas y fiscalizadoras.</p>
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
            <div class="col-md-12">
                <div class="container set pb-4">
                   
                </div>
                <div class="container content mt-5 mb-5 p-0">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="bajada">
                                <div class="container">
                                <p class="style-tag">Infórmate sobre nuestra Región...</p>
                                    @if ($acta->documentonew)
                                        <div class="mi-documento">
                                            <h1 class="mititulo mt-4 mb-4">Sesión ordinaria N° {{ $acta->documentonew->numero_sesion ?? 'No disponible' }}</h1>
                                            <p class="itemss mb-2">Fecha y Hora: <span style="font-family: 'Inter'; font-weight: 400; font-size: 16px;">{{ $acta->documentonew->fecha_hora ?? 'No disponible' }}</span></p>
                                            <p class="itemss mt-2 mb-2">Provincia: <span style="font-family: 'Inter'; font-weight: 400; font-size: 16px;">{{ $acta->documentonew->provincia ?? 'No disponible' }}</span></p>
                                            <p class="itemss mt-2 mb2">Comuna: <span style="font-family: 'Inter'; font-weight: 400; font-size: 16px;">{{ $acta->documentonew->comuna ?? 'No disponible' }}</span></p>
                                            <p class="itemss mt-2 mb-2">Lugar: <span style="font-family: 'Inter'; font-weight: 400; font-size: 16px;">{{ $acta->documentonew->lugar ?? 'No disponible' }}</span></p>
                                            <!-- Aquí puedes añadir más detalles del acta según tu modelo -->
                                            <p class="itemss mt-2 mb-2">Descripción: <span style="font-family: 'Inter'; font-weight: 400; font-size: 16px;">{{ $acta->descripcion ?? 'No disponible' }}</span></p> <!-- Asumiendo que hay un campo 'descripcion' en el modelo Acta -->
                                        </div>
                                    @else
                                        <p>La información detallada del acta no está disponible.</p>
                                    @endif
                                    <div class="container mt-5 mb-4">
                                        <a href="/consejoregional/actas" class="btn btn-secondary">Volver a la lista de Actas</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" style="border-left: 2px solid #F59120;padding-left: 2rem;">
                            <p class="title-doc pb-4">Acta para descargar</p>
                                <!-- Enlace para ver el documento asociado, si existe -->
                                @if ($acta->documentonew->archivo)
                                    <div class="mi-documento d-flex align-items-center"><!-- Añade flexbox aquí -->
                                        <a href="{{ url($acta->documentonew->archivo) }}" target="_blank" class="d-flex align-items-center"> <!-- Añade flexbox al enlace -->
                                            <img width="43px" height="44px" src="{{ asset('storage/images/pdf.png') }}" alt="Acta" style="margin-right: 10px;"> <!-- Añade margen a la imagen -->
                                            <div> <!-- Contenedor para los textos -->
                                                <p class="p-doc-tit">Sesión ordinaria N° {{ $acta->documentonew->numero_sesion }} DEL CONSEJO REGIONAL DE LOS LAGOS</p>
                                            </div>
                                        </a>
                                    </div>
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


