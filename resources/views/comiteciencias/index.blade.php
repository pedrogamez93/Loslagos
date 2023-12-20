<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
    textarea.form-control.mt-2.mb-4 {
        height: 200px;
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
                        <h1>COMITÉ DE CIENCIA, TECNOLOGÍA E INNOVACIÓN</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>COMITÉ DE CIENCIA, TECNOLOGÍA E INNOVACIÓN</h1> 
                        </div>
                    </div>
                    <!-- Mostrar la información de la base de datos -->
                    <div class="container first-form pt-2 pb-2">
                        @foreach ($comites as $comite)
                            <h2>{{ $comite->titulo }}</h2>
                            <p>{{ $comite->tags }}</p>
                            <p>{{ $comite->descripcion }}</p>

                            <h3>Documentos relacionados:</h3>
                            @if($comite->documentos->count() > 0)
                                <div class="container form-control">
                                    <div class="row">
                                        @foreach($comite->documentos as $documento)
                                            <div class="col-md-6">
                                                <p class="form-control mt-2">{{ $documento->nombre_documento ?? '' }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <p>No hay documentos asociados a este concurso.</p>
                            @endif
                        @endforeach
                    </div>
                    <button class="mt-5 mb-4 btn btn-success" type="button" id="boton-editar">Editar Comite</button>
                </div>
                <button class="mt-4 mb-4 btn btn-primary crear-concurso" type="button"  id="boton-crear">Crear nuevo Comite</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#boton-editar").click(function() {
            // Cambié $comite->id a {{ $comite->id }}
            window.location.href = "{{ route('comiteciencias.edit', $comite->id) }}";
        });

        $("#boton-crear").click(function() {
            window.location.href = "{{ route('comiteciencias.create') }}";
        });
    });
</script>