function Seleccionar() {

    var check_hombre= document.getElementById("check_male");
    var check_mujer= document.getElementById("check_female");
    var check_otro= document.getElementById("check_other");


    check_hombre.onclick = function(){ 
        if(check_hombre.checked != false){ 
            check_mujer.checked =null; 
            check_otro.checked =null;
        }
    }
         
         check_mujer.onclick = function(){ 
        if(check_mujer.checked != false){ 
            check_hombre.checked=null;
            check_otro.checked =null;
         }
        }
         check_otro.onclick = function(){ 
            if(check_otro.checked != false){ 
                check_hombre.checked=null;
                check_mujer.checked =null; 
             }

            }
    
}
