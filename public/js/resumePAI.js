document.addEventListener("DOMContentLoaded", async function () {
    selector = document.getElementById('salud_Como_Impedimento');
    if (selector.options[selector.selectedIndex].value == 1) {
        document.getElementById('Salud_descipcion').style.display = "block";
    }
    selector = document.getElementById('curso_actitud_Estudiante');
    if (selector.options[selector.selectedIndex].value == 1) {
        document.getElementById('Actitud_En_El_Curso_descripcion').style.display = "block";
    } 

    document.getElementById('salud_Como_Impedimento').addEventListener('change', function () {
        selector = document.getElementById('salud_Como_Impedimento');
        if (selector.options[selector.selectedIndex].value == 1) {
            document.getElementById('Salud_descipcion').textContent = '';
            document.getElementById('Salud_descipcion').style.display = "block";
        } else { 
            document.getElementById('Salud_descipcion').style.display = "none";
            document.getElementById('Salud_descipcion').textContent = 'No indica';
        }
    });
    
    document.getElementById('curso_actitud_Estudiante').addEventListener('change', function () {
        selector = document.getElementById('curso_actitud_Estudiante');
        if (selector.options[selector.selectedIndex].value == 1) {
            document.getElementById('Actitud_En_El_Curso_descripcion').textContent = '';
            document.getElementById('Actitud_En_El_Curso_descripcion').style.display = "block";
        } else { 
            document.getElementById('Actitud_En_El_Curso_descripcion').style.display = "none";
            document.getElementById('Actitud_En_El_Curso_descripcion').textContent = 'No indica';
        }
      });
});

