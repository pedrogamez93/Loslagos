<!DOCTYPE html>
<style>
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
        form label{
    font-family: Inter !important;
    font-Weight: 700;
    font-Size: 18px;
    Line-height: 36.31px;
    color: #565656;
    padding-top: 16px;
}
select option{
    font-family: Inter !important;
    font-Weight: 400;
    font-Size: 17px;
    Line-height: 36.31px;
    color: #565656;
}
form input, select, textarea{
    border: 1px solid #d7d2d2 !important;
    border-radius: 5px !important;
}
div#campoSugerencias {
    background-color: #e9e9e9;
    padding: 20px;
    margin: 15px 0;
}

label {
    display: block;
    margin-bottom: 5px;
}

input,
select,
textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
}

/* Estilo para ocultar campos específicos */
.campoOculto {
    display: none;
}  
.btn-enviar{
        padding: 10px 20px !important;
        border-Radius: 100px !important;
        background-color: #F59120 !important;
        color: #FFFFFF !important;
        font-Weight: 700 !important;
    }
    .borderR{
            border-left: 2px solid #F59120;
        }
    .infoR {
    font-family: 'Inter';
    font-size: 20px;
    font-weight: 700;
    line-height: 24px;
    letter-spacing: 0em;
    text-align: left;
    color: #F59120;
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
    .borderM {
            border-top: 2px solid #F59120;
            border-bottom: 2px solid #F59120;
            padding: 24px 0px;
            margin-bottom: 20px;
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
                            <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/<a href=""></a><span style="font-Weight: 700;"><a href="/agenda">Agenda</a></span></p>
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
                        <div class="container mt-5 mb-5">
                            <div class="row">
                                <div class="col-md-12 p-0">
                                    <div class="container int p-0">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="title-cat">Agenda</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container mt-5">
                                        <div class="row">
                                        <div class="col-md-4 borderM d-block d-lg-none">
                                            @include('layouts.menupoliticaturismo')
                                        </div>
                                            <div class="col-md-8">
                                                @php
                                                $eventosAgrupadosPorMes = $eventos->groupBy(function ($evento) {
                                                    return $evento->fecha_inicio->format('F Y');
                                                });
                                                @endphp

                                                @foreach ($eventosAgrupadosPorMes as $mes => $eventosDelMes)
                                                <p class="title-cat">Mes de {{ \Carbon\Carbon::parse($mes)->locale('es')->isoFormat('MMMM') }}</p>
                                                    @foreach ($eventosDelMes as $evento)
                                                        {{-- Enlace que envuelve todo el contenido del evento --}}
                                                        <a href="{{ route('eventos.show', $evento->id) }}" class="evento-link">
                                                            <div class="row mt-4 mb-3" style="border: 1px solid #F59120;margin: 20px;">
                                                                <div class="col-md-6" style="align-self: center; text-align-last: center;">
                                                                    <strong>Inicio:</strong> {{ \Carbon\Carbon::parse($evento->fecha_inicio)->locale('es')->isoFormat('dddd D-MM-YYYY HH:mm') }}<br>
                                                                    <strong>Término:</strong> {{ \Carbon\Carbon::parse($evento->fecha_termino)->locale('es')->isoFormat('dddd D-MM-YYYY HH:mm') }}

                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><strong>Título:</strong></p>
                                                                    <p>{{ $evento->titulo_evento }}</p>

                                                                    <p><strong>Descripción:</strong></p>
                                                                    <p>{{ $evento->descripcion }}</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    @endforeach
                                                @endforeach
                                            </div>

                                            <div class="col-md-4 borderR d-none d-lg-block">
                                                    @include('layouts.menupoliticaturismo')
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
    </body>
</html>
@endsection
