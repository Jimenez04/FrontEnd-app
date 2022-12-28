var iditem = '';
var bitacora_Id = '';
var descripcion;
var acciones_realizadas;
var observaciones;
  
function openModalBitacora(id = null, bitacoraId = null) {
    $('#modal_bitacora').fadeIn();
    iditem = id;
    bitacora_Id = bitacoraId;
    document.getElementById('btn_add_OR_Update').value = id != null && bitacoraId!= null  ? "Actualizar" : "Agregar";
    if (id != null && bitacoraId!= null) {
        accion_EditarItem();
        document.querySelector('#btn_add_OR_Update').disabled = true;
        
    }
    limpiarcampos();
}

function closeModalBitacora() { 
    $('#modal_bitacora').fadeOut();
}

function accion_EditarItem() { 
    fetch(document.getElementById('url').value + 'user/estudiante/solicitud/bitacora/'+bitacora_Id+'/item/' + iditem, {
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
                document.getElementById("descripcion").value = data.data.descripcion;
                document.getElementById("acciones_realizadas").value = data.data.acciones_realizadas;
                document.getElementById("observaciones").value = data.data.observaciones;
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
        } 
    }
    document.querySelector('#btn_add_OR_Update').disabled = false;
} 

async function createOrUpdate() { 
    var url;
    var method;
    console.log(bitacora_Id);
    if ( document.getElementById('btn_add_OR_Update').value == "Actualizar" ) {
        url = document.getElementById('url').value + 'user/estudiante/solicitud/bitacora/'+bitacora_Id+'/item/'+iditem+'/editar';
        method = 'PATCH';
    } else {
        url = document.getElementById('url').value + 'user/estudiante/solicitud/bitacora/'+bitacora_Id+'/agregar';
        method = 'POST';
    }
    var data = { descripcion: descripcion, acciones_realizadas: acciones_realizadas, observaciones: observaciones};
    
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
                closeModalBitacora();
                return true;
            } else {
                toastr['error']("Error interno.");
                return false;
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    
}

function limpiarcampos() { 
    document.getElementById('descripcion').value = '';
    document.getElementById('acciones_realizadas').value = '';
    document.getElementById('observaciones').value = '';
}

function verificarcampos() { 
     descripcion = document.getElementById('descripcion').value;
     acciones_realizadas = document.getElementById('acciones_realizadas').value;
     observaciones = document.getElementById('observaciones').value;

    var estado = validad_datos_mensaje([descripcion], 6, "Descripción");
    if (estado['estado'] && isNaN(descripcion)) { 
            estado = validad_datos_mensaje([acciones_realizadas], 6, "Acciones Realizadas");
            if (estado['estado'] && isNaN(acciones_realizadas)) { 
                estado = validad_datos_mensaje([observaciones], 6, "Observación");
                if (estado['estado'] && isNaN(observaciones)) { 
                    return true;
                } else { 
                    toastr['error'](!estado['estado'] ? estado['mensaje'] : "Revisa tu observación");
                    return false;
                }
            } else { 
                toastr['error'](!estado['estado'] ? estado['mensaje'] : "Revisa tus acciones realizadas");
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