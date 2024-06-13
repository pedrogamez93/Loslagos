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
                        <h1>Formulario de Creación de Landings Pages</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Landings Pages</h1> 
                        </div>
                    </div>
                    <!--@if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif-->
                    <!-- Formulario para la creación de un nuevo Landings Pages -->
                    <form action="{{ route('landings.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Campos para la nueva Landings Pages -->
                        <label class="style-label" for="tags">Tags o Comentario:</label>
                        <input class="form-control mt-2 mb-4" type="text" name="tags" placeholder="Tags o Comentario">

                        <label class="style-label required" for="titulo">Título:</label>
                        <input class="form-control mt-2 mb-4" type="text" name="titulo" placeholder="Título" required>

                        <label class="style-label mb-2" for="descripcion">Descripción:</label>
                        <textarea class="form-control mt-2 mt-2" name="descripcion" placeholder="Descripción"></textarea>

                        <div class="imagenes-container mt-3">
                            <label class="style-label" for="imagenes">Imágenes:</label>
                            <div class="mb-3 imagen-input">
                                <div>
                                    <input class="form-control mt-2" type="file" name="ruta_imagen[]" accept=".png, .jpg, .jpeg">
                                </div>
                                <div>
                                    <input class="form-control mt-2" type="text" name="nombre_imagen[]" placeholder="Nombre de la imagen">
                                </div>
                            </div>
                            <div class="btn-add-images mt-2">
                                <button type="button" class="btn btn-primary agregar-imagen">Agregar Más</button>
                            </div>
                        </div>

                        <!-- Campos para botones externos-->
                        <div class="add-boton mt-4">
                            <label class="style-label">Botones externos:</label>
                            <div class="mb-3 boton-input">
                                <div>
                                    <input type="text" class="form-control mt-2" name="nombre_btn[]" placeholder="Nombre del botón externo">
                                </div>
                                <div>
                                    <input type="text" class="form-control mt-2" name="url[]" placeholder="URL del botón externo">
                                </div>
                            </div>
                            <div class="btn-add-buttons mt-2">
                                <button type="button" class="btn btn-primary agregar-boton">Agregar Más</button>
                            </div>
                        </div>

                        <!-- Campos para documentos-->
                        <div class="documentos-container mt-3">
                            <label class="style-label" for="documentos">Documentos:</label>
                            <input class="form-control mt-2 mb-4" type="file" name="ruta_documento[]" accept=".pdf, .doc, .docx, .zip, .rar" multiple>
                            <input class="form-control mt-2 mb-2" type="text" name="nombre_documento[]" placeholder="Nombres de los Documentos" multiple>
                            <button type="button" class="btn btn-primary agregar-documento">Agregar Más</button>
                        </div>

                        <label class="style-label mt-4" for="menu_ubicacion">Ubicación en el Menú:</label>
                        <select class="form-control mt-2 mb-4" name="menu_ubicacion">
                            <option value="">Selecciona una opción</option>
                            <option value="gobierno-regional">Gobierno Regional</option>
                            <option value="consejo-regional">Consejo Regional</option>
                            <option value="region-los-lagos">Región Los Lagos</option>
                        </select>

                        <label class="style-label" for="habilitado">Habilitado:</label>
                        <select class="form-control mt-2 mb-2" name="habilitado">
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>

                        <button class="mt-5 btn btn-success" type="submit">Crear Landing</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Función para agregar campos de imágenes con botón eliminar
    $('.agregar-imagen').click(function() {
        var counter = new Date().getTime();
        var nuevaImagen = $('.imagen-input:first').clone(true);
        nuevaImagen.find("input[type='file']").val('').attr('name', 'ruta_imagen[' + counter + ']');
        nuevaImagen.find("input[type='text']").val('').attr('name', 'nombre_imagen[' + counter + ']');
        var botonEliminarImagen = $('<button/>', {
            text: 'Eliminar',
            type: 'button',
            class: 'btn btn-danger eliminar-imagen mt-2',
            click: function() { $(this).parent().remove(); }
        });
        nuevaImagen.append(botonEliminarImagen);
        $('.imagenes-container').append(nuevaImagen);
    });

    // Función para agregar campos de botones externos con botón eliminar
    $('.agregar-boton').click(function() {
        var counter = new Date().getTime();
        var nuevoBoton = $('.boton-input:first').clone(true);
        nuevoBoton.find("input[type='text']").first().val('').attr('name', 'nombre_btn[' + counter + ']');
        nuevoBoton.find("input[type='text']").last().val('').attr('name', 'url[' + counter + ']');
        var botonEliminarBoton = $('<button/>', {
            text: 'Eliminar',
            type: 'button',
            class: 'btn btn-danger eliminar-boton mt-2',
            click: function() { $(this).parent().remove(); }
        });
        nuevoBoton.append(botonEliminarBoton);
        $('.add-boton').append(nuevoBoton);
    });

    // Función para agregar campos de documentos con botón eliminar
    $('.agregar-documento').click(function() {
        var counter = new Date().getTime();
        var nuevoDocumento = $('<div/>', {class: 'mb-3 documento-input'}).append(
            $('<input/>', {
                type: 'file',
                class: 'form-control mt-2',
                name: 'ruta_documento[' + counter + ']',
                accept: '.pdf, .doc, .docx, .zip, .rar'
            }),
            $('<input/>', {
                type: 'text',
                class: 'form-control mt-2',
                name: 'nombre_documento[' + counter + ']',
                placeholder: 'Nombres de los Documentos'
            })
        );
        var botonEliminarDocumento = $('<button/>', {
            text: 'Eliminar',
            type: 'button',
            class: 'btn btn-danger eliminar-documento mt-2',
            click: function() { $(this).parent().remove(); }
        });
        nuevoDocumento.append(botonEliminarDocumento);
        $('.documentos-container').append(nuevoDocumento);
    });

    // Evento para eliminar dinámicamente los campos agregados no es necesario ya que está integrado en cada botón creado
});
</script>