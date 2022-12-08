@extends('plantilla')
@section('title', 'Institucion_procedencia')
@section('content')


    <div class="Principal_New_Adecuacion">

        <div class="container_Nueva_Adecuacion">

            <div class="Nueva_Adecuacion">

                <div class="Llenado_solicitud">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <h3>Datos Acádemicos</h3>
                        
                        <div class="contenido_nueva_adecuacion">
                            <div class="datos_adecuacion">
                                <label class="etiqueta_solicitud_adecuacion">Nombre de la Institucion</label>
                                <input class="campos_adecuacion" type="text" name="institucion_procedencia"
                                    value="">
                            </div>

                            <div class="datos_adecuacion">
                                <label class="etiqueta_solicitud_adecuacion">Año de egreso</label>
                                <input class="campos_adecuacion" type="text" name="ano_egreso" value="">
                            </div>

                            <div class="datos_adecuacion">
                                <label class="etiqueta_solicitud_adecuacion">Año de ingreso a la universidad</label>
                                <input class="campos_adecuacion" type="text" name="ano_egreso" value="">
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
