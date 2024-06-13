<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>


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
                <h1>Editar pregunta Frecuente</h1>
            </div>
            <!-- Formulario para la edicion del programa -->
            <form action="{{ route('preguntas.update', ['pregunta' => $pregunta->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label class="mt-3 style-label required" for="pregunta">Pregunta:</label>
                <input class="form-control mt-2 mb-4" type="text" name="pregunta" value="{{ $pregunta->pregunta }}" placeholder="Título" required>

                <label class="style-label mb-2" for="respuesta">Respuesta:</label>
                <textarea class="form-control mt-2" placeholder="Escribe tu respuesta aquí" style="height: 250px"  id="editor" name="respuesta">{!! $pregunta->respuesta ?? '' !!}</textarea>

                <!-- Otros campos del formulario... -->

                <button class="btn btn-success mt-3" type="submit">Guardar cambios</button>
            </form>

            @if(session('mensaje'))
                <div class="alert alert-success mt-3">
                    {{ session('mensaje') }}
                </div>
            @endif
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
</script>
