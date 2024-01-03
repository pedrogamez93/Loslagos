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
                        <h1>Concejo Regional</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Concejo Regional</h1> 
                        </div>
                    </div>
                    <!-- Mostrar la información de la base de datos -->
                    <form id="formulario-creacion" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 tag-comentario">
                                    <div class="input-group mb-3">
                                        <input type="text" id="tag_comentario" name="tag_comentario" class="form-control" placeholder="Tag o comentario" value="{{ $concejo->tag_comentario }}">
                                    </div>
                                </div>
                                <div class="col-md-6 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Titulo seccion" value="{{ $concejo->titulo }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 pb-3">
                                    <div id="text">
                                        <div class="form-floating">
                                            <textarea name="bajada" class="form-control" placeholder="Escribe tu contenido aquí" id="bajada" style="height: 250px">"{{ $concejo->bajada }}"</textarea>
                                            <label class="style-label" for="floatingTextarea2 style-label">Bajada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 pt-3 pb-3">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label style-label">Imagen actual</label>
                                        <img src="{{ asset('storage/' . $concejo->img) }}" style="width: 150px; height: 150px;" alt="Imagen del Consejo Regional">
                                    </div>
                                </div>
                            </div>
                            <div class="secciones-container mt-3">
                                <!-- Verificar si hay secciones asociadas -->
                                @if($concejo->secciones->isNotEmpty())
                                    <h2>Secciones</h2>
                                        <!-- Iterar sobre las secciones y mostrar detalles -->
                                        @foreach($concejo->secciones as $seccion)
                                                <div class="item-complet">
                                                    <h3>{{ $seccion->titulo_seccion }}</h3>

                                                    <div class="item-donw" style="display: flex;">
                                                        <p>{{ $seccion->bajada_seccion }}</p>
                                                <!-- Aquí puedes mostrar la imagen de la sección si es necesario -->
                                                @if($seccion->img_seccion)
                                                        <img src="{{ asset('storage/' . $seccion->img_seccion) }}" style="width: 150px; height: 150px;" alt="Imagen de la sección">
                                                    </div>
                                                </div>
                                                @endif
                                            
                                        @endforeach
                                @else
                                    <p>No hay secciones disponibles para este concejo.</p>
                                @endif
                            </div>
                            <div class="container mt-5 mb-2">
                                <div class="row">
                                    <div class="col-md-12">
                                    <button type="button" class="btn btn-success" id="boton-editar" name="editar">Editar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Espera a que el documento esté completamente cargado
    $(document).ready(function() {
        // Añade un evento de clic al botón con el id "boton-editar"
        $("#boton-editar").click(function() {
            // Redirige a la URL específica utilizando la función route de Laravel
            window.location.href = "{{ route('concejoregional.edit', ['concejoId' => $concejo->id, 'seccionId' => $seccion->id]) }}";
        });
    });
</script>
