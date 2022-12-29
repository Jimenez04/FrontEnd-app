@extends('plantilla')
@section('title', 'Administrador')
@section('content')

    <div class="PrincipalAdmi">

        @if (!session('login'))
            <div class="container_oculta">
                <p>Para acceder al contenido, debes iniciar sesión <a href="{{ route('login') }}">Login</a></p>
                <br>
            </div>
        @endif

        @if (session('login'))
            <div class="containerAdmi">
                <h2>Oficina de Orientación</h2>
                <div class="GestionDeSolicitudes">

                    <div class="Card">
                        <a class="AdecuacionAdmi" href="{{ route('Admin.Adecuacion') }}">
                            <div class="Contenedor_arriba">
                                <div class="Logos">

                                    <img height="56px" src="{{ URL::asset('/img/hand_handshake.png') }}">

                                </div>
                                <div class="contenedortext">
                                    <label>Solicitudes de adecuación
                                    </label>
                                </div>
                            </div>
                            <div class="info_abajo">
                                <span>Gestione las solicitudes de adecuación de los estudiantes </span>
                            </div>
                        </a>
                    </div>

                    <div class="Card">
                        <a class="PAIAdmi" href="">
                            <div class="Contenedor_arriba">
                                <div class="Logos">

                                    <img height="56px" src="{{ URL::asset('/img/books.png') }}">

                                </div>
                                <div class="contenedortext">
                                    <label>Solicitudes PAI </label>
                                </div>
                            </div>
                            <div class="info_abajo">
                                <span>Gestione las solicitudes de plan de acción individual</span>
                            </div>
                        </a>
                    </div>

                   {{--  <div class="Card">
                        <a class="AdecuacionAdmi" href="">
                            <div class="Contenedor_arriba">
                                <div class="Logos">

                                    <img height="56px" src="{{ URL::asset('/img/cuaderno.png') }}">

                                </div>
                                <div class="contenedortext">
                                    <label>Bitácora </label>
                                </div>

                            </div>
                            <div class="info_abajo">
                                <span>Seguimiento del proceso de solicitudes</span>
                            </div>
                        </a>

                    </div> --}}


                    <div class="Card">
                        <a class="AdecuacionAdmi" href="{{route('lista_usuarios')}}">
                            <div class="Contenedor_arriba">
                                <div class="Logos">

                                    <img height="56px" src="{{ URL::asset('/img/estudiantes.png') }}">

                                </div>
                                <div class="contenedortext">
                                    <label>Estudiantes </label>
                                </div>
                            </div>
                            <div class="info_abajo">
                                <span>Gestione la información de los estudiantes</span>
                            </div>
                        </a>
                    </div>

                   {{--  <div class="Card">
                        <a class="AdecuacionAdmi" href="">
                            <div class="Contenedor_arriba">
                                <div class="Logos">

                                    <img height="56px" src="{{ URL::asset('/img/estadisticas.png') }}">

                                </div>
                                <div class="contenedortext">
                                    <label>Reportes</label>
                                </div>
                            </div>
                            <div class="info_abajo">
                                <span>Administre la información de las solicitudes</span>
                            </div>
                        </a>
                    </div> --}}

                    <div class="Card">
                        <a class="AdecuacionAdmi" href="{{ route('perfil_usuario') }}">
                            <div class="Contenedor_arriba">
                                <div class="Logos">

                                    <img height="56px" src="{{ URL::asset('/img/usuario_cuenta.png') }}">

                                </div>
                                <div class="contenedortext">
                                    <label>Mi cuenta </label>
                                </div>
                            </div>
                            <div class="info_abajo">
                                <span>Administre sus datos personales</span>
                            </div>
                        </a>
                    </div>

                </div>

            </div>
        @endif

    </div>
@endsection
