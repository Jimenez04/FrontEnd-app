@extends('plantilla')
@section('title', 'Registrar cuenta')
@section('content')

    <div class="mainContenedor">


        <form action="{{ route('registro') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="contenedor-registro">

                <div class="contenedorDatosRegistro">
                    <h2>Registro</h2>


                    <div class="mensajes">
                        @if (session('errors'))
                            {{ session('errors') }}
                        @endif
                    </div>
                  
                    <div class="containerDatosPersonales">
                        <h4>Datos Personales</h4>

                        <div class="Cedula-Carnet">
                            <div class="Cedula">
                                <label>Cedula</label>
                                <input class="campos" type="text" name="cedula" value="{{ old('cedula') }}" required>
                                
                            </div>
                            <div class="Carnet">
                                <label>Carnet</label>
                                <input class="campos" type="text" name="carnet" value="{{ old('carnet') }}" required>
                            </div>

                        </div>
                        <div class="Nombre">
                            <div class="Nombre1">
                                <label>Primer Nombre</label>
                                <input class="campos" type="text" name="nombre1" value="{{ old('nombre1') }}" required>
                            </div>
                            <div class="Nombre2">
                                <label>Segundo Nombre</label>
                                <input class="campos" type="text" name="nombre2" value="{{ old('nombre2') }}">
                            </div>
                        </div>
                        <div class="Apellidos">
                            <div class="Apellido1">
                                <label>Primer Apellido</label>
                                <input class="campos" type="text" name="apellido1" value="{{ old('apellido1') }}" required>
                            </div>
                            <div class="Apellido2">
                                <label>Segundo Apellido</label>
                                <input class="campos" type="text" name="apellido2" value="{{ old('apellido2') }}" required>
                            </div>
                        </div>
                        <div class="InfoPersonal">
                            <div class="fecha">
                                <label>Fecha de Nacimiento</label>
                                <br>
                                <input type="date" name="fecha_Nacimiento"  required value="{{ old('fecha_Nacimiento', '1999-06-01') }}">
                            </div>
                        </div>
                        <div class="Sexo">
                            <label>Sexo</label>
                            <div class="seleccion">
                                <br>
                                <div class="sexo_m">
                                    <input class="checkbox"  type="checkbox" name="sexo_id" id="check_male" value="1"  checked
                                        onclick="Seleccionar(this)">
                                    <label class="checkbox_label">Hombre</label>
                                </div>
                                <div class="sexo_f">
                                    <input class="checkbox" type="checkbox" name="sexo_id" id="check_female" value="2" 
                                        onclick="Seleccionar(this)">
                                    <label class="checkbox_label">Mujer</label>
                                </div>
                            </div>
                        </div>


                    </div>
                    <hr>
                    <div class="containerDatosdeSesion">

                        <h4>Datos de Sesión</h4>
                        <div class="DatosSesion">
                            <div class="Correo">
                                <label>Correo </label>
                                <input class="campos_sesion" type="email" name="email" value="{{ old('email') }}" required
                                    placeholder="nombre.@ucr.ac.cr">

                            </div>

                            <div class="Password">
                                <label>Contraseña </label>
                                <input class="campos_sesion" type="password" name="password_" value="" required>
                            </div>
                            <div class="confirmar_Password">
                                <label>Confirmar Contraseña </label>
                                <input class="campos_sesion" type="password" name="c_password" value="" required>
                            </div>
                        </div>
                    </div>

                    <div class="abajoRegistro">
                        <div class="divbtnregistro">

                            <input class="botonregistro" type="submit" value="Crear cuenta">

                        </div>
                        <hr>
                        <span class="UCR-OO_1">Universidad de Costa Rica | Oficina de Orientación</span>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
