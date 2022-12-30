<?php
    use Carbon\Carbon;
?>   
@extends('plantilla')
@section('title', 'Perfil')
@section('content')

    <div class="Contenedor_ver_perfil">
        <div class="contenedor_userporfile">

            <div class="informacion_usuario">
                <img class="user_image" src="{{ asset('img/usuario32.png') }}" alt="" />
                <h1 class="nombre_usuario">
                    {{ $resultado['persona']['nombre1'] . ' ' . $resultado['persona']['nombre2'] . ' ' . $resultado['persona']['apellido1'] . ' ' . $resultado['persona']['apellido2'] }}
                </h1>
            </div>
            <hr class="separador">

            <div class="detalles_de_usuario">

                <div class="datos_usuario">

                    <div class="datos_personales">

                        <div class="titulo_user">
                            <h3>Información del Usuario</h3>
                        </div>

                        <div class="container_datosperfil">

                            <label for="nombre">Nombre</label>
                            <br>
                            <input type="text" name="nombre"
                                value="{{ $resultado['persona']['nombre1'] . ' ' . $resultado['persona']['nombre2'] }}"
                                readonly>
                        </div>
                        <div class="container_datosperfil">

                            <label for="apellidos">Apellidos</label>
                            <br>
                            <input type="text" name="apellidos" readonly
                                value="{{ $resultado['persona']['apellido1'] . ' ' . $resultado['persona']['apellido2'] }}">

                        </div>
                        <div class="container_datosperfil">

                            <label for="carnet">Carnet</label>
                            <br>
                            <input type="text" name="nombre"
                                value=" {{ array_key_exists('carnet', $resultado) ? $resultado['carnet'] : 'No aplica' }}"
                                readonly>
                        </div>

                        <div class="container_datosperfil">

                            <label class="etiqueta_perfil" for="id">Cédula</label>
                            <br>
                            <input type="text" name="cedula" value="{{ $resultado['persona']['cedula'] }}" readonly>
                        </div>

                        <div class="container_datosperfil">

                            <label for="sexo">Sexo</label>
                            <br>
                            <input type="text" name="sexo" value="{{ $resultado['persona']['sexo_id'] == 1 ? "Masculino" : "Femenino"}}" readonly>
                        </div>


                        <div class="container_datosperfil">

                            <label for="fechaNacimiento">Fecha de nacimiento</label>
                            <br>
                            <input type="text" name="fechaNacimiento"
                            value="{{ Carbon::parse($resultado['persona']['fecha_Nacimiento'])->format('d-m-Y');}}" readonly>
                        </div>

                        <div class="container_datosperfil">

                            <label for="fechaNacimiento">Edad actual</label>
                            <br>
                            <input type="text" name="fechaNacimiento"
                            value="{{$edad = Carbon::parse($resultado['persona']['fecha_Nacimiento'])->age;  }}"
                                readonly>
                        </div>

                        <div class="container_datosperfil">

                            <label for="creacion_de_cuenta">Cuenta creada el: </label>
                            <br>
                            <input type="text" name="fechaNacimiento" 
                            value="{{Carbon::parse($resultado['persona']['created_at'])->format('d-m-Y');}}"

                                readonly>
                        </div>
                    </div>

                    <div class="datos_contacto">

                        <div class="titulo_user">
                            <h3>Información de Contacto</h3>
                        </div>

                        <div class="container_datosperfil">

                            <label for="email">Correo Principal</label>
                            <br>
                            <input type="email" name="correo" readonly
                                value="{{ $resultado['persona']['email'][0]['email'] }}">


                        </div>

                        <div class="container_datosperfil">

                            <label for="telefono">Teléfono/s</label>
                            <br>
                            @if ($resultado['persona']['contacto'] == null)
                                <input type="tel" name="Telefono"
                                value="No aplica"
                                readonly>
                            @endif
                            @foreach ( $resultado['persona']['contacto'] as $item )
                                <input type="tel" name="Telefono"
                                value="{{ $item['numero']}}"
                                readonly>
                            @endforeach
                           
                        </div>

                    </div>

                </div>
                <div class="contenedorbtn_solicitudes">

                    <div class="divbtnPerfil">
                        <input class="botonesperfil" value="Atras" type="button"
                            onclick="location.href=route('lista_usuarios');">  
                    </div>

                    <div class="divbtnPerfil">
                            <a class="botonesperfil" value="Editar Usuario" type="button" href="{{route('Admin.User.editar_perfil', $resultado['carnet'])}}">Editar Usuario</a>
                    </div>
                    
                    <div class="divbtnPerfil">
                        <input class="botonesperfil" value="Solicitudes Adecuacion" type="button" onclick="location.href=route('Admin.Adecuacion','{{$resultado['carnet']}}');">
                    </div>

                    <div class="divbtnPerfil">
                        <input class="botonesperfil" value="Solicitudes PAI" type="button">
                    </div>

                    <div class="divbtnPerfil">
                        <button class="btn btn-primary" onclick=" window.location.href = route('adecuacion_index', [ '{{$resultado['id_bitacora']}}', 'ver_usuario','{{$resultado['carnet']}}'] ); " >Bitacora</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
