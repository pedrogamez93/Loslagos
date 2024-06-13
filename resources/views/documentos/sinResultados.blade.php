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
    <div class="container ">
        <h5>Home / Documentos</h5>
        <h1 class="titulodoc" style="text-align: left;">Documentos </h1>
        <p >Bases de Postulacion al Fondo de Fomento y Desarrollo / Resumen Gastos Año 2011</p>
    </div>
</div>

<div class="contenido" style=" margin-top: -7vh;
    background-color: white;
    border-top-left-radius: 80px;">
<div class="row py-5 px-5">
    <div id="divformulario" class="col-md-8 col-lg-9" style="padding: 4%;">
         <h4 class="tituloform mb-5">Sin Resultados</h4>
         
         <a  class="mt-5 btn btn-primary" href="{{ url('/documentos') }}" > Clic aqui para Volver </a>
         
 

       
           



    </div>
</div>

<script>
   
   document.addEventListener("DOMContentLoaded", function() {
     
       document.querySelector('.nav-head').style.setProperty('background-color', '#F59120', 'important');
       document.querySelector('.backgroundB').style.setProperty('background-color', '#F59120', 'important');
   });
</script>
@endsection
</div>