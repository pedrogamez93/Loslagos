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
    .style-label, p.style-label{
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
    .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline.ck-blurred {
    height: 350px;
    }
    p.ck-placeholder {
    height: 350px;
}

input:required {
    border: 1px solid red; /* Borde rojo para indicar campo obligatorio */
}

/* Estilo para el asterisco */
.required::before {
    content: '*';
    color: red;
    margin-right: 4px;
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
                        <h1>Formulario de Creacion de Tramites Digitales</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Tramites Digitales</h1> 
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- Formulario para la creación de un nuevo trámite -->
                    <form action="{{ route('tramites.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Campos para el nuevo trámite -->
                        <label class="style-label" for="tags">Tags o Comentario:</label>
                        <input class="form-control mt-2 mb-4" type="text" name="tags" placeholder="Tags o Comentario">

                        <label class="style-label required" for="titulo">Título:</label>
                        <input class="form-control mt-2 mb-4" type="text" name="titulo" placeholder="Título" required>
                       
                        <label class="style-label mb-2" for="bajada">Bajada o Descripción:</label>
                        <textarea class="form-control mt-2 mt-5" id="editor" name="descripcion" placeholder="Bajada o Descripción"></textarea>

                        <div class="row mt-4">
                                <div class="col-md-6">
                                <p class="style-label">Fecha Apertura:<input class="form-control" type="text" name="fecha_apertura" id="fecha_apertura_datepicker"></p>
                                </div>
                                <div class="col-md-6">
                                <p class="style-label">Fecha Cierre:<input class="form-control" type="text" name="fecha_cierre" id="fecha_cierre_datepicker"></p>
                                </div>
                        </div>

                        <label class="style-label" for="icono">Icono:</label>
                        <input class="form-control mt-2 mb-4" type="file" name="icono" accept=".png, .jpg, .jpeg">

                        <div class="container pregunta">
                            <label class="style-label mb-2">Deseas agregar botones que redireccionen a sistemas externos?</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Si</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" checked>
                                        <label class="form-check-label" for="inlineCheckbox2">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container add-boton mt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="style-label" for="url">Nombre del boton externo:</label>
                                    <input class="form-control mt-2 mb-4" type="text" name="nombre_btn[]" placeholder="Nombre del boton externo">
                                </div>
                                <div class="col-md-6">
                                    <label class="style-label" for="url">URL del boton externo:</label>
                                    <input class="form-control mt-2 mb-4" type="text" name="url[]" placeholder="URL del boton externo">
                                </div>
                            </div>
                            <button type="button" id="agregarMas" class="btn btn-primary">Agregar Más</button>
                        </div>

                        <div class="container pregunta-doc mt-4">
                          <label class="style-label mb-2">Deseas agregar Documentos?</label>
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

                      <!-- Campos para documentos-->
                      <div class="documentos-container mt-3">
                          <div class="documentos-input">
                              <label class="style-label" for="documentos">Documentos:</label>
                              <input class="form-control mt-2 mb-4" type="file" name="ruta_documento[]" accept=".pdf, .doc, .docx, .zip, .rar" multiple>
                              <input class="form-control mt-2 mb-2" type="text" name="nombre_documento[]" placeholder="Nombres de los Documentos" multiple>
                          </div>
                          <!-- Botón para agregar más documentos -->
                          <button type="button" class="btn btn-primary agregar-documento">Agregar Más</button>
                      </div>

                            <div class="container pregunta-other-site mt-4">
                                <label class="style-label mb-2">Deseas redireccionar este tramite a otro sitio externo de manera directa?</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox14" value="option1">
                                            <label class="form-check-label" for="inlineCheckbox14">Si</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox24" value="option2" checked>
                                            <label class="form-check-label" for="inlineCheckbox24">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container open-other-site mt-4">
                                <div class="row"> 
                                    <label class="style-label" for="url">URL por si quieres abrir otro sitio:</label>
                                    <input class="form-control mt-2 mb-4" type="text" name="url_single" placeholder="URL por si quieres abrir otro sitio">
                                </div>
                            </div>

                        <button class=" mt-5 btn btn-success" type="submit">Crear Trámite</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#agregarMas').click(function() {
            var botonesContainer = $('.add-boton');
            var nuevoBoton = botonesContainer.find('.row:first').clone(); // Clona el primer conjunto de campos

            // Limpia los valores en los campos clonados
            nuevoBoton.find("input[type='text']").val('');

            // Genera un nuevo nombre único para cada campo clonado
            var nuevoId = Date.now(); // Utiliza la marca de tiempo actual como identificador único
            nuevoBoton.find("input[type='text']").each(function() {
                var name = $(this).attr('name');
                $(this).attr('id', name + '_' + nuevoId);
            });

            // Agrega un botón de eliminar a la fila clonada
            var botonEliminar = $('<button/>', {
                text: 'Eliminar',
                class: 'btn btn-danger eliminar',
                type: 'button',
                click: function() {
                    // Elimina la fila cuando se hace clic en el botón de eliminar
                    $(this).closest('.row').remove();
                }
            });

            // Agrega el botón de eliminar a la fila clonada
            nuevoBoton.append($('<div/>', {
                class: 'col-md-12 text-right mt-2 mb-2'
            }).append(botonEliminar));

            // Agrega los campos clonados al contenedor
                botonesContainer.append(nuevoBoton);
            });

            // Evento para eliminar filas existentes (manejador delegado)
            $(document).on('click', '.eliminar', function() {
                $(this).closest('.row').remove();
            });
        });
