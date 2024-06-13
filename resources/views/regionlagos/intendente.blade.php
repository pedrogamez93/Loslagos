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
        border-left: 2px solid #F59120;
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
    
a.active {
    font-family: Inter;
    font-size: 16px;
    font-weight: 700;
    line-height: 19px;
    letter-spacing: 0em;
    text-align: left;
}
a.a3 {
    color: #00548F !important;
    border-radius: 100px !important;
    border: 1px solid #00548F !important;
    font-weight: 700 !important;
}
.negrita {
        font-weight: bold;
    }

    .azul {
        color: blue;
    }
    .borderM {
            border-top: 2px solid #F59120;
            border-bottom: 2px solid #F59120;
            padding: 24px 0px;
            margin-bottom: 20px;
        }
        .colorB{
            background-color:#00548F;
        }
        .nav-head{
            background-color:#00548f !important;
        }   
</style>
<html>
<head>
    <meta charset="utf-8">
    <title>Región de Los Lagos</title>
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
<div class="container-fluid colorB">
    <div class="row">
        <div class="col-md-12">
            <div class="container pt-5 pb-5">
                <div class="row" >
                    <div class="col-md-12" >
                        <p class="style-bread"><a href="/">Home </a> / <span style="font-Weight: 700;"><a href="/gobiernoregional/asambleaclimatica">Región de Los Lagos</a></span></p>                    </div>
                    </div>
                    <div class="col-md-12 pt-5 pb-5">
                        <p class="one-title pb-4">Región de Los Lagos</p>

                        <p style="Width:auto;"  class="mb-3 descripB">Es considerada como la puerta del sur de nuestro país. Aquí comienza a sentirse de verdad el rigor del invierno</p>
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
                        <div class="col-md-4 borderM d-block d-lg-none">
                            <div class="container img">
                                <div class="row">
                                    <div class="col-md-12">
                                    <p class="infoR pb-4">Información de la Región</p>
                                    <p class="enlaceM"><a href="{{ route('RegionlagosAutoridades.show', 'Gobernador Regional') }}" class="{{ $introduccion->cargo == 'Gobernador Regional' ? 'active' : 'asd' }}">Gobernador Regional</a></p>
                                    <div class="container">
                                        <div class="row">
                                            
                                            <div class="col-md-12 p-0">
                                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                                    <div class="accordion-item border-0">
                                                        <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed p-0 pt-3 pb-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                            Senadores
                                                        </button>
                                                        </h2>
                                                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body p-0">
                                                            @foreach($sen as $autoridad)
                                                                <p class="enlaceM"><a class="ml-3" href="{{ route('BuscarAutoridadesSenador.show', $autoridad->nombre) }}">{{ $autoridad->nombre }}</a></p>
                                                            @endforeach
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item border-0">
                                                        <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed p-0 pt-3 pb-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                            Diputados
                                                        </button>
                                                        </h2>
                                                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body p-0">
                                                            @foreach($dip as $autoridad1)
                                                                <p class="enlaceM"><a class="ml-3" href="{{ route('BuscarAutoridadesDiputados.show', $autoridad1->nombre) }}">{{ $autoridad1->nombre }}</a></p>
                                                            @endforeach
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item border-0">
                                                        <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed p-0 pt-3 pb-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                            Seremis
                                                        </button>
                                                        </h2>
                                                        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body p-0">
                                                            @foreach($ser as $autoridad2)
                                                                <p class="enlaceM"><a class="ml-3" href="{{ route('BuscarAutoridadesSeremis.show', $autoridad2->nombre) }}">{{ $autoridad2->institucion }}</a></p>
                                                            @endforeach
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item border-0">
                                                        <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed p-0 pt-3 pb-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
                                                            Servicios
                                                        </button>
                                                        </h2>
                                                        <div id="flush-collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body p-0">
                                                            @foreach($serv as $autoridad3)
                                                                <p class="enlaceM"><a class="ml-3" href="{{ route('BuscarAutoridadesServicios.show', $autoridad3->nombre) }}">{{ $autoridad3->institucion }}</a></p>
                                                            @endforeach
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item border-0">
                                                        <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed p-0 pt-3 pb-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">
                                                            Municipalidades
                                                        </button>
                                                        </h2>
                                                        <div id="flush-collapse5" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body p-0">
                                                            @foreach($muni as $autoridad4)
                                                                <p class="enlaceM"><a class="ml-3" href="{{ route('BuscarAutoridadesMunicipalidades.show', $autoridad4->nombre) }}">{{ $autoridad4->institucion }}</a></p>
                                                            @endforeach
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
                        <div class="col-md-8 ">
                            <div class="container int p-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="style-tag pt-0 pb-4">{{ $introduccion->cargo }}</p>
                                    </div>
                                    <div class="col-md-5 fotoA d-none d-lg-block">
                                        <img src="{{ asset($introduccion->foto) }}" alt="Imagen actual" style="max-width: 674px; max-height: 443px;">    
                                    </div>
                                    <div class="col-md-7 info">
                                        <p class="style-nombre pb-4">{{ $introduccion->nombre }}</p>
                                        <!--<p>Lugar y fecha de Nacimiento: {{ $introduccion->lugar_fecha_nacimiento }}</p>-->
                                        <p>Actividad o Profesión: {{ $introduccion->actividad_profesion }}</p>
                                        <!--<p>Partido Político: {{ $introduccion->partido_politico }}</p>-->
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
                                    <div class="col-md-5 fotoA d-block d-lg-none">
                                        <img src="{{ asset($introduccion->foto) }}" alt="Imagen actual" style="max-width: 674px; max-height: 443px;">    
                                    </div>
                                </div>
                            </div>
                        </div>
                            

                        <div class="col-md-4 borderR d-none d-lg-block">
                            <div class="container img">
                                <div class="row">
                                    <div class="col-md-12">
                                    <p class="infoR pb-4">Información de la Región</p>
                                    <p class="enlaceM"><a href="{{ route('RegionlagosAutoridades.show', 'Gobernador Regional') }}" class="{{ $introduccion->cargo == 'Gobernador Regional' ? 'active' : 'asd' }}">Gobernador Regional</a></p>
                                    <div class="container">
                                        <div class="row">
                                            
                                            <div class="col-md-12 p-0">
                                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                                    <div class="accordion-item border-0">
                                                        <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed p-0 pt-3 pb-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                            Senadores
                                                        </button>
                                                        </h2>
                                                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body p-0">
                                                            @foreach($sen as $autoridad)
                                                                <p class="enlaceM"><a class="ml-3" href="{{ route('BuscarAutoridadesSenador.show', $autoridad->nombre) }}">{{ $autoridad->nombre }}</a></p>
                                                            @endforeach
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item border-0">
                                                        <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed p-0 pt-3 pb-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                            Diputados
                                                        </button>
                                                        </h2>
                                                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body p-0">
                                                            @foreach($dip as $autoridad1)
                                                                <p class="enlaceM"><a class="ml-3" href="{{ route('BuscarAutoridadesDiputados.show', $autoridad1->nombre) }}">{{ $autoridad1->nombre }}</a></p>
                                                            @endforeach
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item border-0">
                                                        <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed p-0 pt-3 pb-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                            Seremis
                                                        </button>
                                                        </h2>
                                                        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body p-0">
                                                            @foreach($ser as $autoridad2)
                                                                <p class="enlaceM"><a class="ml-3" href="{{ route('BuscarAutoridadesSeremis.show', $autoridad2->nombre) }}">{{ $autoridad2->institucion }}</a></p>
                                                            @endforeach
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item border-0">
                                                        <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed p-0 pt-3 pb-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
                                                            Servicios
                                                        </button>
                                                        </h2>
                                                        <div id="flush-collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body p-0">
                                                            @foreach($serv as $autoridad3)
                                                                <p class="enlaceM"><a class="ml-3" href="{{ route('BuscarAutoridadesServicios.show', $autoridad3->nombre) }}">{{ $autoridad3->institucion }}</a></p>
                                                            @endforeach
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item border-0">
                                                        <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed p-0 pt-3 pb-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">
                                                            Municipalidades
                                                        </button>
                                                        </h2>
                                                        <div id="flush-collapse5" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body p-0">
                                                            @foreach($muni as $autoridad4)
                                                                <p class="enlaceM"><a class="ml-3" href="{{ route('BuscarAutoridadesMunicipalidades.show', $autoridad4->nombre) }}">{{ $autoridad4->institucion }}</a></p>
                                                            @endforeach
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
            </div>
        </div>
    </div>      
    </main>


    <!-- Agrega aquí tus scripts de JavaScript, si es necesario -->
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Obtener todos los elementos de encabezado del acordeón
        var accordionHeaders = document.querySelectorAll(".accordion-header button");

        // Manejar clics en los elementos de encabezado del acordeón
        accordionHeaders.forEach(function (header) {
            header.addEventListener("click", function () {
                // Remover la clase 'negrita' de todos los encabezados
                accordionHeaders.forEach(function (el) {
                    el.classList.remove("negrita");
                });

                // Agregar la clase 'negrita' al encabezado clicado
                header.classList.add("negrita");
            });
        });

        // Obtener todos los enlacesM
        var enlacesM = document.querySelectorAll(".enlaceM");

        // Manejar clics en los enlacesM
        enlacesM.forEach(function (enlace) {
            enlace.addEventListener("click", function () {
                // Remover la clase 'azul' de todos los enlacesM
                enlacesM.forEach(function (el) {
                    el.classList.remove("azul");
                });

                // Agregar la clase 'azul' al enlace clicado
                enlace.classList.add("azul");
            });
        });
    });
</script>



</body>
</html>
@endsection