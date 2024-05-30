




<!DOCTYPE html>
<style>
    header{
       /* width: 100%;*/
        height: 450px;
        background-color: #00548F;
        color: #fff; /* Cambia esto al color de texto que desees */
        padding: 20px; /* Añade relleno si es necesario */
        margin: 0; /* Elimina el margen para que ocupe toda la pantalla hacia los lados */
        /*position: fixed;*/
        top: 0; /* Lo fija en la parte superior */
        left: 0; /* Lo fija en la parte izquierda */
        z-index: 1000;
    }
    .top-bar{
        border-bottom: 1px solid #FFFFFF;
    }
    nav ul {
        list-style: none; 
        padding: 0; 
        display: flex; 
    }

 

    nav a {
        text-decoration: none; 
    }
    p.style-bread{
        font-family:'Inter';
        font-Weight: 500;
        font-Size: 16px;
        Line-height: 19.36px;
        color: #FFFFFF;
    }
    p.style-tag{
        font-family: 'Inter';
        font-Weight: 600;
        font-Style: italic;
        font-Size: 16px;
        color: #00548F;
    }
    p.title-cat{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 30px;
        Line-height: 36.31px;
        color: #565656;
    }
    p.style-down{
        width: 580px;
        font-family: 'Inter';
        font-Weight: 500;
        font-Size: 16px;
        Line-height: 24px;
        color: #565656;
        text-align: justify;
    }
    p.style-btn {
        padding: 7px 27px;
    }
    a.style-btn, p.style-btn{
        Width: 175px;
        Height: 40px;
        background-color: #FFFFFF33;
        color: #FFFFFF;
        font-family:'Inter';
        font-Weight: 700;
        font-Size: 16px;
        border-radius: 100px;
    }
    p.one-title{
        font-family:'Inter';
        font-Weight: 700;
        font-Size: 50px;
        line-height: 60.51px;
        color: #FFFFFF;
    }
    .cat{
        margin-top: -5rem;
        background-color: #FFFFFF;
        border-radius: 100px 0 0 0;
    }
    /*lista categorias*/
    .lista-categorias {
        width: 100%;
        box-sizing: border-box;
    }

    #categoriasToggle {
        display: none;
    }

    #categorylist {
        display: table;
        
    }

    #categorylist li:first-child {
        position: relative;
    }

    #categorylist li {
        margin-right: 30px;
        margin-top: 10px;
        float: left;
    }

    #categorylist li a {
        box-sizing: border-box;
        font-family: 'Inter';
        background: none repeat scroll 0 0 #E5E8ED;;
        border: 1px solid #E5E8ED;
        border-radius: 8px;
        color: #565656;
        display: block;
        font-size: 16px;
        font-weight: 400;
        padding: 4px 12px;
        margin-top: 5px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        text-decoration: none;
    }

    #categorylist li a:hover{
        background-color: #64C69F;
        color: #FFFFFF;
    }

    #categoriasToggle {
        display: none;
    }
    .enlaces{
        Width: 392px !important;
        Height: 292px!important;
        border-radius: 10px;
        background-color: #00548F;
        color:#FFFFFF;
    }
    footer{
        height:535px;
        background-color: #389144;
    }
    .descripB{
        font-family: Inter;
        font-size: 16px;
        font-weight: 500;
        line-height: 19px;
        letter-spacing: 0em;
        text-align: left;
        color:#fff;

    }

    .backgroundB{
          background-color: #F59120 !important;padding-left: 3vw;    border-bottom: 1px solid #fff;
        }
        .colorB{
            background-color:#F59120;
        }
        .nav-head{
            background-color:#F59120 !important;
        }
        .container-grid{
    width: 100%;
    margin: 40px auto;
    display: grid !important;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)) !important;
    gap: 30px;
  }
  .title-programa{
    font-family: 'Inter';
    font-Weight: 700;
    font-Size: 20px;
    color: #565656;
    line-height: 24px;
    padding: 10px 0;
    overflow-wrap: break-word;
  }
  .bajada-programa{
    font-family: 'Inter';
    font-Weight: 400;
    font-Size: 16px;
    color: #565656;
    line-height: 19px;
    overflow: hidden !important;
    display: -webkit-box;
    -webkit-line-clamp: 2 !important;
    -webkit-box-orient: vertical !important;
    overflow-wrap: break-word;
    padding-top: 5px;
  }
  #bajada-p{
    font-family: 'Inter';
    font-Weight: 600;
    font-Size: 16px;
    color: #00548F;
    font-style: italic;
    line-height: 19px;
    overflow: hidden !important;
    display: -webkit-box;
    -webkit-line-clamp: 1 !important;
    -webkit-box-orient: vertical !important;
    margin: 30px 0 13px 0;
    overflow-wrap: break-word;
}
  .programa{
    border: 1px solid rgba(86, 86, 86, 0.5);
  }
  .programa img{
    width: 100%;
    height: 75.1%;
    
    max-width: auto;
    height: 211px;
    object-fit: cover;
  }
  .info{
    padding: 25px 25px 12px 25px;
  }
  .linea {
    border-top: 2px solid #00548F;
    margin: 10px 0 10px 0;
}
.btn-programa{
    font-family: 'Inter';
    font-Weight: 700;
    font-Size: 16px;
    color: #00548F;
}   
</style>
<html>
<head>
    <meta charset="utf-8">
    <title>Programas</title>
    <!-- Agrega aquí tus enlaces a hojas de estilo CSS, si es necesario -->
    <!-- Jquery -->

