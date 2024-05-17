<!DOCTYPE html>
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
        color: #F59120;
    }
    .title-cat{
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
        background-color: #F59120;
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
    .backgroundB{
          background-color: #F59120 !important;padding-left: 3vw;    border-bottom: 1px solid #fff;
        }
        .colorB{
            background-color:#F59120;
        }
        .nav-head{
            background-color:#F59120 !important;
        } 
        .borderR{
        border-left: 2px solid #F59120;
    }  
</style>
<html>
<head>
    <meta charset="utf-8">
    <title>Región de los Lagos</title>
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
                    <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/<a href="/gobiernoregional/acerca"> Gobierno Regional</a> / <span style="font-Weight: 700;"><a href="#"></a></span></p>                    </div>
                    </div>
                    <div class="col-md-12 pt-5 pb-5">
                        <p class="one-title pb-4">Formulación Política de Turismo</p>

                        <p style="Width:623px;"  class="mb-3 descripB">Impulsar un diálogo regional e institucional con el propósito de formular una Política Regional de Turismo e Imagen Región</p>
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
                    <div class="row">
                        <div class="col-md-12 mt-5 pb-4">
                            
                        </div>
                    </div>
                </div>
                <div class="container mt-5 mb-5 p-0">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="container int">
                                <div class="row">
                                    <div class="col-md-12">
                                    
                                    <h2 class="title-cat mb-4">Productos Política de Turismo</h2>
                                    @foreach ($datosPrincipales as $principal)
                                    <div style=" border: 1px solid #f59120; padding: 10px; margin-bottom: 16px; "><h2>{!! $principal->titulo ?? '' !!}</h2>
                                        @foreach ($principal->ProductosdelaPoliticadeTurismoI as $secundario)

                                        <div class="col-md-6 p-3">
                                            <div class="container int">
                                                <div class="row">
                                                <div class="col-md-12 p-0">
                                                {{ $secundario->titulo }}
                                                </div>
                                                <div class="col-md-7 p-0">
                                                {{ $secundario->nombre }}
                                                </div>
                                              <div class="col-md-2 p-0">
                                              <a href="{{ $secundario->url }}"><img class="imagenes-d pt-0" width="43" src="{{ asset('storage/images/pdf.png') }}" alt="Logo Gore Blanco"></a>
                                            </div>        
                                                    
                                        </div> 
                                            </div>        
                                        </div>        
                                            <!-- Agrega aquí otros campos según tu modelo secundario -->
                                        @endforeach
                                        </div>
                                    @endforeach


                                    <p><b>Nota :</b></p> <p>Si no puede abrir directamente el documento, presione el botón derecho del mouse sobre el icono de descarga y luego seleccionar "Guardar destino como..." o "Guardar enlace como..." . Esto le permite guardar el documento directamente a su equipo.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 borderR d-none d-lg-block">
                            @include('layouts.menupoliticaturismo')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
    <!-- Agrega aquí tus scripts de JavaScript, si es necesario -->
</body>
</html>
@endsection
