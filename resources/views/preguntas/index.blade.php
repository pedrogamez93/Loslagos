<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas Frecuentes</title>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap CSS y JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

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
    <h1>Preguntas frecuentes</h1>
    </div>
    <div class="col-4" style="text-align: -webkit-right;">
    <a class="mb-2 btn btn-primary" href="{{ url('/preguntas/create') }}">Nueva Pregunta</a>
    </div>
  </div>
                        </div>
                    </div>
                    <div class="container first-form pt-2 pb-2">
                        <div class="row">
                            <h2>Listado de Preguntas</h2>

                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Pregunta</th>
                                        <th>Respuesta</th>
                                        <!--<th>Imagen</th>-->
                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($preguntas as $pregunta)
                                        <tr>
                                            <td>{{ $pregunta->id }}</td>
                                            <td>{{ $pregunta->pregunta }}</td>
                                            <td>{{ $pregunta->respuesta }}</td>
                                            <td>
                
<a href="{{ route('preguntas.edit', ['pregunta' => $pregunta->id]) }}" class="mb-2 btn btn-primary">
    Editar
</a>
            

            <form action="{{ url('/preguntas/' .$pregunta->id ) }}" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar" class="btn btn-primary"> 

            </form>

            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div
