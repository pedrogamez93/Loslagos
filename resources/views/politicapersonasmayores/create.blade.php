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
                    <!-- Formulario para la creación de un Política Regional Personas Mayores -->
                    <form action="{{ route('politicapersonasmayores.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label class="style-label required" for="titulo">Título:</label>
                        <input class="form-control mt-2" type="text" name="titulo" placeholder="Título" required>
                       
                        <label class="style-label" for="bajada">Bajada o Descripción:</label>
                        <textarea class="form-control mt-2 mb-4" id="editor" name="bajada" placeholder="Bajada o Descripción"></textarea>

                        <div class="form-group">
                            <div class="col-md-12 pt-3 pb-3">
                                <div class="mb-3">
                                    <label for="documentos" class="form-label style-label">Notas de Prensa</label>
                                    <div class="documentos-container">
                                        <div class="documentos-input">
                                            <input class="form-control mt-2 mb-2" type="file" name="urldocs[]" accept=".pdf,.doc,.docx">
                                            <input class="form-control mt-2 mb-2" type="text" name="nombredocs[]" placeholder="Nombre del documento">
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary mt-4 mb-4 agregarDocumento">Agregar más Notas de Prensa</button>
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
        // Cuando se haga clic en el botón "Editar"
        $("#editar").click(function() {
            // Habilita los campos de entrada por su ID
            $("#titulo").prop("disabled", false);
            $("#bajada").prop("disabled", false);
            $(".documentos-container input").prop("disabled", false); // Habilita todos los campos de documentos
            $(".agregarDocumento").prop("disabled", false);
        });

        // Agregar más documentos
        $(".agregarDocumento").click(function() {
            var documentosContainer = $(".documentos-container");
            var nuevosCampos = documentosContainer.find(".documentos-input:first").clone(); // Clona el primer conjunto de campos

            // Limpia los valores en los campos clonados
            nuevosCampos.find("input[type='file']").val('');
            nuevosCampos.find("input[type='text']").val('');

            // Agrega los campos clonados al contenedor
            documentosContainer.append(nuevosCampos);
        });
    });
</script>
    
