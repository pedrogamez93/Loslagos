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
                        <h1>Actualizar Exportación Según Rama Actividad</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                <form action="{{ route('ExportacionSegunRamaActividad.update', $articulo->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 provincia">
                                    <div class="input-group mb-3">
                                        <input type="text" id="titulo" name="titulo" class="form-control" value="{{ $articulo->titulo }}" placeholder="Título" required>
                                    </div>
                                </div>
                                <div class="col-md-6 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="subtitulo" name="subtitulo" class="form-control" value="{{ $articulo->subtitulo }}" placeholder="Subtítulo" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 provincia">
                                    <div class="input-group mb-3">
                                        <input type="text" id="descripcion1" name="descripcion1" class="form-control" value="{{ $articulo->descripcion1 }}" placeholder="Descripción 1" required>
                                    </div>
                                </div>
                                <div class="col-md-3 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="valor1" name="valor1" class="form-control" value="{{ $articulo->valor1 }}" placeholder="valor 1" required>
                                    </div>
                                </div>
                                <div class="col-md-3 provincia">
                                    <div class="input-group mb-3">
                                        <input type="text" id="actividad1" name="actividad1" class="form-control" value="{{ $articulo->actividad1 }}" placeholder="Actividad 1" required>
                                    </div>
                                </div>
                                <div class="col-md-3 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="valoractividad1" name="valoractividad1" class="form-control" value="{{ $articulo->valoractividad1 }}" placeholder="Valor Actividad 1" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 provincia">
                                    <div class="input-group mb-3">
                                        <input type="text" id="actividad2" name="actividad2" class="form-control" value="{{ $articulo->actividad2 }}" placeholder="Actividad 2" required>
                                    </div>
                                </div>
                                <div class="col-md-3 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="valoractividad2" name="valoractividad2" class="form-control" value="{{ $articulo->valoractividad2 }}" placeholder="Valor Actividad 2" required>
                                    </div>
                                </div>
                                <div class="col-md-3 provincia">
                                    <div class="input-group mb-3">
                                        <input type="text" id="actividad3" name="actividad3" class="form-control" value="{{ $articulo->actividad3 }}" placeholder="Actividad 3" required>
                                    </div>
                                </div>
                                <div class="col-md-3 title">
                                    <div class="input-group mb-3">
                                    <input type="text" id="valoractividad3" name="valoractividad3" class="form-control" value="{{ $articulo->valoractividad3 }}" placeholder="Valor Actividad 3" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 provincia">
                                    <div class="input-group mb-3">
                                        <input type="text" id="actividad4" name="actividad4" class="form-control" value="{{ $articulo->actividad4 }}" placeholder="Actividad 4" required>
                                    </div>
                                </div>
                                <div class="col-md-3 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="valoractividad4" name="valoractividad4" class="form-control" value="{{ $articulo->valoractividad4 }}" placeholder="Valor Actividad 4" required>
                                    </div>
                                </div>
                                <div class="col-md-3 provincia">
                                    <div class="input-group mb-3">
                                        <input type="text" id="actividad5" name="actividad5" class="form-control" value="{{ $articulo->actividad5 }}" placeholder="Actividad 5" required>
                                    </div>
                                </div>
                                <div class="col-md-3 title">
                                    <div class="input-group mb-3">
                                    <input type="text" id="valoractividad5" name="valoractividad5" class="form-control" value="{{ $articulo->valoractividad5 }}" placeholder="Valor Actividad 5" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 provincia">
                                    <div class="input-group mb-3">
                                        <input type="text" id="total" name="total" class="form-control" value="{{ $articulo->total}}"  placeholder="total" required>
                                    </div>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-success" id="Enviar" name="Enviar">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>