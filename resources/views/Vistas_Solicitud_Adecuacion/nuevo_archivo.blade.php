@extends('plantilla')
@section('title', 'Agregar Archivos')
@section('content')


    <div class="Principal_New_Adecuacion">

        <div class="container_Nueva_Adecuacion">

            <div class="Nueva_Adecuacion">

                <div class="Llenado_solicitud">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <h3>Adjuntar archivos</h3>

                        <div class="contenido_nueva_adecuacion">
                            <div class="datos_adecuacion">
                                <label class="etiqueta_solicitud_adecuacion">Expedido por</label>
                                <input class="campos_adecuacion" type="text" name="razon" value="">
                            </div>

                            <div class="adjuntar_Archivo">
                                <label class="etiqueta_archivos">Adjuntar documento (en formato PDF, DOCX, 5 MB
                                    máximo)
                                </label>

                                <input id="campos_archivo" type="file" name="archivos[]" value=""
                                    accept=".pdf,.docx" multiple>
                            </div>
                        </div>

                        <div class="divbotones_">

                            <input class="boton_opciones" id="Cancelar" type="submit" value="Cancelar">
                            <input class="boton_opciones" id="Siguiente" type="submit" value="Siguiente">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
