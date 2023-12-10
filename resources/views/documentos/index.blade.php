<!-- resources/views/documentos/index.blade.php -->

@extends('layouts.app')

@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_documentos.css') }}" rel="stylesheet">
@endpush
    
<div id="banner" class=" h-500  text-light" style="background-color: #F59120 !important; height: 502px;">
    <div>
        <h5>Home / Gobierno Regional</h5>
        <h1>Documentos </h1>
        <p>Bases de Postulacion al Fondo de Fomento y Desarrollo / Resumen Gastos Año 2011</p>
    </div>
</div>

<div class="row">
    <div id="divformulario" class="col">
         <p class="tituloform">Selecciona la Categoría y Busca</p>
            <select class="form-select mt-4" aria-label="Default select example" name="categoria">
                <option selected>Seleccione Categoria</option>
                <option value="Categoria 1">Categoria 1</option>
                <option value="Categoria 2">Categoria 2</option>
                <option value="Categoria 3">Categoria 3</option>
            </select>
            <input class="form-control mt-2">
    </div>
    <div id="Docsparadesc" class="col">

    </div>
</div>

@endsection
