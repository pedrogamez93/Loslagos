<!-- resources/views/documentos/index.blade.php -->

@extends('layouts.app')

@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_funcionarios.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush
    
<div id="banner" class=" h-500  text-light" style="background-color: #389144 !important; height: 502px; display: flex;
    flex-wrap: wrap;
    align-content: center;
    align-items: center;
    padding-left: 50px;">
    <div>
        <h5>Home / Gobierno Regional</h5>
        <h1 class="titulofun">Funcionarios </h1>
        <p>Bases de Postulacion al Fondo de Fomento y Desarrollo / Resumen Gastos Año 2011</p>
    </div>
</div>

<div class="contenido h-800 " style=" margin-top: -9vh;
    background-color: white;
    border-top-left-radius: 90px;">
    <div class="row py-5">
        <div id="divformulario" class="col-md-8 col-lg-12" style="padding: 4%;">
        <p class="parrafo1 p-1">Infórmate sobre nuestra Región...</p>
            <h4 class="tituloform">Nuestro Directorio</h4>
            <p class="parrafo2 p-1">El objetivo del Directorio Funcionario Digital es el proveer servicios de información de los funcionarios públicos de la Región De Los Lagos para la institucionalidad pública regional y la comunidad en general.</p>
            <form action="{{ url('/funcionarios/buscar') }}" method="POST">
            @csrf
            <div class="row">
                    <div class="col-md-6">
                        <select class="form-select mt-4" aria-label="Default select example" name="categoria">
                                <option selected>Seleccione la Institución</option>
                                <option value="Categoria 1">Gobierno Regional de Los Lagos</option>
                            
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
            <div class="row">
                    <div class="col-md-6">
                    <select class="form-select mt-4" aria-label="Default select example" id="departamento" name="departamento" >
                <option value="" disabled selected>Seleccione Departamento</option>
                </select>
                    </div>
                    <div class="col-md-6">
                    <select class="form-select mt-4" aria-label="Default select example" name="categoria">
                        <option selected>Seleccione Sexo</option>
                        <option value="Categoria 1">Masculino</option>
                        <option value="Categoria 2">Femenino</option>
                    
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




<div class="row">

    <div class="col">
        <img src="{{ asset('storage/img/Rectangle190.png') }}"  alt="">
    </div>
    <div class="col">
        <h2>{{ $funcionario->nombre }}</h2>
    <p><span>Division:</span></p>
    <p><span>Departamento:</span></p>
    <p><span>Cargo:</span></p>
    <p><span>Direccion:</span></p>
    <p><span>Fono:</span></p>
    <p><span>E-mail:</span></p>
    <p><span>Region:</span></p>
    <p><span>Provincia</span>:</span></p>
    <p><span>Comuna:</span></p>
  
    </div>
</div>



<script>
    // En tu script JavaScript
    document.addEventListener('DOMContentLoaded', function () {
        var divisionSelect = document.getElementById('division');
        var departamentoSelect = document.getElementById('departamento');

        divisionSelect.addEventListener('change', function () {
            var selectedDivision = this.value;
            var departamentos = <?php echo json_encode($departamentos); ?>;

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
    });
</script>

@endsection
