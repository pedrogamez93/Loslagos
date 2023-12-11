<!-- resources/views/documentos/resultados.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container-fluid body">
        <!-- ... tu código existente ... -->
        <h1>Resultados de la Búsqueda</h1>

        @if($documentos->isEmpty())
            <p>No se encontraron documentos que coincidan con los criterios de búsqueda.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Categoría</th>
                        <th>Archivo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($documentos as $documento)
                        <tr>
                            <td>{{ $documento->nombre }}</td>
                            <td>{{ $documento->categoria }}</td>
                            <td>{{ $documento->archivo_path }}</td> <!-- Ajusta según tu estructura -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <!-- ... tu código existente ... -->
    </div>
@endsection
