@extends('plantilla')
@section('title', 'Ver Adecuacion')
@section('content')
    @inject('carbon', 'Carbon\Carbon')

    <div class="Principal_Informacion_Adecuacion">

        <div class="container_Informacion_Adecuacion">

            <div class="Informacion_solicitud">
                <div style="display: flex; justify-content:center; gap:1rem">
                    <button class="btn btn-primary" onclick="OpenModalEstado( '{{  $resultado['revision__solicitud']['estado'] }}' )">Estado</button>
                    <button class="btn btn-primary">Observaciones</button>
                    <button class="btn btn-primary">Recomendaciones</button>
                    <button class="btn btn-primary" onclick=" window.location.href = route('adecuacion_index', [ '{{$resultado['id_bitacora']}}', 'verAdecuacion_admin','{{$resultado['id']}}'] ); " >Bitacora</button>
                </div>
                <div class="row adecuacion">
                    <h4 class="col">Información sobre su solicitud de adecuación</h4>
                    <a href="#" class="col-md-auto">Descargar archivos</a>
                </div>
                <div class="container_informacion_solicitud" id="container_informacion_solictud">
                    <div class="informacion_adecuacion">
                        <table class="table table-bordered tabla_adecuacion">
                            <thead>
                                <tr>
                                    <th scope="col">Solicitud</th>
                                    <th scope="col">Razón</th>
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
                                    <td id="columna_estado">
                                        {{ $resultado['revision__solicitud']['estado'] }} </td>
                                </tr>

                            </tbody>
                        </table>

                        <h4 class="subtitulo-informacion">Información general</h4>
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Carnet</th>
                                <td colspan="2">
                                    {{ $resultado['estudiante_carnet'] }}
                                </td>
                            </tr>
                            <tr>
                                <th>Carrera empadronada</th>
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

                        <h4 class="subtitulo-informacion">Información sobre salud</h4>
                        <table class="table tabla_adecuacion">
                            <thead>
                                <tr>
                                    <th>Enfermedad</th>
                                    <th>Tratamiento</th>
                                    <th>¿Afecta en su desepeño?</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        {{ $resultado['salud_actual']['enfermedad'] != null ? $resultado['salud_actual']['enfermedad'] : 'No aplica' }}
                                    </td>
                                    <td>
                                        {{ $resultado['salud_actual']['tratamiento'] != null ? $resultado['salud_actual']['tratamiento'] : 'No aplica' }}
                                    </td>
                                    <td>
                                        @if ($resultado['salud_actual']['afectacionDesempeno'] != null)
                                            Sí
                                        @else
                                            No
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <h4 class="subtitulo-informacion">Necesidad y apoyo</h4>
                        <table class="table table-striped">
                            <tr>
                                <th>Diagnóstico</th>
                                <td colspan="2">
                                    {{ $resultado['necesidad__y__apoyos']['diagnostico'] }}
                                </td>
                            </tr>
                            <tr>
                                <th>Área profesional</th>
                                <td colspan="2">
                                    {{ $resultado['necesidad__y__apoyos']['area_Profesional'] }}
                                </td>
                            </tr>
                            <tr>
                                <th>¿Recibe atención y seguimiento?</th>
                                <td colspan="2">
                                    @if ($resultado['necesidad__y__apoyos']['recibe_atencionyseguimiento'] == 0)
                                        No
                                    @else
                                        Sí
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Atención y seguimiento</th>
                                <td colspan="2">
                                    {{ $resultado['necesidad__y__apoyos']['atencionyseguimiento'] }}
                                </td>
                            </tr>
                        </table>
                    </div>

                    <h4 class="subtitulo-informacion">Información académica</h4>
                    <table class="table table-striped">
                        <tr>
                            <th>Información académica</th>
                            <td colspan="2">
                                {{ $resultado['institucion__procedencia']['nombre'] }}
                            </td>
                        </tr>
                        <tr>
                            <th>Año de egreso</th>
                            <td colspan="2">
                                {{ $carbon::parse($resultado['institucion__procedencia']['ano_egreso'])->format('m/d/Y') }}
                            </td>
                        </tr>
                        <tr>
                            <th>Año de ingreso a la universidad</th>
                            <td colspan="2">
                                {{ $carbon::parse($resultado['institucion__procedencia']['ano_ingreso_universidad'])->format('m/d/Y') }}
                            </td>
                        </tr>
                    </table>

                    <h4 class="subtitulo-informacion">Información del grupo familiar</h4>
                    <table class="table table-striped">
                        <tr>
                            <th>Descripción de discapacidades</th>
                            <td colspan="2">
                                {{ $resultado['grupo__familiar']['descripcion_De_Discapacidades'] }}
                            </td>
                        </tr>
                    </table>

                    <h4 class="subtitulo-informacion">Parientes</h4>
                    <table class="table">
                        <thead class="thead-solicitud">
                            <tr>
                                <th scope="col">Cédula</th>
                                <th scope="col">Parentesco</th>
                                <th scope="col">Ocupación</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resultado['grupo__familiar']['pariente'] as $pariente)
                                <tr>
                                    <th scope="row">{{ $pariente['persona_cedula'] }}</th>
                                    <td>{{ $pariente['tipo_Pariente'] }}</td>
                                    <td>{{ $pariente['ocupacion'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="divbotones_">

                <a class="boton_opciones" type="button" value="Atrás" href="{{ route('Admin.Adecuacion') }}">Regresar</a>

            </div>


        </div>

    </div>

    </div>
    
    <input type="hidden" name="" id="url" value="{{env('API_URL')}}">
    <input type="hidden" name="" id="token" value="{{session('token')}}">

    @include('modals.updateStatus')
@endsection
<script src="{{ asset('js/funciones_verAdecuacion.js') }}"></script>