</script>

<script>
    $(document).ready(function() {
        // Agregar más documentos
        $(".agregar-documento").click(function() {
            var documentosContainer = $(".documentos-container");
            var nuevoDocumentoInput = documentosContainer.find(".documentos-input:first").clone(); // Clona el primer conjunto de campos

            // Limpia los valores en los campos clonados
            nuevoDocumentoInput.find("input[type='file']").val('');
            nuevoDocumentoInput.find("input[type='text']").val('');

            // Genera un nuevo nombre único para cada campo clonado
            var nuevoId = Date.now(); // Utiliza la marca de tiempo actual como identificador único
            nuevoDocumentoInput.find("input[type='file']").attr('id', 'ruta_documento_' + nuevoId);
            nuevoDocumentoInput.find("input[type='file']").attr('name', 'ruta_documento[]');
            nuevoDocumentoInput.find("input[type='text']").attr('id', 'nombre_documento_' + nuevoId);
            nuevoDocumentoInput.find("input[type='text']").attr('name', 'nombre_documento[]');

            // Agrega un botón de eliminar a la fila clonada
            var botonEliminar = $('<button/>', {
                text: 'Eliminar',
                class: 'btn btn-danger eliminar-documento',
                type: 'button',
                click: function() {
                    // Elimina la fila cuando se hace clic en el botón de eliminar
                    $(this).closest('.documentos-input').remove();
                }
            });

            // Agrega el botón de eliminar a la fila clonada
            nuevoDocumentoInput.append($('<div/>', {
                class: 'col-md-12 text-right mt-2 mb-2'
            }).append(botonEliminar));

            // Agrega los campos clonados al contenedor
            documentosContainer.append(nuevoDocumentoInput);
        });

        // Evento para eliminar filas existentes (manejador delegado)
        $(document).on('click', '.eliminar-documento', function() {
            $(this).closest('.documentos-input').remove();
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
<script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
</script>

<script>
  $(document).ready(function () {
    // Ocultar el container add-boton inicialmente
    $(".add-boton").hide();
    $(".documentos-container").hide();
    $(".documentos-container-comprimido").hide();
    $(".open-other-site").hide();
    
    // Desactivar la opción "No" cuando se selecciona "Si"
    $("#inlineCheckbox1").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox2").prop("checked", false);
        $(".add-boton").slideDown(); // Mostrar el container add-boton
      } else {
        $(".add-boton").slideUp(); // Ocultar el container add-boton
      }
    });

    $("#inlineCheckbox12").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox21").prop("checked", false);
        $(".documentos-container").slideDown(); 
      } else {
        $(".documentos-container").slideUp(); 
      }
    });

    $("#inlineCheckbox13").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox23").prop("checked", false);
        $(".documentos-container-comprimido").slideDown(); 
      } else {
        $(".documentos-container-comprimido").slideUp(); 
      }
    });

    $("#inlineCheckbox14").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox24").prop("checked", false);
        $(".open-other-site").slideDown(); 
      } else {
        $(".open-other-site").slideUp(); 
      }
    });

    // Desactivar la opción "Si" cuando se selecciona "No"
    $("#inlineCheckbox2").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox1").prop("checked", false);
        $(".add-boton").slideUp();    
      }
    });

    $("#inlineCheckbox21").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox12").prop("checked", false);
        $(".documentos-container").slideUp();    
      }
    });

    $("#inlineCheckbox23").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox13").prop("checked", false);
        $(".documentos-container-comprimido").slideUp();    
      }
    });

    $("#inlineCheckbox24").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox14").prop("checked", false);
        $(".open-other-site").slideUp();    
      }
    });

  });
</script>
