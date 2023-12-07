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
                    <form action="{{ route('asambleaclimatica.store') }}" method="POST" enctype="multipart/form-data" id="formulario-edicion">
                        @csrf
                            <!-- Campos del formulario -->
                            <label class="style-label required" for="titulo">Título:</label>
                            <input class="form-control mt-2" type="text" name="titulo_one" value="{{ $asamblea->titulo_one ?? '' }}" disabled>
                           
                            <label class="style-label" for="bajada">Bajada o Descripción:</label>
                            <textarea class="form-control mt-2 mb-4" id="" name="descripcion_one" disabled>{{ $asamblea->descripcion_one ?? '' }}</textarea>

                            <label class="style-label" for="titulotwo">Título:</label>
                            <input class="form-control mt-2" type="text" name="titulo_two" value="{{ $asamblea->titulo_two ?? '' }}" disabled>

                            <label class="style-label mb-2" for="bajada">Bajada o Descripción:</label>
                            <textarea class="form-control mt-2 mb-4" id="" name="descripcion_two" disabled>{{ $asamblea->descripcion_two ?? '' }}</textarea>
                            
                            <label class="style-label" for="titulotree">Título:</label>
                            <input class="form-control mt-2 mb-4" type="text" name="titulo_tree" value="{{ $asamblea->titulo_tree ?? '' }}" disabled>
                            
                            <label class="style-label mb-2" for="bajada">Bajada o Descripción:</label>
                            <textarea class="form-control mt-2 mb-4" id="" name="descripcion_tree" disabled>{{ $asamblea->descripcion_tree ?? '' }}</textarea>

                            <label class="style-label" for="titulofour">Título:</label>
                            <input class="form-control mt-2 mb-4" type="text" name="titulo_four" value="{{ $asamblea->titulo_four ?? '' }}" disabled>
                            
                            <label class="style-label mb-2" for="bajada">Bajada o Descripción:</label>
                            <textarea class="form-control mt-2 mb-4" id="" name="descripcion_four" disabled>{{ $asamblea->descripcion_four ?? '' }}</textarea>

                            <label class="style-label" for="titulofive">Título:</label>
                            <input class="form-control mt-2 mb-4" type="text" name="titulo_five" value="{{ $asamblea->titulo_five ?? '' }}" disabled>
                        
                            <label class="style-label mb-2" for="bajada">Bajada o Descripción:</label>
                            <textarea class="form-control mt-2 mb-4" id="" name="descripcion_five" disabled>{{ $asamblea->descripcion_five ?? '' }}</textarea>

                            <label class="style-label" for="titulosix">Título:</label>
                            <input class="form-control mt-2 mb-4" type="text" name="titulo_six" value="{{ $asamblea->titulo_six ?? '' }}" disabled>
                            
                            <label class="style-label mb-2" for="bajada">Bajada o Descripción:</label>
                            <textarea class="form-control mt-2 mb-4" id="" name="descripcion_six" disabled>{{ $asamblea->descripcion_six ?? '' }}</textarea>

                            <label class="style-label" for="tituloseccion">Título Sección documentos:</label>
                            <input class="form-control mt-2 mb-4" type="text" name="titulo_seccion_two" value="{{ $asamblea->titulo_seccion_two ?? '' }}" disabled>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mt-4">
                                        <label class="style-label mb-2" for="bajada">Documentos</label>
                                        <div class="container form-control">                            
                                            <div class="row">
                                            @if($documentos->count() > 0)
                                               @foreach($documentos as $documento)
                                                <div class="col-md-6">
                                                    <p class="form-control mt-2">{{ $documento->nombre_documento ?? '' }}</p>
                                                </div>
                                                <div class="col-md-6">
                                                  <!--  <button type="button" class="btn btn-danger mt-2">Eliminar</button>-->
                                                </div>
                                                @endforeach  
                                                @else
                                                <!-- Mensaje o contenido alternativo cuando no hay documentos -->
                                            @endif 
                                            </div>
                                            <div class="documentos-container mt-3">
                                                <div id="documentos-original" class="documentos-input" style="display: none;">
                                                    <label class="style-label" for="documentos">Documentos:</label>
                                                    <input class="form-control mt-2 mb-4" type="file" name="ruta_documento[]" accept=".pdf, .doc, .docx, .zip, .rar" multiple disabled>
                                                    <input class="form-control mt-2 mb-2" type="text" name="nombre_documento[]" placeholder="Nombres de los Documentos" multiple disabled>
                                                </div>
                                            </div>
                                            <!-- Botón para agregar más documentos -->
                                            <!--<button type="button" class="btn btn-primary agregar-documento">Agregar Más</button>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container form-control mt-4">
                            <label class="style-label mt-4 mb-2" for="tituloseccionbtn">Título Sección Botones:</label>
                            <input class="form-control" type="text" name="titulo_seccion_btn" value="{{ $asamblea->titulo_seccion_btn ?? '' }}" disabled>
                            <div class="row mt-3">
                                <div class="col-md-6 mb-4">
                                    <label class="style-label" for="nombre_btn">Nombre Boton:</label>
                                    <input class="form-control" type="text" name="nombre_btn" value="{{ $asamblea->nombre_btn  ?? ''}}" disabled>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="style-label" for="url_btn">Url Boton:</label>
                                    <input class="form-control" type="text" name="url_btn" value="{{ $asamblea->url_btn ?? '' }}" disabled>
                                </div>
                            </div>
                        </div>
                        <button class="mt-5 mb-4 btn btn-success" type="button" id="boton-editar">Editar asamblea</button>
                        <!--<button class="mt-4 btn btn btn-primary" type="submit" disabled>Guardar</button>-->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Contador para asignar identificadores únicos
        var contador = 1;

        // Agregar más documentos
        $(".agregar-documento").click(function() {
            var documentosContainer = $(".documentos-container");
            var original = documentosContainer.find("#documentos-original");
            var nuevoDocumentoInput = original.clone(); // Clona el conjunto de campos original

            // Asigna un nuevo identificador único a los campos clonados
            var nuevoId = 'documentos-clonados-' + contador;
            nuevoDocumentoInput.attr('id', nuevoId);
            nuevoDocumentoInput.find("input[type='file']").attr('name', 'ruta_documento[' + contador + ']');
            nuevoDocumentoInput.find("input[type='text']").attr('name', 'nombre_documento[' + contador + ']');

            // Incrementa el contador
            contador++;

            // Muestra los campos clonados con una animación
            nuevoDocumentoInput.hide().appendTo(documentosContainer).slideDown(300);

            // Puedes ajustar el valor de 300 según tu preferencia para la duración de la animación
        });
        
            // Redirigir a la página de edición al hacer clic en "Editar asamblea"
    $("#boton-editar").click(function() {
        window.location.href = "{{ route('asambleaclimatica.edit', $asamblea->id) }}";
    });
        // Habilitar/deshabilitar campos al hacer clic en "Editar Asamblea"
        $("#boton-editar").click(function() {
            $("form#formulario-edicion :input:not(:button)").prop("disabled", function(i, val) {
                return !val;
            });

            // Habilitar/deshabilitar el botón "Guardar"
            $("form#formulario-edicion button[type='submit']").prop("disabled", function(i, val) {
                return !val;
            });
        });
    });
</script>