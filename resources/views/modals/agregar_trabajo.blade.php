             <!---------------------------MODAL TRABAJO---------------------------->

             <div class="modal" id="modal_trabajo">

                 <div class="modal_contenido">

                     <div class="modal-header">
                         <h2>Trabajo</h2>

                         <a href="#" id="modal_trabajo_cierra" onclick="closeModal(this)">
                             <i class="fa fa-close" id="cierra_modal"></i>
                         </a>
                     </div>

                     <div class="modal_body">
        
                         <form {{-- action="{{ route('Nuevo_Trabajo') }}" --}} action="javascript:addjob(this)" method="post" enctype="multipart/form-data"
                             class="form_trabajo">
                             @csrf
                             <input type="hidden" name="cedula" value="">
                             
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

                                 <a href="#" class="botonCerrarModal" id="cerrar_modal_trabajo"
                                     onclick="closeModal(this)">Regresar
                                 </a>
                                 <input class="botonagregatrabajo"  type="submit" value="Agregar">
                             </div>
                             <input type="hidden" name="" id="url" value="{{env('API_URL')}}">
                             <input type="hidden" name="" id="token" value="{{session('token')}}">
                            </form>
   
                        </div>
   
                    </div>
                </div>
   
                <script>
                   async function addjob(){
                    //verificar campos
                       const urlapi = document.getElementById("url").value; 
                       const token = document.getElementById("token").value; 
                       const actividad_Que_Desempena = document.getElementById("actividad_Que_Desempena").value;
                       const lugar_De_Trabajo = document.getElementById("lugar_De_Trabajo").value;
                       const horario_Laboral = document.getElementById("horario_Laboral").value;
                       const data = { actividad_Que_Desempena: actividad_Que_Desempena , lugar_De_Trabajo: lugar_De_Trabajo, horario_Laboral: horario_Laboral  };
                        fetch(urlapi + 'user/trabajo/agregar', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept' : 'application/json',
                                'Authorization' : 'Bearer ' + token,
                            },
                            body: JSON.stringify(data),
                            })
                           
                            .then((response) => response.json())
                            .then((data) => {
                                console.log('Success:', data);
                                $('#modal_trabajo').fadeOut();
                            })
                            .catch((error) => {
                                console.error('Error:', error);
                            });
                    }

             </script>
