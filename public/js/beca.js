var urlapi = document.getElementById("url").value; 
var token = document.getElementById("token").value; 
const carnet = document.getElementById("carnet").value;
var categoria_Beca;
var asistencia_Socioeconomica;
var participacion;
var tienebeca;
                    
function openModal_Beca() {
    $('#modal_beca').fadeIn();
    tienebeca = 0;
    consultarBeca();
  }

  function mostrar_inputbeca(beca) {
      if (beca == "1") {
      tienebeca = 1;
      document.getElementById("tipo_beca").style.display = "flex";
    }
      if (beca == "0") {
        tienebeca = 0;
      document.getElementById("tipo_beca").style.display = "none";
    }
  }

function resetear(categoria, tipo) { 
    document.getElementById("categoria_beca").style.display = categoria;
    document.getElementById("tipo_beca").style.display = tipo;
}

function actualizardatos_html(data) { 
    console.log(data)
    resetear('none', 'none');
    if (data.asistencia_Socioeconomica == 0 && data.participacion == 0 ) {
        document.getElementById("check_no_becado").checked = true;
        document.getElementById("check_no_becasocio").checked = true;
        document.getElementById("check_beca_participacion_null").checked = true;
    } else { 
        if (data.asistencia_Socioeconomica == 1 && data.participacion == 1) {
            document.getElementById("check_becasocio").checked = true;
            document.getElementById("check_beca_participacion").checked = true;
            beca_socioeconomica(1);
            resetear('flex', 'flex');
            categoriabecaSocio(data.categoria_Beca);
        } else if (data.asistencia_Socioeconomica == 1 && data.participacion == 0) { 
            document.getElementById("check_becasocio").checked = true;
            document.getElementById("check_beca_participacion_null").checked = true;
            beca_socioeconomica(1);
            resetear('flex', 'flex');
            categoriabecaSocio(data.categoria_Beca);
        } else if (data.asistencia_Socioeconomica == 0 && data.participacion == 1) { 
            document.getElementById("check_no_becasocio").checked = true;
            document.getElementById("check_beca_participacion").checked = true;
            beca_socioeconomica(0);
            resetear('none', 'flex');
        } 
        document.getElementById("check_becado").checked = true;
    } 
}

function categoriabecaSocio(categoria) { 
    document.getElementById('check_categoria_beca_socioeconomica' + categoria).checked = true;
}

function consultarBeca() {
          fetch(urlapi + 'user/persona/beca/estudiante', {
              method: 'get',
              headers: {
                  'Content-Type': 'application/json',
                  'Accept' : 'application/json',
                  'Authorization' : 'Bearer ' + token,
              }
              })
              .then((response) => response.json())
              .then((data) => {
                  if (data.status) {
                      if (data.data != null) { 
                          document.getElementById("btn_beca").value = "Actualizar";
                          actualizardatos_html(data.data);
                      }
                  } else { 
                      actualizardatos_html(data.data);
                      console.log('Nada que mostrar');
                  }

              })
              .catch((error) => {
                  console.error('Error:', error);
              });
}

async function agregarBeca() {
    var btn_form = document.getElementById("btn_beca").value;
    var url;
    var method;
    var data = ""; 

    if (verificarcampos()) {
        if (btn_form == 'Actualizar') {
            url = urlapi + 'usuario/persona/estudiante/beca/actualizar';
            method = 'PATCH';
            data = { carnet: carnet, categoria_Beca: categoria_Beca, asistencia_Socioeconomica: asistencia_Socioeconomica, participacion: participacion };
        } else {
            url = urlapi + 'user/persona/estudiante/beca/agregar';
            data = { categoria_Beca: categoria_Beca, asistencia_Socioeconomica: asistencia_Socioeconomica, participacion: participacion };
            method = 'POST';
        }
        //verificar campos
        fetch(url, {
            method: method,
            headers: {
                'Content-Type': 'application/json',
                'Accept' : 'application/json',
                'Authorization': 'Bearer ' + token,
            },
            body: JSON.stringify(data),
        })
                               
            .then((response) => response.json())
            .then((data) => {
                if (data.status) {
                    alert("Actualizado o creado correctamente.");
                    $('#modal_beca').fadeOut();
                } else {
                    alert("Error");
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    } else { 
        alert("Verifique los campos");
    }
}

function verificarcampos() { 
    leerdatos();
    if (tienebeca == 0) { 
        categoria_Beca = 0;
        participacion = 0;
        asistencia_Socioeconomica = 0;
        return true;
    } else if (tienebeca == 1) { 
        console.log(categoria_Beca);
        console.log(asistencia_Socioeconomica);
        console.log(participacion);
        if (((categoria_Beca > 0 && asistencia_Socioeconomica == 1) || (categoria_Beca == 0 && asistencia_Socioeconomica == 0)) && participacion >= 0 ) { 
            if (categoria_Beca == 0 &&  asistencia_Socioeconomica == 0 && participacion == 0 && categoria_Beca==0) {
                return false;
            }
            return true;
        } 
    }
    return false;
}
function leerdatos() {
    tienebeca =  $('input:radio[name=seleccion_beca]:checked').val();
    categoria_Beca = $('input:radio[name=seleccion_categoría_beca_socioeconomica]:checked').val();
    participacion = $('input:radio[name=seleccion_beca_participacion]:checked').val();
    asistencia_Socioeconomica = $('input:radio[name=seleccion_beca_socio]:checked').val();
    if (asistencia_Socioeconomica == 0) { 
        categoria_Beca = 0;
    }
 }
//
function beca_socioeconomica(beca_socioeconomica) {
    if (beca_socioeconomica == "1") {
        document.getElementById("categoria_beca").style.display = "flex";
    }
    if (beca_socioeconomica == "0") {
        document.getElementById("categoria_beca").style.display = "none";
    }
}
  
function categoria_beca(categoria) {
    categoria_Beca = categoria;
  }
  
function beca_participacion(beca_participacion) {
    participacion = beca_participacion;
}