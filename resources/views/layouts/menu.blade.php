<style>
.menu-back  .accordion-body {
    background: #0c1e35;
}
.accordion-body ul {
    padding-left: 0rem;
}
.menu-back  button.accordion-button.collapsed {
    background: #0c1e35;
    color: #fff;
    border: none;
}
.style-col-menu{
    background-color: #0c1e35;
   /* height: 100vh;*/
}
</style>
<div class="row">
                    <div class="col-md-12">
                        <div class="logo pt-4 pb-4">
                        <a href="{{ url('/') }}">
                        <img src="{{ asset('storage/images/logo.png') }}" alt="logo" style="max-width: 218px; max-height: 61px;">
                        </a>    
                      
                        </div>
                        <div class="menu-back accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Gobierno Regional
                                    </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ url('/introducciones') }}">Qué es el Gobierno Regional</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ url('/comofuncionagrs') }}">Cómo funciona</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ url('/estrategias') }}">Estrategias</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ url('/inversiones') }}">Inversiones</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ url('/mision') }}">Misión</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ url('/leygobiernoregional') }}">Ley</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ url('/organigrama') }}">Organigrama</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ url('/documentosgestion') }}">Documentos de Gestión</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ url('/dptogestionpersonas') }}">Gestión y Desarrollo de Personas</a>
                                            </li>
                                            <ul style="padding: 0px">
                                                <li class="style-li">
                                                    <a class="style-a-menu" href="javascript:void(0);">Trámites Digitales</a>
                                                    <ul class="submenu">
                                                        <li class="style-li" style="padding-top: 5px;">
                                                            <a class="style-a-menu" href="{{ url('/tramites') }}">Todos los Trámites</a>
                                                        </li>
                                                        <li class="style-li">
                                                            <a class="style-a-menu" href="{{ url('/tramites/create') }}">Nuevo Trámite</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <ul style="padding: 0px">
                                                <li class="style-li">
                                                    <a class="style-a-menu" href="javascript:void(0);">Asamblea Climática</a>
                                                    <ul class="submenu">
                                                        <li class="style-li">
                                                            <a class="style-a-menu" href="{{ url('/asambleaclimatica') }}">Asamblea Climática</a>
                                                        </li>
                                                        <li class="style-li">
                                                            <a class="style-a-menu" href="{{ url('/audienciasdepartes/') }}">Audiencias de Partes</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ url('/disenopoliticoregionales') }}">Política de Sostenibilidad Hídrica</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ url('/politicapersonasmayores') }}">Política Personas Mayores</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ url('/listplanificainstitucional') }}"> Planificación Institucional</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ url('/concursospublicos') }}">Concursos Publicos</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ url('/comiteciencias') }}">Comite de Ciencias</a>
                                            </li>
                                        </ul>
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        Consejo Regional
                                    </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                    <ul>
                                        <li class="style-li">
                                            <a class="style-a-menu" href="{{ route('concejoregional.index') }}">Introducción</a>
                                        </li>
                                        <li class="style-li">
                                            <a class="style-a-menu" href="{{ route('presidenteconcejo.index') }}">Presidente del Consejo</a>
                                        </li>
                                        <li class="style-li">
                                            <a class="style-a-menu" href="{{ route('consejerososorno.index') }}">Consejeros de Osorno</a>
                                        </li>
                                        <li class="style-li">
                                            <a class="style-a-menu" href="{{ route('consejerosllanquihue.index') }}">Consejeros de Llanquihue</a>
                                        </li>
                                        <li class="style-li">
                                            <a class="style-a-menu" href="{{ route('consejeroschiloe.index') }}">Consejeros de Chiloé</a>
                                        </li>
                                        <li class="style-li">
                                            <a class="style-a-menu" href="{{ route('consejerospalena.index') }}">Consejeros de Palena</a>
                                        </li>            
                                    </ul>
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        Región de Los Lagos
                                    </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('IntroduccionRegionLagos.index') }}">Introducción</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('AntecedentesRegionLagos.indexAntecedentes') }}">Información de la Región</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('AutoridadesRegionLagos.indexAutoridades', 'Gobernador Regional') }}">Autoridades</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('EstadisticasRegionLagos.indexEstadisticas') }}">Estadísticas</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('DinamicaEconomicaRegionLagos.indexDinamicaEconomica') }}">Dinámica Económica</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('ExportacionSegunRamaActividad.index') }}">Exportación Según Rama Actividad</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('ExportacionSegunBloqueEconomico.index') }}">Exportación Según Bloque Económico</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('ActividadEconomica.index') }}">Actividad Económica</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('FNDR.index') }}">FNDR</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('InversionesD.index') }}">Inversiones</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('InversionPublicaEfectiva.index') }}">Inversión pública en la Región Fuente</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('FinanciamientoporProvincias.index') }}">Financiamiento por Provincias</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('PoliticaPrivacidad.index') }}">Políticas de Privacidad</a>
                                            </li>                                   
                                        </ul>
                                    </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefour1" aria-expanded="false" aria-controls="flush-collapsefour1">
                                        Home
                                    </button>
                                    </h2>
                                    <div id="flush-collapsefour1" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('Home.actualizar') }}">Editar Titulo, Descripcion y minibanners</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('Home.slider') }}">Editar Sliders</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('Home.banners') }}">Editar Banners</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefour" aria-expanded="false" aria-controls="flush-collapsefour">
                                            Documentos
                                        </button>
                                    </h2>
                                    <div id="flush-collapsefour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <ul>
                                                <li class="style-li">
                                                    <a class="style-a-menu" href="{{ route('documentos.create') }}">Agregar nuevo</a>
                                                </li>
                                                <li class="style-li">
                                                    <a class="style-a-menu" href="{{ route('documentos.verdocumentos') }}">Ver Documentos</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsetable" aria-expanded="false" aria-controls="flush-collapsetable">
                                            Tabla Sesiones del Consejo
                                        </button>
                                    </h2>
                                    <div id="flush-collapsetable" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <ul>
                                                <li class="style-li">
                                                    <a class="style-a-menu" href="{{ route('sesionesConsejo.create') }}">Agregar nuevo</a>
                                                </li>
                                                <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('sesionesConsejo.index') }}">Ver Todas las Sesiones</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefive" aria-expanded="false" aria-controls="flush-collapsefive">
                                        Formularios
                                    </button>
                                    </h2>
                                    <div id="flush-collapsefive" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('verformularios') }}">Todos los formularios</a>
                                            </li>
                                        </ul>
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsesix" aria-expanded="false" aria-controls="flush-collapsesix">
                                        Funcionarios
                                    </button>
                                    </h2>
                                    <div id="flush-collapsesix" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <!-- <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('funcionarios.create') }}">Agregar nuevo</a>
                                            </li> -->
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('funcionarios.verfuncionarios') }}">Ver Funcionarios</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('funcionarios.cargamasiva') }}">Carga masiva</a>
                                            </li>
                                        </ul>
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseseven" aria-expanded="false" aria-controls="flush-collapseseven">
                                        Sala de prensa
                                    </button>
                                    </h2>
                                    <div id="flush-collapseseven" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('salaprensa.create') }}">Agregar nuevo</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('salaprensa.vernoticia') }}">Ver Noticias</a>
                                            </li>
                                        </ul>
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseeight" aria-expanded="false" aria-controls="flush-collapseeight">
                                        Sitios de Gobierno
                                    </button>
                                    </h2>
                                    <div id="flush-collapseeight" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('sitiodegobierno.create') }}">Agregar nuevo</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('sitiodegobierno.vernoticia') }}">Ver Sitios de Gobierno</a>
                                            </li> 
                                        </ul>
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsenine" aria-expanded="false" aria-controls="flush-collapsenine">
                                        Programas
                                    </button>
                                    </h2>
                                    <div id="flush-collapsenine" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li class="style-li" >
                                                <a class="style-a-menu" href="{{ url('/programas') }}">Todos los Programas</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ url('/programas/create') }}">Nuevo Programa</a>
                                            </li>
                                        </ul>
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsenine" aria-expanded="false" aria-controls="flush-collapsenine">
                                        Fondos 
                                    </button>
                                    </h2>
                                    <div id="flush-collapsenine" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li class="style-li" >
                                                <a class="style-a-menu" href="{{ url('/fondosfndr') }}">Todos los Fondos</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ url('/fondosfndr/create') }}">Nuevo Fondo</a>
                                            </li>
                                        </ul>
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapstenP" aria-expanded="false" aria-controls="flush-collapstenP">
                                        Política de Turismo
                                    </button>
                                    </h2>
                                    <div id="flush-collapstenP" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('Politicadeturismo.index') }}">Política de Turismo</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('PoliticaRegionalTurismo.index') }}">Lanzamiento Politica Turismo</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('TrabajoParticipativoMetodologia.index') }}">Trabajo Participativo Metodología</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('TrabajoParticipativoTalleresProvinciales.index') }}">Trabajo Participativo Talleres Provinciales</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('MesaPublicoPrivada.index') }}">Mesa Pública-Privada</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('ComiteTecnicodeGestion.index') }}">Comité Técnico de Gestión</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ route('Subcomisiones.index') }}">Subcomisiones</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ url('/imagenregion') }}">Imagen Región</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ url('/presentaciones') }}">Presentaciones</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ url('/difusion') }}">Difusión</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ url('/seminarios') }}">Seminario Internacional</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ url('/galerias') }}">Galería de fotos</a>
                                            </li>
                                            
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ url('/biblioteca') }}">Seminario Internacional Biblioteca</a>
                                            </li>
                                            <li class="style-li">
                                                <ul style="padding: 0px">
                                                    <li class="style-li">
                                                        <a class="style-a-menu" href="javascript:void(0);">Seminario Internacional Agenda</a>
                                                        <ul class="submenu">
                                                            <li class="style-li" style="padding-top: 5px;">
                                                                <a class="style-a-menu" href="{{ url('/eventos') }}">Todos los Eventos</a>
                                                            </li>
                                                            <li class="style-li">
                                                                <a class="style-a-menu" href="{{ url('/eventos/create') }}">Nuevo Evento</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsten" aria-expanded="false" aria-controls="flush-collapsten">
                                        Preguntas Frecuentes
                                    </button>
                                    </h2>
                                    <div id="flush-collapsten" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ url('/preguntas') }}">Todas </a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ url('/preguntas/create') }}">Nueva Pregunta</a>
                                            </li>
                                        </ul>
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapstene" aria-expanded="false" aria-controls="flush-collapstene">
                                        Configuración
                                    </button>
                                    </h2>
                                    <div id="flush-collapstene" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li class="style-li">
                                                <a class="style-a-menu"  href="{{ route('popups.index') }}">Popups </a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="javascript:void(0);">Landings page</a>
                                                <ul class="submenu">
                                                    <li class="style-li" style="padding-top: 5px;">
                                                        <a class="style-a-menu" href="{{ url('/landings/') }}">Todas las landings</a>
                                                    </li>
                                                    <li class="style-li">
                                                        <a class="style-a-menu" href="{{ url('/landings/create') }}">Nueva landing</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    </div>
                                    
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                    
                                    @if(auth()->check())
                                    <form action="{{ route('logout') }}" method="POST" style="background: #0c1e35;">
                                        @csrf
                                        <button type="submit" style="color: #fff;font-size: 16px;background: #0c1e35;padding: 10px 21px;border: none;">Cerrar Sesión</button>
                                    </form>
                                @endif
                                    
                                    </h2>
                                    
                                </div>
                                <!-- En tu vista Blade -->
                                

                                
                                        
                            
                                </div>
                        
    </div>                                  
