<!DOCTYPE html>
<style>
    .enlaceM {
        color: #565656;
    }
    .enlaceM:hover {
        font-Weight: 700;
    }
    .enlaceM{
        padding: 10px 0px;
        width: fit-content;
    }
    .infoR{
        font-family: Inter;
         font-size: 20px;
          font-weight: 700;
           line-height: 24px;
            letter-spacing: 0em;
             text-align: left;
              color: #F59120;
    }
    .borderR{
        border-right: 2px solid #F59120;
    }
    header{
       /* width: 100%;*/
        height: 450px;
        background-color: #00548F;
        color: #fff; /* Cambia esto al color de texto que desees */
        padding: 20px; /* Añade relleno si es necesario */
        margin: 0; /* Elimina el margen para que ocupe toda la pantalla hacia los lados */
        /*position: fixed;*/
        top: 0; /* Lo fija en la parte superior */
        left: 0; /* Lo fija en la parte izquierda */
        z-index: 1000;
    }
    .top-bar{
        border-bottom: 1px solid #FFFFFF;
    }
    nav ul {
        list-style: none; 
        padding: 0; 
        display: flex; 
    }

    nav li {
        margin-right: 20px; 
    }

    nav a {
        text-decoration: none; 
    }
    p.style-bread{
        font-family:'Inter';
        font-Weight: 500;
        font-Size: 16px;
        Line-height: 19.36px;
        color: #FFFFFF;
    }
    p.style-tag {
        font-family: Inter;
        font-size: 30px;
        font-weight: 700;
        line-height: 36px;
        letter-spacing: 0em;
        text-align: left;
        color: #565656;
    }
    p.title-cat{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 30px;
        Line-height: 36.31px;
        color: #565656;
    }
    p.style-down{
        width: auto;
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
    /*lista categorias*/
    .lista-categorias {
        width: 100%;
        box-sizing: border-box;
    }

    #categoriasToggle {
        display: none;
    }

    #categorylist {
        display: table;
    }

    #categorylist li:first-child {
        position: relative;
    }

    #categorylist li {
        margin-right: 30px;
        margin-top: 10px;
        float: left;
    }

    #categorylist li a {
        box-sizing: border-box;
        font-family: 'Inter';
        background: none repeat scroll 0 0 #E5E8ED;;
        border: 1px solid #E5E8ED;
        border-radius: 8px;
        color: #565656;
        display: block;
        font-size: 16px;
        font-weight: 400;
        padding: 4px 12px;
        margin-top: 5px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        text-decoration: none;
    }

    #categorylist li a:hover{
        background-color: #64C69F;
        color: #FFFFFF;
    }

    #categoriasToggle {
        display: none;
    }
    .enlaces{
        Width: 392px !important;
        Height: 292px!important;
        border-radius: 10px;
        background-color: #00548F;
        color:#FFFFFF;
    }
    footer{
        height:535px;
        background-color: #389144;
    }
    .fotoA img {
        width: 313px;
        height: 348px;
        border-radius: 0px 0px 100px 0px;
        object-fit: cover;
    }
    p.style-nombre {
        font-family: Inter;
        font-size: 20px;
        font-style: italic;
        font-weight: 600;
        line-height: 24px;
        letter-spacing: 0em;
        text-align: left;
        color: #00548F;
    }
    .info h3 {
        font-family: Inter;
        font-size: 20px;
        font-weight: 700;
        line-height: 24px;
        letter-spacing: 0em;
        text-align: left;
        margin-top: 20px;
        margin-bottom: 20px;
    }
    p.style-B{
        font-family: Inter;
        font-size: 20px;
        font-weight: 700;
        line-height: 24px;
        letter-spacing: 0em;
        text-align: left;
        color: #565656;
    }
    p.descripcion-B {
        font-family: Inter;
        font-size: 16px;
        font-weight: 500;
        line-height: 19px;
        letter-spacing: 0em;
        text-align: left;
    }
    .backgroundB{
        background-color: #00548F !important;
    }
    .descripB{
        font-family: Inter;
        font-size: 16px;
        font-weight: 500;
        line-height: 19px;
        letter-spacing: 0em;
        text-align: left;
        color:#fff;

    }
