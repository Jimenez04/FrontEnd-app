function validarcampos_DatosSolicitud() {
    
    datos = [];
    razon_Solicitud = document.getElementById('input_RazonSolicitud').value;
    carrera_Empadronada = document.getElementById('input_CarreraEmpadronada').value;
    ano_ingreso_carrera = document.getElementById('input_AnoIngresoCarreraEmpadronada').value;
    nivel_carrera = document.getElementById('input_Niveldecarrera').value;
    nombre_segunda_carrera = document.getElementById('input_NombreSegundaCarrera').value;
    realizo_Traslado_Carrera = $('input:radio[name=seleccion_traslado]:checked').val();
    seleccion_2carrera = $('input:radio[name=seleccion_2carrera]:checked').val();
    carrera_empadronado_anterior = document.getElementById('input_carrera_anterior').value;

    var estado = validad_datos_mensaje([razon_Solicitud], 10, "Razon Solicitud");
    if (estado['estado'] && razon_Solicitud.length < 255 && isNaN(razon_Solicitud)) {
       
        estado = validad_datos_mensaje([carrera_Empadronada], 4, "Carrera Empadronada");
        if (estado['estado'] && carrera_Empadronada.length < 255 && isNaN(carrera_Empadronada)) {
            let isValidDate = Date.parse(ano_ingreso_carrera);
            if (isNaN(isValidDate)) {
                toastr['error']("Revisa fecha de ingreso");
                return false;
            }

            if ((nivel_carrera > 0 && nivel_carrera < 101) && !isNaN(nivel_carrera)) {
                if (seleccion_2carrera == 1) {
                    estado = validad_datos_mensaje([nombre_segunda_carrera], 4, "Nombre de segunda carrera");
                    if (!estado['estado'] || !isNaN(nombre_segunda_carrera) || nombre_segunda_carrera.length > 251) {
                        toastr['error']( !estado['estado'] ? estado['mensaje'] : "Revisa tu nombre de segunda carrera");
                        return false;
                    }
                }
                if (realizo_Traslado_Carrera == 1) {
                    estado = validad_datos_mensaje([carrera_empadronado_anterior], 5, "Carrera empadronada anterior");
                        if (!estado['estado'] || !isNaN(carrera_empadronado_anterior)) {
                            toastr['error']( !estado['estado'] ? estado['mensaje'] :"Revisa tu carrera empadronada anterior");
                            return false;
                        }
                } 
                    datos = ({
                        razon_Solicitud: razon_Solicitud,
                        ano_ingreso_carrera: ano_ingreso_carrera,
                        carrera_Empadronada: carrera_Empadronada,
                        nivel_carrera: nivel_carrera,
                        nombre_segunda_carrera: nombre_segunda_carrera,
                        realizo_Traslado_Carrera: realizo_Traslado_Carrera,
                        carrera_empadronado_anterior: carrera_empadronado_anterior,
                    })
                if (realizo_Traslado_Carrera == 0) { 
                    delete datos.carrera_empadronado_anterior;
                }
                if (seleccion_2carrera == 0) { 
                    delete datos.nombre_segunda_carrera;
                }
                array_DatosSolicitud = datos;
                return true;
            } else { 
                toastr['error']("Revisa tu nivel de carrera actual, debe ser un número entre 1 y 100");
            }
        } else { 
            toastr['error']( !estado['estado'] ? estado['mensaje'] : "Revisa tu carrera actual");
        }
    } else { 
        toastr['error']( !estado['estado'] ? estado['mensaje'] :  "Revisa tu razón");
    }
    return false;
}
 
function validarCampos_DatosAcademicos() { 
   // return true;

    var nombre = document.getElementById('input_InstitucionProcedencia').value;
    var ano_egreso = document.getElementById('input_Año_Egreso').value;
    var ano_ingreso_universidad = document.getElementById('input_Año_ingreso_Universidad').value;

    var estado = validad_datos_mensaje([nombre], 6, "Nombre de la Institución de procedencia");
        if (estado['estado'] && nombre.length < 254 && isNaN(nombre)) {
            let isValidDate = Date.parse(ano_egreso);
            if (isNaN(isValidDate)) {
                toastr['error']("Revisa la fecha de egreso de la institución");
                return false;
            }
                isValidDate = Date.parse(ano_ingreso_universidad);
                if (isNaN(isValidDate)) {
                    toastr['error']("Revisa la fecha de ingreso a la universidad");
                    return false;
                }
                array_DatosAcademicos = ({
                    nombre: nombre,
                    ano_egreso: ano_egreso,
                    ano_ingreso_universidad: ano_ingreso_universidad,
                });
            return true;
        } else { 
            toastr['error']( !estado['estado'] ? estado['mensaje'] : "Revisa el nombre de la institución de procedencia");
        }
    return false;
}

