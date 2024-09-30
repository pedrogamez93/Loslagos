<!DOCTYPE html>
<style>
    h1 , h2{
        color: #565656;
    }
    .principal{
        border: 1px solid #CCCCCC;
        border-radius: 10px;       
    }
    .first-form{
        border: 1px solid #CCCCCC;
        border-radius: 10px;
    }
    input.form-control{
    color: #565656;
    font-size: 16px;
    font-weight: 700;
    font-style: italic;
    }
    .style-label, p.style-label{
    color: #565656;
    font-size: 16px;
    font-weight: 700;
    }
    .style-col-menu{
        background-color: #0c1e35;
    }
    button.btn.btn-link {
    color: #FFFFFF;
    text-decoration: none;
    font-family: unset;
    font-weight: 700;
    }
    li.style-li{
        list-style: none;
        padding-bottom: 10px;
    }
    a.style-a-menu{
    color: #FFFFFF;
    text-decoration: none;
    font-weight: 500;   
    }
    .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline.ck-blurred {
    height: 350px;
    }
    p.ck-placeholder {
    height: 350px;
}

input:required {
    border: 1px solid red; /* Borde rojo para indicar campo obligatorio */
}

/* Estilo para el asterisco */
.required::before {
    content: '*';
    color: red;
    margin-right: 4px;
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