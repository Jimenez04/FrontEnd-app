@extends('plantilla')
@section('title', 'Home estudiante')
@section('content')


    <div class="PrincipalEstudiante">
        @if (!session('login'))
            <div class="container_oculta">
                <p>Para acceder al contenido, debes iniciar sesión <a href="{{ route('login') }}">Login</a></p>
                <br>
            </div>
        @endif


        @if (session('login'))
            <div class="containerEstudiante">

                <h2>Oficina de Orientación</h2>

                <div class="SolicitudesEstudiante">

                    <!--Solicitud de adecuacion-->
                    <div class="Card">
                        <a class="Adecuacion" href="/solicitud-adecuacion">

                            <div class="Contenedor_arriba">
                                <div class="Logos">
                                    <img alt="LogoAdecuacion" height="56px" src="{{ URL::asset('img/love.png') }}">
                                </div>
                                <div class="contenedortext">
                                    <label>Solicitud De Adecuación
                                    </label>
                                </div>

                            </div>

                            <div class="info_abajo">
                                <span>Gestione su solicitud de adecuación desde acá</span>
                            </div>
                        </a>
                    </div>

                    <!--Solicitud PAI-->

                    <div class="Card">
                        <a class="Adecuacion" href="/">

                            <div class="Contenedor_arriba">
                                <div class="Logos">
                                    <img alt="LogoPAI" height="56px"
                                        src="{{ URL::asset('img/Plan_Accion_Individual.png') }}">
                                </div>
                                <div class="contenedortext">

                                    <label>Plan De Acción Individual</label>
                                </div>
                            </div>

                            <div class="info_abajo">
                                <span>Solicite un plan de acción individual desde acá</span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="datos_generales_est">
                    <hr>
                    <div class="divbotones_est">

                        <button type="button" class="botones_est" id="beca_modal" onclick="openModal(this)">Añadir
                            Beca</button>
                        <button type="button" onclick="openModal(this)" class="botones_est" id="trabajo_modal">Añadir
                            Trabajo</button>

                    </div>
                </div>
            </div>
        @endif

        @include('modals.agregar_trabajo')
        @include('modals.agregar_beca')
    </div>

@endsection
