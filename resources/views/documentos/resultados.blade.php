<!-- resources/views/documentos/resultados.blade.php -->

@extends('layouts.app')

@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_documentos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush
<div id="banner" class=" h-500  text-light" style="background-color: #F59120 !important; height: 502px; display: flex;
    flex-wrap: wrap;
    align-content: center;
    align-items: center;
    padding-left: 50px;">
    <div>
        <h5>Home / Gobierno Regional</h5>
        <h1 class="titulodoc">Documentos </h1>
        <p >Bases de Postulacion al Fondo de Fomento y Desarrollo / Resumen Gastos Año 2011</p>
    </div>
</div>

<div class="contenido" style=" margin-top: -6vh;
    background-color: white;
    border-top-left-radius: 90px;">
<div class="row py-5">
    <div id="divformulario" class="col-md-8 col-lg-9" style="padding: 4%;">
         <h4 class="tituloform">Selecciona la Categoría y Busca</h4>
         <form action="{{ url('/documentos/buscar') }}" method="POST">
         @csrf
            <select class="form-select mt-4" aria-label="Default select example" name="categoria">
                <option selected>Seleccione Categoria</option>
                <option value="Categoria 1">Categoria 1</option>
                <option value="Categoria 2">Categoria 2</option>
                <option value="Categoria 3">Categoria 3</option>
            </select>
            <input class="form-control mt-2" name="nombre" placeholder="Nombre del documento">
            <div class="pt-5" style="direction: rtl;">
            <button class="btn text-light" style="background-color: #F59120;">Buscar Ahora</button>
            </div>
            </form>
    </div>
    <div id="Docsparadesc" class="col-md-4 col-lg-3" style="border-left: 3px solid #F59120;padding: 3% 0% 0% 1%;">
    <h4 class="titulodocsdes">Documentos Regionales que puedes decargar:</h4>

    @foreach($documentos as $documento)
    <a href="{{ url('storage/' . $documento->archivo_path) }}" download>
    <div class="row divtitulodocsdes" >
       
            <img src="{{ asset('storage/img/iconodocpdf.png') }}" style="width: 65px;">
            <p>{{ $documento->nombre }}</p>
       
    </div>
    </a>
@endforeach

    </div>
</div>

    <div style="padding: 40px;">
        <!-- ... tu código existente ... -->


        @if($documentos->isEmpty())
            <p>No se encontraron documentos que coincidan con los criterios de búsqueda.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach($documentos as $documento)
                        <tr>
                            <a href="{{ $documento->archivo_path }}"> 
                                <td> <img src="{{ asset('storage/img/iconodocpdf.png') }}" style="width: 45px;"></td>
                                <td>{{ $documento->nombre }}</td>
                             
                                
                            </a>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <!-- ... tu código existente ... -->
    </div>
@endsection
</div>