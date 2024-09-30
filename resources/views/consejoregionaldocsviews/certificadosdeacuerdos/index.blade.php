<!DOCTYPE html>
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
            p.p-doc-tit {
                font-family: 'Inter';
                font-weight: 700;
                font-size: 20px;
                color: #565656;
            }
            p.p-doc-baj {
                font-family: 'Inter';
                font-weight: 400;
                font-size: 16px;
                color: #565656;
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
            @media only screen and (max-width: 600px) {
                p.one-title {
                    font-size: 30px !important;
                    padding-bottom: 0px !important;
                }
            }
            .form-control.filtro {
                border-radius: 100px;
                color: #00548F;
                border: 1px solid #00548F;
            }
            .form-control.filtro::placeholder {
                color: #00548F;
            }
            button.btn.btn-primary {
                border-radius: 100px;
                background-color: #F59120;
                border: 1px solid #F59120;
            }
            .mi-documento {
                border: 1px solid #F59120;
                padding: 10px;
                border-radius: 8px;
                background-color: #f8f9fa;
                transition: box-shadow 0.3s ease-in-out;
            }
            .mi-documento:hover {
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            }
            .descripcion-text {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3; /* Número de líneas que se muestran */
        -webkit-box-orient: vertical;
        height: 75px; /* Ajustar la altura según las líneas */
    }

    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        border: 1px solid #F59120;
    }

    .card {
        height: 100%; /* Asegurar que todas las tarjetas tienen la misma altura */
    }

    .btn {
        border-radius: 8px; /* Personaliza el estilo del botón */
    }
        </style>
<html>
<head>
    <meta charset="utf-8">
    <title>Consejo Regional</title>
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
                    <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/<a href="/consejoregional/introduccion"><span> Consejo Regional</span></a> /<a href="/consejoregional/certificadosdeacuerdos"> <span style="font-Weight: 700;">Certificados de Acuerdos</span></a></p>
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
            <div class="col-md-12 pt-4 pb-4 p-0 ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 p-0">
                        <p class="style-tag">Infórmate sobre nuestra Región...</p>

                        <h1 class="mititulo mt-4 mb-4">Certificados de Acuerdos</h1>
                        </div>
                        <div class="container filtros">
                        <form action="{{ route('certificadosdeacuerdos.Indexcertificadosdeacuerdos') }}" method="GET" class="row">
                                <div class="col-md-2 mb-3">
                                    <select name="fecha_dia" id="fecha_dia" class="form-control filtro">
                                        <option value="">Día</option>
                                        @for ($i = 1; $i <= 31; $i++)
                                            <option value="{{ $i }}" {{ request('fecha_dia') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <select name="fecha_mes" id="fecha_mes" class="form-control filtro">
                                        <option value="">Mes</option>
                                        @foreach (['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'] as $index => $mes)
                                            <option value="{{ $index + 1 }}" {{ request('fecha_mes') == $index + 1 ? 'selected' : '' }}>{{ $mes }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <select name="fecha_ano" id="fecha_ano" class="form-control filtro">
                                        <option value="">Año</option>
                                        @for ($i = 2010; $i <= date('Y'); $i++)
                                            <option value="{{ $i }}" {{ request('fecha_ano') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="text" placeholder="Código BIP" name="codigo_bip" id="codigo_bip" class="form-control filtro" value="{{ request('codigo_bip') }}">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                </div>
                            </form>
                        </div>
                        <div class="container">
                            <div class="row">
                                @foreach ($acuerdos as $acuerdo)
                                    @if ($acuerdo->documentonew)
                                        <div class="col-md-3 mb-4">
                                            <div class="mi-documento d-flex align-items-center" style="border: 1px solid #F59120; padding: 5px;">
                                                <a href="{{ route('documentos.download', $acuerdo->documentonew->id) }}"  class="d-flex align-items-center">
                                                    <img width="43px" height="44px" src="{{ asset('storage/images/pdf.png') }}" alt="Acuerdo" style="margin-right: 10px;">
                                                    <div>
                                                        <p class="p-doc-tit">Número: {{ $acuerdo->numero }}</p>
                                                        <p class="p-doc-baj">Fecha: {{ $acuerdo->fecha }}</p>
                                                        <p class="card-text flex-grow-1 descripcion-text">
    <strong>Descripción:</strong> {{ \Illuminate\Support\Str::limit(htmlspecialchars($acuerdo->descripcion, ENT_QUOTES, 'UTF-8'), 100) }}
</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <!-- Enlaces de paginación -->
                        <div class="d-flex justify-content-center">
                            {{ $acuerdos->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container second mb-5">
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>
    </div>
</main>
</body>
</html>
@endsection