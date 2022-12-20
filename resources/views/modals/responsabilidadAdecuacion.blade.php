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
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium nemo autem esse blanditiis
                    optio commodi veritatis fugit temporibus, quas laudantium rem ea, at perspiciatis molestiae,
                    asperiores officiis? Iure, cumque facilis?
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias quisquam cupiditate delectus nulla
                    mollitia, culpa quod, modi, suscipit exercitationem ipsam obcaecati quaerat deleniti dolor doloribus
                    dolore voluptatum ad in! Quasi!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Error id, dignissimos sed ratione quod nisi
                    debitis voluptate quisquam veritatis dicta pariatur est tenetur quis qui porro totam! Maxime,
                    repellat voluptatem?
                </div>
                <div class="botones_modal btn btn-secondary">
                    <a style="cursor: pointer; color:white" class="botonCerrarModal"
                        href="{{ url()->previous() }}">Cancelar
                    </a>
                    <a class="btn btn-primary" id="btn_consentimiento" onclick="aceptarContinuar()" type="submit"
                        value="Aceptar y continuar">Aceptar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/consentimiento.js') }}"></script>
