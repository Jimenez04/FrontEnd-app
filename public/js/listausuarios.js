function bajaUsuario(object) { 
    toastr['info']("Realizando acción", 'Un momento');
    fetch(urlapi + 'user/revoke/'+object.value, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'Accept' : 'application/json',
            'Authorization' : 'Bearer ' + token,
        }
        })
        .then((response) => response.json())
        .then((data) => {
            if (data.message == "La acción se realizo con éxito ") { 
                button = document.getElementById(object.value);
                button.innerHTML = "Validar";
                button.setAttribute('onclick','verificarUsuario(this);');
            }
            toastr['success'](data.message);
        })
        .catch((error) => {
            console.error('Error:', error);
        });
}
function verificarUsuario(object) { 
    toastr['info']("Realizando acción", 'Un momento');
    fetch(urlapi + 'user/validar/'+object.value, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'Accept' : 'application/json',
            'Authorization' : 'Bearer ' + token,
        }
        })
        .then((response) => response.json())
        .then((data) => {
            if (data.message == "El usuario ha sido verificado con éxito ") { 
                button = document.getElementById(object.value);
                button.innerHTML = "Anular";
                button.setAttribute('onclick','bajaUsuario(this);');
            }
                toastr['success'](data.message);
        })
        .catch((error) => {
            console.error('Error:', error);
        });
}
function eliminarUsuario(id, carnet) { 
    toastr['info']("Realizando acción", 'Un momento');

    

    fetch(urlapi + 'user/persona/estudiante/'+carnet, {
        method: 'get',
        headers: {
            'Content-Type': 'application/json',
            'Accept' : 'application/json',
            'Authorization' : 'Bearer ' + token,
        }
        })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) { 
                toastr['success'](data.message);
                $('#modal_usuario').fadeIn();
                document.getElementById('modal_cedula_user').textContent = "Cédula: " + data.data.persona.cedula;
                document.getElementById('modal_carnet_user').textContent = "Carnet: " + data.data.carnet;
                document.getElementById('modal_nombres_user').textContent = "Nombre: " + data.data.persona.nombre1 + " " + data.data.persona.nombre2;
                document.getElementById('modal_apellidos_user').textContent = "Apellidos: " + data.data.persona.apellido1 + " " + data.data.persona.apellido2;
                document.getElementById('btn_Eliminar').setAttribute('onclick', "confirmar_eliminar(" + carnet +","+id+")");
                
                return;
            }
            toastr['error']("Error interno");
        })
        .catch((error) => {
            console.error('Error:', error);
        });
}

function confirmar_eliminar(carnet ,id) { 
    fetch(urlapi + 'user/delete/'+ id, {
        method: 'delete',
        headers: {
            'Content-Type': 'application/json',
            'Accept' : 'application/json',
            'Authorization' : 'Bearer ' + token,
        }
        })
        .then((response) => response.json())
        .then((data) => {
            if (data.message == "Eliminado con exito") {
                toastr['success'](data.message);
                $(document.getElementById(carnet)).closest('tr').remove();
                $('#modal_usuario').fadeOut();
                limpiarmodal();
                return;
            }
            toastr['success'](data.message);
            return;
        })
        .catch((error) => {
            console.error('Error:', error);
            toastr['error']("Error interno");
        });

}

function cerrarmodal_user() { 
    $('#modal_usuario').fadeOut();
}

function limpiarmodal(){ 
    document.getElementById('modal_cedula_user').textContent = "";
    document.getElementById('modal_carnet_user').textContent =  "";
    document.getElementById('modal_nombres_user').textContent =  "";
    document.getElementById('modal_apellidos_user').textContent =  "";
    document.getElementById('btn_Eliminar').setAttribute('onclick', "");
}

function ir_usuario(user_carnet) { 
    window.location.href = route('ver_usuario',user_carnet);
}