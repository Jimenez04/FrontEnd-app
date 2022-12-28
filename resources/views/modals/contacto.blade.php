<!---------------------------MODAL BECA--------------------------->
<div class="modal" id="modal_contacto">

    <div class="modal_contenido">

        <div class="modal-header">
            <h2>Agregar Trabajo</h2>

            <a style="cursor: pointer;" id="cierra_x" onclick="cerrarModal_Contacto(this)">
                <i class="fa fa-close" id="cierra_modal"></i>
            </a>
        </div>

        <div class="modal_body">
                @csrf
                <div class="form_beca">
                    <div class="contenido_beca_modal">
                     
                    <div class="Numero">
                     <div class="flex"> <label class="etiqueta_modals">Número</label>
                        <input class="campos_modals " value="" id="numero" required type="tel" name="telefono">
                        </div>
                        
                        <div class="div_btn_trabajo"> 
                        <a style="cursor: pointer; color:white" class="btn_modal boton_positivo_modal" id="cerrar_modal_beca"
                        onclick="agregartelefono(this)">Agregar</a> 
                        </div>
                        
                        
                    </div>

<br>
<br>                  <div class="div_tabla">
                            <table class="tabla_grupo_familiar">
                            <thead>
                                <tr>
                                    <th scope="col">Número</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="cuerpo_tabla">

                            </tbody>
                            </table>
                         </div>

<br>
<br>
                    </div>
                    <div class="botones_modal">
                        <a style="cursor: pointer; color:white" class="btn_modal boton_negativo_modal" id="cerrar_modal_beca"
                            onclick="cerrarModal_Contacto(this)">Regresar
                        </a>
                    </div>
                </div>
        </div>

    </div>
</div>
