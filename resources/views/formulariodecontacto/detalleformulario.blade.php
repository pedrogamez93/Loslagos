<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver formularios</title>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap CSS y JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <style>
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

</head>
<body>

    <div class="container-fluid body">
        <div class="row">
            <div class="col-md-2 style-col-menu">
                <div class="container menu">
                    <!-- Contenido del menú -->
                </div>
            </div>

            <div class="col-md-10">
                <div class="container principal mt-4 mb-4 pt-3 pb-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row justify-content-between">
                                <div class="col">
                                    <h1>Formulario de Contactos</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container first-form pt-2 pb-2">
                        <div class="row">
                            <h1>Detalles del Formulario</h1>

                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <ul>
                            <li><strong>ID:</strong> {{ $formulario->id }}</li>
                            <li><strong>Nombre:</strong> {{ $formulario->nombre }}</li>
                            <li><strong>Apellido:</strong> {{ $formulario->apellido }}</li>
                            <li><strong>Email:</strong> {{ $formulario->email }}</li>
                            <li><strong>Sexo:</strong> {{ $formulario->sexo }}</li>
                            <li><strong>Direccion:</strong> {{ $formulario->direccion }}</li>
                            <li><strong>Provincia:</strong> {{ $formulario->provincia }}</li>
                            <li><strong>Comuna:</strong> {{ $formulario->comuna }}</li>
                            <li><strong>Teléfono:</strong> {{ $formulario->telefono }}</li>
                            <li><strong>Tipo de mensaje:</strong> {{ $formulario->tipo_mensaje }}</li>
                            <li><strong>mensaje:</strong> {{ $formulario->mensaje }}</li>
                            <li><strong>Fecha de Nacimiento:</strong> {{ $formulario->date }}</li>
                            <li><strong>Usted escribe como:</strong> {{ $formulario->usted_escribe_como }}</li>
                            <li><strong>Actividad u Oficio:</strong> {{ $formulario->actividad_oficio }}</li>
                            <li><strong>Institución a enviar:</strong> {{ $formulario->intitucion_a_enviar }}</li>
                            <li><strong>Tema del mensaje:</strong> {{ $formulario->tema_mensaje }}</li>
                            <li><strong>Proposito u objetivo:</strong> {{ $formulario->proposito_objetivo }}</li>
                            <li><strong>Mensaje de la sugerencia o reclamo:</strong> {{ $formulario->mensaje_sugerencia_reclamo }}</li>
                            <!-- Agrega más elementos según tus campos de la tabla -->
                            </ul>

                            <!-- Puedes agregar más detalles o estilos según tus necesidades -->

                            <a href="{{ route('verformularios') }}" class="btn btn-primary">Volver al Listado</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
