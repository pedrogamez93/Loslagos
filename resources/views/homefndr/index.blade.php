<!DOCTYPE html>
<html lang="es">
<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/s8k6nnp5xwio3bml2pkpzbjl7oejngmdeyu8ujwbjzyvwmq4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script> src="https://cdn.tiny.cloud/1/no-origin/tinymce/5.10.9-138/tinymce.min.js" </script>
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
                        <h1>CREACIÓN INTRODUCCIÓN HOME FONDOS CONCURSABLES</h1>
                    </div>
                </div>
                <div class="container mt-5">
    <h1>Último Registro de Homefndr</h1>
    @if($ultimoHomefndr)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $ultimoHomefndr->titulo }}</h5>
                @if($ultimoHomefndr->bajada)
                    <h6 class="card-subtitle mb-2 text-muted">{{ $ultimoHomefndr->bajada }}</h6>
                @endif
                @if($ultimoHomefndr->descripcion)
                <p class="card-text">{!! $ultimoHomefndr->descripcion !!}</p>
                                @endif
            </div>
        </div>
        <a href="{{ route('homefndr.edit', $ultimoHomefndr->id) }}" class="btn btn-primary">Editar</a>
    @else
        <p>No hay registros aún. <a href="{{ route('homefndr.create') }}" class="btn btn-primary">Crear Nuevo</a></p>
    @endif
</div>
            </div>
        </div>
    </div>
</div>
</html>

<script>
  tinymce.init({
    selector: '#editor', // Ajustado para apuntar específicamente al textarea con el ID 'editor'
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
</script>

