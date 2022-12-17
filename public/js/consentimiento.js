var terminosycondiciones = false;
$('#modal_consentimiento').fadeIn();
document.getElementById('modal_consentimiento').style.backgroundColor = 'black';

function closeModalconsentimiento() { 
    $('#modal_consentimiento').fadeOut();
}

function aceptarContinuar() { 
    closeModalconsentimiento();
    terminosycondiciones = true;
}