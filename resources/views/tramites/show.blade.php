<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- DATEPICKER-->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<!-- Incluye los archivos JS de CKEditor -->
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
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
    img.img-fluid.icon-style.mr-3 {
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
    /*aqui estilos del admin pila no te enredes arriba los del header front*/
    h1 , h2{
        color: #565656;
    }
    .principal{
        border: 1px solid #CCCCCC;
        border-radius: 10px;       
    }
    .first-form{
        border: 1px solid #CCCCCC;
        border-radius: 10px;
    }
    input.form-control{
    color: #565656;
    font-size: 16px;
    font-weight: 700;
    font-style: italic;
    }
    .style-label{
    color: #565656;
    font-size: 16px;
    font-weight: 700;
    }
    .style-col-menu{
        background-color: #0c1e35;
    }
    button.btn.btn-link {
    color: #FFFFFF;
    text-decoration: none;
    font-family: unset;
    font-weight: 700;
    }
    li.style-li{
        list-style: none;
        padding-bottom: 10px;
    }
    a.style-a-menu{
    color: #FFFFFF;
    text-decoration: none;
    font-weight: 500;   
    }
</style>
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
<div class="container-fluid body">
    <div class="row">
        <div class="col-md-10">
            <div class="container principal mt-4 mb-4 pt-3 pb-3">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Detalles del Trámite single</h1>
                    </div>
                     <!-- Formulario para la edicion del tramite -->
                        <!-- Campos para el nuevo trámite -->
                        <label class="style-label" for="tags">Tags o Comentario:</label>
                        <input class="form-control mt-2 mb-4" type="text" name="tags" value="{{ $tramites->tags }}">

                        <label class="style-label required" for="titulo">Título:</label>
                        <input class="form-control mt-2 mb-4" type="text" name="titulo" value="{{ $tramites->titulo }}">
                       
                        <label class="style-label mb-2" for="bajada">Bajada o Descripción:</label>
                        <textarea class="form-control mt-2 mt-5" id="editor" name="descripcion" value="">{!! $tramites->descripcion !!}</textarea>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <p class="style-label">Fecha Apertura:<input class="form-control" type="text" name="fecha_apertura" id="fecha_apertura_datepicker" value="{{ $tramites->fecha_apertura }}"></p>
                            </div>

                            <div class="col-md-6">
                                <p class="style-label">Fecha Cierre:<input class="form-control" type="text" name="fecha_cierre" id="fecha_cierre_datepicker" value="{{ $tramites->fecha_cierre }}"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="icono" class="style-label">Icono:</label>
                            <input type="file" class="form-control mt-2 mb-4" name="icono">
                            
                            @if($tramites->icono)
                                <p>Icono actual:</p>
                                <img src="{{ asset('storage/' . $tramites->icono) }}" alt="Icono actual" style="max-width: 100px; max-height: 100px;">
                            @else
                                <p>No hay icono actual.</p>
                            @endif
                        </div>

                        <div class="container add-boton mt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="style-label" for="url">Nombre del botón externo:</label>
                                    <input class="form-control mt-2 mb-4" type="text" name="nombre_btn" placeholder="Nombre del botón externo" value="{{ $tramites['nombre_btn'] ?? '' }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="style-label" for="url">URL del botón externo:</label>
                                    <input class="form-control mt-2 mb-4" type="text" name="url" placeholder="URL del botón externo" value="{{ $tramites['url'] ?? '' }}">
                                </div>
                            </div>
                              <!--   <button type="button" id="agregarMas" class="btn btn-primary">Agregar Más</button> -->
                        </div>

                            <h3 class="mi-h3 mt-4">Documentos Adjuntos</h3>
                                @foreach ($tramites->documentos as $documento)
                                    <p>Nombre del Documento: {{ $documento->nombre_documento }}</p>
                                    <p>Ruta del Documento: {{ $documento->ruta_documento }}</p>
                                    <!-- Agrega más detalles del documento según tu estructura de datos -->
                                @endforeach
                                
                            <div class="container open-other-site mt-4">
                                <div class="row"> 
                                    <label class="style-label" for="url">URL por si quieres abrir otro sitio:</label>
                                    <input class="form-control mt-2 mb-4" type="text" name="url_single" placeholder="URL por si quieres abrir otro sitio" value="{{ $tramites['url_single'] ?? '' }}">
                                </div>
                            </div>
                    <div class="container mt-3 mb-4">
                        <a href="/gobiernoregional/tramitesdigitales" class="btn btn-secondary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
</script>