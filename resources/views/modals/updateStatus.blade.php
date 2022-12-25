<div class="modal" id="modal_actualizarEstado">

    <div class="modal_contenido">

        <div class="modal-header">
            <h2>Actualizar Estado</h2>

           
            <button class="btn" onclick="closeModalEstado()"><i class="fa fa-close" id="cierra_modal"></i></button>
        </div>

        <div class="modal_body">
            <div class="form">
                <div class="modal-body">
                    
                    <select class="form-select" id="estados_solicitud" aria-label="Default select example" >
                        <option {{ $resultado['revision__solicitud']['estado'] == "Enviado para su revisión" ? 'selected' : ''}}  value="1">Enviado para su revisión</option>
                        <option {{ $resultado['revision__solicitud']['estado'] == "En proceso" ? 'selected' : ''}} value="2">En proceso</option>
                        <option {{ $resultado['revision__solicitud']['estado'] == "Terminado" ? 'selected' : ''}} value="3">Terminado</option>
                        <option {{ $resultado['revision__solicitud']['estado'] == "Rechazado" ? 'selected' : ''}} value="4">Rechazado</option>
                    </select>

                        <div class="input-group" id="container_descripcion_Rechazado" style="display: none">
                                <span class="input-group-text">Descripción de rechazo</span>
                                <textarea class="form-control" name="descripcion_Rechazado" id="descripcion_Rechazado" aria-label="With textarea"></textarea>
                        </div>
                </div>
                <div class="botones_modal">
                    <button class="btn btn-primary" id="btn_cancelar" onclick="closeModalEstado()">Cancelar</button>
                    <button class="btn btn-primary" id="btn_actualizarEstado" onclick="actualizarEstado( '{{$resultado['numero_solicitud']}}' )">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>