</style>
<html>
<head>
    <meta charset="utf-8">
    <title>Región de los Lagos</title>
    <!-- Agrega aquí tus enlaces a hojas de estilo CSS, si es necesario -->
    <!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
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
            <div class="container pt-5 pb-5">
                <div class="row" >
                    <div class="col-md-12" >
                        <p class="style-bread"><a href="/">Home </a> / <span style="font-Weight: 700;"><a href="/gobiernoregional/asambleaclimatica">Región de los Lagos</a></span></p>                    </div>
                    </div>
                    <div class="col-md-12 pt-5 pb-5">
                        <p class="one-title pb-4">Región de los Lagos</p>

                        <p style="Width:623px;"  class="mb-3 descripB">Es considerada como la puerta del sur de nuestro país. Aquí comienza a sentirse de verdad el rigor del invierno</p>
                    </div>
                    
                <div class="container pt-4">
                    <div class="row">
                        
                    </div>
                </div>   
            </div>
        </div>
    </div>
</div> 
    <!-- Contenido principal de tu página -->
    <main>
    <div class="container-fluid cat">
        <div class="row">
            <div class="col-md-12 pt-4 pb-4">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-12 mt-5 pb-4">
                            <p class="title-cat mt-5">Selecciona una Categoría</p>
                        </div>
                    </div>
                </div>
                <div class="container set pb-4">
                    @include('layouts.listacategoriasRegionLagos')
                </div>
                <div class="container mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-8 borderR">
                            <div class="container int p-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="style-tag pt-0 pb-4">{{ $introduccion->cargo }}</p>
                                    </div>
                                    <div class="col-md-5 fotoA">
                                        <img src="{{ asset($introduccion->foto) }}" alt="Imagen actual" style="max-width: 674px; max-height: 443px;">    
                                    </div>
                                    <div class="col-md-7 info">
                                        <p class="style-nombre pb-4">{{ $introduccion->nombre }}</p>
                                        <p>Lugar y fecha de Nacimiento: {{ $introduccion->lugar_fecha_nacimiento }}</p>
                                        <p>Actividad o Profesión: {{ $introduccion->actividad_profesion }}</p>
                                        <p>Partido Político: {{ $introduccion->partido_politico }}</p>
                                        <h3>Datos del servicio</h3>
                                        <p>Cargo: {{ $introduccion->cargo }}</p>
                                        <p>Institución: {{ $introduccion->institucion }}</p>
                                        <p>Dirección: {{ $introduccion->direccion }}</p>
                                        <p>Fono: {{ $introduccion->fono }}</p>
                                        <p>Fax: {{ $introduccion->fax }}</p>
                                        <p>E-Mail: {{ $introduccion->Email }}</p>
                                        <p>Región: {{ $introduccion->region }}</p>
                                        <p>Provincia: {{ $introduccion->provincia }}</p>
                                        <p>Comuna: {{ $introduccion->comuna }}</p>
                                        <p>Sitio Web: {{ $introduccion->web }}</p>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="style-B pt-4 pb-4">Biografía</p>
                                        <p class="descripcion-B">{{ $introduccion->biografia }}</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                            

                        <div class="col-md-4">
                            <div class="container img">
                                <div class="row">
                                    <div class="col-md-12">
                                    <p class="infoR pb-4">Información de la Región</p>
                                    <p class="enlaceM"><a href="{{ route('RegionlagosAutoridades.show', 'Gobernador Regional') }}" class="{{ request()->routeIs('RegionlagosAutoridades.show') && request()->route('cargo') == 'Gobernador Regional' ? 'active' : '' }}">Gobernador Regional</a></p>
                                    <div class="container">
                                        <div class="row">
                                            
                                            <div class="col-md-12 p-0">
                                                <!-- Menú vertical -->
                                                <div class="nav  p-0 flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                    <!-- Submenú -->
                                                    <a class="enlaceM" id="v-pills-submenu-tab" data-bs-toggle="collapse" href="#submenu" role="button" aria-expanded="false" aria-controls="submenu">Senadores</a>
                                                    <div class="collapse  p-0" id="submenu">
                                                        @foreach($sen as $autoridad)
                                                            <p class="enlaceM"><a class="ml-3" href="{{ route('BuscarAutoridadesSenador.show', $autoridad->nombre) }}">{{ $autoridad->nombre }}</a></p>
                                                        @endforeach
                                                    </div>
                                                    
                                                </div>
                                                <div class="nav  p-0 flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                    <!-- Submenú -->
                                                    <a class="enlaceM" id="v-pills-submenu-tab" data-bs-toggle="collapse" href="#submenu1" role="button" aria-expanded="false" aria-controls="submenu">Diputados</a>
                                                    <div class="collapse  p-0" id="submenu1">
                                                        @foreach($dip as $autoridad1)
                                                            <p class="enlaceM"><a class="ml-3" href="{{ route('BuscarAutoridadesDiputados.show', $autoridad1->nombre) }}">{{ $autoridad1->nombre }}</a></p>
                                                        @endforeach
                                                    </div>
                                                    <!-- Fin Submenú -->
                                                </div>
                                                <div class="nav  p-0 flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                    <!-- Submenú -->
                                                    <a class="enlaceM" id="v-pills-submenu-tab" data-bs-toggle="collapse" href="#submenu2" role="button" aria-expanded="false" aria-controls="submenu">Seremis</a>
                                                    <div class="collapse  p-0" id="submenu2">
                                                        @foreach($ser as $autoridad2)
                                                            <p class="enlaceM"><a class="ml-3" href="{{ route('BuscarAutoridadesSeremis.show', $autoridad2->nombre) }}">{{ $autoridad2->nombre }}</a></p>
                                                        @endforeach
                                                    </div>
                                                    <!-- Fin Submenú -->
                                                </div>
                                                <div class="nav  p-0 flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                    <!-- Submenú -->
                                                    <a class="enlaceM" id="v-pills-submenu-tab" data-bs-toggle="collapse" href="#submenu3" role="button" aria-expanded="false" aria-controls="submenu">Servicios</a>
                                                    <div class="collapse  p-0" id="submenu3">
                                                        @foreach($serv as $autoridad3)
                                                            <p class="enlaceM"><a class="ml-3" href="{{ route('BuscarAutoridadesServicios.show', $autoridad3->nombre) }}">{{ $autoridad3->nombre }}</a></p>
                                                        @endforeach
                                                    </div>
                                                    <!-- Fin Submenú -->
                                                </div>
                                                <div class="nav  p-0 flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                    <!-- Submenú -->
                                                    <a class="enlaceM" id="v-pills-submenu-tab" data-bs-toggle="collapse" href="#submenu4" role="button" aria-expanded="false" aria-controls="submenu">Municipales</a>
                                                    <div class="collapse  p-0" id="submenu4">
                                                        @foreach($muni as $autoridad4)
                                                            <p class="enlaceM"><a class="ml-3" href="{{ route('BuscarAutoridadesMunicipalidades.show', $autoridad4->nombre) }}">{{ $autoridad4->nombre }}</a></p>
                                                        @endforeach
                                                    </div>
                                                    <!-- Fin Submenú -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>      
    </main>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>Pie de página &copy; {{ date('Y') }}</p>
                </div>
            </div>
        </div>                    
       
        
    </footer>
    <!-- Agrega aquí tus scripts de JavaScript, si es necesario -->
</body>
</html>
@endsection