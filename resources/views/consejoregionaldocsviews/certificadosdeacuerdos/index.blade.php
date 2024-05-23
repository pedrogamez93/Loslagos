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
    p.p-doc-tit{
        font-family: 'Inter';
        font-weight: 700;
        font-size: 20px;
        color: #565656;
    }
    p.p-doc-baj{
        font-family: 'Inter';
        font-weight: 400;
        font-size: 16px;
        color: #565656;  
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

    .form-control.filtro {
    border-radius: 100px;
    color: #00548F; 
    border: 1px solid #00548F;
    }
    /* Cambiar el color del placeholder */
.form-control.filtro::placeholder {
    color: #00548F; 
}

/* Compatibilidad con diferentes navegadores */

/* Internet Explorer 10-11 */
.form-control.filtro:-ms-input-placeholder {
    color: #00548F; 
}

/* Microsoft Edge */
.form-control.filtro::-ms-input-placeholder {
    color: #00548F; 
}

/* Mozilla Firefox 19+ */
.form-control.filtro::-moz-placeholder {
    color: #00548F; 
    opacity: 1; /* Por defecto Firefox reduce la opacidad del placeholder */
}

/* Google Chrome, Safari y Opera */
.form-control.filtro::-webkit-input-placeholder {
    color: #00548F; 
}

button.btn.btn-primary {
    border-radius: 100px;
    background-color: #F59120;
    border: 1px solid #F59120;
}
</style>
<html>
<head>
    <meta charset="utf-8">
    <title>Certificados de Acuerdos</title>
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
                                                <a href="{{ $acuerdo->documentonew->archivo }}" target="_blank" class="d-flex align-items-center">
                                                    <img width="43px" height="44px" src="{{ asset('storage/images/pdf.png') }}" alt="Acuerdo" style="margin-right: 10px;">
                                                    <div>
                                                        <p class="p-doc-tit">Número: {{ $acuerdo->numero }}</p>
                                                        <p class="p-doc-baj">Fecha: {{ $acuerdo->fecha }}</p>
                                                        <p class="p-doc-baj">Descripción: {{ $acuerdo->descripcion }}</p>
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