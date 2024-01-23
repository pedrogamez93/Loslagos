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
    margin-right: 15px;
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
    background-color: #d0dcdd !important;
    float: left !important;
    height: 24px !important;
    color: #4e7f83 !important;
    text-align: center !important;
    padding-top: 4px !important;
    width: 152px !important;
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
    padding-top: 10px !important;
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
        <title>Tu Título Aquí</title>

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
                                        <div class="nombre"><a href="/gobierno_regional/introduccion.html">Gobierno Regional</a></div>
                                    <div class="derecha"><!----></div></div>
                                        
                                        <ul class="sub_1">
                                            <li><a href="/gobierno_regional/introduccion.html">Introducción</a></li>
                                            <li><a href="/gobierno_regional/que_es_gobierno_regional.html">Acerca del Gobierno Regional</a>
                                            
                                                <ul class="sub_2">
                                                <li><a href="/gobierno_regional/funcionamiento_gobierno_regional.html">Cómo Funciona el Gobieno Regional</a></li>
                                                <li><a href="/gobierno_regional/estrategia_regional_desarrollo.html">Estrategia Regional de desarrollo</a></li>
                                                <li class="fin"><a href="/gobierno_regional/inversion_publica_region.html">Inversión Pública en la Región</a></li>
                                                
                                            </ul>
                                            
                                            
                                            </li>
                                            <li><a href="/gobierno_regional/mision.html">Misión</a></li>
                                            <li><a href="/gobierno_regional/ley.html">Ley</a></li>
                                            <li><a href="/gobierno_regional/organigrama.html">Organigrama</a></li>
                                                
                                            <li><a href="/gobierno_regional/documentos_gestion.html">Documentos de Gestión</a></li>
                                        <li class="fin"><a href="/gobierno_regional/concurso_publico.html">Concurso Público</a></li>
                                            
                                    </ul>
                                    
                                    
                                    </div>
                                
                                <div class="seccion">
                                        <div class="titulo_seccion_n3"><div class="izquieda"><!----></div><div class="nombre"><a href="/consejo_regional/introduccion.html">Consejo Regional</a></div>
                                    <div class="derecha"><!----></div></div>
                                        
                                        <ul class="sub_1">
                                            
                                        <li><a href="/consejo_regional/introduccion.html">Introducción</a></li>
                                        <li><a href="/consejo_regional/finalidad.html">Descripción General</a>
                                            <ul class="sub_2">
                                                <li><a href="/consejo_regional/finalidad.html">Finalidad</a></li>
                                                <li><a href="/consejo_regional/integrantes_conformacion">Integrantes y Conformación</a></li>
                                                <li><a href="/consejo_regional/duracion.html">Duración</a></li>
                                                <li><a href="/consejo_regional/requisitos.html">Requisitos</a></li>
                                                <li class="fin"><a href="/consejo_regional/funciones.html">Funciones</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="/consejo/presidente_consejo">Presidente del Consejo</a> </li> 
                                        <li><a href="/consejo/consejeros">Consejeros</a></li>
                                        <li><a href="/consejo/actas">Actas</a></li>
                                        <li><a href="/consejo/acuerdos">Acuerdos</a></li>
                                        <li><a href="/consejo/certificados">Certificados</a></li>
                                        <li class="fin"><a href="/consejo/resumen_gastos">Resumen de Gastos</a></li>
                                    </ul>
                                    
                                    
                                    </div>
                                
                                
                                
                                <div class="seccion">
                                        <div class="titulo_seccion_n3"><div class="izquieda"><!----></div><div class="nombre"><a href="/region_lagos/introduccion.html">Región de los Lagos</a></div>
                                    <div class="derecha"><!----></div></div>
                                        
                                        <ul class="sub_1">
                                            
                                        <li><a href="/region_lagos/introduccion.html">Introducción</a></li>
                                        <li><a href="/region_lagos/antecedentes_region.html">Información de la Región</a>
                                            <ul class="sub_2">
                                                <li><a href="/region_lagos/antecedentes_region.html">Antecedentes de la Región</a></li>
                                                <li><a href="/region_lagos/provincia_osorno.html">Provincia de Osorno</a></li>
                                                <li><a href="/region_lagos/provincia_llanquihue.html">Provincia de Llanquihue</a></li>
                                                <li><a href="/region_lagos/provincia_chiloe.html">Provincia de Chiloé</a></li>
                                                <li class="fin"><a href="/region_lagos/provincia_palena.html">Provincia de Palena</a></li>
                                            
                                            </ul>
                                            </li>
                                        <li><a href="/region_lagos/autoridades.html">Autoridades</a>
                                            <ul class="sub_2">
                                                <li><a href="/region_lagos/autoridades.html">Intendente Regional</a></li>
                                                <li><a href="/region_lagos/senadores.html">Senadores</a></li>
                                                <li><a href="/region_lagos/diputados.html">Diputados</a></li>
                                                <li><a href="/region_lagos/gobernadores.html">Gobernaciones</a></li>
                                                <li><a href="/region_lagos/seremis.html">Seremis</a></li>
                                                <li><a href="/region_lagos/servicios.html">Servicios</a></li>
                                            <li class="fin"><a href="/region_lagos/municipalidades.html">Municipalidades</a></li>
                                            </ul>
                                        </li>   
                                            <li><a href="/estadisticas/poblacion_superficie">Estadísticas</a>
                                                <ul class="sub_2">
                                                <li><a href="/estadisticas/poblacion_superficie">Población y Superficie</a></li>
                                                <li><a href="/estadisticas/dinamica_economica">Dinámica Económica</a></li>
                                                <li><a href="/estadisticas/exportacion_rama_actividad">Exportación Según Rama Actividad</a></li>
                                                <li><a href="/estadisticas/exportacion_bloque_economico">Exportación Según Bloque Económico</a></li>
                                                <li><a href="/estadisticas/actividad_economica">Actividad Económica</a></li>
                                                <li class="fin"><a href="/estadisticas/fndr">FNDR 2009</a></li>
                                            
                                            </ul>
                                            </li>
                                            <li class="fin"><a href="/region_lagos/inv_descripcion_general.html">Inversiones</a>
                                            
                                                    <ul class="sub_2">
                                                <li><a href="/region_lagos/inv_descripcion_general.html">Descripción Genera</a></li>
                                                <li><a href="/inversiones/sector">Inversión Pública Efectiva Según Sectores</a></li>
                                                <!--<li><a href="/inversiones/fuente">Inversión Pública Efectiva Según Fuentes</a></li>-->
                                                <li class="fin"><a href="/inversiones/provincia">Financiamiento por Provincias</a></li>
                                                <!--<li><a href="/inversiones/comuna">Financiamiento por Comunas</a></li>-->
                                                
                                            
                                            </ul>
                                            
                                            </li>
                                            
                                            
                                    </ul>
                                    
                                    
                                    </div>
                                
                                
                                
                                
                                <div class="seccion">
                                        <div class="titulo_seccion_n3"><div class="izquieda"><!----></div><div class="nombre"><a href="/funcionarios">Directorio de Funciones</a></div>
                                    <div class="derecha"><!----></div></div>
                                        
                                        
                                    
                                    
                                    </div>
                                <div class="clear"><!----></div>
                                <div class="div_color_sup"><!----></div>
                                
                                <div class="seccion">
                                        <div class="titulo_seccion_n3"><div class="izquieda"><!----></div><div class="nombre"><a href="/documentos/portada">Documentos</a></div>
                                    <div class="derecha"><!----></div></div>
                                        
                                        
                                    
                                    
                                    </div>
                                
                                <div class="seccion">
                                        <div class="titulo_seccion_n3"><div class="izquieda"><!----></div><div class="nombre"><a href="/programas/introduccion.html">Programas</a></div>
                                    <div class="derecha"><!----></div></div>
                                        
                                        <ul class="sub_1">
                                            <li><a href="/programas/introduccion.html">Introducción</a></li>
                                        <li><a href="/programas/fril_finalidad_del_programa.html">FRIL</a>
                                                <ul class="sub_2">
                                                <li><a href="/programas/fril_finalidad_del_programa.html">Finalidad del Programa</a></li>
                                                <li><a href="/programas/fril_documentos.html">Documentos</a></li>
                                                <li><a href="/programas/fril_fotografias.html">Fotografías</a></li>
                                                <li class="fin"><a href="http://www.regiondeloslagos.cl/fril/index.html" target="_blank">Ingreso Proyectos FRIL</a></li>
                                            </ul>
                                        
                                        </li>
                                            <li><a href="/programas/pvp_finalidad_programa.html">Puesta en Valor del Patrimonio</a>
                                                <ul class="sub_2">
                                                <li><a href="/programas/pvp_finalidad_programa.html">Finalidad del Programa</a></li>
                                                <li class="fin"><a href="/programas/pvp_documentos.html">Documentos</a></li>
                                                </ul>
                                            
                                            </li>
                                        <li> <a href="/programas/pirdt.html">P.I.R.D.T.</a>
                                        
                                                <ul class="sub_2">
                                                <li><a href="/programas/pirdt.html">Objetivo</a></li>
                                                <li class="fin"><a href="/programas/pirdt_fotografias.html">Fotografías</a></li>
                                                </ul>
                                        </li>
                                        <li><a href="/programas/saneamiento_rural_objetivo.html">Saneamiento Rural</a>
                                                <ul class="sub_2">
                                                <li><a href="/programas/saneamiento_rural_objetivo.html">Objetivo</a></li>
                                                <li><a href="/programas/saneamiento_rural_r_elegibilidad.html">Requisitos de Elegibilidad</a></li>
                                                <li><a href="/programas/saneamiento_rural_documentos.html">Documentos</a></li>
                                                <li class="fin"><a href="/programas/saneamiento_rural_fotografias.html">Fotografías</a></li>
                                                </ul>
                                        </li>
                                        <li><a href="/programas/produccion_limpia_mision_vision.html">Producción Limpia</a>
                                                <ul class="sub_2">
                                                <li><a href="/programas/produccion_limpia_mision_vision.html">Misión y Visión</a></li>
                                                <li><a href="/programas/produccion_limpia_integrantes.html">Integrantes</a></li>
                                                <li class="fin"><a href="/programas/produccion_limpia_documentos.html">Documentos</a></li>
                                                </ul>
                                        
                                        </li>
                                        
                                        <li><a href="/programas/pmu_finalidad.html">PMB</a>
                                                <ul class="sub_2">
                                                <li><a href="/programas/pmu_finalidad.html">Finalidad del Programa</a></li>
                                                <li><a href="/programas/pmu_documentos.html">Documentos</a></li>
                                                <li class="fin"><a href="/programas/pmu_fotografias.html">Fotografías</a></li>
                                                </ul>
                                        
                                        </li>
                                        
                                            <li><a href="/programas/residuos_solidos_finalidad.html">Residuos Sólidos</a>
                                                <ul class="sub_2">
                                                <li><a href="/programas/residuos_solidos_finalidad.html">Finalidad del Programa</a></li>
                                                <li><a href="/programas/residuos_solidos_documentos.html">Documentos</a></li>
                                                <li class="fin"><a href="/programas/residuos_solidos_fotografias.html">Fotografías</a></li>
                                                </ul>
                                        
                                        </li>
                                        
                                        
                                        
                                        <li><a href="/programas/electrificacion_rural_finalidad.html">Electrificación Rural</a>
                                                <ul class="sub_2">
                                                <li><a href="/programas/electrificacion_rural_finalidad.html">Finalidad del Programa</a></li>
                                                <li class="fin"><a href="/programas/electrificacion_rural_fotografias.html">Fotografías</a></li>
                                                </ul>
                                        
                                        
                                        </li>
                                        <li class="fin"><a href="/programas/fondos_concursables.html">Fondos Concursables</a></li>
                                    </ul>
                                    
                                    
                                    </div>
                                    
                                    <div class="seccion">
                                        <div class="titulo_seccion_n3"><div class="izquieda"><!----></div><div class="nombre"><a href="/agenda/actividades">Agenda</a></div>
                                    <div class="derecha"><!----></div></div>
                                        
                                        </div>
                                    <div class="seccion">
                                        <div class="titulo_seccion_n3"><div class="izquieda"><!----></div><div class="nombre"><a href="/sala_prensa/noticias">Sala de Prensa</a></div>
                                    <div class="derecha"><!----></div></div>
                                        
                                        <ul class="sub_1">
                                            
                                        <li><a href="/sala_prensa/noticias">Noticias</a></li>
                                            <li><a href="/sala_prensa/galerias">Galería Fotográfica</a></li>
                                        <li class="fin"> <a href="/sala_prensa/videos">Videos</a></li>
                                        
                                        
                                    </ul>
                                    
                                    
                                    </div>
                                
                                <div class="clear"><!----></div>
                                <div class="div_color_sup"><!----></div>
                                
                                
                                
                                
                                <div class="clear"><!----></div>
                                    
                                    <div class="seccion">
                                    <div class="titulo_seccion_n4"><div class="izquieda"><!----></div>
                                        <div class="nombre"><a href="/contacto">Contáctenos</a></div>
                                    <div class="derecha"><!----></div></div>
                                        
                                        
                                        
                                    
                                    
                                    </div>
                                    
                                    <div class="seccion">
                                        <div class="titulo_seccion_n4"><div class="izquieda"><!----></div>
                                        <div class="nombre"><a href="/mapa/mapa.html">Mapa del Sitio</a></div>
                                    <div class="derecha"><!----></div></div>
                                        
                                        
                                    
                                    
                                    </div>
                                    
                                    
                                    <div class="seccion">
                                        <div class="titulo_seccion_n4"><div class="izquieda"><!----></div>
                                        <div class="nombre"><a href="/sitios_gobierno/sitios_de_gobierno.html">Sitios de Gobierno</a></div>
                                    <div class="derecha"><!----></div></div>
                                    </div>
                                    
                                    <div class="seccion">
                                        <div class="titulo_seccion_n4"><div class="izquieda"><!----></div>
                                        <div class="nombre"><a href="/politica_privacidad/politica_privacidad.html">Políticas de Privacidad</a></div>
                                    <div class="derecha"><!----></div></div>
                                    </div>
                                    
                                        <div class="seccion">
                                        <div class="titulo_seccion_n4"><div class="izquieda"><!----></div>
                                        <div class="nombre"><a href="/descarga_programas/descarga_programas.html">Descarga de Programas</a></div>
                                        <div class="derecha"><!----></div></div>
                                    </div>
                                    
                                    <div class="seccion">
                                        <div class="titulo_seccion_n4"><div class="izquieda"><!----></div>
                                        <div class="nombre"><a href="/preguntas_frecuentes/preguntas_frecuentes.html">Preguntas Frecuentes</a></div>
                                        <div class="derecha"><!----></div></div>
                                    </div>
                                    
                                <div class="clear"><!----></div>
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
