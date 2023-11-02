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
                        <div class="collapse" id="menuGobiernoRegional">
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
                            </ul>
                        </div>
                        <!-- Agrega un botón que servirá como el enlace principal "Gobierno Regional" -->
                        <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#IntroduccionRegionLagos" aria-expanded="false" aria-controls="IntroduccionRegionLagos">
                            Region de los Lagos
                        </button>

                        <!-- Define el menú desplegable -->
                        <div class="collapse" id="IntroduccionRegionLagos">
                            <ul>
                                <li class="style-li">
                                    <a class="style-a-menu" href="{{ route('IntroduccionRegionLagos.index') }}">Introducción</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
