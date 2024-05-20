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
        form label{
    font-family: Inter !important;
    font-Weight: 700;
    font-Size: 18px;
    Line-height: 36.31px;
    color: #565656;
    padding-top: 16px;
}
select option{
    font-family: Inter !important;
    font-Weight: 400;
    font-Size: 17px;
    Line-height: 36.31px;
    color: #565656;
}
form input, select, textarea{
    border: 1px solid #d7d2d2 !important;
    border-radius: 5px !important;
}
div#campoSugerencias {
    background-color: #e9e9e9;
    padding: 20px;
    margin: 15px 0;
}

label {
    display: block;
    margin-bottom: 5px;
}

input,
select,
textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
}

/* Estilo para ocultar campos específicos */
.campoOculto {
    display: none;
}  
.btn-enviar{
        padding: 10px 20px !important;
        border-Radius: 100px !important;
        background-color: #F59120 !important;
        color: #FFFFFF !important;
        font-Weight: 700 !important;
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
                    <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/<a href="/gobiernoregional/acerca"> Gobierno Regional</a> / <span style="font-Weight: 700;"><a href="#">Formulario de Contacto</a></span></p>
                    </div>
                    <div class="col-md-12 pt-5 pb-5">
                        <p class="one-title pb-4">Formulario de Contacto</p>

                        <p style="Width:623px;"  class="mb-3 descripB">Complete el Siguente Formulario, (*Campos Obligatorios)</p>
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
                
                
                <div class="container mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-12 p-0">
                            <div class="container int p-0">
                                <div class="row">
                                    <div class="col-md-12">
                                    <p class="title-cat">Formulario de Contacto</p>
                                    </div>
                                </div>
                            </div>
                            <div class="container titulo">
            <div class="row">
                <div class="col-md-12 container-grid"><!-- resources/views/form.blade.php -->
                    <form action="{{ route('contactanos.store') }}" method="POST" id="myForm">
                        @csrf
                            <!-- Campos comunes -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nombre:</label>
                                        <input type="text" name="nombre" class="form-control" required>

                                        <label>Apellido:</label>
                                        <input type="text" name="apellido" class="form-control" required>

                                        <label>Email:</label>
                                        <input type="email" name="email" class="form-control" required>

                                        <label>Sexo:</label>
                                        <select name="sexo" class="form-control" required>
                                            <!-- Opciones para sexo -->
                                            <option value="masculino">Masculino</option>
                                            <option value="femenino">Femenino</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Dirección:</label>
                                        <input type="text" name="direccion" class="form-control" required>

                                        <label>Provincia:</label>
                                        <input type="text" name="provincia" class="form-control" required>

                                        <label>Comuna:</label>
                                        <input type="text" name="comuna" class="form-control" required>

                                        <label>Teléfono:</label>
                                        <input type="tel" name="telefono" class="form-control" required>
                                    </div>
                                </div>
                            </div>


                            <!-- Campo "Tipo de Mensaje" -->
                            <label>Tipo de Mensaje:</label>
                            <select name="tipo_mensaje" id="tipoMensaje" >
                                <option value="consulta">Consulta</option>
                                <option value="sugerencias">Sugerencia</option>
                                <option value="consulta">Reclamo</option>
                                <option value="consulta">Otro</option>

                            </select>

                            <!-- Campos específicos para "Consulta" -->
                            <div id="campoConsulta" class="campoOculto">
                                <label>Mensaje:</label>
                                <textarea name="mensaje" rows="4" cols="50" ></textarea>
                            </div>

                            <!-- Campos específicos para "Sugerencias" -->
                            <div id="campoSugerencias" class="campoOculto">
                                <!-- Agrega aquí los campos específicos para "Sugerencias" -->
                                <!-- Ejemplo: -->








                                <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        
                                <label>Fecha de Nacimiento:</label>
                                <input type="date" name="date">

                                <label>Usted escribe como:</label>
                                <select name="usted_escribe_como">
                                    
                                <option value="">Seleccione</option>

                                    <option value="AGRUPACION DEPORTIVA">AGRUPACION DEPORTIVA</option>                                                   
                                    <option value="APODERADO">APODERADO</option>                                                   
                                    <option value="CESANTE">CESANTE</option>                                                   
                                    <option value="CIUDADANO(A)">CIUDADANO(A)</option>                                                   
                                    <option value="COLABORADOR(A)">COLABORADOR(A)</option>                                                   
                                    <option value="COMERCIANTE">COMERCIANTE</option>                                                   
                                    <option value="COORDINADOR ONG">COORDINADOR ONG</option>                                                   
                                    <option value="DIRIGENTE DEPORTIVO">DIRIGENTE DEPORTIVO</option>                                                   
                                    <option value="DIRIGENTE VECINAL">DIRIGENTE VECINAL</option>                                                   
                                    <option value="EMPLEADO">EMPLEADO</option>                                                   
                                    <option value="EMPRESARIO">EMPRESARIO</option>                                                   
                                    <option value="ESPOSO(A)">ESPOSO(A)</option>                                                   
                                    <option value="ESTUDIANTE">ESTUDIANTE</option>                                                   
                                    <option value="HIJA(O)">HIJA(O)</option>                                                   
                                    <option value="JEFE(A) DE HOGAR">JEFE(A) DE HOGAR</option>                                                   
                                    <option value="JUBILADO(A)">JUBILADO(A)</option>                                                   
                                    <option value="ORGANIZACIÓN SOCIAL">ORGANIZACIÓN SOCIAL</option>                                                   
                                    <option value="PARTICULAR">PARTICULAR</option>                                                   
                                    <option value="PRESIDENTE(A) AGRUPACIÓN CULTURAL">PRESIDENTE(A) AGRUPACIÓN CULTURAL</option>                                                   
                                    <option value="PRESIDENTE(A) CLUB DEPORTIVO">PRESIDENTE(A) CLUB DEPORTIVO</option>                                                   
                                    <option value="PRESIDENTE(A) JUNTA DE VECINOS">PRESIDENTE(A) JUNTA DE VECINOS</option>                                                   
                                    <option value="PRESIDENTE(A) ORGANIZACIÓN SOCIAL">PRESIDENTE(A) ORGANIZACIÓN SOCIAL</option>                                                   
                                    <option value="PROFESIONAL">PROFESIONAL</option>                                                   
                                    <option value="SECRETARIA(O)">SECRETARIA(O)</option>                                                   
                                    <option value="TRABAJADOR INDEPENDIENTE">TRABAJADOR INDEPENDIENTE</option>                                                   
                                    <option value="USUARIO(A) LOCOMOCIÓN COLECTIVA">USUARIO(A) LOCOMOCIÓN COLECTIVA</option>                                                   
                                    <option value="OTRO">OTRO</option>
                                </select>

                                <label>Actividad u oficio:</label>
                                <select name="actividad_oficio" >
                                    
                                <option value="">Seleccione</option>
                                                                        
                                    <option value="abogado">ABOGADO(A)</option>                                                   
                                    <option value="ADMINISTRADOR PÚBLICO">ADMINISTRADOR PÚBLICO</option>                                                   
                                    <option value="ADMINISTRADOR(A) DE EMPRESAS">ADMINISTRADOR(A) DE EMPRESAS</option>                                                   
                                    <option value="ADMINISTRATIVO(A)">ADMINISTRATIVO(A)</option>                                                   
                                    <option value="AGRICULTOR">AGRICULTOR</option>                                                   
                                    <option value="ANTROPÓLOGO(A)">ANTROPÓLOGO(A)</option>                                                   
                                    <option value="ARQUITECTO(A)">ARQUITECTO(A)</option>                                                   
                                    <option value="ARTISTA">ARTISTA</option>                                                   
                                    <option value="ASESOR(A) DE HOGAR">ASESOR(A) DE HOGAR</option>                                                   
                                    <option value="ASESOR(A) EN PROYECTOS SOCIALES">ASESOR(A) EN PROYECTOS SOCIALES</option>                                                   
                                    <option value="ASESOR(A) TECNICO">ASESOR(A) TECNICO</option>                                                   
                                    <option value="ASISTENTE DE EDUCACION">ASISTENTE DE EDUCACION</option>                                                   
                                    <option value="ASISTENTE SOCIAL">ASISTENTE SOCIAL</option>                                                   
                                    <option value="BIOLOGO(A) MARINO">BIOLOGO(A) MARINO</option>                                                   
                                    <option value="CIENTISTA POLITICO">CIENTISTA POLITICO</option>                                                   
                                    <option value="CIRUJANO DENTISTA">CIRUJANO DENTISTA</option>                                                   
                                    <option value="COMERCIANTE">COMERCIANTE</option>                                                   
                                    <option value="COMUNICADOR(A) SOCIAL">COMUNICADOR(A) SOCIAL</option>                                                   
                                    <option value="CONDUCTOR(A) MICROBUS">CONDUCTOR(A) MICROBUS</option>                                                   
                                    <option value="CONSTRUCTOR(A) CIVIL">CONSTRUCTOR(A) CIVIL</option>                                                   
                                    <option value="CONTADOR PUBLICO Y AUDITOR">CONTADOR PUBLICO Y AUDITOR</option>                                                   
                                    <option value="CONTADOR(A)">CONTADOR(A)</option>                                                   
                                    <option value="CONTADOR(A) AUDITOR">CONTADOR(A) AUDITOR</option>                                                   
                                    <option value="CONTRATISTA ELECTRICO">CONTRATISTA ELECTRICO</option>                                                   
                                    <option value="DIRECTOR DE ESCUELA">DIRECTOR DE ESCUELA</option>                                                   
                                    <option value="DISEÑADOR">DISEÑADOR</option>                                                   
                                    <option value="DOCENTE">DOCENTE</option>                                                   
                                    <option value="DUEÑA DE CASA">DUEÑA DE CASA</option>                                                   
                                    <option value="ECONOMISTA BANCARIO">ECONOMISTA BANCARIO</option>                                                   
                                    <option value="EDUCADOR(A)">EDUCADOR(A)</option>                                                   
                                    <option value="EDUCADORA DE PARVULOS">EDUCADORA DE PARVULOS</option>                                                   
                                    <option value="EGRESADO DE DERECHO">EGRESADO DE DERECHO</option>                                                   
                                    <option value="EMPLEADO">EMPLEADO</option>                                                   
                                    <option value="EMPLEADO BANCARIO">EMPLEADO BANCARIO</option>                                                   
                                    <option value="EMPLEADO FERROCARRILES DEL ESTADO">EMPLEADO FERROCARRILES DEL ESTADO</option>                                                   
                                    <option value="EMPLEADO PUBLICO">EMPLEADO PUBLICO</option>                                                   
                                    <option value="EMPLEADO RUBRO PESQUERO">EMPLEADO RUBRO PESQUERO</option>                                                   
                                    <option value="EMPRESARIA(O) ACUICOLA">EMPRESARIA(O) ACUICOLA</option>                                                   
                                    <option value="EMPRESARIO(A)">EMPRESARIO(A)</option>                                                   
                                    <option value="EMPRESARIO(A) AGRICOLA">EMPRESARIO(A) AGRICOLA</option>                                                   
                                    <option value="EMPRESARIO(A) DE LA CONSTRUCCION">EMPRESARIO(A) DE LA CONSTRUCCION</option>                                                   
                                    <option value="EMPRESARIO(A) EDUCACIONAL">EMPRESARIO(A) EDUCACIONAL</option>                                                   
                                    <option value="EMPRESARIO(A) INFORMATICO">EMPRESARIO(A) INFORMATICO</option>                                                   
                                    <option value="EMPRESARIO(A) TRANSPORTE">EMPRESARIO(A) TRANSPORTE</option>                                                   
                                    <option value="ENCARGADO(A) BIBLIOTECA">ENCARGADO(A) BIBLIOTECA</option>                                                   
                                    <option value="ENFERMERO UNIVERSITARIO">ENFERMERO UNIVERSITARIO</option>                                                   
                                    <option value="ESTADISTICO">ESTADISTICO</option>                                                   
                                    <option value="ESTUDIANTE">ESTUDIANTE</option>                                                   
                                    <option value="ESTUDIANTE INSTITUTO PROFESIONAL">ESTUDIANTE INSTITUTO PROFESIONAL</option>                                                   
                                    <option value="ESTUDIANTE UNIVERSITARIO">ESTUDIANTE UNIVERSITARIO</option>                                                   
                                    <option value="FISCALIZADOR(A)">FISCALIZADOR(A)</option>                                                   
                                    <option value="FUNCIONARIO(A) MUNICIPAL">FUNCIONARIO(A) MUNICIPAL</option>                                                   
                                    <option value="GEOGRAFO(A)">GEOGRAFO(A)</option>                                                   
                                    <option value="GUARDA PARQUES">GUARDA PARQUES</option>                                                   
                                    <option value="HISTORIADOR(A)">HISTORIADOR(A)</option>                                                   
                                    <option value="INGENIERO(A)_AGRICOLA">INGENIERO(A) AGRICOLA</option>                                                   
                                    <option value="INGENIERO(A)_AGRONOMO">INGENIERO(A) AGRONOMO</option>                                                   
                                    <option value="INGENIERO(A)_AGRÓNOMO">INGENIERO(A) AGRÓNOMO</option>                                                   
                                    <option value="INGENIERO(A)_AGRONOMO_ESPECIALISTA_EN_ECONOMIA">INGENIERO(A) AGRONOMO&nbsp; ESPECIALISTA EN ECONOMIA</option>                                                   
                                    <option value="INGENIERO(A)_AMBIENTAL">INGENIERO(A) AMBIENTAL</option>                                                   
                                    <option value="INGENIERO(A)_CIVIL">INGENIERO(A) CIVIL</option>                                                   
                                    <option value="INGENIERO(A)_CIVIL_CONMENCION_EN_HIDRAULICA">INGENIERO(A) CIVIL CON MENCION EN&nbsp; HIDRAULICA</option>                                                   
                                    <option value="INGENIERO(A)_CIVIL_INDUSTRIAL">INGENIERO(A) CIVIL INDUSTRIAL</option>                                                   
                                    <option value="INGENIERO(A)_COMERCIAL">INGENIERO(A) COMERCIAL</option>                                                   
                                    <option value="INGENIERO(A)_CONSTRUCTOR">INGENIERO(A) CONSTRUCTOR</option>                                                   
                                    <option value="INGENIERO(A)_DE_AGRONEGOCIOS">INGENIERO(A) DE AGRONEGOCIOS</option>                                                   
                                    <option value="INGENIERO(A)_EJECUCION_INFORMATICA">INGENIERO(A) EJECUCION INFORMATICA</option>                                                   
                                    <option value="INGENIERO(A)_EN_ADMINISTRACION">INGENIERO(A) EN ADMINISTRACION</option>                                                   
                                    <option value="INGENIERO(A)_EN_ALIMENTOS">INGENIERO(A) EN ALIMENTOS</option>                                                   
                                    <option value="INGENIERO(A)_EN_EJECUCION_MECANICA">INGENIERO(A) EN EJECUCION MECANICA</option>                                                   
                                    <option value="INGENIERO(A)_FORESTAL">INGENIERO(A) FORESTAL</option>                                                   
                                    <option value="INGENIERO(A)_INFORMATICO">INGENIERO(A) INFORMATICO</option>                                                   
                                    <option value="INGENIERO(A)_PESQUERO">INGENIERO(A) PESQUERO</option>                                                   
                                    <option value="INGENIERO(A)_PREVENCIÓN_DE_RIESGOS">INGENIERO(A) PREVENCIÓN DE RIESGOS</option>                                                   
                                    <option value="JUBILADO(A)">JUBILADO(A)</option>                                                   
                                    <option value="LICENCIADA_EN_CIENCIAS_BIOLOGICAS">LICENCIADA EN CIENCIAS BIOLOGICAS</option>                                                   
                                    <option value="LICENCIADO(A)_EN_FILOSOFIA">LICENCIADO(A) EN FILOSOFIA</option>                                                   
                                    <option value="LICENCIADO(A)_EN_HISTORIA">LICENCIADO(A) EN HISTORIA</option>                                                   
                                    <option value="MEDICO">MEDICO</option>                                                   
                                    <option value="MEDICO_CIRUJANO">MEDICO CIRUJANO</option>                                                   
                                    <option value="MEDICO_VETERINARIO">MEDICO VETERINARIO</option>                                                   
                                    <option value="MICROEMPRESARIO(A)">MICROEMPRESARIO(A)</option>                                                   
                                    <option value="MONITOR(A)_DE_DEPORTES">MONITOR(A) DE DEPORTES</option>                                                   
                                    <option value="MÚSICO">MÚSICO</option>                                                   
                                    <option value="OFICIAL_MARINA_MERCANTE">OFICIAL MARINA MERCANTE</option>                                                   
                                    <option value="OPERADOR(A)_TURISMO ">OPERADOR(A) TURISMO </option>                                                   
                                    <option value="PENSIONADO(A)">PENSIONADO(A)</option>                                                   
                                    <option value="PERIODISTA">PERIODISTA</option>                                                   
                                    <option value="PROFESOR_POST_GRADO_ADM._PUBLICA_Y_GOBER.">PROFESOR POST GRADO ADM. PUBLICA Y GOBER.</option>                                                   
                                    <option value="PROFESOR(A)">PROFESOR(A)</option>                                                   
                                    <option value="PROFESOR(A)_DE_ESTADO">PROFESOR(A) DE ESTADO</option>                                                   
                                    <option value="PROFESOR(A)_EDUCACION_GENERAL_BASICA">PROFESOR(A) EDUCACION GENERAL BASICA</option>                                                   
                                    <option value="PROFESOR(A)_ENSEÑANZA MEDIA">PROFESOR(A) ENSEÑANZA MEDIA</option>                                                   
                                    <option value="PROFESOR(A)_NORMALISTA">PROFESOR(A) NORMALISTA</option>                                                   
                                    <option value="PROFESOR(A)_UNIVERSITARIO(A)">PROFESOR(A) UNIVERSITARIO(A)</option>                                                   
                                    <option value="PROFESORA-DIRECTORA">PROFESORA-DIRECTORA</option>                                                   
                                    <option value="PSICOLOGO(A)">PSICOLOGO(A)</option>                                                   
                                    <option value="QUIMICO">QUIMICO</option>                                                   
                                    <option value="RELACIONADOR_PUBLICO">RELACIONADOR PUBLICO</option>                                                   
                                    <option value="RELACIONADORA_PUBLICA">RELACIONADORA PUBLICA</option>                                                   
                                    <option value="SECRETARIA(O)">SECRETARIA(O)</option>                                                   
                                    <option value="SOCIOLOGO(A)">SOCIOLOGO(A)</option>                                                   
                                    <option value="SOLDADOR(A)">SOLDADOR(A)</option>                                                   
                                    <option value="SUPERVISOR">SUPERVISOR</option>                                                   
                                    <option value="TECNICO_DE_NIVEL_SUPERIOR_DE_BUCEO_Y_SALVATAJE">TECNICO DE NIVEL SUPERIOR DE BUCEO Y SALVATAJE</option>                                                   
                                    <option value="TECNICO_DEPORTIVO">TECNICO DEPORTIVO</option>                                                   
                                    <option value="TECNICO_ELECTRICO">TECNICO ELECTRICO</option>                                                   
                                    <option value="TECNICO_FORESTAL">TECNICO FORESTAL</option>                                                   
                                    <option value="TECNICO_FORESTAL">TECNICO FORESTAL</option>                                                   
                                    <option value="TECNICO_INSTALADOR_DE_GAS">TECNICO INSTALADOR DE GAS</option>                                                   
                                    <option value="TECNICO_PESQUERO_UNIVERSITARIO">TECNICO PESQUERO UNIVERSITARIO</option>                                                   
                                    <option value="TECNICO_UNIVERSITARIO_EN_PESCA">TECNICO UNIVERSITARIO EN PESCA</option>                                                   
                                    <option value="TECNOLOGO(A)_EN_CONS._ALIMENTOS">TECNOLOGO(A) EN CONS. ALIMENTOS</option>                                                   
                                    <option value="TOPOGRAFO">TOPOGRAFO</option>                                                   
                                    <option value="TRABAJADOR(A)_SOCIAL">TRABAJADOR(A) SOCIAL</option>                                                   
                                    <option value="VENDEDOR(A)">VENDEDOR(A)</option>                                                   
                                    <option value="OTRA">OTRA</option>
                                </select>
                                    

                                    </div>
                                    <div class="col-md-6">
                                        
                                    <label>Institución a la que desea enviar mensaje:</label>
                                <select name="intitucion_a_enviar" >
                                <option value="">Seleccione</option>
                                
                                                                        
                                    <option value="Gobierno Regional de Los Lagos">Gobierno Regional de Los Lagos</option>                                                   
                                    <option value="Intendencia Regional">Intendencia Regional</option>                                                   
                                    <option value="Secretaria Regional Ministerial de Economia">Secretaria Regional Ministerial de Economia</option>                                                   
                                    <option value="Secretaria Regional Ministerial de Educacion">Secretaria Regional Ministerial de Educacion</option>                                                   
                                    <option value="Secretaria Regional Ministerial de Justicia">Secretaria Regional Ministerial de Justicia</option>                                                   
                                    <option value="Secretaria Regional Ministerial de Obras Publicas">Secretaria Regional Ministerial de Obras Publicas</option>                                                   
                                    <option value="Secretaria Regional Ministerial de Agricultura">Secretaria Regional Ministerial de Agricultura</option>                                                   
                                    <option value="Secretaria Regional Ministerial de Agricultura">Secretaria Regional Ministerial de Bienes Nacionales</option>                                                   
                                    <option value="Secretaria Regional Ministerial del Trabajo y Prevision Social">Secretaria Regional Ministerial del Trabajo y Prevision Social</option>                                                   
                                    <option value="Secretaria Regional Ministerial de Salud">Secretaria Regional Ministerial de Salud</option>                                                   
                                    <option value="Secretaria Regional Ministerial de Vivienda y Urbanismo">Secretaria Regional Ministerial de Vivienda y Urbanismo</option>                                                   
                                    <option value="Secretaria Regional Ministerial de Transporte y Telecomunicaciones">Secretaria Regional Ministerial de Transporte y Telecomunicaciones</option>                                                   
                                    <option value="Secretaria Regional Ministerial de Gobierno">Secretaria Regional Ministerial de Gobierno</option>                                                   
                                    <option value="Secretaria Regional Ministerial de Desarrollo Social">Secretaria Regional Ministerial de Desarrollo Social</option>                                                   
                                    <option value="Servicio Nacional de la Mujer">Servicio Nacional de la Mujer</option>                                                   
                                    <option value="Servicio Nacional de Turismo">Servicio Nacional de Turismo</option>                                                   
                                    <option value="Servicio Regional de Vivienda y Urbanizacion">Servicio Regional de Vivienda y Urbanizacion</option>                                                   
                                    <option value="Servicio de Impuestos Internos">Servicio de Impuestos Internos</option>                                                   
                                    <option value="Servicio Nacional de Pesca">Servicio Nacional de Pesca</option>                                                   
                                    <option value="Servicio Nacional de Capacitacion y Empleo">Servicio Nacional de Capacitacion y Empleo</option>                                                   
                                    <option value="Servicio Nacional del Menor">Servicio Nacional del Menor</option>                                                   
                                    <option value="Servicio Nacional del Consumidor">Servicio Nacional del Consumidor</option>                                                   
                                    <option value="Direccion Zonal Superintendencia de Electricidad y Combustible">Direccion Zonal Superintendencia de Electricidad y Combustible</option>                                                   
                                    <option value="Servicio Agricola y Ganadero">Servicio Agricola y Ganadero</option>                                                   
                                    <option value="Servicio de Cooperacion Tecnica">Servicio de Cooperacion Tecnica</option>                                                   
                                    <option value="Chiledeportes">Chiledeportes</option>                                                   
                                    <option value="Gobernacion Provincial de Osorno">Gobernacion Provincial de Osorno</option>                                                   
                                    <option value="Gobernacion Provincial de Llanquihue">Gobernacion Provincial de Llanquihue</option>                                                   
                                    <option value="Gobernacion Provincial de Chiloe">Gobernacion Provincial de Chiloe</option>                                                   
                                    <option value="Gobernacion Provincial de Palena">Gobernacion Provincial de Palena</option>                                                   
                                    <option value="Direccion Regional de Vialidad">Direccion Regional de Vialidad</option>                                                   
                                    <option value="Direccion Regional de Arquitectura">Direccion Regional de Arquitectura</option>                                                   
                                    <option value="Direccion Regional de Aeropuertos">Direccion Regional de Aeropuertos</option>                                                   
                                    <option value="Servicio de Salud del Reloncavi">Servicio de Salud del Reloncavi</option>                                                   
                                    <option value="Servicio de Salud Osorno">Servicio de Salud Osorno</option>                                                   
                                    <option value="Direccion Regional del Trabajo">Direccion Regional del Trabajo</option>                                                   
                                    <option value="Direccion Regional de Registro Civil">Direccion Regional de Registro Civil</option>                                                   
                                    <option value="Direccion Regional de Obras Portuarias">Direccion Regional de Obras Portuarias</option>                                                   
                                    <option value="Direccion Regional de Aduanas">Direccion Regional de Aduanas</option>                                                   
                                    <option value="Direccion Regional de Aeronautica Civil">Direccion Regional de Aeronautica Civil</option>                                                   
                                    <option value="Direccion de Bibliotecas Archivos y Museos">Direccion de Bibliotecas Archivos y Museos</option>                                                   
                                    <option value="Direccion Regional de Aguas">Direccion Regional de Aguas</option>                                                   
                                    <option value="Direccion Regional de Emergencia">Direccion Regional de Emergencia</option>                                                   
                                    <option value="Direccion Regional de Obras Hidraulicas">Direccion Regional de Obras Hidraulicas</option>                                                   
                                    <option value="Direccion Regional Integra">Direccion Regional Integra</option>                                                   
                                    <option value="Direccion Regional de Gendarmeria">Direccion Regional de Gendarmeria</option>                                                   
                                    <option value="Instituto Nacional de la Juventud">Instituto Nacional de la Juventud</option>                                                   
                                    <option value="Instituto Nacional de Estadisticas">Instituto Nacional de Estadisticas</option>                                                   
                                    <option value="Instituto de Prevision Social">Instituto de Prevision Social</option>                                                   
                                    <option value="Instituto de Desarrollo Agropecuario">Instituto de Desarrollo Agropecuario</option>                                                   
                                    <option value="Instituto Nacional de Investigacion Agropecuaria">Instituto Nacional de Investigacion Agropecuaria</option>                                                   
                                    <option value="Corporacion de Fomento">Corporacion de Fomento</option>                                                   
                                    <option value="Comision Nacional del Medio Ambiente">Comision Nacional del Medio Ambiente</option>                                                   
                                    <option value="Corporacion Nacional de Desarrollo Indigena">Corporacion Nacional de Desarrollo Indigena</option>                                                   
                                    <option value="Corporacion Nacional Forestal">Corporacion Nacional Forestal</option>                                                   
                                    <option value="Junta Nacional de Jardines Infantiles">Junta Nacional de Jardines Infantiles</option>                                                   
                                    <option value="Junta Nacional de Auxilio Escolar y Becas">Junta Nacional de Auxilio Escolar y Becas</option>                                                   
                                    <option value="Fondo de Solidaridad e Inversion Social">Fondo de Solidaridad e Inversion Social</option>                                                   
                                    <option value="Fondo Nacional de Salud">Fondo Nacional de Salud</option>                                                   
                                    <option value="Fundacion de la Familia">Fundacion de la Familia</option>                                                   
                                    <option value="Chilebarrio">Chilebarrio</option>                                                   
                                    <option value="ProChile">ProChile</option>                                                   
                                    <option value="Prodemu">Prodemu</option>                                                   
                                    <option value="Unidad de Control Regional">Unidad de Control Regional</option>                                                   
                                    <option value="Direccion Regional de Cultura">Direccion Regional de Cultura</option>                                                   
                                    <option value="Municipalidad de Ancud">Municipalidad de Ancud</option>                                                   
                                    <option value="Municipalidad de Calbuco">Municipalidad de Calbuco</option>                                                   
                                    <option value="Municipalidad de Castro">Municipalidad de Castro</option>                                                   
                                    <option value="Municipalidad de Chaiten">Municipalidad de Chaiten</option>                                                   
                                    <option value="Municipalidad de Chonchi">Municipalidad de Chonchi</option>                                                   
                                    <option value="Municipalidad de Cochamo">Municipalidad de Cochamo</option>                                                   
                                    <option value="Municipalidad de Curaco de Velez">Municipalidad de Curaco de Velez</option>                                                   
                                    <option value="Municipalidad de Dalcahue">Municipalidad de Dalcahue</option>                                                   
                                    <option value="Municipalidad de Fresia">Municipalidad de Fresia</option>                                                   
                                    <option value="Municipalidad de Frutillar">Municipalidad de Frutillar</option>                                                   
                                    <option value="Municipalidad de Futaleufu">Municipalidad de Futaleufu</option>                                                   
                                    <option value="Municipalidad de Hualaihue">Municipalidad de Hualaihue</option>                                                   
                                    <option value="Municipalidad de Llanquihue">Municipalidad de Llanquihue</option>                                                   
                                    <option value="Municipalidad de Los Muermos">Municipalidad de Los Muermos</option>                                                   
                                    <option value="Municipalidad de Maullin">Municipalidad de Maullin</option>                                                   
                                    <option value="Municipalidad de Osorno">Municipalidad de Osorno</option>                                                   
                                    <option value="Municipalidad de Palena">Municipalidad de Palena</option>                                                   
                                    <option value="Municipalidad de Puerto Montt">Municipalidad de Puerto Montt</option>                                                   
                                    <option value="Municipalidad de Puerto Octay">Municipalidad de Puerto Octay</option>                                                   
                                    <option value="Municipalidad de Puerto Varas">Municipalidad de Puerto Varas</option>                                                   
                                    <option value="Municipalidad de Purranque">Municipalidad de Purranque</option>                                                   
                                    <option value="Municipalidad de Queilen">Municipalidad de Queilen</option>                                                   
                                    <option value="Municipalidad de Quellon">Municipalidad de Quellon</option>                                                   
                                    <option value="Municipalidad de Quemchi">Municipalidad de Quemchi</option>                                                   
                                    <option value="Municipalidad de Quinchao">Municipalidad de Quinchao</option>                                                   
                                    <option value="Municipalidad de Rio Negro">Municipalidad de Rio Negro</option>                                                   
                                    <option value="Municipalidad de San Juan de la Costa">Municipalidad de San Juan de la Costa</option>                                                   
                                    <option value="Municipalidad de San Pablo">Municipalidad de San Pablo</option>                                                   
                                    <option value="Municipalidad de Puqueldon">Municipalidad de Puqueldon</option>                                                   
                                    <option value="Municipalidad de Puyehue">Municipalidad de Puyehue</option>
                                </select>

                                <label>Tema del Mensaje:</label>
                                <select name="tema_mensaje" >
                                    
                                <option value="">Seleccione</option>
                                    <option value="agricultura">AGRICULTURA</option>                                                   
                                    <option value="borde_costero">BORDE COSTERO</option>                                                   
                                    <option value="ciencia_y_tecnologia">CIENCIA Y TECNOLOGÍA</option>                                                   
                                    <option value="comercio">COMERCIO</option>                                                   
                                    <option value="concurso_publico">CONCURSO PUBLICO</option>                                                   
                                    <option value="cultura">CULTURA</option>                                                   
                                    <option value="derechos_civiles">DERECHOS CIVILES</option>                                                   
                                    <option value="derechos_humanos">DERECHOS HUMANOS</option>                                                   
                                    <option value="economia">ECONOMÍA</option>                                                   
                                    <option value="educacion">EDUCACIÓN</option>                                                   
                                    <option value="empleo">EMPLEO</option>                                                   
                                    <option value="energia">ENERGÍA</option>                                                   
                                    <option value="estrategia_desarollo_regional">ESTRATEGIA DESARROLLO REGIONAL</option>                                                   
                                    <option value="fondos_concursables">FONDOS CONCURSABLES</option>                                                   
                                    <option value="justicia">JUSTICIA</option>                                                   
                                    <option value="medio_ambiente">MEDIO AMBIENTE</option>                                                   
                                    <option value="mundo_rural">MUNDO RURAL</option>                                                   
                                    <option value="politica_exterior">POLÍTICA EXTERIOR</option>                                                   
                                    <option value="salud">SALUD</option>                                                   
                                    <option value="seguridad_ciudadana">SEGURIDAD CIUDADANA</option>                                                   
                                    <option value="transporte">TRANSPORTE</option>                                                   
                                    <option value="vivienda">VIVIENDA</option>                                                   
                                    <option value="otro">OTRO</option>
                                </select>

                                <label>Propósito u Objetivo:</label>
                                <select name="proposito_objetivo" >
                                    
                                <option value="">Seleccione</option>

                                    <option value="audiencia">AUDIENCIA</option>                                                   
                                    <option value="consulta">CONSULTA</option>                                                   
                                    <option value="denuncia">DENUNCIA</option>                                                   
                                    <option value="expone_reclamo">EXPONE RECLAMO</option>                                                   
                                    <option value="expresar_agradecimientos">EXPRESAR AGRADECIMIENTOS</option>                                                   
                                    <option value="expresar_condolencias">EXPRESAR CONDOLENCIAS</option>                                                   
                                    <option value="expresar_felicitaciones">EXPRESAR FELICITACIONES</option>
                                </select>

                                    </div>
                                </div>
                            </div>
















                               

                                <label>Solicita Respuestas:</label>
                                <select name="solicita_respuestas" >
                                    
                                    <option value="">Seleccione</option>
                                    <option value="si">Si</option>
                                    <option value="no">No</option>
                                </select>

                                <label>Mensaje:</label>
                                <textarea name="mensaje_sugerencia_reclamo" rows="4" cols="50" ></textarea>
                            </div>
                            
            <div class="form-group row pb-4">                      
                <div class="col-xs-2">  
                        <label for="captcha">Resuelve la siguiente suma: <span id="captchaQuestion"></span></label>
                        <input type="text" id="captcha" name="captcha" class="form-control" required style="width: 30%;">
                    </div>
            </div>
                            <button type="submit" class="btn-enviar pt-2">Enviar</button>
                        </form>




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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Obtener el elemento del tipo de mensaje
        var tipoMensaje = document.getElementById('tipoMensaje');

        // Obtener los campos específicos
        var campoConsulta = document.getElementById('campoConsulta');
        var campoSugerencias = document.getElementById('campoSugerencias');

        // Función para mostrar u ocultar campos específicos según el tipo de mensaje seleccionado
        function toggleCampos() {
            if (tipoMensaje.value === 'consulta') {
                campoConsulta.style.display = 'block';
                campoSugerencias.style.display = 'none';
            } else if (tipoMensaje.value === 'sugerencias') {
                campoConsulta.style.display = 'none';
                campoSugerencias.style.display = 'block';
            } else {
                campoConsulta.style.display = 'none';
                campoSugerencias.style.display = 'none';
            }
        }

        // Mostrar u ocultar campos especíasficos al cargar la página
        toggleCampos();

        // Mostrar u ocultar campos específicos al cambiar el tipo de mensaje
        tipoMensaje.addEventListener('change', toggleCampos);

        // Agregar un evento al formulario para realizar la validación antes de enviar
        document.getElementById('myForm').addEventListener('submit', function (event) {
            // Puedes agregar aquí la lógica de validación adicional si es necesario

            // No evita el envío del formulario, incluso si los campos ocultos no están llenos
        });
    });
