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
                        <h1>Formulario creación de documentos</h1>
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
                    <!-- Formulario para la creación de un nuevo trámite -->
                    <form method="POST" action="{{ route('documentos.store') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- Campo para seleccionar el tipo de documento --}}
                        <div class="form-group">
                            <label for="tipo_documento">Tipo de Documento:</label>
                            <select name="tipo_documento" id="tipo_documento" class="form-control" required>
                                <option value="Acta">Acta</option>
                                <option value="Acuerdo">Acuerdo</option>
                                <option value="ResumenGasto">Resumen de Gasto</option>
                                <option value="DocumentoGeneral">Documento General</option>
                            </select>
                        </div>

                        {{-- Campos específicos para Acta --}}
                        <div id="acta-fields" class="document-fields" style="display: none;">
                            <div class="form-group">
                                <label for="provincia">Provincia:</label>
                                <select name="provincia" id="provincia" class="form-control">
                                    <option value="Llanquihue">Llanquihue</option>
                                    <option value="Osorno">Osorno</option>
                                    <option value="Chiloé">Chiloé</option>
                                    <option value="Palena">Palena</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="comuna">Comuna:</label>
                                <select name="comuna" id="comuna" class="form-control">
                                    {{-- Opciones para la comuna --}}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tema">Tema:</label>
                                <input type="text" name="tema" id="tema" class="form-control">
                            </div>
                            <!-- Agrega los demás campos de Acta según tu especificación -->

                            <div class="form-group">
                                <label for="fecha_hora">Fecha y Hora:</label>
                                <input type="datetime-local" name="fecha_hora" id="fecha_hora" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="lugar">Lugar:</label>
                                <input type="text" name="lugar" id="lugar" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="numero_sesion">Número de Sesión:</label>
                                <input type="number" name="numero_sesion" id="numero_sesion" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="fecha_hora_sesion">Fecha y Hora de Sesión:</label>
                                <input type="datetime-local" name="fecha_hora_sesion" id="fecha_hora_sesion" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="portada">Portada:</label>
                                <div class="form-check">
                                    <input type="radio" name="portada" id="portada_si" value="si" class="form-check-input">
                                    <label for="portada_si" class="form-check-label">Sí</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="portada" id="portada_no" value="no" class="form-check-input">
                                    <label for="portada_no" class="form-check-label">No</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="publicacion">Publicación:</label>
                                <div class="form-check">
                                    <input type="radio" name="publicacion" id="publicacion_si" value="si" class="form-check-input">
                                    <label for="publicacion_si" class="form-check-label">Sí</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="publicacion" id="publicacion_no" value="no" class="form-check-input">
                                    <label for="publicacion_no" class="form-check-label">No</label>
                                </div>
                            </div>
                        </div>

                        {{-- Campos específicos para Acuerdo --}}
                        <div id="acuerdo-fields" class="document-fields" style="display: none;">
                            <div class="form-group">
                                <label for="numero">Número:</label>
                                <input type="number" name="numero" id="numero" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha:</label>
                                <input type="date" name="fecha" id="fecha" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="codigo_bip">Codigo B.I.P:</label>
                                <textarea name="codigo_bip" id="codigo_bip" class="form-control"></textarea>
                            </div>
                            <!-- Agrega los demás campos de Acuerdo según tu especificación -->
                        </div>

                        {{-- Campos específicos para Resumen de Gasto --}}
                        <div id="resumengasto-fields" class="document-fields" style="display: none;">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control">
                            </div>
                            <!-- Agrega los demás campos de Resumen de Gasto según tu especificación -->
                        </div>

                        {{-- Campos específicos para Documento General --}}
                        <div id="documentogeneral-fields" class="document-fields" style="display: none;">
                            <div class="form-group">
                                <label for="categoria">Categoría:</label>
                                <select name="categoria" id="categoria" class="form-control">
    <option value="">Seleccione Categoría</option>
    <option value="Documentos de Gestión">Documentos de Gestión</option>
    <option value="Estudios">Estudios</option>
    <option value="Fondos Concursable">Fondos Concursable</option>
    <option value="Leyes">Leyes</option>
    <option value="Gestión">Gestión</option>
    <option value="Comité de integración">Comité de integración</option>
    <option value="Bode costero">Bode costero</option>
    <option value="C.R.U.B.C">C.R.U.B.C</option>
    <option value="Controles SSI">Controles SSI</option>
    <option value="Estado Situacion FNDR">Estado Situacion FNDR</option>
    <option value="Informe Ejecucion PROPIR">Informe Ejecucion PROPIR</option>
    <option value="Informe Gastos Ley 21.516">Informe Gastos Ley 21.516</option>
    <option value="Plan Regulador Comunal">Plan Regulador Comunal</option>
    <option value="Presupuesto">Presupuesto</option>
    <option value="Receptores Fondos Publicos Ley 19.62">Receptores Fondos Publicos Ley 19.62</option>
    <option value="Unidad de Control">Unidad de Control</option>
    <option value="Cuenta Pública Regional">Cuenta Pública Regional</option>
    <option value="Estrategia Regional de Desarrollo 2030">Estrategia Regional de Desarrollo 2030</option>
    <option value="Estado Financieros Gobierno Regional de Los Lagos">Estado Financieros Gobierno Regional de Los Lagos</option>
    <option value="Boletin Informativo">Boletin Informativo</option>
    <option value="Difusion Proyectos FNDR y Normativa Grafica GORE">Difusion Proyectos FNDR y Normativa Grafica GORE</option>
    <option value="Estrategia, Politica y Planes Regionales">Estrategia, Politica y Planes Regionales</option>
    <option value="Convenios Internacionales">Convenios Internacionales</option>
    <option value="Documentos de Consulta GORE LOS LAGOS">Documentos de Consulta GORE LOS LAGOS</option>
