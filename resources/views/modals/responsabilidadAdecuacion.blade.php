<style>
    #modal_consentimiento{
        display: flex;
        justify-content: center;
        align-content: center;
        align-items: center;
    }
</style>
<div class="modal" id="modal_consentimiento">

    <div class="modal_contenido">

        <div class="modal-header">
            <h2>Consentimiento informado</h2>

            <a style="cursor: pointer;" id="cierra_x" href="{{ url()->previous() }}">
                <i class="fa fa-close" id="cierra_modal"></i>
            </a>
        </div>

        <div class="modal_body">
            <div class="form">
                <div class="modal-body">
                    <p id="info_estudiante">
                        Yo <b>{{$resultado['persona']['nombre1'] . " " . $resultado['persona']['nombre2'] . " " . $resultado['persona']['apellido1'] . " " . $resultado['persona']['apellido2']}}</b>, con cédula <b>{{ $resultado['persona']['cedula']}}</b>, estudiante actual de la Universidad de Costa Rica, sede Guanacaste, con número de carne:  <b>{{ $resultado['persona']['estudiante']['carnet']}}</b>, declaro firmemente, que toda la documentación e información que suministrare será totalmente verídica, así mismo, doy consentimiento a que esta información sea usada y valorada por la Oficina de Orientación de este recinto.
                    </p>
                    

                    <b>Aspectos para considerar</b> 
                    <p style="white-space: pre-line;">
                        -	Todos los campos de este formulario son de carácter obligatorio.
                        -	Se deberá aportar información verídica sobre su persona.
                        -	Adjuntar dictamen médico.
                        -	Adjuntar diagnostico o valoración académica.
                    </p>
                    
                </div>
                <div style="text-align: center">
                    <a style="cursor: pointer; color:white" class="btn btn-secondary botonCerrarModal"
                        href="{{ url()->previous() }}">Cancelar
                    </a>
                    <a style="color:white; font-size:1rem;" class="btn btn-primary" id="btn_consentimiento" onclick="aceptarContinuar()" type="submit"
                        value="Aceptar y continuar">Aceptar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/consentimiento.js') }}"></script>
