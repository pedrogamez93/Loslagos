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
    .accordion-item {
    		border: 1px solid #F59120 !important;
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
    p.style-tags{
            font-family: 'Inter';
            font-weight: 600;
            font-style: italic;
            font-Size: 16px;
            Line-height: 19.36px;
            color: #00548F;
        }

        p.title-acord, .accordion-button{
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
	}
    p.minot{
        font-family: 'Inter';
        font-Weight: 500;
        font-Size: 16px;
        line-height: 19.36px;
        color: #565656;
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
    h1.mititulo{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 30px;
        color: #565656;
    }
    h2.mistyle{
        font-family: 'Inter';
        font-weight: 600;
        font-Size: 20px;
        color:#565656;
    }
    p.title-doc{
        font-family: 'Inter';
        font-Weight: 600;
        font-Style: italic;
        font-Size: 30px;
        color: #F59120;
    }
    p.p-down, .mi-span{
        font-family: 'Inter';
        font-Weight: 500;
        font-Size: 16px;
        Line-height: 19.36px;
        color: #565656;
    }
    li.mi-list {
    margin-bottom: 15px;
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
    <title>Concursos Publicos</title>
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
                        <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/<a href="/gobiernoregional/acerca"> Gobierno Regional</a> / <span style="font-Weight: 700;"><a href="/gobiernoregional/comitecienciastecnologias">Comité Regional de Ciencia Tecnología e Innovación</a></span></p>
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
                        <div class="col-md-12">

                            <h1 class="mititulo">POSTULACIÓN COMITÉ REGIONAL DE CIENCIA TECNOLOGÍA E INNOVACIÓN REGIÓN DE LOS LAGOS</h1>

                            <p class="style-tags mt-5 mb-5">Comité Ciencia Tecno. e innova...</p>

                        @foreach ($comites as $comite)
                        <div class="accordion mt-4 mb-4" id="concursoAccordion{{ $comite->id }}">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $comite->id }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $comite->id }}" aria-expanded="true" aria-controls="collapse{{ $comite->id }}" style="background-color: #F591201A !important;">
                                    <p class="title-acord">{{ $comite->titulo }}</p>
                                    </button>
                                </h2>
                                <div id="collapse{{ $comite->id }}" class="accordion-collapse collapse show" aria-labelledby="heading{{ $comite->id }}" data-bs-parent="#concursoAccordion{{ $comite->id }}">
                                    <div class="accordion-body">
                                    <div class="bajada-acord">{{ $comite->descripcion }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="documentosHeading{{ $comite->id }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#documentosCollapse{{ $comite->id }}" aria-expanded="true" aria-controls="documentosCollapse{{ $comite->id }}" style="background-color: #F591201A !important;">
                                        Documentos Concurso Profesional
                                    </button>
                                </h2>
                                <div id="documentosCollapse{{ $comite->id }}" class="accordion-collapse collapse" aria-labelledby="documentosHeading{{ $comite->id }}" data-bs-parent="#concursoAccordion{{ $comite->id }}">
                                    <div class="accordion-body documentos-container">
                                        @foreach ($comite->documentos as $documento)
                                        <div class="mi-documento mt-3 mb-3">
                                            <a href="{{ asset('storage/' . $documento['ruta_documento']) }}" target="_blank">
                                                <img width="43px" height="44px" src="{{ asset('storage/images/pdf.png') }}" alt="Descripción de la imagen" style="display: inline-block; vertical-align: middle;">
                                                    <p class="p-doc mt-2 mb-2" style="font-family: 'Inter'; font-weight: 500; font-size: 16px; line-height: 19.36px; display: inline-block; vertical-align: middle; color:#565656; width: 950px;">{{ $documento->nombre_documento }}</p>
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        </div>
                        <p class="minot"><strong>Nota:</strong><br> 
                            Si no puede abrir directamente el documento, presione el botón derecho del mouse
                            sobre el icono de descarga y luego seleccionar "Guardar destino como...".
                            Esto le permite guardar el documento directamente a su equipo.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>              
</main>
</body>
</html>
@endsection