</script>
<script>  
    document.addEventListener("DOMContentLoaded", function() {
      
        document.querySelector('.navbar').style.cssText = 'background-color: #F59120 !important; border-bottom: 1px solid #FFFFFF;';
        document.querySelector('.nav-head').style.cssText = 'background-color: #F59120 !important; border-bottom: 1px solid #FFFFFF;border-bottom:none !important;';

    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Generar dos números aleatorios entre 1 y 10
        const num1 = Math.floor(Math.random() * 10) + 1;
        const num2 = Math.floor(Math.random() * 10) + 1;

        // Mostrar la pregunta en el formulario
        document.getElementById('captchaQuestion').textContent = `${num1} + ${num2} = ?`;

        // Obtener el formulario
        const form = document.getElementById('myForm');

        // Agregar un evento de validación al formulario
        form.addEventListener('submit', function (event) {
            // Obtener la respuesta del usuario
            const userAnswer = parseInt(document.getElementById('captcha').value, 10);
            const correctAnswer = num1 + num2;

            // Validar la respuesta
            if (userAnswer !== correctAnswer) {
                // Mostrar un mensaje de error
                alert('La respuesta a la pregunta de seguridad es incorrecta. Por favor, inténtelo de nuevo.');

                // Prevenir el envío del formulario
                event.preventDefault();
            }
        });
    });
</script>


@endsection
