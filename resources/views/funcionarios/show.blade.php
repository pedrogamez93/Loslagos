<!-- resources/views/documentos/index.blade.php -->

@extends('layouts.app')

@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_funcionarios.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush

<div id="banner" class="h-500 text-light colorB" style="background-color: #389144; height: 502px; display: flex; flex-wrap: wrap; align-content: center; align-items: center; padding-left: 50px;">
    <div class="container">
        <h5>Home / Directorio funcionarios</h5>
        <h1 class="titulofun" style="text-align: left;">Funcionarios</h1>
        <p>Proveer servicios de información de los funcionarios públicos de la Región De Los Lagos</p>
    </div>
</div>

<div class="contenido colorB" style="margin-top: -6vh; background-color: white; border-top-left-radius: 90px; padding-right: 10rem!important; padding-left: 10rem!important;">
    <div class="row py-5">
        <div id="divformulario" class="col-12" style="padding: 4%;">
            <p class="parrafo1 p-1 colorB">Infórmate sobre nuestra Región...</p>
            <h4 class="tituloform colorB">Nuestro Directorio</h4>
            <p class="parrafo2 p-1 colorB">El objetivo del Directorio Funcionario Digital es el proveer servicios de información de los funcionarios públicos de la Región De Los Lagos para la institucionalidad pública regional y la comunidad en general.</p>
        </div>
    </div>

    <div class="row p-5">
        <div class="col-md-4">
            @if ($funcionario->foto)
                <img src="{{ route('mostrar.imagen', ['carpeta' => 'funcionarios', 'imagen' => basename($funcionario->foto)]) }}" alt="" class="img-fluid rounded-circle" style="max-width: 300px; height: 300px;">
            @else
                <img src="{{ asset('images/Rectangle190.png') }}" alt="Imagen por defecto" class="img-fluid rounded-circle" style="max-width: 300px; height: 300px;">
            @endif
        </div>
        <div class="col-md-8">
            <p class="fs-1 nombredetallado colorB">{{ $funcionario->nombre }}</p>
            <p><span class="spandetallado colorB">Division:</span> {{ $funcionario->division }}</p>
            <p><span class="spandetallado colorB">Departamento:</span> {{ $funcionario->departamento }}</p>
            <p><span class="spandetallado colorB">Cargo:</span> {{ $funcionario->cargo }}</p>
            <p><span class="spandetallado colorB">Direccion:</span> {{ $funcionario->direccion }}</p>
            <p><span class="spandetallado colorB">Fono:</span> {{ $funcionario->telefono }}</p>
            <p><span class="spandetallado colorB">Correo Electrónico:</span> {{ $funcionario->email }}</p>
            <p><span class="spandetallado colorB">Region:</span> {{ $funcionario->region }}</p>
            <p><span class="spandetallado colorB">Provincia:</span> {{ $funcionario->provincia }}</p>
        </div>
    </div>

    <!-- Botón para retroceder a la página anterior -->
    <div class="row">
        <div class="col-12 text-center mt-4 mb-5">
            <a href="/funcionario" class="btn "> <i class="bi bi-arrow-left-short" style="font-size: 20px;"></i>Retroceder</a>
        </div>
    </div>
</div>

@endsection