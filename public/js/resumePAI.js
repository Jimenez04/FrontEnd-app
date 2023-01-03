document.addEventListener("DOMContentLoaded", async function () {
    document.getElementById('salud_Como_Impedimento').addEventListener('change', function () {
        document.getElementById('Salud_descipcion').textContent = '';
        selector = document.getElementById('salud_Como_Impedimento');
        if (selector.options[selector.selectedIndex].value == 1) {
            document.getElementById('Salud_descipcion').style.display = "block";
        } else { 
            document.getElementById('Salud_descipcion').style.display = "none";
        }
    });
    
    document.getElementById('curso_actitud_Estudiante').addEventListener('change', function () {
        selector = document.getElementById('curso_actitud_Estudiante');
        document.getElementById('Actitud_En_El_Curso_descripcion').textContent = '';
        if (selector.options[selector.selectedIndex].value == 1) {
            document.getElementById('Actitud_En_El_Curso_descripcion').style.display = "block";
        } else { 
            document.getElementById('Actitud_En_El_Curso_descripcion').style.display = "none";
        }
      });
});

