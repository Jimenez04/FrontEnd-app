
            <!---------------------------MODAL Usuario---------------------------->

             <div class="modal" id="modal_usuario">

                <div class="modal_contenido">

                    <div class="modal-header">
                        <a style="cursor: pointer;" id="modal_user_cerrar" onclick="cerrarmodal_user(this)">
                            <i class="fa fa-close" id="cierra_modal"></i>
                        </a>
                        <h2>Información de Estudiante</h2>
                    </div>

                    <div class="modal__body">
                        <form onSubmit="return false;" enctype="multipart/form-data" class="modal__body-form">
                            @csrf
                            <div class="user">
                                <label class="etiqueta_modals" id="modal_cedula_user"></label>
                                <label class="etiqueta_modals" id="modal_carnet_user"></label>
                                <label class="etiqueta_modals" id="modal_nombres_user"></label>
                                <label class="etiqueta_modals" id="modal_apellidos_user"></label>
                            </div>

                        
                            <div class="botones_modal"> 
                                <h2>¿Está seguro que desea eliminar a este usuario?</h2>
                                <a style="cursor: pointer;color:white" class="botonCerrarModal" id="cerrar_modal_pariente"
                                    onclick="cerrarmodal_user(this)">Regresar
                                </a>

                                <input class="btnEliminar, botonCerrarModal, btn btn-danger"  id="btn_Eliminar" type="submit"  
                                    value="Eliminar">
                            </div>

                        </form>

                    </div>

                </div>
            </div>

            <script src="{{ asset('js/parientes.js') }}"></script>
