var array_numeros = [];

function openModal_Contacto() {
  $('#modal_contacto').fadeIn();
  // limpiarcampos();
    consultar_telefonos();
}
function cerrarModal_Contacto() {
  $('#modal_contacto').fadeOut();
}
  
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
            if (data.success) {
              rellenarTablaContacto(data.data);
              return;
            } 
          toastr['warning']("Error interno");
        })
        .catch((error) => {
            console.error('Error:', error);
        });
  }

  async function agregartelefono() {
    var numero = document.getElementById("numero").value;
    if (numero.length > 5 && numero.length < 40 && !isNaN(numero)) {
      var cedula = document.getElementById("cedula").value;
      url = urlapi + 'user/telefono/agregar'
      data = { cedula: cedula, numero: numero };
      method = 'POST';
      fetch(url, {
        method: method,
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'Authorization': 'Bearer ' + token,
        },
        body: JSON.stringify(data),
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.status) {
            toastr['success'](data.Message);
            document.getElementById("numero").value = "";
            consultar_telefonos();
            return;
          } else {
            toastr['info'](data.error);
            return;
          }
        })
        .catch((error) => {
          console.error('Error:', error);
        });
    } else { 
      toastr['error']("Digite un número valido, de entre 6 a 20 dígitos");
      return;
    }
        
    }

  function rellenarTablaContacto(listanumeros) { 
    tbody = document.getElementById('cuerpo_tabla');
    while (tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
    }
    listanumeros.forEach(numero => {
    var tr = document.createElement('tr');
            var td = document.createElement('td');
            td.setAttribute('scope','col');
            td.appendChild(document.createTextNode(numero['numero']));
        tr.append(td);
        var accion = document.createElement('a');
            accion.setAttribute('onclick', 'eliminartelefono('   +  numero['id']   +  ')'); 
            accion.setAttribute('title', 'Click para eliminar');
            accion.classList.add('btn_eliminar');
            accion.textContent = 'Eliminar';
            accion.style.cssText = 'cursor:pointer';  
        var td_accion = document.createElement('td');
            td_accion.setAttribute('scope','col');
            td_accion.appendChild(accion);
        tr.append(td_accion);
tbody.append(tr);
});
  }

  function eliminartelefono(id) { 
    fetch(urlapi + 'user/eliminar/telefono/' + id, {
      method: 'delete',
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
          consultar_telefonos();
          return;
        } else { 
          toastr['info'](data.error);
          return;
        } 
        toastr['warning']("Error interno");
        return;
      })
      .catch((error) => {
          console.error('Error:', error);
      });
}