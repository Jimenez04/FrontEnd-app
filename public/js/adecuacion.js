var contador = 1;
//Listas
var info_Solicitud;


function siguiente() { 
    contador++;
    accion_btn_atras();
    accion_btn_siguiente();
    cambio_Ventanas(); 
}

function accion_btn_atras() { 
    if (contador > 1) {
        document.getElementById('btn_atras').hidden = false;
        document.getElementById('Cancelar').hidden = true;
    } else { 
        document.getElementById('btn_atras').hidden = true;
        document.getElementById('Cancelar').hidden = false;
    }
}
function accion_btn_siguiente() { 
    if (contador < 3) {
        document.getElementById('btn_Siguiente').hidden = false;
        document.getElementById('Siguiente').hidden = true;
    } else { 
        document.getElementById('btn_Siguiente').hidden = true;
        document.getElementById('Siguiente').hidden = false;
    }
}

function atras() { 
    contador--;
    accion_btn_atras();
    accion_btn_siguiente();
    cambio_Ventanas();
}

async function removerhijos() {
    var cuerpohtml =  document.getElementById('form_contenedor');
        try {
            while (cuerpohtml.firstChild) {
                cuerpohtml.removeChild(cuerpohtml.firstChild);
            }
        } catch (error) {
            console.log(error);
        }
}

document.addEventListener("DOMContentLoaded", async function(){
    cambio_Ventanas();
});


function cambio_Ventanas() { 
    removerhijos();
    switch (contador) {
        case 1:
            ventana_InfoSolicitud();
            break;
        case 2:
            break;
        case 3:
            
            break;
        case 4:
            
            break;
        case 5:
            
            break;
        case 6:
            
            break;
        case 7:
            
            break;
    
        default:
            break;
    }
}

