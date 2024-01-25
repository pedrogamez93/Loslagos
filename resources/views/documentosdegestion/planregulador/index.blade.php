<!DOCTYPE html>
<style>
    .second{
       /* width: 100%;*/
        height: 450px;
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
    }
    .cat{
        margin-top: -5rem;
        background-color: #FFFFFF;
        border-radius: 100px 0 0 0;
    }
    .enlaces{
        Width: 392px !important;
        Height: 292px!important;
        border-radius: 10px;
        background-color: #00548F;
        color:#FFFFFF;
    }
    /*css contenido*/
    h1.mititulo{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 30px;
        color: #565656;
    }
    .accordion-item {
    		border: none !important;
		}
		button.accordion-button {
    		background-color: rgba(0, 0, 0, 0) !important;
		}
        .accordion-button:focus, .accordion-button:not(.collapsed) {
            border: none !important;
            box-shadow: none !important;
        }
        button.accordion-button::before, button.accordion-button::after{
            border: none !important;
        }

    p.title-acord-one{
		font-family: 'Inter';
		font-Weight: 700;
		font-Size: 30px;
		color: #565656;0
	}

    p.title-acord{
			font-family: 'Inter';
			font-Weight: 700;
			font-Size: 20px;
			color: #565656;0
		}
	.bajada-acord{
			font-family: 'Inter';
			font-Weight: 500;
			font-Size: 16px;
			Line-height: 19.36px;
			color: #565656;
			text-align: justify;
	}

    p.title-categ{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 20px;
        line-height: 24.2px;
        color: #F59120
    }

    h2.mi-style-h2{
        font-family: 'Inter';
        font-Weight: 600;
        font-Size: 20px;
        font-style: italic;
        line-height: 24.2px;
        color: #F59120;
        
    }
    .mi-documento{
        display: flex;
    }
    p.mistyle-final-pcateg{
        font-family: 'Inter';
        font-weight: 500;
        font-size: 16px;
        line-height: 19.36px;
        color: #565656;
    }
    h2.h2-seccion-btn-extras{
        font-family: 'Inter';
        font-weight: 700;
        font-Size: 16px;
        line-height: 19.36px;
        color: #565656;
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
        font-size: 30px;
        line-height: 24.2px;
        color: #F59120;
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
</style>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tu Título Aquí</title>
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
                                <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/<a href="/gobiernoregional/acerca"> Gobierno Regional</a> / <a href ="/documentosdegestion">Documentos de Gestion</a> / <a style="font-Weight: 700;" href ="/documentosdegestion">Plan Regulador Comunal</a></p>
                            </div>
                        </div>
                            
                        <div class="container content-prin pt-4 p-0">
                            <div class="row">
                                <div class="col-md-12 p-0">
                                    <p class="one-title pb-5">Gobierno Regional</p>
                                </div>
                                <div class="col-md-6 p-0">
                                    <p>El Gobierno Regional (GORE) es un organismo autónomo, que tiene por objetivo la administración de la región, impulsando su desarrollo económico, cultural y social</p>
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
                                    <div class="col-md-12 p-0">
                                    <p class="title-cat">Selecciona una Categoría</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 p-0">
                        <div class="container set pb-4 p-0">
                        @include('layouts.listacategorias')
                        </div>
                        <div class="container content mt-5 mb-5 p-0">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="container">
                                        <div class="row">
                                            <h1 class="mititulo p-0">Plan Regulador Comunal de Maullín 2022</h1>
                                            @foreach ($documentosPlanRegulador as $documento)
                                                <div class="col-md-6">
                                                    <div class="mi-documento mt-3 mb-3 d-flex align-items-center">
                                                        <a href="{{ asset('storage/' . $documento->ruta_documento) }}" target="_blank" class="d-flex align-items-center text-decoration-none">
                                                            <img width="43px" height="44px" src="{{ asset('storage/images/pdf.png') }}" alt="Descripción de la imagen">
                                                            <p class="ms-3">{{ $documento->titulo }}</p>
                                                        </a>
                                                    </div>
                                                </div>
                                                @if ($loop->iteration % 2 == 0)
                                                    <div class="w-100"></div> <!-- Añade un salto de fila cada 2 documentos -->
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" style="border-left: 2px solid #F59120;">
                                    <div>
                                        <h2 class="mi-style mb-4" style="width: 322px;">Selecciona una Categoría para los Documentos de Gestión</h2>
                                    </div>
                                    @include('layouts.categoriasdocumentos')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </main>
    </body>
</html>

@endsection
