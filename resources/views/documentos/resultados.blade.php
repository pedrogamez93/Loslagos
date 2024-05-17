<!-- resources/views/documentos/resultados.blade.php -->

@extends('layouts.app')

@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_documentos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush
<div id="banner" class=" h-500  text-light colorB" style=" height: 502px; display: flex;
    flex-wrap: wrap;
    align-content: center;
    align-items: center;
    padding-left: 50px;">
    <div class="container">
        <h5>Home / Documentos</h5>
        <h1 class="titulodoc" style="text-align: left;">Documentos </h1>
        <p >Bases de Postulacion al Fondo de Fomento y Desarrollo / Resumen Gastos Año 2011</p>
    </div>
</div>

<div class="contenido colorB" style=" margin-top: -7vh;
    background-color: white;
    border-top-left-radius: 80px;">
<div class="row py-5 px-5" style="    padding-right: 10rem!important;
    padding-left: 10rem!important;">
    <div id="divformulario" class="col-md-8 col-lg-9" style="padding: 4%;">
         <h4 class="tituloform">Selecciona la Categoría y Busca</h4>
         <form action="{{ url('/documentos/buscar') }}" method="POST">
         @csrf
            <select class="form-select mt-4" aria-label="Default select example" name="categoria">
            <option value="Actas">Actas</option>
                                    <option value="Acuerdos">Acuerdos</option>
                                    <option value="Resumengastos">Resumen de Gastos</option>
                                    <option value="Documentogeneral">Documento General</option>
            </select>
            <input class="form-control mt-2" name="nombre" placeholder="Nombre del documento">
            <div class="pt-5" style="direction: rtl;">
            <button class="btn text-light" style="background-color: #F59120;">Buscar Ahora</button>
            </div>
            </form>
    </div>
    <div id="Docsparadesc" class="col-md-4 col-lg-3" style="border-left: 3px solid #F59120;padding: 3% 0% 0% 1%;">
    <h4 class="titulodocsdes">Documentos Regionales que puedes decargar:</h4>

    <ul class="list-unstyled">
        @php $contador = 0; @endphp
@foreach($documentos as $documento)
    @if($documento->portada == 'si')
        @if($contador < 5)
            <li class="mt-3">
                <a href="{{ url('storage/' . $documento->archivo_path) }}" download>
                    <div class="row divtitulodocsdes">
                        <img src="{{ asset('storage/img/iconodocpdf.png') }}" style="width: 65px;">
                        <p>{{ $documento->archivo }}</p>
                    </div>
                </a>
            </li>
            @php $contador++; @endphp
        @else
            @break
        @endif
    @endif
@endforeach

        </ul>

    </div>
</div>

    <div style="padding-right: 10rem!important;
    padding-left: 10rem!important;">
        <!-- ... tu código existente ... -->


        @if($documentos->isEmpty())
            <p>No se encontraron documentos que coincidan con los criterios de búsqueda.</p>
        @else
            <table class="table">
                <thead class="colorB">
                    <tr>
                        <th class="colorB"></th>
                        <th class="colorB"></th>
                        <th class="colorB"></th>
                      
                    </tr>
                </thead>
                <tbody>
                @foreach($documentos as $documento)
    <tr >
   
        <td class="colorB">
        <a href="{{ route('descargar.archivo', ['archivo' => str_replace('public/documentos/', '', $documento->archivo)]) }}">
                <img src="{{ asset('storage/img/iconodocpdf.png') }}" style="width: 45px;">
                
        </td>
        <td class="colorB">
        <a href="{{ route('descargar.archivo', ['archivo' => str_replace('public/documentos/', '', $documento->archivo)]) }}">    
        {{ $documento->id }} {{ $documento->tipo_documento }}</td>
        </a>
    </tr>
@endforeach

                </tbody>
            </table>
        @endif
        <!-- ... tu código existente ... -->
    </div>

    <script>
   
    document.addEventListener("DOMContentLoaded", function() {
      
        document.querySelector('.nav-head').style.setProperty('background-color', '#F59120');
        document.querySelector('.backgroundB').style.setProperty('background-color', '#F59120');
    });
</script>



@endsection
</div>