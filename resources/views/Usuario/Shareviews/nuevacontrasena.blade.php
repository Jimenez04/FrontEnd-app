@extends('plantilla')
@section('title', 'Nueva contraseña')
@section('content')



    <div class="ContenedorNuevacontra">
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
        <form action="{{ route('new-password') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="contenedor-newpw">
                <div class="container-todo_nuevacontra">

                    <h3>Cambiar Contraseña</h3>

                    <div class="containerPassword_">
                        <input class="input_cambio_password" type="password" name="new_password_"
                            value="{{ old('new_password_') }}"  placeholder="Nueva contraseña"
                            title="Ingrese la nueva contraseña, mínimo 6 caracteres">
                    </div>
                    <div class="containerPassword_">
                        <input class="input_cambio_password" type="password" name="new_c_password_"
                            value="{{ old('new_c_password_') }}"  placeholder="Confirmar contraseña"
                            title="Confirmar contraseña">
                    </div>
                    <div class="containerPassword_">
                        <input class="input_cambio_password" type="password" name="old_password_"
                            value="{{ old('old_password_') }}"  placeholder="Ultima contraseña"
                            title="Digite la última contraseña registrada">
                    </div>
                    <div class="divbtnrecuperar_cuenta">
                        <input class="botonrecuperar_pw" type="submit" value="Cambiar contraseña">

                    </div>
                    <hr>
                    <span class="UCR-OO_nc">Universidad de Costa Rica | Oficina de Orientación</span>

                </div>
            </div>
        </form>
    </div>

@endsection
