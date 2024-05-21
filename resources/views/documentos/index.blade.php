<!-- resources/views/documentos/index.blade.php -->

@extends('layouts.app')

@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_documentos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush
    
<div id="banner" class=" h-500  text-light d-flex align-items-center colorB" style="">
    <div class="container">
        <h5>Home / Documentos</h5>
        <h1 class="titulodoc" style="text-align: left;">Documentos </h1>
        <p>Bases de Postulacion al Fondo de Fomento y Desarrollo / Resumen Gastos Año 2011</p>
    </div>
</div>

<div class="contenido bg-white rounded-left rounded-top-left-90 mt-n6 colorB" style="height: 800px; margin-top: -7vh;border-radius: 70px 0px 0px 0px;">
    <div class="row py-5 colorB" style="padding-right: 10rem!important; padding-left: 10rem!important;">
        <div id="divformulario" class="col-md-8 col-lg-9" style="padding: 4%;">
            <h4 class="tituloform">Selecciona la Categoría y Busca</h4>
            <form action="{{ url('/documentos/buscar') }}" method="POST">
                @csrf
                <select class="form-select mt-4" aria-label="Default select example" name="tipo_documento">
                    <option value="">Seleccione Categoria</option>
                    <option value="Actas">Actas</option>
                    <option value="Acuerdos">Acuerdos</option>
                    <option value="Resúmen Gastos">Resumen de Gastos</option>
                    <option value="Documento general">Documento General</option>
                </select>
                <input class="form-control mt-2" name="nombre" placeholder="Nombre del documento">
                <div class="pt-5" style="direction: rtl;">
                    <button class="btn text-light" style="background-color: #F59120;">Buscar Ahora</button>
                </div>
            </form>
        </div>

        <div id="Docsparadesc" class="col-md-4 col-lg-3 pt-3 ps-4" style="border-left: 3px solid #F59120;">
            <h4 class="titulodocsdes mb-3">Documentos Regionales que puedes descargar:</h4>
            <ul class="list-unstyled">
                @php $contador = 0; @endphp
                @foreach($documentos as $documento)
                    @if($documento->portada == 'si')
                        @if($contador < 5)
                            <li class="mt-3">
                                <a href="{{ route('descargar.archivo', ['archivo' => str_replace('public/documentos/', '', $documento->archivo)]) }}">
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
</div>


<script>
   
    document.addEventListener("DOMContentLoaded", function() {
      
        document.querySelector('.nav-head').style.setProperty('background-color', '#F59120');
        document.querySelector('.backgroundB').style.setProperty('background-color', '#F59120');
    });
</script>

@endsection
