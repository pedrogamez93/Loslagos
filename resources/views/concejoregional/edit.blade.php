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

    .seccion-item {
        border: 1px solid #CCCCCC;
        border-radius: 10px;
        margin-bottom: 10px;
        padding: 10px;
    }

    .seccion-content {
        display: flex;
    }

    .seccion-actions {
        margin-top: 10px;
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
                        <h1>Formulario de Edicion Concejo Regional</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Concejo Regional </h1>
                            <h2>Introduccion</h2>
                        </div>
                    </div>
                    <form id="formulario-creacion" action="{{ route('concejoregional.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 tag-comentario">
                                    <div class="input-group mb-3">
                                        <input type="text" id="tag_comentario" name="tag_comentario" class="form-control" placeholder="Tag o comentario" value="{{ $concejo->tag_comentario }}">
                                    </div>
                                </div>
                                <div class="col-md-6 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Titulo seccion" value="{{ $concejo->titulo }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 pb-3">
                                    <div id="text">
                                        <div class="form-floating">
                                        <textarea name="bajada" class="form-control" placeholder="Escribe tu contenido aquí" id="bajada" style="height: 250px">{{ $concejo->bajada }}</textarea>
                                            <label class="style-label" for="floatingTextarea2 style-label">Bajada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 pt-3 pb-3">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label style-label">Imagen actual</label>
                                        <img src="{{ asset('storage/' . $concejo->img) }}" style="width: 150px; height: 150px;" alt="Imagen del Consejo Regional">
                                    </div>
                                </div>
                            </div>



                            <div class="secciones-container mt-3">
                                <div class="container moreseccion form-control mt-3 pb-3" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="style-label mb-2" for="titulo_seccion">Título:</label>
                                            <input class="form-control mt-2 mb-4" type="text" name="titulo_seccion[]" placeholder="Título">

                                            <label class="style-label mb-2" for="bajada_seccion">Bajada o Descripción:</label>
                                            <textarea class="form-control mt-2 mb-4" name="bajada_seccion[]" placeholder="Bajada o Descripción"></textarea>

                                            <label for="formFile" class="form-label style-label">Selecciona una imagen para la sección</label>
                                            <input class="form-control" type="file" name="img_seccion[]" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container mt-3 mb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-info" id="agregarSeccion">+ Sección</button>
                                    </div>
                                </div>
                            </div>

                            <div class="container mt-5 mb-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success" id="guardarCambios" name="guardarCambios">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Contador para generar IDs únicos
        var contadorSecciones = {{ $concejo->secciones->count() + 1 }};

        // Manejar clic en el botón + Sección
        $("#agregarSeccion").click(function() {
            // Clonar el contenedor y mostrarlo
            var nuevoContenedor = $(".moreseccion").clone(true).removeClass('moreseccion').addClass('seccion').appendTo(".secciones-container").show();
            
            // Incrementar el contador para el siguiente clon
            contadorSecciones++;

            // Generar IDs únicos para los inputs clonados
            nuevoContenedor.find('input, textarea').each(function() {
                var nombreOriginal = $(this).attr('name');
                var nuevoID = nombreOriginal.replace(/\[\]/, '[' + contadorSecciones + ']');
                $(this).attr('id', nuevoID).attr('name', nuevoID);
            });

            // Limpiar valores de los inputs clonados (excepto el de la imagen)
            nuevoContenedor.find('input:not([type="file"]), textarea').val('');
        });

        // Manejar clic en el botón Editar Sección
        $(document).on("click", ".btn-edit-seccion", function() {
            // Obtener el ID de la sección
            var seccionId = $(this).data('seccion-id');
            
            // Obtener el contenedor de la sección
            var seccionContainer = $(this).closest(".seccion-item");

            // Habilitar la edición de los campos de la sección
            seccionContainer.find('.seccion-content p').prop('contenteditable', true);

            // Aquí puedes hacer algo con el ID de la sección, si es necesario
            console.log("ID de la sección:", seccionId);
        });

        // Manejar clic en el botón Eliminar Sección
        $(document).on("click", ".btn-delete-seccion", function() {
            // Obtener el contenedor de la sección y eliminarlo
            $(this).closest(".seccion-item").remove();
        });

        // Manejar clic en el botón Guardar Cambios
        $("#guardarCambios").click(function() {
            var data = $("#formulario-creacion").serialize();  // Obtener datos del formulario

            $.ajax({
                url: '{{ route("concejoregional.updateSeccion", ["concejoId" => $concejo->id, "seccionId" => $seccionId]) }}',
                method: 'PUT',
                data: data,
                success: function(response) {
                    console.log(response);  // Manejar la respuesta del servidor
                },
                error: function(error) {
                    console.error(error);  // Manejar errores, si los hay
                }
            });
        });
            // Enviar data al servidor
            $.ajax({
                url: '{{ route("concejoregional.updateSeccion", ["concejoId" => $concejo->id, "seccionId" => ":seccionId"]) }}'.replace(':seccionId', seccionId),
                method: 'PUT',
                data: { secciones: data, _token: '{{ csrf_token() }}' }, // Incluye el token CSRF
                success: function(response) {
                    console.log(response);  // Manejar la respuesta del servidor
                },
                error: function(error) {
                    console.error(error);  // Manejar errores, si los hay
                }
            });
        });
    });
</script>