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
    footer{
        height:535px;
        background-color: #389144;
    }
</style>
<html>
<head>
    <meta charset="utf-8">
    <title>Concursos Publicos</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Tu archivo de estilos personalizados -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
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
                    <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/<a href="/gobiernoregional/acerca"> Gobierno Regional</a> / <span style="font-Weight: 700;"><a href="/gobiernoregional/planificacioninstitucional">Concursos Publicos</a></span></p>
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
        <div class="container content mt-5 mb-5" style="padding-left: 5rem !important;">
            <div class="row">
                <div class="col-md-12">

                    <h1 class="mititulo">LLAMADO A CONCURSO PÚBLICO DE INGRESO</h1>

                    <p class="style-tags mt-5 mb-5">Documentos de Concurso Profesional...</p>

                @foreach ($concursos as $concurso)
                <div class="accordion mt-4 mb-4" id="concursoAccordion{{ $concurso->id }}">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $concurso->id }}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $concurso->id }}" aria-expanded="true" aria-controls="collapse{{ $concurso->id }}" style="background-color: #F591201A !important;">
                               <p class="title-acord">{{ $concurso->titulo }}</p>
                            </button>
                        </h2>
                        <div id="collapse{{ $concurso->id }}" class="accordion-collapse collapse show" aria-labelledby="heading{{ $concurso->id }}" data-bs-parent="#concursoAccordion{{ $concurso->id }}">
                            <div class="accordion-body">
                            <div class="bajada-acord">{{ $concurso->descripcion }}
                                <p class="minot mt-3 mb-3"><strong>Nota:<br></strong><br> 
                                    Si no puede abrir directamente el documento, presione el botón derecho del mouse
                                    sobre el icono de descarga y luego seleccionar "Guardar destino como...".
                                    Esto le permite guardar el documento directamente a su equipo.</p>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="documentosHeading{{ $concurso->id }}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#documentosCollapse{{ $concurso->id }}" aria-expanded="true" aria-controls="documentosCollapse{{ $concurso->id }}" style="background-color: #F591201A !important;">
                             Documentos Concurso Profesional
                            </button>
                        </h2>
                        <div id="documentosCollapse{{ $concurso->id }}" class="accordion-collapse collapse" aria-labelledby="documentosHeading{{ $concurso->id }}" data-bs-parent="#concursoAccordion{{ $concurso->id }}">
                            <div class="accordion-body documentos-container">
                                @foreach ($concurso->documentos as $documento)
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var accordionButtons = document.querySelectorAll('.accordion-button');

        accordionButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                // Togglea la clase 'collapsed' para permitir el cierre del mismo elemento
                button.classList.toggle('collapsed');
            });
        });
    });
</script>
</body>
</html>
