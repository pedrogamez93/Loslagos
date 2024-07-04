<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1">

    <title>Editar Programa</title>
<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script src="https://cdn.tiny.cloud/1/s8k6nnp5xwio3bml2pkpzbjl7oejngmdeyu8ujwbjzyvwmq4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script> src="https://cdn.tiny.cloud/1/no-origin/tinymce/5.10.9-138/tinymce.min.js" </script>


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
</style>
</head>
<body>
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
                        <h1>Detalles del programa</h1>
                    </div>
                    <!-- Formulario para la edicion del programa -->
                    <form action="{{ route('programas.update', ['programa' => $programa->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label class="mt-3 style-label required" for="titulo">TÃ­tulo:</label>
    <input class="form-control mt-2 mb-4" type="text" name="titulo" value="{{ $programa->titulo }}" placeholder="TÃ­tulo" required>

    <label class="style-label mb-2" for="bajada">Bajada:</label>
    <textarea class="form-control mt-2" name="bajada" id="" placeholder="Bajada">{{ $programa->bajada }}</textarea>

    <label class="style-label mb-2 mt-3" for="bajada_programa">Bajada programa:</label>
    <textarea class="form-control mt-2" style="height: 250px" id="nota" name="bajada_programa" placeholder="bajada placeholder">{!! $programa->bajada_programa ?? '' !!}</textarea>

    <label class="style-label mt-3" for="imagen">Agregar nueva imagen destacada:</label>
    <input class="form-control mt-2 mb-4" type="file" name="imagen" accept=".png, .jpg, .jpeg">
    <p>imagen actual del programa</p>
    @if ($programa->imagen)
    <img src="{{ asset($programa->imagen) }}" alt="Imagen actual" style="max-width: 200px; margin-top: 10px; display: block; padding-bottom: 20px;">
@endif

    <button type="submit" class="btn btn-primary">Guardar cambios</button>
</form>


                        
                        @if(session('mensaje'))
    <div class="alert alert-success mt-3">
        {{ session('mensaje') }}
    </div>
@endif

<form action="{{ route('programas.agregar-descripcion', ['programa' => $programa->id]) }}" method="POST" enctype="multipart/form-data" class="form-control mt-5">
    @csrf
    <!-- Resto del formulario -->

    <div class="container mt-3">
        <label class="style-label mb-2">Â¿Deseas agregar otro texto descriptivo?</label>
        <div class="row">
            <div class="col-md-12">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="inlineCheckbox1" value="si" name="si_descripcion">
                    <label class="form-check-label" for="inlineCheckbox1">Si</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="inlineCheckbox2" value="no" name="si_descripcion" checked>
                    <label class="form-check-label" for="inlineCheckbox2">No</label>
                </div>
            </div>
        </div>
    </div>

    <div class="container texto-descriptivo mt-4">
        <div class="row">
            <div class="col-md-12">
                <label class="style-label" for="url">TÃ­tulo:</label>
                <input class="form-control mt-2 mb-4" type="text" name="titulo_descripcion[]" placeholder="Agregar tÃ­tulo">
            </div>
            <div class="col-md-12">
                <label class="style-label" for="url">Bajada:</label>
                <textarea class="form-control mt-2" placeholder="Agregar descripciÃ³n" style="height: 250px" id="desc" name="bajada_descripcion[]"></textarea>
            </div>
        </div>
        <button type="button" id="agregarMas" class="btn btn-primary mt-3">Agregar otra descripciÃ³n</button>
    </div>

    <!-- BotÃ³n de submit para guardar la nueva descripciÃ³n -->
    <button class="btn btn-success mt-3" type="submit">Actualizar descripciÃ³nes</button>
</form>




<!--DOCUMENTOS-->
<form action="{{ route('programas.agregar-documento', ['programa' => $programa->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="documentos-container form-control mt-5">
        <div class="documentos-input">
            <label class="style-label" for="documentos">Â¿Deseas agregar nuevos documentos?</label>
            <div id="documentos-wrapper">
                <div class="documento-item">
                    <input class="form-control mt-2 mb-2" type="text" name="nombreDocumento[]" placeholder="Nombre del documento">
                    <input class="form-control mt-2 mb-2" type="file" name="urlDocumento[]" accept=".pdf, .doc, .docx, .zip, .rar">
                </div>
            </div>
            <button type="button" class="btn btn-primary agregar-documento" onclick="agregarDocumento()">Agregar otro documento</button>
        </div>

        <button class="btn btn-success mt-3" type="submit">Guardar documentos</button>
    </div>
