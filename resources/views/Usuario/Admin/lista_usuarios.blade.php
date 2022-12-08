@extends('plantilla')
@section('title', 'Lista_Usuarios')
@section('content')


    <div class="Main_lista_usuarios">

        <div class="Contenido_Lista_usuarios">
            <h2>Lista de Usuarios</h2>
            <div class="contenedor_tabla">
                <div class="divbtnregistro_admin">
                    <a class="botonregistro_admi" href="registrarse">Nuevo Usuario</a>
                </div>

                <div class="usertabla">
                    <table class="tabla_usuarios">
                        <thead>
                            <tr>
                                <th scope="col">Carnet</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <!--<th scope="col">Correo</th>-->
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listado_usuarios as $usuarios)
                                <tr>
                                    <td data-titulo="Carnet" scope="row">{{ $usuarios['cedula'] }}</th>

                                    <td data-titulo="Nombre">
                                        {{ $usuarios['nombre1'] . ' ' . $usuarios['nombre2'] }}</td>
                                    <td data-titulo="Apellido">
                                        {{ $usuarios['apellido1'] . ' ' . $usuarios['apellido2'] }}
                                    </td>

                                </tr>
                            @endforeach ()

                        </tbody>
                    </table>
                    {{-- Pagination --}}
                   
                </div>
                 <div class="d-flex justify-content-center">
                        {!! $listado_usuarios->links() !!}
                    </div>
            </div>
        </div>
    </div>
@endsection
