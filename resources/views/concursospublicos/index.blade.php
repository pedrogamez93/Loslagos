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
                        <h1>CONCURSOS PÚBLICOS</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>CONCURSOS PÚBLICOS</h1> 
                        </div>
                    </div>
                    <div class="container first-form pt-2 pb-2">
                        @foreach ($concursos as $concurso)
                            <h2>{{ $concurso->titulo }}</h2>
                            <p>{{ $concurso->tags }}</p>
                            <p>{{ $concurso->descripcion }}</p>

                            <h3>Documentos relacionados:</h3>
                            @if($concurso->documentos->count() > 0)
                                <div class="container form-control">
                                    <div class="row">
                                        @foreach($concurso->documentos as $documento)
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
                    <button class="mt-5 mb-4 btn btn-success" type="button" id="boton-editar">Editar Concurso</button>
                </div>
                <button class="mt-4 mb-4 btn btn-primary crear-concurso" type="button"  id="boton-crear">Crear nuevo Concurso</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $("#boton-editar").click(function() {
            window.location.href = "{{ route('concursospublicos.edit', $concurso->id) }}";
        });
            
                // Redirigir a la página de edición al hacer clic en "Editar asamblea"
        $("#boton-crear").click(function() {
            window.location.href = "{{ route('concursospublicos.create') }}";
        });

    });
</script>