</form>

<!--BOTONES-->


<form action="{{ route('programas.agregar-boton', ['programa' => $programa->id]) }}" method="POST">
    @csrf
    <div class="container">
        <label class="style-label mb-2 mt-5">Â¿Deseas agregar nuevos botones?</label>
        <div class="row">
            <div class="col-md-12">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="inlineCheckbox11" value="si" name="si_boton"> 
                    <label class="form-check-label" for="inlineCheckbox11">Si</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="inlineCheckbox22" value="no" name="si_boton" checked>
                    <label class="form-check-label" for="inlineCheckbox22">No</label>
                </div>
            </div>
        </div>
    </div>

    <div class="container botton-direccionar mt-4">
        <div class="row">
            <div class="col-md-6">
                <label class="style-label" for="url">Nombre del botÃ³n:</label>
                <input class="form-control mt-2 mb-4" type="text" name="nombrebtn[]" placeholder="Nombre del botÃ³n">
            </div>
            <div class="col-md-6">
                <label class="style-label" for="url">URL del botÃ³n:</label>
                <input class="form-control mt-2 mb-4" type="text" name="urlbtn[]" placeholder="URL del botÃ³n">
            </div>
        </div>
        <button type="button" id="agregarMas2" class="btn btn-primary">Agregar MÃ¡s</button>
    </div>
    <button class="btn btn-success mt-3" type="submit">Actualizar botones</button>
</form>





<!--COLECCIONES-->

<form action="{{ route('programas.agregar-fotografia', ['programa' => $programa->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container pregunta-doc mt-4">
        <label class="style-label mb-2 mt-3">Â¿Deseas agregar nuevas fotografÃ­as?</label>
        <div class="row">
            <div class="col-md-12">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="inlineCheckbox1111"  value="si" name="si_fotografia">
                    <label class="form-check-label" for="inlineCheckbox1111">Si</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="inlineCheckbox2222"  value="no" checked>
                    <label class="form-check-label" for="inlineCheckbox2222">No</label>
                </div>
            </div>
        </div>
    </div>

    <div class="colecciones-container mt-3">
        <div class="colecciones-input">
            <label class="style-label" for="colecciones">FotografÃ­as:</label>
            <input class="form-control mt-2 mb-4" type="file" name="fotografias[]" accept=".png, .jpg, .jpeg" multiple>
        </div>
    </div>
    <button class="btn btn-success mt-3 mb-5" type="submit">Actualizar fotografÃ­as</button>
</form>




<div class="form-control pt-4 pb-4">
<!-- Mostrar botones -->
<h3 class="mt-3 mb-2">Botones actuales</h3>   

@foreach($botones as $boton)
    <div  class="  container mt-1 mb-1" style="display: flex; gap:15px;">
        <a href="{{ $boton->urlbtn }}" class="btn">{{ $boton->nombrebtn }}</a>
        <form action="{{ route('programa.boton.destroy', $boton->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
    </div>
@endforeach
</div>

<div class="form-control pt-4 pb-4">
<!-- Mostrar descripciones -->
<h3 class="mt-3 mb-2">Descripciones actuales</h3>   

@foreach($descripciones as $descripcion)
    <div class=" container mt-3 mb-4" >
        <h6><strong>{{ $descripcion->titulo_descripcion }}</strong></h6>
        <p>{!! $descripcion->bajada_descripcion ?? '' !!}</p>
        <form action="{{ route('programa.descripcion.destroy', $descripcion->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
    </div>
@endforeach
</div>

<div class="form-control pt-4 pb-4">
<!-- Mostrar documentos -->
<h3 class="mt-3 mb-2">Documentos actuales</h3>   

@foreach($documentos as $documento)
    <div class="  container mt-1 mb-1 " style="display: flex; gap:15px;">
        <a>{{ $documento->nombreDocumento }}</a>
        <form action="{{ route('programa.documento.destroy', $documento->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
    </div>
@endforeach
</div>

<div class="form-control pt-4 pb-4">

<!-- Mostrar colecciones -->
<h3 class="mt-3 mb-2">FotografÃ­as actuales</h3>

