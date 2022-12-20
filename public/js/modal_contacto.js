function openModal_Contacto() {
  $('#modal_contacto').fadeIn();
  // limpiarcampos();
    consultar_telefonos();
}
function cerrarModal_Contacto() {
  $('#modal_contacto').fadeOut();
}

  
  //admin/persona/obtener-telefono/{cedula}

  function consultar_telefonos(){
    fetch(urlapi + 'user/obtener-telefono', {
        method: 'get',
        headers: {
            'Content-Type': 'application/json',
            'Accept' : 'application/json',
            'Authorization' : 'Bearer ' + token,
        }
        })
        .then((response) => response.json())
        .then((data) => {
            // if (data.data != null) {
            //     document.getElementById("actividad_Que_Desempena").value = data.data.actividad_Que_Desempena;
            //     document.getElementById("lugar_De_Trabajo").value = data.data.lugar_De_Trabajo;
            //     document.getElementById("horario_Laboral").value = data.data.horario_Laboral;
            //     document.getElementById("id_trabajo").value = data.data.id;
            //     document.getElementById("btn_add_job").value = "Actualizar";
            // } else { 
            //     console.log('Nada que mostrar');
            // }
          console.log();
        })
        .catch((error) => {
            console.error('Error:', error);
        });
}