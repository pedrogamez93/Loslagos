@php
    use Carbon\Carbon;
@endphp
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
    h2.mi-style{
        font-family: 'Inter';
        font-weight: 700;
        font-size: 20px;
        line-height: 24.2px;
        color: #F59120;
    }
    h3.mi-style{
        font-family: 'Inter';
        font-weight: 700;
        font-size: 20px;
        line-height: 24.2px;
        color: #F59120;
    }
    li.mi-style{
        font-family: 'Inter';
        font-weight: 700;
        font-size: 18px;
        line-height: 24.2px;
        color: black;
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
                    <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/<a href="/consejoregional/introduccion"><span> Consejo Regional</span></a> /<a href="/consejoregional/tablassesionesconsejo"> <span style="font-Weight: 700;">Tabla de Sesiones Consejo Regional de Los Lagos</span></a></p>
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
            <div class="col-md-12 pt-4 pb-4 p-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 p-0">
                        <p class="style-tag">Infórmate sobre nuestra Región...</p>

                        <h1 class="mititulo mt-4 mb-4">Tabla de Sesiones Consejo Regional de Los Lagos</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container second mb-5">
        <div class="row">
        <div class="col-md-12">
            <div class="container butonano" style="color: black;">
                <div class="row">
                    <div class="col-md-12">
                    @foreach($anios as $anio)
                        <a href="{{ route('sesiones_por_anio', ['anio' => $anio]) }}">Tablas Sesiones Año {{ $anio }}</a>
                    @endforeach
                    </div>
                </div>
            </div>

            {{-- Mostrar la próxima sesión --}}
            @if($proximaSesion)
                <p style="color: #565656;">TABLA CORE</p>
                <div class="container proximasesion mt-5 mb-5" style="border: 1px solid #F59120;
    padding: 50px;">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="mi-style mt-2 mb-2">Próxima Sesión:</h2>
                            <p style="color: #565656;"><span style="font-weight: 700;">Nombre sesion:</span> {{ $proximaSesion->nombre }}</p>
                            <p style="color: #565656; padding: 10px 0px 10px 0px;"><span style="font-weight: 700;">Hora:</span> {{ $proximaSesion->fecha_hora->format('H:i') }}</p>
                            <p style="color: #565656;"><span style="font-weight: 700;">Lugar:</span> {{ $proximaSesion->lugar }}</p>
                        </div>
                    </div>
                </div>
            @endif

   <!-- {{-- Mostrar las sesiones agrupadas por año y mes --}}
    @foreach($sesionesAgrupadas as $anioMes => $sesiones)
        @php
            // Obtener el año y el mes
            [$anio, $mes] = explode('-', $anioMes);
            $nombreMes = Carbon::createFromFormat('m', $mes)->monthName;
        @endphp

        <h2 class="mi-style">Tablas de Sesiones Año: {{ $anio }}</h2>
        <h3 class="mi-style">Tablas de Sesiones Mes: {{ $nombreMes }}</h3>
        <ul>
        @foreach($sesiones as $sesion)
            <li class="mi-style">
                {{ $sesion->nombre }}

                {{-- Verificar si la sesión tiene documentos --}}
                @if($sesion->documentos->isNotEmpty())
                    <ul>
                        {{-- Iterar sobre los documentos de la sesión --}}
                        @foreach($sesion->documentos as $documento)
                            <li>
                                <a href="{{ $documento->url }}" target="_blank">
                                    <img width="43px" height="44px" src="{{ asset('storage/images/pdf.png') }}" alt="PDF Icon" style="display: inline-block; vertical-align: middle;">
                                    <p class="p-doc mt-2 mb-2" style="font-family: 'Inter'; font-weight: 500; font-size: 16px; line-height: 19.36px; display: inline-block; vertical-align: middle; color:#black;">
                                        {{ $documento->nombredoc }}
                                    </p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
        </ul>
    @endforeach -->
</div>
        </div>
    </div>
</main>
</body>
</html>

@endsection