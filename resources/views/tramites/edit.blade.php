<!DOCTYPE html>
<html lang="es">
<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- DATEPICKER-->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<!-- Incluye los archivos JS de CKEditor -->
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/s8k6nnp5xwio3bml2pkpzbjl7oejngmdeyu8ujwbjzyvwmq4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script> src="https://cdn.tiny.cloud/1/no-origin/tinymce/5.10.9-138/tinymce.min.js" </script>
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
                        <h1>Detalles del Trámite</h1>
                    </div>
                     <!-- Formulario para la edicion del tramite -->
                    <form action="{{ route('tramites.update', ['tramite' => $tramite->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Campos para el nuevo trámite -->
                        <label class="style-label" for="tags">Tags o Comentario:</label>
                        <input class="form-control mt-2 mb-4" type="text" name="tags" value="{{ $tramite->tags }}">

                        <label class="style-label required" for="titulo">Título:</label>
                        <input class="form-control mt-2 mb-4" type="text" name="titulo" value="{{ $tramite->titulo }}">
                       
                        <label class="style-label mb-2" for="bajada">Bajada o Descripción:</label>
                        <textarea class="form-control mt-2 mt-5" id="editor" name="descripcion" value="">{!! $tramite->descripcion !!}</textarea>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <p class="style-label">Fecha Apertura:<input class="form-control" type="text" name="fecha_apertura" id="fecha_apertura_datepicker" value="{{ $tramite->fecha_apertura }}"></p>
                            </div>

                            <div class="col-md-6">
                                <p class="style-label">Fecha Cierre:<input class="form-control" type="text" name="fecha_cierre" id="fecha_cierre_datepicker" value="{{ $tramite->fecha_cierre }}"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="icono" class="style-label">Icono:</label>
                            <input type="file" class="form-control mt-2 mb-4" name="icono">
                            
                            @if($tramite->icono)
                                <p>Icono actual:</p>
                                <img src="{{ asset($tramite->icono) }}" alt="Icono actual" style="max-width: 100px; max-height: 100px;">
                            @else
                                <p>No hay icono actual.</p>
                            @endif
                        </div>

                        <div class="container add-boton mt-4">
                            <div class="row">
                            <div id="botones-original" class="botones-input" style="display: none;">
                                <div class="col-md-6">
                                    <input class="form-control mt-2 mb-4" type="text" name="nombre_btn[]" placeholder="Nombre del boton externo">
                                    <input class="form-control mt-2 mb-4" type="text" name="url[]" placeholder="URL del boton externo">
                                </div>
                            </div>
                        </div>
                        <!-- Botón para agregar más BOTONES EXTERNOS -->
                        <button type="button" id="agregarMas" class="btn btn-primary">Agregar Más Botones externos</button>

                        <div class="documentos-container mt-3">
                            <div id="documentos-original" class="documentos-input" style="display: none;">
                                <input class="form-control mt-2 mb-4" type="file" name="ruta_documento[]" accept=".pdf, .doc, .docx, .zip, .rar" multiple>
                                <input class="form-control mt-2 mb-2" type="text" name="nombre_documento[]" placeholder="Nombres de los Documentos" multiple>
                            </div>
                        </div>
                        <!-- Botón para agregar más documentos -->
                        <button type="button" class="btn btn-primary agregar-documento">Agregar Más Documentos</button>


                        @if(!empty($tramite->url_single))
                            <div class="container open-other-site mt-4">
                                <div class="row"> 
                                    <label class="style-label" for="url">URL por si quieres abrir otro sitio:</label>
                                    <input class="form-control mt-2 mb-4" type="text" name="url_single" placeholder="URL por si quieres abrir otro sitio" value="{{ $tramite->url_single }}">
                                </div>
                            </div>
                        @endif
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <button class=" mt-5 btn btn-success" type="submit">Actualizar Trámite</button>
                                </div>
                            </div>
                        </div>
                   </form>

                        <div class="container principal  add-botonexistente mt-4" style="padding: 20px;">
                            <h2>Botones presentes en el trámite actual</h2>
                            @foreach ($tramite->btns as $btn)
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="style-label" for="url">Nombre del botón externo:</label>
                                        <input class="form-control mt-2 mb-4" type="text" name="nombre_btn[]" placeholder="Nombre del botón externo" value="{{ $btn->nombre_btn }}" disabled>

                                        <label class="style-label" for="url">URL del botón externo:</label>
                                        <input class="form-control mt-2 mb-4" type="text" name="url[]" placeholder="URL del botón externo" value="{{ $btn->url }}" disabled>
                                    </div>
                                    <div class="col-md-6" style="align-self: center;">
                                        <!-- Botón para eliminar la fila (opcional) -->
                                        <div class="col-md-12 text-right mt-2 mb-2">
                                            <form action="{{ route('tramites.destroyBtn', $btn->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas borrar este botón externo?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar Botón</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group principal mt-4 mb-4" style="padding: 20px;">
                            <h2>Documentos presentes en el trámite actual</h2>
                            <div class="container form-control">                            
                                <div class="row">
                                    @foreach ($tramite->documentos as $documento)
                                        <div class="col-md-6">
                                            <p class="form-control mt-2">{{ $documento->nombre_documento }}</p>
                                        </div>
                                        <div class="col-md-6" style="align-self: center;">
                                            <form action="{{ route('tramites.destroyDoc', $documento->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de borrar este documento?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar Documento</button>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    <div class="container mt-3 mb-4">
                        <a href="{{ route('tramites.index') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </div>
            </div>
            <form action="{{ route('tramites.destroy', $tramite->id) }}" method="POST" onsubmit="return confirmarEliminacion()">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar Trámite</button>
            </form>
        </div>
    </div>
