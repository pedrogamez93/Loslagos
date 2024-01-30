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
                        <h1>Formulario subida de documentos de sesion</h1>
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
{{-- Asegúrate de que la ruta del action y el método sean correctos --}}
<form action="{{ route('sesiones.update', $sesion->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

   

    {{-- Campos para documentos existentes --}}
    <h3>Documentos Actuales</h3>

    {{-- Campo para editar el nombre de la sesión --}}
    <div class="mb-3">
        <label for="nombreSesion" class="form-label">Nombre de la Sesión</label>
        <input type="text" class="form-control" id="nombreSesion" name="nombre" value="{{ $sesion->nombre }}" required>
    </div>

    {{-- Campo para editar la fecha y hora --}}
    <div class="mb-3">
        <label for="fechaHora" class="form-label">Fecha y Hora</label>
        {{-- Asegúrate de formatear la fecha y hora al estándar correcto para input datetime-local --}}
        <input type="datetime-local" class="form-control" id="fechaHora" name="fecha_hora" value="{{ \Carbon\Carbon::parse($sesion->fecha_hora)->format('Y-m-d\TH:i') }}" required>
    </div>

    {{-- Campo para editar el lugar --}}
    <div class="mb-3">
        <label for="lugar" class="form-label">Lugar</label>
        <input type="text" class="form-control" id="lugar" name="lugar" value="{{ $sesion->lugar }}" required>
    </div>

    @foreach ($sesion->documentos as $documento)
        <div>
            <a href="{{ Storage::url($documento->url) }}">{{ $documento->nombre }}</a>
            <input type="checkbox" name="documentos_eliminados[]" value="{{ $documento->id }}"> Marcar para eliminar
        </div>
    @endforeach

    {{-- Campo para agregar nuevos documentos --}}
    <h3>Agregar Nuevos Documentos</h3>
    <input type="file" name="nuevos_documentos[]" multiple>

    {{-- Los campos para los documentos existen aquí como en el ejemplo anterior --}}

    <button type="submit" class="btn btn-primary">Actualizar Sesión</button>
</form>
<script>
    let documentCounter = 1;
    document.getElementById('add-document').addEventListener('click', function() {
        const newField = document.createElement('div');
        newField.classList.add('mb-3');
        newField.innerHTML = `
            <label for="documento${documentCounter}" class="form-label">Documento ${documentCounter + 1}</label>
            <input type="file" class="form-control" id="documento${documentCounter}" name="documento[]">
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

