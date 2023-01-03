@extends('plantilla')
@section('title', 'Ver PAI')
@section('content')

    <div class="Principal_Informacion_Adecuacion">
        <div class="container_Informacion_Adecuacion">
            <div class="Informacion_solicitud">
                <div class="row adecuacion">
                    <h4 class="col">Información sobre su solicitud PAI</h4>
                    <a id="btn_descarga" style="cursor: pointer; color:blue"
                        onclick="descargaarchivoPAI('{{ $datos['numero_Solicitud'] }}')" class="col-md-auto">Descargar
                        archivos
                    </a>
                </div>
                <div class="grid grid-columna-3" style="gap: 10px">
                    <button class="btn btn-secondary place-center" onclick="OpenModalEstado( '{{  $datos['estado'] }}' )">Estado</button>
                    @if($datos['estado'] != 'Rechazado' && $datos['estado'] != 'Terminado')
                    <button class="btn btn-secondary place-center" onclick=" window.location.href = route('Admin.pai.resume',['{{$datos['numero_Solicitud']}}','{{$datos['id']}}', '{{ $carnet}}']); ">Seguimiento</button>
                    @endif
                    <button class="btn btn-secondary place-center" onclick=" window.location.href = route('adecuacion_index', [ '{{$datos['id_bitacora']}}', 'Admin.pai.show','{{$datos['id']}}'] ); " >Bitacora</button>
                </div>
                <div class="informacion_adecuacion" style="margin-top: 20px">
                    <div class="table">
                        <div class="head">
                            <div class="head-PAI grid-columna-3 grid">
                                <div class="grid table-bordered">
                                    <label class="etiqueta"> Solicitud</label>
                                    <label class="overflow-etiqueta">{{ $datos['numero_Solicitud'] }}</label>
                                </div>
                                <div class="grid table-bordered">
                                    <label class="etiqueta"> Carrera</label>
                                    <label>{{ $datos['nombre_Carrera'] }}</label>
                                </div>
                                <div class="grid table-bordered">
                                    <label class="etiqueta"> Semestre</label>
                                    <label>{{ $datos['semestre'] }}</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table">
                        <h4 class="">Detalles</h4>
                        <div class="cabeza">
                            <div class="grid grid-columna-2 table-bordered">
                                <label for="">Carnet</label>
                                <label>{{ $datos['estudiante_Carnet'] }}</label>
                            </div>
                            <div class="grid grid-columna-2 table-bordered">
                                <label for="">Oficina</label>
                                <label>{{ $datos['nombreoficina'] }}</label>
                            </div>
                            <div class="grid grid-columna-2 table-bordered">
                                <label for="">Profesional vida estudiantil</label>
                                <label>{{ $datos['profesional_VidaEstudiantil'] }}</label>
                            </div>
                            <div class="grid grid-columna-2 table-bordered">
                                <label for="">Estado</label>
                                <label id="estado">{{ $datos['estado'] }}</label>
                            </div>

                            <div class="grid grid-columna-2 table-bordered">
                                <label for="">Comentarios presentes</label>
                                <label>{{ $datos['comentarios_Presentes_Reunion'] }}</label>
                            </div>
                            <div class="grid grid-columna-2 table-bordered">
                                <label for="">¿Su salud es un impedimento?</label>
                                <label>
                                    @if ($datos['salud_Como_Impedimento'] == 1)
                                        Sí
                                    @else
                                        No
                                    @endif
                                </label>
                            </div>
                            <div class="grid grid-columna-2 table-bordered">
                                <label for="">¿Qué espera del plan?</label>
                                <label>{{ $datos['que_Espera_Del_Plan'] }}</label>
                            </div>
                        </div>
                    </div>

                    <div class="table">
                        <h4>Información relacionada del curso</h4>
                        <div class="cabeza">
                            <div class="grid grid-columna-2 table-bordered">
                                <label for="">Nombre del curso</label>
                                <label for="">{{ $datos['curso__rezago']['nombre_Curso'] }}</label>
                            </div>
                            <div class="grid grid-columna-2 table-bordered">
                                <label for="">Grupo</label>
                                <label for="">{{ $datos['curso__rezago']['grupo'] }}</label>
                            </div>
                            <div class="grid grid-columna-2 table-bordered">
                                <label for="">Docente del curso</label>
                                <label for="">{{ $datos['curso__rezago']['docente'] }}</label>
                            </div>
                            <div class="grid grid-columna-2 table-bordered">
                                <label for="">Número de matriculas</label>
                                <label for="">{{ $datos['curso__rezago']['numero_De_Matriculas'] }}</label>
                            </div>
                            <div class="grid grid-columna-2 table-bordered">
                                <label for="">Número de culminaciones</label>
                                <label for="">{{ $datos['curso__rezago']['numero_De_Culminaciones'] }}</label>
                            </div>
                            <div class="grid grid-columna-2 table-bordered">
                                <label for="">Aspectos y condiciones de rezago</label>
                                <label
                                    for="">{{ $datos['curso__rezago']['aspectos_Y_Condiciones_Rezago'] }}</label>
                            </div>
                            <div class="grid grid-columna-2 table-bordered">
                                <label for="">Actitud del estudiante</label>
                                <label
                                    for="">{{ $datos['curso__rezago']['actitud__estudiante']['descripcion'] }}</label>
                            </div>
                            <div class="grid grid-columna-2 table-bordered">
                                <label for="">Resumen para no aprobar el curso</label>
                                <label for="">{{ $datos['curso__rezago']['resumen_No_Aprobar_El_Curso'] }}</label>
                            </div>
                        </div>
                    </div>
                    <main>
                        <section>
                            <h4>Formulario de valoración académica</h4>

                            <table class="table table-striped table-bordered table-responsive">
                                <thead>
                                    <tr class="small-row" style=" color:#004C6D; font-weight: bold;">
                                        <td colspan="1" class="sin-borde" style="border-top:0 ;">Valoración</td>
                                        <td colspan="1">1</td>
                                        <td colspan="1">2</td>
                                        <td colspan="1">3</td>
                                        <td colspan="1">4</td>
                                        <td colspan="1">5</td>
                                    </tr>

                                    @foreach ($banco['categorias'] as $item)
                                        <tr style="background-color: #204D6F; color: white;">
                                            <td colspan="1">{{ $item['id'] }}- {{ $item['nombre'] }}:</td>
                                            <td colspan="1"></td>
                                            <td colspan="1"></td>
                                            <td colspan="1"></td>
                                            <td colspan="1"></td>
                                            <td colspan="1"></td>
                                        </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banco['Preguntas'] as $question)
                                        <tr class="pregunta">
                                            @if ($item['id'] == $question['categoria_Id'])
                                            <td colspan="1" style="width: 80%;">{{ $question['pregunta'] }}:</td>
                                                @foreach ($datos['curso__rezago']['formulario__valoracion__academica'] as $itemformulario)
                                                        @if ($itemformulario['pregunta_Id'] == $question['id'])
                                                            @for ($i = 1; $i < 6; ++$i)
                                                                @if ($itemformulario['respuesta'] == $i)
                                                                    <td colspan="1" style="width: 4%;" class="center">X</td>
                                                                @else
                                                                    <td colspan="1" style="width: 4%;" class="center"></td>
                                                                @endif
                                                            @endfor
                                                        @endif
                                                @endforeach
                                                @if ($datos['curso__rezago']['formulario__valoracion__academica'] == null)
                                                    <td colspan="1" style="width: 4%;" class="center"></td>
                                                    <td colspan="1" style="width: 4%;" class="center"></td>
                                                    <td colspan="1" style="width: 4%;" class="center"></td>
                                                    <td colspan="1" style="width: 4%;" class="center"></td>
                                                    <td colspan="1" style="width: 4%;" class="center"></td>
                                                @endif
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                                @endforeach
                            </table>
                        </section>
                    </main>
                    <a class="boton_opciones" type="button" value="Atrás" href="{{ $carnet == null ? route('Admin.pai') : route('Admin.pai', $carnet)}}">Regresar</a>

                </div>
            </div>
        </div>
    </div>


    <input type="hidden" name="" id="url" value="{{ env('API_URL') }}">
    <input type="hidden" name="" id="token" value="{{ session('token') }}">
    @include('modals.updateStatusPAI')

@endsection
<script src="{{ asset('js/funciones_verPAI.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/pai-info.css') }}">
<script src="{{ asset('js/archivos.js') }}"></script>
