<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<style>
    h1, h2 {
        color: #565656;
    }

    .principal {
        border: 1px solid #CCCCCC;
        border-radius: 10px;
    }

    .first-form {
        border: 1px solid #CCCCCC;
        border-radius: 10px;
    }

    input.form-control {
        color: #565656;
        font-size: 16px;
        font-weight: 700;
        font-style: italic;
    }

    .style-label {
        color: #565656;
        font-size: 16px;
        font-weight: 700;
    }

    .style-col-menu {
        background-color: #0c1e35;
    }

    button.btn.btn-link {
        color: #FFFFFF;
        text-decoration: none;
        font-family: unset;
        font-weight: 700;
    }

    li.style-li {
        list-style: none;
        padding-bottom: 10px;
    }

    a.style-a-menu {
        color: #FFFFFF;
        text-decoration: none;
        font-weight: 500;
    }
    .btn-final, a.milastbtn {
        Width: 146px;
        Height: 40px;
        border-radius: 100px;
        background-color: #F59120;
        font-family: 'Inter';
        font-weight: 700;
        font-size: 16px;
        text-decoration: none;
        color: #FFFFFF;
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
                        <h1>Información Consejero de Osorno</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Información Consejero de Osorno</h2>
                        </div>
                    </div>

                    <!-- Mostrar los valores del id del registro seleccionado -->
                    <form action="{{ route('consejerososorno.update', ['consejerososorno' => $consejero->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 nombres">
                                    <div class="input-group mb-3">
                                        <input type="text" id="nombres" name="nombres" class="form-control" placeholder="Nombres" value="{{ $consejero->nombres ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6 apellidos">
                                    <div class="input-group mb-3">
                                        <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos" value="{{ $consejero->apellidos ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6 profesion">
                                    <div class="input-group mb-3">
                                        <input type="text" id="profesion" name="profesion" class="form-control" placeholder="Profesión" value="{{ $consejero->profesion ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6 partidopolitico">
                                    <div class="input-group mb-3">
                                        <input type="text" id="partidopolitico" name="partidopolitico" class="form-control" placeholder="Partido Político" value="{{ $consejero->partidopolitico ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6 cargo">
                                    <div class="input-group mb-3">
                                        <input type="text" id="cargo" name="cargo" class="form-control" placeholder="Cargo" value="{{ $consejero->cargo ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6 actividad">
                                        <div class="input-group mb-3">
                                            <input type="text" id="actividad" name="actividad" class="form-control" placeholder="Actividad" value="{{ $consejero->actividad ?? '' }}">
                                        </div>
                                    </div>
                                <div class="col-md-6 institucion">
                                    <div class="input-group mb-3">
                                        <input type="text" id="institucion" name="institucion" class="form-control" placeholder="Institución" value="{{ $consejero->institucion ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6 direccion">
                                    <div class="input-group mb-3">
                                        <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección" value="{{ $consejero->direccion ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6 telefono">
                                    <div class="input-group mb-3">
                                        <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Telefono" value="{{ $consejero->telefono ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6 correo">
                                    <div class="input-group mb-3">
                                        <input type="text" id="correo" name="correo" class="form-control" placeholder="Correo" value="{{ $consejero->correo ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6 region">
                                        <div class="input-group mb-3">
                                            <input type="text" id="region" name="region" class="form-control" value="{{ $consejero->region ?? '' }}" placeholder="Región">
                                        </div>
                                    </div>
                                <div class="col-md-6 provincia">
                                    <div class="input-group mb-3">
                                        <input type="text" id="provincia" name="provincia" class="form-control" placeholder="Provincia" value="{{ $consejero->provincia ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6 comuna">
                                    <div class="input-group mb-3">
                                        <input type="text" id="comuna" name="comuna" class="form-control" placeholder="Comuna" value="{{ $consejero->comuna ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6 periodosenconcejo">
                                        <div class="input-group mb-3">
                                            <input type="text" id="periodosenconcejo" name="periodosenconcejo" class="form-control" value="{{ $consejero->periodosenconcejo ?? '' }}" placeholder="Periodos en concejo">
                                        </div>
                                    </div>
                                    <div class="col-md-6 comisiones">
                                        <div class="input-group mb-3">
                                            <input type="text" id="comisiones" name="comisiones" class="form-control" value="{{ $consejero->comisiones?? '' }}" placeholder="Comisiones">
                                        </div>
                                    </div>
                                <div class="col-md-6 imagen" style="">
                                    <label for="formFile" class="form-label style-label">Selecciona una imagen para la sección</label>
                                    <input class="form-control" type="file" name="imagen" id="imagen" accept="image/*">
                                </div>
                                <div class="col-md-6 muestraimagen mb-4">
                                    @if($consejero && $consejero->imagen)
                                        <p>Imagen Actual</p>
                                        <img src="{{ asset($consejero->imagen) }}" style="width:200px;height: 200px;" alt="Imagen del consejero">
                                    @else
                                        <p>No hay imagen disponible</p>
                                    @endif
                                </div>
                            </div>                
                            <button type="submit" class="btn btn-success" id="guardar" name="guardar">Guardar</button>
                        </div>
                    </form>
                </div>
                <!-- Asumiendo que $presidente es tu variable para el registro único -->
                @if ($consejero)
                <form action="{{ route('consejerososorno.destroy', $consejero->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mt-4 mb-4" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">Eliminar registro</button>
                </form>
                @endif
                <div class="btn-final" style="text-align: -webkit-center; padding-top: 0.5rem;font-weight: 700 !important;">
                    <a class="milastbtn" href="{{ route('consejerososorno.index') }}" style="font-weight: 700 !important;">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
