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
                <h1>Lista de Documentos</h1>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Formulario de Filtros -->
                <form method="GET" action="{{ route('documentos.index') }}" class="mb-4">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                            <select name="tipo_documento" id="tipo_documento" class="form-control">
                                <option value="">Todos</option>
                                <option value="Actas" {{ request('tipo_documento') == 'Actas' ? 'selected' : '' }}>Actas</option>
                                <option value="Acuerdos" {{ request('tipo_documento') == 'Acuerdos' ? 'selected' : '' }}>Acuerdos</option>
                                <option value="Resumengastos" {{ request('tipo_documento') == 'Resumengastos' ? 'selected' : '' }}>Resumen de Gastos</option>
                                <option value="Documentogeneral" {{ request('tipo_documento') == 'Documentogeneral' ? 'selected' : '' }}>Documento General</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="tema" class="form-label">Tema</label>
                            <input type="text" name="tema" id="tema" class="form-control" value="{{ request('tema') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="lugar" class="form-label">Lugar</label>
                            <input type="text" name="lugar" id="lugar" class="form-control" value="{{ request('lugar') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="fecha_creacion" class="form-label">Fecha de Creación</label>
                            <input type="date" name="fecha_creacion" id="fecha_creacion" class="form-control" value="{{ request('fecha_creacion') }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Filtrar</button>
                            <a href="{{ route('documentos.index') }}" class="btn btn-secondary">Limpiar</a>
                        </div>
                    </div>
                </form>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo de documento</th>
                            <th>Tema</th>
                            <th>Lugar</th>
                            <th>Fecha de creación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($documentos as $documento)
                            <tr>
                                <td>{{ $documento->id }}</td>
                                <td>{{ $documento->tipo_documento }}</td>
                                <td>{{ $documento->tema }}</td>
                                <td>{{ $documento->lugar }}</td>
                                <td>{{ $documento->created_at }}</td>
                                <td>
                                    <a href="{{ url('storage/documentos/' . basename($documento->archivo)) }}" class="btn btn-primary" download>Descargar</a>
                                    <a href="{{ route('documentos.edit', ['id' => $documento->id]) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('documentos.destroy', ['documento' => $documento->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $documentos->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

