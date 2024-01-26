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
            <div class="container principal pt-3 pb-3">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Agregar galeria</h1>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="container first-form pt-2 pb-2">
                    <form action="{{ route('galerias.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- Campo para el nombre de la galería --}}
                        <div class="form-group mt-4 mb-4">
                            <label for="nombre" class="form-label style-label">Nombre de la Galería</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre de la Galería" required>
                        </div>

                        {{-- Contenedor para los campos de imágenes --}}
                        <div id="imagenes-container">
                            <div class="form-group imagen-field mb-4">
                                <label for="nombreImagenes0" class="form-label style-label">Nombre de la Imagen</label>
                                <input class="form-control mb-2" type="text" name="nombre_imagenes[]" id="nombreImagenes0" placeholder="Nombre de la imagen">

                                <label for="imagenes0" class="form-label style-label">Cargar Imágenes</label>
                                <input class="form-control mb-4" type="file" name="archivo[]" id="imagenes0" accept="image/*">

                                <button type="button" class="btn btn-danger remove-image">Eliminar</button>
                            </div>
                        </div>

                        {{-- Botón para añadir más campos de imágenes --}}
                        <button type="button" id="add-image" class="btn btn-secondary mt-2">Añadir más imágenes</button>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success mt-4">Guardar Galería</button>
                            </div>
                        </div>
                    </form>
                </div>
                <button onclick="window.location='{{ route('galerias.index') }}'" class="btn btn-secondary mt-4">Volver</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('add-image').addEventListener('click', function() {
        var container = document.getElementById('imagenes-container');
        var imageCount = container.querySelectorAll('.imagen-field').length;

        // Crear un nuevo div para los campos de imagen
        var newField = document.createElement('div');
        newField.className = 'form-group imagen-field mb-4';

        // Crear un campo de entrada para el nombre de la imagen
        var newInputNombre = document.createElement('input');
        newInputNombre.type = 'text';
        newInputNombre.name = 'nombre_imagenes[]';
        newInputNombre.className = 'form-control mb-2';
        newInputNombre.placeholder = 'Nombre de la imagen';
        newInputNombre.id = 'nombreImagenes' + imageCount;

        // Crear un campo de entrada para el archivo de la imagen
        var newInputArchivo = document.createElement('input');
        newInputArchivo.type = 'file';
        newInputArchivo.name = 'archivo[]';
        newInputArchivo.className = 'form-control';
        newInputArchivo.accept = 'image/*';
        newInputArchivo.id = 'imagenes' + imageCount;

        // Crear un botón para eliminar el campo de imagen
        var removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.className = 'btn btn-danger remove-image';
        removeButton.textContent = 'Eliminar';
        removeButton.addEventListener('click', function() {
            newField.remove();
        });

        // Añadir los nuevos campos y el botón al div
        newField.appendChild(newInputNombre);
        newField.appendChild(newInputArchivo);
        newField.appendChild(removeButton);

        // Añadir el nuevo div al contenedor
        container.appendChild(newField);
    });

    // Añadir evento de eliminación a los botones existentes
    document.querySelectorAll('.remove-image').forEach(function(button) {
        button.addEventListener('click', function() {
            button.parentElement.remove();
        });
    });
</script>
