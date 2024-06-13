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
    .principal {
        border: 1px solid #CCCCCC;
        border-radius: 10px;       
    }s
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
    .item-btn-form{
        display: flex;
        align-items: center; /* Centra verticalmente */
        height: 100px; /* Ajusta la altura según tu diseño */
        place-content: center;
        border-radius: 100px;
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
                        <h1>Diseño Política Regional Sostenibilidad Hídrica</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Diseño Política Regional Sostenibilidad Hídrica</h1> 
                        </div>
                    </div>
                    <!-- Mostrar la información de la base de datos -->
                    <form action="{{ route('disenopoliticoregionales.update', $ultimoRegistro->id) }}" method="POST" enctype="multipart/form-data" id="formulario-edicion">
                        @csrf
                        @method('PUT')
                        <!-- Campos del formulario -->
                        <label class="style-label" for="titulo">Título:</label>
                        <input class="form-control mt-2" type="text" name="titulo" value="{{ $ultimoRegistro->titulo }}">

                        <label class="style-label" for="bajada">Bajada o Descripción:</label>
                        <textarea class="form-control mt-2 mb-4" id="editor" name="bajada" disabled>{{ $ultimoRegistro->bajada }}</textarea>

                        <label class="style-label mt-4" for="tituloseccion">Título Sección Formularios:</label>
                        <input class="form-control mt-2 mb-4" type="text" name="titulo_secciontwo" value="{{ $ultimoRegistro->titulo_seccion_form }}">

                        <label class="style-label mt-4" for="titulo_seccion_encue">Título Seccion encuestas:</label>
                                <input class="form-control mt-2 mb-4" type="text" name="titulo_seccion_encue" value="{{ $ultimoRegistro->titulo_seccion_encue }}">

                        <h2> Deseas agregar otro formulario</h2>
                        <!-- Contenedor original para formularios -->
                        <div class="container form-control agregando-btn-form mt-4 mb-2 pt-4 pb-4">
                            <label class="style-label" for="nombre_btn_form">Nombre del botón:</label>
                            <input class="form-control mt-2 campo" type="text" name="nombre_btn_form[]">

                            <label class="style-label" for="url_btn_form">URL del botón:</label>
                            <input class="form-control mt-2 campo" type="text" name="url_btn_form[]">
                        </div>

                        <!-- Botón para clonar formularios -->
                        <button type="button" class="btn btn-primary mt-2 mb-4" id="clonar">Agregar más formularios</button>

                        <h2> Deseas agregar otra encuesta</h2>
                        <!-- Contenedor original para encuestas -->
                        <div class="container form-control agregando-btn-encuestas mt-4 mb-2 pt-4 pb-4">
                            <label class="style-label" for="nombre_encuesta">Nombre de la encuesta</label>
                            <input class="form-control mt-2 campoencuesta" type="text" name="nombre_encuesta[]">

                            <label class="style-label" for="nombre_btn_encuesta">Nombre del botón encuesta:</label>
                            <input class="form-control mt-2 campoencuesta" type="text" name="nombre_btn_encuesta[]">

                            <label class="style-label" for="url_btn_encuesta">URL del botón encuesta:</label>
                            <input class="form-control mt-2 campoencuesta" type="text" name="url_btn_encuesta[]">
                        </div>

                        <!-- Botón para clonar encuestas -->
                        <button type="button" class="btn btn-primary mt-2 mb-2" id="clonarencuesta">Agregar más encuestas</button>

                        <div class="container last-btn">
                            <!--<button class="mt-5 mb-4 btn btn-success" type="button" id="boton-editar">Editar diseño</button>-->
                            <button class="mt-4 btn btn btn-success" type="submit">Guardar</button>
                        </div>
                    </form>

                    <!-- Mostrar encuestas -->
                    <h2>Encuestas</h2>
                    @if($encuestas->isNotEmpty())
                            @foreach($encuestas as $encuesta)
                                <div class="container form-control btn-form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="item-btn-encues">
                                                <p><strong>{{ $encuesta->nombre_encuesta }}</strong></p>
                                                <a class="mi-style-btn-form-a" href="{{ $encuesta->url_btn_encuesta }}" target="_blank">{{ $encuesta->nombre_btn_encuesta }}</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="align-self: center;">
                                            <form action="{{ route('eliminar.encuesta', ['id' => $encuesta->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No hay encuestas disponibles.</p>
                        @endif

                        <!-- Mostrar formularios -->
                        <h2>Formularios</h2>
                        @if($formularios->isNotEmpty())
                            @foreach($formularios as $formulario)
                                <div class="container form-control btn-form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="item-btn-form">
                                                <a class="mi-style-btn-form-a" href="{{ $formulario->url_btn_form }}" target="_blank">{{ $formulario->nombre_btn_form }}</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="align-self: center;">
                                            <form action="{{ route('eliminar.formulario', ['id' => $formulario->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No hay formularios disponibles.</p>
                        @endif
                </div>
            </div>
            <form action="{{ route('eliminar_diseno_completo', $ultimoRegistro->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de querer eliminar todo el diseño?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm mt-4">Eliminar Diseño</button>
            </form>
        </div>
    </div>
</div>
</html>
<script>
$(document).ready(function () {
    // Función para agregar botón de eliminar a un contenedor clonado
    function agregarBotonEliminar(clone) {
        // Crea el botón de eliminar
        var botonEliminar = $('<button/>', {
            text: 'Eliminar',
            class: 'btn btn-danger eliminar',
            type: 'button',
            click: function() {
                // Elimina el contenedor cuando se hace clic en el botón de eliminar
                $(this).closest('.container').remove();
            }
        });

        // Añade el botón de eliminar al clon
        clone.append($('<div/>', {
            class: 'text-right mt-2 mb-2'
        }).append(botonEliminar));
    }

    // Oculta los contenedores iniciales
    $(".agregando-btn-form").hide();
    $(".agregando-btn-encuestas").hide();

    // Manejador para el botón "Agregar más" de formularios
    $("#clonar").on("click", function () {
        if ($(".agregando-btn-form:hidden").length) {
            var primerClone = $(".agregando-btn-form").first();
            primerClone.show();
            agregarBotonEliminar(primerClone);
        } else {
            var clone = $(".agregando-btn-form:last").clone(true);
            var nuevoId = Date.now();
            clone.find("input[name='nombre_btn_form[]']").attr('id', 'nombre_btn_form_' + nuevoId);
            clone.find("input[name='url_btn_form[]']").attr('id', 'url_btn_form_' + nuevoId);
            clone.find("input").val('');
            clone.find('.eliminar').parent().remove(); // Remueve el botón de eliminar existente para evitar duplicados
            agregarBotonEliminar(clone);
            clone.insertAfter(".agregando-btn-form:last");
        }
    });

    // Manejador para el botón "Agregar más" de encuestas
    $("#clonarencuesta").on("click", function () {
        if ($(".agregando-btn-encuestas:hidden").length) {
            var primerClone = $(".agregando-btn-encuestas").first();
            primerClone.show();
            agregarBotonEliminar(primerClone);
        } else {
            var clone = $(".agregando-btn-encuestas:last").clone(true);
            var nuevoId = Date.now();
            clone.find("input[name='nombre_encuesta[]']").attr('id', 'nombre_encuesta_' + nuevoId);
            clone.find("input[name='nombre_btn_encuesta[]']").attr('id', 'nombre_btn_encuesta_' + nuevoId);
            clone.find("input[name='url_btn_encuesta[]']").attr('id', 'url_btn_encuesta_' + nuevoId);
            clone.find("input").val('');
            clone.find('.eliminar').parent().remove(); // Remueve el botón de eliminar existente para evitar duplicados
            agregarBotonEliminar(clone);
            clone.insertAfter(".agregando-btn-encuestas:last");
        }
    });

        // Inicialización de CKEditor
        //ClassicEditor.create(document.querySelector('#editor'), { allowedContent: true }).catch(error => { console.error(error); });
        //ClassicEditor.create(document.querySelector('#editortwo'), { allowedContent: true }).catch(error => { console.error(error); });
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
<script>
  tinymce.init({
    selector: '#editortwo', // Ajustado para apuntar específicamente al textarea con el ID 'editor'
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