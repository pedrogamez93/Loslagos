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
</style>

<div class="container principal pt-3 pb-3">
    <div class="row">
        <div class="col-md-12">
            <h1>Formulario de Edición Principal</h1>
        </div>
    </div>
    <div class="container first-form pt-2 pb-2">
        <div class="row">
            <div class="col-md-12">
                <h2>Acerca Gobierno Regional</h2>
            </div>
        </div>
        <form id="formulario-edicion" action="{{ url('/introducciones') }}" method="post" enctype="multipart/form-data">
            @csrf 
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 tag-comentario">
                        <div class="input-group mb-3">
                            <input type="text" id="tag_comentario" name="tag_comentario" class="form-control" placeholder="Tag o comentario" value="" disabled>
                        </div>
                    </div>
                    <div class="col-md-6 title">
                        <div class="input-group mb-3">
                            <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Titulo seccion" disabled>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12 pb-3">
                        <div id="text">
                            <div class="form-floating">
                                <textarea name="bajada" class="form-control" placeholder="Escribe tu contenido aquí" id="bajada" style="height: 250px" disabled></textarea>
                                <label class="style-label" for="floatingTextarea2 style-label">Bajada de la introducción</label>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="form-group">
                <div class="col-md-12 pt-3 pb-3">
                    <div class="mb-3">
                        <label for="formFile" class="form-label style-label">Selecciona una imagen para la sección</label>
                            <input class="form-control" type="file" name="img" id="img" accept="image/*" disabled>
                    </div>
                </div>
            </div>
            <button type="button" id="editar" name="editar" class="btn btn-primary">Editar</button>
            <button type="submit" class="btn btn-success" id="Enviar" name="Enviar">Guardar</button>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Cuando se haga clic en el botón "Editar"
        $("#editar").click(function() {
            // Habilita los campos de entrada por su ID
            $("#tag_comentario").prop("disabled", false);
            $("#titulo").prop("disabled", false);
            $("#bajada").prop("disabled", false);
            $("#img").prop("disabled", false);
        });
    });
</script>