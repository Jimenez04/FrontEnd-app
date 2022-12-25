var urlapi  = '';
var token  = '';
var selector = null;

document.addEventListener("DOMContentLoaded", async function () {
    selector = null;
    urlapi = document.getElementById("url").value; 
    token = document.getElementById("token").value; 
    document.getElementById('estados_solicitud').addEventListener('change', function () {
        selector = document.getElementById('estados_solicitud');
        if (selector.options[selector.selectedIndex].value == 4 ) { 
            document.getElementById('container_descripcion_Rechazado').value = '';
            document.getElementById('container_descripcion_Rechazado').style.display = 'flex';
            return;
        }
        document.getElementById('container_descripcion_Rechazado').style.display = 'none';
      });
});

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
    });
    if (selector.options[selector.selectedIndex].value == 4) {
        var mensajeRechazo = document.getElementById('descripcion_Rechazado').value;
        if (mensajeRechazo.trim() == "" || mensajeRechazo.trim() == null || mensajeRechazo.trim().length < 6) {
            toastr['warning']("Ingrese un mensaje de rechazo valido y mayor a 6 caracteres.");
            return;
        }
    } else { 
        delete datos.descripcion_Rechazado;
    }
    await fetch(urlapi + 'user/admin/persona/estudiante/adecuacion/'+numero_solicitud+'/estado/actualizar', {
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
                toastr['success'](data.message);
                td = document.getElementById('columna_estado');
                td.innerHTML = selector.options[selector.selectedIndex].textContent;
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

