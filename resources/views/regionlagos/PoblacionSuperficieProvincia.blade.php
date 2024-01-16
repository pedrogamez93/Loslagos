<!DOCTYPE html>
<style>
    .enlaceM {
        color: #565656;
    }
    .enlaceM:hover {
        font-Weight: 700;
    }
    .enlaceM{
        padding: 10px 0px;
        width: fit-content;
    }
    .infoR{
        font-family: Inter;
         font-size: 20px;
          font-weight: 700;
           line-height: 24px;
            letter-spacing: 0em;
             text-align: left;
              color: #F59120;
    }
    .borderR{
        border-left: 2px solid #F59120;
    }
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

    nav li {
        margin-right: 20px; 
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
    p.style-tag {
        font-family: Inter;
        font-size: 30px;
        font-weight: 700;
        line-height: 36px;
        letter-spacing: 0em;
        text-align: left;
        color: #565656;
    }
    p.title-cat{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 30px;
        Line-height: 36.31px;
        color: #565656;
    }
    p.style-down{
        width: auto;
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
    .fotoA img {
        width: 313px;
        height: 348px;
        border-radius: 0px 0px 100px 0px;
        object-fit: cover;
    }
    p.style-nombre {
        font-family: Inter;
        font-size: 20px;
        font-style: italic;
        font-weight: 600;
        line-height: 24px;
        letter-spacing: 0em;
        text-align: left;
        color: #00548F;
    }
    .info h3 {
        font-family: Inter;
        font-size: 20px;
        font-weight: 700;
        line-height: 24px;
        letter-spacing: 0em;
        text-align: left;
        margin-top: 20px;
        margin-bottom: 20px;
    }
    p.style-B{
        font-family: Inter;
        font-size: 20px;
        font-weight: 700;
        line-height: 24px;
        letter-spacing: 0em;
        text-align: left;
        color: #565656;
    }
    p.descripcion-B {
        font-family: Inter;
        font-size: 16px;
        font-weight: 500;
        line-height: 19px;
        letter-spacing: 0em;
        text-align: left;
    }
    table.table, .table th,.table td  {
        border: 1px solid #F59120;
    }
    .tituloTable{
        background-color: #F59120 !important;
        height: 48px;
        font-family: Inter;
        font-size: 18px;
        font-weight: 500;
        line-height: 24px;
        letter-spacing: 0em;
        text-align: left;
        color: #fff !important;
    }
    th.tituloT {
        font-family: Inter;
        font-size: 18px;
        font-weight: 700;
        line-height: 24px;
        letter-spacing: 0em;
        text-align: left;
    }
    th.tituloTS{
        font-family: Inter;
        font-size: 18px;
        font-weight: 500;
        line-height: 24px;
        letter-spacing: 0em;
        text-align: left;
    }
    .backgroundB{
        background-color: #00548F !important;
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
    .borderM {
        border-top: 2px solid #F59120;
        border-bottom: 2px solid #F59120;
        padding: 24px 0px;
        margin-bottom: 20px;
    }
    .colorB{
            background-color:#00548F;
        }
        .nav-head{
            background-color:#00548f !important;
        }   
</style>
<html>
<head>
    <meta charset="utf-8">
    <title>Región de los Lagos</title>
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
                        <p class="style-bread"><a href="/">Home </a> / <span style="font-Weight: 700;"><a href="/gobiernoregional/asambleaclimatica">Región de los Lagos</a></span></p>                    </div>
                    </div>
                    <div class="col-md-12 pt-5 pb-5">
                        <p class="one-title pb-4">Región de los Lagos</p>

                        <p style="Width:623px;"  class="mb-3 descripB">Es considerada como la puerta del sur de nuestro país. Aquí comienza a sentirse de verdad el rigor del invierno</p>
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
                    <div class="row ">
                        <div class="col-md-12 mt-5 pb-4">
                            <p class="title-cat mt-5">Selecciona una Categoría</p>
                        </div>
                    </div>
                </div>
                <div class="container set pb-4">
                    @include('layouts.listacategoriasRegionLagos')
                </div>
                <div class="container mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-4 borderM d-block d-lg-none">
                            <div class="container img">
                                <div class="row">
                                    @include('layouts.menuestadistica') 
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 ">
                            <div class="container int">
                                <div class="row1">
                                <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col" class="tituloTable">Región de los  Lagos</th>
                                    <th scope="col" class="tituloT">Superficie</th>
                                    <th scope="col" class="tituloT" colspan="2">Población Urbana</th>
                                    <th scope="col" class="tituloT" colspan="2">Población Rural</th>
                                    <th scope="col" class="tituloT">Total</th>
                                    </tr>
                                    <tr>
                                    <th scope="col"></th>
                                    <th scope="col" style=" text-align: center;"> {{$acumulador}} </th>
                                    <th scope="col" class="tituloTS" style=" text-align: center;">Hombre</th>
                                    <th scope="col" class="tituloTS" style=" text-align: center;">Mujer</th>
                                    <th scope="col" class="tituloTS" style=" text-align: center;">Hombre</th>
                                    <th scope="col" class="tituloTS" style=" text-align: center;">Mujer</th>
                                    <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($introduccion as $p)
                                    
                                    <tr>
                                        <td>{{ $p->comuna }}</td>
                                        <td style=" text-align: center;">{{ $p->superficie }}</td>
                                        <td style=" text-align: center;"> {{ $p->p_urbana_hombre }}</td>
                                        <td style=" text-align: center;"> {{ $p->p_urbana_mujeres }}</td>
                                        <td style=" text-align: center;"> {{ $p->p_urbana_mujeres }}</td>
                                        <td style=" text-align: center;"> {{ $p->p_rural_hombre }}</td>
                                        <td style=" text-align: center;"> {{  $total =$p->p_urbana_hombre + $p->p_urbana_mujeres + $p->p_rural_hombre + $p->p_rural_mujeres;}}</td>
                                    </tr>
                                    
                                    @endforeach

                                </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 borderR d-none d-lg-block">
                            <div class="container img">
                                <div class="row">
                                    @include('layouts.menuestadistica') 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </div>   
    </main>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>Pie de página &copy; {{ date('Y') }}</p>
                </div>
            </div>
        </div>                    
       
        
    </footer>
    <!-- Agrega aquí tus scripts de JavaScript, si es necesario -->
</body>
</html>
@endsection