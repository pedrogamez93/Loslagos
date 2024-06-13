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
    .active-link {
        color: #00548F;
        border-radius: 100px;
        border: 1px solid #00548F;
        font-weight: 700;
        background-color: #FFFFFF;
        padding: 6px 4px;
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
            <div class="container mb-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container butonano" style="color: black;">
                            <div class="row">
                                <!-- Columna para 'Próxima Sesión', siempre visible -->
                                <div class="col-md-2">
                                    <a href="{{ route('tablassesionesconsejo.Indextablassesionesconsejo') }}" class="{{ request()->routeIs('tablassesionesconsejo.Indextablassesionesconsejo') ? 'active-link' : '' }}">Próxima Sesión</a>
                                </div>
                                <!-- Columnas para cada año -->
                                @php $counter = 1; @endphp
                                @foreach($anios as $anio)
                                    @if($counter % 4 == 0 && $counter != 0) <!-- Cada 4 años se cierra una fila y se abre una nueva -->
                                        </div><div class="row">
                                        <div class="col-md-2">
                                            <a href="{{ route('tablassesionesconsejo.Indextablassesionesconsejo') }}" class="{{ request()->routeIs('tablassesionesconsejo.Indextablassesionesconsejo') ? 'active-link' : '' }}">Próxima Sesión</a>
                                        </div>
                                    @endif
                                    <div class="col-md-2">
                                        <a href="{{ route('sesiones_por_anio', ['anio' => $anio]) }}" class="{{ request()->is('sesiones/' . $anio) ? 'active-link' : '' }}">Tabla Sesión Año {{ $anio }}</a>
                                    </div>
                                    @php $counter++; @endphp
                                @endforeach
                            </div>
                        </div>
                        {{-- Mostrar la próxima sesión --}}
                        @foreach ($documentos as $mes => $docsMes)
                        <div class="container mt-5 mb-5" style="border: 1px solid #F59120;">
                            <div class="row">
                                <h1 class="mititulo" style="text-transform: capitalize">{{ \Carbon\Carbon::createFromFormat('m', $mes)->isoFormat('MMMM') }}</h1> <!-- Muestra el nombre del mes -->
                                @foreach ($docsMes as $documento)
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
                        @endforeach
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>

@endsection


