var urlapi  = '';
var token  = '';
var selector = null;

document.addEventListener("DOMContentLoaded", async function () {
    selector = null;
    urlapi = document.getElementById("url").value; 
    token = document.getElementById("token").value; 
    document.getElementById('estados_solicitud').addEventListener('change', function () {
        selector = document.getElementById('estados_solicitud');
        estadosTextArea(selector);
    });
    selector = document.getElementById('estados_solicitud');
    estadosTextArea(selector);
});

function estadosTextArea(selector) { 
    document.getElementById('mensaje').value = '';
    document.getElementById('descripcion_Rechazado').value = '';
    if (selector.options[selector.selectedIndex].value == 4) {
        document.getElementById('container_descripcion_Rechazado').style.display = 'flex';
        document.getElementById('container_mensaje').style.display = 'none';
        return;
    } else { 
        document.getElementById('container_mensaje').style.display = 'flex';
        document.getElementById('container_descripcion_Rechazado').style.display = 'none';
    }
}

function OpenModalEstado(estado) {
    if (estado != 'Rechazado' ) { 
        $("#modal_actualizarEstado").fadeIn();
        return;
    }
    toastr['error']('Esta solicitud ya no puede editarse');
}

function closeModalEstado() {
    $("#modal_actualizarEstado").fadeOut();
}

async function actualizarEstado(numero_solicitud) { 
    document.getElementById('btn_actualizarEstado').style.cssText = 'display:none !important;';
    document.getElementById('btn_cancelar').style.cssText = 'display:none !important;';
    if (selector == null) { 
        toastr['error']("Nada que actualizar");
        return;
    }
    datos = ({
        nuevo_Estado: selector.options[selector.selectedIndex].value,
        descripcion_Rechazado: document.getElementById('descripcion_Rechazado').value,
        mensaje : document.getElementById('mensaje').value
    });
    if (selector.options[selector.selectedIndex].value == 4) {
        var mensajeRechazo = document.getElementById('descripcion_Rechazado').value;
        if (mensajeRechazo.trim() == "" || mensajeRechazo.trim() == null || mensajeRechazo.trim().length < 6) {
            toastr['warning']("Ingrese un mensaje de rechazo valido y mayor a 6 caracteres.");
            document.getElementById('btn_actualizarEstado').style.cssText = 'display:block !important;';
            document.getElementById('btn_cancelar').style.cssText = 'display:block !important;';
            return;
        }
        delete datos.mensaje;
    } else { 
        delete datos.descripcion_Rechazado;
    }
    await fetch(urlapi + 'user/admin/persona/estudiante/pai/'+numero_solicitud+'/estado/actualizar', { 
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + token,
        },
        body: JSON.stringify(datos),
    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            if (data.status) {
                document.getElementById('mensaje').value = '';
                document.getElementById('descripcion_Rechazado').value = '';
                toastr['success'](data.message);
                document.getElementById('estado').textContent = selector.options[selector.selectedIndex].textContent;
                closeModalEstado();
            } else {
                toastr['error'](data.message);
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    document.getElementById('btn_actualizarEstado').style.cssText = 'display:inline-block !important;';
    document.getElementById('btn_cancelar').style.cssText = 'display:inline-block !important;';
    return;
}

