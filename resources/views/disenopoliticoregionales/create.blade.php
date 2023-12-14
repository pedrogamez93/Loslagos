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
                        <h1>Diseño Política Regional Sostenibilidad Hídrica</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Diseño Política Regional Sostenibilidad Hídrica</h1> 
                        </div>
                    </div>
                    <!-- Formulario para la creación de un nuevo Diseño Política Regional Sostenibilidad Hídrica -->
                    <form action="{{ url('/disenopoliticoregionales') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Campos para el nuevo Diseño Política Regional Sostenibilidad Hídrica -->
                        <label class="style-label required" for="titulo">Título:</label>
                        <input class="form-control mt-2 mb-4" type="text" name="titulo">

                        <label class="style-label" for="bajada">Bajada o Descripción:</label>
                        <textarea class="form-control mt-2 mb-4" id="editor" name="bajada"></textarea>

                        <label class="style-label mt-4" for="titulo_seccion_form">Título Seccion Formularios:</label>
                        <input class="form-control mt-2" type="text" name="titulo_seccion_form">

                        <!-- Contenedor original para formularios -->
                        <div class="container form-control agregando-btn-form mt-2 mb-2 pt-4 pb-4">
                            <label class="style-label" for="nombre_btn_form">Nombre del botón:</label>
                            <input class="form-control mt-2 campo" type="text" name="nombre_btn_form[]">

                            <label class="style-label" for="url_btn_form">URL del botón:</label>
                            <input class="form-control mt-2 campo" type="text" name="url_btn_form[]">
                        </div>

                        <!-- Botón para clonar formularios -->
                        <button type="button" class="btn btn-primary mt-2 mb-2" id="clonar">Agregar más</button>

                        <!-- Contenedor original para encuestas -->
                        <div class="container seccionencuestas">
                            <label class="style-label mt-4" for="titulo_seccion_encue">Título Seccion Encuestas:</label>
                            <input class="form-control mt-2" type="text" name="titulo_seccion_encue">

                            <label class="style-label mt-2" for="bajada_seccion_encue">Bajada o Descripción Encuestas:</label>
                            <textarea class="form-control mt-2 mb-4" id="editortwo" name="bajada_seccion_encue"></textarea>
                        </div>

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
                        <button type="button" class="btn btn-primary mt-2 mb-2" id="clonarencuesta">Agregar más</button>

                        <!-- Botón final para guardar -->
                        <div class="container btn-final">
                            <button class=" mt-5 btn btn-success" type="submit">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Manejador de clic en el botón "Agregar más" para formularios
        $("#clonar").on("click", function () {
            // Clona el contenedor y sus campos
            var clone = $(".agregando-btn-form:last").clone();

            // Genera un nuevo identificador único
            var nuevoId = Date.now();

            // Asigna el nuevo identificador a los campos clonados
            clone.find("input[name='nombre_btn_form[]']").attr('id', 'nombre_btn_form_' + nuevoId);
            clone.find("input[name='url_btn_form[]']").attr('id', 'url_btn_form_' + nuevoId);

            // Limpia los valores de los campos clonados
            clone.find(".campo").val('');

            // Inserta el clon justo debajo del contenedor original
            clone.insertAfter(".agregando-btn-form:last");
        });

        // Manejador de clic en el botón "Agregar más" para encuestas
        $("#clonarencuesta").on("click", function () {
            // Clona el contenedor de encuestas y sus campos
            var clone = $(".agregando-btn-encuestas:last").clone();

            // Genera un nuevo identificador único
            var nuevoId = Date.now();

            // Asigna el nuevo identificador a los campos clonados
            clone.find("input[name='nombre_encuesta[]']").attr('id', 'nombre_encuesta_' + nuevoId);
            clone.find("input[name='nombre_btn_encuesta[]']").attr('id', 'nombre_btn_encuesta_' + nuevoId);
            clone.find("input[name='url_btn_encuesta[]']").attr('id', 'url_btn_encuesta_' + nuevoId);

            // Limpia los valores de los campos clonados
            clone.find(".campoencuesta").val('');

            // Inserta el clon justo debajo del contenedor original de encuestas
            clone.insertAfter(".agregando-btn-encuestas:last");
        });
    });
</script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            allowedContent: true
        })
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#editortwo'), {
            allowedContent: true
        })
        .catch(error => {
            console.error(error);
        });
</script>