             <!---------------------------MODAL TRABAJO---------------------------->

             <div class="modal" id="modal_trabajo">

                 <div class="modal_contenido">

                     <div class="modal-header">
                         <h2>Trabajo</h2>

                         <a style="cursor: pointer;" id="modal_trabajo_cierra" onclick="closeModal(this)">
                             <i class="fa fa-close" id="cierra_modal"></i>
                         </a>
                     </div>

                     <div class="modal_body">
        
                         <form {{-- action="{{ route('Nuevo_Trabajo') }}" --}} action="javascript:addjob(this)" method="post" enctype="multipart/form-data"
                             class="form_trabajo">
                             @csrf
                             <input type="hidden" name="id_trabajo" value="" id="id_trabajo" >
                             
                             <div class="datos_modals">
                                 <label class="etiqueta_modals">Actividad que desempeña</label>
                                 <input class="campos_modals" id="actividad_Que_Desempena" value="{{ old('actividad_Que_Desempena') }}" type="text" name="actividad_Que_Desempena" >
                             </div>

                             <div class="datos_modals">
                                 <label class="etiqueta_modals">Lugar de Trabajo</label>
                                 <input class="campos_modals " value="{{ old('lugar_De_Trabajo') }}" id="lugar_De_Trabajo"     type="text" name="lugar_De_Trabajo" >
                             </div>

                             <div class="datos_modals">
                                 <label class="etiqueta_modals">Horario laboral</label>
                                 <input class="campos_modals" value="{{ old('horario_Laboral') }}" id="horario_Laboral" type="text" name="horario_Laboral" value="">
                             </div>
                             <div class="botones_modal">

                                 <a style="cursor: pointer; color:white" class="botonCerrarModal" id="cerrar_modal_trabajo"
                                     onclick="closeModal(this)">Regresar
                                 </a>
                                 <a style="cursor: pointer; color:white" class="botonCerrarModal" id="btn_delete_job"
                                     onclick="delete_job(this)">Eliminar
                                 </a>
                                 <input class="botonagregatrabajo" id="btn_add_job"  type="submit" value="Agregar">
                             </div>
                            
                            </form>
   
                        </div>
   
                    </div>
                </div>
   
                <script src="{{ asset('js/trabajo.js') }}"></script>
