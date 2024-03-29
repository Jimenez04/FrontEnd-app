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
                        <a class="Adecuacion" href="{{ route('Adecuacion') }}">

                            <div class="Contenedor_arriba">
                                <div class="Logos">
                                    <img alt="LogoAdecuacion" height="56px" src="{{ URL::asset('/img/hand_handshake.png') }}">
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
                        <a class="Adecuacion" href="{{ route('PAI_user') }}">
                            <div class="Contenedor_arriba">
                                <div class="Logos">
                                    <img alt="LogoPAI" height="56px"
                                        src="{{ URL::asset('/img/books.png') }}">
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

                        <button type="button" class="botones_est" id="beca_modal" onclick="openModal_Beca(this)">Añadir
                            Beca</button>

                        <button type="button" onclick="openModal_Contacto(this)" class="botones_est"
                        id="trabajo_modal">Añadir
                        Teléfono</button>

                        <button type="button" onclick="openModal_Trabajo(this)" class="botones_est"
                            id="trabajo_modal">Añadir
                            Trabajo</button>
                    </div>
                </div>
            </div>
            <input type="hidden" name="" id="url" value="{{ env('API_URL') }}">
            <input type="hidden" name="" id="token" value="{{ session('token') }}">
            <input type="hidden" name="cedula" id="cedula" value="{{ session('cedula') }}">
            <input type="hidden" name="" id="carnet" value="{{ session('carnet') }}">
        @endif

        @include('modals.agregar_trabajo')
        @include('modals.agregar_beca')
        @include('modals.contacto')
    </div>

    <script src="{{ asset('js/modal_Contacto.js') }}"></script>
@endsection

