@extends('plantilla')
@section('title', 'Lista_Usuarios')
@section('content')


    <div class="Main_lista_usuarios">

        <div class="Contenido_Lista_usuarios">
            <h2>Lista de Usuarios</h2>
            <div class="contenedor_tabla">
            <div class="divbtnregistro_admin">
                <a class="botonregistro_admi"  href="registrarse">Nuevo Usuario</a>
            </div>

            <div class="usertabla">
                <table class="tabla_usuarios">
                    <thead>
                        <tr>
                            <th scope="col">Carnet</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Correo</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        <tr>
                            <td data-titulo="Carnet" scope="row">1</th>
                            <td data-titulo="Nombre">Mark</td>
                            <td data-titulo="Apellido">Otto</td>
                            <td data-titulo="Correo">elnombredeusuariomaslargo@ucr.ac.cr</td>
                           <td><li class="acciones">
                            <a  id="Ver" href="registrarse">
                                <i class="fa fa-eye fa-lg" aria-hidden="true"></i>Ver</a></li>
                            
                        </tr>
                        <tr>
                            <td data-titulo="Carnet" scope="row">1</th>
                            <td data-titulo="Nombre">Mark</td>
                            <td data-titulo="Apellido">Otto</td>
                            <td data-titulo="Correo">jose.garciarubio10233</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
@endsection
