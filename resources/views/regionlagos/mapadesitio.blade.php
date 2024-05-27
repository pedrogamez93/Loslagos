<!DOCTYPE html>
<style>
    .second{
       /* width: 100%;*/
        height: 450px;
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
    .enlaces{
        Width: 392px !important;
        Height: 292px!important;
        border-radius: 10px;
        background-color: #00548F;
        color:#FFFFFF;
    }
    /*css contenido*/
    h1.mititulo{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 30px;
        color: #565656;
    }
    .accordion-item {
    		border: none !important;
		}
		button.accordion-button {
    		background-color: rgba(0, 0, 0, 0) !important;
		}
        .accordion-button:focus, .accordion-button:not(.collapsed) {
            border: none !important;
            box-shadow: none !important;
        }
        button.accordion-button::before, button.accordion-button::after{
            border: none !important;
        }

    p.title-acord-one{
		font-family: 'Inter';
		font-Weight: 700;
		font-Size: 30px;
		color: #565656;0
	}

    p.title-acord{
			font-family: 'Inter';
			font-Weight: 700;
			font-Size: 20px;
			color: #565656;0
		}
	.bajada-acord{
			font-family: 'Inter';
			font-Weight: 500;
			font-Size: 16px;
			Line-height: 19.36px;
			color: #565656;
			text-align: justify;
	}

    p.title-categ{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 20px;
        line-height: 24.2px;
        color: #F59120
    }

    h2.mi-style-h2{
        font-family: 'Inter';
        font-Weight: 600;
        font-Size: 20px;
        font-style: italic;
        line-height: 24.2px;
        color: #F59120;
        
    }
    .mi-documento{
        display: flex;
    }
    p.mistyle-final-pcateg{
        font-family: 'Inter';
        font-weight: 500;
        font-size: 16px;
        line-height: 19.36px;
        color: #565656;
    }
    h2.h2-seccion-btn-extras{
        font-family: 'Inter';
        font-weight: 700;
        font-Size: 16px;
        line-height: 19.36px;
        color: #565656;
    }
    a.final-btn{
        padding: 10px 20px;
        border-Radius: 100px;
        background-color: #F59120;
        color: #FFFFFF;
        font-Weight: 700;
    }
    footer{
        height:535px;
        background-color: #389144;
    }
    h2.mi-style{
        font-family: 'Inter';
        font-weight: 700;
        font-size: 20px;
        line-height: 24.2px;
        color: #F59120;
    }
    h3.mi-style{
        font-family: 'Inter';
        font-weight: 700;
        font-size: 30px;
        line-height: 24.2px;
        color: #F59120;
    }

    .mapa_sitio .seccion {
    display: block;
    float: left;
    margin-right: 40px;
    width: 180px;
    margin-bottom: 10px;
    margin-top: 10px;
    padding-bottom: 10px;
}
.mapa_sitio .seccion .titulo_seccion_n3 {
    display: inline-block;
    height: 28px;
}
.mapa_sitio .seccion .titulo_seccion_n3 .izquieda {
    background-image: url(../img/mapa/mapa_m3_iz.gif) !important;
    background-repeat: no-repeat !important;
    margin: 0px !important;
    padding: 0px !important;
    float: left !important;
    height: 28px !important;
    width: 14px !important;
}
.mapa_sitio .seccion .titulo_seccion_n3 .nombre {
    background-color: #00548f !important;
    float: left !important;
    height: 24px !important;
    color: #ffffff !important;
    text-align: center !important;
    padding-top: 4px !important;
    width: 176px !important;
    font-size: 13px !important;
}
.mapa_sitio .seccion .titulo_seccion_n3 .derecha {
    background-image: url(../img/mapa/mapa_m3_der.gif) !important;
    background-repeat: no-repeat !important;
    margin: 0px !important;
    padding: 0px !important;
    float: left !important;
    height: 28px !important;
    width: 14px !important;
}
.mapa_sitio .seccion ul.sub_1 {
    list-style-type: none !important;
    color: #6d888c !important;
    font-size: 12px !important;
    margin-left: 14px !important;
    margin-top: 0px !important;
    margin-right: 0px !important;
    margin-bottom: 0px !important;
    background-image: url(../img/mapa/mapa_ul_n1.gif) !important;
    background-repeat: repeat-y !important;
    background-position: left top !important;
    padding-top: 30px !important;
    padding-right: 0px !important;
    padding-bottom: 0px !important;
    padding-left: 0px !important;
}
#zona_derecha .area_contenidos ul {
    color: #696969;
    font-size: 12px;
    padding-bottom: 10px;
    padding-left: 15px;
    line-height: 20px;
    list-style-type: none;
}
.mapa_sitio .seccion ul.sub_2 {
    list-style-type: none !important;
    background-image: url(../img/mapa/mapa_ul_n2.gif) !important;
    background-repeat: repeat-y !important;
    background-position: left top !important;
    margin-left: 12px !important;
    padding: 0px !important;
    margin-top: 0px !important;
    margin-right: 0px !important;
    margin-bottom: 0px !important;
}
.descripB{
    color:#fff;
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
        <title>Región de Los Lagos</title>

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
                                <p class="style-bread"><a href="/">Home </a> / <span style="font-Weight: 700;"><a href="/gobiernoregional/asambleaclimatica">Región de Los Lagos</a></span></p>                    </div>
                            </div>
                            <div class="col-md-12 pt-5 pb-5">
                                <p class="one-title pb-4">Región de Los Lagos</p>

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
        <main>
            <div class="container-fluid cat">
                    <div class="row">
                        <div class="col-md-12 pt-4 pb-4">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12" style="padding: 0 0 0 2.5rem;">
                                    <p class="title-cat">Mapa del Sitio</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                    
                        <div class="container content mt-5 mb-5">
                            <div class="row">
                                <div class="col-md-12">
                                <div class="mapa_sitio">
                                    <div class="seccion">
                                        <div class="titulo_seccion_n3"><div class="izquieda"><!----></div>
                                        <div class="nombre"><a href="javascript:void(0)">Gobierno Regional</a></div>
                                    <div class="derecha"><!----></div></div>
                                           
                                        <ul class="sub_1">
                                        @foreach($articulo1 as $arti)
                                        <li><a href="{{ $arti->url }}">{{ $arti->nombreUrl }}</a></li>
                                        @endforeach

                                        </ul>
                                    
                                    
                                    </div>
                                
                                <div class="seccion">
                                        <div class="titulo_seccion_n3"><div class="izquieda"><!----></div><div class="nombre"><a href="javascript:void(0)">Consejo Regional</a></div>
                                    <div class="derecha"><!----></div></div>
                                        
                                        <ul class="sub_1">
                                        @foreach($articulo2 as $arti)
                                        <li><a href="{{ $arti->url }}">{{ $arti->nombreUrl }}</a></li>
                                        @endforeach

                                        </ul>
                                    
                                    
                                    </div>
                                
                                
                                
                                <div class="seccion">
                                        <div class="titulo_seccion_n3"><div class="izquieda"><!----></div><div class="nombre"><a href="javascript:void(0)">Región Los Lagos</a></div>
                                    <div class="derecha"><!----></div></div>
                                        
                                        <ul class="sub_1">
                                        @foreach($articulo3 as $arti)
                                        <li><a href="{{ $arti->url }}">{{ $arti->nombreUrl }}</a></li>
                                        @endforeach

                                        </ul>
                                    
                                    
                                    </div>
                                
                                
                                
                                
                                <div class="seccion">
                                        <div class="titulo_seccion_n3"><div class="izquieda"><!----></div><div class="nombre"><a href="javascript:void(0)">Directorio de Funcionarios</a></div>
                                    <div class="derecha"><!----></div></div>
                                    <ul class="sub_1">
                                        @foreach($articulo4 as $arti)
                                        <li><a href="{{ $arti->url }}">{{ $arti->nombreUrl }}</a></li>
                                        @endforeach

                                        </ul>
                                        
                                        
                                    
                                    
                                    </div>
                                <div class="clear"><!----></div>
                                <div class="div_color_sup"><!----></div>
                                
                                <div class="seccion">
                                        <div class="titulo_seccion_n3"><div class="izquieda"><!----></div><div class="nombre"><a href="javascript:void(0)">Infórmate aquí
        </a></div>
                                    <div class="derecha"><!----></div></div>
                                    <ul class="sub_1">
                                        @foreach($articulo5 as $arti)
                                        <li><a href="{{ $arti->url }}">{{ $arti->nombreUrl }}</a></li>
                                        @endforeach

                                        </ul>
                                        
                                    
                                    
                                    </div>
                                
                            
     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </main>
    </body>
</html>
<script>  
    document.addEventListener("DOMContentLoaded", function() {
      
        document.querySelector('.navbar').style.cssText = 'background-color: #00548F !important; border-bottom: 1px solid #FFFFFF;';
    });
</script>
@endsection
