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
                        <h1>Actualizar Inversión pública en la Región Fuente</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">

                <form action="{{ route('AntecedentesRegionLagos.updateAntecedentes', $articulo->id) }}" method="POST" enctype="multipart/form-data">
                
                @method('PUT')
                @csrf  
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="titulo" name="nombre" value="{{ $articulo->titulo }}" class="form-control" placeholder="Titulo seccion" required>
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
                                @foreach($actividadesC as $act)
                                    <div class="documentos-container col-md-12 mt-3">
                                        <div class="documentos-input col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="titulo" name="sector[]" value="{{ $act->sector }}" class="form-control" placeholder="Actividad Económica" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="inversionD" name="inversionD[]" value="{{ $act->inversionD }}" class="form-control" placeholder="Inversión $" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="inversionP" name="inversionP[]"  value="{{ $act->inversionP }}" class="form-control" placeholder="Inversión %" required>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="documentos-container1 col-md-12 mt-3">
                                        <div class="documentos-input col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="titulo" name="sector[]" class="form-control" placeholder="Sector" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="inversionD" name="inversionD[]" class="form-control" placeholder="Inversión $" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="inversionP" name="inversionP[]" class="form-control" placeholder="Inversión %" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 title">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="titulo" name="fuente" class="form-control" placeholder="Fuente" value="{{ $articulo->fuente }}"  required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 tag-comentario">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="tag_comentario" name="descripcion" class="form-control" placeholder="Descripción"  value="{{ $articulo->descripcion }}" required>
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