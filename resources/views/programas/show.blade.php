<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
        padding: 10px 0px 20px 60px;       
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
    .title-descargas{
    font-family: 'Inter';
    font-Weight: 700;
    font-Size: 20px;
    Line-height: 24.2px;
    color: #F59120;
    }
    .borde{
    border-right: 1px solid #F59120 ;
    }
    .title-programa{
    font-family: 'Inter';
    font-Weight: 700;
    font-Size: 30px;
    Line-height: 36.2px;
    color: #565656;
    }
    .bajada-programa{
    font-family: 'Inter';
    font-Weight: 500;
    font-Size: 16px;
    Line-height: 19.36px;
    color: #565656;
    }
    a.descargables{
    font-family: 'Inter';
    font-Weight: 700;
    font-Size: 16px;
    Line-height: 19.36px;
    color: #565656; 
    text-decoration:none;
    display: block;
    }
    .title-doc-fot{
    font-family: 'Inter';
    font-Weight: 700;
    font-Size: 30px;
    Line-height: 36.31px;
    color: #565656;   
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
                    <p class="style-bread">Home / Gobierno Regional  <span style="font-Weight: 700;"></span></p>
                </div>
            </div>
        </div>   
        <div class="container content-prin">
            <div class="row" style="padding: 10px 0px 20px 50px;">
                <div class="col-md-12">
                    <p class="one-title pb-4">{{ $programa->titulo }}</p>

                    <p style="Width:623px;">{{ $programa->bajada }}</p>
                    
                </div>
            </div>
        </div>   
    </header>
            
    <div class="container principal mt-4 mb-4 pt-3 pb-3">
        <div class="row">
            <div class="col-md-7 borde">
                    <div id="contenidoPrincipal">
                        <h2 class="title-programa">{{ $programa->titulo }}</h2>
                        <p class="bajada-programa">{!! $programa->bajada_programa ?? '' !!}</p>
                        <img src="{{ asset('storage').'/' .$programa->imagen }}" alt="{{ $programa->titulo }}">
                        
                    </div>
                    
                    <div id="contenidoDocumentos" style="display: none;">
                        <h2 class="title-doc-fot">Documentos</h2>
                        <p>Contenido que se despliega al hacer clic en "Documentos".</p>
                    </div>
                    <div id="contenidoFotografias" style="display: none;">
                        <h2 class="title-doc-fot">Fotografías</h2>
                        <p>Contenido que se despliega al hacer clic en "Fotografías".</p>
                    </div>
                        <a href="/todoslosprogramas" class="btn btn-secondary mt-3 mb-4">Volver</a>

                       <strong>Titulo:</strong> <p>{{ $programa->titulo }}</p>
                       <strong>bajada encabezado:</strong><p>{{ $programa->bajada }}</p>
                       <strong>bajada programa:</strong><p>{{ $programa->bajada_programa }}</p>
                       <strong>titulo descripcion:</strong><p>{{ $programa->descripcion->titulo_descripcion }}</p>
                       <strong>bajada descripcion:</strong><p>{{ $programa->descripcion->bajada_descripcion }}</p>
                       <strong>nombre del boton:</strong><p>{{ $programa->botones->nombrebtn }}</p>
                       <strong>url del boton:</strong><p>{{ $programa->botones->urlbtn }}</p>


                      

            </div>



          


            



            
            <div class="col-md-3 ml-3">
                <h2 class="title-descargas mb-5">Documentos Regionales que puedes descargar:</h2>
                <a href="#" class="descargables pb-4" id="enlacePrincipal" onclick="mostrarContenido('principal')">{{ $programa->titulo }}</a>
                <a href="#" id="enlaceDocumentos" class="descargables pb-4" onclick="mostrarContenido('documentos')">Documentos</a>
                <a href="#" class="descargables pb-4" id="enlaceFotografias" onclick="mostrarContenido('fotografias')">Fotografías</a>
                
            </div>  
        </div>  
    </div>


<script>
    function mostrarContenido(tipo) {
        // Oculta todos los contenidos
        document.getElementById('contenidoPrincipal').style.display = 'none';
        document.getElementById('contenidoDocumentos').style.display = 'none';
        document.getElementById('contenidoFotografias').style.display = 'none';

        // Muestra el contenido correspondiente al tipo seleccionado
        if (tipo === 'documentos') {
            document.getElementById('contenidoDocumentos').style.display = 'block';
        } else if (tipo === 'fotografias') {
            document.getElementById('contenidoFotografias').style.display = 'block';
        } else if (tipo === 'principal') {
            document.getElementById('contenidoPrincipal').style.display = 'block';
        }
    }
</script>

