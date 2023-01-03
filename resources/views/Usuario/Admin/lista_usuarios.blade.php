@extends('plantilla')
@section('title', 'Lista_Usuarios')
@section('content')


    <div class="Main_lista_usuarios">

        <div class="Contenido_Lista_usuarios">
            <h2>Lista de Usuarios</h2>
            <div class="contenedor_tabla">
                <div class="divbtnregistro_admin">
                    <a class="btn btn-primary" href="{{ route('registrar_admin') }}">Nuevo Usuario</a>
                </div>

                <div class="usertabla">
                    <table class="tabla_usuarios">
                        <thead>
                            <tr>
                                <th scope="col">Carnet</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Acciones</th>
                                <!--<th scope="col">Correo</th>-->
                               
                            </tr>
                        </thead>
                        <tbody id="cuerpotabla">
                            @foreach ($listado_usuarios as $usuarios)
                                <tr id="{{$usuarios['carnet']}}" >
                                    <td data-titulo="Carnet" scope="row">{{ $usuarios['carnet'] }}</th>

                                    <td data-titulo="Nombre">
                                        {{ $usuarios['persona']['nombre1']  }}</td>
                                    <td data-titulo="Apellido">
                                        {{ $usuarios['persona']['apellido1'] . ' ' . $usuarios['persona']['apellido2'] }}
                                    </td>
                                    <td data-titulo="Acciones">
                                        <button class="btn btn-danger" onclick="eliminarUsuario({{$usuarios['persona']['user']['id']}}, '{{$usuarios['carnet']}}');" style="cursor: pointer;"> Eliminar</button> 
|
                                        <button class="btn btn-secondary" style="/* width: 83px; */" id="{{$usuarios['persona']['user']['id']}}" onclick="{{$usuarios['persona']['user']['email_verified_at'] != null ? "bajaUsuario(this);" : "verificarUsuario(this);" }} " value="{{$usuarios['persona']['user']['id']}}"  style="cursor: pointer;">{{$usuarios['persona']['user']['email_verified_at'] != null ? "Anular" : "Validar" }}</button> 
|
                                        <button class="btn btn-info" onclick="ir_usuario('{{$usuarios['carnet']}}');" style="cursor: pointer;"> Ir</button> 

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
            <input type="hidden" name="" id="url" value="{{env('API_URL')}}">
            <input type="hidden" name="" id="token" value="{{session('token')}}">
            <input type="hidden" name="" id="cedula" value="{{session('cedula')}}">
    @include('modals.eliminarUsuario')
@endsection

@push('styles')
    <link  rel="stylesheet" href="{{ asset('css/eliminarusuario.css') }}" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush

<script src="{{ asset('js/listausuarios.js') }}"></script>
