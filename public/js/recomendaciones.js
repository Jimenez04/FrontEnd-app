var iditem = '';
var numSolicitud = '';
var descripcion_Recomendacion;
var nombre_Especialista;
  
function openModalRecomendacion(id = null, num_Solicitud = null) {
    $('#modal_recomendaciones').fadeIn();
    iditem = id;
    numSolicitud = num_Solicitud;
    document.getElementById('btn_add_OR_Update').value = id != null && num_Solicitud != null  ? "Actualizar" : "Agregar";
    limpiarcampos();
    if (id != null && num_Solicitud!= null) {
        accion_EditarItem();
        document.querySelector('#btn_add_OR_Update').disabled = true;
    }
}

function closeModalRecomendacion() { 
    $('#modal_recomendaciones').fadeOut();
}

function accion_EditarItem() { 
    fetch(document.getElementById('url').value + 'user/admin/persona/estudiante/adecuacion/'+ numSolicitud +'/recomendacion/'+iditem, {
        method: 'get',
        headers: {
            'Content-Type': 'application/json',
            'Accept' : 'application/json',
            'Authorization' : 'Bearer ' + document.getElementById('token').value,
        }
        })
        .then((response) => response.json())
        .then((data) => {
            if (data.data != null) {
                document.getElementById("descripcion_Recomendacion").value = data.data.descripcion_Recomendacion;
                document.getElementById("nombre_Especialista").value = data.data.nombre_Especialista;
                document.querySelector('#btn_add_OR_Update').disabled = false;
            } else { 
                console.log('Nada que mostrar');
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
}

function continuar() { 
    document.querySelector('#btn_add_OR_Update').disabled = true;
    if (verificarcampos()) { 
        if (createOrUpdate()) {
            limpiarcampos();
            sleep(1500).then(() => {
                window.location.reload();
            });
        } else { 
            console.log('Error interno');
        } 
    }
    document.querySelector('#btn_add_OR_Update').disabled = false;
} 

async function createOrUpdate() { 
    var url;
    var method;
    if ( document.getElementById('btn_add_OR_Update').value == "Actualizar" ) {
        url = document.getElementById('url').value + 'user/admin/persona/estudiante/adecuacion/'+ numSolicitud + '/recomendacion/'+iditem+'/actualizar';
        method = 'PATCH';
    } else {
        url = document.getElementById('url').value + 'user/admin/persona/estudiante/adecuacion/' + numSolicitud + '/recomendacion';
        method = 'POST';
    }
    var data = { descripcion_Recomendacion: descripcion_Recomendacion, nombre_Especialista: nombre_Especialista};
    
   await fetch(url, {
        method: method,
        headers: {
            'Content-Type': 'application/json',
            'Accept' : 'application/json',
            'Authorization': 'Bearer ' + document.getElementById('token').value,
        },
        body: JSON.stringify(data),
    })           
        .then((response) => response.json())
       .then((data) => {
            if (data.status) {
                toastr['success'](method == "POST" ? "Entrada creada correctamente" : "Entrada actualizada correctamente.");
                closeModalRecomendacion();
                return true;
            } else {
                toastr['error']("Error interno.");
                return false;
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
        return false;
}

function limpiarcampos() { 
    document.getElementById('descripcion_Recomendacion').value = '';
    document.getElementById('nombre_Especialista').value = '';
}

function verificarcampos() { 
    descripcion_Recomendacion = document.getElementById('descripcion_Recomendacion').value;
    nombre_Especialista = document.getElementById('nombre_Especialista').value;

    var estado = validad_datos_mensaje([descripcion_Recomendacion], 6, "Descripción");
    if (estado['estado'] && isNaN(descripcion_Recomendacion) ) { 
            estado = validad_datos_mensaje([nombre_Especialista], 6, "Nombre del especialista");
            if (estado['estado'] && isNaN(nombre_Especialista) && nombre_Especialista.length < 54) { 
                    return true;
            } else { 
                toastr['error'](!estado['estado'] ? estado['mensaje'] : "Revisa el nombre del especialista, debe ser menor a 54 caracteres");
                return false;
            }
    } else { 
        toastr['error'](!estado['estado'] ? estado['mensaje'] : "Revisa tu descripción");
        return false;
    }
}

function validad_datos_mensaje(array, min, nombrevariable) { 
    var validacion = true;
    array.forEach(element => {
        if ((element.trim() == " " || element == null) || element.trim().length < min ) {
            validacion = false;
        }
        });
    if (!validacion) return { estado: false, mensaje: "El campo '" + nombrevariable + "' debe tener al menos " + min + " caracteres"};
    return { estado : true};
}

function sleep (time) {
    return new Promise((resolve) => setTimeout(resolve, time));
  }