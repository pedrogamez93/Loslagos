<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<style>
    h1 , h2 {
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
                        <h1>Consejo Regional</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Consejo Regional</h1> 
                        </div>
                    </div>
                        <div class="form-group">
                            <div class="row">
                            {{-- Verificar si existe un concejo regional --}}
                                @if($concejo)
                                    {{-- Usar $concejo->id para obtener el ID del concejo regional --}}
                                    <div class="col-md-6 tag-comentario">
                                        <!-- Campos para el Consejo Regional -->
                                        <div class="input-group mb-3">
                                            <input type="text" id="tag_comentario" name="tag_comentario" class="form-control" placeholder="Tag o comentario" value="{{ $concejo->tag_comentario }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 title">
                                        <div class="input-group mb-3">
                                            <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Titulo seccion" value="{{ $concejo->titulo }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 pb-3">
                                            <div id="text">
                                                <div class="form-floating">
                                                    <textarea name="bajada" class="form-control" placeholder="Escribe tu contenido aquí" id="bajada" style="height: 250px" disabled>{{ $concejo->bajada }}</textarea>
                                                    <label class="style-label" for="floatingTextarea2 style-label">Bajada</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 pb-3">
                                            <img src="{{ asset('storage/' . $concejo->img) }}" style="width: 150px; height: 150px;" alt="Imagen del Consejo Regional">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('concejoregional.edit', $concejo->id) }}" class="btn btn-primary mt-2">Editar</a>
                                    </div>
                                    {{-- Si tienes secciones y quieres mostrarlas --}}
                                    <h1>Secciones extras</h1>
                                    @foreach($concejo->secciones as $seccion)
                                        {{-- Aquí manejas la visualización de cada sección --}}
                                        <div class="container first-form mt-4 mb-4 pt-4 pb-4">
                                            <div class="col-md-6 title">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Titulo seccion" value="{{ $seccion->titulo_seccion }}" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12 pb-3">
                                                    <div id="text">
                                                        <div class="form-floating">
                                                            <textarea name="bajada" class="form-control" placeholder="Escribe tu contenido aquí" id="bajada" style="height: 250px" disabled>{{ $seccion->bajada_seccion }}</textarea>
                                                            <label class="style-label" for="floatingTextarea2 style-label">Bajada</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($seccion->img_seccion)
                                                <div class="form-group">
                                                    <div class="col-md-12 pb-3">
                                                        <img src="{{ asset('storage/' . $seccion->img_seccion) }}" style="width: 150px; height: 150px;" alt="Imagen de la sección">
                                                    </div>
                                                
                                                    <div class="col-md-6">
                                                        <a href="{{ route('editar.seccion', ['seccionId' => $seccion->id]) }}" class="btn btn-primary mt-2">Editar</a>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>            
                                    @endforeach
                                @else

                                    <p>No hay concejos regionales disponibles.</p>
                                    {{-- Opcionalmente, puedes incluir un enlace para crear uno nuevo --}}

                                    <a href="{{ route('concejoregional.create') }}">Crear Nuevo Concejo Regional</a>
                                @endif
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>
