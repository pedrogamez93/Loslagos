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
                        <h1>Registro de Estadística</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                <form action="{{ route('EstadisticasRegionLagos.updateEstadisticas', $articulo->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 provincia">
                                    <div class="input-group mb-3">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="provincia" required>
                                        <option value="" {{ $articulo->provincia == '' ? 'selected' : '' }}>Seleccione una Provincia</option>
                                        
                                        <option value="Provincia de Osorno" {{ $articulo->provincia == 'Provincia de Osorno' ? 'selected' : '' }}>Provincia de Osorno</option>
                                        <option value="Provincia de Llaquihue" {{ $articulo->provincia == 'Provincia de Llaquihue' ? 'selected' : '' }}>Provincia de Llaquihue</option>
                                        <option value="Provincia de Chiloe" {{ $articulo->provincia == 'Provincia de Chiloe' ? 'selected' : '' }}>Provincia de Chiloe</option>
                                        <option value="Provincia de Palena" {{ $articulo->provincia == 'Provincia de Palena' ? 'selected' : '' }}>Provincia de Palena</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-6 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="comuna" name="comuna" class="form-control" value="{{ $articulo->comuna }}" placeholder="Comuna" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 superficie">
                                    <b>&nbsp;</b>
                                    <div class="input-group mb-3">
                                        <input type="text" id="superficie" name="superficie_nueva" class="form-control"  value="{{ $articulo->superficie_nueva }}"  placeholder="Superficie" required><b style=" margin-top: 10px; padding-left: 5px; ">Km2</b>
                                    </div>
                                </div>
                                <div class="col-md-4 purbana">
                                    <b>Población Urbana</b>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="text" id="p_urbana_hombre" name="p_urbana_hombre"  value="{{ $articulo->p_urbana_hombre }}" class="form-control" placeholder="Hombre" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="text" id="p_urbana_mujeres" name="p_urbana_mujeres"   value="{{ $articulo->p_urbana_mujeres }}" class="form-control" placeholder="Mujer" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 prural">
                                <div class="row">
                                    <b>Población Rural</b>
                                    <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="text" id="p_rural_hombre" name="p_rural_hombre"  value="{{ $articulo->p_rural_hombre }}"  class="form-control" placeholder="Hombre" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="text" id="p_rural_mujeres" name="p_rural_mujeres"  value="{{ $articulo->p_rural_mujeres }}"  class="form-control" placeholder="Mujer" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-success" id="Enviar" name="Enviar">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>