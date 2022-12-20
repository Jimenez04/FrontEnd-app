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


            <form  action="javascript:agregarBeca(this)" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form_beca">
                    <div class="contenido_beca_modal">

                        <label class="etiqueta_modals">Número</label>
                        <input class="campos_modals " value="" id="numero" type="text" name="nombre1_pariente">

                        <table>
                            
                        </table>

                    </div>
                    <div class="botones_modal">

                        <a style="cursor: pointer; color:white" class="botonCerrarModal" id="cerrar_modal_beca"
                            onclick="cerrarModal_Contacto(this)">Regresar
                        </a>
                        <input class="botonagregatrabajo" id="btn_beca" type="submit" value="Agregar">
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>
<script src="{{ asset('js/beca.js') }}"></script>
