@extends('plantilla')
@section('title', 'Editar Perfil')
@section('content')
    @csrf
    <div class="Contenedor_editar_perfil">
        <form method="post" enctype="multipart/form-data">

            <div class="contenedor_editar_perfil">
                <div class="foto_perfil box-primary">
                    <h3 class="username">Usuario.nombre</h3>
                    <img class="image" src="{{ asset('img/user.png') }}" alt="" />
                    <a href="#" class="btn_editarfoto btn-primary"><b>Editar foto</b></a>
                  </div>
                <div class="container_informacion">
                    <div class="titulo">
                        <h3>Información del Usuario</h3>
                    </div>

                    <div class="contenedor_nombres">
                        <div class="container_nombre1">

                            <label for="nombre">Primer Nombre</label>
                            <br>
                            <input type="text" name="nombre" value="Krissia" readonly>
                        </div>
                        <div class="container_nombre2">

                            <label for="nombre2">Segundo nombre</label>
                            <br>
                            <input type="text" name="nombre" value="María" readonly >
                        </div>

                    </div>

                   <div class="contenedor_apellidos">
                    <div class="container_apellido1">
                        <label for="apellido">Primer Apellido </label>
                        <br>
                        <input type="text" name="apellido1" value="Viales" readonly>
                    </div>
                    <div class="container_apellido2">
                        <label for="apellido2">Segundo Apellido </label>
                        <br>
                        <input type="text" name="apellido2" value="Pizarro" readonly>
                    </div>
                   </div>
                   
                    <div class="contenedor_infocontacto">
                        <div class="contenedor_email">
                            <label>Correo Electrónico </label>
                            <br>
                            <input type="email" name="correo" value="" required>
                        </div>
                        <div class="container_telefono">
                            <label>Teléfono </label>
                            <br>
                            <input type="tel" name="numero" required>
                        </div>
                    </div>
                    <div class="divbtnGuardar">
                        <input class="botonGuardarcambios" type="submit" value="Guardar cambios">

                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