</head>
<body>
@extends('layouts.app')
@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_documentos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush
<div class="container-fluid colorB">
    <div class="row">
        <div class="col-md-12">
            <div class="container pt-5 pb-5">
                <div class="row" >
                    <div class="col-md-12" >
                    <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/ <span style="font-Weight: 700;"><a>Programas</a></span></p>
                    </div>
                    <div class="col-md-12 pt-5 pb-5">
                        <p class="one-title pb-4">Programas</p>

                        <p style="Width:623px;"  class="mb-3 descripB">Los programas son una serie de actividades planeadas que involucran un accionar más amplio que un proyecto</p>
                    </div>
                    
                <div class="container pt-4">
                    <div class="row">
                        
                    </div>
                </div>   
            </div>
        </div>
    </div>
</div> 
    <!-- Contenido principal de tu página -->
    <main>
    <div class="container-fluid cat">
        <div class="row">
            <div class="col-md-12 pt-4 pb-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 container-grid pt-5 pb-5">
                        @foreach($programas as $programa)
                            <div class="programa ">
                                <a href="{{ route('programas.show', $programa) }}">
                                    <img src="{{ asset($programa->imagen) }}" alt="Imagen-programa">
                                </a>
                                <div class="info">
                                    <a href="{{ route('programas.show', $programa) }}"><h2 class="title-programa">{{ $programa->titulo }}</h2></a>
                                    <p class="bajada-programa">{!! $programa->bajada ?? '' !!}</p>
                                    <span id="bajada-p">{!! $programa->bajada_programa ?? '' !!}  </span>
                                    <div class="linea"></div>
                                    <div class="container pt-2 mb-1">
                                        <div class="row">
                                            <div class="col-6">
                                             <!--<img src="" alt="icon">-->
                                            </div>
                                            <div class="col-6">
                                             <a href="{{ route('programas.show', $programa) }}"" class="btn-programa" style="display:flex; justify-content: end;"> Ir ahora <i class="bi bi-arrow-right" style="padding-left:10px;"></i></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>    
                            </div>
                        @endforeach
                    </>
                                   </div>
                    </div>
                </div>
                
                </div>
                
            </div>
        </div>
    </div>
    </main>
    <!-- Agrega aquí tus scripts de JavaScript, si es necesario -->
</body>
</html>
@endsection
