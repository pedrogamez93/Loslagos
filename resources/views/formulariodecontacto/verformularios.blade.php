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
                    @include('layouts.menu')
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
                        <div class="col-10">
                            <h1>Listado Formularios</h1>
                        </div>
                           
                        <div class="col-2">
                            <!-- Agrega este botón al contenido de tu página -->
<form action="{{ route('descargar.csv') }}" method="GET">
    @csrf
    <button type="submit" class="btn btn-primary">Descargar CSV</button>
</form>
</div>
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Email</th>
                                        <th>Provincia</th>
                                        <th>Tipo de mensaje</th>
                                        
                                        <!-- Agrega más columnas según tus campos de la tabla -->
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                            <!-- Agrega más elementos según tus campos de la tabla -->
                                    @foreach($formularios as $formulario)
                                        <tr>
                                            <td>{{ $formulario->id }}</td>
                                            <td>{{ $formulario->nombre }}</td>
                                            <td>{{ $formulario->apellido }}</td>
                                            <td>{{ $formulario->email }}</td>
                                            <td>{{ $formulario->provincia }}</td>
                                            <td>{{ $formulario->tipo_mensaje }}</td>
                                            <!-- Agrega más celdas según tus campos de la tabla -->
                                            <td>
                                                <a href="{{ route('detalle.formulario', $formulario->id) }}" class="mb-2 btn btn-primary">Ver más</a>

                                                <!-- Formulario para borrar el registro -->
                                                <form action="{{ route('borrar.formulario', $formulario->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-primary">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>



<body>

    <div class="container-fluid body">
        <div class="row">
            <div class="col-md-2 style-col-menu">
                <div class="container menu">
                    <!-- Contenido del menú -->
                </div>
            </div>

            
        </div>
    </div>

</body>
