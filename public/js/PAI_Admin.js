document.addEventListener("DOMContentLoaded", async function () {
    document.getElementById('nombre_Estudiante').textContent = '';
    document.getElementById('carnet_Estudiante').textContent = '';
    document.getElementById('btn_continuar').disabled = true;
});

function buscarestudiante() { 
    document.getElementById('btn_continuar').disabled = true;
    var cedulaEstudiante = document.getElementById('cedula').value;
    if (cedulaEstudiante.trim() != "" && cedulaEstudiante.trim() != null && cedulaEstudiante.trim().length > 8) {
        verificarEstudiante(cedulaEstudiante);
    } else { 
        toastr['warning']("Ingrese una cédula valida y mayor a 8 caracteres");
    }
}

function verificarEstudiante(cedulaEstudiante) { 
    document.getElementById('nombre_Estudiante').textContent = '';
    document.getElementById('carnet_Estudiante').textContent = '';
    fetch(document.getElementById('url').value + 'admin/estudiante/existe/'+ cedulaEstudiante , {
        method: 'get',
        headers: {
            'Content-Type': 'application/json',
            'Accept' : 'application/json',
            'Authorization' : 'Bearer ' + document.getElementById('token').value,
        }
        })
        .then((response) => response.json())
        .then((data) => {
            if (data.status) {
                toastr['success']("Estudiante encontrado.");
                document.getElementById('cedula').readOnly = true;
                document.getElementById('btn_continuar').disabled = false;
                document.getElementById('btn_buscar_estudiane').disabled = true;
                document.getElementById('nombre_Estudiante').textContent = data.data.nombre;
                document.getElementById('carnet_Estudiante').textContent = data.data.carnet;
            } else { 
                toastr['info']("El estudiante no existe en el sistema.");
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
}