var archivos = [];
function descargaarchivo(numero_solicitud) { 
    document.getElementById('btn_descarga').style.cssText = 'pointer-events:none; cursor:progress;'; 
    toastr['success']("Estamos preparando sus archivos, espere un momento.");
    fetch(document.getElementById('url').value + 'user/adecuacion/'+numero_solicitud+'/archivos' , {
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
                archivos = data.data;
                download();
                return;
            }
            toastr['error']("Ocurrio un error interno.");
        })
        .catch((error) => {
            console.error('Error:', error);
        });
}

async function download() {
    for (let cont = 0; cont < archivos.length; cont++) {
        iframe = await makeiframe(archivos[cont]);
        console.log(archivos[cont]);
        await sleep(2000).then(() => {
            iframe.remove()
        })
    }
    document.getElementById('btn_descarga').style.cssText = 'pointer-events:auto; cursor:pointer; color:blue;'; 

}
async function makeiframe(archivo) {
      let iframe = document.createElement('iframe');
       iframe.style.visibility = 'collapse';
        
        var linkSource = `data:application/pdf;base64,${archivo.pdf}`;
        var i = document.createElement("a");
        var fileName = archivo.nombre + ".pdf";
        i.href = linkSource;
        i.download = fileName;
            i.click();
        iframe.append(i);
        
         document.body.append(iframe);
    
    return iframe;
}
  

function sleep (time) {
    return new Promise((resolve) => setTimeout(resolve, time));
  }