<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link href="{{ asset('css/estilos_documentos.css') }}" rel="stylesheet">
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<style>
    h1{
        color: #565656;
        font-weight: 600;
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
    p.finalp{
        font-family: 'Inter';
        font-Weight: 600;
        font-Size: 20px;
        color: #565656;
    }
    #searchResults {
    list-style: none;
    margin: 0;
    padding: 0;
    background: white;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    border-radius: 4px;
    max-height: 200px;
    overflow-y: auto;
}

#searchResults li {
    padding: 10px 20px;
    border-bottom: 1px solid #EEE;
    cursor: pointer;
    transition: background-color 0.2s;
}

#searchResults li:last-child {
    border-bottom: none;
}

#searchResults li:hover {
    background-color: #F6F6F6;
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
                        <h1>Landings Pages</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                    <div class="row">
                        <div class="col">
                            <h1>Listado de Landings Pages</h1>
                        </div>
                        <div class="col text-start">
                            <a href="{{ route('landings.create') }}" class="btn btn-success" style="font-weight: 600;">Agregar Nuevo Landing Page.</a>
                        </div>
                        {{-- Agregar un buscador arriba --}}

                        <!-- Input para el autocompletado -->
                        <div class="container mt-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" id="searchBox" class="form-control" placeholder="Buscar por título..." />
                                </div>
                            </div>
                        </div>
                        <div class="container mt-1">
                            <div class="row">
                                <div class="col-md-6">
                                <!-- Lista para mostrar los resultados del autocompletado -->
                                <ul id="searchResults" class="list-unstyled"></ul>
                                </div>
                            </div>
                        </div>

                        @if(count($landings) > 0)
                            <div class="container">
                                <ul style="padding-left: 0;">
                                    @foreach($landings as $landing)
                                    <li class="form-control milist mt-4 mb-4">
                                    <p class="finalp">Titulo: <span>{{ $landing->titulo }}</span></p>
                                        <p class="finalp">Ubicación: 
                                            @switch($landing->menu_ubicacion)
                                                @case('gobierno-regional')
                                                    Gobierno Regional
                                                    @break
                                                @case('consejo-regional')
                                                    Consejo Regional
                                                    @break
                                                @case('region-los-lagos')
                                                    Región Los Lagos
                                                    @break
                                                @default
                                                    No especificada
                                            @endswitch
                                        </p>
                                        <p class="finalp">Habilitado: {{ $landing->habilitado ? 'Sí' : 'No' }}</p>
                                        <a href="{{ route('landings.edit', $landing->id) }}" class="btn btn-primary" style="font-weight: 600;">Ver Landing</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            {{-- Agregar paginación abajo --}}
                            <div class="mt-4">
                                {{ $landings->appends(request()->except('page'))->links() }}
                            </div>
                        @else
                            <p class="mip mt-4">No hay Landings Pages disponibles.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
    $('#searchBox').on('input', function() {
        var query = $(this).val();

        // Verifica si la query no está vacía para evitar búsquedas innecesarias
        if(query.length > 2) { // Por ejemplo, solo busca si el usuario ha escrito al menos 3 caracteres
            $.ajax({
                url: '/search-landings', // Utiliza la ruta definida en Laravel
                type: 'GET',
                data: { 'query': query },
                success: function(data) {
                    $('#searchResults').empty(); // Limpia los resultados anteriores

                    $.each(data, function(i, item) {
                        // Construye cada enlace con la URL de edición y lo agrega a los resultados
                        var link = $('<a>').attr('href', item.edit_url).text(item.titulo);
                        var listItem = $('<li>').append(link);
                        $('#searchResults').append(listItem);
                    });

                    if(data.length === 0) {
                        // Si no hay resultados, muestra un mensaje
                        $('#searchResults').append('<li>No se encontraron resultados</li>');
                    }
                },
                error: function() {
                    // Manejo de error en la solicitud AJAX
                    $('#searchResults').empty(); // Limpia resultados antiguos
                    $('#searchResults').append('<li>Error al buscar</li>');
                }
            });
        } else {
            $('#searchResults').empty();
        }
    });
});
</script>