function ventana_InfoSolicitud() { 
    var cuerpohtml = document.getElementById('form_contenedor');
    var contenido_nueva_adecuacion = document.createElement('div');
    contenido_nueva_adecuacion.classList.add('contenido_nueva_adecuacion');
    //Input Razon solicitud
        var datos_adecuacion = document.createElement('div');
        datos_adecuacion.classList.add('datos_adecuacion');
            var etiqueta_solicitud_adecuacion = document.createElement('label');
            etiqueta_solicitud_adecuacion.textContent = "Razon solicitud";
            etiqueta_solicitud_adecuacion.classList.add('etiqueta_solicitud_adecuacion');
            datos_adecuacion.append(etiqueta_solicitud_adecuacion); 
            var campos_adecuacion = document.createElement('input');
            campos_adecuacion.setAttribute('id', 'input_RazonSolicitud');
            campos_adecuacion.type = "text"
            campos_adecuacion.classList.add('campos_adecuacion');
            datos_adecuacion.append(campos_adecuacion); 
        contenido_nueva_adecuacion.append(datos_adecuacion); 
    //Input Carrera Empradronada
        var datos_adecuacion = document.createElement('div');
        datos_adecuacion.classList.add('datos_adecuacion');
            var etiqueta_solicitud_adecuacion = document.createElement('label');
            etiqueta_solicitud_adecuacion.textContent = "Carrera Empadronada";
            etiqueta_solicitud_adecuacion.classList.add('etiqueta_solicitud_adecuacion');
            datos_adecuacion.append(etiqueta_solicitud_adecuacion); 
            var campos_adecuacion = document.createElement('input');
            campos_adecuacion.type = "text"
            campos_adecuacion.setAttribute('id','input_CarreraEmpadronada');
            campos_adecuacion.classList.add('campos_adecuacion');
            datos_adecuacion.append(campos_adecuacion); 
        contenido_nueva_adecuacion.append(datos_adecuacion); 
    //Input Año ingreso a la carrera
        var datos_adecuacion = document.createElement('div');
        datos_adecuacion.classList.add('datos_adecuacion');
            var etiqueta_solicitud_adecuacion = document.createElement('label');
            etiqueta_solicitud_adecuacion.textContent = "Año ingreso a la carrera";
            etiqueta_solicitud_adecuacion.classList.add('etiqueta_solicitud_adecuacion');
            datos_adecuacion.append(etiqueta_solicitud_adecuacion); 
            var campos_adecuacion = document.createElement('input');
            campos_adecuacion.type = "text"
            campos_adecuacion.setAttribute('id','input_AnoIngresoCarreraEmpadronada');
            campos_adecuacion.classList.add('campos_adecuacion');
            datos_adecuacion.append(campos_adecuacion); 
        contenido_nueva_adecuacion.append(datos_adecuacion); 
    //Input Nivel de carrera
        var datos_adecuacion = document.createElement('div');
        datos_adecuacion.classList.add('datos_adecuacion');
            var etiqueta_solicitud_adecuacion = document.createElement('label');
            etiqueta_solicitud_adecuacion.textContent = "Nivel de carrera";
            etiqueta_solicitud_adecuacion.classList.add('etiqueta_solicitud_adecuacion');
            datos_adecuacion.append(etiqueta_solicitud_adecuacion); 
            var campos_adecuacion = document.createElement('input');
            campos_adecuacion.type = "text"
            campos_adecuacion.setAttribute('id','input_Niveldecarrera');
            campos_adecuacion.classList.add('campos_adecuacion');
            datos_adecuacion.append(campos_adecuacion); 
        contenido_nueva_adecuacion.append(datos_adecuacion); 
        //Input Lleva una segunda carrera
        var datos_adecuacion = document.createElement('div');
        datos_adecuacion.classList.add('Carrera_simultanea');
            var etiqueta_solicitud_adecuacion = document.createElement('label');
            etiqueta_solicitud_adecuacion.textContent = "¿Lleva una segunda carrera?";
            etiqueta_solicitud_adecuacion.classList.add('etiqueta_solicitud_adecuacion');
            datos_adecuacion.append(etiqueta_solicitud_adecuacion); 
                var seleccion_carrera_simultanea = document.createElement('div');
                seleccion_carrera_simultanea.classList.add('seleccion_carrera_simultanea');
                        var Check = document.createElement('div');
                        Check.classList.add('Check');
                            var label_radio = document.createElement('label');
                            label_radio.textContent = "Si";
                            label_radio.classList.add('label_radio');
                        Check.append(label_radio);
                            var radio_buttom = document.createElement('input');
                            radio_buttom.setAttribute('type','radio');
                            radio_buttom.setAttribute('name','seleccion_2carrera');
                            radio_buttom.setAttribute('id','check_si_2carrera');
                            radio_buttom.setAttribute('onchange','mostrar(this.value);');
                            radio_buttom.setAttribute('value','1');
                            radio_buttom.classList.add('radio_buttom');
                        Check.append(radio_buttom);
                seleccion_carrera_simultanea.append(Check);
                        var Check = document.createElement('div');
                        Check.classList.add('Check');
                            var label_radio = document.createElement('label');
                            label_radio.textContent = "No";
                            label_radio.classList.add('label_radio');
                        Check.append(label_radio);
                            var radio_buttom = document.createElement('input');
                            radio_buttom.setAttribute('type','radio');
                            radio_buttom.setAttribute('name','seleccion_2carrera');
                            radio_buttom.setAttribute('id','check_no_2carrera');
                            radio_buttom.setAttribute('onchange','mostrar(this.value);');
                            radio_buttom.setAttribute('value','0');
                            radio_buttom.classList.add('radio_buttom');
                        Check.append(radio_buttom);
                seleccion_carrera_simultanea.append(Check);
        datos_adecuacion.append(seleccion_carrera_simultanea); 
                var Segunda_carrera = document.createElement('div');
                Segunda_carrera.classList.add('Segunda_carrera');
                Segunda_carrera.setAttribute('id', 'segunda_carrera' );
                    var etiqueta_solicitud_adecuacion = document.createElement('label');
                    etiqueta_solicitud_adecuacion.textContent = "Nombre la segunda carrera";
                    etiqueta_solicitud_adecuacion.classList.add('etiqueta_solicitud_adecuacion');
                Segunda_carrera.append(etiqueta_solicitud_adecuacion);
                    var campos_adecuacion = document.createElement('input');
                    campos_adecuacion.type = "text"
                    campos_adecuacion.classList.add('campos_adecuacion');
                    // campos_adecuacion.setAttribute('id','nombreSegundaCarrera');
                Segunda_carrera.append(campos_adecuacion);
        datos_adecuacion.append(Segunda_carrera);
    contenido_nueva_adecuacion.append(datos_adecuacion); 
    // 
    //Input Lleva una segunda carrera
    var Traslado = document.createElement('div');
    Traslado.classList.add('Traslado');
        var etiqueta_solicitud_adecuacion = document.createElement('label');
        etiqueta_solicitud_adecuacion.textContent = "¿Lleva una segunda carrera?";
        etiqueta_solicitud_adecuacion.classList.add('etiqueta_solicitud_adecuacion');
        Traslado.append(etiqueta_solicitud_adecuacion); 
            var seleccion_traslado = document.createElement('div');
            seleccion_traslado.classList.add('seleccion_traslado');
                    var Check = document.createElement('div');
                    Check.classList.add('Check');
                        var label_radio = document.createElement('label');
                        label_radio.textContent = "Si";
                        label_radio.classList.add('label_radio');
                    Check.append(label_radio);
                        var radio_buttom = document.createElement('input');
                        radio_buttom.setAttribute('type','radio');
                        radio_buttom.setAttribute('name','seleccion_traslado');
                        radio_buttom.setAttribute('id','check_si_2carrera');
                        radio_buttom.setAttribute('onchange','mostrar_traslado(this.value);');
                        radio_buttom.setAttribute('value','1');
                        radio_buttom.classList.add('radio_buttom');
                    Check.append(radio_buttom);
                    seleccion_traslado.append(Check);
                    var Check = document.createElement('div');
                    Check.classList.add('Check');
                        var label_radio = document.createElement('label');
                        label_radio.textContent = "No";
                        label_radio.classList.add('label_radio');
                    Check.append(label_radio);
                        var radio_buttom = document.createElement('input');
                        radio_buttom.setAttribute('type','radio');
                        radio_buttom.setAttribute('name','seleccion_traslado');
                        radio_buttom.setAttribute('id','check_no_2carrera');
                        radio_buttom.setAttribute('onchange','mostrar_traslado(this.value);');
                        radio_buttom.setAttribute('value','0');
                        radio_buttom.classList.add('radio_buttom');
                    Check.append(radio_buttom);
                    seleccion_traslado.append(Check);
            Traslado.append(seleccion_traslado); 
            var Traslado_carrera = document.createElement('div');
            Traslado_carrera.classList.add('Traslado_carrera');
            Traslado_carrera.setAttribute('id', 'Traslado_carrera' );
                var etiqueta_solicitud_adecuacion = document.createElement('label');
                etiqueta_solicitud_adecuacion.textContent = "Nombre la segunda carrera";
                etiqueta_solicitud_adecuacion.classList.add('etiqueta_solicitud_adecuacion');
                Traslado_carrera.append(etiqueta_solicitud_adecuacion);
                var campos_adecuacion = document.createElement('input');
                campos_adecuacion.type = "text"
                campos_adecuacion.classList.add('campos_adecuacion');
                // campos_adecuacion.setAttribute('id','nombreSegundaCarrera');
                Traslado_carrera.append(campos_adecuacion);
            Traslado.append(Traslado_carrera);
contenido_nueva_adecuacion.append(Traslado); 
//
    

contenido_nueva_adecuacion.append(datos_adecuacion); 
cuerpohtml.append(contenido_nueva_adecuacion);
}

