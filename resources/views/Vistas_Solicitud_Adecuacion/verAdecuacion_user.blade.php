@extends('plantilla')
@section('title', 'Ver Adecuacion')
@section('content')
    @inject('carbon', 'Carbon\Carbon')

    <div class="Principal_Informacion_Adecuacion">

        <div class="container_Informacion_Adecuacion">

            <div class="Informacion_solicitud">

                <h3 style="text-align: center;">Información Solicitud de Adecuación</h3>
                <div class="container_informacion_solicitud" id="container_informacion_solictud">
                    <div class="informacion_adecuacion">
                        <table class="table table-bordered tabla_adecuacion">
                            <thead>
                                <tr>
                                    <th scope="col">Solicitud</th>
                                    <th scope="col">Razon</th>
                                    <th scope="col">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        {{ $resultado['numero_solicitud'] }}
                                    </td>
                                    <td>
                                        {{ $resultado['razon_Solicitud'] }}
                                    </td>
                                    <td>
                                        {{ $resultado['estado'] }} </td>
                                </tr>

                            </tbody>
                        </table>
                        <h4 style="text-align: center;">Información general</h4>
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Carnet</th>
                                <td colspan="2">
                                    {{ $resultado['estudiante_carnet'] }}
                                </td>
                            </tr>
                            <tr>
                                <th>Carrera Empadronada</th>
                                <td colspan="2">
                                    {{ $resultado['carrera_Empadronada'] }}
                                </td>
                            </tr>
                            <tr>
                                <th>Segunda carrera</th>
                                <td colspan="2">
                                    {{ $resultado['nombre_segunda_carrera'] != null ? $resultado['nombre_segunda_carrera'] : 'No contiene' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Carrera empradonada anterior</th>
                                <td colspan="2">
                                    {{ $resultado['carrera_empadronado_anterior'] != null ? $resultado['carrera_empadronado_anterior'] : 'No contiene' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Ingreso a la carrera</th>
                                <td colspan="2">
                                    {{ $carbon::parse($resultado['ano_ingreso_carrera'])->format('m/d/Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th>Nivel carrera</th>
                                <td colspan="2">
                                    {{ $resultado['nivel_carrera'] . '%' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Traslado de carrera</th>
                                <td colspan="2">
                                    @if ($resultado['realizo_Traslado_Carrera'] == 0)
                                        No realizó
                                    @else
                                        Sí realizó
                                    @endif
                                </td>
                            </tr>
                        </table>
                        {{-- <p>Número de solicitud: {{ $resultado['numero_solicitud'] }}</p>
                        <p>Razon de solicitud: {{ $resultado['razon_Solicitud'] }}</p>
                        <p>Estado de solicitud: {{ $resultado['estado'] }}</p> --}}
                    </div>

                    {{-- <div class="detalle_solicitud">
                        <label>Archivos</label>
                        @foreach ($resultado['archivos'] as $archivos)
                            <li>
                                <a>{{ $archivos['url'] }}</a>
                            </li>
                        @endforeach
                    </div> --}}

                </div>


                <div class="divbotones_">

                    <a class="boton_opciones" type="button" value="Atrás" href="{{ URL::previous() }}">Regresar</a>

                </div>


            </div>

        </div>

    </div>
@endsection
