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
    h2.titulo-galeria{
        color:#FFFFFF;
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
    .galerias-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
    }

    .galeria-item {
        width: 284px;
        height: 284px;
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .galeria-info {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.5); /* Fondo semitransparente */
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 10px;
    }

    .imagenes-count {
        align-self: flex-end;
    }

    .titulo-galeria {
        align-self: flex-end;
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
                        <h1>Galerias</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                    <div class="row">
                        <div class="col-md-12">
                        <h1>Listado de la galerias</h1>
                        <a href="{{ route('galerias.create') }}" class="btn btn-primary mt-2 mb-4">Crear Galeria</a>
                        </div>
                    </div>
                    <div class="galerias-grid">
                        @foreach ($galerias as $galeria)
                            @php
                                $imagenPrimera = $galeria->imagenes->first();
                            @endphp
                            {{-- Enlace a la vista de edición de la galería --}}
                            <a href="{{ route('galerias.edit', $galeria->id) }}" class="galeria-link">
                                <div class="galeria-item" style="background-image: url('{{ $imagenPrimera ? route('galeria.imagen.mostrar', ['filename' => basename($imagenPrimera->archivo)]) : asset('storage/images/default.jpg') }}');">
                                    <div class="galeria-info">
                                        <span class="imagenes-count">{{ $galeria->imagenes->count() }} imágenes</span>
                                        <h2 class="titulo-galeria">{{ $galeria->nombre }}</h2>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

