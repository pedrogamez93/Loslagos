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
                        <h1>Dinámica Económica</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                <form action="{{ route('DinamicaEconomicaRegionLagos.storeDinamicaEconomica') }}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 provincia">
                                    <div class="input-group mb-3">
                                        <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Titulo" required>
                                    </div>
                                </div>
                                <div class="col-md-6 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="subtitulo" name="subtitulo" class="form-control" placeholder="Subtitulo" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 provincia">
                                    <div class="input-group mb-3">
                                        <input type="text" id="descripcion1" name="descripcion1" class="form-control" placeholder="Descripcion 1" required>
                                    </div>
                                </div>
                                <div class="col-md-3 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="valor1" name="valor1" class="form-control" placeholder="valor 1" required>
                                    </div>
                                </div>
                                <div class="col-md-3 provincia">
                                    <div class="input-group mb-3">
                                        <input type="text" id="descripcion2" name="descripcion2" class="form-control" placeholder="Descripcion 2" required>
                                    </div>
                                </div>
                                <div class="col-md-3 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="valor2" name="valor2" class="form-control" placeholder="valor 2" required>
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
