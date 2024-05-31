<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- DATEPICKER-->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<!-- Incluye los archivos JS de CKEditor -->
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
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
    .style-label, p.style-label{
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
    .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline.ck-blurred {
    height: 350px;
    }
    p.ck-placeholder {
    height: 350px;
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
                        <h1>Formulario Home</h1>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <h1></h1> 
                        </div>
                    </div>
                    <!-- Formulario para la creación de un nuevo trámite -->
                    <form action="{{ url('/home/store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label class="style-label required" for="titulo">Título:</label>
            <input class="form-control mt-2" type="text" name="titulobanner" placeholder="Título" >


            <label class="style-label required" for="titulo">Descripcion:</label>
            <input class="form-control mt-2" type="text" name="descripcionbanner" placeholder="Descripcion" >
                       
        

            <div class="mb-3 mt-4">
                <label for="formFile" class="form-label">Mini banner 1</label>
                <input class="form-control" type="file" name="minibanner1" id="minibanner1">
                <input class="form-control mt-2" type="text" name="url_minibanner1" placeholder="URL Minibanner 1" >
            </div>

            <div class="mb-3 mt-4">
                <label for="formFile" class="form-label">Mini banner 2</label>
                <input class="form-control" type="file" name="minibanner2" id="minibanner2">
                <input class="form-control mt-2" type="text" name="url_minibanner2" placeholder="URL Minibanner 2" >
            </div>

            <div class="mb-3 mt-4">
                <label for="formFile" class="form-label">Mini banner 3</label>
                <input class="form-control" type="file" name="minibanner3" id="minibanner3">
                <input class="form-control mt-2" type="text" name="url_minibanner3" placeholder="URL Minibanner 3" >
            </div>

            <div class="mb-3 mt-4">
                <label for="formFile" class="form-label">Mini banner 4</label>
                <input class="form-control" type="file" name="minibanner4" id="minibanner4">
                <input class="form-control mt-2" type="text" name="url_minibanner4" placeholder="URL Minibanner 4" >
            </div>
            <div class="mb-3 mt-4">
                <label for="formFile" class="form-label">Mini banner 5</label>
                <input class="form-control" type="file" name="minibanner5" id="minibanner5">
                <input class="form-control mt-2" type="text" name="url_minibanner5" placeholder="URL Minibanner 5" >
            </div>
            <div class="mb-3 mt-4">
                <label for="formFile" class="form-label">Mini banner 6</label>
                <input class="form-control" type="file" name="minibanner6" id="minibanner6">
                <input class="form-control mt-2" type="text" name="url_minibanner6" placeholder="URL Minibanner 6" >
            </div>
            <div class="mb-3 mt-4">
                <label for="formFile" class="form-label">Mini banner 7</label>
                <input class="form-control" type="file" name="minibanner7" id="minibanner7">
                <input class="form-control mt-2" type="text" name="url_minibanner7" placeholder="URL Minibanner 7" >
            </div>
            <div class="mb-3 mt-4">
                <label for="formFile" class="form-label">Mini banner 8</label>
                <input class="form-control" type="file" name="minibanner8" id="minibanner8">
                <input class="form-control mt-2" type="text" name="url_minibanner8" placeholder="URL Minibanner 8" >
            </div>
            <div class="mb-3 mt-4">
                <label for="formFile" class="form-label">Mini banner 9</label>
                <input class="form-control" type="file" name="minibanner9" id="minibanner9">
                <input class="form-control mt-2" type="text" name="url_minibanner9" placeholder="URL Minibanner 9" >
            </div>
            <div class="mb-3 mt-4">
                <label for="formFile" class="form-label">Mini banner 10</label>
                <input class="form-control" type="file" name="minibanner10" id="minibanner10">
                <input class="form-control mt-2" type="text" name="url_minibanner10" placeholder="URL Minibanner 10" >
            </div>
            <div class="mb-3 mt-4">
                <label for="formFile" class="form-label">Mini banner 11</label>
                <input class="form-control" type="file" name="minibanner11" id="minibanner11">
                <input class="form-control mt-2" type="text" name="url_minibanner11" placeholder="URL Minibanner 11" >
            </div>
            <div class="mb-3 mt-4">
                <label for="formFile" class="form-label">Mini banner 12</label>
                <input class="form-control" type="file" name="minibanner12" id="minibanner12">
                <input class="form-control mt-2" type="text" name="url_minibanner12" placeholder="URL Minibanner 12" >
            </div>


          

            <button class=" mt-5 btn btn-success" type="submit">Guardar</button>
        </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Agregar más documentos
        $(".agregar-documento").click(function() {
            var documentosContainer = $(".documentos-container");
            var nuevoDocumentoInput = documentosContainer.find(".documentos-input:first").clone(); // Clona el primer conjunto de campos

            // Limpia los valores en los campos clonados
            nuevoDocumentoInput.find("input[type='file']").val('');
            nuevoDocumentoInput.find("input[type='text']").val('');

            // Genera un nuevo nombre único para cada campo clonado
            var nuevoId = Date.now(); // Utiliza la marca de tiempo actual como identificador único
            nuevoDocumentoInput.find("input[type='file']").attr('id', 'ruta_documento_' + nuevoId);
            nuevoDocumentoInput.find("input[type='file']").attr('name', 'ruta_documento[]');
            nuevoDocumentoInput.find("input[type='text']").attr('id', 'nombre_documento_' + nuevoId);
            nuevoDocumentoInput.find("input[type='text']").attr('name', 'nombre_documento[]');

            // Agrega los campos clonados al contenedor
            documentosContainer.append(nuevoDocumentoInput);
        });
    });
</script>

<script>
  $(document).ready(function () {
    // Ocultar el container add-boton inicialmente
    $(".documentos-container").hide();
    // Desactivar la opción "No" cuando se selecciona "Si"
    $("#inlineCheckbox12").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox21").prop("checked", false);
        $(".documentos-container").slideDown(); 
      } else {
        $(".documentos-container").slideUp(); 
      }
    });
    // Desactivar la opción "Si" cuando se selecciona "No"
    $("#inlineCheckbox21").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox12").prop("checked", false);
        $(".documentos-container").slideUp();    
      }
    });
});
</script>