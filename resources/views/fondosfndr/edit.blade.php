<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar fondo</title>
<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/s8k6nnp5xwio3bml2pkpzbjl7oejngmdeyu8ujwbjzyvwmq4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script> src="https://cdn.tiny.cloud/1/no-origin/tinymce/5.10.9-138/tinymce.min.js" </script>


<style>
    h1, h2 {
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
                    <title>Editar Fondo FNDR</title>
</head>
<body>

    

                        <h1>Editar Fondo FNDR</h1>

                        <form action="{{ route('fondosfndr.update', $fondo->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <label class="mt-3 style-label required" for="titulo">Título:</label>
                            <input class="form-control mt-2 mb-4" type="text" name="titulo" value="{{ $fondo->titulo }}">

                            <label class="mt-3 style-label required" for="titulo">Bajada:</label>
                            <input class="form-control mt-2 mb-4" type="text" name="bajada" value="{{ $fondo->bajada }}">
                            
                            <label class="mt-3 style-label required pb-2" for="titulo">Descripción:</label>
                            <input class="form-control mt-2 mb-4" type="text" id="desc" name="descripcion" value="{{ $fondo->descripcion }}">

                            <label class="mt-3 style-label required pb-2" for="titulo">Nota:</label>
                            <input class="form-control mt-2 mb-4" type="text" id="nota" name="nota" value="{{ $fondo->nota }}">
                            
                            <button class="btn btn-success mt-3 mb-5" type="submit">Guardar cambios</button>
                        </form>

                        





                        <form action="{{ route('fondos.agregar-documento', ['fondo' => $fondo->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="documentos-container form-control">
        <div class="documentos-input">
            <!-- Campo para el título del documento -->
            <label class="style-label" for="titulo_documento">¿Deseas agregar nuevos documentos?</label>
            <input class="form-control mt-2 mb-2 titulo_documento" type="text" name="titulo_documento[]" placeholder="Nombre del documento">
            <!-- Campo para subir el archivo del documento -->
            <input class="form-control mt-2 mb-2 ruta_documento" type="file" name="ruta_documento[]" accept=".pdf, .doc, .docx, .zip, .rar">
        </div>
        <!-- Botón para añadir campos de documentos -->
        <button type="button" class="btn btn-primary agregar-documento" style="display: block;">Agregar más</button>

        <!-- Botón para enviar el formulario -->
        <button class="btn btn-success mt-3" type="submit">Añadir documentos</button>
    </div>
</form>















                </div>
            </div>
        </div>


        <div class="container principal mt-4 mb-4 pt-3 pb-3">
            <!-- Secciones -->
            <!-- Secciones -->
            <!--<h2>Secciones actuales</h2>-->
                @foreach($fondo->secciones as $seccion)
                <div>
                    <h3>{{ $seccion->titulo_seccion }}</h3>
                    <ul>
                        @foreach($seccion->documentos as $documento)
                            <li style="margin: 10px 0;">
                                {{ $documento->titulo_documento }} - <a href="{{ asset($documento->ruta_documento) }}" target="_blank">Ver Documento</a>
                                <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este documento?')">Eliminar</button>
                                </form>

                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach




        </div>


    </div>
</div>
</html>
<script>
      
        </script>
<script>
      tinymce.init({
            selector: '#desc', // Ajustado para apuntar específicamente al textarea con el ID 'editor'
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
            selector: '#nota', // Ajustado para apuntar específicamente al textarea con el ID 'editor'
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
    nuevaSeccion.attr('id', 'seccion_' + seccionCounter); // Asignar ID único a la nueva sección
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

// Funcionalidad para eliminar un campo de documento específico
$(document).on('click', '.remove-documento', function() {
    $(this).closest('.documentos-container').remove();
});
});


</script>



<script>
$(document).ready(function() {
    // Contador para IDs únicos
    var contador = 1;

    // Función para duplicar campos de documento
    $(".agregar-documento").click(function() {
        var clone = $(".documentos-input:first").clone(true); // Clonar el primer campo de documento
        clone.find(".titulo_documento").val(""); // Limpiar el valor del campo de título
        clone.find(".ruta_documento").val(""); // Limpiar el valor del campo de ruta
        clone.find(".titulo_documento").attr("id", "titulo_documento_" + contador); // Crear un ID único para el campo de título
        clone.find(".ruta_documento").attr("id", "ruta_documento_" + contador); // Crear un ID único para el campo de ruta
        contador++; // Incrementar el contador
        $(".documentos-container").append(clone); // Agregar el campo clonado al contenedor
    });
});
</script>
