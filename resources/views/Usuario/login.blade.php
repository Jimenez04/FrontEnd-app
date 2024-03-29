@extends('plantilla')

@section('title', 'Inicio Sesión')

@section('content')


    <div class="ContenedorInicioSesion">



        <form action="{{ route('sesion.validacion') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="contenedor-login" style="height: fit-content; padding-bottom: 15px;">
                <div class="container-todo">
                    <div class="Titulo">
                        <h3>Sistema Web de Orientación</h3>

                    </div>

                    {{-- <div class="alertas">
                        @if (session('status'))
                            {{ session('status') }}
                        @endif
                        <div>
                            @if ($errors != null)
                                {{ $errors->first('email') }}
                                <br>
                                {{ $errors->first('password') }}
                            @endif
                        </div>

                    </div> --}}

                    @if ($errors->any())
                        <div class="alerta alert-danger alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <div class="containerCorreo">

                        <input type="email" name="email" id="email" placeholder="Correo Institucional"
                            value="{{ old('email') }}" title="Digita tu correo">


                    </div>

                    <div class="containerPassword">
                        <input type="password" id="password" name="password" placeholder="Contraseña"
                            title="La constraseña es requerida">
                        <!--required-->

                    </div>

                    <div class="divbtnlogin">
                        <input class="botonLogin" type="submit" value="Iniciar Sesión">
                    </div>

                    <div class="contenedor_opciones_user">
                        <div class="Registrarse">
                            <a class="Registro" href="{{ route('registrarse') }}">Registrarse</a>
                        </div>
                        <div class="Recuperarcontrasena">
                            <a class="OlvidoPassword" href="{{ route('recuperarcontra') }}">Recuperar contraseña</a>
                        </div>
                    </div>

                    <hr class="linea">
                    <span class="UCR-OO">Universidad de Costa Rica | Oficina de Orientación</span>

                </div>
            </div>
        </form>
    </div>

@endsection()
