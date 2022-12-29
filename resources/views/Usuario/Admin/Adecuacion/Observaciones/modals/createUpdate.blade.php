             <!---------------------------MODAL TRABAJO---------------------------->

             <div class="modal" id="modal_Observacion">

                <div class="modal_contenido">

                    <div class="modal-header">
                        <h2>Nueva Entrada</h2>

                        <a style="cursor: pointer;" id="modal_trabajo_cierra" onclick="closeModalObservacion(this)">
                            <i class="fa fa-close" id="cierra_modal"></i>
                        </a>
                    </div>

                    <div class="modal_body">
       
                        <form  action="javascript:continuar(this)" method="post" enctype="multipart/form-data" class="form_trabajo">
                            @csrf
            
                            <div class="datos_modals">
                                <label class="etiqueta_modals">Nombre</label>
                                <input class="campos_modals" name="" id="nombre">
                            </div>

                            <div class="datos_modals">
                                <label class="etiqueta_modals">Descripción</label>
                                <textarea class="campos_modals" name="" id="descripcion" cols="30" rows="10"></textarea>
                            </div>

                            <div class="botones_modal">

                                <a style="cursor: pointer; color:white" class="botonCerrarModal" id="cerrar_modal_trabajo"
                                    onclick="closeModalObservacion(this)">Regresar
                                </a>
                                <input class="botonagregatrabajo" id="btn_add_OR_Update"  type="submit" value="Agregar">
                            </div>
                            
                           </form>
                       </div>
                   </div>
               </div>
               <script src="{{ asset('js/observaciones.js') }}"></script>
