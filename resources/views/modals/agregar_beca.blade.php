<!---------------------------MODAL BECA--------------------------->
<div class="modal" id="modal_beca">

    <div class="modal_contenido">

        <div class="modal-header">
            <h2>Agregar Beca</h2>

            <a href="#" id="cierra_x" onclick="closeModal(this)">
                <i class="fa fa-close" id="cierra_modal"></i>
            </a>
        </div>

        <div class="modal_body">


            <form action="{{ route('registro') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form_beca">
                    <div class="contenido_beca_modal">

                        <label class="etiqueta_modals">¿Tiene Beca?</label>
                        <div class="seleccion_beca">

                            <div class="Check">
                                <label class="label_radio">Si</label>
                                <input class="radio_buttom" type="radio" name="seleccion_beca" id="check_becado"
                                    value="1" onchange="mostrar_inputbeca(this.value)">
                            </div>
                            <div class="Check">
                                <label class="label_radio">No</label>
                                <input class="radio_buttom" type="radio" name="seleccion_beca" id="check_no_becado"
                                    value="0" onchange="mostrar_inputbeca(this.value)">
                            </div>
                        </div>


                        <div class="tipo_beca" id="tipo_beca">
                            <div class="beca-socioeconomica">
                                <label class="etiqueta_modals">Asistencia socioeconómica</label>
                                <div class="seleccion_beca_socioeconomica">

                                    <div class="Check">
                                        <label class="label_radio">Si</label>
                                        <input class="radio_buttom" type="radio" name="seleccion_beca_socio"
                                            id="check_becasocio" value="1"
                                            onchange="beca_socioeconomica(this.value)">
                                    </div>
                                    <div class="Check">
                                        <label class="label_radio">No</label>
                                        <input class="radio_buttom" type="radio" name="seleccion_beca_socio"
                                            id="check_no_becasocio" value="0"
                                            onchange="beca_socioeconomica(this.value)">
                                    </div>
                                </div>
                            </div>
                            <div class="categoria_beca" id="categoria_beca">
                                <label class="etiqueta_modals">Categoría de beca socioeconómica</label>
                                <div class="seleccion_categoria">

                                    <div class="Check">
                                        <label class="label_radio">1</label>
                                        <input class="radio_buttom" type="radio"
                                            name="seleccion_categoría_beca_socioeconomica"
                                            id="check_categoria_beca_socioeconomica" value="1"
                                            onchange="categoria_beca(this.value)">
                                    </div>
                                    <div class="Check">
                                        <label class="label_radio">2</label>
                                        <input class="radio_buttom" type="radio"
                                            name="seleccion_categoría_beca_socioeconomica"
                                            id="check_categoria_beca_socioeconomica" value="2"
                                            onchange="categoria_beca(this.value)">
                                    </div>
                                    <div class="Check">
                                        <label class="label_radio">3</label>
                                        <input class="radio_buttom" type="radio"
                                            name="seleccion_categoría_beca_socioeconomica"
                                            id="check_categoria_beca_socioeconomica" value="3"
                                            onchange="categoria_beca(this.value)">
                                    </div>
                                    <div class="Check">
                                        <label class="label_radio">4</label>
                                        <input class="radio_buttom" type="radio"
                                            name="seleccion_categoría_beca_socioeconomica"
                                            id="check_categoria_beca_socioeconomica" value="4"
                                            onchange="categoria_beca(this.value)">
                                    </div>
                                    <div class="Check">
                                        <label class="label_radio">5</label>
                                        <input class="radio_buttom" type="radio"
                                            name="seleccion_categoría_beca_socioeconomica"
                                            id="check_categoria_beca_socioeconomica" value="5"
                                            onchange="categoria_beca(this.value)">
                                    </div>
                                </div>
                            </div>

                            <!-----------------------Beca Participación-->
                            <div class="beca-participacion">
                                <label class="etiqueta_modals">Participación</label>
                                <div class="seleccion_beca_participacion">

                                    <div class="Check">
                                        <label class="label_radio">Si</label>
                                        <input class="radio_buttom" type="radio"
                                            name="seleccion_beca_participacion" id="check_beca_participacion"
                                            value="1" onchange="beca_participacion(this.value)">
                                    </div>
                                    <div class="Check">
                                        <label class="label_radio">No</label>
                                        <input class="radio_buttom" type="radio"
                                            name="seleccion_beca_participacion" id="check_beca_participacion"
                                            value="0" onchange="beca_participacion(this.value)">
                                    </div>
                                </div>
                            </div>
                            <div class="info_beca_participacion" id="beca_participacion">
                                <label class="etiqueta_modals">Actividad que
                                    desempeña</label>
                                <input class="campos_adecuacion" type="text" name="" value="">
                            </div>
                        </div>

                    </div>
                    <div class="botones_modal">

                        <a href="#" class="botonCerrarModal" id="cerrar_modal_beca"
                            onclick="closeModal(this)">Regresar
                        </a>
                        <input class="botonagregatrabajo" type="submit" value="Agregar">
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>