@foreach($colecciones as $coleccion)
    <div class="container mt-1 mb-1">
        <h5 class="mt-3">{{ $coleccion->titulo_coleccion }}</h5>
        <!-- Mostrar fotografÃ­as de la colecciÃ³n -->
        <div class="row">
            @foreach($coleccion->fotografias as $fotografia)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <img src="{{ asset('imagenes_programas/' . basename($fotografia->ruta)) }}" class="card-img-top" alt="FotografÃ­a">
                        <div class="card-body text-center">
                            <form action="{{ route('programa.fotografia.destroy', $fotografia->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mt-3">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endforeach
</div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<script>
      tinymce.init({
            selector: '#desc', // Ajustado para apuntar especÃ­ficamente al textarea con el ID 'editor'
            plugins: 'advlist link image lists',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        });

        tinymce.init({
            selector: '#nota', // Ajustado para apuntar especÃ­ficamente al textarea con el ID 'editor'
            plugins: 'advlist link image lists',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        });

  $(document).ready(function () {
    // Ocultar el container add-boton inicialmente
    $(".texto-descriptivo").hide();
    $(".botton-direccionar").hide();
    $(".agregar-documentos").hide();
    $(".colecciones-container").hide();
    $(".documentos-container-comprimido").hide();
    $(".open-other-site").hide();
    
    // Desactivar la opciÃ³n "No" cuando se selecciona "Si"
    $("#inlineCheckbox1").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox2").prop("checked", false);
        $(".texto-descriptivo").slideDown(); // Mostrar el container add-boton
      } else {
        $(".texto-descriptivo").slideUp(); // Ocultar el container add-boton
      }
    });

    $("#inlineCheckbox11").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox22").prop("checked", false);
        $(".botton-direccionar").slideDown(); 
      } else {
        $(".botton-direccionar").slideUp(); 
      }
    });

    $("#inlineCheckbox111").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox222").prop("checked", false);
        $(".agregar-documentos").slideDown(); 
      } else {
        $(".agregar-documentos").slideUp(); 
      }
    });

    $("#inlineCheckbox1111").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox2222").prop("checked", false);
        $(".colecciones-container").slideDown(); 
      } else {
        $(".colecciones-container").slideUp(); 
      }
    });



    // Desactivar la opciÃ³n "Si" cuando se selecciona "No"
    $("#inlineCheckbox2").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox1").prop("checked", false);
        $(".texto-descriptivo").slideUp();    
      }
    });

    $("#inlineCheckbox22").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox11").prop("checked", false);
        $(".botton-direccionar").slideUp();    
      }
    });

    $("#inlineCheckbox222").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox111").prop("checked", false);
        $(".agregar-documentos").slideUp();    
      }
    });

    $("#inlineCheckbox2222").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox1111").prop("checked", false);
        $(".colecciones-container").slideUp();    
      }
    });

 

    // BotÃ³n "Agregar MÃ¡s" para duplicar los inputs
    $("#agregarMas").click(function () {
      // Clonar el primer par de inputs y agregar al final
      var nuevoBoton = $(".texto-descriptivo .row").first().clone();
      $(".texto-descriptivo .row:last").after(nuevoBoton);
    });

    $("#agregarMas2").click(function () {
      // Clonar el primer par de inputs y agregar al final
      var nuevoBoton = $(".botton-direccionar .row").first().clone();
      $(".botton-direccionar .row:last").after(nuevoBoton);
    });
   
  });

</script>
<script>


tinymce.init({
            selector: '#editor', // Ajustado para apuntar especÃ­ficamente al textarea con el ID 'editor'
            plugins: 'advlist link image lists',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        });

        tinymce.init({
            selector: '#editor2', // Ajustado para apuntar especÃ­ficamente al textarea con el ID 'editor'
            plugins: 'advlist link image lists',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        });

$(document).ready(function() {
    // Contador para IDs Ãºnicos
    var contador = 1;

    // FunciÃ³n para duplicar campos de documento
    $(".agregar-documento").click(function() {
        var clone = $(".documentos-input:first").clone(true); // Clonar el primer campo de documento
        clone.find(".titulo_documento").val(""); // Limpiar el valor del campo de tÃ­tulo
        clone.find(".ruta_documento").val(""); // Limpiar el valor del campo de ruta
        clone.find(".titulo_documento").attr("id", "titulo_documento_" + contador); // Crear un ID Ãºnico para el campo de tÃ­tulo
        clone.find(".ruta_documento").attr("id", "ruta_documento_" + contador); // Crear un ID Ãºnico para el campo de ruta
        contador++; // Incrementar el contador
        $(".documentos-container").append(clone); // Agregar el campo clonado al contenedor
    });
});
</script>