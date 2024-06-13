<!-- resources/views/documentos/index.blade.php -->

@extends('layouts.app')

@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_funcionarios.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush
    

    <div id="banner" class=" h-500  text-light colorB" style="background-color: #389144 ; height: 502px; display: flex;
        flex-wrap: wrap;
        align-content: center;
        align-items: center;
        padding-left: 50px;">
        <div class="container">
            <h5>Home / Directorio funcionarios</h5>
            <h1 class="titulofun" style="text-align: left;">Funcionarios </h1>
            <p>Proveer servicios de información de los funcionarios públicos de la Región De Los Lagos</p>
        </div>
    </div>

    <div class="contenido colorB" style=" margin-top: -6vh;
    background-color: white;
    border-top-left-radius: 90px; padding-right: 10rem!important;
    padding-left: 10rem!important;">
        <div class="row py-5">
            <div id="divformulario" class="col-md-8 col-lg-12" style="padding: 4%;">
            <p class="parrafo1 p-1 colorB">Infórmate sobre nuestra Región...</p>
                <h4 class="tituloform colorB">Nuestro Directorio</h4>
                <p class="parrafo2 p-1 colorB">El objetivo del Directorio Funcionario Digital es el proveer servicios de información de los funcionarios públicos de la Región De Los Lagos para la institucionalidad pública regional y la comunidad en general.</p>
                <form action="{{ url('/funcionarios/buscar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <div class="col-md-6">
                        <select class="form-select mt-4" aria-label="Default select example" id="departamento" name="departamento" >
                    <option value="" disabled selected>Seleccione Departamento</option>
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
   
  
        <div class="row p-5">
            @foreach($funcionarios as $funcionario)
        
       
                <div class="col-md-4">
                <a href="{{ route('funcionarios.show', ['id' => $funcionario->id]) }}" style="margin-bottom:15px">
                        <div class=" divtitulodocsdes"  style="display: inline-flex; padding-bottom: 50px;" >
                                    
                        <div >
                       
<img  src="{{ route('mostrar.imagen', ['carpeta' => 'funcionarios', 'imagen' => basename($funcionario->foto)]) }}" alt="" style="max-width: 100px;
    height: 100px;
    border-radius: 50%;
    overflow: hidden;
"> </div>
                                <div style="padding-left:3%">
                                <p  class="tituloresultadobuscador1 colorB">{{ $funcionario->nombre }}</p>
                                <p class="textoresultadobuscador1 colorB ">Institucion: <span class="textoresultadobuscador2 colorB">Gobierno Regional de Los Lagos</span></p>
                                <p class="textoresultadobuscador1 colorB">Cargo: <span class="textoresultadobuscador2 colorB"> {{ $funcionario->cargo }}</span></p>
                                <p class="textoresultadobuscador1 colorB">departamento: <span class="textoresultadobuscador2 colorB"> {{ $funcionario->departamento }}</span></p>   
                                <p class="textoresultadobuscador1 colorB">Correo: <span class="textoresultadobuscador2 colorB"> {{ $funcionario->correo }}</span></p>
                                <p class="textoresultadobuscador1 colorB">Division: <span class="textoresultadobuscador2 colorB"> {{ $funcionario->division }}</span></p>
                                <p class="textoresultadobuscador1 colorB">Direccion: <span class="textoresultadobuscador2 colorB"> {{ $funcionario->direccion }}</span></p>
                               
                            </div>
                            
                        
                        </div>
                        </a>
                </div> 

            
        
                
            @endforeach
            </div>
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
