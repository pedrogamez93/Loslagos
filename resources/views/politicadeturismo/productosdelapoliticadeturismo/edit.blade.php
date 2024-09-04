<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
    .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline.ck-blurred {
    height: 350px;
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
                        <h1>Actualizar Productos de la Política de Turismo
</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">

                <form action="{{ route('ProductosdelaPoliticadeTurismo.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')        
                @csrf
                <div class="row">
                    <div class="col-md-12 title">
                        <div class="input-group mb-3">
                            <input type="text" id="tituloA" name="tituloA"  value="{{ $producto->titulo }}" class="form-control" placeholder="Nombre seccion" required>
                            <input type="hidden" id="idPrincipal" name="idPrincipal"  value="{{ $producto->id }}" class="form-control" placeholder="Nombre seccion" required>
                        </div>
                    </div>
                    
                </div>
               @foreach ($items as $item)
            <div class="form-group">
                                <div class="row">
                                    <div class="documentos-container1 col-md-12 mt-3">
                                        <div class="documentos-input col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 title">
                                                <div class="input-group mb-3">
                                                    <input type="hidden" id="titulo" name="titulo[]"  value="hidden" class="form-control"  placeholder="Titulo seccion" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="nombreA" name="nombreA[]"  value="{{ $item->nombre }}" class="form-control" placeholder="Nombre del archivo" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                <a href="{{ route('ProductosdelaPoliticadeTurismo.download', ['id' => $item->id]) }}">Ver Documento</a>
                                                </div>
                                                <!--<div class="input-group mb-3">
                                                <input type="file" id="archivo" name="archivo[]" class="form-control" placeholder="Cargar archivo" >
                                                </div>-->
                                            </div>
                                            
                                        </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 pt-3 pb-3" style="text-align: end;">
                                        <a href="{{ route('ProductosdelaPoliticadeTurismoItems.destroy', $item->id) }}" class="btn btn-danger agregar-documento" id="agregarCampo">Eliminar</a>
                                    </div>
                                    
                                </div>
                            </div>
                
            @endforeach
                        <div class="form-group">
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="documentos-container col-md-12 mt-3">
                                        <div class="documentos-input col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 title">
                                                <div class="input-group mb-3">
                                                    <input type="hidden" id="titulo" name="titulo[]" class="form-control" value="hidden"  placeholder="Titulo seccion" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="nombreA" name="nombreA[]" class="form-control" placeholder="Nombre del archivo" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="file" id="archivo" name="archivo[]" class="form-control" placeholder="Cargar archivo" >
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 pt-3 pb-3" style="text-align: end;">
                                        <button type="button" class="btn btn-success agregar-documento" id="agregarCampo">Agregar más campos</button>
                                    </div>
                                    
                                </div>
                            </div>

                        <button type="submit" class="btn btn-success" id="Enviar" name="Enviar">Guardar</button>
                    
                    </form>
                </div>
            </div>
</div>

<script>
    $(document).ready(function() {
        // Agregar más documentos
        $(".agregar-documento").click(function() {
            var documentosContainer = $(".documentos-container");
            var nuevoDocumentoInput = documentosContainer.find(".documentos-input:first").clone(); // Clona el primer conjunto de campos

            // Limpia los valores en los campos clonados
            nuevoDocumentoInput.find("input[type='file']").val('');
            nuevoDocumentoInput.find("input[type='text']").val('');

            // Genera un nuevo nombre único para cada campo clonado
            var nuevoId = Date.now(); // Utiliza la marca de tiempo actual como identificador único
            
           
            // Agrega un botón de eliminar a la fila clonada
            var botonEliminar = $('<button/>', {
                text: 'Eliminar',
                class: 'btn btn-danger eliminar-documento',
                type: 'button',
                click: function() {
                    // Elimina la fila cuando se hace clic en el botón de eliminar
                    $(this).closest('.documentos-input').remove();
                }
            });

            // Agrega el botón de eliminar a la fila clonada
            nuevoDocumentoInput.append($('<div/>', {
                class: 'col-md-12 text-right mt-2 mb-2'
            }).append(botonEliminar));

            // Agrega los campos clonados al contenedor
            documentosContainer.append(nuevoDocumentoInput);
        });

        // Evento para eliminar filas existentes (manejador delegado)
        $(document).on('click', '.eliminar-documento', function() {
            $(this).closest('.documentos-input').remove();
        });
    });
</script>
<script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                allowedContent: true
            })
            .catch(error => {
                console.error(error);
            });
</script>