<!DOCTYPE html>
<style>
    header{
       /* width: 100%;*/
        height: 450px;
        background-color: #00548F;
        color: #fff; /* Cambia esto al color de texto que desees */
        padding: 20px; /* AÃ±ade relleno si es necesario */
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
    .descripB{
        font-family: Inter;
        font-size: 16px;
        font-weight: 500;
        line-height: 19px;
        letter-spacing: 0em;
        text-align: left;
        color:#fff;

    }
   

    .backgroundB{
          background-color: #F59120 !important;padding-left: 3vw;    border-bottom: 1px solid #fff;
        }
        .colorB{
            background-color:#F59120;
        }
        .nav-head{
            background-color:#F59120 !important;
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
    margin-botton:20px;
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
    button.accordion-button{
        padding: 0;
    }
    .fotografias-coleccion {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.coleccion-item {
    width: 100%;
}

.grid-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* 3 columnas */
    gap: 10px; /* Espacio entre las imÃ¡genes */
}

.grid-item img {
    width: 100%;
    height: 100px; /* Altura fija */
    object-fit: cover; /* Ajuste de imagen */
}
</style>
<html>
<head>
    <meta charset="utf-8">
    <title>Programas</title>
    <!-- Agrega aquÃ­ tus enlaces a hojas de estilo CSS, si es necesario -->
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
                    <p class="style-bread">Home / Programas / <span style="font-Weight: 700;"> {{ $programa->titulo }}</span></p>
                    </div>
                    <div class="col-md-12 pt-5 pb-5">
                        <p class="one-title pb-4">{{ $programa->titulo }}</p>

                        <p style="Width:623px;"  class="mb-3 descripB"> {!! $programa->bajada ?? '' !!} </p>
                        
                    </div>
                    
                <div class="container pt-4">
                    <div class="row">
                        
                    </div>
                </div>   
            </div>
        </div>
    </div>
</div> 
    <!-- Contenido principal de tu pÃ¡gina -->
    <main>
    <div class="container-fluid cat">
        <div class="row">
            <div class="col-md-12 pt-4 pb-4">
                
                        <div class="container principal mt-4 mb-4 pt-3 pb-3" >
        <div class="row">
            <div class="col-md-7 borde">
                    <div id="contenidoPrincipal">
                        <div class=""> {!! $programa->bajada_programa ?? '' !!} </div>
                       

                        <!--ACORDEON DESCRIPCIONES-->
                            <div class="accordion mt-5" id="accordionExample">
                                <?php $i=0;?>
                                @foreach($programaDescripcion as $descripcion)
                                    <div class="accordion-item mb-2">
                                                <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                
                                                <div class=""><p> {!! $descripcion->titulo_descripcion ?? '' !!} </p></div>                                </button>
                                                </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body  p-0">
                                                    
                                                    <div class=""><p> {!! $descripcion->bajada_descripcion ?? '' !!} </p></div>    
                                                </div>
                                            </div>
                                    </div>
                                <?php $i++;?>
                                @endforeach
                    </div>
            </div>
<!-- DOCUMENTOS -->
<div id="contenidoDocumentos" style="display: none;">
    <h2 class="title-doc-fot">Documentos</h2>
    <div class="container">
        <div class="row" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
            @php
                // Invertir el arreglo de documentos
                $programaDocumentos = $programaDocumentos->reverse();
            @endphp
            @foreach($programaDocumentos as $doc)
                <div class="col" style="display: flex;">
                    <img width="43px" height="44px" src="{{ asset('storage/images/pdf.png') }}" alt="Acta" style="margin-right: 10px;">
                    <a href="{{ route('documentosprogramas.abrir', ['id' => $doc->id]) }}" style="align-self: center;">{{ $doc->nombreDocumento }}</a>
                </div>
            @endforeach
        </div>
    </div>
</div>




<!-- FOTOGRAFÃAS -->
<div id="contenidoFotografias" style="display: none;">
    <h2 class="title-doc-fot">FotografÃ­as</h2>

    @foreach($programa->colecciones as $coleccion)
        <div class="coleccion-item">
            <div class="grid-container">
                @foreach($coleccion->fotografias as $fotografia)
                    <div class="grid-item">
                        <img src="{{ asset('imagenes_programas/' . basename($fotografia->ruta)) }}" alt="FotografÃ­a" style="width: 100%; height: auto;">
                    </div>
                @endforeach
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
                <a href="#" class="descargables pb-4" id="enlaceFotografias" onclick="mostrarContenido('fotografias')">FotografÃ­as</a>
                <div class="btn-single">
                    @foreach($programaBtn as $btn)
                        <a href="{{ $btn->urlbtn }}" target="_blank">{{ $btn->nombrebtn }}</a>   
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
    </main>
    <!-- Agrega aquÃ­ tus scripts de JavaScript, si es necesario -->
</body>
</html>



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

@endsection
