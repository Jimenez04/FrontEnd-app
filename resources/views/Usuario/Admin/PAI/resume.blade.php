@extends('plantilla')
@section('title', 'Ver PAI')
@section('content')

    <div class="Principal_Informacion_Adecuacion">
        <div class="container_Informacion_Adecuacion">
            <div class="Informacion_solicitud">
                <div class="row adecuacion">
                    <h4 class="col">Seguimiento Solicitud</h4>
                </div>
                @if ($errors->any())
                <div class="alerta alert-danger alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
               <form action="{{ route('Admin.PAI.Resume.store', [$numSolicitud,$id ,$carnet == null ? 'null' : $carnet ]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="table">
                            {{-- <h4 class="">Información adicional</h4> --}}
                            <div class="cabeza">
                                <div class="grid grid-columna-2 table-bordered">
                                    <label for="">Ingrese la oficina de reunión</label>
                                        <input type="text" id="Estudiante[nombreoficina]" name="PAI[nombreoficina]" value="{{ old('PAI.nombreoficina') }}">
                                </div>
                                <div class="grid grid-columna-2 table-bordered">
                                    <label for="">Ingrese el nombre del profesor consejero presente</label>
                                    <input type="text" id="profesor_Consejero" name="Estudiante[profesor_Consejero]" value="{{ old('Estudiante.profesor_Consejero') }}">
                                </div>
                                <div class="grid grid-columna-2 table-bordered">
                                    <label for="">Ingrese el nombre del profesional de vida estudiantil</label>
                                    <input type="text" name="PAI[profesional_VidaEstudiantil]" id="profesional_VidaEstudiantil" value="{{ old('PAI.profesional_VidaEstudiantil') }}">
                                </div>
                            </div>
                        </div>
                   

                    <div class="table">
                        <h4>Información relacionada con el estudiante y el curso</h4>
                        <div class="cabeza">
                            <div class="grid grid-columna-2 table-bordered">
                                <label for="">Número de culminaciones</label>
                                <input type="number" id="numero_De_Culminaciones" min="0" max="100"  name="Curso[numero_De_Culminaciones]" value="{{ old('Curso.numero_De_Culminaciones','1') }}">
                            </div>
                            <div class="grid grid-columna-2 table-bordered">
                                <label for="">Aspectos y circunstancias que lo han llevado a la condición de rezago</label>
                                <textarea name="Curso[aspectos_Y_Condiciones_Rezago]" id="aspectos_Y_Condiciones_Rezago" cols="30" rows="20" style="resize: none;"> {{ old('Curso.aspectos_Y_Condiciones_Rezago') }} </textarea>
                            </div>
                        </div>
                    </div>
                    <section>
                        <h4>Formulario de valoración académica</h4>
                        <label for="">En el siguiente cuadro indique su valoración de cada aspecto según la escala de 1 a 5, en donde 1 equivale al nivel MÁS BAJO o poco frecuente y 5 al nivel MÁS ALTO o muy frecuente.</label>
                        <table class="table table-striped table-bordered table-responsive">
                            <thead>
                                <tr class="small-row" style=" color:#004C6D; font-weight: bold;">
                                    <td colspan="1" class="sin-borde" style="border-top:0 ;">Valoración</td>
                                    <td colspan="1"></td>
                                </tr>

                                @foreach ($banco['categorias'] as $item)
                                    <tr style="background-color: #204D6F; color: white;">
                                        <td colspan="1">{{ $item['id'] }}- {{ $item['nombre'] }}:</td>
                                        <td colspan="1"></td>
                                    </tr>
                            </thead>
                            <tbody>
                                @foreach ($banco['Preguntas'] as $question)
                                    <tr class="pregunta">

                                        @if ($item['id'] == $question['categoria_Id'])
                                            <td colspan="1" style="width: 80%;">{{ $question['pregunta'] }}:</td>

                                                <td colspan="1" class="celda" style="width: 20%;" class="center">  
                                                        <select id="" name="Formulario[cuestionario][{{$question['id']}}][respuesta]">
                                                            <option {{old("Formulario.cuestionario.".$question['id'].".respuesta") == 1 ? 'selected' : ''}}  value="1">Casi nunca</option>
                                                            <option {{old("Formulario.cuestionario.".$question['id'].".respuesta") == 2 ? 'selected' : ''}} value="2">A veces</option>
                                                            <option {{old("Formulario.cuestionario.".$question['id'].".respuesta") == 3 ? 'selected' : ''}} value="3">A menudo</option>
                                                            <option {{old("Formulario.cuestionario.".$question['id'].".respuesta") == 4 ? 'selected' : ''}} value="4">Normalmente</option>
                                                            <option {{old("Formulario.cuestionario.".$question['id'].".respuesta") == 5 ? 'selected' : ''}}  value="5">Siempre</option>
                                                          </select>
                                                          <input type="hidden" value="{{$question['id']}}" name="Formulario[cuestionario][{{$question['id']}}][pregunta_Id]">
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                            @endforeach
                        </table>
                    </section>
                    <div class="table">
                        <h4>PARTE 2</h4>
                        <div class="cabeza">
                            <div class="grid grid-columna-2 table-bordered container_resume_pai">
                                <label for="">¿Considera que su salud física y/o emocional, le ha perjudicado, y por eso ha perdido el curso?</label>

                                <div class="container_selector">
                                    <select id="salud_Como_Impedimento" class="selector" name="PAI[salud_Como_Impedimento]">
                                        <option value="1" {{old("PAI.salud_Como_Impedimento") == 1 ? 'selected' : ''}} >SI</option>
                                        <option {{old("PAI.salud_Como_Impedimento") == 0 ? 'selected' : ''}} value="0">NO</option>
                                      </select>
                                </div>
                                <textarea name="Salud[descipcion]" id="Salud_descipcion" cols="30" rows="20" style="resize: none; display:none;" >{{ old('Salud.descipcion','No indica') }}</textarea>
                            </div>
                            <div class="grid grid-columna-2 table-bordered container_resume_pai">
                                <label for="">¿Considera que algún aspecto relacionado con su actitud hacia el curso, podria estar influyendo para la aprobación del curso?</label>
                                <div>
                                    <select id="curso_actitud_Estudiante" class="selector" name="Curso[actitud_Estudiante]">
                                        <option value="1" {{old("Curso.actitud_Estudiante") == 1 ? 'selected' : ''}} >SI</option>
                                        <option {{old("Curso.actitud_Estudiante") == 0 ? 'selected' : ''}} value="0">NO</option>
                                      </select>
                                </div>

                                <textarea name="Actitud_En_El_Curso[descripcion]" id="Actitud_En_El_Curso_descripcion" cols="30" rows="20" style="resize: none; display:none;">{{ old('Actitud_En_El_Curso.descripcion','No indica' ) }}</textarea>
                            </div>
                            <div class="grid grid-columna-2 table-bordered container_resume_pai">
                                <label for="">Resuma los motivos por los cuales usted cree que no ha aprobado el curso</label>
                                <textarea name="Curso[resumen_No_Aprobar_El_Curso]" id="resumen_No_Aprobar_El_Curso" cols="30" rows="20" style="resize: none;">{{ old('Curso.resumen_No_Aprobar_El_Curso') }}</textarea>
                            </div>
                            <div class="grid grid-columna-2 table-bordered container_resume_pai">
                                <label for="">¿Qué espera al acogerse al PLAN de ACCIÓN INDIVIDUAL?</label>
                                <textarea name="PAI[que_Espera_Del_Plan]" id="que_Espera_Del_Plan" cols="30" rows="20" style="resize: none;">{{ old('PAI.que_Espera_Del_Plan') }}</textarea>
                            </div>
                            <div class="grid grid-columna-2 table-bordered container_resume_pai">
                                <label for="">Observaciones o comentarios del/de la docente u otros miembros del equipo, presentes en la reunión.</label>
                                <textarea name="PAI[comentarios_Presentes_Reunion]" id="comentarios_Presentes_Reunion" cols="30" rows="20" style="resize: none;">{{ old('PAI.comentarios_Presentes_Reunion') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="divbotones_">
                        <a class="boton_opciones btn_negativos widthbnt" type="button" value="Atrás" href="{{route('Admin.pai.show', [$id, $carnet]) }}">Regresar</a>
                        <button id="btn_continuar" type="submit" class=" boton_opciones btn_positivos widthbnt" 
                        >Continuar</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>


    <input type="hidden" name="" id="url" value="{{ env('API_URL') }}">
    <input type="hidden" name="" id="token" value="{{ session('token') }}">

    @push('styles')
        <link href="{{ asset('css/resume_PAI.css') }}" rel="stylesheet">
    @endpush 
    <script src="{{ asset('js/resumePAI.js') }}"></script>
@endsection
