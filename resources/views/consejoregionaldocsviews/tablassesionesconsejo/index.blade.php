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
            color: #fff;
            padding: 20px;
            margin: 0;
            top: 0;
            left: 0;
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
        }
    </style>
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
                            <a href="{{ route('tablassesionesconsejo.Indextablassesionesconsejo') }}" class="{{ request()->routeIs('tablassesionesconsejo.Indextablassesionesconsejo') || request()->fullUrlIs(route('tablassesionesconsejo.Indextablassesionesconsejo') . '/*') ? 'active-link' : '' }}">Próxima Sesión</a>
                        </div>
                        @php $counter = 1; @endphp
                        @foreach($anios as $anio)
                            @if($counter % 4 == 0 && $counter != 0)
                                </div><div class="row">
                                <div class="col-md-2">
                                    <a href="{{ route('tablassesionesconsejo.Indextablassesionesconsejo') }}" class="{{ request()->routeIs('tablassesionesconsejo.Indextablassesionesconsejo') || request()->fullUrlIs(route('tablassesionesconsejo.Indextablassesionesconsejo') . '/*') ? 'active-link' : '' }}">Próxima Sesión</a>
                                </div>
                            @endif
                            <div class="col-md-2">
                                <a href="{{ route('sesiones_por_anio', ['anio' => $anio]) }}">Tabla Sesión Año {{ $anio }}</a>
                            </div>
                            @php $counter++; @endphp
                        @endforeach
                    </div>
                </div>

                {{-- Mostrar la próxima sesión --}}
                @if($proximaSesion)
                    <div class="container" style="text-align-last: center; padding-top: 1rem; margin-top: 3rem; padding-bottom: 1rem; margin-bottom: -3rem; border-top: 1px solid #F59120; border-left: 1px solid #F59120; border-right: 1px solid #F59120;">
                        <div class="row">
                            <div class="col-md-12">
                                <p style="color: #565656; font-weight: 700; font-size: 20px;">TABLA CORE</p>
                            </div>
                        </div>
                    </div>
                    <div class="container proximasesion mt-5 mb-5" style="border: 1px solid #F59120; padding: 50px;">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="mi-style mt-2 mb-2">Próxima Sesión:</h2>
                                <p style="color: #565656;"><span style="font-weight: 700;">Nombre sesión:</span> {{ $proximaSesion->nombre }}</p>
                                <p style="color: #565656; padding: 10px 0px 10px 0px;"><span style="font-weight: 700;">Hora:</span> {{ \Carbon\Carbon::parse($proximaSesion->fecha_hora)->format('H:i') }}</p>
                                <p style="color: #565656;"><span style="font-weight: 700;">Lugar:</span> {{ $proximaSesion->lugar }}</p>
                            </div>
                        </div>
                        <div class="row mt-4" style="border-top: 1px solid #F59120; padding: 50px;">
                            <div class="col-md-12">
                                <div class="row">
                                    @foreach($proximaSesion->documentos as $documento)
                                        <div class="col-md-4 mb-4">
                                            <a href="{{ route('sesiones.download', ['id' => $documento->id]) }}" target="_blank" style="display: block; text-align: center;">
                                                <img width="43px" height="44px" src="{{ asset('storage/images/pdf.png') }}" alt="Documento PDF" style="display: inline-block; vertical-align: middle;">    
                                                <span class="mi-span" style="display: inline-block; vertical-align: middle; width: 234px; text-align: left;">{{ $documento->nombredoc }}</span>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</main>
</body>
</html>

@endsection
