             <!---------------------------MODAL TRABAJO---------------------------->

             <div class="modal" id="modal_recomendaciones">

                <div class="modal_contenido">

                    <div class="modal-header">
                        <h2>Nueva Entrada</h2>

                        <a style="cursor: pointer;" id="modal_trabajo_cierra" onclick="closeModalRecomendacion(this)">
                            <i class="fa fa-close" id="cierra_modal"></i>
                        </a>
                    </div>

                    <div class="modal_body">
       
                        <form  action="javascript:continuar(this)" method="post" enctype="multipart/form-data" class="form_trabajo">
                            @csrf
            
                            <div class="datos_modals2">
                                <label class="etiqueta_modals">Nombre del especialista</label>
                                <input class="campos_modals" name="" id="nombre_Especialista">
                            </div>

                            <div class="datos_modals2">
                                <label class="etiqueta_modals">Descripción</label>
                                <textarea class="textareamodal" name="" id="descripcion_Recomendacion"></textarea>
                            </div>

                            <div class="botones_modal">

                                <a style="cursor: pointer; color:white" class="boton_opciones btn_negativos" id="cerrar_modal_trabajo"
                                    onclick="closeModalRecomendacion(this)">Regresar
                                </a>
                                <input class="boton_opciones btn_positivos" id="btn_add_OR_Update"  type="submit" value="Agregar">
                            </div>
                            
                           </form>
                       </div>
                   </div>
               </div>
               <script src="{{ asset('js/recomendaciones.js') }}"></script>
