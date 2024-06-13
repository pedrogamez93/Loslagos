<!-- resources/views/documentos/index.blade.php -->

@extends('layouts.app')

@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_funcionarios.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush
    
<div id="banner" class=" h-500  text-light colorB" style="">
    <div class="container">
        <h5>Home / Directorio funcionarios</h5>
        <h1 class="titulofun" style="text-align: left;">Funcionarios </h1>
        <p>Proveer servicios de información de los funcionarios públicos de la Región De Los Lagos</p>
    </div>
</div>

<div class="contenido h-800 colorB seleccionycategoria" >
    <div class="container py-3">
        <div id="divformulario" class="col-md-8 col-lg-12" style="padding: 6%;">
        <p class="parrafo1 p-1">Infórmate sobre nuestra Región...</p>
            <h4 class="tituloform">Nuestro Directorio</h4>
            <p class="parrafo2 p-1">El objetivo del Directorio Funcionario Digital es el proveer servicios de información de los funcionarios públicos de la Región De Los Lagos para la institucionalidad pública regional y la comunidad en general.</p>
            <form action="{{ url('/funcionarios/buscar') }}" method="POST">
            @csrf
            <div class="row">
            <div class="col-md-6">
                    <select class="form-select mt-4" aria-label="Default select example" id="departamento" name="departamento" >
               
                    <option value="" disabled selected>Seleccione Departamento</option>
                    @foreach ($departamentos as $departamento)
                    <option value="{{ $departamento }}">{{ $departamento }}</option>
                    @endforeach
                </select>
                    </div>

                    <div class="col-md-6">
                    <select class="form-select mt-4" aria-label="Default select example" id="division" name="division" >
                        
                    <option value="" disabled selected>Seleccione División</option>
                    @foreach ($divisiones as $division)
                    <option value="{{ $division }}">{{ $division }}</option>
                    @endforeach
                    </select>
                    </div>

            </div>
            
            
            
            
            
                <input class="form-control mt-2" name="nombre" placeholder="Ingrese Nombre y/o Apellido de Funcionario">
                <div class="pt-5" style="direction: rtl;">
                <button class="btn text-light" style="background-color: #F59120;">Buscar Ahora</button>
                </div>
                </form>
        </div>
        
    </div>
</div>



<script>
    // En tu script JavaScript
   /* document.addEventListener('DOMContentLoaded', function () {
        var divisionSelect = document.getElementById('division');
        var departamentoSelect = document.getElementById('departamento');

        divisionSelect.addEventListener('change', function () {
            var selectedDivision = this.value;
            var departamentos = <?php //echo json_encode($departamentos); ?>;

            // Limpiar opciones anteriores
            departamentoSelect.innerHTML = '<option value="" disabled selected>Seleccione Departamento</option>';

            // Agregar nuevas opciones
            if (departamentos[selectedDivision]) {
                departamentos[selectedDivision].forEach(function (departamento) {
                    var option = document.createElement('option');
                    option.value = departamento;
                    option.text = departamento;
                    departamentoSelect.add(option);
                });
                departamentoSelect.disabled = false; // Habilitar el segundo select
            } else {
                departamentoSelect.disabled = true; // Deshabilitar si no hay departamentos
            }
        });
    }); */
</script>

@endsection