function ventana_InfoSolicitud1() {
    var Listacategorias = "";
      var cuerpohtml =  document.getElementById('form_contenedor');
      var contenedor = document.createElement('div');
      contenedor.setAttribute("onclick","window.location='Descrip_Peli.html?id="+1 +"';");
      contenedor.classList.add('contenedor_principal_movie');
          var etiq_a = document.createElement('div');
                  etiq_a.classList.add('image_movie');
                  //var etiq_img = document.createElement('img');
                  var etiq_img = document.createElement('img');
                  etiq_img.src = '';
                  etiq_img.alt = "Error al cargar";
          etiq_a.append(etiq_img); 
          var etiq_div_circle = document.createElement('a');
          etiq_div_circle.classList.add('circle');
              var etiq_i = document.createElement('i');
              etiq_i.append("w");
          etiq_div_circle.append(etiq_i); 
          var etiq_coontenedor_secun = document.createElement('div');
          etiq_coontenedor_secun.classList.add('contenedor_secundario_movie');
              var etiq_div_title_movie = document.createElement('div');
              etiq_div_title_movie.classList.add("title_movie","bold");
                  var etiq_text_name = document.createElement('label');
                  etiq_text_name.textContent = "d";
              etiq_div_title_movie.append(etiq_text_name);
              var etiq_div_clasification_movie = document.createElement('div');
              etiq_div_clasification_movie.classList.add("classification_movie");
                 
              var etiq_div_duration_movie = document.createElement('div');
              etiq_div_duration_movie.classList.add("duration_movie");
                  var etiq_text_duration = document.createElement('label');
                  etiq_text_duration.append(12 + " min");   
              etiq_div_duration_movie.append(etiq_text_duration);
              var etiq_div_description_movie = document.createElement('div');
              etiq_div_description_movie.classList.add("description_movie");
                  var etiq_text_descrip = document.createElement('p');
                  etiq_text_descrip.textContent = 22;
              etiq_div_description_movie.append(etiq_text_descrip);
              etiq_coontenedor_secun.append(etiq_div_title_movie, etiq_div_clasification_movie, etiq_div_duration_movie,
              etiq_div_description_movie);
      contenedor.append(etiq_a, etiq_div_circle, etiq_coontenedor_secun);  
      cuerpohtml.append(contenedor);
  }