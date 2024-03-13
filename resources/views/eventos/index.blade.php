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
                    <div class="col-md-6">
                        <h1>Eventos agendados</h1>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('eventos.create') }}" class="btn btn-primary">Crear Evento</a>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                    <div class="row">
                        <div class="col-md-12">
                            @php
                            $eventosAgrupadosPorMes = $eventos->groupBy(function ($evento) {
                                return $evento->fecha_inicio->format('F Y');
                            });
                            @endphp

                            @foreach ($eventosAgrupadosPorMes as $mes => $eventosDelMes)
                                <h2>Mes de {{ $mes }}</h2>
                                @foreach ($eventosDelMes as $evento)
                                    <div class="row mb-3">
                                        <div class="col-md-3" style="align-self: center;">
                                            <strong>Inicio:</strong> {{ $evento->fecha_inicio->locale('es')->format('l d-m-Y H:i') }}<br>
                                            <strong>Término:</strong> {{ $evento->fecha_termino->locale('es')->format('l d-m-Y H:i') }}
                                        </div>
                                        <div class="col-md-6">
                                            <h3>{{ $evento->titulo_evento }}</h3>
                                            <p>{{ $evento->descripcion }}</p>
                                        </div>
                                        <div class="col-md-3" style="align-self: center;">

                                            <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-success mb-3">Editar evento</a>

                                            {{-- Formulario para eliminar el evento --}}
                                            <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar este evento?')">Eliminar Evento</button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


