

var urlapi = document.getElementById("url").value; 
var token = document.getElementById("token").value; 
                    
function openModal_Trabajo() {
    $('#modal_trabajo').fadeIn();
    consultartrabajos();
  }

function consultartrabajos(){
          fetch(urlapi + 'user/trabajo', {
              method: 'get',
              headers: {
                  'Content-Type': 'application/json',
                  'Accept' : 'application/json',
                  'Authorization' : 'Bearer ' + token,
              }
              })
              .then((response) => response.json())
              .then((data) => {
                  console.log();
                  if (data.data != null) {
                      document.getElementById("actividad_Que_Desempena").value = data.data.actividad_Que_Desempena;
                      document.getElementById("lugar_De_Trabajo").value = data.data.lugar_De_Trabajo;
                      document.getElementById("horario_Laboral").value = data.data.horario_Laboral;
                      document.getElementById("id_trabajo").value = data.data.id;
                      document.getElementById("btn_add_job").value = "Actualizar";
                  } else { 
                      console.log('Nada que mostrar');
                  }

              })
              .catch((error) => {
                  console.error('Error:', error);
              });
}

function delete_job() { 
    var id_trabajo = document.getElementById("id_trabajo").value;
    if (id_trabajo > 0) {
        fetch(urlapi + 'user/eliminar/trabajo/' + id_trabajo, {
            method: 'delete',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token,
            },
        })
           
            .then((response) => response.json())
            .then((data) => {
                if (data) {
                    toastr['success']("Trabajo eliminado");
                    document.getElementById("id_trabajo").value = "";
                    document.getElementById("actividad_Que_Desempena").value = "";
                    document.getElementById("lugar_De_Trabajo").value = "";
                    document.getElementById("horario_Laboral").value = "";
                    $('#modal_trabajo').fadeOut();
                    document.getElementById("btn_add_job").value = "Agregar";
                    
                } else {
                    alert("Error");
                    toastr['error']("Error interno" );
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    } else {
        toastr['info']("No tiene ningún trabajo");
     }
}

async function addjob() {
var btn_form = document.getElementById("btn_add_job").value;
var actividad_Que_Desempena = document.getElementById("actividad_Que_Desempena").value;
var lugar_De_Trabajo = document.getElementById("lugar_De_Trabajo").value;
var horario_Laboral = document.getElementById("horario_Laboral").value;
var id_trabajo = document.getElementById("id_trabajo").value;
var url;
var method;
var data = ""; 
    var cedula = document.getElementById("cedula").value;
    
    var estado = validad_datos_mensaje([actividad_Que_Desempena], 4, "Actividad que desempeña");
    if (estado['estado'] && actividad_Que_Desempena.length < 80 && isNaN(actividad_Que_Desempena)) {

        estado = validad_datos_mensaje([lugar_De_Trabajo], 4, "Lugar De Trabajo");
        if (estado['estado'] && lugar_De_Trabajo.length < 40 && isNaN(lugar_De_Trabajo)) {
            estado = validad_datos_mensaje([horario_Laboral], 4, "Horario Laboral");
            if (estado['estado'] && horario_Laboral.length < 50 && isNaN(horario_Laboral)) {
                if (btn_form == 'Actualizar') {
                    url = urlapi + 'user/editar/trabajo';
                    method = 'PATCH';
                    data = { cedula: cedula, id: id_trabajo, actividad_Que_Desempena: actividad_Que_Desempena, lugar_De_Trabajo: lugar_De_Trabajo, horario_Laboral: horario_Laboral };
                } else {
                    url = urlapi + 'user/trabajo/agregar'
                    data = { cedula: cedula, actividad_Que_Desempena: actividad_Que_Desempena, lugar_De_Trabajo: lugar_De_Trabajo, horario_Laboral: horario_Laboral };
                    method = 'POST';
                }
                //verificar campos
                fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': 'Bearer ' + token,
                    },
                    body: JSON.stringify(data),
                })
                        
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.status) {
                            toastr['success'](method == "POST" ? "Creado correctamente" : "Actualizado correctamente.");
                            $('#modal_trabajo').fadeOut();
                        } else {
                            toastr['error']("Error interno");
                        }
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                    });
            } else { 
                toastr['error']( !estado['estado'] ? estado['mensaje'] :  "Revisa el campo horario laboral,  debe tener al menos 4 caracteres");
            }
        } else { 
            toastr['error']( !estado['estado'] ? estado['mensaje'] :  "Revisa el campo lugar de trabajo,  debe tener al menos 4 caracteres");
        }
    } else { 
        toastr['error']( !estado['estado'] ? estado['mensaje'] :  "Revisa tu actividad que desempeñas,  debe tener al menos 4 caracteres");
    }
}

function validad_datos_mensaje(array, largo, nombrevariable) { 
    var validacion = true;
    array.forEach(element => {
        if ((element.trim() == " " || element == null) || element.trim().length < largo) {
            validacion = false;
        }
        });
    if (!validacion) return { estado: false, mensaje: "El campo '" + nombrevariable + "' debe tener al menos " + largo + " caracteres"};
    return { estado : true};
}