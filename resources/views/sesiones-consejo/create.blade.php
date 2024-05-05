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
<div class="container-fluid body" onload="formatDateOnInit()">
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
                        <h1>Formulario Tabla de Sesiones Consejo Regional de Los Lagos</h1>
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
<form action="{{ route('sesionesConsejo.store') }}" method="post" enctype="multipart/form-data">
    @csrf <!-- Token CSRF para la seguridad en Laravel -->

    <!-- Campo para el nombre de la sesión -->
    <div class="mb-3">
        <label for="nombreSesion" class="form-label">Nombre de la Sesión</label>
        <input type="text" class="form-control" id="nombreSesion" name="nombre" required>
    </div>

    <!-- Campo para la fecha y hora -->
    <div class="mb-3">
        <label for="fechaHora" class="form-label">Fecha y Hora</label>
        <input type="datetime-local" class="form-control" id="fechaHora" name="fecha_hora" required>
    </div>

    <!-- Campo para el lugar -->
    <div class="mb-3">
        <label for="lugar" class="form-label">Lugar</label>
        <input type="text" class="form-control" id="lugar" name="lugar" required>
    </div>

    <div id="documentos-container">
        <!-- Campo para subir documentos -->
        <div class="mb-3">
            <label for="documento0" class="form-label mb-2">Nombre Documento</label>
            <input type="text" class="form-control mt-2 mb-2" id="nombredoc" name="nombredoc[]">
            <input type="file" class="form-control" id="documento0" name="url[]">
            <div class="mb-3">
                <label for="fechaHoradoc" class="form-label mt-2">Fecha y Hora del documento</label>
                <input type="datetime-local" class="form-control mt-2" id="fechaHoradoc" name="fechadoc[]">
            </div>
        </div>
    </div>

    <!-- Botón para agregar más documentos -->
    <div class="mb-3">
        <button type="button" id="add-document" class="btn btn-info mb-3">Agregar Otro Documento</button>
    </div>
    <!-- Botón para enviar el formulario -->
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>


<script>
    let documentCounter = 1;
    document.getElementById('add-document').addEventListener('click', function() {
        const newField = document.createElement('div');
        newField.classList.add('mb-3');
        newField.innerHTML = `
            <label for="documento${documentCounter}" class="form-label">Documento ${documentCounter + 1}</label>
            <input type="text" class="form-control mb-2" id="nombredoc${documentCounter}" name="nombredoc[]">
            <input type="file" class="form-control" id="documento${documentCounter}" name="documento[]">
            <input type="datetime-local" class="form-control" id="fechadoc${documentCounter}" name="fechadoc[]">
        `;
        document.getElementById('documentos-container').appendChild(newField);
        documentCounter++;
    });
</script>

</div>
            </div>
        </div>
    </div>
</div>


