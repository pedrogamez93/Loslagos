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
                        <h1>Formulario edición de documentos</h1>
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <h1></h1>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('documentos.update', $documento->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="tipo_documento">Tipo de Documento:</label>
                            <select name="tipo_documento" id="tipo_documento" class="form-control" required>
                                <option value="Actas" {{ $documento->tipo_documento == 'Actas' ? 'selected' : '' }}>Actas</option>
                                <option value="Acuerdos" {{ $documento->tipo_documento == 'Acuerdos' ? 'selected' : '' }}>Acuerdos</option>
                                <option value="Resumengastos" {{ $documento->tipo_documento == 'Resumengastos' ? 'selected' : '' }}>Resumen de Gastos</option>
                                <option value="Documentogeneral" {{ $documento->tipo_documento == 'Documentogeneral' ? 'selected' : '' }}>Documento General</option>
                            </select>
                        </div>

                        <!-- Campos específicos para cada tipo de documento -->
                        <div id="actas-fields" class="document-fields" style="display: none;">
                            <div class="form-group">
                                <label for="provincia">Provincia:</label>
                                <select name="provincia" id="provincia" class="form-control">
                                    <option value="Llanquihue" {{ $documento->provincia == 'Llanquihue' ? 'selected' : '' }}>Llanquihue</option>
                                    <option value="Osorno" {{ $documento->provincia == 'Osorno' ? 'selected' : '' }}>Osorno</option>
                                    <option value="Chiloé" {{ $documento->provincia == 'Chiloé' ? 'selected' : '' }}>Chiloé</option>
                                    <option value="Palena" {{ $documento->provincia == 'Palena' ? 'selected' : '' }}>Palena</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="comuna">Comuna:</label>
                                <select name="comuna" id="comuna" class="form-control">
                                    <!-- Opciones para la comuna -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tema">Tema:</label>
                                <input type="text" name="tema" id="tema" class="form-control" value="{{ $documento->tema }}">
                            </div>
                            <div class="form-group">
                                <label for="fecha_hora">Fecha y Hora:</label>
                                <input type="datetime-local" name="fecha_hora" id="fecha_hora" class="form-control" value="{{ $documento->fecha_hora }}">
                            </div>
                            <div class="form-group">
                                <label for="lugar">Lugar:</label>
                                <input type="text" name="lugar" id="lugar" class="form-control" value="{{ $documento->lugar }}">
                            </div>
                            <div class="form-group">
                                <label for="numero_sesion">Número de Sesión:</label>
                                <input type="number" name="numero_sesion" id="numero_sesion" class="form-control" value="{{ $documento->numero_sesion }}">
                            </div>
                            <div class="form-group">
                                <label for="fecha_hora_sesion">Fecha y Hora de Sesión:</label>
                                <input type="datetime-local" name="fecha_hora_sesion" id="fecha_hora_sesion" class="form-control" value="{{ $documento->fecha_hora_sesion }}">
                            </div>
                            <div class="form-group">
                                <label for="portada">Portada:</label>
                                <div class="form-check">
                                    <input type="radio" name="portada" id="portada_si" value="si" class="form-check-input" {{ $documento->portada == 'si' ? 'checked' : '' }}>
                                    <label for="portada_si" class="form-check-label">Sí</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="portada" id="portada_no" value="no" class="form-check-input" {{ $documento->portada == 'no' ? 'checked' : '' }}>
                                    <label for="portada_no" class="form-check-label">No</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="publicacion">Publicación:</label>
                                <div class="form-check">
                                    <input type="radio" name="publicacion" id="publicacion_si" value="si" class="form-check-input" {{ $documento->publicacion == 'si' ? 'checked' : '' }}>
                                    <label for="publicacion_si" class="form-check-label">Sí</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="publicacion" id="publicacion_no" value="no" class="form-check-input" {{ $documento->publicacion == 'no' ? 'checked' : '' }}>
                                    <label for="publicacion_no" class="form-check-label">No</label>
                                </div>
                            </div>
                        </div>

                        <div id="acuerdos-fields" class="document-fields" style="display: none;">
                            <div class="form-group">
                                <label for="numero">Número:</label>
                                <input type="number" name="numero" id="numero" class="form-control" value="{{ $documento->numero }}">
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha:</label>
                                <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $documento->fecha }}">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea name="descripcion" id="descripcion" class="form-control">{{ $documento->descripcion }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="codigo_bip">Código B.I.P:</label>
                                <textarea name="codigo_bip" id="codigo_bip" class="form-control">{{ $documento->codigo_bip }}</textarea>
                            </div>
                        </div>

                        <div id="resumengastos-fields" class="document-fields" style="display: none;">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $documento->nombre }}">
                            </div>
                        </div>

                        <div id="documentogeneral-fields" class="document-fields" style="display: none;">
                            <div class="form-group">
                                <label for="categoria">Categoría:</label>
                                <select name="categoria" id="categoria" class="form-control">
                                    <option value="">Seleccione Categoría</option>
                                    <option value="Documentos de Gestión" {{ $documento->categoria == 'Documentos de Gestión' ? 'selected' : '' }}>Documentos de Gestión</option>
                                    <option value="Estudios" {{ $documento->categoria == 'Estudios' ? 'selected' : '' }}>Estudios</option>
                                    <option value="Fondos Concursable" {{ $documento->categoria == 'Fondos Concursable' ? 'selected' : '' }}>Fondos Concursable</option>
                                    <option value="Leyes" {{ $documento->categoria == 'Leyes' ? 'selected' : '' }}>Leyes</option>
                                    <option value="Gestión" {{ $documento->categoria == 'Gestión' ? 'selected' : '' }}>Gestión</option>
                                    <option value="Comité de integración" {{ $documento->categoria == 'Comité de integración' ? 'selected' : '' }}>Comité de integración</option>
                                    <option value="Borde costero" {{ $documento->categoria == 'Borde costero' ? 'selected' : '' }}>Borde costero</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="titulo">Título:</label>
                                <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $documento->titulo }}">
                            </div>
                            <div class="form-group">
                                <label for="autor">Autor:</label>
                                <input type="text" name="autor" id="autor" class="form-control" value="{{ $documento->autor }}">
                            </div>
                            <div class="form-group">
                                <label for="sector">Sector:</label>
                                <select name="sector" id="sector" class="form-control">
                                    <option value="">Seleccione Sector</option>
                                    <option value="Trabajo" {{ $documento->sector == 'Trabajo' ? 'selected' : '' }}>Trabajo</option>
                                    <option value="MOP" {{ $documento->sector == 'MOP' ? 'selected' : '' }}>MOP</option>
                                    <option value="Agricultura" {{ $documento->sector == 'Agricultura' ? 'selected' : '' }}>Agricultura</option>
                                    <option value="Planificación" {{ $documento->sector == 'Planificación' ? 'selected' : '' }}>Planificación</option>
                                    <option value="Economía" {{ $documento->sector == 'Economía' ? 'selected' : '' }}>Economía</option>
                                    <option value="Transporte" {{ $documento->sector == 'Transporte' ? 'selected' : '' }}>Transporte</option>
                                    <option value="Otros" {{ $documento->sector == 'Otros' ? 'selected' : '' }}>Otros</option>
                                    <option value="Educación" {{ $documento->sector == 'Educación' ? 'selected' : '' }}>Educación</option>
                                    <option value="Vivienda" {{ $documento->sector == 'Vivienda' ? 'selected' : '' }}>Vivienda</option>
                                    <option value="Salud" {{ $documento->sector == 'Salud' ? 'selected' : '' }}>Salud</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sub_sector">Sub-Sector:</label>
                                <select name="sub_sector" id="sub_sector" class="form-control" value="{{ $documento->sub_sector }}">
                                    <!-- Opciones para el sub-sector -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="financiamiento">Financiamiento:</label>
                                <input type="text" name="financiamiento" id="financiamiento" class="form-control" value="{{ $documento->financiamiento }}">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea name="descripcion" id="descripcion" class="form-control">{{ $documento->descripcion }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="portada">Portada:</label>
                                <div class="form-check">
                                    <input type="radio" name="portada" id="portada_si" value="si" class="form-check-input" {{ $documento->portada == 'si' ? 'checked' : '' }}>
                                    <label for="portada_si" class="form-check-label">Sí</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="portada" id="portada_no" value="no" class="form-check-input" {{ $documento->portada == 'no' ? 'checked' : '' }}>
                                    <label for="portada_no" class="form-check-label">No</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="publicacion">Publicación:</label>
                                <div class="form-check">
                                    <input type="radio" name="publicacion" id="publicacion_si" value="si" class="form-check-input" {{ $documento->publicacion == 'si' ? 'checked' : '' }}>
                                    <label for="publicacion_si" class="form-check-label">Sí</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="publicacion" id="publicacion_no" value="no" class="form-check-input" {{ $documento->publicacion == 'no' ? 'checked' : '' }}>
                                    <label for="publicacion_no" class="form-check-label">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="archivo">Archivo:</label>
                            <input type="file" name="archivo" id="archivo" class="form-control">
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-success">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Función para mostrar u ocultar campos según el tipo de documento seleccionado
    function mostrarCamposPorTipoDocumento() {
        // Obtener el tipo de documento seleccionado
        var tipoDocumento = document.getElementById('tipo_documento').value;

        // Ocultar todos los campos específicos de documentos
        var documentFields = document.getElementsByClassName('document-fields');
        for (var i = 0; i < documentFields.length; i++) {
            documentFields[i].style.display = 'none';
        }

        // Mostrar los campos específicos del tipo de documento seleccionado
        document.getElementById(tipoDocumento.toLowerCase().replace(/\s/g, '-') + '-fields').style.display = 'block';
    }

    // Asociar la función al evento de cambio del tipo de documento
    document.getElementById('tipo_documento').addEventListener('change', mostrarCamposPorTipoDocumento);

    // Llamar a la función al cargar la página para manejar el caso cuando la página ya tiene un tipo de documento seleccionado
    mostrarCamposPorTipoDocumento();
</script>

<script>
    $(document).ready(function () {
        // Define las comunas por provincia
        const comunasPorProvincia = {
            Llanquihue: ["Puerto Montt", "Calbuco", "Maullín", "Frutillar", "Puerto Varas"],
            Osorno: ["Osorno", "San Pablo", "Purranque", "Río Negro", "Puerto Octay"],
            Chiloé: ["Castro", "Ancud", "Dalcahue", "Curaco de Vélez", "Quellón"],
            Palena: ["Chaitén", "Futaleufú", "Palena"]
        };

        // Al cambiar la provincia, actualiza las opciones de comuna
        $("#provincia").change(function () {
            const selectedProvincia = $(this).val();
            const comunas = comunasPorProvincia[selectedProvincia] || [];

            // Limpia y actualiza las opciones de comuna
            $("#comuna").empty();
            $.each(comunas, function (index, comuna) {
                $("#comuna").append('<option value="' + comuna + '">' + comuna + '</option>');
            });
        });

        // Define los subsectores para cada sector
        const subsectoresPorSector = {
            Transporte: ["Administracion transporte", "capacitacion transporte", "intersubsectorial transporte", "transporte aereo", "transporte caminero", "transporte ferroviario", "transporte marítimo, fluvial y lacustre", "transporte urbano, Vialidad peatonal", "Multisectorial"],
            Vivienda: ["Administracion vivienda", "capacitacion vivienda", "intersubsectorial vivienda", "solucion habitacional parcial o complementaria", "vivienda definitiva", "multisectorial"],
            Salud: ["Administracion salud", "Alta complejidad (N. Terciario)", "Baja complejidad (N. Primario)", "CAPACITACION SALUD", "INTERSUBSECTORIAL SALUD", "MEDIA COMPLEJIDAD (N. Secundario)", "Multisectorial"]
        };

        // Al cambiar el sector, actualiza los subsectores correspondientes
        $("#sector").change(function () {
            const selectedSector = $(this).val();
            const subsectores = subsectoresPorSector[selectedSector] || [];

            // Limpia y actualiza las opciones del sub_sector
            $("#sub_sector").empty();
            $.each(subsectores, function (index, subsector) {
                $("#sub_sector").append('<option value="' + subsector + '">' + subsector + '</option>');
            });
        });

        // Inicializa la selección de comuna y subsector si ya hay valores en el documento
        const initialProvincia = "{{ $documento->provincia }}";
        const initialComuna = "{{ $documento->comuna }}";
        const initialSector = "{{ $documento->sector }}";
        const initialSubSector = "{{ $documento->sub_sector }}";

        if (initialProvincia) {
            $("#provincia").val(initialProvincia).trigger('change');
            setTimeout(() => {
                $("#comuna").val(initialComuna);
            }, 100);
        }

        if (initialSector) {
            $("#sector").val(initialSector).trigger('change');
            setTimeout(() => {
                $("#sub_sector").val(initialSubSector);
            }, 100);
        }
    });
</script>