function validarCampos_Necesidad_Y_Apoyo() { 
    // return true;
    var diagnostico = document.getElementById('input_Diagnostico').value;
    var area_Profesional = document.getElementById('input_ProfesionalDiagnostica').value;
    var recibe_atencionyseguimiento = $('input:radio[name=seleccion_atencion]:checked').val();
    var atencionyseguimiento = document.getElementById('descripcion_atencion_input').value;
    
    if (diagnostico.length > 0 && isNaN(diagnostico)) {
        var estado = validad_datos_mensaje([diagnostico], 6, "Diágnostico");
        if (estado['estado'] && diagnostico.length < 254 && isNaN(diagnostico)) {
            estado = validad_datos_mensaje([area_Profesional], 6, "Área de profesional que diágnostica");
            if (estado['estado'] && area_Profesional.length < 254 && isNaN(area_Profesional)) {
                if (recibe_atencionyseguimiento == 1) {
                    estado = validad_datos_mensaje([atencionyseguimiento], 6, "Atención y Seguimiento");
                    if (!estado['estado'] || !isNaN(atencionyseguimiento)) {
                        toastr['error']( !estado['estado'] ? estado['mensaje'] : "Revisa el campo de 'tipo de atención y seguimiento'");
                        return false;
                    } 
                } else { 
                    atencionyseguimiento = '';
                } 
                array_AtencionSeguimiento = ({
                    diagnostico: diagnostico,
                    area_Profesional: area_Profesional,
                    recibe_atencionyseguimiento: recibe_atencionyseguimiento,
                    atencionyseguimiento: atencionyseguimiento,
                });
                if (recibe_atencionyseguimiento == 0) { 
                    delete array_AtencionSeguimiento.atencionyseguimiento;
                }
                    return validarCampos_Salud();
            } else { 
                toastr['error']( !estado['estado'] ? estado['mensaje'] : "Revisa el nombre del profesional");
                        return false;
            }
        } else { 
            toastr['error']( !estado['estado'] ? estado['mensaje'] : "Revisa el campo de diágnostico");
            return false;
        }
    } else { 
        array_AtencionSeguimiento = null;
        toastr['error']("Es obligatorio agregar una necesidad y apoyo");
        array_Salud = null;
        return false
        // array_AtencionSeguimiento = null;
        // return validarCampos_Salud();
    }
}

function validarCampos_Salud() { 
   // return true;
var afectacionDesempeno = $('input:radio[name=seleccion_enfermedad]:checked').val();
var enfermedad = document.getElementById('input_Cual_enfermedad').value;
    var tratamiento = document.getElementById('input_Tratamiento_enfermedad').value;
    if (afectacionDesempeno == 1) {
        var estado = validad_datos_mensaje([enfermedad], 6, "¿Cúal enfermedad?");
        if (estado['estado'] && enfermedad.length < 254 && isNaN(enfermedad)) {
            var estado = validad_datos_mensaje([tratamiento], 6, "Tratamiento");
            if (estado['estado'] || isNaN(tratamiento)) {
                array_Salud = ({
                    afectacionDesempeno: afectacionDesempeno,
                    enfermedad: enfermedad,
                    tratamiento: tratamiento,
                });
                return true;
            } else { 
                toastr['error']( !estado['estado'] ? estado['mensaje'] :"Revisa el campo de 'Tratamiento médico utilizado'");
                return false;
            } 
        } else { 
            toastr['error']( !estado['estado'] ? estado['mensaje'] :"Revisa el campo de '¿Cúal?'");
            return false;
        } 
    } else { 
        enfermedad = '';
        tratamiento = '';
        array_Salud = ({
            afectacionDesempeno: afectacionDesempeno,
        });
        return true;
    } 
}

function validarCampos_GrupoFamiliar() { 
   // return true;
    var descripcion_De_Discapacidades = document.getElementById('discapacidad_grupo').value;
    if (array_parientes.length > 0) {
        var estado = validad_datos_mensaje([descripcion_De_Discapacidades], 10, "Descripción de discapacidades de grupo familiar");
        if (estado['estado']  && descripcion_De_Discapacidades.length < 254 && isNaN(descripcion_De_Discapacidades)) {
            array_grupoFamiliar = (
                {
                    descripcion_De_Discapacidades: descripcion_De_Discapacidades,
                    pariente: array_parientes
                }
            );
            return true;
        } else { 
            toastr['error']( !estado['estado'] ? estado['mensaje'] : "Revisa el campo de 'Descripción de discapacidades'");
        }
    } else { 
        toastr['error']("Debes agregar al menos un pariente");
    }
}

function validad_datos_mensaje(array, largo, nombrevariable) { 
    var validacion = true;
    array.forEach(element => {
        if ((element.trim() == " " || element == null) || element.trim().length < largo) {
            validacion = false;
        }
        });
    if (!validacion) return { estado: false, mensaje: "El campo '" + nombrevariable + "' debe tener al menos " + largo + " caracteres"};
    return { estado : true};
}