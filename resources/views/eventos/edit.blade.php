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
                        <h1>Editar eventos</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                <form action="{{ route('eventos.update', $evento->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mt-2 mb-4">
                            <label class="style-label" for="titulo_evento">Título del Evento</label>
                            <input type="text" class="form-control" id="titulo_evento" name="titulo_evento" value="{{ $evento->titulo_evento }}" required>
                        </div>

                        <div class="form-group mb-4">
                            <label class="style-label"  for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ $evento->descripcion }}</textarea>
                        </div>

                        <div class="form-group mb-4">
                            <label class="style-label" for="lugar">Lugar</label>
                            <input type="text" class="form-control" id="lugar" name="lugar" value="{{ $evento->lugar }}">
                        </div>

                        <div class="form-group mb-4">
                            <label class="style-label" for="imagen">Imagen Actual</label>
                            {{-- Muestra la imagen actual si existe --}}
                            @if($evento->imagen)
                                <img src="{{ route('imagen.mostrarEvento', ['filename' => basename($evento->imagen)]) }}" width="100" height="100">
                            @endif
                            <input class="form-control" type="file" name="imagen" accept=".png, .jpg, .jpeg">
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 form-group">
                                <label class="style-label" for="fecha_inicio">Fecha y Hora de Inicio</label>
                                <input type="datetime-local" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ $evento->fecha_inicio ? $evento->fecha_inicio->format('Y-m-d\TH:i') : '' }}">
                            </div>

                            <div class="col-md-6 form-group">
                                <label class="style-label" for="fecha_termino">Fecha y Hora de Término</label>
                                <input type="datetime-local" class="form-control" id="fecha_termino" name="fecha_termino" value="{{ $evento->fecha_termino ? $evento->fecha_termino->format('Y-m-d\TH:i') : '' }}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Actualizar Evento</button>
                    </form>
                </div>
                <a href="{{ route('eventos.index') }}" class="btn btn-secondary mt-4">Volver</a>
            </div>
        </div>
    </div>
</div>
