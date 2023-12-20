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

    h1.mi-title{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 30px;
        line-height: 36.31px;
        color: #565656;
    }
    .mi-bajada{
        font-family: 'Inter';
        font-weight: 500;
        font-size: 16px;
        line-height: 19.36px;
        color: #565656;
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
    .mi-bajada p {
    margin-bottom: 10px; /* Ajusta el valor según tus necesidades */
}
    ul, ol {
    margin-bottom: 10px; /* Ajusta el valor según tus necesidades */
}
    footer{
        height:535px;
        background-color: #389144;
    }
</style>
<html>
<head>
    <meta charset="utf-8">
    <title>Tu Título Aquí</title>
<!-- jQuery (asegúrate de incluirlo antes de Bootstrap JS) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<!-- Bootstrap JS y Popper (incluye Bootstrap Bundle) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!-- Tu archivo de estilos personalizados -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

</head>
<body>
    <header>
        <!-- Contenido del encabezado barra de arriba logo, menu, etc...-->
        <div class="container top-bar">
            <div class="row" style="padding: 10px 0px 20px 50px;">
                <div class="col-md-2">
                    <img src="{{ asset('storage/images/logo.png') }}" alt="logo" style="max-width: 218px; max-height: 61px;">
                </div>
                <div class="col-md-8" style="align-self: center;">
                    <nav style="margin-left: 5rem;">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="/acerca">Gobierno Regional</a></li>
                            <li><a href="/contacto">Concejo Regional</a></li>
                            <li><a href="/contacto">Region de Los Lagos</a></li>
                            <li><a href="/contacto">Directorio de Funciones</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-2" style="align-self: center;">
                    <a href="" class="style-btn"><p class="style-btn">Infórmate aquí</p></a>
                </div>
            </div>
        </div>

        <!-- Contenido del encabezado principal breadcumbs, titulo, bajadas-->
        <div class="container content-breadc pt-4 pb-3">
            <div class="row" style="padding: 10px 0px 20px 55px;">
                <div class="col-md-12">
                    <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/<a href="/gobiernoregional/acerca"> Gobierno Regional</a> / <a href="/gobiernoregional/asambleaclimatica">Asamblea Climatica Ciudadana</a>/ <a style="font-Weight: 700;" href ="">Audiencias de Partes Interesadas</a></p>
                </div>
            </div>
        </div>   
        <div class="container content-prin">
            <div class="row" style="padding: 10px 0px 20px 50px;">
                <div class="col-md-12">
                    <p class="one-title pb-4">Gobierno Regional</p>

                    <p style="Width:623px;">El Gobierno Regional (GORE) es un organismo autónomo, que tiene por objetivo la administración de la región, impulsando su desarrollo económico, cultural y social</p>
                </div>
            </div>
        </div>   
    </header>
    <!-- Contenido principal de tu página -->
    <main>
        <div class="container-fluid cat">
            <div class="row">
                <div class="col-md-12 pt-4 pb-4" style="padding: 0 0 0 5.3rem;">
                    <p class="title-cat">Selecciona una Categoría</p>
                </div>
            </div>
        </div>
        <div class="container set pb-4">
            @include('layouts.listacategorias')
        </div>
        <div class="container content mt-5 mb-5">
            <div class="row">
                <div class="col-md-8" style="padding: 0 0 0 5rem;">

                    <h1 class="mi-title mb-5">{{ $audiencia->titulo ?? '' }}</h1>
                    
                    <div class="mi-bajada">{!! $audiencia->bajada ?? '' !!}</div>

                    {{-- Verifica si $audiencia no es nulo antes de intentar acceder a sus propiedades --}}
                        @if($audiencia && $audiencia->documentos->count() > 0)
                            {{-- Itera sobre los documentos solo si $audiencia y $audiencia->documentos no son nulos --}}
                            <h2 class="mi-style-h2 mt-5 mb-5">{{ $audiencia->titulo_secciontwo ?? '' }}</h2>
                            @foreach ($audiencia->documentos as $documento)
                                {{-- Aquí puedes acceder a las propiedades del documento --}}
                                <div class="mi-documento mt-3 mb-3">
                                    <a href="{{ asset($documento->url_doc) }}" target="_blank">
                                        <img width="43px" height="44px" src="{{ asset('storage/images/pdf.png') }}" alt="Descripción de la imagen" style="display: inline-block; vertical-align: middle;">
                                        <p class="p-doc mt-2 mb-2" style="font-family: 'Inter'; font-weight: 500; font-size: 16px; line-height: 19.36px; display: inline-block; vertical-align: middle; color:#565656;">{{ $documento->nombre_doc }}</p>
                                    </a>
                                </div>
                                {{-- ... --}}
                            @endforeach
                        @else
                            {{-- Maneja el caso en que $audiencia o $audiencia->documentos sea nulo --}}
                            <p>No hay documentos disponibles</p>
                        @endif

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