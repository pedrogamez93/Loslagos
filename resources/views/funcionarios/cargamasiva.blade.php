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
    h1, h2 {
        color: #565656;
    }
    .principal {
        border: 1px solid #CCCCCC;
        border-radius: 10px;       
    }
    .first-form {
        border: 1px solid #CCCCCC;
        border-radius: 10px;
    }
    input.form-control {
        color: #565656;
        font-size: 16px;
        font-weight: 700;
        font-style: italic;
    }
    .style-label, p.style-label {
        color: #565656;
        font-size: 16px;
        font-weight: 700;
    }
    .style-col-menu {
        background-color: #0c1e35;
    }
    button.btn.btn-link {
        color: #FFFFFF;
        text-decoration: none;
        font-family: unset;
        font-weight: 700;
    }
    li.style-li {
        list-style: none;
        padding-bottom: 10px;
    }
    a.style-a-menu {
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
                        <h1>Carga masiva de funcionarios</h1>
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
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
                    <form action="{{ url('/funcionarios/cargamasiva') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="archivo" class="form-label">Seleccione un archivo CSV:</label>
                            <input type="file" class="form-control" id="csv_file" name="csv_file" accept=".csv" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Subir Archivo</button>
                    </form>

                    <div class="row">
                        <div class="col">
                            <label class="form-label">Descargar planilla de ejemplo</label>
                            <a href="{{ route('descargar.planilla') }}" class="btn btn-info" style="color:white">Descarga</a>
                        </div>
                    </div>
                </div>

                <!-- Tabla para mostrar el contenido del archivo CSV -->
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Vista previa del archivo CSV:</h2>
                            <table class="table table-bordered" id="csv_preview">
                                <thead>
                                    <tr id="csv_header"></tr>
                                </thead>
                                <tbody id="csv_body"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('csv_file').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function(e) {
            const text = e.target.result;
            const rows = text.split('\n');

            const header = rows[0].split(',');
            const headerRow = document.getElementById('csv_header');
            headerRow.innerHTML = '';
            header.forEach(col => {
                const th = document.createElement('th');
                th.textContent = col.trim();
                headerRow.appendChild(th);
            });

            const body = document.getElementById('csv_body');
            body.innerHTML = '';
            rows.slice(1).forEach(row => {
                if (row.trim() === '') return;
                const cols = row.split(',');
                const tr = document.createElement('tr');
                cols.forEach(col => {
                    const td = document.createElement('td');
                    td.textContent = col.trim();
                    tr.appendChild(td);
                });
                body.appendChild(tr);
            });
        };

        reader.readAsText(file);
    });
</script>