</div>
</html>
<script>
    $(document).ready(function() {
        var contadorBotones = 1;

        $('#agregarMas').click(function() {
            var botonesContainer = $('.add-boton');
            var original = botonesContainer.find("#botones-original").clone(); // Clona el conjunto de campos original

            // Hace visible el conjunto de campos clonado
            original.css('display', '');

            // Limpia los valores en los campos clonados
            original.find("input[type='text']").val('');

            // Asigna un nuevo identificador único a los campos clonados
            original.find("input[type='text']").each(function(index) {
                if (index == 0) { // Nombre del botón
                    $(this).attr('name', 'nombre_btn[' + contadorBotones + ']');
                } else { // URL del botón
                    $(this).attr('name', 'url[' + contadorBotones + ']');
                }
            });

            // Agrega un botón de eliminar a la fila clonada
            var botonEliminar = $('<button/>', {
                text: 'Eliminar',
                class: 'btn btn-danger eliminar',
                type: 'button',
                click: function() {
                    $(this).closest('.botones-input').remove();
                }
            });

            // Agrega el botón de eliminar a la fila clonada
            original.append($('<div/>', {
                class: 'col-md-12 text-right mt-2 mb-2'
            }).append(botonEliminar));

            // Inserta los campos clonados justo antes del botón "Agregar Más Botones externos"
            $('#agregarMas').before(original);

            // Incrementa el contador
            contadorBotones++;
        });
    });
</script>
<script>
    $(document).ready(function() {
        var contadorDocumentos = 1;

        $(".agregar-documento").click(function() {
            var documentosContainer = $(".documentos-container");
            var original = documentosContainer.find("#documentos-original").clone(); // Clona el conjunto de campos original

            // Limpia los valores en los campos clonados
            original.find("input[type='file']").val('');
            original.find("input[type='text']").val('');

            // Asigna un nuevo identificador único a los campos clonados
            original.find("input[type='file']").attr('name', 'ruta_documento[' + contadorDocumentos + ']');
            original.find("input[type='text']").attr('name', 'nombre_documento[' + contadorDocumentos + ']');

            // Agrega un botón de eliminar a la fila clonada
            var botonEliminar = $('<button/>', {
                text:'Eliminar',
                class: 'btn btn-danger eliminar-documento',
                type: 'button',
                click: function() {
                $(this).closest('.documentos-input').remove();
                }
                });
            // Agrega el botón de eliminar a la fila clonada
                    original.append($('<div/>', {
                        class: 'col-md-12 text-right mt-2 mb-2'
                    }).append(botonEliminar));

                    // Incrementa el contador
                    contadorDocumentos++;

                    // Muestra los campos clonados con una animación
                    original.hide().appendTo(documentosContainer).slideDown(300);
                });
            });
</script>

<script>
  $( function() {
    $("#fecha_apertura_datepicker").datepicker({
      dateFormat: "dd-mm-yy" // Por ejemplo, muestra la fecha en formato dd/mm/yy
    });
    $("#fecha_cierre_datepicker").datepicker({
      dateFormat: "dd-mm-yy" // Por ejemplo, muestra la fecha en formato dd/mm/yy
    });

  } );
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
<script>
    function confirmarEliminacion() {
        return confirm('¿Estás seguro de eliminar el trámite por completo? Esta acción no se puede deshacer.');
    }
</script>