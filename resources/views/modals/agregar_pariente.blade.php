             <!---------------------------MODAL PARIENTE---------------------------->

             <div class="modal" id="modal_pariente">

                 <div class="modal_contenido">

                     <div class="modal-header">
                         <h2>Agrega Pariente</h2>

                         <a href="#" id="modal_familiar_cierra" onclick="closeModal(this)">
                             <i class="fa fa-close" id="cierra_modal"></i>
                         </a>
                     </div>

                     <div class="modal_body">

                         <form onSubmit="return false;" enctype="multipart/form-data" class="form_pariente">
                             @csrf
                             <div class="buscar_pariente">
                                 <label class="etiqueta_modals">Cedula</label>
                                 <div class="busqueda_contenedor">
                                 <input class="campo_modal_buscar"  type="text" placeholder="Buscar.." name="cedula" id="cedula_pariente">
                                 <button id="btn_buscar" onclick="buscar(this)" type=""><i class="fa fa-search"></i></button>
                                 </div>
                             </div>

                            <div class="container-datos-personales" id="container-datos-personales" style="display: none">
                                <div class="datos_modals">
                                    <label class="etiqueta_modals">Primer nombre</label>
                                    <input class="campos_modals " value="" id="nombre1" type="text"
                                        name="nombre1_pariente">
                                </div>
   
                                <div class="datos_modals">
                                    <label class="etiqueta_modals">Segundo Nombre</label>
                                    <input class="campos_modals " value="" id="nombre2" type="text"
                                        name="nombre2_pariente">
                                </div>
                                <div class="datos_modals">
                                    <label class="etiqueta_modals">Primer Apellido</label>
                                    <input class="campos_modals " value="" id="apellido1" type="text"
                                        name="apellido1_pariente">
                                </div>
   
                                <div class="datos_modals">
                                    <label class="etiqueta_modals">Segundo Apellido</label>
                                    <input class="campos_modals " value="" id="apellido2" type="text"
                                        name="apelldio2_pariente">
                                </div>
   
                                <div class="datos_modals">
                                    <label class="etiqueta_modals">Fecha de Nacimiento</label>

                                    <input type="date" id="fecha_Nacimiento_pariente"   name="fecha_Nacimiento"  value='1999-06-01'>

                                </div>
                                <div class="datos_modals">
                                    <label class="etiqueta_modals">Sexo</label>
                                    <div class="seleccion">
                                        <br>
                                        <div class="sexo_m">
                                            <input class="checkbox" type="radio" name="sexo_id" id="check_male"
                                                value="1" checked>
                                            <label class="checkbox_label">Hombre</label>
                                        </div>
                                        <div class="sexo_f">
                                            <input class="checkbox" type="radio" name="sexo_id" id="check_female"
                                                value="2">
                                            <label class="checkbox_label">Mujer</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="datos_modals2" id="container-tipo-pariente" style="display: none">
                                <label class="etiqueta_modals">Tipo Pariente</label>
                                <input class="campos_modals " value="" id="input_tipo_pariente" type="text"
                                    name="input_tipo_pariente">

                                <label class="etiqueta_modals">Ocupación</label>
                                <input class="campos_modals " value="" id="input_ocupacion_pariente" type="text"
                                    name="input_tipo_pariente">
                            </div>
                             <div class="botones_modal">

                                 <a href="#" class="botonCerrarModal" id="cerrar_modal_pariente"
                                     onclick="closeModal(this)">Regresar
                                 </a>

                                 <input class="botonagregatrabajo" hidden id="btn_continuar_add_persona" type="submit"  onclick="agregarpersona(this)"
                                     value="Continuar">

                                 <input class="botonagregatrabajo"  id="btn_add_pariente" type="submit" hidden onclick="agregarpariente(this)"
                                     value="Agregar">
                             </div>

                         </form>

                     </div>

                 </div>
             </div>

             <script src="{{ asset('js/parientes.js') }}"></script>
