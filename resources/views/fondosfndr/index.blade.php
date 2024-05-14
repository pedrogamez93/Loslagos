
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fondos concursables</title>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap CSS y JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/s8k6nnp5xwio3bml2pkpzbjl7oejngmdeyu8ujwbjzyvwmq4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script> src="https://cdn.tiny.cloud/1/no-origin/tinymce/5.10.9-138/tinymce.min.js" </script>

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
                            
                            <div class="row justify-content-between">
    <div class="col-4">
    <h1>Fondos concursables</h1>
    </div>
    <div class="col-4" style="text-align: -webkit-right;">
    <a class="mb-2 btn btn-primary" href="{{ url('/fondosfndr/create') }}">Crear fondo</a>
    </div>
  </div>
                        </div>
                    </div>
                    <div class="container first-form pt-2 pb-2">
                        <div class="row">

                        <div class="container">
    <h1>Listado de Fondos</h1>
    @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
    @if ($fondos->isEmpty())
        <p>No se encontraron fondos.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Bajada</th>
                    <th>Descripción</th>
                    <th>Nota</th>
                    <th>Acciones</th> <!-- Nueva columna para acciones -->
                </tr>
            </thead>
            <tbody>
                @foreach ($fondos as $fondo)
                    <tr>
                        <td>{{ $fondo->titulo }}</td>
                        <td>{{ $fondo->bajada }}</td>

                        <td>{!! $fondo->descripcion ?? '' !!}</td>

                        <td>{!! $fondo->nota ?? '' !!}</td>

                        <td>
                            <a href="{{ route('fondosfndr.edit', $fondo) }}" class="btn btn-primary mb-2">Editar</a>
                            <form action="{{ route('fondosfndr.destroy', $fondo) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>



                            <!-- index.blade.php -->


                        </div>
                    </div>
</html>     
    <script>
        tinymce.init({
            selector: '#desc', // Ajustado para apuntar específicamente al textarea con el ID 'editor'
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
            selector: '#nota', // Ajustado para apuntar específicamente al textarea con el ID 'editor'
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
               
                
