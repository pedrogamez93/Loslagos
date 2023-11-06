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
    .first-form, .second-form{
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
                <!-- Incluir tu menú aquí -->
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
                            <h1>Departamento Gestión y Desarrollo de Personas</h1>
                        </div>
                    </div>
                    <form id="formulario-creacion" action="{{ route('dptogestionpersonas.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Titulo seccion" value="{{ $departamento->titulo }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 pb-3">
                                <div id="text">
                                    <div class="form-floating">
                                        <textarea name="bajada" class="form-control" placeholder="Escribe tu contenido aquí" id="bajada" style="height: 250px" disabled>{{ $departamento->bajada }}</textarea>
                                         <label class="style-label" for="floatingTextarea2 style-label">Bajada</label>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        <div class="form-group">
                            <div class="col-md-12 pt-3 pb-3">
                                <div class="mb-3">
                                    <label for="documentos" class="form-label style-label">Documentos</label>
                                    <div class="documentos-container" id="documentos-container">
                                        <div class="documentos-input">
                                            <input class="form-control mt-2 mb-2" type="file" name="documentos[]" accept=".pdf,.doc,.docx">
                                            <input class="form-control mt-2 mb-2" type="text" name="nombres[]" placeholder="Nombre del documento">
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary mt-4 mb-4" id="agregarDocumento">Agregar más documentos</button>
                                </div>
                            </div>
                        </div>
                        <div class="container doc">
                            <div class="row">
                                <div class="col-md-12">
                                @php
                                    /*
                                    @if (count($documentosUltimoDepartamento) > 0)
                                            <h2>Documentos del Último Departamento:</h2>
                                            <ul>
                                                @foreach ($documentosUltimoDepartamento as $documento)
                                                    <li>
                                                        <a href="{{ asset('documentos/dptogestionpersonas/' . $documento->ruta) }}" target="_blank">{{ $documento->nombre }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p>No hay documentos disponibles en el último departamento.</p>
                                    @endif
                                    */
                                @endphp
                                    @if (count($documentosTodos) > 0)
                                        <h2>Todos los Documentos:</h2>
                                        <ul>
                                            @foreach ($documentosTodos as $documento)
                                                <li>
                                                    <a href="{{ asset('documentos/dptogestionpersonas/' . $documento->ruta) }}" target="_blank">{{ $documento->nombre }}</a>
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
            $("#titulo").prop("disabled", false);
            $("#bajada").prop("disabled", false);
            $(".documentos-input input").prop("disabled", false);
            $("#agregarDocumento").prop("disabled", false);
        });

        // Agregar más documentos
        $("#agregarDocumento").click(function() {
            var documentosContainer = document.getElementById("documentos-container");
            var newInput = document.createElement("div");
            newInput.innerHTML = '<input class="form-control mt-2 mb-2" type="file" name="documentos[]" accept=".pdf,.doc,.docx"><input class="form-control mt-2 mb-2" type="text" name="nombres[]" placeholder="Nombre del documento">';
            documentosContainer.appendChild(newInput);
        });
    });
</script>