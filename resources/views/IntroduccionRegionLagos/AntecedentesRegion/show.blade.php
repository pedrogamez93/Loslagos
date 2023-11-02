<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<div class="container">
    <h1>Listado de Artículos</h1>
    <a href="{{ route('AntecedentesRegionLagos.createAntecedentes') }}" class="btn btn-primary">Crear Artículo</a>

    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Subtítulo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articulo as $arti)
            <tr>
                <td>{{ $arti->nombreseccion }}</td>
                <td>{{ $arti->subtitulo }}</td>
                <td>
                    <a href="{{ route('AntecedentesRegionLagos.showAntecedentes', $arti->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('AntecedentesRegionLagos.editAntecedentes', $arti->id) }}" class="btn btn-warning">Editar</a>
                    
                    <form method="POST" action="{{ route('AntecedentesRegionLagos.destroyAntecedentes', $arti->id) }}"  style="display: inline;">
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

