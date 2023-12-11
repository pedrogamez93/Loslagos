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
        <h1 class="titulodoc">Funcionarios </h1>
        <p>Bases de Postulacion al Fondo de Fomento y Desarrollo / Resumen Gastos Año 2011</p>
    </div>
</div>

<div class="row py-5">
    <div id="divformulario" class="col-md-8 col-lg-12" style="padding: 4%;">
    <p class="parrafo1">Infórmate sobre nuestra Región...</p>
         <h4 class="tituloform">Nuestro Directorio</h4>
         <p class="parrafo2">El objetivo del Directorio Funcionario Digital es el proveer servicios de información de los funcionarios públicos de la Región De Los Lagos para la institucionalidad pública regional y la comunidad en general.</p>
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
                <select class="form-select mt-4" aria-label="Default select example" name="categoria">
                    
                    <option value="">Seleccione Division</option>
                    <option value="1">División de Administración y Finanzas</option>
                    <option value="2">División de Presupuesto e Inversión Regional</option>
                    <option value="3">División Planificación y Desarrollo Regional</option>
                    <option value="4">Consejo Regional</option>
                    <option value="5">Intendencia</option>
                    <option value="6">Gabinete Intendente Regional</option>
                    <option value="7">División de Fomento e Industria</option>
                    <option value="8">División de Desarrollo Social y Humano</option>
                    <option value="9">División de Infraestructura y Transporte</option>
                    <option value="10">Administrador Regional</option>
                    <option value="11">Gobernador Regional</option>

                </select>
                </div>

         </div>
         <div class="row">
                <div class="col-md-6">
                    <select class="form-select mt-4" aria-label="Default select example" name="categoria">
                            <option selected>Seleccione el Departamento</option>
                            <option value="Categoria 1">Categoria 1</option>
                            <option value="Categoria 2">Categoria 2</option>
                            <option value="Categoria 3">Categoria 3</option>
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

@endsection
