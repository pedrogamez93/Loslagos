<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
    .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline.ck-blurred {
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
            <div class="container principal pt-3 pb-3">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Crear Mapa del sitio</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">

                <form action="{{ route('MapaWeb.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12 title">
                                    <div class="input-group mb-3">
                                        <select name="urlPadre"  class="form-control" required>
                                            <option value="">Seleccione uno</option>
                                            <option value="Gobierno Regional">Gobierno Regional</option>
                                            <option value="Consejo Regional">Consejo Regional</option>
                                            <option value="Región Los Lagos">Región Los Lagos</option>
                                            <option value="Directorio de Funcionarios">Directorio de Funcionarios</option>
                                            <option value="Infórmate aquí">Infórmate aquí</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="nombreUrl" name="nombreUrl" class="form-control" placeholder="Nombre de la Url" required>
                                    </div>
                                </div>
                                <div class="col-md-12 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="urk" name="url" class="form-control" placeholder="Url" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success" id="Enviar" name="Enviar">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
ClassicEditor
    .create(document.querySelector('#editor'), {
        allowedContent: true
    })
    .catch(error => {
        console.error(error);
    });
    ClassicEditor
    .create(document.querySelector('#editor1'), {
        allowedContent: true
    })
    .catch(error => {
        console.error(error);
    });
    ClassicEditor
    .create(document.querySelector('#editor2'), {
        allowedContent: true
    })
    .catch(error => {
        console.error(error);
    });
    ClassicEditor
    .create(document.querySelector('#editor3'), {
        allowedContent: true
    })
    .catch(error => {
        console.error(error);
    });
    ClassicEditor
    .create(document.querySelector('#editor4'), {
        allowedContent: true
    })
    .catch(error => {
        console.error(error);
    });
</script>