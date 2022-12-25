
document.addEventListener("DOMContentLoaded", async function(){
    document.getElementById('btn_Siguiente').style.display = "none";
});

function buscarestudiante() { 
    var cedulaEstudiante = document.getElementById('cedula').value;
    if (cedulaEstudiante.trim() != "" && cedulaEstudiante.trim() != null && cedulaEstudiante.trim().length > 8) {
        verificarEstudiante(cedulaEstudiante);
    } else { 
        toastr['warning']("Ingrese una cédula valida y mayor a 8 caracteres");
    }
}

function verificarEstudiante(cedulaEstudiante) { 
    fetch(urlapi + 'admin/estudiante/existe/'+ cedulaEstudiante , {
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
                toastr['success']("Estudiante encontrado.");
                document.getElementById('cedula').readOnly = true;
                document.getElementById('btn_buscar_estudiane').readOnly = true;
                terminosycondiciones = true;
                document.getElementById('btn_Siguiente').style.display = "block";
            } else { 
                toastr['info']("El estudiante no existe en el sistema.");
                terminosycondiciones = false;
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
}