</select>

                            </div>
                            <div class="form-group">
                                <label for="titulo">Título:</label>
                                <input type="text" name="titulo" id="titulo" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="autor">Autor:</label>
                                <input type="text" name="autor" id="autor" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="sector">Sector:</label>
                                <select name="sector" id="sector" class="form-control">
                                    <option value="">Seleccione Sector</option>
                                    <option value="Trabajo">Trabajo</option>
                                    <option value="MOP">MOP</option>
                                    <option value="Agricultura">Agricultura</option>
                                    <option value="Planificación">Planificación</option>
                                    <option value="Economía">Economía</option>
                                    <option value="Transporte">Transporte</option>
                                    <option value="Otros">Otros</option>
                                    <option value="Educación">Educación</option>
                                    <option value="Vivienda">Vivienda</option>
                                    <option value="Salud">Salud</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sub_sector">Sub-Sector:</label>
                                <select name="sub_sector" id="sub_sector" class="form-control"></select>
                            </div>
                            <div class="form-group">
                                <label for="financiamiento">Financiamiento:</label>
                                <input type="text" name="financiamiento" id="financiamiento" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="fecha_hora">Fecha y Hora:</label>
                                <input type="datetime-local" name="fecha_hora" id="fecha_hora" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="portada">Portada:</label>
                                <div class="form-check">
                                    <input type="radio" name="portada" id="portada_si" value="si" class="form-check-input">
                                    <label for="portada_si" class="form-check-label">Sí</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="portada" id="portada_no" value="no" class="form-check-input">
                                    <label for="portada_no" class="form-check-label">No</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="publicacion">Publicación:</label>
                                <div class="form-check">
                                    <input type="radio" name="publicacion" id="publicacion_si" value="si" class="form-check-input">
                                    <label for="publicacion_si" class="form-check-label">Sí</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="publicacion" id="publicacion_no" value="no" class="form-check-input">
                                    <label for="publicacion_no" class="form-check-label">No</label>
                                </div>
                            </div>
                        </div>

                        {{-- Campos comunes a todos los tipos de documentos --}}
                        <div class="form-group mt-3">
                            <input type="file" name="archivo" id="archivo" class="form-control">
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Guardar Documento</button>
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
        const initialProvincia = "{{ old('provincia') }}";
        const initialComuna = "{{ old('comuna') }}";
        const initialSector = "{{ old('sector') }}";
        const initialSubSector = "{{ old('sub_sector') }}";

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


