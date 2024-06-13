<!DOCTYPE html>
<html lang="es">
<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- Incluye los archivos JS de CKEditor -->
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/s8k6nnp5xwio3bml2pkpzbjl7oejngmdeyu8ujwbjzyvwmq4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script> src="https://cdn.tiny.cloud/1/no-origin/tinymce/5.10.9-138/tinymce.min.js" </script>
<style>
    h1 , h2 {
        color: #565656;
    }
    h2.titulo-galeria{
        font-family: 'Inter';
        font-weight:700;
        font-size: 20px;
        color:#FFFFFF;
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
    .item-doc-form{
        display: flex;
        align-items: center; /* Centra verticalmente */
        height: 100px; /* Ajusta la altura según tu diseño */
        place-content: center;
    }
    .item-btn-encues{
        align-items: center; /* Centra verticalmente */
        height: 100px; /* Ajusta la altura según tu diseño */
        place-content: center;
        border-radius: 100px;
    }
    a.mi-style-btn-form-a{
        width: 259px;
        height: 40px;
        padding: 10px;
        border-radius: 100px;
        background-color: #F59120;
        font-family: 'Inter';
        font-weight: 700;
        font-size: 16px;
        line-height: 19.36px;
        text-align: Center;
        color: #FFFFFF;
        text-decoration: none;
    }
    .galeria-item {
        width: 284px;
        height: 284px;
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .galeria-info {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.5); /* Fondo semitransparente */
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 10px;
    }

    .imagenes-count {
        align-self: flex-end;
    }

    .titulo-galeria {
        align-self: flex-end;
    }
    .galerias-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; /* Espacio entre elementos */
}

.galeria-container {
    flex: 1;
    min-width: 300px; /* Ajusta según tus necesidades */
}

.galeria-item {
    /* Tus estilos existentes para galeria-item */
}

