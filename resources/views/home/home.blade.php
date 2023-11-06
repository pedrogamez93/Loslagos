

@extends('layouts.app')

@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_home.css') }}" rel="stylesheet">
@endpush

  <div class="d-flex h-300 text-center " style="height: 700px; background-color: #389144;">
   

    

    
<div class="mt-5 cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  
<main class="px-3">
    <div class="row">
        <div class="col">
            <div class="input-group rounded">
            <div class="position-absolute mt-2">
                    <span class="" style="background-color: transparent; border: none; ">
                        <i class="bi bi-search"></i>
                    </span>
                </div>
                <input type="text" class="form-control rounded-right" placeholder="Buscar" aria-label="Buscar" style="border-radius: 0px 12px 12px 0px; padding-left: 40;">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary rounded-left" type="button" style="border-radius: 18px">Buscar</button>
                </div>
            </div>
        </div>
        <div class="col">
    <div class="d-flex ">
        <img src="{{ asset('storage/img/Rectangle13.png') }}" alt="Rectangle13" style="margin-right: 5px;height: 350px;margin-top: 30px;">
        <img src="{{ asset('storage/img/Rectangle14.png') }}" alt="Rectangle14" style="height: 380px;">
    </div>
</div>

    </div>
</main>



  
</div>
  </div>
<!--seccion de sala de prensa y tramite -->
  <div class="" style="width: 100%;
    padding: 50px;
    margin: 0px;
    border-radius: 35px 0px 0px 0px !important;
    background-color: white;
    position: absolute;
    margin-top: -5vh;">
    <div  class="d-flex justify-content-between">
        <h3 style="">Sala de prensa</h3>
        <div>
                <button type="button" class="btn btn-outline-warning" style="border-radius: 100px;">
                Galeria Fotografica
                </button >
                <button type="button" class="btn btn-outline-warning" style="border-radius: 100px;"> 
                    Videos
                </button>
        </div>
    </div>

    <div  class="d-flex justify-content-between">
        <h3 style="">Tramites Digitales</h3>
        <div>
                <button type="button" class="btn btn-outline-warning" style="border-radius: 100px;">
                Galeria Fotografica
                </button >
                <button type="button" class="btn btn-outline-warning" style="border-radius: 100px;"> 
                    Videos
                </button>
        </div>
    </div>
    
  </div>


<!--Banner-->
  <div class="col-md-12" style="height: 100%; margin-top: 12vw; background-color:#D9D9D980" id="banner">
        <div class="h-200 p-5 bg-body-tertiary border rounded-3"  id="banner">
          <h2>Add borders</h2>
          <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure to look under the hood at the source HTML here as we've adjusted the alignment and sizing of both column's content for equal-height.</p>
          <button class="btn btn-outline-secondary" type="button">Example button</button>
        </div>
      </div>
 </div>

<!--Cuadro dentro del banner-->
<div class="row">
    <div class="col-md-4" style="height: 100%; margin-top: 12vw; background-color:#D9D9D980" id="banner">
        <div class="h-100 p-2 bg-body-tertiary border rounded-3">
            <h2>Add borders</h2>
            <p>Or, keep it light and add a border Or, keep it light and add a border</p>
            <button class="btn btn-outline-secondary" type="button">Example button</button>
        </div>
    </div>
   
    
    <div class="col-md-4" style="height: 100%; margin-top: 12vw; background-color:#D9D9D980" id="banner">
        <div class="h-100 p-2 bg-body-tertiary border rounded-3">
            <h2>Add borders</h2>
            <p>Or, keep it light and add a border Or, keep it light and add a border</p>
            <button class="btn btn-outline-secondary" type="button">Example button</button>
        </div>
    </div>
</div>


@endsection