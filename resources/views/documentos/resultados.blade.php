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
                <select class="form-select mt-4" aria-label="Default select example" name="tipo_documento">
                    <option value="">Seleccione Categoria</option>
                    <option value="Acta">Actas</option>
                    <option value="Acuerdo">Acuerdos</option>
                    <option value="Resumen Gastos">Resumen de Gastos</option>
                    <option value="Documento General">Documentos Generales</option>
                </select>
                <input class="form-control mt-2" name="nombre" placeholder="Nombre del documento">
                <div class="pt-5" style="direction: rtl;">
                    <button class="btn text-light" style="background-color: #F59120;">Buscar Ahora</button>
                </div>
            </form>
    </div>
    <div id="Docsparadesc" class="col-md-4 col-lg-3" style="border-left: 3px solid #F59120;padding: 3% 0% 0% 1%;">
    <h4 class="titulodocsdes">Documentos Regionales que puedes decargar:</h4>

  
    @foreach ($ultimosDocumentos as $documento)
   
        <li class="mt-3">
            <a href="{{ route('descargar.archivo', ['archivo' => str_replace('public/documentos/', '', $documento->archivo)]) }}">
                <div class="row divtitulodocsdes">
                    <img src="{{ asset('storage/img/iconodocpdf.png') }}" style="width: 65px;">
                    <p>{{ $documento->archivo }}</p>
                </div>
            </a>
        </li>
 

        @endforeach


        <ul class="list-unstyled">
    @php $contador = 0; @endphp
    @foreach($ultimosDocumentos as $documento)
        @if($documento->portada == 'si')
            @if($contador < 5)
                @php
                    // Obtener solo el nombre del archivo después de 'documentos/'
                    $archivo_mostrado = str_replace('documentos/', '', $documento->archivo);
                @endphp

                <li class="mt-3">
                    <a href="{{ url('storage/' . $documento->archivo_path) }}" download>
                        <div class="row divtitulodocsdes">
                            <img src="{{ asset('storage/img/iconodocpdf.png') }}" style="width: 65px;">
                            <p>{{ $archivo_mostrado }}</p>
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
                    @foreach($documentos as $documento2)
                        <tr>
                            <td class="colorB" style="padding-top: 4%;">
                            <a href="{{ route('documentos.download', $documento2->id) }}">
                                <img src="{{ asset('storage/img/iconodocpdf.png') }}" style="width: 45px;">
                            </a>
                            </td>
                            <td class="colorB">
                                <a href="{{ route('documentos.download', $documento2->id) }}">
                                    Nombre de archivo: {{ $documento2->archivo }}<br>
                                    Tipo de documento: {{ $documento2->tipo_documento }}<br>
                                    Provincia: {{ $documento2->provincia }}<br>
                                    Comuna: {{ $documento2->comuna }}<br>
                                    Tema: {{ $documento2->tema }}<br>
                                    Fecha: {{ date('Y-m-d', strtotime($documento2->fecha_hora)) }}<br>
                                    Lugar: {{ $documento2->lugar ?? 'N/A' }}<br>
                                    Número de sesión: {{ $documento2->numero_sesion }}<br>
                                    
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination mb-5" style="justify-content: center;">
          
                {!! $documentos->links() !!}
            </div>
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