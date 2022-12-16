@extends('plantilla')
@section('title', 'Editar Perfil')
@section('content')
    @csrf
    <div class="Contenedor_editar_perfil">
        <form method="post" enctype="multipart/form-data">

                <div class="container_informacion">


                    <div class="datos_usuario">

                        <div class="datos_personales">

                            <div class="titulo_user">
                                <h3>Información del Usuario</h3>
                            </div>

                            <div class="container_datosperfil">

                                <label for="nombre">Nombre</label>

                                <input type="text" name="nombre"
                                    value="{{ $resultado['persona']['nombre1'] . ' ' . $resultado['persona']['nombre2'] }}"
                                    required>
                            </div>
                            <div class="container_datosperfil">

                                <label for="apellidos">Apellidos</label>

                                <input type="text" name="apellidos" required
                                    value="{{ $resultado['persona']['apellido1'] . ' ' . $resultado['persona']['apellido2'] }}">

                            </div>
                            <div class="container_datosperfil">

                                <label for="carnet">Carnet</label>

                                <input type="text" name="nombre"
                                    value=" {{ array_key_exists('carnet', $resultado) ? $resultado['carnet'] : 'No aplica' }}"
                                    required>
                            </div>

                            <div class="container_datosperfil">

                                <label class="etiqueta_perfil" for="id">Cédula</label>

                                <input type="text" name="cedula" value="{{ $resultado['persona']['cedula'] }}" required>
                            </div>

                            <div class="container_datosperfil">

                                <label for="sexo">Sexo</label>

                                <input type="text" name="sexo" value="{{ $resultado['persona']['sexo_id'] }}"
                                    required>
                            </div>


                            <div class="container_datosperfil">

                                <label for="fechaNacimiento">Fecha de nacimiento</label>

                                <input type="text" name="fechaNacimiento"
                                    value="{{ $resultado['persona']['fecha_Nacimiento'] }}" required>
                            </div>
                            

                        </div>
                        <div class="datos_contacto">

                            <div class="titulo_user">
                                <h3>Información de Contacto</h3>
                            </div>

                            <div class="container_datosperfil">

                                <label for="email">Correo</label>
                                <br>
                                <input type="email" name="correo" required
                                    value="{{ $resultado['persona']['email'][0]['email'] }}">


                            </div>

                            <div class="container_datosperfil">

                                <label for="telefono">Teléfono</label>
                                <br>
                                <input type="tel" name="Telefono"
                                    value="{{ array_key_exists('numero', $resultado['persona']['contacto']) ? $resultado['persona']['contacto']['numero'] : 'No contiene' }}"
                                    required>
                            </div>

                        </div>

                    </div>
                    <div class="contenedorbtn_editar">
                        <div class="divbtnGuardar">
                            <input class="botonGuardarcambios" type="submit" value="Guardar cambios">

                        </div>
                        <div class="divbtnGuardar">
                            <input class="botonGuardarcambios" value="Cancelar">

                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
