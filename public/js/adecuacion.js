var contador = 1;
//Listas
var info_Solicitud;
var eventoArchivo;
var array_archivos = [];
var array_DatosSolicitud = null;
var array_DatosAcademicos = null;
var array_AtencionSeguimiento = null;
var array_grupoFamiliar = null;
var array_Salud = null;
var estadoventana;


function siguiente() { 
    contador++;
    estadoventana = true;
    verificarterminos();
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
    if (contador > 1) {
        contador--;
    }
    verificarterminos();
    estadoventana = false;
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

function verificarterminos() { 
    if (!terminosycondiciones) { 
        toastr['error']('Ops! error interno');
        sleep(2000).then(() => {
            window.location.href = route('Adecuacion');
        })
    }
}

document.addEventListener("DOMContentLoaded", async function(){
    cambio_Ventanas();
});

function cambio_Ventanas() { 
    if (validaciones_Ventanas()) {
        removerhijos();
        switch (contador) {
            case 1:
                ventana_InfoSolicitud();
                document.getElementById('progreso').style.width = '0%';
                break;
            case 2:
                ventana_InstitucionProcedencia();
                document.getElementById('progreso').style.width = '20%';
                break;
            case 3:
                ventana_necesidad_Apoyo();
                document.getElementById('progreso').style.width = '40%';
                break;
            case 4:
                ventana_GrupoFamiliar();
                document.getElementById('progreso').style.width = '60%';
                break;
            case 5:
                ventana_Archivos();
                document.getElementById('progreso').style.width = '80%';
                break;
            default:
                break;
        }
    } else { 
        if (contador > 1) { 
            contador--;
        }
        accion_btn_atras();
        accion_btn_siguiente();
    }
}

function validaciones_Ventanas() { 
    if (estadoventana) {
        switch (contador - 1) {
            case 1:
                return validarcampos_DatosSolicitud();
            case 2:
                return validarCampos_DatosAcademicos();
            case 3:
                return validarCampos_Necesidad_Y_Apoyo();
            case 4:
                return validarCampos_GrupoFamiliar();
            case 5:
            //ventana_Archivos() 
               
            default:
                return true;
        }
    } else { 
        return true;
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
            campos_adecuacion.setAttribute('title','Mínimo 10 caracteres');
            campos_adecuacion.setAttribute('value', array_DatosSolicitud != null ?  array_DatosSolicitud['razon_Solicitud'] : "");
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
            campos_adecuacion.setAttribute('title','Mínimo 4 caracteres');
            campos_adecuacion.setAttribute('value', array_DatosSolicitud != null ?  array_DatosSolicitud['carrera_Empadronada'] : "");
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
            campos_adecuacion.setAttribute('title','Ingresa el año de ingreso a esta carrera');
            campos_adecuacion.setAttribute('value', array_DatosSolicitud != null ?  array_DatosSolicitud['ano_ingreso_carrera'] : "2010-01-01");
            campos_adecuacion.classList.add('campos_adecuacion');
            datos_adecuacion.append(campos_adecuacion); 
        contenido_nueva_adecuacion.append(datos_adecuacion); 
    //Input Nivel de carrera
        var datos_adecuacion = document.createElement('div');
        datos_adecuacion.classList.add('datos_adecuacion');
            var etiqueta_solicitud_adecuacion = document.createElement('label');
            etiqueta_solicitud_adecuacion.textContent = "Procentaje de carrera actual";
            etiqueta_solicitud_adecuacion.classList.add('etiqueta_solicitud_adecuacion');
            datos_adecuacion.append(etiqueta_solicitud_adecuacion); 
            var campos_adecuacion = document.createElement('input');
            campos_adecuacion.setAttribute('value', array_DatosSolicitud != null ?  array_DatosSolicitud['nivel_carrera'] : "1");
            campos_adecuacion.type = "number"
            campos_adecuacion.setAttribute('id','input_Niveldecarrera');
            campos_adecuacion.setAttribute('title','Procentaje de carrera actual');
            campos_adecuacion.setAttribute('min','1');
            campos_adecuacion.setAttribute('max','100');
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
                            radio_buttom.checked =  array_DatosSolicitud != null ?  array_DatosSolicitud.hasOwnProperty('nombre_segunda_carrera')  ?  true : false : false;
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
                            radio_buttom.checked =  array_DatosSolicitud != null ?  array_DatosSolicitud.hasOwnProperty('nombre_segunda_carrera') ?  false : true : true;
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
                    campos_adecuacion.setAttribute('id', "input_NombreSegundaCarrera");
                    campos_adecuacion.setAttribute('title','Mínimo 4 caracteres');
                    campos_adecuacion.setAttribute('value',array_DatosSolicitud != null ?  array_DatosSolicitud.hasOwnProperty('nombre_segunda_carrera') ?  array_DatosSolicitud['nombre_segunda_carrera'] : '' : '');
                    campos_adecuacion.type = "text"
                    campos_adecuacion.classList.add('campos_adecuacion');
                    // campos_adecuacion.setAttribute('id','nombreSegundaCarrera');
                Segunda_carrera.append(campos_adecuacion);
        datos_adecuacion.append(Segunda_carrera);
    contenido_nueva_adecuacion.append(datos_adecuacion); 
    // 
    //Input Traslado
    var Traslado = document.createElement('div');
    Traslado.classList.add('Traslado');
        var etiqueta_solicitud_adecuacion = document.createElement('label');
        etiqueta_solicitud_adecuacion.textContent = "¿Realizo traslado de carrera? ";
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
                        radio_buttom.checked =  array_DatosSolicitud != null ?  array_DatosSolicitud['realizo_Traslado_Carrera'] == 1 ?  true : false : false;
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
                        radio_buttom.checked =  array_DatosSolicitud != null ?  array_DatosSolicitud['realizo_Traslado_Carrera'] == 1 ?  false : true : true;
                        radio_buttom.classList.add('radio_buttom');
                    Check.append(radio_buttom);
                    seleccion_traslado.append(Check);
            Traslado.append(seleccion_traslado); 
            var Traslado_carrera = document.createElement('div');
            Traslado_carrera.classList.add('Traslado_carrera');
            Traslado_carrera.setAttribute('id', 'Traslado_carrera' );
                var etiqueta_solicitud_adecuacion = document.createElement('label');
                etiqueta_solicitud_adecuacion.textContent = "Carrera empadronada anterior";
                etiqueta_solicitud_adecuacion.classList.add('etiqueta_solicitud_adecuacion');
                Traslado_carrera.append(etiqueta_solicitud_adecuacion);
                var campos_adecuacion = document.createElement('input');
                campos_adecuacion.type = "text"
                campos_adecuacion.setAttribute('title','Mínimo 5 caracteres');
                campos_adecuacion.setAttribute('id', 'input_carrera_anterior');
                campos_adecuacion.setAttribute('value',array_DatosSolicitud != null ?  array_DatosSolicitud.hasOwnProperty('carrera_empadronado_anterior') ?  array_DatosSolicitud['carrera_empadronado_anterior'] : '' : '');
                campos_adecuacion.classList.add('campos_adecuacion');
                // campos_adecuacion.setAttribute('id','nombreSegundaCarrera');
                Traslado_carrera.append(campos_adecuacion);
            Traslado.append(Traslado_carrera);
contenido_nueva_adecuacion.append(Traslado); 
//
    

contenido_nueva_adecuacion.append(datos_adecuacion); 
cuerpohtml.append(contenido_nueva_adecuacion);

    mostrar_traslado(array_DatosSolicitud != null ?  array_DatosSolicitud['realizo_Traslado_Carrera'] == 1 ?  true : false : false);
    mostrar(array_DatosSolicitud != null ?  array_DatosSolicitud.hasOwnProperty('nombre_segunda_carrera') ?  true : false : false);
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
     etiqueta_solicitud_adecuacion.textContent = "Nombre de la Institución de procedencia";
     etiqueta_solicitud_adecuacion.classList.add('etiqueta_solicitud_adecuacion');
    datos_adecuacion.append(etiqueta_solicitud_adecuacion); 
    //input
     var campos_adecuacion = document.createElement('input');
     campos_adecuacion.type = "text"
     campos_adecuacion.setAttribute('id','input_InstitucionProcedencia');
     campos_adecuacion.setAttribute('title','Mínimo 6 caracteres');
     campos_adecuacion.setAttribute('value',array_DatosAcademicos != null ? array_DatosAcademicos['nombre'] : "");
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
        campos_adecuacion.setAttribute('id', 'input_Año_Egreso');
        campos_adecuacion.setAttribute('value',array_DatosAcademicos != null ? array_DatosAcademicos['ano_egreso'] : "2010-01-01");
        campos_adecuacion.setAttribute('title','Ingresa la fecha de egreso de la institución');
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
    campos_adecuacion.setAttribute('id', 'input_Año_ingreso_Universidad');
    campos_adecuacion.setAttribute('title','Ingresa la fecha de ingreso a la universidad');
    campos_adecuacion.setAttribute('value', array_DatosAcademicos != null ? array_DatosAcademicos['ano_ingreso_universidad'] : "2010-01-01");
     campos_adecuacion.classList.add('campos_adecuacion');
     datos_adecuacion.append(campos_adecuacion); 
 contenido_nueva_adecuacion.append(datos_adecuacion); 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    cuerpohtml.append(contenido_nueva_adecuacion);
}

function ventana_necesidad_Apoyo() { 
    // var array_AtencionSeguimiento = null;
    // var array_Salud = null;
    
    var cuerpohtml = document.getElementById('form_contenedor');
    var contenido_nueva_adecuacion = document.createElement('div');
    contenido_nueva_adecuacion.classList.add('contenido_nueva_adecuacion');
 //Titulo//////////////////////////////////////////////////////////////////////////////////
 var titulocontenedor = document.createElement('h3');
 titulocontenedor.textContent = "Necesidad y Apoyo";
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
     campos_adecuacion.setAttribute('title','Mínimo 6 caracteres');
     campos_adecuacion.setAttribute('value', array_AtencionSeguimiento != null ? array_AtencionSeguimiento['diagnostico'] : '');
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
     campos_adecuacion.setAttribute('title','Mínimo 6 caracteres');
      campos_adecuacion.setAttribute('value', array_AtencionSeguimiento != null ? array_AtencionSeguimiento['area_Profesional'] : '');
     campos_adecuacion.classList.add('campos_adecuacion');
     datos_adecuacion.append(campos_adecuacion); 
 contenido_nueva_adecuacion.append(datos_adecuacion); 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
                                 radio_buttom.checked =  array_AtencionSeguimiento != null ?  array_AtencionSeguimiento['recibe_atencionyseguimiento'] == 1 ?  true : false : false;
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
                                 radio_buttom.checked =  array_AtencionSeguimiento != null ?  array_AtencionSeguimiento['recibe_atencionyseguimiento'] == 1 ?  false : true : true;
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
                        campos_adecuacion.setAttribute('title','Mínimo 6 caracteres');
                        campos_adecuacion.setAttribute('id','descripcion_atencion_input');
                        campos_adecuacion.textContent = array_AtencionSeguimiento != null ? array_AtencionSeguimiento['atencionyseguimiento'] : '';
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
                               radio_buttom.checked =  array_Salud != null ? array_Salud['afectacionDesempeno'] == 1 ? true : false : false;
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
                              radio_buttom.checked =  array_Salud != null ? array_Salud['afectacionDesempeno'] == 1 ? false : true : true;
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
                      campos_adecuacion.setAttribute('title','Mínimo 6 caracteres');
                      campos_adecuacion.setAttribute('value', array_Salud != null && array_Salud.hasOwnProperty('enfermedad')  ? array_Salud['enfermedad'] : '');
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
                        campos_adecuacion.setAttribute('title','Mínimo 6 caracteres');
                        campos_adecuacion.setAttribute('id','input_Tratamiento_enfermedad');
                        campos_adecuacion.setAttribute('value', array_Salud != null && array_Salud.hasOwnProperty('tratamiento') ? array_Salud['tratamiento'] : '');
                    Segunda_carrera.append(campos_adecuacion);
                datos_adecuacion.append(Segunda_carrera);
                contenido_nueva_adecuacion.append(datos_adecuacion); 
    //fin
    cuerpohtml.append(contenido_nueva_adecuacion);

    mostrar_atencion(array_AtencionSeguimiento != null ? array_AtencionSeguimiento['recibe_atencionyseguimiento'] == 1 ? true : false : false);
    
    mostrar_datos_enfermedad(array_Salud != null ?  array_Salud['afectacionDesempeno'] == 1 ?  true : false : false);
}
function ventana_GrupoFamiliar() { 
    var cuerpohtml = document.getElementById('form_contenedor');
    var contenido_nueva_adecuacion = document.createElement('div');
    contenido_nueva_adecuacion.classList.add('contenido_nueva_adecuacion');
   // contenido_nueva_adecuacion.style.cssText = 'width: auto;'

 //Titulo//////////////////////////////////////////////////////////////////////////////////
 var titulocontenedor = document.createElement('h3');
 titulocontenedor.textContent = "Grupo Familiar";
 contenido_nueva_adecuacion.append(titulocontenedor); 
 ////////////////////////////////////////////////////////////////////////////////////
 // Primer div principal/////////////////////////////////////////////////////////////////////////
 var datos_adecuacion = document.createElement('div');
 datos_adecuacion.classList.add('lista_familiares'); 
    // div agregar
        var div_boton = document.createElement('div');
        div_boton.classList.add('divbtn_agrega_familiar');
        //boton agregar pariente
                var campos_adecuacion = document.createElement('button');
                campos_adecuacion.setAttribute('id','btn_agregar_Pariente');
                campos_adecuacion.setAttribute('onclick','openModal_NuevoPariente(this);');
                campos_adecuacion.classList.add('boton_agregar_familiar');
                campos_adecuacion.textContent = "Agregar Familiar";
                datos_adecuacion.style.cssText = 'display: flex; flex-wrap: wrap; width: 100%; margin-left:0;'; 
                div_boton.append(campos_adecuacion);
                datos_adecuacion.append(div_boton); 
                
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
                                var th_tipoPariente = document.createElement('th');
                                th_tipoPariente.setAttribute('scope','col');
                                th_tipoPariente.appendChild(document.createTextNode('Ocupación'));
                            tr.append(th_tipoPariente);
                                var th_Cedula = document.createElement('th');                            
                                th_Cedula.setAttribute('scope','col');
                                th_Cedula.appendChild(document.createTextNode('Cedula'))
                            tr.append(th_Cedula)
                                var th_Archivo = document.createElement('th');                            
                                th_Archivo.setAttribute('scope','col');
                                th_Archivo.appendChild(document.createTextNode('Acciones'));
                            tr.append(th_Archivo);
                    thead.append(tr);
            table.append(thead);
            var tbody = document.createElement('tbody');
            tbody.setAttribute('id', 'cuerpotabla');
            table.append(tbody);
        tabla.append(table);
    
datos_adecuacion.append(tabla); 
        //textarea
        var discapacidad_grupo = document.createElement('div');
        discapacidad_grupo.classList.add('Descripcion_discapacidad');
            var etiqueta_solicitud_adecuacion = document.createElement('label');
            etiqueta_solicitud_adecuacion.textContent = "Discapacidad de grupo familiar";
            etiqueta_solicitud_adecuacion.classList.add('etiqueta_solicitud_adecuacion');
            discapacidad_grupo.append(etiqueta_solicitud_adecuacion);
            var campos_adecuacion = document.createElement('textarea');
            campos_adecuacion.type = "text"
            campos_adecuacion.setAttribute('title','Mínimo 10 caracteres');
            campos_adecuacion.placeholder = "En caso de no ser necesario, solo indique: “Mi familia no presenta discapacidades”";
            campos_adecuacion.classList.add('campos_text_area');
            campos_adecuacion.setAttribute('id','discapacidad_grupo');
            campos_adecuacion.textContent = array_grupoFamiliar != null ? array_grupoFamiliar['descripcion_De_Discapacidades'] : '';
            campos_adecuacion.setAttribute('rows','4');
            campos_adecuacion.setAttribute('cols','30');
            discapacidad_grupo.append(campos_adecuacion);
        datos_adecuacion.append(discapacidad_grupo);
  
        contenido_nueva_adecuacion.append(datos_adecuacion);        
    
    cuerpohtml.append(contenido_nueva_adecuacion);
    
    if (array_parientes.length > 0) { 
        rellenarTablaParientes(array_parientes);
    }
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
                var campos_adecuacion = document.createElement('input');
                campos_adecuacion.setAttribute('id','archivo_input');
                campos_adecuacion.setAttribute('value','null');
                campos_adecuacion.setAttribute('type','file');
                campos_adecuacion.setAttribute('name','archivos');
                campos_adecuacion.setAttribute('accept','application/pdf');
                campos_adecuacion.style.cssText = 'width:100%';
                campos_adecuacion.multiple = false;
                campos_adecuacion.classList.add('boton_agregar_archivo');
                campos_adecuacion.textContent = "Agregar Archivo";
                datos_adecuacion.append(campos_adecuacion); 
         // input expedido por
     //label
        var etiqueta_solicitud_adecuacion = document.createElement('label');
        etiqueta_solicitud_adecuacion.textContent = "Expedido por: ";
        etiqueta_solicitud_adecuacion.classList.add('etiqueta_solicitud_adecuacion');
        datos_adecuacion.append(etiqueta_solicitud_adecuacion); 
        //input
        var campos_adecuacion = document.createElement('input');
        campos_adecuacion.type = "text"
        campos_adecuacion.setAttribute('id','input_ExpedidoPor');
        campos_adecuacion.setAttribute('title','Mínimo 4 caracteres');
        campos_adecuacion.classList.add('campos_adecuacion');
        datos_adecuacion.append(campos_adecuacion); 
    //btn
    var etiqueta_solicitud_adecuacion = document.createElement('a');
        etiqueta_solicitud_adecuacion.textContent = "Agregar Archivo";
        etiqueta_solicitud_adecuacion.setAttribute('onclick','agregararchivo(this);');
        etiqueta_solicitud_adecuacion.classList.add('boton_opciones');
        etiqueta_solicitud_adecuacion.style.cssText = 'width:fit-content; padding:10px; height:auto; margin: 0 auto; margin-top:20px; margin-bottom:20px;';
        datos_adecuacion.append(etiqueta_solicitud_adecuacion); 
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
                                th_Nombre_archivo.appendChild(document.createTextNode('Nombre'));
                            tr.append(th_Nombre_archivo);
                                var th_Expedido = document.createElement('th');
                                th_Expedido.setAttribute('scope','col');
                                th_Expedido.appendChild(document.createTextNode('Expedido por'))
                            tr.append(th_Expedido);
                                var th_Archivo = document.createElement('th');                            
                                th_Archivo.setAttribute('scope','col');
                                th_Archivo.appendChild(document.createTextNode('Archivo'));
                            tr.append(th_Archivo);
                                var th_Archivo = document.createElement('th');                            
                                th_Archivo.setAttribute('scope','col');
                                th_Archivo.appendChild(document.createTextNode('Acciones'));
                            tr.append(th_Archivo);
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
    
    if (array_archivos.length > 0) { 
        rellenarTablaArchivos(array_archivos);
    }
}

async function agregararchivo() {
    eventoArchivo = document.getElementById('archivo_input');
    for (let file of eventoArchivo.files) {
        var ext = file['name'].split('.').pop();
            if (file instanceof File && (ext == 'pdf' || ext == 'PDF') && file.size > 10000) {
                if (file['name'].length < 41) {
                    var input_ExpedidoPor = document.getElementById('input_ExpedidoPor').value;
                    if (validad_datos([input_ExpedidoPor], 4) && input_ExpedidoPor.length < 100 && isNaN(input_ExpedidoPor)) {
                        var promise = getBase64(file);
                        var my_pdf_file_as_base64 = await promise;
                        array_archivos.push({ expedidoPor: input_ExpedidoPor, nombre: removeExtension(file['name']), archivo64: my_pdf_file_as_base64.split(',')[1] });
                        rellenarTablaArchivos(array_archivos);
                        document.getElementById('progreso').style.width = '100%';
                        eventoArchivo.value = '';
                        document.getElementById('input_ExpedidoPor').value = '';
                        return;
                    } else {
                        toastr['error']("El campo 'expedido por' es requerido, mínimo 4 caracteres.'");
                        return;
                    }
                } else { 
                    toastr['error']("El nombre de archivo no debe ser mayor a 40 caracteres.'");
                    return;
                }
            } else { 
                toastr['error']("Debes agregar un archivo de tipo PDF menor a 10MB.'");
                return;
            }     
    }
    toastr['error']("Debes agregar un archivo primero'");
 }
    
function getBase64(file, onLoadCallback) {
    return new Promise(function(resolve, reject) {
        var reader = new FileReader();
        reader.onload = function() { resolve(reader.result); };
        reader.onerror = reject;
        reader.readAsDataURL(file);
    });
}

function removeExtension(filename) {
    return filename.substring(0, filename.lastIndexOf('.')) || filename;
  }


function rellenarTablaArchivos(listaarchhivos) {  //array_archivos
    tbody = document.getElementById('cuerpotabla');
    while (tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
    }
    listaarchhivos.forEach(archivo => {
    var tr = document.createElement('tr');
            var td_tipoPariente = document.createElement('td');
            td_tipoPariente.setAttribute('scope','col');
            td_tipoPariente.appendChild(document.createTextNode(archivo['nombre']));
        tr.append(td_tipoPariente);
            var td_ocupacionPariente = document.createElement('td');
            td_ocupacionPariente.setAttribute('scope','col');
            td_ocupacionPariente.appendChild(document.createTextNode(archivo['expedidoPor']));
        tr.append(td_ocupacionPariente);
            var td_cedulaPariente = document.createElement('td');
            td_cedulaPariente.setAttribute('scope','col');
            td_cedulaPariente.appendChild(document.createTextNode(".pdf"));
        tr.append(td_cedulaPariente);
         //
                var accion = document.createElement('a');
                accion.setAttribute('onclick', 'eliminarArchivo(' + "'" + archivo['nombre'] + "'" + ')');
                accion.setAttribute('title', 'Click para eliminar'); 
                accion.textContent = 'Eliminar';
                accion.classList.add('btn_eliminar');
                accion.style.cssText = 'cursor:pointer';  
            var td_accion = document.createElement('td');
            td_accion.setAttribute('scope','col');
            td_accion.appendChild(accion);
        tr.append(td_accion);
     //
tbody.append(tr);
});
}

function eliminarArchivo(nombre) { 
    array_archivos = array_archivos.filter(archivo => archivo.nombre != nombre);
    rellenarTablaArchivos(array_archivos);
    toastr['info']("Archivo eliminado.");
    if (array_archivos.length < 1) { 
        document.getElementById('progreso').style.width = '80%';
    }
}

function finalizar() { 
    if (array_archivos.length <= 0) { 
        toastr['error']("Agrega al menos un archivo.");
        return;
    }
    toastr['success']('Ya casi estas listo');
    toastr['info']('No recargues el navegador hasta que termine el proceso.');
    document.getElementById('Siguiente').hidden = true;
    document.getElementById('btn_atras').hidden = true;
    data = {
        cedula: document.getElementById('cedula').value,
        solicitud: array_DatosSolicitud,
        institucion: array_DatosAcademicos,
        necesidad_Apoyo: array_AtencionSeguimiento,
        saludActual: array_Salud,
        grupoFamiliar: array_grupoFamiliar,
        archivos: array_archivos,
    };

    fetch(urlapi + 'user/persona/estudiante/adecuacion', {
        method: 'post',
        headers: {
            'Content-Type': 'application/json',
            'Accept' : 'application/json',
            'Authorization': 'Bearer ' + token,
        },
        body: JSON.stringify(data),
    })
                           
        .then((response) => response.json())
        .then((data) => {
            if (data.status) {
                toastr['success']('Solicitud creada correctamente');
                sleep(2000).then(() => {
                    if (document.getElementById('tipousuario').value == 1) { 
                        window.location.href = route('lista_usuarios');
                        return;
                    }
                    window.location.href = route('Adecuacion');
                })
                //
            } else {
                toastr['info']("Ya posee una solicitud en curso");
                document.getElementById('Siguiente').hidden = false;
                document.getElementById('btn_atras').hidden = false;
            }
        })
        .catch((error) => {
            toastr['error']("Error interno");
            document.getElementById('Siguiente').hidden = false;
            document.getElementById('btn_atras').hidden = false;
        });
}

function sleep (time) {
    return new Promise((resolve) => setTimeout(resolve, time));
  }