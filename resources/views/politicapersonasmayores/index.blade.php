<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
                        <h1>Diseño Política Regional Personas Mayores</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Política Regional Personas Mayores</h1> 
                        </div>
                    </div>
                        <!-- Campos para el nuevo trámite -->
                        <label class="style-label required" for="titulo">Título:</label>
                        <input class="form-control mt-2" type="text" id="titulo" name="titulo" placeholder="Título" value="{{ $ultimoRegistro->titulo }}" required disabled>
                       
                        <label class="style-label" for="bajada">Bajada o Descripción:</label>
                        <textarea class="form-control mt-2 mb-4" id="editor" name="bajada" placeholder="Bajada o Descripción" disabled>{{ $ultimoRegistro->bajada }}</textarea>

                        <div class="form-group">
                            <div class="col-md-12 pt-3 pb-3">
                                <div class="mb-3">
                                <div class="documentos-container" style="display: none;">
                                    <label for="documentos" class="form-label style-label">Notas de Prensa</label>
                                    <div class="documentos-input">
                                        <input class="form-control mt-2 mb-2" type="file" name="urldocs[]" accept=".pdf,.doc,.docx">
                                        <input class="form-control mt-2 mb-2" type="text" name="nombredocs[]" placeholder="Nombre del documento">
                                    </div>
                                </div>
                                <button type="button" style="display: none;" class="btn btn-secondary mt-4 mb-4 agregarDocumento">Agregar más Notas de Prensa</button>
                            </div>
                        </div>

                        <div class="container doc">
                            <div class="row">
                                <div class="col-md-12">
                                    @if (count($docs) > 0)
                                        <h2>Todos los Documentos:</h2>
                                        <ul>
                                            @foreach ($docs as $documento)
                                                <li>
                                                    <p>{{ $documento->nombredocs }}</p>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>No hay documentos disponibles en todos los departamentos.</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                      <button type="button" id="editar" name="editar" class="btn btn-primary">Editar</button>
                      <button class="btn btn-success" style="display: none;" type="submit">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            allowedContent: true
        })
        .catch(error => {
            console.error(error);
        });
</script>

<script>
    $(document).ready(function() {
        // Estado para rastrear si se ha hecho clic antes
        var primerClic = false;

        // Ocultar el contenedor al cargar la página
        $(".documentos-container").hide();

        // Manejar el clic en el botón "Agregar más Notas de Prensa"
        $(".agregarDocumento").click(function() {
            // Mostrar el contenedor en el primer clic
            if (!primerClic) {
                $(".documentos-container").show();
                primerClic = true;
            } else {
                // Clonar y agregar campos en el segundo clic
                var documentosContainer = $(".documentos-container");
                var nuevoCampo = documentosContainer.find(".documentos-input:first").clone();

                // Limpiar los valores en los campos clonados
                nuevoCampo.find("input[type='file']").val('');
                nuevoCampo.find("input[type='text']").val('');

                // Agregar el campo clonado al contenedor
                documentosContainer.append(nuevoCampo);
            }
        });

        // Cuando se haga clic en el botón "Editar"
        $(document).ready(function() {
    
        $("#editar").click(function() {
            // Obtener la URL de la página de edición
            var urlEdicion = "{{ route('politicapersonasmayores.edit', $ultimoRegistro->id) }}";

            // Redirigir a la página de edición
            window.location.href = urlEdicion;
        });
    });
});
</script>