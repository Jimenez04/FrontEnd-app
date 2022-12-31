@extends('plantilla')
@section('title', 'Ver PAI')
@section('content')

    <div class="Principal_Informacion_Adecuacion">
        <div class="container_Informacion_Adecuacion">
            <div class="Informacion_solicitud">
                <div class="row adecuacion">
                    <h4 class="col">Información sobre su solicitud de adecuación</h4>
                    <a href="#" class="col-md-auto">Descargar archivos</a>
                </div>
                <div class="informacion_adecuacion">
                    <div class="table">
                        <div class="head">
                            <div class="head-PAI grid-columna-3 grid">
                                <div class="grid table-bordered">
                                    <label class="etiqueta"> Solicitud</label>
                                    <label>{{ $datos['numero_Solicitud'] }}</label>
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
                                <label>{{ $datos['estado'] }}</label>
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
                            <h1 style="font-weight: 700; margin: 15px 0 15px 0; font-size: 18px;">Instrucciones</h1>
                            <p>
                                En el siguiente cuadro indique su valoración de cada aspecto según la escala de 1 a 5, en
                                donde 1 equivale al nivel MÁS BAJO o poco precuente y 5 al nivel MÁS ALTO o muy frecuente.
                            </p>

                            <table>
                                <tr style="background-color: lightgreen;">
                                    <td colspan="1" style="border-bottom:0 ; text-align: center"> <b>Aspectos a
                                            considerar</b> </td>
                                    <td colspan="5" style="text-align: center;">Valoración</td>
                                </tr>
                                <tr class="small-row" style="background-color: lightgreen;">
                                    <td colspan="1" class="sin-borde" style="border-top:0 ;"></td>
                                    <td colspan="1">1</td>
                                    <td colspan="1">2</td>
                                    <td colspan="1">3</td>
                                    <td colspan="1">4</td>
                                    <td colspan="1">5</td>
                                </tr>

                                @foreach ($banco['categorias'] as $item)
                                    <tr style="background-color: lightblue;">
                                        <td colspan="1">{{ $item['id'] }}- {{ $item['nombre'] }}:</td>
                                        <td colspan="1"></td>
                                        <td colspan="1"></td>
                                        <td colspan="1"></td>
                                        <td colspan="1"></td>
                                        <td colspan="1"></td>
                                    </tr>
                                     @foreach ($banco['Preguntas'] as $question)
                                        <tr class="pregunta">
                                            
                                            <td colspan="1" style="width: 80%;">{{ $question['pregunta'] }}:</td>
                                            
                                            @foreach( $datos['curso__rezago']['formulario__valoracion__academica'] as $itemformulario )
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

                                            


                                        </tr>
                                    @endforeach
                                @endforeach
                            </table>
                        </section>
                    </main>


                </div>
            </div>
        </div>
    </div>





@endsection
<link rel="stylesheet" href="{{ asset('css/pai-info.css') }}">