.eliminar-form {
    text-align: center; /* Centra el botón en el contenedor */
    margin-top: 10px; /* Espacio entre la galería y el botón */
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
                        <h1>Seminario Internacional de Turismo</h1>
                    </div>
                </div>

                <div class="container first-form pt-2 pb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Seminario Internacional de Turismo</h1> 
                        </div>
                    </div>

                    <form method="POST" action="{{ route('seminarios.update', ['seminario' => $seminario->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Título y Bajada -->
                        <label class="style-label" for="titulo">Título:</label>
                        <input class="form-control mt-2" type="text" name="titulo" value="{{ $seminario->titulo }}">
                        
                        <label class="style-label" for="bajada">Bajada o Descripción:</label>
                        <textarea class="form-control mt-2 mb-4" id="editor" name="bajada">{{ $seminario->bajada }}</textarea>

                        <!-- Pregunta si desea agregar documentos -->
                        <div class="container pregunta-doc mt-4">
                            <label class="style-label mb-2">Deseas agregar más Documentos?</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox12" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox12">Si</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox21" value="option2" checked>
                                        <label class="form-check-label" for="inlineCheckbox21">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Campos para documentos (ocultos inicialmente) -->
                        <div class="documentos-container mt-3" style="display: none;">
                            <div class="documentos-input">
                                <label class="style-label" for="documentos">Documentos:</label>
                                <input class="form-control mt-2 mb-4" type="file" name="url_doc[]" accept=".pdf, .doc, .docx, .zip, .rar" multiple>
                                <input class="form-control mt-2 mb-2" type="text" name="nombre_doc[]" placeholder="Nombres de los Documentos" multiple>
                            </div>
                            <button type="button" class="btn btn-primary agregar-documento">Agregar Más documentos</button>
                        </div>

                        <!-- Pregunta inicial si desea agregar una galería -->
                        <div class="container pregunta-galeria mt-4">
                            <label class="style-label mb-2">Deseas agregar Galería?</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="checkboxGaleria">
                                        <label class="form-check-label" for="checkboxGaleria">Si</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="checkboxGaleria1" value="option2" checked>
                                        <label class="form-check-label" for="checkboxGaleria1">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contenedor de galerías (puede haber varios) -->
                        <div class="galerias-container">
                            <!-- Contenedor de galería (oculto inicialmente) -->
                            <div class="galeria-container mt-4" style="display: none;" data-galeria-index="0">
                                <div class="form-group mt-4 mb-4">
                                    <label for="nombre" class="form-label style-label">Nombre de la Galería</label>
                                    <input type="hidden" name="galeria_identificador[]" value="">
                                    <input type="text" id="nombre" name="nombre_galeria[]" class="form-control" placeholder="Nombre de la Galería">
                                </div>

                                <!-- Contenedor para los campos de imágenes (oculto inicialmente) -->
                                <div class="imagenes-container" style="display: none;">
                                    <div class="form-group imagen-field mb-4">
                                        <label for="nombreImagenes0" class="form-label style-label">Nombre de la Imagen</label>
                                        <input class="form-control mb-2" type="text" name="nombre_imagen[0][]" multiple id="nombreImagenes0" placeholder="Nombre de la imagen">
                                        <label for="imagenes0" class="form-label style-label">Cargar Imágenes</label>
                                        <input class="form-control mb-4" type="file" name="archivo[0][]" multiple id="imagenes0" accept="image/*">
                                        <button type="button" class="btn btn-danger remove-image">Eliminar</button>
                                    </div>
                                </div>
                                <!-- Botón para añadir campos de imágenes (oculto inicialmente) -->
                                <button type="button" class="btn btn-secondary mt-2 add-image">Añadir más imágenes</button>
                            </div>

                            <!-- Botón para agregar más galerías -->
                            <button type="button" class="btn btn-secondary mt-2 agregar-galeria">Agregar más galerías</button>
                        </div>

                        <!-- Botón para guardar cambios -->
                        <button class="mt-5 mb-4 btn btn-success" type="submit">Guardar Cambios</button>
                    </form>

                    <!-- Mostrar documentos -->
                    <h1>Documentos: </h1> 
                    @forelse($seminario->documentos as $documento)
                        
                    <div class="container first-form doc-form mt-2 mb-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="item-doc-form">
                                    <div class="mi-documento mt-3 mb-3">
                                        <a href="{{ $documento['url_doc'] }}" target="_blank" title="Ver documento: {{ $documento['nombre_doc'] }}">
                                            <img width="43px" height="44px" src="{{ asset('storage/images/pdf.png') }}" alt="Descripción de la imagen" style="display: inline-block; vertical-align: middle;">
                                            <p class="p-doc mt-2 mb-2" style="font-family: 'Inter'; font-weight: 500; font-size: 16px; line-height: 19.36px; display: inline-block; vertical-align: middle; color:#565656;">{{ $documento['nombre_doc'] }}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" style="align-self: center;">
                                <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este documento?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                        <p>No hay documentos disponibles.</p>
                    @endforelse

                    <div class="container secciongalerias">
                            <h1>Galerias:</h1>
                            <div class="galerias-grid">
                                @forelse($seminario->galerias as $galeria)
                                    @php
                                        $imagenPrimera = $galeria->imagenes->first();
                                    @endphp
                                    <div class="galeria-container">
                                        <a href="{{ route('galerias.edit', $galeria->id) }}" class="galeria-link">
                                            <div class="galeria-item" style="background-image: url('{{ $imagenPrimera ? route('seminario.imagen.mostrar', ['filename' => basename($imagenPrimera->archivo)]) : asset('storage/images/default.jpg') }}');">
                                                <div class="galeria-info">
                                                    <span class="imagenes-count">{{ $galeria->imagenes->count() }} imágenes</span>
                                                    <h2 class="titulo-galeria">{{ $galeria->nombre_galeria }}</h2>
                                                </div>
                                            </div>
                                        </a>
                                        <form method="POST" action="{{ route('galerias.eliminar', $galeria->id) }}" class="eliminar-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-eliminar" onclick="return confirm('¿Estás seguro que deseas eliminar esta galería?')">Eliminar Galería</button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--<button class="mt-4 btn btn btn-primary" type="submit" disabled>Guardar</button>-->
                </div>
            </div>
        </div>
    </div>
</div>
</html>
<script>
$(document).ready(function() {
    // Contador global de galerías
    var galeriaCounter = 0;

    // Manejador de eventos para el botón "Agregar más galerías"
    document.querySelector('.agregar-galeria').addEventListener('click', function() {
        galeriaCounter++;

        // Clona la plantilla de galería
        var galeriaTemplate = document.querySelector('.galeria-container');
        var nuevaGaleria = galeriaTemplate.cloneNode(true);

        // Asigna un identificador único a la galería
        nuevaGaleria.setAttribute('data-galeria-index', galeriaCounter);

        // Modifica los nombres de los campos de archivo
        nuevaGaleria.querySelectorAll('input[type="file"]').forEach(function(archivoInput) {
            archivoInput.setAttribute('name', 'archivo[galeria' + galeriaCounter + '][]');
        });

        // Agrega la nueva galería al formulario
        document.querySelector('#formulario').appendChild(nuevaGaleria);

        // Muestra la nueva galería
        nuevaGaleria.style.display = 'block';
    });

    // Ocultar inicialmente el botón "Agregar más galerías"
    $(".agregar-galeria").hide();

    // Manejar la selección de agregar documentos
    $("#inlineCheckbox12").change(function() {
        if (this.checked) {
            $("#inlineCheckbox21").prop('checked', false);
            $(".documentos-container").show();
        } else {
            $(".documentos-container").hide();
        }
    });
    $("#inlineCheckbox21").change(function() {
        if (this.checked) {
            $("#inlineCheckbox12").prop('checked', false);
            $(".documentos-container").hide();
        }
    });

    // Función para clonar campos de documentos
    $(".agregar-documento").click(function() {
        var documentosContainer = $(".documentos-container");
        var nuevoDocumentoInput = documentosContainer.find(".documentos-input:first").clone();

        nuevoDocumentoInput.find("input[type='file']").val('');
        nuevoDocumentoInput.find("input[type='text']").val('');

        var nuevoIdDoc = Date.now();
        nuevoDocumentoInput.find("input[type='file']").attr('id', 'url_doc_' + nuevoIdDoc);
        nuevoDocumentoInput.find("input[type='file']").attr('name', 'url_doc[]');
        nuevoDocumentoInput.find("input[type='text']").attr('id', 'nombre_doc_' + nuevoIdDoc);
        nuevoDocumentoInput.find("input[type='text']").attr('name', 'nombre_doc[]');

        var botonEliminarDoc = $('<button/>', {
            text: 'Eliminar',
            class: 'btn btn-danger eliminar-documento',
            type: 'button',
            click: function() {
                $(this).closest('.documentos-input').remove();
            }
        });

        nuevoDocumentoInput.append(botonEliminarDoc);
        documentosContainer.append(nuevoDocumentoInput);
    });

    // Evento para eliminar documentos
    $(document).on('click', '.eliminar-documento', function() {
        $(this).closest('.documentos-input').remove();
    });

    // Manejar la selección inicial de agregar galería
    $("#checkboxGaleria").change(function() {
        if (this.checked) {
            $("#checkboxGaleria1").prop('checked', false);
            $(".galeria-container").show();
            $(".add-image").show();
            $(".agregar-galeria").show();
        } else {
            $(".galeria-container").hide();
            $(".add-image").hide();
            $(".agregar-galeria").hide();
        }
    });
    $("#checkboxGaleria1").change(function() {
        if (this.checked) {
            $("#checkboxGaleria").prop('checked', false);
            $(".galeria-container").hide();
            $(".add-image").hide();
            $(".agregar-galeria").hide();
        }
    });

    var galeriaIndex = 0; // Iniciar contador para índices de galería

    // Evento de clic para agregar más galerías
    $('.agregar-galeria').click(function() {
        galeriaIndex++;
        var nuevaGaleria = $('.galeria-container:first').clone();
        nuevaGaleria.attr('data-galeria-index', galeriaIndex);
        nuevaGaleria.find('.imagenes-container').empty().hide();
        nuevaGaleria.find("input[type='text'], input[type='file']").val('');
        nuevaGaleria.find("input[name='nombre_galeria[]']").attr('name', 'nombre_galeria[' + galeriaIndex + ']');
        nuevaGaleria.find("input[name='archivo[0][]']").attr('name', 'archivo[' + galeriaIndex + '][]');
        nuevaGaleria.find("input[name='nombre_imagen[0][]']").attr('name', 'nombre_imagen[' + galeriaIndex + '][]');
        $('.galerias-container').append(nuevaGaleria);
    });

    // Delegación del evento de clic para agregar imágenes
    $(document).on('click', '.add-image', function() {
    var galeriaContainer = $(this).closest('.galeria-container');
    var imagenesContainer = galeriaContainer.find('.imagenes-container');
    var galeriaIndex = galeriaContainer.data('galeria-index');

    // Verifica si hay al menos un campo para clonar
    if(imagenesContainer.find('.imagen-field').length === 0) {
        // No hay campos de imagen, por lo tanto, crea uno desde cero
        var nuevoCampoImagen = $('<div class="form-group imagen-field mb-4">' +
                                    '<label class="form-label style-label">Nombre de la Imagen</label>' +
                                    '<input class="form-control mb-2" type="text" name="nombre_imagen[' + galeriaIndex + '][]" placeholder="Nombre de la imagen">' +
                                    '<label class="form-label style-label">Cargar Imágenes</label>' +
                                    '<input class="form-control mb-4" type="file" name="archivo[' + galeriaIndex + '][]" accept="image/*">' +
                                    '<button type="button" class="btn btn-danger remove-image">Eliminar</button>' +
                                 '</div>');
        // Agrega eventos al botón de eliminar en el nuevo campo
        nuevoCampoImagen.find('.remove-image').on('click', function() {
            $(this).closest('.imagen-field').remove();
        });

        imagenesContainer.append(nuevoCampoImagen);
    } else {
        // Clona el último campo de imagen
        var ultimoCampoImagen = imagenesContainer.find('.imagen-field:last').clone(true);
        ultimoCampoImagen.find("input[type='text'], input[type='file']").val('');
        imagenesContainer.append(ultimoCampoImagen);
    }

    // Asegúrate de mostrar el contenedor de imágenes si estaba oculto
    imagenesContainer.show();
});

    // Función para agregar un nuevo conjunto de campos de imagen
    function agregarImagen(galeriaIndex, imagenesContainer, imagenIndex) {
        var nuevaImagenInput = $('.imagen-field:first').clone();
        nuevaImagenInput.find("input[type='text']").val('');
        nuevaImagenInput.find("input[type='file']").val('');
        nuevaImagenInput.find("input[type='file']").attr('name', 'archivo[' + galeriaIndex + '][]');
        nuevaImagenInput.find("input[type='text']").attr('name', 'nombre_imagen[' + galeriaIndex + '][' + imagenIndex + ']');
        imagenesContainer.append(nuevaImagenInput);
    }

    // Delegación del evento de clic para eliminar imágenes
    $(document).on('click', '.remove-image', function() {
        $(this).closest('.imagen-field').remove();
    });
});
</script>

<!--<script>
    document.addEventListener('DOMContentLoaded', function() {
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    });
</script>-->
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
</script>
