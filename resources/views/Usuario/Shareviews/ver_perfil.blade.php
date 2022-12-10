@extends('plantilla')
@section('title', 'Perfil')
@section('content')
  
    <div class="Contenedor_ver_perfil">
        <div class="contenedor_userporfile">
            
            <div class="informacion_usuario">
                <img class="user_image" src="{{ asset('img/usuario32.png') }}" alt="" />
                <h1 class="nombre_usuario">{{$resultado['persona']['nombre1'] . " " .$resultado['persona']['nombre2'] . " " . $resultado['persona']['apellido1'] . " " .$resultado['persona']['apellido2']  }}</h1>
            </div>
            <hr class="separador">
            <div class="detalles_de_usuario">

                <div class="datos_usuario">
                    <div class="titulo_user">
                        <h3>Información del Usuario</h3>
                    </div>

                    <div class="container_datosperfil">

                        <label for="carnet">Carnet</label>
                        <br>
                        <input type="text" name="nombre" value=" {{ array_key_exists('carnet' , $resultado) ? $resultado['carnet'] : 'No aplica'}}" readonly>
                    </div>
                    <div class="container_datosperfil">

                        <label for="email">Correo</label>
                        <br>
                        <input type="email" name="correo" readonly value="{{$resultado['persona']['email'][0]['email']}}">
                        
                      
                    </div>

                    <div class="container_datosperfil">

                        <label for="telefono">Teléfono</label>
                        <br>
                        <input type="tel" name="Telefono" value="{{ array_key_exists('numero' , $resultado['persona']['contacto'])  ? $resultado['persona']['contacto']['numero']  : 'No contiene'}}" readonly>
                    </div>

                </div>

                <div class="contenedorbtn_solicitudes">

                    <div class="divbtnPerfil">
                        <input class="botonesperfil" value="Editar perfil" type="button">

                </div>
                    <div class="divbtnPerfil">
                        <input class="botonesperfil" value="Solicitudes Adecuacion" type="button">

                    </div>

                    <div class="divbtnPerfil">
                        <input class="botonesperfil" value="Solicitudes PAI" type="button">

                    </div>
                </div>


            </div>


        </div>
    </div>
@endsection
