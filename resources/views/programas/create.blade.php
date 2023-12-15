<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
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
                        <h1>Formulario para creación de programas</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Crear programa</h2> 
                        </div>
                    </div>
                    <!-- Formulario para la creación de un nuevo programa -->
                    <form action="{{ route('programas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Campos para el nuevo programa -->

                        <label class=" mt-3 style-label required" for="titulo">Título:</label>
                        <input class="form-control mt-2 mb-4" type="text" name="titulo" placeholder="Título" required>
                       
                        <label class="style-label mb-2" for="bajada">Bajada:</label>
                        <textarea class="form-control mt-2" name="bajada" placeholder="Bajada"></textarea>

                        
                        <label class="style-label" for="icono">Imagen:</label>
                        <input class="form-control mt-2 mb-4" type="file" name="imagen" accept=".png, .jpg, .jpeg">
<!--
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
                                    <input class="form-control mt-2 mb-4" type="text" name="nombrebtn" placeholder="Nombre del boton externo">
                                </div>
                                <div class="col-md-6">
                                    <label class="style-label" for="url">URL del boton externo:</label>
                                    <input class="form-control mt-2 mb-4" type="text" name="urlbtn" placeholder="URL del boton externo">
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
-->
                      <!-- Campos para documentos
                      <div class="documentos-container mt-3">
                          <div class="documentos-input">
                              <label class="style-label" for="documentos">Documentos:</label>
                              <input class="form-control mt-2 mb-4" type="file" name="urlDocumento[]" accept=".pdf, .doc, .docx, .zip, .rar" multiple>
                              <input class="form-control mt-2 mb-2" type="text" name="nombreDocumento[]" placeholder="Nombres de los Documentos" multiple>
                          </div>
                          <!-- Botón para agregar más documentos 
                          <button type="button" class="btn btn-primary agregar-documento">Agregar Más</button>
                      </div>
-->
                    <!--Colecciones de fotografias
                      <div class="container pregunta-doc mt-4">
                          <label class="style-label mb-2">Deseas agregar colecciones?</label>
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox15" value="option1">
                                      <label class="form-check-label" for="inlineCheckbox15">Si</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox25" value="option2" checked>
                                      <label class="form-check-label" for="inlineCheckbox25">No</label>
                                  </div>
                              </div>
                          </div>
                      </div>
-->
                      <!-- Campos para colecciones
                      <div class="colecciones-container mt-3">
                          <div class="colecciones-input">
                              <label class="style-label" for="colecciones">Fotografías:</label>
                              <input class="form-control mt-2 mb-4" type="file" name="imagen[]" accept=".png, .jpg, .jpeg" multiple>
                              <input class="form-control mt-2 mb-2" type="text" name="titulo[]" placeholder="Nombres de la coleccion" multiple>
                          </div>
                          <!-- Botón para agregar más fotografias 
                          <button type="button" class="btn btn-primary agregar-coleccion">Agregar fotografías</button>
                      </div>
-->

                            

                        <button class="mt-1 btn btn-success" type="submit">Crear Programa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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

            // Agrega los campos clonados al contenedor
            documentosContainer.append(nuevoDocumentoInput);
        });
        // Agregar más Fotografias 
        $(".agregar-coleccion").click(function() {
            var coleccionesContainer = $(".colecciones-container");
            var nuevoFotografiaInput = coleccionesContainer.find(".colecciones-input:first").clone(); // Clona el primer conjunto de campos

            // Limpia los valores en los campos clonados
            nuevoFotografiaInput.find("input[type='file']").val('');
            nuevoFotografiaInput.find("input[type='text']").val('');

            // Genera un nuevo nombre único para cada campo clonado
            var nuevoId = Date.now(); // Utiliza la marca de tiempo actual como identificador único
            nuevoFotografiaInput.find("input[type='file']").attr('id', 'imagen' + nuevoId);
            nuevoFotografiaInput.find("input[type='file']").attr('name', 'imagen[]');
            nuevoFotografiaInput.find("input[type='text']").attr('id', 'titulo' + nuevoId);
            nuevoFotografiaInput.find("input[type='text']").attr('name', 'titulo[]');

            // Agrega los campos clonados al contenedor
            coleccionesContainer.append(nuevoFotografiaInput);
        });
    });
</script>


<script>
  $(document).ready(function () {
    // Ocultar el container add-boton inicialmente
    $(".add-boton").hide();
    $(".documentos-container").hide();
    $(".colecciones-container").hide();
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

    $("#inlineCheckbox15").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox25").prop("checked", false);
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

    $("#inlineCheckbox25").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox15").prop("checked", false);
        $(".open-other-site").slideUp();    
      }
    });

    // Botón "Agregar Más" para duplicar los inputs
    $("#agregarMas").click(function () {
      // Clonar el primer par de inputs y agregar al final
      var nuevoBoton = $(".add-boton .row").first().clone();
      $(".add-boton .row:last").after(nuevoBoton);
    });
  });
</script>
