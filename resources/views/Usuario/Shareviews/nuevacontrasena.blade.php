@extends('plantilla')
@section('title', 'Nueva contraseña')
@section('content')



    <div class="ContenedorNuevacontra">
        <div class="mensajes" >
            @if (session('errors'))
            {{ session('errors') }}
                @foreach (session('errors') as $item )
                    <label for="">{{ $item }}</label>
                @endforeach
            @endif
        </div>
        <form action="{{ route('new-password') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="contenedor-newpw">
                <div class="container-todo_nuevacontra">

                    <h3>Cambiar Contraseña</h3>

                    <div class="containerPassword_">
                        <input class="input_cambio_password" type="password" name="new_password_" value="{{ old('new_password_') }}" required placeholder="Nueva contraseña">
                    </div>
                    <div class="containerPassword_">
                        <input class="input_cambio_password" type="password" name="new_c_password_" value="{{ old('new_c_password_') }}" required placeholder="Confirmar contraseña">
                    </div>
                    <div class="containerPassword_">
                        <input class="input_cambio_password" type="password" name="old_password_" value="{{ old('old_password_') }}" required placeholder="Ultima contraseña">
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
