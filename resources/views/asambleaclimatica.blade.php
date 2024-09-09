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

    nav a {
        text-decoration: none; 
    }
    .nav-head {
    background-color: #00548f !important;
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
			color: #565656;
		}
	.bajada-acord{
			font-family: 'Inter';
			font-Weight: 500;
			font-Size: 16px;
			Line-height: 19.36px;
			color: #565656;
			text-align: justify;
            white-space: pre-wrap;
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
    .container-fluid.color{
        background-color:#00548F;
    }
    .container-fluid.nav-head {
    background-color: #00548f;
    }
    nav.navbar.navbar-expand-lg.px-5.backgroundB.container {
    background-color: #00548f;
    }
    footer{
        height:535px;
        background-color: #389144;
    }
    @media only screen and (max-width: 600px) {
    /* Estilos para pantallas móviles aquí */
    p.one-title{
        font-size:30px !important;
        padding-bottom: 0px!important;
    }
    .container-fluid.cat{
        padding-left: 30px;
    }
}
</style>
<html>
<head>
    <meta charset="utf-8">
    <title>Gobierno Regional</title>
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
                        <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/<a href="/gobiernoregional/acerca"> Gobierno Regional</a> / <span style="font-Weight: 700;"><a href="/gobiernoregional/asambleaclimatica">Asamblea Climatica Ciudadana</a></span></p>
                    </div>
                </div>
                    
                <div class="container content-prin pt-4  p-0">
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

                            <div class="accordion" id="accordionone">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <p class="title-acord-one">{{ $asamblea->titulo_one ?? '' }}</p>
                                        </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionone">
                                            <div class="accordion-body">
                                                <div class="bajada-acord">{{ $asamblea->descripcion_one ?? '' }}</div>
                                            </div>
                                        </div>
                                    </div>  
                            </div>

                            <div class="accordion" id="accordionTwo">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <p class="title-acord">. {{ $asamblea->titulo_two ?? '' }}</p>
                                    </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionTwo">
                                        <div class="accordion-body">
                                        <div class="bajada-acord">{{ $asamblea->descripcion_two ?? '' }}</div>
                                        </div>
                                    </div>
                                </div>   
                            </div>

                            <div class="accordion" id="accordionTree">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTree">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTree" aria-expanded="false" aria-controls="collapseTree">
                                    <p class="title-acord">. {{ $asamblea->titulo_tree ?? '' }}</p>
                                    </button>
                                    </h2>
                                    <div id="collapseTree" class="accordion-collapse collapse" aria-labelledby="headingTree" data-bs-parent="#accordionTree">
                                        <div class="accordion-body">
                                        <div class="bajada-acord">{{ $asamblea->descripcion_tree ?? '' }}</div>
                                        </div>
                                    </div>
                                </div>   
                            </div>

                            <div class="accordion" id="accordionFour">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <p class="title-acord">. {{ $asamblea->titulo_four ?? '' }}</p>
                                    </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionFour">
                                        <div class="accordion-body">
                                        <div class="bajada-acord">{{ $asamblea->descripcion_four ?? '' }}</div>
                                        </div>
                                    </div>
                                </div>   
                            </div>

                            <div class="accordion" id="accordionFive">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    <p class="title-acord">. {{ $asamblea->titulo_five ?? '' }}</p>
                                    </button>
                                    </h2>
                                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionFive">
                                        <div class="accordion-body">
                                        <div class="bajada-acord">{{ $asamblea->descripcion_five ?? '' }}</div>
                                        </div>
                                    </div>
                                </div>   
                            </div>

                            <div class="accordion" id="accordionSix">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSix">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    <p class="title-acord">. {{ $asamblea->titulo_six ?? '' }}</p>
                                    </button>
                                    </h2>
                                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionSix">
                                        <div class="accordion-body">
                                        <div class="bajada-acord">{{ $asamblea->descripcion_six ?? '' }}</div>
                                        </div>
                                    </div>
                                </div>   
                            </div>
                            <div class="container">
                                {{-- Verifica si $asamblea no es nulo antes de intentar acceder a sus propiedades --}}
                                        @if($asamblea && $asamblea->documentos)
                                            {{-- Itera sobre los documentos solo si $asamblea y $asamblea->documentos no son nulos --}}
                                            <h2 class="mi-style-h2 mt-5 mb-5">{{ $asamblea->titulo_seccion_two ?? '' }}</h2>
                                            @foreach ($asamblea->documentos as $documento)
                                                {{-- Aquí puedes acceder a las propiedades del documento --}}
                                                <div class="mi-documento mt-3 mb-3">
                                                    <a href="{{ route('downloadAsamblea', $documento->id) }}" target="_blank">
                                                        <img width="43px" height="44px" src="{{ asset('storage/images/pdf.png') }}" alt="Descripción de la imagen" style="display: inline-block; vertical-align: middle;">
                                                        <p class="p-doc mt-2 mb-2" style="font-family: 'Inter'; font-weight: 500; font-size: 16px; line-height: 19.36px; display: inline-block; vertical-align: middle; color:#565656;">{{ $documento['nombre_documento'] }}</p>
                                                    </a>
                                                </div>
                                                {{-- ... --}}
                                            @endforeach
                                        @else
                                            {{-- Maneja el caso en que $asamblea o $asamblea->documentos sea nulo --}}
                                            <p>No hay documentos disponibles</p>
                                        @endif
                            </div>
                                    <div class="container btn-extras">
                                        <h2 class="h2-seccion-btn-extras mt-5 mb-5">{{ $asamblea->titulo_seccion_btn ?? '' }}</h2>
        
                                            <div class="mi-btn mt-4 mb-4">
                                                <a class="final-btn" href="{{ $asamblea->url_btn ?? '' }}" target="_blank">
                                                    {{ $asamblea->nombre_btn ?? '' }}
                                                </a>
                                            </div>
                        
                                    </div>
                        </div>

                        <div class="col-md-4" style="border-left: 2px solid #F59120;">
                            <p class="title-categ pb-4">Categorias Asamblea Climática</p>
                            {{-- Para el enlace "Asamblea Climática Ciudadana" --}}
                                <p class="mistyle-final-pcateg mt-2 mb-2" style="{{ request()->is('gobiernoregional/asambleaclimatica*') ? 'font-weight: 700;' : '' }}">
                                    <a href="/gobiernoregional/asambleaclimatica">Asamblea Climática Ciudadana</a>
                                </p>

                                {{-- Para el enlace "Audiencias de Partes Interesadas" --}}
                                <p class="mistyle-final-pcategoff mt-2 mb-2" style="{{ request()->is('gobiernoregional/asambleaclimatica/audienciadepartes*') ? 'font-weight: 700;' : '' }}">
                                    <a href="/gobiernoregional/asambleaclimatica/audienciadepartes">Audiencias de Partes Interesadas</a>
                                </p>
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

