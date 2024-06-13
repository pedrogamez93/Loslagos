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
                        <h1>Formulario de Creacion de Asambleas Climaticas</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Asamblea Climatica</h1> 
                        </div>
                    </div>
                    <!-- Formulario para la creación de un nuevo trámite -->
                    <form action="{{ url('/asambleaclimatica') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Campos para el nuevo trámite -->
                        <label class="style-label required" for="titulo">Título:</label>
                        <input class="form-control mt-2" type="text" name="titulo_one" placeholder="Título" required>
                       
                        <label class="style-label" for="bajada">Bajada o Descripción:</label>
                        <textarea class="form-control mt-2 mb-4" id="" name="descripcion_one" placeholder="Bajada o Descripción"></textarea>

                        <label class="style-label" for="titulotwo">Título:</label>
                        <input class="form-control mt-2" type="text" name="titulo_two" placeholder="Título">
                       
                        <label class="style-label" for="bajada">Bajada o Descripción:</label>
                        <textarea class="form-control mt-2 mb-4" id="" name="descripcion_two" placeholder="Bajada o Descripción"></textarea>

                        <label class="style-label" for="titulotree">Título:</label>
                        <input class="form-control mt-2 mb-4" type="text" name="titulo_tree" placeholder="Título">
                       
                        <label class="style-label mb-2" for="bajada">Bajada o Descripción:</label>
                        <textarea class="form-control mt-2 mb-4" id="" name="descripcion_tree" placeholder="Bajada o Descripción"></textarea>

                        <label class="style-label" for="titulofour">Título:</label>
                        <input class="form-control mt-2 mb-4" type="text" name="titulo_four" placeholder="Título">
                       
                        <label class="style-label mb-2" for="bajada">Bajada o Descripción:</label>
                        <textarea class="form-control mt-2 mb-4" id="" name="descripcion_four" placeholder="Bajada o Descripción"></textarea>

                        <label class="style-label" for="titulofive">Título:</label>
                        <input class="form-control mt-2 mb-4" type="text" name="titulo_five" placeholder="Título">
                       
                        <label class="style-label mb-2" for="bajada">Bajada o Descripción:</label>
                        <textarea class="form-control mt-2 mb-4" id="" name="descripcion_five" placeholder="Bajada o Descripción"></textarea>

                        <label class="style-label" for="titulosix">Título:</label>
                        <input class="form-control mt-2 mb-4" type="text" name="titulo_six" placeholder="Título">
                       
                        <label class="style-label mb-2" for="bajada">Bajada o Descripción:</label>
                        <textarea class="form-control mt-2 mb-4" id="" name="descripcion_six" placeholder="Bajada o Descripción"></textarea>

                        <label class="style-label" for="tituloseccion">Título Seccion documentos:</label>
                        <input class="form-control mt-2 mb-4" type="text" name="titulo_seccion_two" placeholder="Título">

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

                      <div class="container form-control mt-4">
                            <label class="style-label mt-4 mb-2" for="tituloseccionbtn">Título Sección Boton:</label>
                            <input class="form-control" type="text" name="titulo_seccion_btn">
                            <div class="row mt-3">
                                <div class="col-md-6 mb-4">
                                    <label class="style-label" for="nombre_btn">Nombre Boton:</label>
                                    <input class="form-control" type="text" name="nombre_btn">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="style-label" for="url_btn">Url Boton:</label>
                                    <input class="form-control" type="text" name="url_btn">
                                </div>
                            </div>
                        </div>

                      <button class=" mt-5 btn btn-success" type="submit">Guardar</button>
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
    });
</script>

<script>
  $(document).ready(function () {
    // Ocultar el container add-boton inicialmente
    $(".documentos-container").hide();
    // Desactivar la opción "No" cuando se selecciona "Si"
    $("#inlineCheckbox12").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox21").prop("checked", false);
        $(".documentos-container").slideDown(); 
      } else {
        $(".documentos-container").slideUp(); 
      }
    });
    // Desactivar la opción "Si" cuando se selecciona "No"
    $("#inlineCheckbox21").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox12").prop("checked", false);
        $(".documentos-container").slideUp();    
      }
    });
});
</script>