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
            
                            <div class="datos_modals">
                                <label class="etiqueta_modals">Descripción</label>
                                <textarea class="campos_modals" name="" id="descripcion" cols="30" rows="10"></textarea>
                            </div>

                            <div class="datos_modals">
                                <label class="etiqueta_modals">Acciones Realizadas</label>
                                <textarea class="campos_modals" name="" id="acciones_realizadas" cols="30" rows="10"></textarea>
                            </div>

                            <div class="datos_modals">
                                <label class="etiqueta_modals">Observaciones</label>
                                <textarea class="campos_modals" name="" id="observaciones" cols="30" rows="10"></textarea>
                            </div>

                            <div class="botones_modal">

                                <a style="cursor: pointer; color:white" class="botonCerrarModal" id="cerrar_modal_trabajo"
                                    onclick="closeModalBitacora(this)">Regresar
                                </a>
                                <input class="botonagregatrabajo" id="btn_add_OR_Update"  type="submit" value="Agregar">
                            </div>
                            
                           </form>
                       </div>
                   </div>
               </div>
               <script src="{{ asset('js/bitacora.js') }}"></script>
