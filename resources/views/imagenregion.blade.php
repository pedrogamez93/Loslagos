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
        list-style-type: none !important;
        list-style: none; 
        padding: 0; 
        display: flex; 
    }

    nav a {
        text-decoration: none; 
    }
    ul, ol {
    margin-bottom: 10px; /* Ajusta el valor según tus necesidades */
}
ul {
    list-style-type: disc !important; /* Estilo de viñeta para listas no ordenadas */
    padding-left: 20px !important; /* Espaciado para la indentación de la lista */
}

ul li {
    margin-bottom: 5px !important; /* Espaciado entre elementos de la lista */
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
        white-space: pre-wrap;
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
    .galerias-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
    }

    .galeria-item {
        width: 284px;
        height: 284px;
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .galeria-info {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.5); /* Fondo semitransparente */
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 10px;
    }

    .imagenes-count {
        align-self: flex-end;
        font-family: Inter !important;
        font-Weight: 700;
    }

    .titulo-galeria {
        align-self: flex-end;
        font-family: Inter !important;
        font-Weight: 700;
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
        <link rel="shortcut icon" type="image/png" href="{{ asset('storage/img/Favicon.png') }}">
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
                            <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/<a href=""></a><span style="font-Weight: 700;"><a href="/">Taller Imagen Región</a></span></p>
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
                                                <p class="title-cat">{{ $imagenregion->titulo }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container">
                                        <div class="row">
                                        <div class="col-md-4 borderM d-block d-lg-none">
                                            @include('layouts.menupoliticaturismo')
                                        </div>
                                            <div class="col-md-8">
                                                
                                               <p class="style-cont style-down mb-5">{!! $imagenregion->bajada ?? '' !!}</p>

                                                @if ($imagenregion->documentos->count() > 0)
                                                    <div class="migrid mt-5" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem; border: 1px solid #F59120; padding: 20px;">
                                                        @foreach ($imagenregion->documentos as $documento)
                                                            <a href="{{ route('imagenregion.download', $documento->id) }}" target="_blank" style="display: flex; align-items: center; text-align: left;">
                                                                <img width="43px" height="44px" src="{{ asset('storage/images/pdf.png') }}" alt="Descripción de la imagen" style="margin-right: 10px;">    
                                                                <span class="mi-span">{{ $documento->nombredoc }}</span>
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <p>No hay documentos disponibles para esta difusión.</p>
                                                @endif
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
            </div>
        </main>
    </body>
</html>
@endsection
