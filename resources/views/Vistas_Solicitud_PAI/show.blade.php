@extends('plantilla')
@section('title', 'Ver Adecuacion')
@section('content')

    <div class="Principal_Informacion_Adecuacion">

        <div class="container_Informacion_Adecuacion">

            <div class="Informacion_solicitud">
                <div class="row adecuacion">
                    <h4 class="col">Información sobre su solicitud PAI</h4>
                    <a id="btn_descarga" style="cursor: pointer; color:blue" onclick="descargaarchivoPAI('{{$resultado['numero_Solicitud']}}')" class="col-md-auto">Descargar archivos</a>
                </div>
                <div class="container_informacion_solicitud" id="container_informacion_solictud">
                    <div class="informacion_adecuacion">
                        <table class="table table-bordered tabla_adecuacion">
                            <thead>
                                <tr>
                                    <th scope="col">Solicitud</th>
                                    <th scope="col">Semestre</th>
                                    <th scope="col">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        {{ $resultado['numero_Solicitud'] }}
                                    </td>
                                    <td>
                                        {{ $resultado['semestre'] }}
                                    </td>
                                    <td>
                                        {{ $resultado['estado'] }} </td>
                                </tr>

                            </tbody>
                        </table>

                        <h4 class="subtitulo-informacion">Información general</h4>
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Nombre carrera</th>
                                <td colspan="2">
                                    {{ $resultado['nombre_Carrera'] }}
                                </td>
                            </tr>
                            <tr>
                                <th>Curso</th>
                                <td colspan="2">
                                    {{ $resultado['nombre_Curso'] }}
                                </td>
                            </tr>
                            <tr>
                                <th>Número de matrículas</th>
                                <td colspan="2">
                                    {{ $resultado['numero_De_Matriculas']}}
                                </td>
                            </tr>
                            <tr>
                                <th>Grupo</th>
                                <td colspan="2">
                                    {{ $resultado['grupo']}}
                                </td>
                            </tr>
                            <tr>
                                <th>Docente</th>
                                <td colspan="2">
                                    {{ $resultado['docente'] }}
                                </td>
                            </tr>
                            <tr>
                                <th>Considero que las razones por las cuales no he podido aprobar el curso son</th>
                                <td colspan="2">
                                    {{ $resultado['resumen_No_Aprobar_El_Curso'] }}
                                </td>
                            </tr>
                        </table>
                    </div>
            </div>


            <div class="divbotones_">

                <a class="boton_opciones btn_negativos widthbnt1" type="button" value="Atrás" href="{{ URL::previous() }}">Regresar</a>

            </div>


        </div>

    </div>

    </div>
    <input type="hidden" name="" id="url" value="{{env('API_URL')}}">
    <input type="hidden" name="" id="token" value="{{session('token')}}">
@endsection
<script src="{{ asset('js/archivos.js') }}"></script>