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
</head>
<body>
    <header>
        <!-- Contenido del encabezado barra de arriba logo, menu, etc...-->
        <div class="container top-bar">
            <div class="row">
                <div class="col-md-12">
                <nav>
                    <ul>
                        <li><a href="/">Inicio</a></li>
                        <li><a href="/acerca">Acerca de</a></li>
                        <li><a href="/contacto">Contacto</a></li>
                    </ul>
                </nav>
                </div>
            </div>
        </div>

        <!-- Contenido del encabezado principal breadcumbs, titulo, bajadas-->
        <div class="container content-breadc">
            <div class="row">
                <div class="col-md-12">
                    <p>Home / Gobierno Regional / introducción</p>
                </div>
            </div>
        </div>   
        <div class="container content-prin">
            <div class="row">
                <div class="col-md-12">
                    <h1>Región de los Lagos</h1>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                </div>
            </div>
        </div>   
    </header>
    <!-- Contenido principal de tu página -->
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="container cat">
                        <div class="row">
                            <div class="col-md-12">
                                <p>Selecciona una Categoría</p>
                            </div>
                        </div>
                    </div>
                    <div class="container int">
                        <div class="row">
                            <div class="col-md-12">
                                <p>{{ $introduccion->tag_comentario }}</p>
                                <h1>{{ $introduccion->titulo }}</h1>
                                <p>{{ $introduccion->bajada }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                <img src="{{ asset('storage/' . $introduccion->img) }}" alt="Imagen actual" style="max-width: 200px; max-height: 200px;">    
                </div>
            </div>
        </div>      
    </main>

    <footer>
        <!-- Pie de página con información adicional, enlaces, etc. -->
        <p>Pie de página &copy; {{ date('Y') }}</p>
    </footer>

    <!-- Agrega aquí tus scripts de JavaScript, si es necesario -->
</body>
</html>
