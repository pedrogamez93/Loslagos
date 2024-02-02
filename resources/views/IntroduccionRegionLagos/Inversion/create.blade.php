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
                        <h1>Inversión Descripción General</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">

                <form action="{{ route('InversionesD.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="titulo" name="titulo1" class="form-control" placeholder="Título sección 1" required>
                                    </div>
                                </div>
                                <div class="col-md-12 tag-comentario">
                                    <div class=" mb-3">
                                    <textarea class="form-control" placeholder="Escribe tu contenido aquí" style="height: 250px"  id="editor" name="descripcionG"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 pt-3 pb-3">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label style-label">Selecciona una imagen para la sección</label>
                                                <input class="form-control" type="file" name="imagenD2" id="img" accept="image/*" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="titulo" name="titulo2" class="form-control" placeholder="Título sección 2" required>
                                    </div>
                                </div>
                                <div class="col-md-12 tag-comentario">
                                    <div class=" mb-3">
                                    <textarea class="form-control" placeholder="Escribe tu contenido aquí" style="height: 250px"  id="editor1" name="descripcionG2"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="titulo" name="titulo3" class="form-control" placeholder="Título sección 3" required>
                                    </div>
                                </div>
                                <div class="col-md-12 tag-comentario">
                                    <div class=" mb-3">
                                    <textarea class="form-control" placeholder="Escribe tu contenido aquí" style="height: 250px"  id="editor2" name="descripcionG3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 pt-3 pb-3">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label style-label">Selecciona una imagen para la sección</label>
                                                <input class="form-control" type="file" name="imagenD3" id="img" accept="image/*" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="titulo" name="titulo3acordeon1" class="form-control" placeholder="Título de Acordeon 1" required>
                                    </div>
                                </div>
                                <div class="col-md-12 tag-comentario">
                                    <div class=" mb-3">
                                    <textarea class="form-control" placeholder="Escribe tu contenido aquí" style="height: 250px"  id="editor3" name="acordeon1"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="titulo" name="titulo3acordeon2" class="form-control" placeholder="Título de Acordeon 2" required>
                                    </div>
                                </div>
                                <div class="col-md-12 tag-comentario">
                                    <div class=" mb-3">
                                    <textarea class="form-control" placeholder="Escribe tu contenido aquí" style="height: 250px"  id="editor4" name="acordeon2"></textarea>
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