</div>
<style>
    .submenu {
        display: none;
    }

    .style-li.active .submenu {
        display: block;
    }
    .style-li.active .style-a-menu {
        color: red;
    }
</style>

<script>
    $(document).ready(function() {
        // Ocultar todos los submenús al principio
        $('.submenu').hide();

        // Obtener la URL actual
        var currentUrl = window.location.href;

        // Recorrer cada enlace del menú para verificar la coincidencia con la URL
        $('.style-a-menu').each(function() {
            var menuItemUrl = $(this).attr('href');

            if (currentUrl.indexOf(menuItemUrl) !== -1) {
                // Activar el elemento que coincide con la URL
                $(this).closest('.style-li').addClass('active').parents('.submenu').show();
            }
        });

        // Manejar clics en los elementos del menú
        $('.style-li a').click(function(e) {
            // Desactivar todos los elementos del menú
            $('.style-li').removeClass('active');

            // Ocultar todos los submenús
            $('.submenu').slideUp();

            // Activar el elemento clicado
            $(this).parent('.style-li').addClass('active');

            // Desplegar el submenú si es un submenú
            if ($(this).siblings('.submenu').length > 0) {
                $(this).siblings('.submenu').slideDown();
            }
        });

        // Manejar clics en los botones del menú principal
        $('[data-bs-toggle="collapse"]').click(function() {
            // Ocultar todos los submenús
            $('.submenu').slideUp();

            // Desactivar todos los elementos del menú
            $('.style-li').removeClass('active');
        });
    });
</script>
