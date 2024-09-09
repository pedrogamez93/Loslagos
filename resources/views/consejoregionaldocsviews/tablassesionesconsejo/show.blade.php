@php
    use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Consejo Regional</title>
    <style>
        .second {
            height: 450px;
            color: #fff; /* Cambia esto al color de texto que desees */
            padding: 20px; /* Añade relleno si es necesario */
            margin: 0; /* Elimina el margen para que ocupe toda la pantalla hacia los lados */
            top: 0; /* Lo fija en la parte superior */
            left: 0; /* Lo fija en la parte izquierda */
            z-index: 1000;
        }
        p.style-bread {
            font-family: 'Inter';
            font-weight: 500;
            font-size: 16px;
            line-height: 19.36px;
            color: #FFFFFF;
        }
        p.style-tag {
            font-family: 'Inter';
            font-weight: 600;
            font-style: italic;
            font-size: 16px;
            color: #00548F;
        }
        p.title-cat {
            font-family: 'Inter';
            font-weight: 700;
            font-size: 30px;
            line-height: 36.31px;
            color: #565656;
        }
        p.one-title {
            font-family: 'Inter';
            font-weight: 700;
            font-size: 50px;
            line-height: 60.51px;
            color: #FFFFFF;
        }
        .cat {
            margin-top: -5rem;
            background-color: #FFFFFF;
            border-radius: 100px 0 0 0;
        }
        h1.mititulo {
            font-family: 'Inter';
            font-weight: 700;
            font-size: 30px;
            color: #565656;
        }
        h2.mi-style {
            font-family: 'Inter';
            font-weight: 700;
            font-size: 20px;
            line-height: 24.2px;
            color: #F59120;
        }
        h3.mi-style {
            font-family: 'Inter';
            font-weight: 700;
            font-size: 20px;
            line-height: 24.2px;
            color: #F59120;
        }
        li.mi-style {
            font-family: 'Inter';
            font-weight: 700;
            font-size: 18px;
            line-height: 24.2px;
            color: black;
        }
        .container-fluid.color {
            background-color: #00548F;
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
        .active-link {
            color: #00548F;
            border-radius: 100px;
            border: 1px solid #00548F;
            font-weight: 700;
            background-color: #FFFFFF;
            padding: 10px 15px;
        }
        @media only screen and (max-width: 600px) {
            p.one-title {
                font-size: 30px !important;
                padding-bottom: 0px !important;
            }

            .p-doc{
                width: 215px !important;
            }
        }
    </style>
    <link rel="shortcut icon" type="image/png" href="{{ asset('storage/img/Favicon.png') }}">
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
                            <p class="style-bread">
                                <a href="http://127.0.0.1:8000/">Home </a>/
                                <a href="/consejoregional/introduccion"><span> Consejo Regional</span></a> /
                                <a href="/consejoregional/tablassesionesconsejo"><span style="font-weight: 700;">Tabla de Sesiones Consejo Regional de Los Lagos</span></a>
                            </p>
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
                <div class="col-md-12 pt-4 pb-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12" style="padding-left: 20px;">
                                <p class="style-tag">Infórmate sobre nuestra Región...</p>
                                <h1 class="mititulo mt-4 mb-4">Tabla de Sesiones Consejo Regional de Los Lagos</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="container butonano" style="color: black;">
                        <div class="row" style="white-space: pre-line;">
                            <div class="col-md-2">
                                <a href="{{ route('tablassesionesconsejo.Indextablassesionesconsejo') }}" class="{{ request()->routeIs('tablassesionesconsejo.Indextablassesionesconsejo') ? 'active-link' : '' }}">Próxima Sesión</a>
                            </div>
                            @php $counter = 1; @endphp
                            @foreach($anios as $anio)
                                @if($counter % 4 == 0 && $counter != 0)
                                    </div><div class="row">
                                    <div class="col-md-2">
                                        <a href="{{ route('tablassesionesconsejo.Indextablassesionesconsejo') }}" class="{{ request()->routeIs('tablassesionesconsejo.Indextablassesionesconsejo') ? 'active-link' : '' }}">Próxima Sesión</a>
                                    </div>
                                @endif
                                <div class="col-md-3">
                                    <a href="{{ route('sesiones_por_anio', ['anio' => $anio]) }}" class="{{ request()->is('sesiones/' . $anio) ? 'active-link' : '' }}">Tabla Sesión Año {{ $anio }}</a>
                                </div>
                                @php $counter++; @endphp
                            @endforeach
                        </div>
                    </div>
                    {{-- Mostrar la próxima sesión --}}
                    @foreach ($sesiones as $mes => $sesionesMes)
                        <div class="container mt-5 mb-5" style="border: 1px solid #F59120;">
                            <div class="row">
                                <h1 class="mititulo" style="text-transform: capitalize;background-color: #F591201A !important; padding: 10px; border-bottom: 1px solid #F59120;"><!--{{ \Carbon\Carbon::createFromFormat('m', $mes)->isoFormat('MMMM') }} --> Sesiones del mes de {{ \Carbon\Carbon::createFromFormat('m', $mes)->isoFormat('MMMM') }}</h1>
                                @foreach ($sesionesMes as $sesion)
                                    <div class="container" style="padding: 10px 25px;">
                                        <div class="row">
                                            <div class="col-md-12" style="    background-color: #F5F5F5; padding: 5px;">
                                                <h2><strong>Nombre de Sesión:</strong> {{ $sesion->nombre }}</h2>
                                                <p><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($sesion->fecha_hora)->translatedFormat('d \d\e F \d\e\l Y') }}</p>
                                                @foreach ($sesion->documentos as $documento)
                                                    <ul>
                                                        <li class="mt-3 mb-3">
                                                            <a href="{{ route('downloadshowtablassesionesconsejo', $documento->id) }}" target="_blank">
                                                                <img width="43px" height="44px" src="{{ asset('storage/images/pdf.png') }}" alt="PDF Icon" style="display: inline-block; vertical-align: middle;">
                                                                <p class="p-doc mt-2 mb-2" style="font-family: 'Inter'; font-weight: 500; font-size: 16px; line-height: 19.36px; display: inline-block; vertical-align: middle; color:#000;">
                                                                    {{ $documento->nombredoc }}
                                                                </p>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</body>
</html>

@endsection
