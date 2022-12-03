             <!---------------------------MODAL ENFERMEDAD--------------------------->

             <div class="modal" id="modal_enfermedad">
                 <div class="modal_contenido">

                     <div class="modal-header">
                         <h2>Agregar Enfermedad</h2>

                         <a href="#" id="cerrar_modal_enfermedad" onclick="closeModal(this)">
                             <i class="fa fa-close" id="cierra_modal"></i>
                         </a>
                     </div>

                     <div class="modal_body">


                         <form action="{{ route('registro') }}" method="post" enctype="multipart/form-data">

                             <div class="form_enfermedad">
                                 @csrf
                                 <div class="contenido">
                                     <div class="datos_modals">
                                         <label class="etiqueta_mediana">Tipo de enfermedad</label>
                                         <input class="campos_modals" type="text" name="actividad_laboral"
                                             value="">
                                     </div>

                                     <div class="datos_modals">
                                         <label class="etiqueta_small">Tratamiento</label>
                                         <input class="campos_modals" type="text" name="actividad_laboral"
                                             value="">
                                     </div>

                                     <div class="datos_modals">
                                         <label class="etiqueta_small">Rutina</label>
                                         <input class="campos_modals" type="text" name="horario_laboral"
                                             value="">
                                     </div>

                                     <div class="datos_modals">
                                         <label class="etiqueta_small">Descripción</label>
                                         <textarea class="campos_text_area" id="descripcion_seguimiento" name="razon" rows="4" cols="30"></textarea>
                                     </div>
                                 </div>

                                 <div class="botones_modal">

                                     <a href="#" class="botonCerrarModal" id="cerrar_modal_enfermedad"
                                         onclick="closeModal(this)">Regresar
                                     </a>
                                     <input class="botonagregatrabajo" type="submit" value="Agregar">
                                 </div>
                             </div>
                         </form>

                     </div>

                 </div>
             </div>
