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
    .style-label mt-4, p.style-label mt-4{
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
                        <h1>Formulario creacion funcionario</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <h1></h1> 
                        </div>
                    </div>
                    <!-- Formulario para la creación de un nuevo trámite -->
                    <form action="{{ url('/funcionarios ') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label class="style-label mt-4 required" for="titulo">Nombre:</label>
            <input class="form-control mt-2" type="text" name="nombre" placeholder="Nombre" required>
                       
            <select class="form-select mt-4" aria-label="Default select example" name="actividad">
                <option selected>Actividad o Profesión</option>
                <option value="Categoria 1">Categoria 1</option>
                <option value="Categoria 2">Categoria 2</option>
                <option value="Categoria 3">Categoria 3</option>
            </select>

            <select class="form-select mt-4" aria-label="Default select example" name="division" id="division">
            <option value="" disabled selected>Seleccione División</option>
            @foreach ($divisiones as $division)
                <option value="{{ $division }}">{{ $division }}</option>
                @endforeach
            </select>

            <select class="form-select mt-4" aria-label="Default select example" id="departamento" name="departamento" >
            <option value="" disabled selected>Seleccione Departamento</option>
            </select>

            <select class="form-select mt-4" aria-label="Default select example" name="cargo">
                <option selected>Cargo</option>
                <option value="Categoria 1">Categoria 1</option>
                <option value="Categoria 2">Categoria 2</option>
                <option value="Categoria 3">Categoria 3</option>
            </select>

            <label class="style-label mt-4 required" for="titulo">Direccion:</label>
            <input class="form-control mt-2" type="text" name="direccion" placeholder="direccion" required>

            <label class="style-label mt-4 required" for="titulo">Telefono:</label>
            <input class="form-control mt-2" type="text" name="telefono" placeholder="telefono" required>

            <label class="style-label mt-4 required" for="titulo">Email:</label>
            <input class="form-control mt-2" type="text" name="e-mail" placeholder="Email" required>


            <select class="form-select mt-4" aria-label="Default select example" name="region">
                <option selected>Región</option>
                <option value="Categoria 1">Categoria 1</option>
                <option value="Categoria 2">Categoria 2</option>
                <option value="Categoria 3">Categoria 3</option>
            </select>

            <select class="form-select mt-4" aria-label="Default select example" name="provincia">
                <option selected>Provincia</option>
                <option value="Categoria 1">Categoria 1</option>
                <option value="Categoria 2">Categoria 2</option>
                <option value="Categoria 3">Categoria 3</option>
            </select>

            <select class="form-select mt-4" aria-label="Default select example" name="comuna">
                <option selected>Comuna</option>
                <option value="Categoria 1">Categoria 1</option>
                <option value="Categoria 2">Categoria 2</option>
                <option value="Categoria 3">Categoria 3</option>
            </select>

            <div class="mb-3 mt-4">
                <label for="formFile" class="form-label">Suba aquí la fo correspondiente</label>
                <input class="form-control" type="file" name="foto"  id="foto">
            </div>

            <button class=" mt-5 btn btn-success" type="submit">Guardar</button>
        </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // En tu script JavaScript
    document.addEventListener('DOMContentLoaded', function () {
        var divisionSelect = document.getElementById('division');
        var departamentoSelect = document.getElementById('departamento');

        divisionSelect.addEventListener('change', function () {
            var selectedDivision = this.value;
            var departamentos = <?php echo json_encode($departamentos); ?>;

            // Limpiar opciones anteriores
            departamentoSelect.innerHTML = '<option value="" disabled selected>Seleccione Departamento</option>';

            // Agregar nuevas opciones
            if (departamentos[selectedDivision]) {
                departamentos[selectedDivision].forEach(function (departamento) {
                    var option = document.createElement('option');
                    option.value = departamento;
                    option.text = departamento;
                    departamentoSelect.add(option);
                });
                departamentoSelect.disabled = false; // Habilitar el segundo select
            } else {
                departamentoSelect.disabled = true; // Deshabilitar si no hay departamentos
            }
        });
    });
</script>
