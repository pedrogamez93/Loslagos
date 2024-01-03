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
                        <h1>COMITÉ DE CIENCIA, TECNOLOGÍA E INNOVACIÓN</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>COMITÉ DE CIENCIA, TECNOLOGÍA E INNOVACIÓN</h1> 
                        </div>
                    </div>
                    <!-- Mostrar la información de la base de datos -->
                    <form action="{{ route('comiteciencias.update', $comite->id) }}" method="POST" enctype="multipart/form-data" id="formulario-edicion">
                        @csrf
                        @method('PUT')
                            <!-- Campos del formulario -->
                            <label class="style-label required" for="titulo">Título:</label>
                            <input class="form-control mt-2" type="text" name="titulo" value="{{ $comite->titulo ?? '' }}">

                            <label class="style-label required" for="tags">Tags:</label>
                            <input class="form-control mt-2" type="text" name="tags" value="{{ $comite->tags ?? '' }}">
                           
                            <label class="style-label" for="bajada">Bajada o Descripción:</label>
                            <textarea class="form-control mt-2 mb-4" id="" name="descripcion">{{ $comite->descripcion ?? '' }}</textarea>

                            <label class="style-label required" for="tags">Nota:</label>
                            <textarea class="form-control mt-2 mb-4" id="" name="nota">{{ $comite->nota ?? '' }}</textarea>
                            <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group mt-4">
                <label class="style-label mb-2" for="bajada">Documentos</label>
                <div class="container form-control">
                    <div class="row">
                        @if($comite->documentos->count() > 0)
                            @foreach($comite->documentos as $documento)
                                <div class="col-md-6">
                                    <p class="form-control mt-2">{{ $documento->nombre_documento ?? '' }}</p>
                                </div>
                                <div class="col-md-6">
                                <button type="button" class="btn btn-danger mt-2" onclick="eliminarDocumento({{ $documento->id }})">Eliminar</button>
                                </div>
                            @endforeach
                        @else
                            <p>No hay documentos asociados a este concurso.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
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

                        <button class=" mt-5 btn btn-success" type="submit">Guardar</button>
                    </form>
                </div>
                <button class=" mt-5 btn btn-success" id="boton-volver" >Volver</button>
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

<script>
    $(document).ready(function() {

        $("#boton-volver").click(function() {
            window.location.href = "{{ route('comiteciencias.index') }}";
        });
            
    });
</script>
<script>
    function eliminarDocumento(documentoId) {
        // Aquí debes hacer la llamada a tu backend para eliminar el documento
        // Puedes usar AJAX o Fetch para realizar una solicitud DELETE al controlador

        // Ejemplo con Fetch:
        fetch(`/eliminar-documento/${documentoId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Agrega el token CSRF si estás utilizando protección CSRF
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Documento eliminado con éxito, puedes recargar la página o actualizar la lista de documentos
                alert(data.message);
                location.reload(); // Recarga la página, puedes ajustar esto según tus necesidades
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error al eliminar documento:', error);
            alert('Error al eliminar documento. Consulta la consola para obtener más detalles.');
        });
    }
</script>