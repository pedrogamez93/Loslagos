<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap CSS y JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/s8k6nnp5xwio3bml2pkpzbjl7oejngmdeyu8ujwbjzyvwmq4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script> src="https://cdn.tiny.cloud/1/no-origin/tinymce/5.10.9-138/tinymce.min.js" </script>
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
</head>
<body>
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
                            <h1>CREACIÓN FONDOS CONCURSABLES</h1>
                        </div>
                    </div>
                    <div class="container first-form pt-2 pb-2">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>CREACIÓN FONDOS CONCURSABLES</h1> 
                            </div>
                        </div>
                        <!-- Mostrar la información de la base de datos -->
                        <form action="{{ route('fondosfndr.store') }}" method="POST" enctype="multipart/form-data" id="formulario">
                            @csrf
                            <!-- Campos del formulario -->
                            <label class="style-label required pt-3 pb-2" for="titulo">Título:</label>
                            <input class="form-control mt-2" type="text" name="titulo">

                            <label class="style-label required pt-3 pb-2" for="bajada">bajada:</label>
                            <input class="form-control mt-2" type="text" name="bajada">
                           
                            <label class="style-label pt-3 pb-2" for="descripcion">Descripción:</label>
                            <textarea class="form-control mt-2 mb-4" id="editor" name="descripcion"></textarea>

                            <!-- Pregunta inicial si desea agregar una galería -->
                        <div class="container pregunta-galeria mt-4">
                            <label class="style-label mb-2">Agregar nueva seccion de documentos</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="checkboxSeccion">
                                        <label class="form-check-label" for="checkboxSeccion">Si</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="checkboxSeccion1" value="option2" checked>
                                        <label class="form-check-label" for="checkboxSeccion1">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contenedor de galerías (puede haber varios) -->
                        <div class="secciones-container">
                            <!-- Contenedor de galería (oculto inicialmente) -->
                            <div class="seccion-container mt-4" style="display: none;" data-seccion-index="0">
                                <div class="form-group mt-4 mb-4">
                                    <label for="nombre" class="form-label style-label">Titulo de la sección</label>
                                    <input type="hidden" name="seccion_identificador[]" value="">
                                    <input type="text" id="nombre" name="titulo_seccion[]" class="form-control" placeholder="Titulo de la sección">
                                </div>

                                <!-- Contenedor para los campos de imágenes (oculto inicialmente) -->
                                <div class="documentos-container" style="display: none;">
                                    <div class="form-group documento-field mb-4">
                                        <label for="nombreDocumentos0" class="form-label style-label">Nombre del documento</label>
                                        <input class="form-control mb-2" type="text" name="titulo_documento[0][]" multiple id="tituloDocumentos0" placeholder="Nombre del documento">
                                        <label for="docuemntos0" class="form-label style-label">Cargar mas documentos</label>
                                        <input class="form-control mb-4" type="file" name="ruta_documento[0][]" multiple id="ruta0" accept=".pdf, .doc, .docx, .zip, .rar">
                                        <button type="button" class="btn btn-danger remove-documento">Eliminar</button>
                                    </div>
                                </div>
                                <!-- Botón para añadir campos de imágenes (oculto inicialmente) -->
                                <button type="button" class="btn btn-secondary mt-2 add-documento">Añadir más documentos</button>
                            </div>

                            <!-- Botón para agregar más galerías -->
                            <button type="button" class="btn btn-secondary mt-2 agregar-seccion">Agregar otra sección</button>
                        </div>

                            <label class="style-label pt-3 pb-3" for="descripcion">Nota:</label>
                            <textarea class="form-control mt-2 mb-4" id="editor2" name="nota"></textarea>


                            <button class=" mt-5 btn btn-success" type="submit">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        tinymce.init({
            selector: '#editor', // Ajustado para apuntar específicamente al textarea con el ID 'editor'
            plugins: 'advlist link image lists',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        });

        tinymce.init({
            selector: '#editor2', // Ajustado para apuntar específicamente al textarea con el ID 'editor'
            plugins: 'advlist link image lists',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        });

$(document).ready(function() {
    var seccionCounter = 0;
    var documentoCounter = 0; // Contador global para documentos, asegura IDs únicos

    // Ocultar inicialmente el botón "Agregar otra sección" y todos los contenedores de sección
    $(".agregar-seccion, .seccion-container").hide();

    // Manejar el cambio en la selección de si se desea agregar una nueva sección de documentos
    $("#checkboxSeccion").change(function() {
        var isChecked = $(this).is(":checked");
        $("#checkboxSeccion1").prop('checked', !isChecked);
        if (isChecked) {
            // Mostrar solo el primer contenedor de sección si se decide agregar secciones de documentos
            $(".seccion-container:first").show();
            $(".agregar-seccion").show();
        } else {
            // Ocultar todos los contenedores de sección y el botón de agregar sección si se decide no agregar secciones de documentos
            $(".seccion-container").hide();
            $(".agregar-seccion").hide();
        }
    });

    $("#checkboxSeccion1").change(function() {
        var isChecked = $(this).is(":checked");
        $("#checkboxSeccion").prop('checked', !isChecked);
        // Ocultar los contenedores de sección y el botón de agregar más secciones si se desmarca la opción
        $(".seccion-container").hide();
        $(".agregar-seccion").hide();
    });

    // Funcionalidad para agregar nuevas secciones de documentos
    $(document).on('click', '.agregar-seccion', function() {
        seccionCounter++;
        var nuevaSeccion = $('.seccion-container:first').clone(true);
        nuevaSeccion.show();
        nuevaSeccion.attr('data-seccion-index', seccionCounter);
        nuevaSeccion.find('.documentos-container').first().hide(); // Asegúrate de que la plantilla está oculta
        nuevaSeccion.find('.documento-field').remove(); // Remueve campos de documento clonados previamente para iniciar limpio
        $('.secciones-container').append(nuevaSeccion);
    });

    // Funcionalidad para añadir nuevos campos de documentos dentro de una sección
    $(document).on('click', '.add-documento', function() {
        documentoCounter++; // Incrementar el contador global de documentos
        var seccionContainer = $(this).closest('.seccion-container');
        // Se clona un contenedor de documentos oculto o el primer documentos-container si ya existe
        var documentosContainer = $('.documentos-container').first().clone(true);
        
        documentosContainer.find('.documento-field').each(function() {
            // Asegurarse de que los nuevos campos están visibles
            $(this).show();
            // Reiniciar los valores de los campos
            $(this).find("input[type='text'], input[type='file']").val('');
            
            // Actualizar los IDs y los atributos for de labels para cada input
            var newTextId = "tituloDocumentos" + documentoCounter;
            var newFileId = "rutaDocumento" + documentoCounter;
            
            $(this).find("input[type='text']").attr('id', newTextId).prev('label').attr('for', newTextId);
            $(this).find("input[type='file']").attr('id', newFileId).prev('label').attr('for', newFileId);
        });
        
        seccionContainer.append(documentosContainer);
        documentosContainer.show(); // Asegúrate de que el nuevo contenedor de documentos esté visible
    });

    // Funcionalidad para eliminar un campo de documento específico
    $(document).on('click', '.remove-documento', function() {
        $(this).closest('.documentos-container').remove();
    });
});
    </script>
</body>
</html>