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
    img.img-fluid.icon-style {
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
</style>
<html>
<head>
    <meta charset="utf-8">
    <title>Tu Título Aquí</title>
    <!-- Agrega aquí tus enlaces a hojas de estilo CSS, si es necesario -->
    <!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
                    <p class="style-bread">Home / Gobierno Regional / <span style="font-Weight: 700;">Tramites Digitales</span></p>
                </div>
            </div>
        </div>   
        <div class="container content-prin">
            <div class="row" style="padding: 10px 0px 20px 50px;">
                <div class="col-md-12">
                    <p class="one-title pb-4">Gobierno Regional</p>

                    <p style="Width:623px;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                </div>
            </div>
        </div>   
    </header>
    <!-- Contenido principal de tu página -->
    <main>
        <div class="container cat">
            <div class="row">
                <div class="col-md-12 pt-4 pb-4" style="padding: 0 0 0 5.3rem;">
                    <p class="title-cat">Selecciona una Categoría</p>
                </div>
            </div>
        </div>
        <div class="container set pb-4">
            <div class="lista-categorias">
                <div id="categoriasToggle">
                    <span id="backToggle" class="responsiveCategorias">Categorías</span>
                </div>
                <ul id="categorylist">
                    <li><a href="/gobiernoregional/acerca" title="Categoría:acerca">Acerca del Gobierno Regional </a></li>
                    <li><a href="/gobiernoregional/leygobiernoregional" title="Categoría:tags">Ley</a></li>
                    <li><a href="/gobiernoregional/organigrama" title="Categoría:tags">Organigrama</a></li>
                    <li><a routerLink="/result/Bosque nativo"title="Categoría:tags">Documentos de Gestión</a></li>
                    <li><a href="/gobiernoregional/dptogestionpersonas" title="Categoría:tags">Gestión y Desarrollo de Personas</a></li>
                    <li><a href="/gobiernoregional/tramitesdigitales" title="Categoría:tags">Trámites Digitales</a></li>
                    <li><a routerLink="/result/Nieve" title="Categoría:tags">Asamblea Climatica</a></li>
                    <li><a routerLink="/result/Carretera Austral" title="Categoría:tags">Política Sostenibilidad Hidrica</a></li>
                    <li><a routerLink="/result/La Serena" title="Categoría:tags">Política Personas Mayores</a></li>
                    <li><a routerLink="/result/Animales" title="Categoría:tags">Planificación Institucional</a></li>
                    <li><a routerLink="/result/Ballenas" title="Categoría:tags">Concurso Público</a></li>
                    <li><a routerLink="/result/Ballenas" title="Categoría:tags">Comité Ciencia Tecno e innova</a></li>
                </ul>
            </div>
        </div>
        <div class="container titulo">
            <div class="row">
                <div class="col-md-12" style="padding: 0 0 0 5rem;">
                    <h1 class="mititulo mt-4 mb-2">Trámites Digitales</h1>

                    <div class="ve-tramites">
                        <h1 class="style-h1 mt-2 mb-5">It is a long will be distracted by the readable content of a page...</h1>
                        <div class="row">
                            @forelse($tramites as $index => $tramite)
                            <div class="col-md-3 mb-4">
                                @if(isset($tramite->url_single))
                                    <a href="{{ $tramite->url_single }}" class="card-link">
                                @else
                                    <a href="{{ route('tramites.show', $tramite->id) }}" class="card-link">
                                @endif
                                    <div class="card">
                                        <img src="{{ asset('storage/' . $tramite->icono) }}" alt="" class="img-fluid icon-style">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $tramite->titulo }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                                @if(($index + 1) % 4 == 0)
                                    </div>
                                    <div class="row">
                                @endif
                            @empty
                                <p>No hay trámites disponibles.</p>
                            @endforelse
                        </div>
                    </div>
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
