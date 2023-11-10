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
            <div class="container principal mt-4 mb-4 pt-3 pb-3">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Detalles del Trámite</h1>
                    </div>
                     <!-- Formulario para la edicion del tramite -->
                     <form action="{{ route('tramites.update', ['tramite' => $tramite->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Campos para el nuevo trámite -->
                        <label class="style-label" for="tags">Tags o Comentario:</label>
                        <input class="form-control mt-2 mb-4" type="text" name="tags" value="{{ $tramite->tags }}">

                        <label class="style-label required" for="titulo">Título:</label>
                        <input class="form-control mt-2 mb-4" type="text" name="titulo" value="{{ $tramite->titulo }}">
                       
                        <label class="style-label mb-2" for="bajada">Bajada o Descripción:</label>
                        <textarea class="form-control mt-2 mt-5" id="editor" name="descripcion" value="">{!! $tramite->descripcion !!}</textarea>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <p class="style-label">Fecha Apertura:<input class="form-control" type="text" name="fecha_apertura" id="fecha_apertura_datepicker" value="{{ $tramite->fecha_apertura }}"></p>
                            </div>

                            <div class="col-md-6">
                                <p class="style-label">Fecha Cierre:<input class="form-control" type="text" name="fecha_cierre" id="fecha_cierre_datepicker" value="{{ $tramite->fecha_cierre }}"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="icono" class="style-label">Icono:</label>
                            <input type="file" class="form-control mt-2 mb-4" name="icono">
                            
                            @if($tramite->icono)
                                <p>Icono actual:</p>
                                <img src="{{ $tramite->icono }}" alt="Icono actual" style="max-width: 100px; max-height: 100px;">
                            @else
                                <p>No hay icono actual.</p>
                            @endif
                        </div>

                        <div class="container add-boton mt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="style-label" for="url">Nombre del botón externo:</label>
                                    <input class="form-control mt-2 mb-4" type="text" name="nombre_btn" placeholder="Nombre del botón externo" value="{{ $tramite['nombre_btn'] ?? '' }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="style-label" for="url">URL del botón externo:</label>
                                    <input class="form-control mt-2 mb-4" type="text" name="url" placeholder="URL del botón externo" value="{{ $tramite['url'] ?? '' }}">
                                </div>
                            </div>
                                <button type="button" id="agregarMas" class="btn btn-primary">Agregar Más</button>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="mi-h3 mt-4">Documentos Adjuntos</h3>
                                    @foreach ($tramite->documentos as $documento)
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="style-label mb-2" for="text">Nombre del Documento:</label>
                                                <p class="form-control">{{ $documento->nombre_documento }}</p>
                                            </div>
                                            <div class="col-md-6" style="align-self: center; margin-top: 16px;">
                                            <button type="button" class="btn btn-outline-danger">Eliminar</button>
                                                <!-- Agrega más detalles del documento según tu estructura de datos -->
                                            </div>
                                        </div>
                                    @endforeach
                                    <button type="button" class="btn btn-primary">Agregar mas documentos</button>
                                </div>
                            </div>
                        </div>

                            <!-- Campos para documentos individuales 
                                <div class="documentos-container mt-3">
                                    <div class="documentos-input">
                                        <label class="style-label" for="documentos_individuales">Documentos Individuales:</label>
                                        <input class="form-control mt-2 mb-4" type="file" name="ruta_documento[]" accept=".pdf, .doc, .docx" multiple>
                                        <input class="form-control mt-2 mb-2" type="text" name="nombre_documento[]" placeholder="Nombre del Documento" multiple>
                                    </div>
                                     Botón para agregar más documentos individuales 
                                    <button type="button" class="btn btn-primary agregar-documento-individual">Agregar Más</button>
                                </div>

                             Campos para archivos comprimidos 
                            <div class="documentos-container-comprimido mt-4">
                                <div class="documentos-input-comprimido">
                                    <label class="style-label" for="archivos_comprimidos">Archivos Comprimidos:</label>
                                    <input class="form-control mt-2 mb-4" type="file" name="ruta_comprimido[]" accept=".zip" multiple>
                                    <input class="form-control mt-2 mb-2" type="text" name="nombre_comprimido[]" placeholder="Nombre del Archivo Comprimido" multiple value="{{ $documento['nombre_comprimido'][0] ?? '' }}">
                                </div>
                                 Botón para agregar más archivos comprimidos 
                                <button type="button" class="btn btn-primary agregar-archivo-comprimido">Agregar Más</button>
                            </div> -->

                            <div class="container open-other-site mt-4">
                                <div class="row"> 
                                    <label class="style-label" for="url">URL por si quieres abrir otro sitio:</label>
                                    <input class="form-control mt-2 mb-4" type="text" name="url_single" placeholder="URL por si quieres abrir otro sitio" value="{{ $tramite['url_single'] ?? '' }}">
                                </div>
                            </div>
                        <button class=" mt-5 btn btn-success" type="submit">editar Trámite</button>
                    </form>
                    <div class="container mt-3 mb-4">
                        <a href="{{ route('tramites.index') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  $( function() {
    $("#fecha_apertura_datepicker").datepicker({
      dateFormat: "dd-mm-yy" // Por ejemplo, muestra la fecha en formato dd/mm/yy
    });
    $("#fecha_cierre_datepicker").datepicker({
      dateFormat: "dd-mm-yy" // Por ejemplo, muestra la fecha en formato dd/mm/yy
    });

  } );
</script>

<script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
</script>