function closeModal(close) {

  var botoncloseModal = document.getElementById("cerrar_modal_trabajo");
  var botoncloseIconX = document.getElementById("modal_trabajo_cierra");
  var botoncloseIcon = document.getElementById("cierra_x");
  var botoncerrarModalBeca = document.getElementById("cerrar_modal_beca");
  
  if (close == botoncloseModal) {
    $('#modal_trabajo').fadeOut();
  
  }
  if (close == botoncloseIconX) {
    $('#modal_trabajo').fadeOut();
  
  }
   
  if (close == botoncloseIcon ) {
    $('#modal_beca').fadeOut();
  
  }
  if (close == botoncerrarModalBeca) {
    $('#modal_beca').fadeOut();
  
  }
 
}

function openModal(ver) {
  var botonopenModal = document.getElementById("trabajo_modal");
  var botonopenModalEnfermedad = document.getElementById("enfermedad_modal");
  var botonopenModalBeca= document.getElementById("beca_modal");

  if (ver == botonopenModal) {
    $('#modal_trabajo').fadeIn();
  
  }
   if (ver == botonopenModalEnfermedad) {
    $('#modal_enfermedad').fadeIn();
  
  }
  if (ver == botonopenModalBeca) {
    $('#modal_beca').fadeIn();
  
  }
}


function mostrar(seleccionado) {

  if (seleccionado == "1") {
    document.getElementById("segunda_carrera").style.display = "flex";
  }
  if (seleccionado == "0") {
    document.getElementById("segunda_carrera").style.display = "none";
  }
}
function mostrar_traslado(traslado) {

  if (traslado == "1") {
    document.getElementById("Traslado_carrera").style.display = "flex";
  }
  if (traslado == "0") {
    document.getElementById("Traslado_carrera").style.display = "none";
  }
}
function mostrar_atencion(atencion) {

  if (atencion == "1") {
    document.getElementById("descripcion_atencion").style.display = "flex";
  }
  if (atencion == "0") {
    document.getElementById("descripcion_atencion").style.display = "none";
  }
}
function mostrar_datos_enfermedad(enfermedad) {

  if (enfermedad == "1") {
    document.getElementById("campos_info_enfermedad").style.display = "flex";
    document.getElementById("campos_info_tratamiento").style.display = "flex";
  }
  if (enfermedad == "0") {
    document.getElementById("campos_info_enfermedad").style.display = "none";
    document.getElementById("campos_info_tratamiento").style.display = "none";
  }
}
function mostrar_formtrabajo(trabajo) {

  if (trabajo == "1") {
    document.getElementById("trabajo").style.display = "flex";
  }
  if (trabajo == "0") {
    document.getElementById("trabajo").style.display = "none";
  }
}
function mostrar_inputbeca(beca) {

  if (beca == "1") {
    document.getElementById("tipo_beca").style.display = "flex";
  }
  if (beca == "0") {
    document.getElementById("tipo_beca").style.display = "none";
  }
}
function beca_socioeconomica(beca_socioeconomica) {

  if (beca_socioeconomica == "1") {
    document.getElementById("categoria_beca").style.display = "flex";
  }
  if (beca_socioeconomica == "0") {
    document.getElementById("categoria_beca").style.display = "none";
  }
}

function categoria_beca(categoria) {
  if (categoria == "1") {

  }
  if (categoria == "2") {

  }
  if (categoria == "3") {

  }
  if (categoria == "4") {

  }
  if (categoria == "5") {

  }

}

function beca_participacion(beca_participacion) {
  if (beca_participacion == "1") {
    document.getElementById("beca_participacion").style.display = "flex";
  }
  if (beca_participacion == "0") {
    document.getElementById("beca_participacion").style.display = "none";
  } 

}


