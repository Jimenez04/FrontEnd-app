@extends('plantilla')
@section('title', 'PAI')
@section('content')

<div class="Principal_New_Adecuacion" style="filter: blur(0px);">

    <div class="container_Nueva_Adecuacion">

        @if ($errors->any())
            <div class="alerta alert-danger alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="Nueva_Adecuacion">
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%" id="progreso"></div>
            </div>
            <div class="Llenado_solicitud">
                <form action="{{ route('PAI.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h3>PLAN DE ACCIÓN INDIVIDUAL</h3>
                        <div id="form_contenedor">
                            <div class="contenido_nueva_adecuacion">
                                <div class="datos_adecuacion">
                                    <label class="etiqueta_solicitud_adecuacion">Ingrese el nombre del curso</label>
                                    <input id="nombre_Curso" title="Mínimo 5 caracteres" name="nombre_Curso" value="{{old('nombre_Curso')}}" type="text" class="campos_adecuacion">
                                </div>
                                <div class="datos_adecuacion">
                                    <label class="etiqueta_solicitud_adecuacion">Ingrese el semestre para aplicar</label>
                                    <input type="number" id="semestre" min="1" max="3" name="semestre" title="Semestre"  value="{{old('semestre',1)}}" class="campos_adecuacion">
                                </div>
                                <div class="datos_adecuacion">
                                    <label class="etiqueta_solicitud_adecuacion">Ingrese el número de matriculas al curso</label>
                                    <input type="number" id="numero_De_Matriculas" min="2" max="100" name="numero_De_Matriculas" title="Mínimo 2 ocasiones"  value="{{old('numero_De_Matriculas',2)}}" class="campos_adecuacion">
                                </div>
                                <div class="datos_adecuacion">
                                    <label class="etiqueta_solicitud_adecuacion">Considero que las razones por las cuales no he podido aprobar el curso son:</label>
                                    <textarea  type="text" id="resumen_No_Aprobar_El_Curso" name="resumen_No_Aprobar_El_Curso" title="Mínimo 4 caracteres" class="campos_adecuacion" cols="30" rows="10">
                                        {{old('resumen_No_Aprobar_El_Curso')}}
                                    </textarea>
                                </div>
                                <div class="datos_adecuacion">
                                    <label class="etiqueta_solicitud_adecuacion">Ingrese el número de grupo del curso</label>
                                    <input type="number" id="grupo" name="grupo" title="Grupo" value="{{old('grupo',1)}}" min="1" max="10" class="campos_adecuacion">
                                </div>
                                <div class="datos_adecuacion">
                                    <label class="etiqueta_solicitud_adecuacion">Nombre docente del curso</label>
                                    <input type="text" id="docente" name="docente" title="Mínimo 4 caracteres"  value="{{old('docente')}}" class="campos_adecuacion">
                                </div>
                                <div class="datos_adecuacion">
                                    <label class="etiqueta_solicitud_adecuacion">Nombre de su carrera</label>
                                    <input type="text" id="nombre_Carrera" name="nombre_Carrera"  title="Mínimo 4 caracteres" value="{{old('nombre_Carrera')}}" class="campos_adecuacion">
                                </div>

                            </div>
                        </div>
                    <div class="divbotones_">
                        <button type="button" class="botones_est" onclick="window.location= '{{route('PAI_user')}}'">Cancelar</button>
                        <button type="submit" class="botones_est" >Continuar</button>
                    </div>
                </form>

            </div>
           
        </div>
        
    </div>
    
</div>
@endsection
