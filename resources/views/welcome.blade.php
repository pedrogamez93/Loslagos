<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

          

@extends('layouts.app')

@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_home.css') }}" rel="stylesheet">
@endpush

  <div class="d-flex h-300 text-center " style="height: 700px; background-color: #389144;">
   

    

    
<div class="mt-5 cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  
<main class="px-3" class="headercontent">
    <div class="row">
        <div class="col colinputbuscador" >
            <div class="input-group rounded">
            <div class="position-absolute mt-2">
                    <span class="" style="background-color: transparent; border: none; ">
                        <!-- <i class="bi bi-search"></i> -->
                    </span>
                </div>
                <input type="text" id="inputbucador" class="form-control rounded-right" placeholder="Buscar" aria-label="Buscar" style="border-radius: 0px 12px 12px 0px; padding-left: 40;">
                <div class="input-group-append">
              <!-- <button class="btn btn-outline-secondary rounded-left" type="button" style="border-radius: 18px">Buscar</button> -->
                </div>
            </div>
        </div>
        <div class="col">
    <div class="d-flex " style="margin-left: -4vw;">
        <img src="{{ asset('storage/img/Rectangle13.png') }}" alt="Rectangle13" style="margin-right: 5px;height: 380px;margin-top: 30px;">
        <img src="{{ asset('storage/img/Rectangle14.png') }}" alt="Rectangle14" style="height: 420px;">
    </div>
</div>

    </div>
</main>



  
</div>
  </div>
<!--seccion de sala de prensa y tramite -->
<div class="container">
  <div class="" style="width: 100%;
    padding: 50px;
    margin: 0px;
    /* border-radius: 35px 35px 0px 0px !important; */
    background-color: white;
   
    /* margin-top: -5vh;*/"> 
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
    
            
            <div class=" mt-5 pb-5">
  <div id="thumbnail-slider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <!-- Primer Slide -->
      <div class="carousel-item active">
        <div class="row">
          <div class="col-md-3">
            <img src="{{ asset('storage/img/aventura.png') }}" class="d-block w-80" alt="Imagen 1">
          </div>
          <div class="col-md-3">
            <img src="{{ asset('storage/img/Rectangle45.png') }}" class="d-block w-80" alt="Imagen 2">
          </div>
          <div class="col-md-3">
            <img src="{{ asset('storage/img/aventura.png') }}" class="d-block w-80" alt="Imagen 3">
          </div>
          <div class="col-md-3">
            <img src="{{ asset('storage/img/Rectangle45.png') }}" class="d-block w-80" alt="Imagen 4">
          </div>
        </div>
      </div>

      <!-- Segundo Slide -->
      <div class="carousel-item">
        <div class="row">
          <div class="col-md-3">
            <img src="{{ asset('storage/img/Rectangle45.png') }}" class="d-block w-80" alt="Imagen 5">
          </div>
          <div class="col-md-3">
            <img src="{{ asset('storage/img/Rectangle45.png') }}" class="d-block w-80" alt="Imagen 6">
          </div>
          <div class="col-md-3">
            <img src="{{ asset('storage/img/aventura.png') }}" class="d-block w-80" alt="Imagen 7">
          </div>
          <div class="col-md-3">
            <img src="{{ asset('storage/img/Rectangle45.png') }}" class="d-block w-80" alt="Imagen 8">
          </div>
        </div>
      </div>
    </div>

    <!-- Miniaturas -->
    <div class="carousel-indicators pt-5">
      <button type="button" data-bs-target="#thumbnail-slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#thumbnail-slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>

   
        </div>
</div>

    <div class="row" style="justify-content: center;">
    <button class="btn btn-primary w-10" style="width:10rem;"> Ver todos </button>
    </div>
  </div>
<div class="container">
    <div  class=" d-flex justify-content-between">
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
    

    <div id="thumbnail-slider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <!-- Primer Slide -->
      <div class="carousel-item active pt-5">
        <div class="row">
          <div class="col-md-3">
            <img src="{{ asset('storage/img/icono-abeja.png') }}" class="d-block w-80" alt="Imagen 1">
            <p class="TitulocarouselTD pt-3">lorem ipsu</p>
             <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
          </div>
          <div class="col-md-3">
            <img src="{{ asset('storage/img/icono-turismo.png') }}" class="d-block w-80" alt="Imagen 2">
              <p class="TitulocarouselTD pt-3"> lorem ipsu</p>
               <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
          </div>
          <div class="col-md-3">
            <img src="{{ asset('storage/img/lenguaje-señas.png') }}" class="d-block w-80" alt="Imagen 3">
              <p  class="TitulocarouselTD pt-3">lorem ipsu</p>
               <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
          </div>
          <div class="col-md-3">
            <img src="{{ asset('storage/img/arreglos-2.png') }}" class="d-block w-80" alt="Imagen 4">
              <p  class="TitulocarouselTD pt-3">lorem ipsu</p>
               <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
          </div>
        </div>
      </div>

      <!-- Segundo Slide -->
      <div class="carousel-item pt-5">
      <div class="row">
          <div class="col-md-3 ">
            <img src="{{ asset('storage/img/icono-abeja.png') }}" class="d-block w-80" alt="Imagen 1">
            <p class="TitulocarouselTD pt-3">lorem ipsu</p>
             <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
          </div>
          <div class="col-md-3">
            <img src="{{ asset('storage/img/icono-turismo.png') }}" class="d-block w-80" alt="Imagen 2">
            <p class="TitulocarouselTD pt-3">lorem ipsu</p>
             <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
          </div>
          <div class="col-md-3">
            <img src="{{ asset('storage/img/lenguaje-señas.png') }}" class="d-block w-80" alt="Imagen 3">
            <p class="TitulocarouselTD pt-3">lorem ipsu</p>
             <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
          </div>
          <div class="col-md-3">
            <img src="{{ asset('storage/img/arreglos-2.png') }}" class="d-block w-80" alt="Imagen 4">
            <p class="TitulocarouselTD pt-3">lorem ipsu</p>
             <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Miniaturas -->
    <div class="carousel-indicators pt-5">
      <button type="button" data-bs-target="#thumbnail-slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#thumbnail-slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
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

</div>
@endsection
                </div>
            </div>
        </div>
    </body>
</html>
