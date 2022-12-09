var urlapi = document.getElementById("url").value; 
var token = document.getElementById("token").value; 
var cedula_pariente;
var array_parientes = [];

//persona
var nombre1s;
var nombre2 ;
var apellido1;
var apellido2;
var fecha_Nacimiento_pariente;
var sexo_id;



function openModal_NuevoPariente() {
    $('#modal_pariente').fadeIn();
}

function buscar() { 
    cedula_pariente = document.getElementById('cedula_pariente').value;
    if (cedula_pariente.trim() != "" && cedula_pariente.trim() != null && cedula_pariente.trim().length > 8) {
        document.getElementById('btn_buscar').disabled = true;
        busquedaPersona(cedula_pariente);
    } else { 
        alert('Ingrese una cédula valida y mayor a 8 caracteres');
    }
}

function busquedaPersona(cedula_pariente) { 
    fetch(urlapi + 'persona/existe/'+cedula_pariente, {
        method: 'get',
        headers: {
            'Content-Type': 'application/json',
            'Accept' : 'application/json',
            'Authorization' : 'Bearer ' + token,
        }
        })
        .then((response) => response.json())
        .then((data) => {
            estado_btn_campos(data.status);
            if (data.status) {
                alert("Persona encontrada.");
            } else { 
                alert("La persona no existe en el sistema.");
            }
            document.getElementById('btn_buscar').disabled = false;
        })
        .catch((error) => {
            console.error('Error:', error);
        });
}

function estado_btn_campos(estado) { 
    limpiarcampos();
    if (estado) {
        document.getElementById('container-tipo-pariente').setAttribute('Style', 'display:grid');
        document.getElementById('btn_add_pariente').hidden = false;
        document.getElementById('container-datos-personales').setAttribute('Style', 'display:none')
        document.getElementById('btn_continuar_add_persona').hidden = true;
    } else { 
        document.getElementById('container-tipo-pariente').setAttribute('Style', 'display:none');
        document.getElementById('btn_add_pariente').hidden = true;
        document.getElementById('container-datos-personales').setAttribute('Style', 'display:grid')
        document.getElementById('btn_continuar_add_persona').hidden = false;
    }
}

function limpiarcampos() { 
    document.getElementById('nombre1').value = '';
    document.getElementById('nombre2').value = '';
    document.getElementById('apellido1').value = '';
    document.getElementById('apellido2').value = '';
    document.getElementById('input_tipo_pariente').value = '';
    document.getElementById('input_ocupacion_pariente').value = '';
}

function agregarpersona() { 
    document.getElementById('btn_buscar').disabled = true;
    estado_campos = leerdatospersona();
    if (estado_campos && (sexo_id == 1 || sexo_id == 2)) {
        let isValidDate = Date.parse(fecha_Nacimiento_pariente);
            if (isNaN(isValidDate)) {
                return console.log("Not a valid date format.");
        }
            data = { cedula: cedula_pariente, nombre1: nombre1, nombre2: nombre2, apellido1: apellido1, apellido2 : apellido2, fecha_Nacimiento : fecha_Nacimiento_pariente, sexo_id : sexo_id };
                fetch(urlapi + 'persona', {
                    method: 'post',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept' : 'application/json',
                        'Authorization' : 'Bearer ' + token,
                    }, 
                    body: JSON.stringify(data),
                    })
                    .then((response) => response.json())
                    .then((data) => {
                        console.log(data);
                        if (data.status) {
                            limpiarcampos();
                            alert("Agregada correctamente.");
                            estado_btn_campos(true);
                            document.getElementById('btn_buscar').disabled = false;

                        } else { 
                            alert("Error al agregar.");
                            document.getElementById('btn_buscar').disabled = false;

                        }
                    })
                    .catch((error) => {
                    document.getElementById('btn_buscar').disabled = false;

                        console.error('Error:', error);
                    });
    } else { 
        document.getElementById('btn_buscar').disabled = false;
        alert('Verifica los campos.');
    }
}

function leerdatospersona() { 
   nombre1 =  document.getElementById('nombre1').value;
   nombre2 = document.getElementById('nombre2').value;
   apellido1 =  document.getElementById('apellido1').value;
   apellido2 =  document.getElementById('apellido2').value;
   fecha_Nacimiento_pariente = document.getElementById('fecha_Nacimiento_pariente').value;
   sexo_id = participacion = $('input:radio[name=sexo_id]:checked').val();
   
    return validad_datos([nombre1, apellido1, apellido2], 2); 
}

function validad_datos(array, largo) { 
    var validacion = true;
    array.forEach(element => {
        if ((element.trim() == " " || element == null) || element.trim().length < largo) {
            validacion = false;
            console.log(validacion);
        }
        });
    if (!validacion) return false;
    return true;
}

function agregarpariente() { 
    var input_tipo_pariente = document.getElementById('input_tipo_pariente').value;
    var input_ocupacion_pariente = document.getElementById('input_ocupacion_pariente').value;
    var estado = validad_datos([input_tipo_pariente], 2);
    if (estado) {
        if (validad_datos([input_ocupacion_pariente], 3)) {
            array_parientes.push({ tipo: input_tipo_pariente, ocupacion: input_ocupacion_pariente, cedula: cedula_pariente });
            
            tbody = document.getElementById('cuerpotabla');
                var tr = document.createElement('tr');
                        var td_tipoPariente = document.createElement('td');
                        td_tipoPariente.setAttribute('scope','col');
                        td_tipoPariente.appendChild(document.createTextNode(input_tipo_pariente));
                    tr.append(td_tipoPariente);
                        var td_ocupacionPariente = document.createElement('td');
                        td_ocupacionPariente.setAttribute('scope','col');
                        td_ocupacionPariente.appendChild(document.createTextNode(input_ocupacion_pariente));
                    tr.append(td_ocupacionPariente);
                        var td_cedulaPariente = document.createElement('td');
                        td_cedulaPariente.setAttribute('scope','col');
                        td_cedulaPariente.appendChild(document.createTextNode(cedula_pariente));
                    tr.append(td_cedulaPariente);
            tbody.append(tr);

            document.getElementById('cedula_pariente').value = "";
            limpiarcampos();
        } else {
            alert('Verifica los datos');
         }
    } else {
        alert('Verifica los datos');
     }
}