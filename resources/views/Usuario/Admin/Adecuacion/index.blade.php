<?php 
use Carbon\Carbon;
?>
@extends('plantilla')
@section('title', 'Solicitud Adecuacion')
@section('content')

    <div class="PrincipalAdecuacion">

        <div class="container_principal_Adecuacion">

            <div class="Contenedor_lista_Solicitud_Adecuacion">

                <div class="titulo_lista">
                    <h2>Solicitudes de Adecuación</h2>
                </div>
                <div class="Solicitud_lista">

                    <div class="divbtn_nueva_solicitud">

                        <a class="boton_new_adecuacion" href="{{route('Nueva_Adecuacion_Admin')}}">Nueva Solicitud</a>
                    </div>

                    <div class="divtabla">
                        <table class="tabla_adecuacion">
                            <thead>
                                <tr>
                                    <th scope="col">Número de Solicitud</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $datos as  $item)
                                <tr style="cursor:pointer " onclick="window.location= '{{route('verAdecuacion_admin', $item['id'])}}' " >
                                        <td data-label="N° Solicitud"scope="row"> {{ $item['numero_solicitud']}} </th>
                                        <td data-label="Estado">{{$item['revision__solicitud']['estado']}}</td>
                                        <td data-label="Fecha">{{Carbon::parse($item['revision__solicitud']['fecha'])->format('d-m-Y')}}</td> 
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="divbotonVolver">

                        <a class="boton_regresar" id="Regresar" href="">Volver</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

