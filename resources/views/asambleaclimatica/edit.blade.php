<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<style>
    h1 , h2 {
        color: #565656;
    }
    .principal {
        border: 1px solid #CCCCCC;
        border-radius: 10px;       
    }
    .first-form {
        border: 1px solid #CCCCCC;
        border-radius: 10px;
    }
    input.form-control {
        color: #565656;
        font-size: 16px;
        font-weight: 700;
        font-style: italic;
    }
    .style-label {
        color: #565656;
        font-size: 16px;
        font-weight: 700;
    }
    .style-col-menu {
        background-color: #0c1e35;
    }
    button.btn.btn-link {
        color: #FFFFFF;
        text-decoration: none;
        font-family: unset;
        font-weight: 700;
    }
    li.style-li {
        list-style: none;
        padding-bottom: 10px;
    }
    a.style-a-menu {
        color: #FFFFFF;
        text-decoration: none;
        font-weight: 500;   
    }
    textarea.form-control.mt-2.mb-4 {
    height: 200px;
    }
</style>

<div class="container-fluid body">
    <div class="row">
        <div class="col-md-2 style-col-menu">
            <div class="container menu">
                @include('layouts.menu')
            </div>
        </div>
        <div class="col-md-10">
            <div class="container principal mt-4 mb-4 pt-3 pb-3">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Asamblea Climática</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Asamblea Climática</h1> 
                        </div>
                    </div>
                    <!-- Mostrar la información de la base de datos -->
                        <form action="{{ route('asambleaclimatica.update', $asamblea->id) }}" method="POST" id="formulario-edicion" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- Campos del formulario -->
                            <label class="style-label required" for="titulo">Título:</label>
                            <input class="form-control mt-2" type="text" name="titulo_one" value="{{ $asamblea->titulo_one }}" disabled>
                           
                            <label class="style-label" for="bajada">Bajada o Descripción:</label>
                            <textarea class="form-control mt-2 mb-4" id="" name="descripcion_one" disabled>{{ $asamblea->descripcion_one }}</textarea>

                            <label class="style-label" for="titulotwo">Título:</label>
                            <input class="form-control mt-2" type="text" name="titulo_two" value="{{ $asamblea->titulo_two }}" disabled>

                            <label class="style-label mb-2" for="bajada">Bajada o Descripción:</label>
                            <textarea class="form-control mt-2 mb-4" id="" name="descripcion_two" disabled>{{ $asamblea->descripcion_two }}</textarea>
                            
                            <label class="style-label" for="titulotree">Título:</label>
                            <input class="form-control mt-2 mb-4" type="text" name="titulo_tree" value="{{ $asamblea->titulo_tree }}" disabled>
                            
                            <label class="style-label mb-2" for="bajada">Bajada o Descripción:</label>
                            <textarea class="form-control mt-2 mb-4" id="" name="descripcion_tree" disabled>{{ $asamblea->descripcion_tree }}</textarea>

                            <label class="style-label" for="titulofour">Título:</label>
                            <input class="form-control mt-2 mb-4" type="text" name="titulo_four" value="{{ $asamblea->titulo_four }}" disabled>
                            
                            <label class="style-label mb-2" for="bajada">Bajada o Descripción:</label>
                            <textarea class="form-control mt-2 mb-4" id="" name="descripcion_four" disabled>{{ $asamblea->descripcion_four }}</textarea>

                            <label class="style-label" for="titulofive">Título:</label>
                            <input class="form-control mt-2 mb-4" type="text" name="titulo_five" value="{{ $asamblea->titulo_five }}" disabled>
                        
                            <label class="style-label mb-2" for="bajada">Bajada o Descripción:</label>
                            <textarea class="form-control mt-2 mb-4" id="" name="descripcion_five" disabled>{{ $asamblea->descripcion_five }}</textarea>

                            <label class="style-label" for="titulosix">Título:</label>
                            <input class="form-control mt-2 mb-4" type="text" name="titulo_six" value="{{ $asamblea->titulo_six }}" disabled>
                            
                            <label class="style-label mb-2" for="bajada">Bajada o Descripción:</label>
                            <textarea class="form-control mt-2 mb-4" id="" name="descripcion_six" disabled>{{ $asamblea->descripcion_six }}</textarea>

                            <label class="style-label" for="tituloseccion">Título Sección documentos:</label>
                            <input class="form-control mt-2 mb-4" type="text" name="titulo_seccion_two" value="{{ $asamblea->titulo_seccion_two }}" disabled>
                            
                            <div class="form-group">
                                <div class="col-md-12 pt-3 pb-3">
                                    <div class="mb-3">
                                        <label for="documentos" class="form-label style-label">Documentos</label>
                                        <div class="documentos-container" id="documentos-container" style="display: none;">
                                            <!-- Contenedor inicial vacío -->
                                        </div>
                                        <button type="button" class="btn btn-secondary mt-4 mb-4" id="agregarDocumento">Agregar más documentos</button>
                                    </div>
                                </div>
                            </div>

                            <div class="container form-control">
                                <label class="style-label mt-4 mb-2" for="tituloseccionbtn">Título Sección Boton:</label>
                                <input class="form-control" type="text" name="titulo_seccion_btn" value="{{ $asamblea->titulo_seccion_btn }}" disabled>
                                <div class="row mt-3">
                                    <div class="col-md-6 mb-4">
                                        <label class="style-label" for="nombre_btn">Nombre Boton:</label>
                                        <input class="form-control" type="text" name="nombre_btn" value="{{ $asamblea->nombre_btn }}" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="style-label" for="url_btn">Url Boton:</label>
                                        <input class="form-control" type="text" name="url_btn" value="{{ $asamblea->url_btn }}" disabled>
                                    </div>
                                </div>
                            </div>

                            <button class="mt-5 mb-4 btn btn-success" type="button" id="boton-editar">Editar asamblea</button>
                            <button class="mt-4 btn btn btn-primary" type="submit" disabled>Guardar</button>
                        </form>

                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="style-label mb-2" for="bajada">Documentos</label>
                                        <div class="container form-control">                            
                                            <div class="row">
                                            @foreach($documentos as $documento)
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="form-control mt-2">{{ $documento->nombre_documento }}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                    <form action="{{ route('eliminar_documento', ['asambleaId' => $asamblea->id, 'documentoId' => $documento->id]) }}" method="POST" onsubmit="return confirm('¿Estás seguro de querer eliminar este documento?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger mt-2" onclick="return confirm('¿Estás seguro de querer eliminar este documento?');">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endforeach
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <form action="{{ route('ruta_eliminar_asamblea', $asamblea->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de querer eliminar este registro?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm mt-4 mb-4">Eliminar Asamblea</button>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    var contador = 0; // Inicializa el contador para identificadores únicos

    // Función para agregar más documentos
    $("#agregarDocumento").click(function() {
        // Mostrar el contenedor si está oculto
        var documentosContainer = $("#documentos-container");
        documentosContainer.show();

        var newInput = $('<div/>', { "class": "documentos-input", "id": "doc-input-" + contador });

        newInput.append($('<input/>', {
            "type": "file",
            "class": "form-control mt-2 mb-2",
            "name": "ruta_documento[]",
            "accept": ".pdf,.doc,.docx"
        }));

        newInput.append($('<input/>', {
            "type": "text",
            "class": "form-control mt-2 mb-2",
            "name": "nombre_documento[]",
            "placeholder": "Nombre del documento"
        }));

        // Opcional: Añadir un botón para eliminar este conjunto de inputs
        var deleteButton = $('<button/>', {
            "type": "button",
            "class": "btn btn-danger btn-sm mt-2 mb-2",
            "text": "Eliminar",
            "click": function() { $(this).parent().remove(); }
        });
        newInput.append(deleteButton);

        documentosContainer.append(newInput);
        contador++; // Incrementa el contador
    });

    // Evento click para el botón "Editar"
    $("#boton-editar").click(function() {
        $("input, textarea").prop("disabled", false); // Habilita todos los inputs y textareas
        $("button[type='submit']").prop("disabled", false); // Habilita el botón "Guardar"
    });

    // Evento submit para el formulario
    $("form#formulario-edicion").submit(function() {
        // Aquí podrías agregar lógica adicional si es necesario
    });
});
</script>