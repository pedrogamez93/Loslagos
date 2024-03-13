<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
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
<div class="container-fluid body">
    <div class="row">
        <div class="col-md-2 style-col-menu">
            <div class="container menu">
                @include('layouts.menu') 
            </div>
        </div>
        <div class="col-md-10">
            <div class="container">

                <h1>Listado de Autoridades</h1>
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('AutoridadesRegionLagos.createAutoridades') }}" class="btn btn-primary">Crear Autoridad</a>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('buscarAutoridades.show') }}" method="GET">
                            <input type="text" name="query" placeholder="Buscar..." class="form-control" style="float: left;width: auto;">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </form>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cargo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articulo as $art)
                        <tr>
                            <td>{{ $art->nombre }}</td>
                            <td>{{ $art->cargo }}</td>
                            <td>
                                <a href="{{ route('AutoridadesRegionLagos.editAutoridades', $art->id) }}" class="btn btn-warning">Editar</a>
                                
                                <form method="POST" action="{{ route('AutoridadesRegionLagos.destroyAutoridades', $art->id) }}"  style="display: inline;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

