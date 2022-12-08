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
    if (contador < 5) {
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
            ventana_InstitucionProcedencia();
            break;
        case 3:
            ventana_necesidad_Apoyo();
            break;
        case 4:
            ventana_GrupoFamiliar();
            break;
        case 5:
            ventana_Archivos() 
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
    //
    var titulocontenedor = document.createElement('h3');
    titulocontenedor.textContent = "Datos Solicitud";
    contenido_nueva_adecuacion.append(titulocontenedor); 
    //
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
            campos_adecuacion.type = "date"
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

function ventana_InstitucionProcedencia() { 
    var cuerpohtml = document.getElementById('form_contenedor');
    var contenido_nueva_adecuacion = document.createElement('div');
    contenido_nueva_adecuacion.classList.add('contenido_nueva_adecuacion');
 //Titulo//////////////////////////////////////////////////////////////////////////////////
 var titulocontenedor = document.createElement('h3');
 titulocontenedor.textContent = "Datos acádemicos";
 contenido_nueva_adecuacion.append(titulocontenedor); 
 ////////////////////////////////////////////////////////////////////////////////////
 // Nombre de la Institución/////////////////////////////////////////////////////////////////////////
 var datos_adecuacion = document.createElement('div');
 datos_adecuacion.classList.add('datos_adecuacion');
    //label
     var etiqueta_solicitud_adecuacion = document.createElement('label');
     etiqueta_solicitud_adecuacion.textContent = "Nombre de la Institución";
     etiqueta_solicitud_adecuacion.classList.add('etiqueta_solicitud_adecuacion');
    datos_adecuacion.append(etiqueta_solicitud_adecuacion); 
    //input
     var campos_adecuacion = document.createElement('input');
     campos_adecuacion.type = "text"
     campos_adecuacion.setAttribute('id','input_InstitucionProcedencia');
     campos_adecuacion.classList.add('campos_adecuacion');
     datos_adecuacion.append(campos_adecuacion); 
 contenido_nueva_adecuacion.append(datos_adecuacion); 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Año de egreson/////////////////////////////////////////////////////////////////////////
 var datos_adecuacion = document.createElement('div');
 datos_adecuacion.classList.add('datos_adecuacion');
    //label
     var etiqueta_solicitud_adecuacion = document.createElement('label');
     etiqueta_solicitud_adecuacion.textContent = "Año de egreso";
     etiqueta_solicitud_adecuacion.classList.add('etiqueta_solicitud_adecuacion');
    datos_adecuacion.append(etiqueta_solicitud_adecuacion); 
    //input
     var campos_adecuacion = document.createElement('input');
     campos_adecuacion.type = "date"
     campos_adecuacion.setAttribute('id','input_Año_Egreso');
     campos_adecuacion.classList.add('campos_adecuacion');
     datos_adecuacion.append(campos_adecuacion); 
 contenido_nueva_adecuacion.append(datos_adecuacion); 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
       // Año de egreso/////////////////////////////////////////////////////////////////////////
 var datos_adecuacion = document.createElement('div');
 datos_adecuacion.classList.add('datos_adecuacion');
    //label
     var etiqueta_solicitud_adecuacion = document.createElement('label');
     etiqueta_solicitud_adecuacion.textContent = "Año de ingreso a la universidad";
     etiqueta_solicitud_adecuacion.classList.add('etiqueta_solicitud_adecuacion');
    datos_adecuacion.append(etiqueta_solicitud_adecuacion); 
    //input
     var campos_adecuacion = document.createElement('input');
     campos_adecuacion.type = "date"
     campos_adecuacion.setAttribute('id','input_Año_ingreso_Universidad');
     campos_adecuacion.classList.add('campos_adecuacion');
     datos_adecuacion.append(campos_adecuacion); 
 contenido_nueva_adecuacion.append(datos_adecuacion); 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    cuerpohtml.append(contenido_nueva_adecuacion);
}

function ventana_necesidad_Apoyo() { 
    var cuerpohtml = document.getElementById('form_contenedor');
    var contenido_nueva_adecuacion = document.createElement('div');
    contenido_nueva_adecuacion.classList.add('contenido_nueva_adecuacion');
 //Titulo//////////////////////////////////////////////////////////////////////////////////
 var titulocontenedor = document.createElement('h3');
 titulocontenedor.textContent = "Necesidad Y Apoyo";
 contenido_nueva_adecuacion.append(titulocontenedor); 
 ////////////////////////////////////////////////////////////////////////////////////
 // Dianostico/////////////////////////////////////////////////////////////////////////
 var datos_adecuacion = document.createElement('div');
 datos_adecuacion.classList.add('datos_adecuacion');
    //label
     var etiqueta_solicitud_adecuacion = document.createElement('label');
     etiqueta_solicitud_adecuacion.textContent = "Diágnostico";
     etiqueta_solicitud_adecuacion.classList.add('etiqueta_solicitud_adecuacion');
    datos_adecuacion.append(etiqueta_solicitud_adecuacion); 
    //input
     var campos_adecuacion = document.createElement('input');
     campos_adecuacion.type = "text"
     campos_adecuacion.setAttribute('id','input_Diagnostico');
     campos_adecuacion.classList.add('campos_adecuacion');
     datos_adecuacion.append(campos_adecuacion); 
 contenido_nueva_adecuacion.append(datos_adecuacion); 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Área, profesional que diagnostica/////////////////////////////////////////////////////////////////////////
 var datos_adecuacion = document.createElement('div');
 datos_adecuacion.classList.add('datos_adecuacion');
    //label
     var etiqueta_solicitud_adecuacion = document.createElement('label');
     etiqueta_solicitud_adecuacion.textContent = "Área, profesional que diagnostica";
     etiqueta_solicitud_adecuacion.classList.add('etiqueta_solicitud_adecuacion');
    datos_adecuacion.append(etiqueta_solicitud_adecuacion); 
    //input
     var campos_adecuacion = document.createElement('input');
     campos_adecuacion.type = "text"
     campos_adecuacion.setAttribute('id','input_ProfesionalDiagnostica');
     campos_adecuacion.classList.add('campos_adecuacion');
     datos_adecuacion.append(campos_adecuacion); 
 contenido_nueva_adecuacion.append(datos_adecuacion); 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
       // Año de egreso/////////////////////////////////////////////////////////////////////////
 var datos_adecuacion = document.createElement('div');
 datos_adecuacion.classList.add('datos_adecuacion');
    //label
     var etiqueta_solicitud_adecuacion = document.createElement('label');
     etiqueta_solicitud_adecuacion.textContent = "Año de ingreso a la universidad";
     etiqueta_solicitud_adecuacion.classList.add('etiqueta_solicitud_adecuacion');
    datos_adecuacion.append(etiqueta_solicitud_adecuacion); 
    //input
     var campos_adecuacion = document.createElement('input');
     campos_adecuacion.type = "date"
     campos_adecuacion.setAttribute('id','input_Año_ingreso_Universidad');
     campos_adecuacion.classList.add('campos_adecuacion');
     datos_adecuacion.append(campos_adecuacion); 
 contenido_nueva_adecuacion.append(datos_adecuacion); 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////Section ¿Recibe atención y tratamiento por parte de algún especialista?
          //primer div principal
            var datos_adecuacion = document.createElement('div');
            datos_adecuacion.classList.add('Atencion');
            //label titulo
                var etiqueta_solicitud_adecuacion = document.createElement('label');
                etiqueta_solicitud_adecuacion.textContent = "¿Recibe atención y tratamiento por parte de algún especialista?";
                etiqueta_solicitud_adecuacion.classList.add('etiqueta_atencion');
    datos_adecuacion.append(etiqueta_solicitud_adecuacion); 
    //segundo div principal
                    var seleccion_atencion = document.createElement('div');
                    seleccion_atencion.classList.add('seleccion_atencion');
                    //check 1
                            var Check = document.createElement('div');
                            Check.classList.add('Check');
                                var label_radio = document.createElement('label');
                                label_radio.textContent = "Si";
                                label_radio.classList.add('label_radio');
                            Check.append(label_radio);
                                var radio_buttom = document.createElement('input');
                                radio_buttom.setAttribute('type','radio');
                                radio_buttom.setAttribute('name','seleccion_atencion');
                                radio_buttom.setAttribute('id','checksi_atencion');
                                radio_buttom.setAttribute('onchange','mostrar_atencion(this.value);');
                                radio_buttom.setAttribute('value','1');
                                radio_buttom.classList.add('radio_buttom');
                            Check.append(radio_buttom);
                            seleccion_atencion.append(Check);
                            var Check = document.createElement('div');
                    //check 2
                            Check.classList.add('Check');
                                var label_radio = document.createElement('label');
                                label_radio.textContent = "No";
                                label_radio.classList.add('label_radio');
                            Check.append(label_radio);
                                var radio_buttom = document.createElement('input');
                                radio_buttom.setAttribute('type','radio');
                                radio_buttom.setAttribute('name','seleccion_atencion');
                                radio_buttom.setAttribute('id','check_noatencion');
                                radio_buttom.setAttribute('onchange','mostrar_atencion(this.value);');
                                radio_buttom.setAttribute('value','0');
                                radio_buttom.classList.add('radio_buttom');
                            Check.append(radio_buttom);
                            seleccion_atencion.append(Check);
                    datos_adecuacion.append(seleccion_atencion); 
                    //fin check
                    //div magico
                    var Segunda_carrera = document.createElement('div');
                    Segunda_carrera.classList.add('Descripcion');
                    Segunda_carrera.setAttribute('id', 'descripcion_atencion' );
                        var etiqueta_solicitud_adecuacion = document.createElement('label');
                        etiqueta_solicitud_adecuacion.textContent = "Tipo de atención o seguimiento";
                        etiqueta_solicitud_adecuacion.classList.add('etiqueta_solicitud_adecuacion');
                    Segunda_carrera.append(etiqueta_solicitud_adecuacion);
                        var campos_adecuacion = document.createElement('textarea');
                        campos_adecuacion.type = "text"
                        campos_adecuacion.classList.add('campos_text_area');
                        campos_adecuacion.setAttribute('id','descripcion_atencion');
                        campos_adecuacion.setAttribute('rows','4');
                        campos_adecuacion.setAttribute('cols','30');
                    Segunda_carrera.append(campos_adecuacion);
            datos_adecuacion.append(Segunda_carrera);
    contenido_nueva_adecuacion.append(datos_adecuacion); 
    /////////////////////////////////////////////////////////
////Section Condición de salud actual
var titulocontenedor = document.createElement('h5');
titulocontenedor.textContent = "Condición de salud actual";
contenido_nueva_adecuacion.append(titulocontenedor); 
          //primer div principal
          var datos_adecuacion = document.createElement('div');
          datos_adecuacion.classList.add('Atencion');
          //label titulo
              var etiqueta_solicitud_adecuacion = document.createElement('label');
              etiqueta_solicitud_adecuacion.textContent = "¿Padece de alguna enfermedad que afecta su    desempeño?";
              etiqueta_solicitud_adecuacion.classList.add('etiqueta_atencion');
  datos_adecuacion.append(etiqueta_solicitud_adecuacion); 
  //segundo div principal
                  var seleccion_atencion = document.createElement('div');
                  seleccion_atencion.classList.add('seleccion_atencion');
                  //check 1
                          var Check = document.createElement('div');
                          Check.classList.add('Check');
                              var label_radio = document.createElement('label');
                              label_radio.textContent = "Si";
                              label_radio.classList.add('label_radio');
                          Check.append(label_radio);
                              var radio_buttom = document.createElement('input');
                              radio_buttom.setAttribute('type','radio');
                              radio_buttom.setAttribute('name','seleccion_enfermedad');
                              radio_buttom.setAttribute('id','checksi_enfemerdad');
                              radio_buttom.setAttribute('onchange','mostrar_datos_enfermedad(this.value);');
                              radio_buttom.setAttribute('value','1');
                              radio_buttom.classList.add('radio_buttom');
                          Check.append(radio_buttom);
                          seleccion_atencion.append(Check);
                          var Check = document.createElement('div');
                  //check 2
                          Check.classList.add('Check');
                              var label_radio = document.createElement('label');
                              label_radio.textContent = "No";
                              label_radio.classList.add('label_radio');
                          Check.append(label_radio);
                              var radio_buttom = document.createElement('input');
                              radio_buttom.setAttribute('type','radio');
                              radio_buttom.setAttribute('name','seleccion_enfermedad');
                              radio_buttom.setAttribute('id','checkno_enfemerdad');
                              radio_buttom.setAttribute('onchange','mostrar_datos_enfermedad(this.value);');
                              radio_buttom.setAttribute('value','0');
                              radio_buttom.classList.add('radio_buttom');
                          Check.append(radio_buttom);
                          seleccion_atencion.append(Check);
                  datos_adecuacion.append(seleccion_atencion); 
                  //fin check
                  //div magico 1
                  var Segunda_carrera = document.createElement('div');
                  Segunda_carrera.classList.add('datos_enfermedad');
                  Segunda_carrera.setAttribute('id', 'campos_info_enfermedad' );
                      var etiqueta_solicitud_adecuacion = document.createElement('label');
                      etiqueta_solicitud_adecuacion.textContent = "¿Cúal?";
                      etiqueta_solicitud_adecuacion.classList.add('etiqueta_padecimiento');
                  Segunda_carrera.append(etiqueta_solicitud_adecuacion);
                      var campos_adecuacion = document.createElement('input');
                      campos_adecuacion.type = "text"
                      campos_adecuacion.classList.add('campos_enfermedad');
                      campos_adecuacion.setAttribute('id','input_Cual_enfermedad');
                  Segunda_carrera.append(campos_adecuacion);
                    datos_adecuacion.append(Segunda_carrera);
                contenido_nueva_adecuacion.append(datos_adecuacion); 
                //div magico 2
                    var Segunda_carrera = document.createElement('div');
                    Segunda_carrera.classList.add('datos_enfermedad');
                    Segunda_carrera.setAttribute('id', 'campos_info_tratamiento' );
                        var etiqueta_solicitud_adecuacion = document.createElement('label');
                        etiqueta_solicitud_adecuacion.textContent = "Tratamiento médico utilizado";
                        etiqueta_solicitud_adecuacion.classList.add('etiqueta_padecimiento');
                    Segunda_carrera.append(etiqueta_solicitud_adecuacion);
                        var campos_adecuacion = document.createElement('input');
                        campos_adecuacion.type = "text"
                        campos_adecuacion.classList.add('campos_enfermedad');
                        campos_adecuacion.setAttribute('id','input_Tratamiento_enfermedad');
                    Segunda_carrera.append(campos_adecuacion);
                datos_adecuacion.append(Segunda_carrera);
                contenido_nueva_adecuacion.append(datos_adecuacion); 
    //fin
    cuerpohtml.append(contenido_nueva_adecuacion);
}
function ventana_GrupoFamiliar() { 
    var cuerpohtml = document.getElementById('form_contenedor');
    var contenido_nueva_adecuacion = document.createElement('div');
    contenido_nueva_adecuacion.classList.add('contenido_nueva_adecuacion');
 //Titulo//////////////////////////////////////////////////////////////////////////////////
 var titulocontenedor = document.createElement('h3');
 titulocontenedor.textContent = "Grupo Familiar";
 contenido_nueva_adecuacion.append(titulocontenedor); 
 ////////////////////////////////////////////////////////////////////////////////////
 // Primer div principal/////////////////////////////////////////////////////////////////////////
 var datos_adecuacion = document.createElement('div');
 datos_adecuacion.classList.add('lista_familiares'); 
    // div agregar
        var datos_adecuacion = document.createElement('div');
        datos_adecuacion.classList.add('divbtn_agrega_familiar');
                var campos_adecuacion = document.createElement('a');
                campos_adecuacion.setAttribute('id','btn_agregar_Pariente');
                campos_adecuacion.classList.add('boton_agregar_familiar');
                campos_adecuacion.textContent = "Agregar Familiar";
                datos_adecuacion.append(campos_adecuacion); 
                
    // Segundo div principal/////////////////////////////////////////////////////////////////////////
    var tabla = document.createElement('div');
    tabla.classList.add('divtabla'); 

    //tabla
    var table = document.createElement('table');
    table.classList.add('tabla_grupo_familiar');
        //fila uno
                var thead = document.createElement('thead');
                        var tr = document.createElement('tr');
                                var th_tipoPariente = document.createElement('th');
                                th_tipoPariente.setAttribute('scope','col');
                                th_tipoPariente.appendChild(document.createTextNode('Tipo de pariente'));
                            tr.append(th_tipoPariente);
                                var th_Discapacidad = document.createElement('th');
                                th_Discapacidad.setAttribute('scope','col');
                                th_Discapacidad.appendChild(document.createTextNode('Discapacidad'))
                            tr.append(th_Discapacidad);
                                var th_Cedula = document.createElement('th');                            
                                th_Cedula.setAttribute('scope','col');
                                th_Cedula.appendChild(document.createTextNode('Cedula'))
                            tr.append(th_Cedula)
                    thead.append(tr);
            table.append(thead);
            var tbody = document.createElement('tbody');
            tbody.setAttribute('id', 'cuerpotabla');
            table.append(tbody);
        tabla.append(table);
    
datos_adecuacion.append(tabla); 
        //
    
contenido_nueva_adecuacion.append(datos_adecuacion);
    
 cuerpohtml.append(contenido_nueva_adecuacion);
}

function ventana_Archivos() { 
    var cuerpohtml = document.getElementById('form_contenedor');
    var contenido_nueva_adecuacion = document.createElement('div');
    contenido_nueva_adecuacion.classList.add('contenido_nueva_adecuacion');
 //Titulo//////////////////////////////////////////////////////////////////////////////////
 var titulocontenedor = document.createElement('h3');
 titulocontenedor.textContent = "Archivos";
 contenido_nueva_adecuacion.append(titulocontenedor); 
 ////////////////////////////////////////////////////////////////////////////////////
 // Primer div principal/////////////////////////////////////////////////////////////////////////
 var datos_adecuacion = document.createElement('div');
 datos_adecuacion.classList.add('lista_archivos'); 
    // div agregar
        var datos_adecuacion = document.createElement('div');
        datos_adecuacion.classList.add('divbtn_agrega_archivo');
                var campos_adecuacion = document.createElement('a');
                campos_adecuacion.setAttribute('id','btn_agregar_archivo');
                campos_adecuacion.classList.add('boton_agregar_archivo');
                campos_adecuacion.textContent = "Agregar Archivo";
                datos_adecuacion.append(campos_adecuacion); 
    // Segundo div principal/////////////////////////////////////////////////////////////////////////
    var tabla = document.createElement('div');
    tabla.classList.add('divtabla'); 

    //tabla
    var table = document.createElement('table');
    table.classList.add('tabla_archivos');
        //fila uno
                var thead = document.createElement('thead');
                        var tr = document.createElement('tr');
                                var th_Nombre_archivo = document.createElement('th');
                                th_Nombre_archivo.setAttribute('scope','col');
                                th_Nombre_archivo.appendChild(document.createTextNode('Tipo de pariente'));
                            tr.append(th_Nombre_archivo);
                                var th_Expedido = document.createElement('th');
                                th_Expedido.setAttribute('scope','col');
                                th_Expedido.appendChild(document.createTextNode('Discapacidad'))
                            tr.append(th_Expedido);
                                var th_Archivo = document.createElement('th');                            
                                th_Archivo.setAttribute('scope','col');
                                th_Archivo.appendChild(document.createTextNode('Cedula'))
                            tr.append(th_Archivo)
                    thead.append(tr);
            table.append(thead);
            
            var tbody = document.createElement('tbody');
            tbody.setAttribute('id', 'cuerpotabla');
            var celdas = document.createElement("td");

            table.append(tbody);
        tabla.append(table);
    
datos_adecuacion.append(tabla); 
        //
    
contenido_nueva_adecuacion.append(datos_adecuacion);
    
 cuerpohtml.append(contenido_nueva_adecuacion);
}