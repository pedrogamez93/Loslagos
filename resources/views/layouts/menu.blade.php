<div class="row">
                    <div class="col-md-12">
                        <div class="logo pt-4 pb-4">
                            <img src="{{ asset('storage/images/logo.png') }}" alt="logo" style="max-width: 218px; max-height: 61px;">
                        </div>
                        <!-- Agrega un botón que servirá como el enlace principal "Gobierno Regional" -->
                        <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#menuGobiernoRegional" aria-expanded="false" aria-controls="menuGobiernoRegional">
                            Gobierno Regional
                        </button>

                        <!-- Define el menú desplegable -->
                        <div class="collapse show" id="menuGobiernoRegional">
                            <ul>
                                <li class="style-li">
                                    <a class="style-a-menu" href="{{ url('/introducciones') }}">Qué es el Gobierno Regional</a>
                                </li>
                                <li class="style-li">
                                    <a class="style-a-menu" href="{{ url('/comofuncionagrs') }}">Como Funciona</a>
                                </li>
                                <li class="style-li">
                                    <a class="style-a-menu" href="{{ url('/estrategias') }}">Estrategias</a>
                                </li>
                                <li class="style-li">
                                    <a class="style-a-menu" href="{{ url('/inversiones') }}">Inversiones</a>
                                </li>
                                <li class="style-li">
                                    <a class="style-a-menu" href="{{ url('/mision') }}">Mision</a>
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
                                        <a class="style-a-menu" href="javascript:void(0);">Asamblea Climatica</a>
                                        <ul class="submenu">
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ url('/asambleaclimatica') }}">Asamblea Climatica</a>
                                            </li>
                                            <li class="style-li">
                                                <a class="style-a-menu" href="{{ url('/audienciasdepartes/') }}">Audiencias de Partes</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <li class="style-li">
                                    <a class="style-a-menu" href="{{ url('/disenopoliticoregionales') }}">Política Sostenibilidad Hidrica</a>
                                </li>
                                <li class="style-li">
                                    <a class="style-a-menu" href="{{ url('/politicapersonasmayores') }}">Política Personas Mayores</a>
                                </li>
                                <li class="style-li">
                                    <a class="style-a-menu" href="{{ url('/listplanificainstitucional') }}">Planificacion institucional</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Agrega un botón que servirá como el enlace principal "Gobierno Regional" -->
                        <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#IntroduccionRegionLagos" aria-expanded="false" aria-controls="IntroduccionRegionLagos">
                            Region de los Lagos
                        </button>

                        <!-- Define el menú desplegable -->
                        <div class="collapse show" id="IntroduccionRegionLagos">
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
                                    <a class="style-a-menu" href="{{ route('EstadisticasRegionLagos.indexEstadisticas') }}">Dinámica Económica</a>
                                </li>
                                   
                            </ul>
                        </div>

                         <!-- Agrega un botón que servirá como el enlace principal "Gobierno Regional" -->
                         <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#IntroduccionRegionLagos" aria-expanded="false" aria-controls="IntroduccionRegionLagos">
                            Documentos
                        </button>

                        <!-- Define el menú desplegable -->
                        <div class="collapse show" id="IntroduccionRegionLagos">
                            <ul>
                                <li class="style-li">
                                    <a class="style-a-menu" href="{{ route('documentos.create') }}">Subir</a>
                                </li>
                               
                                   
                            </ul>
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
