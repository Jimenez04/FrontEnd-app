@extends('plantilla')
@section('title', 'Trabajo')
@section('content')


    <div class="Principal_New_Adecuacion">

        <div class="container_Nueva_Adecuacion">

            <div class="Nueva_Adecuacion">

                <div class="Llenado_solicitud">

                    <h3>Trabajo</h3>
                    <div class="contenido_nueva_adecuacion">
                        <div class="content_Trabajo">
                            <label class="etiqueta_solicitud_adecuacion">¿Trabaja?</label>
                            <div class="seleccion_trabajo">

                                <div class="Check">
                                    <label class="label_radio">Si</label>
                                    <input class="radio_buttom" type="radio" name="seleccion_trabaja"
                                        id="check_si_trabaja" value="1" onchange="mostrar_formtrabajo(this.value)">
                                </div>
                                <div class="Check">
                                    <label class="label_radio">No</label>
                                    <input class="radio_buttom" type="radio" name="seleccion_trabaja"
                                        id="check_no_trabaja" value="0" onchange="mostrar_formtrabajo(this.value)">
                                </div>
                            </div>
                            <div class="Trabajo" id="trabajo">
                                <div class="datos_adecuacion">
                                    <label class="etiqueta_solicitud_adecuacion">Trabajo Actual</label>
                                    <input class="campos_adecuacion" type="text" name="" value="">
                                </div>
                                <div class="datos_adecuacion">
                                    <label class="etiqueta_solicitud_adecuacion">Lugar de Trabajo</label>
                                    <input class="campos_adecuacion" type="text" name="" value="">
                                </div>
                                <div class="datos_adecuacion">
                                    <label class="etiqueta_solicitud_adecuacion">Actividad que
                                        desempeña</label>
                                    <input class="campos_adecuacion" type="text" name="" value="">
                                </div>
                                <div class="datos_adecuacion">
                                    <label class="etiqueta_solicitud_adecuacion">Horario</label>
                                    <input class="campos_adecuacion" type="text" name="" value="">
                                </div>
                                <div class="datos_adecuacion">
                                    <label class="etiqueta_solicitud_adecuacion">Jornada</label>
                                    <input class="campos_adecuacion" type="text" name="" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divbotones_">

                        <input class="boton_opciones" id="Cancelar" type="submit" value="Cancelar">
                        <input class="boton_opciones" id="Siguiente" type="submit" value="Siguiente">
                    </div>

                </div>



            </div>

        </div>



    </div>


@endsection
