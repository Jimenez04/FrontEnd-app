@extends('plantilla')
@section('title', 'Olvido contraseña')
@section('content')

    <div class="ContenedorOlvidocontra">
        <div class="mensajes">
            @if ($errors->any())
                <div class="alerta alert-danger alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <form action="{{ route('forgot-password') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="contenedor-olvidopw">
                <div class="container_olvido_contra">
                    <h3>Recuperación de la cuenta</h3>
                    <div class="contenedor-correoalter">

                        <input class="campos_recuperar_cuenta" type="email" value="{{ old('email') }}" name="email"
                            required placeholder="Correo" title="Digite su correo institucional">

                    </div>
                    <div class="container_carnet">
                        <input class="campos_recuperar_cuenta" type="text" value="{{ old('carnet') }}" name="carnet"
                            required placeholder="Carnet" title="El carnet es requerido">
                    </div>
                    <div class="container_cedula">
                        <input class="campos_recuperar_cuenta" type="text" value="{{ old('cedula') }}" name="cedula"
                            required placeholder="Cedula" title="Debe digitar su cédula">
                    </div>
                    <div class="divbtnrecuperar">
                        <input class="botonrecuperar" type="submit" value="Recuperar">

                    </div>
                    <hr>
                    <span class="UCR-OO_oc">Universidad de Costa Rica | Oficina de Orientación</span>

                </div>
            </div>
        </form>
    </div>

@endsection()
