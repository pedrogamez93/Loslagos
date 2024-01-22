<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<style>
    header{
       /* width: 100%;*/
        height: 450px;
        background-color: #F59120;
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
        overflow-wrap: break-word;
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
        padding-left: 5rem !important;
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
    h1.mititulo{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 30px;
        color: #565656;
    }
    p.mi-style-onep{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 16px;
        color: #565656;
        padding-bottom: 2%;
    }
    p.mi-style-onet{
        font-family: 'Inter';
        font-Weight: 500;
        font-Size: 16px;
        color: #565656;
        padding-bottom: 2%;
    }
    .contenido-ley{
        border: 1px solid #F59120;
    }
    .card {
    border: none !important;
}
h5.card-title{
    font-family: 'Inter';
    font-Weight: 700;
    font-Size: 20px;
    Line-height: 24.2px;
    color: #565656;
}
    img.img-fluid.icon-style.mr-3 {
    width: 90px;
    height: 75px;
}
    a.final-btn{
        padding: 10px 20px;
        border-Radius: 100px;
        background-color: #F59120;
        color: #FFFFFF;
        font-Weight: 700;
    }
    footer{
        height:535px;
        background-color: #389144;
    }
    /*aqui estilos del admin pila no te enredes arriba los del header front*/
    h1 , h2{
        color: #565656;
    }
    .principal{
        padding: 10px 0px 20px 60px;       
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
    .style-label{
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
    .title-descargas{
    font-family: 'Inter';
    font-Weight: 700;
    font-Size: 20px;
    Line-height: 24.2px;
    color: #F59120;
    }
    .borde{
    border-right: 1px solid #F59120 ;
    }
    .title-programa{
    font-family: 'Inter';
    font-Weight: 700;
    font-Size: 30px;
    Line-height: 36.2px;
    color: #565656;
    }
    p.bajada-programa{
    font-family: 'Inter';
    font-Weight: 500;
    font-Size: 16px;
    Line-height: 19.36px;
    color: #565656;
    overflow-wrap: break-word;
    }
    
    a.descargables{
    font-family: 'Inter';
    font-Weight: 700;
    font-Size: 16px;
    Line-height: 19.36px;
    color: #565656; 
    text-decoration:none;
    display: block;
    overflow-wrap: break-word;

    }
    .title-doc-fot{
    font-family: 'Inter';
    font-Weight: 700;
    font-Size: 30px;
    Line-height: 36.31px;
    color: #565656;   
    margin-bottom: 35px;
    }
    .btn-single a{
    display: inline-flex;
    background-color: #F59120;
    margin: 5px 60px 5px 0px !important;
    padding: 7px 20px;
    border-radius: 20px;
    color: #ffffff;
    font-family: 'Inter' !important;
    font-weight: 700;
    font-size: 16px;
    }
    .grid-documentos{
    width: 100%;
    margin: 40px auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)) !important;
    gap: 30px;
    }
    .fotografias-coleccion{
    margin: 20px 0;
    }
    button.accordion-button {
    background: #ffffff !important;
    }
    .accordion-item, .accordion-button, .accordion-body{
    border: 0 solid #ffffff !important;
    }
    .accordion-body{
    font-family: 'Inter';
    font-Weight: 500;
    font-Size: 16px;
    Line-height: 19.36px;
    color: #565656; 
    
    }
    .accordion-button{
    font-family: 'Inter';
    font-Weight: 700;
    font-Size: 30px;
    Line-height: 36.36px;
    color: #565656; 
    
    }
</style>
<header>
@extends('layouts.app')
@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_documentos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush

        <!-- Contenido del encabezado principal breadcumbs, titulo, bajadas-->
        <div class="container content-breadc pt-4 pb-3" style="padding: 10px 60px 20px 60px;">
            <div class="row">
                <div class="col-md-12">
                    <p class="style-bread">Home / Gobierno Regional  <span style="font-Weight: 700;"></span></p>
                </div>
            </div>
        </div>   
        <div class="container content-prin" style="padding: 10px 60px 20px 60px;">
            <div class="row">
                <div class="col-md-12">
                    <p class="one-title pb-4">{{ $programa->titulo }}</p>
                    <p style="">{{ $programa->bajada }}</p>
                </div>
            </div>
        </div>   
    </header>
            
    <div class="container principal mt-4 mb-4 pt-3 pb-3" style="padding: 10px 60px 20px 60px;">
        <div class="row">
            <div class="col-md-7 borde">
                    <div id="contenidoPrincipal">
                        <p class="bajada-programa">{!! $programa->bajada_programa ?? '' !!}</p>
                        <!--ACORDEON DESCRIPCIONES-->
                            <div class="accordion mt-5" id="accordionExample">
                                <?php $i=0;?>
                                @foreach($programaDescripcion as $descripcion)
                                    <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                {{ $descripcion->titulo_descripcion }}                                </button>
                                                </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    {{ $descripcion->bajada_descripcion }}
                                                </div>
                                            </div>
                                    </div>
                                <?php $i++;?>
                                @endforeach
                    </div>
            </div>
                    <!--DOCUMENTOS-->
                    <div id="contenidoDocumentos" style="display: none;">
                        <h2 class="title-doc-fot">Documentos</h2>
                        <div class="container">
                            <div class="row" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
                                @foreach($programaDocumentos as $doc)
                                <div class="col" style="display: flex;">
                                    <img src="" alt="icon">
                                    <a download href="{{ $doc->urlDocumento }}">{{ $doc->nombreDocumento }} </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!--FOTOGRAFÍAS-->
                    <div id="contenidoFotografias" style="display: none;">
                        <h2 class="title-doc-fot">Fotografías</h2>

                        @foreach($programa->colecciones as $coleccion)
                            <div class="fotografias-coleccion">
                                <div class="coleccion-item">
                                    @if(count($coleccion->fotografias) > 0)
                                    <!-- <img src="{{ asset($coleccion->fotografias[0]->ruta) }}" alt="Fotografía" style="display: none; height:100px;">-->
                                    @endif

                                    <h5 class="titulo-coleccion mb-4" onclick="mostrarFotografias(this)">{{ $coleccion->titulo_coleccion }}</h5>

                                    @if(count($coleccion->fotografias) > 1)
                                        @foreach($coleccion->fotografias->slice(1) as $fotografia)
                                        <img src="{{ asset($fotografia->ruta) }}" alt="Fotografía" style="display: none; height:100px;margin: 10px 0;;">
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    
    
                        <a href="/todoslosprogramas" class="btn btn-secondary mt-5 mb-4">Volver</a>
            </div>
            <div class="col-md-3 ml-3">
                <h2 class="title-descargas mb-5">Documentos Regionales que puedes descargar:</h2>
                <a href="#" class="descargables pb-4" id="enlacePrincipal" onclick="mostrarContenido('principal')">{{ $programa->titulo }}</a>
                <a href="#" id="enlaceDocumentos" class="descargables pb-4" onclick="mostrarContenido('documentos')">Documentos</a>
                <a href="#" class="descargables pb-4" id="enlaceFotografias" onclick="mostrarContenido('fotografias')">Fotografías</a>
                <div class="btn-single">
                    @foreach($programaBtn as $btn)
                        <a href="{{ $btn->urlbtn }}" target="_blank">{{ $btn->nombrebtn }}</a>   
                    @endforeach
            </div>  
        </div>  
    </div>

</div>
<script>
    function mostrarContenido(tipo) {
        // Oculta todos los contenidos
        document.getElementById('contenidoPrincipal').style.display = 'none';
        document.getElementById('contenidoDocumentos').style.display = 'none';
        document.getElementById('contenidoFotografias').style.display = 'none';

        // Muestra el contenido correspondiente al tipo seleccionado
        if (tipo === 'documentos') {
            document.getElementById('contenidoDocumentos').style.display = 'block';
        } else if (tipo === 'fotografias') {
            document.getElementById('contenidoFotografias').style.display = 'block';
        } else if (tipo === 'principal') {
            document.getElementById('contenidoPrincipal').style.display = 'block';
        }
    }
</script>

<script>  
    document.addEventListener("DOMContentLoaded", function() {
      
        document.querySelector('.navbar').style.cssText = 'background-color: #F59120 !important; border-bottom: 1px solid #FFFFFF;';
        document.querySelector('.nav-head').style.cssText = 'background-color: #F59120 !important; border-bottom: 1px solid #FFFFFF;border-bottom:none !important;';

    });
</script>
<!--
<script>
    $(document).ready(function() {
        // Oculta todas las fotografías al principio
        $(".fotografias-coleccion").hide();

        // Agrega un evento de clic al título de la colección
        $(".titulo-coleccion").click(function() {
            // Encuentra las fotografías asociadas a la colección clicada
            var fotografiasColeccion = $(this).siblings(".fotografias-coleccion");

            // Alternar la visibilidad de las fotografías
            fotografiasColeccion.slideToggle();
        });
    });
</script>
-->

<script>
        function mostrarFotografias(titulo) {
            // Encuentra las imágenes asociadas al título clicado
            var fotografias = $(titulo).siblings('img');

            // Muestra u oculta las imágenes al hacer clic en el título
            fotografias.slideToggle();
        }
    </script>
@endsection
