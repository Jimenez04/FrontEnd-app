             <!---------------------------MODAL TRABAJO---------------------------->

             <div class="modal" id="modal_bitacora">

                <div class="modal_contenido">

                    <div class="modal-header">
                        <h2>Nueva Entrada</h2>

                        <a style="cursor: pointer;" id="modal_trabajo_cierra" onclick="closeModalBitacora(this)">
                            <i class="fa fa-close" id="cierra_modal"></i>
                        </a>
                    </div>

                    <div class="modal_body">
       
                        <form  action="javascript:continuar(this)" method="post" enctype="multipart/form-data" class="form_trabajo">
                            @csrf
            
                            <div class="datos_modals2">
                                <label class="etiqueta_modals">Descripción</label>
                                <textarea class="textareamodal" name="" id="descripcion" cols="30" rows="10"></textarea>
                            </div>

                            <div class="datos_modals2">
                                <label class="etiqueta_modals">Acciones Realizadas</label>
                                <textarea class="textareamodal" name="" id="acciones_realizadas" cols="30" rows="10"></textarea>
                            </div>

                            <div class="datos_modals2">
                                <label class="etiqueta_modals">Observaciones</label>
                                <textarea class="textareamodal" name="" id="observaciones" cols="30" rows="10"></textarea>
                            </div>

                            <div class="botones_modal">

                                <a style="cursor: pointer; color:white" class="boton_opciones btn_negativos" id="cerrar_modal_trabajo"
                                    onclick="closeModalBitacora(this)">Regresar
                                </a>
                                <input class="boton_opciones btn_positivos" id="btn_add_OR_Update"  type="submit" value="Agregar">
                            </div>
                            
                           </form>
                       </div>
                   </div>
               </div>
               <script src="{{ asset('js/bitacora.js') }}"></script>
