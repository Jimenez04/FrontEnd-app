@extends('plantilla')
@section('title', 'Editar Perfil')
@section('content')
    <div class="Contenedor_editar_perfil">
        @if ($errors->any())
            <div class="alerta alert-danger alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('user_edit') }}" method="post" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="cedula" id="cedula" value="{{ $resultado['persona']['cedula'] }}" name="cedula">

            <div class="container_informacion">
                <div class="datos_usuario">
                    <div class="datos_personales">

                        <div class="titulo_user">
                            <h3>Información del Usuario</h3>
                        </div>

                        <div class="container_datosperfil">
                            <label for="nombre">Primer Nombre</label>
                            <input type="text" name="nombre1" value="{{ $resultado['persona']['nombre1'] }}">
                        </div>

                        <div class="container_datosperfil">
                            <label for="nombre">Segundo Nombre</label>
                            <input type="text" name="nombre2" value="{{ $resultado['persona']['nombre2'] }}">
                        </div>

                        <div class="container_datosperfil">
                            <label for="apellidos">Primer Apellido</label>
                            <input type="text" name="apellido1" value="{{ $resultado['persona']['apellido1'] }}">
                        </div>

                        <div class="container_datosperfil">
                            <label for="apellidos">Segundo Apellido</label>
                            <input type="text" name="apellido2" value="{{ $resultado['persona']['apellido2'] }}">
                        </div>

                        <div class="container_datosperfil">

                            <label for="fechaNacimiento">Fecha de nacimiento</label>
                            <input type="date" name="fecha_Nacimiento"
                                value="{{ $resultado['persona']['fecha_Nacimiento'] }}">
                        </div>

                        <div class="container_datosperfil">
                            <div for='sexo' class="Sexo">
                                <label>Sexo</label>

                                <div class="seleccion" style="display: block;">
                                    <div class="sexo_m">
                                        <label class="checkbox_label">Masculino
                                            <input class="checkbox" type="radio" name="sexo_id" id="check_female"
                                                value="1" {{ $resultado['persona']['sexo_id'] == 1 ? 'checked' : '' }}>
                                        </label>
                                    </div>
                                    <div class="sexo_f">
                                        <label class="checkbox_label">Femenino
                                            <input class="checkbox" type="radio" name="sexo_id" id="check_female"
                                                value="2" {{ $resultado['persona']['sexo_id'] == 2 ? 'checked' : '' }}>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="contenedorbtn_editar">
                    <div class="divbtnGuardar">
                        <a href="{{ url()->previous()}}" class="btn btn-primary">Cancelar</a>
                    </div>
                    <div class="divbtnGuardar">
                        <button class="botonGuardarcambios" type="submit" value="Guardar cambios">Guardar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
