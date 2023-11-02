<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<div class="container principal pt-3 pb-3">
    <div class="row">
        <div class="col-md-12">
            <h1>Actualizar Introduccion Region de los Lagos</h1>
        </div>
    </div>
    <div class="container first-form pt-2 pb-2">

    <form action="{{ route('AntecedentesRegionLagos.updateAntecedentes', $Introduccion->id) }}" method="POST" enctype="multipart/form-data">
    
    @method('PUT')
    @csrf  
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 tag-comentario">
                        <div class="input-group mb-3">
                            <input type="text" id="tag_comentario" name="subtitulo" class="form-control" placeholder="Tag o comentario" value="{{ $Introduccion->subtitulo }}" required>
                        </div>
                    </div>
                    <div class="col-md-6 title">
                        <div class="input-group mb-3">
                            <input type="text" id="titulo" name="nombreseccion" class="form-control" placeholder="Titulo seccion" value="{{ $Introduccion->nombreseccion }}"  required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12 pb-3">
                        <div id="text">
                            <div class="form-floating">
                                <textarea name="descripcion" class="form-control" placeholder="Escribe tu contenido aquí" id="bajada" style="height: 250px" required>{{ $Introduccion->descripcion }}</textarea>
                                <label class="style-label" for="floatingTextarea2 style-label">Bajada de la introducción</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12 pb-3">
                    <div class="col-md-12 pb-3">
                        <label for="imagen">Imagen Actual:</label>
                        </div>
                        <img src="{{ asset('storage/' . $Introduccion->imagen) }}" alt="Imagen Actual">
                    </div>
                </div>
            <div class="form-group">
                <div class="col-md-12 pt-3 pb-3">
                    <div class="mb-3">
                        <label for="formFile" class="form-label style-label">Selecciona una imagen para la sección</label>
                            <input class="form-control" type="file" name="imagen" id="img" accept="image/*" >
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success" id="Enviar" name="Enviar">Actializar</button>
        </form>
    </div>
</div>