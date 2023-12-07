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
                        <h1>Actualizar Autoridad</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                <form action="{{ route('AutoridadesRegionLagos.updateAutoridades', $articulo->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 tag-comentario">
                                    <div class="input-group mb-3">
                                        <input type="text" id="nombreA" name="nombre" class="form-control" placeholder="Nombre Completo" value="{{ $articulo->nombre }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="lugar_fecha_nacimiento" name="lugar_fecha_nacimiento" class="form-control" value="{{ $articulo->lugar_fecha_nacimiento }}"  placeholder="Fecha nacimiento" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="actividad_profesion" name="actividad_profesion" class="form-control" value="{{ $articulo->actividad_profesion }}"  placeholder="Actividad o profesion" required>
                                    </div>
                                </div>
                                <div class="col-md-4 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="partido_politico" name="partido_politico" class="form-control" value="{{ $articulo->partido_politico }}" placeholder="Partido o politico" required>
                                    </div>
                                </div>
                                <div class="col-md-4 tag-comentario">
                                    <div class="input-group mb-3">
                                        <input type="text" id="cargo" name="cargo" class="form-control" placeholder="Cargo" value="{{ $articulo->cargo }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="institucion" name="institucion" class="form-control"  value="{{ $articulo->institucion }}"  placeholder="Institucion" required>
                                    </div>
                                </div>
                                <div class="col-md-3 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="direccion" name="direccion" class="form-control"  value="{{ $articulo->direccion }}" placeholder="Direccion" required>
                                    </div>
                                </div>
                                <div class="col-md-3 tag-comentario">
                                    <div class="input-group mb-3">
                                        <input type="text" id="fono" name="fono" class="form-control" placeholder="Fono"  value="{{ $articulo->fono }}"  required>
                                    </div>
                                </div>
                                <div class="col-md-3 tag-comentario">
                                    <div class="input-group mb-3">
                                        <input type="text" id="fax" name="fax" class="form-control" placeholder="Fax"  value="{{ $articulo->fax }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="Email" name="Email" class="form-control" placeholder="Email"  value="{{ $articulo->Email }}"  required>
                                    </div>
                                </div>
                                <div class="col-md-3 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="region" name="region" class="form-control" placeholder="Region"  value="{{ $articulo->region }}"  required>
                                    </div>
                                </div>
                                <div class="col-md-3 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="provincia" name="provincia" class="form-control" placeholder="Provincia"  value="{{ $articulo->provincia }}"   required>
                                    </div>
                                </div>
                                
                                <div class="col-md-3 tag-comentario">
                                    <div class="input-group mb-3">
                                        <input type="text" id="comuna" name="comuna" class="form-control" placeholder="Comuna" value="{{ $articulo->comuna }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3 tag-comentario">
                                    <div class="input-group mb-3">
                                        <input type="text" id="web" name="web" class="form-control" placeholder="Web" value="{{ $articulo->web }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 pb-3">
                                        <div id="text">
                                            <div class="form-floating">
                                                <textarea name="biografia" class="form-control" placeholder="Biografia" id="biografia" style="height: 250px" required>{{ $articulo->biografia }}</textarea>
                                                <label class="style-label" for="floatingTextarea2 style-label">Biografia</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pt-0 pb-3">
                                        <div class="form-group">
                                            <div class="col-md-12 pb-3">
                                                <label for="imagen" class="form-label style-label">Imagen Actual:</label>
                                            </div>
                                                <img src="{{ asset('storage/' . $articulo->foto) }}" alt="Imagen Actual" width="250">
                                        </div>
                                        <div class="mb-3">
                                        <label for="formFile" class="form-label style-label">Selecciona la foto para cambiarla</label>
                                            <input class="form-control" type="file" name="foto" id="foto" accept="image/*" >
                                    </div>
                                    </div>
                                </div>
                            </div>
                        <div class="form-group">
                            
                        </div>
                        <button type="submit" class="btn btn-success" id="Enviar" name="Enviar">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
  $( function() {
    $("#lugar_fecha_nacimiento").datepicker({
      dateFormat: "dd-mm-yy" // Por ejemplo, muestra la fecha en formato dd/mm/yy
    });
  } );
</script>
