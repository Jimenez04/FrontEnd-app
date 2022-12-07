@extends('plantilla')
@section('title', 'Nueva_Adecuacion')
@section('content')


    <div class="Principal_New_Adecuacion">

        <div class="container_Nueva_Adecuacion">

            <div class="Nueva_Adecuacion">

                <div class="Llenado_solicitud">
                    <form onSubmit="return false;" method="post" enctype="multipart/form-data" >
                        @csrf
                        <h3>Nueva Solicitud de Adecuación</h3>
                            <div id="form_contenedor">
                            <div class="contenido_nueva_adecuacion">
                                <div class="datos_adecuacion">
                                    <label class="etiqueta_solicitud_adecuacion">Razon solicitud</label>
                                    <input class="campos_adecuacion" type="text" name="razon" value="">
                                </div>

                                <div class="datos_adecuacion">
                                    <label class="etiqueta_solicitud_adecuacion">Carrera Empadronada</label>
                                    <input class="campos_adecuacion" type="text" name="razon" value="">
                                </div>

                                <div class="datos_adecuacion">
                                    <label class="etiqueta_solicitud_adecuacion">Año ingreso a la carrera</label>
                                    <input class="campos_adecuacion" type="text" name="razon" value="">
                                </div>
                            
                                <div class="datos_adecuacion">
                                    <label class="etiqueta_solicitud_adecuacion">Nivel de carrera</label>
                                    <input class="campos_adecuacion" type="text" name="razon" value="">
                                </div>

                                <div class="Carrera_simultanea">
                                    <label class="etiqueta_solicitud_adecuacion">¿Lleva una segunda carrera?</label>
                                    <div class="seleccion_carrera_simultanea">
                                        <br>
                                        <div class="Check">
                                            <label class="label_radio">Si</label>
                                            <input class="radio_buttom" type="radio" name="seleccion_2carrera"
                                                id="check_si_2carrera" value="1" onchange="mostrar(this.value)">
                                        </div>

                                        <div class="Check">
                                            <label class="label_radio">No</label>
                                            <input class="radio_buttom" type="radio" name="seleccion_2carrera"
                                                id="check_no_2carrera" value="0" onchange="mostrar(this.value)">
                                        </div>
                                    </div>

                                    <div class="Segunda_carrera" id="segunda_carrera">
                                        <label class="etiqueta_solicitud_adecuacion">Nombre la segunda carrera</label>
                                        <input class="campos_adecuacion" type="text" name="" value="">
                                    </div>
                                </div>

                                <div class="Traslado">
                                    <label class="etiqueta_solicitud_adecuacion">¿Realizó traslado?</label>
                                    <div class="seleccion_traslado">
                                        <br>
                                        <div class="Check">
                                            <label class="label_radio">Si</label>
                                            <input class="radio_buttom" type="radio" name="seleccion_traslado"
                                                id="checksi_traslado" value="1" onchange="mostrar_traslado(this.value)">

                                        </div>
                                        <div class="Check">
                                            <label class="label_radio">No</label>
                                            <input class="radio_buttom" type="radio" name="seleccion_traslado"
                                                id="check_traslado" value="0" onchange="mostrar_traslado(this.value)">

                                        </div>
                                    </div>

                                    <div class="Traslado_carrera" id="Traslado_carrera">
                                        <label class="etiqueta_solicitud_adecuacion">Carrera donde estuvo empadronado/a </label>
                                        <input class="campos_adecuacion" type="text" name="" value="">
                                    </div>
                                </div>
                        </div>
                    </div>
                        <div class="divbotones_">

                            <input class="boton_opciones" id="Cancelar" type="submit" value="Cancelar">
                            <a href="#" hidden class="boton_opciones" id="btn_atras" onclick="atras(this)">Atras</a>
                            <a href="#" class="boton_opciones" id="btn_Siguiente" onclick="siguiente(this)">Siguiente</a>
                            <input class="boton_opciones" hidden id="Siguiente" type="submit" value="Finalizar">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{ asset('js/adecuacion.js') }}"></script>
