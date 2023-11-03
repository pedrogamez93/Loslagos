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
                        <h1>Formulario de Edición Gobierno Regional</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Acerca del Gobierno Regional </h1>
                            <h2>Ley del Gobierno Regional</h2>
                        </div>
                    </div>
                    <form id="formulario-creacion" action="{{ url('/leygobiernoregional') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12 tipo-norma">
                                    <div class="input-group mb-3">
                                        <input type="text" id="tipo_norma" name="tipo_norma" class="form-control" placeholder="Tipo de norma" value="" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <p>Fecha Publicación:<input type="text" name="fecha_publicacion" id="fecha_publicacion_datepicker"></p>
                                </div>
                                <div class="col-md-6">
                                <p>Fecha Promulgación:<input type="text" name="fecha_promulgacion" id="fecha_promulgacion_datepicker"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 pb-3">
                                    <div class="input-group mb-3">
                                            <input type="text" id="organismo" name="organismo" class="form-control" placeholder="Organismo" value="" disabled>
                                    </div>
                                </div>
                                <div class="col-md-12 pb-3">
                                    <div class="input-group mb-3">
                                            <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Titulo" value="" disabled>
                                    </div>
                                </div>
                                <div class="col-md-12 pb-3">
                                    <div class="input-group mb-3">
                                            <input type="text" id="tipo_version" name="tipo_version" class="form-control" placeholder="Tipo Version" value="" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 pt-3 pb-3">
                                        <div class="input-group mb-3">
                                            <p>Fecha de Vigencia:<input type="text" name="inicio_vigencia" id="fecha_vigencia_datepicker"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pt-3 pb-3">
                                        <div class="input-group mb-3">
                                            <input type="text" id="Url" name="url" class="form-control" placeholder="Url" value="" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-12 enlace">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label style-label">Selecciona un documento PDF para la sección</label>
                                                <input class="form-control" type="file" name="enlacedoc" id="enlacedoc" accept=".pdf" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <button type="button" id="editar" name="editar" class="btn btn-primary">Editar</button>
                            <button type="submit" class="btn btn-success" id="Enviar" name="Enviar">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Cuando se haga clic en el botón "Editar"
        $("#editar").click(function() {
            // Habilita los campos de entrada por su ID
            $("#tipo_norma").prop("disabled", false);
            $("#fecha_publicacion_datepicker").prop("disabled", false);
            $("#fecha_promulgacion_datepicker").prop("disabled", false);
            $("#organismo").prop("disabled", false);
            $("#titulo").prop("disabled", false);
            $("#tipo_version").prop("disabled", false);
            $("#fecha_vigencia_datepicker").prop("disabled", false);
            $("#Url").prop("disabled", false);
            $("#enlacedoc").prop("disabled", false);
        });
    });
</script>

<script>
  $( function() {
    $("#fecha_publicacion_datepicker").datepicker({
      dateFormat: "dd-mm-yy" // Por ejemplo, muestra la fecha en formato dd/mm/yy
    });
    $("#fecha_promulgacion_datepicker").datepicker({
      dateFormat: "dd-mm-yy" // Por ejemplo, muestra la fecha en formato dd/mm/yy
    });
    $("#fecha_vigencia_datepicker").datepicker({
      dateFormat: "dd-mm-yy" // Por ejemplo, muestra la fecha en formato dd/mm/yy
    });
  } );
</script>