@extends('plantilla')
@section('title', 'Necesidad_Y_Apoyo')
@section('content')


    <div class="Principal_New_Adecuacion">

        <div class="container_Nueva_Adecuacion">

            <div class="Nueva_Adecuacion">

                <div class="Llenado_solicitud">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <h3>Necesidad Y Apoyo</h3>
                        <div class="contenido_nueva_adecuacion">
                            <div class="datos_adecuacion">
                                <label class="etiqueta_solicitud_adecuacion">Diágnostico</label>
                                <input class="campos_adecuacion" type="text" name="razon" value="">
                            </div>

                            <div class="datos_adecuacion">
                                <label class="etiqueta_solicitud_adecuacion">Área, profesional que diagnostica</label>
                                <input class="campos_adecuacion" type="text" name="razon" value="">
                            </div>

                            <div class="Atencion">
                                <label class="etiqueta_atencion">¿Recibe atención y tratamiento por parte de algún
                                    especialista?</label>

                                <div class="seleccion_atencion">
                                    <br>
                                    <div class="Check">
                                        <label class="label_radio">Si</label>
                                        <input class="radio_buttom" type="radio" name="seleccion_atencion"
                                            id="checksi_atencion" value="1" onchange="mostrar_atencion(this.value)">

                                    </div>

                                    <div class="Check">
                                        <label class="label_radio">No</label>
                                        <input class="radio_buttom" type="radio" name="seleccion_atencion"
                                            id="check_noatencion" value="0" onchange="mostrar_atencion(this.value)">

                                    </div>
                                </div>

                                <div class="Descripcion" id="descripcion_atencion">
                                    <label class="etiqueta_solicitud_adecuacion">Tipo de atención o seguimiento</label>
                                    <textarea class="campos_text_area" id="descripcion_atencion" name="atencion" rows="4" cols="30"></textarea>
                                </div>
                            </div>

                            <div class="Atencion">
                                <h5>Condición de salud actual</h5>
                                <label class="etiqueta_atencion">¿Padece de alguna enfermedad que afecta su
                                    desempeño?</label>
                                    
                                <div class="seleccion_atencion">
                                    <br>
                                    <div class="Check">
                                        <label class="label_radio">Si</label>
                                        <input class="radio_buttom" type="radio" name="seleccion_enfermedad"
                                            id="checksi_atencion" value="1"
                                            onchange="mostrar_datos_enfermedad(this.value)">

                                    </div>
                                    <div class="Check">
                                        <label class="label_radio">No</label>
                                        <input class="radio_buttom" type="radio" name="seleccion_enfermedad"
                                            id="check_noatencion" value="0"
                                            onchange="mostrar_datos_enfermedad(this.value)">

                                    </div>
                                </div>

                                <div class="datos_enfermedad" id="campos_info_enfermedad">
                                    <label class="etiqueta_padecimiento">¿Cúal?</label>
                                    <input class="campos_enfermedad" type="text" name="razon" value="">
                                </div>
                                <div class="datos_enfermedad" id="campos_info_tratamiento">
                                    <label class="etiqueta_padecimiento">Tratamiento médico utilizado</label>
                                    <input class="campos_enfermedad" type="text" name="razon" value="">
                                </div>
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
