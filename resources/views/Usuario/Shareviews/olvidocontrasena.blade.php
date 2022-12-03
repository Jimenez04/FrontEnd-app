@extends('plantilla')
@section('title', 'Olvido contraseña')
@section('content')

    <div class="ContenedorOlvidocontra">
        <div class="mensajes" >
            @if (session('errors'))
            {{ session('errors') }}
                @foreach (session('errors') as $item )
                    <label for="">{{ $item }}</label>
                @endforeach
            @endif
        </div>
        <form action="{{ route('forgot-password') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="contenedor-olvidopw">
                <div class="container_olvido_contra">
                    <h3>Recuperación de la cuenta</h3>
                    <div class="contenedor-correoalter">
                        
                        <input class="campos_recuperar_cuenta" type="email" value="{{ old('email') }}" name="email" required placeholder="Correo">
                        
                    </div>
                    <div class="container_carnet">
                        <input class="campos_recuperar_cuenta" type="text" value="{{ old('carnet') }}" name="carnet" required placeholder="Carnet">
                    </div>
                    <div class="container_cedula">
                        <input class="campos_recuperar_cuenta" type="text" value="{{ old('cedula') }}" name="cedula" required placeholder="Cedula">
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
