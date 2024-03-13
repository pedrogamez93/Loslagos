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
                        <h1>Actualizar Financiamiento por Provincias</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">

                <form action="{{ route('FinanciamientoporProvincias.update', $articulo->id) }}" method="POST" enctype="multipart/form-data">
                
                @method('PUT')
                @csrf  
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="titulo" name="titulo" value="{{ $articulo->titulo }}" class="form-control" placeholder="Título sección" required>
                                    </div>
                                </div>
                                <div class="col-md-6 tag-comentario">
                                    <div class="input-group mb-3">
                                        <input type="text" id="tag_comentario" name="periodo"  value="{{ $articulo->periodo }}" class="form-control" placeholder="Periodo" value="" required>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="documentos-container col-md-12 mt-3">
                                        <div class="documentos-input col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <b>Provincia Llanquihue</b>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="hombres" value="{{ $articulo->provinciaInversionLD }}" name="provinciaInversionLD" class="form-control" placeholder="Inversión $" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="mujeres" value="{{ $articulo->provinciaInversionLP }}" name="provinciaInversionLP" class="form-control" placeholder="Inversión %" required>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="documentos-container col-md-12 mt-3">
                                        <div class="documentos-input col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <b>Provincia Chiloe</b>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="hombres" value="{{ $articulo->provinciaInversionCD }}" name="provinciaInversionCD" class="form-control" placeholder="Inversión $" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="mujeres" value="{{ $articulo->provinciaInversionCP }}" name="provinciaInversionCP" class="form-control" placeholder="Inversión %" required>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="documentos-container col-md-12 mt-3">
                                        <div class="documentos-input col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <b>Provincia Osorno</b>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="hombres" value="{{ $articulo->provinciaInversionOD }}" name="provinciaInversionOD" class="form-control" placeholder="Inversión $" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="mujeres" value="{{ $articulo->provinciaInversionOP }}"  name="provinciaInversionOP" class="form-control" placeholder="Inversión %" required>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="documentos-container col-md-12 mt-3">
                                        <div class="documentos-input col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <b>Provincia Palena</b>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="hombres" value="{{ $articulo->provinciaInversionPD }}" name="provinciaInversionPD" class="form-control" placeholder="Inversión $" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="mujeres" value="{{ $articulo->provinciaInversionPP }}" name="provinciaInversionPP" class="form-control" placeholder="Inversión %" required>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="documentos-container col-md-12 mt-3">
                                        <div class="documentos-input col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <b>Regional</b>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="hombres" value="{{ $articulo->provinciaInversionRD }}"  name="provinciaInversionRD" class="form-control" placeholder="Inversión $" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="mujeres" value="{{ $articulo->provinciaInversionRP }}" name="provinciaInversionRP" class="form-control" placeholder="Inversión %" required>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="documentos-container col-md-12 mt-3">
                                        <div class="documentos-input col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="hombres" value="{{ $articulo->fuente }}" name="fuente" class="form-control" placeholder="Fuente" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="mujeres" value="{{ $articulo->descripcion }}" name="descripcion" class="form-control" placeholder="Descripción" required>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
  
                        <button type="submit" class="btn btn-success" id="Enviar" name="Enviar">Actializar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Agregar más documentos
        $(".agregar-documento").click(function() {
            var documentosContainer = $(".documentos-container1");
            var nuevoDocumentoInput = documentosContainer.find(".documentos-input:first").clone(); // Clona el primer conjunto de campos

            // Limpia los valores en los campos clonados
            nuevoDocumentoInput.find("input[type='text']").val('');
            nuevoDocumentoInput.find("input[type='text']").val('');
            nuevoDocumentoInput.find("input[type='text']").val('');


            // Agrega los campos clonados al contenedor
            documentosContainer.append(nuevoDocumentoInput);
        });
    });
</script>
actividadesC