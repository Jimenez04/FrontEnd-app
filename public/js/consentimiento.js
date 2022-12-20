var terminosycondiciones = false;
$("#modal_consentimiento").fadeIn();
//document.getElementById("modal_consentimiento").style.backgroundColor = "black";
document.querySelector(".Principal_New_Adecuacion").style.filter = "blur(5px)";

function closeModalconsentimiento() {
    console.log("closeModalconsentimiento");
    $("#modal_consentimiento").fadeOut();
    document.querySelector(".Principal_New_Adecuacion").style.filter =
        "blur(0)";
}

function aceptarContinuar() {
    closeModalconsentimiento();
    terminosycondiciones = true;
}
