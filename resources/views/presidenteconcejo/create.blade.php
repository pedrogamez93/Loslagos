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
            <div class="container principal mt-4 mb-4 pt-3 pb-3">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Formulario para la creacion del presidente del consejo</h1>
                        </div>
                    </div>
                    <div class="container first-form pt-2 pb-2">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Formulario para la creacion del presidente del consejo </h1>
                            </div>
                        </div>
                        <form id="formulario-creacion" action="{{ route('presidenteconcejo.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 nombres">
                                        <div class="input-group mb-3">
                                            <input type="text" id="nombres" name="nombres" class="form-control" placeholder="Nombres" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 apellidos">
                                        <div class="input-group mb-3">
                                            <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 profesion">
                                        <div class="input-group mb-3">
                                            <input type="text" id="profesion" name="profesion" class="form-control" placeholder="Profesión" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 partidopolitico">
                                        <div class="input-group mb-3">
                                            <input type="text" id="partidopolitico" name="partidopolitico" class="form-control" placeholder="Partido Político" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 cargo">
                                        <div class="input-group mb-3">
                                            <input type="text" id="cargo" name="cargo" class="form-control" placeholder="Cargo" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 institucion">
                                        <div class="input-group mb-3">
                                            <input type="text" id="institucion" name="institucion" class="form-control" placeholder="Institución" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 direccion">
                                        <div class="input-group mb-3">
                                            <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 telefono">
                                        <div class="input-group mb-3">
                                            <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Telefono" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 correo">
                                        <div class="input-group mb-3">
                                            <input type="text" id="correo" name="correo" class="form-control" placeholder="Correo" required >
                                        </div>
                                    </div>
                                    <div class="col-md-6 provincia">
                                        <div class="input-group mb-3">
                                            <input type="text" id="provincia" name="provincia" class="form-control" placeholder="Provincia"required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 comuna">
                                        <div class="input-group mb-3">
                                            <input type="text" id="comuna" name="comuna" class="form-control" placeholder="Comuna" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 imagen">
                                        <label for="formFile" class="form-label style-label">Selecciona una imagen para la sección</label>
                                        <input class="form-control" type="file" name="imagen" id="imagen" accept="image/*" required>
                                    </div>
                                 </div>
                            <button type="submit" class="btn btn-success" id="guardar" name="guardar">Guardar</button>
                        </form>
                    </div>
               </div>
        </div>
    </div>
</div>
