// Example starter JavaScript for disabling form submissions if there are invalid fields

function pass() {
    'use strict'


    var result=document.getElementById("resultado");
    var inpassword=document.getElementById("inpassword");


        var inputPassword = document.getElementById('password').value;
        var inputPassword2 = document.getElementById('password2').value;


        /*    
        *   R=botón registro disabled
        *   V=contraseña valida >8
        *   E=contraseñas desiguales
        *       ___________________________________________
        *       |     V    |     True     |  false         |
        *       |     E    |______________|________________|
        *       |    true  |    R=false   |  R=true        |
        *       |   false  |    R=true    |  R=true        |
        *       |__________|______________|________________| 
        * 
        * *   Entonces  (R'=VE )   (R=VE'+V'E+V'E')  Simplicando queda (R'=VE ) (R=V'+VE')
        * */
          var msgPasswordvalid="<span class='badge badge-success'>Contraseña válida</span>";
          var msgPasswordinvalid="<span class='badge badge-danger'>La contraseña debe contener mínimo 8 carácteres</span>";
          var msgPasswordsMatch="<span class='badge badge-success'>Las contraseñas coinciden</span>";
          var msgPasswordsUnmatch="<span class='badge badge-danger'>Las contraseñas no coinciden</span>";

          if((inputPassword.length<8))
          {
            inpassword.innerHTML = msgPasswordinvalid;
            result.innerHTML = msgPasswordinvalid;
            document.getElementById("submit-btn").disabled=true;
          }
          else if((inputPassword !== inputPassword2))
          {
            inpassword.innerHTML = msgPasswordvalid;
            result.innerHTML = msgPasswordsUnmatch;
            document.getElementById("submit-btn").disabled=true;             
          } 
          
          else{
            inpassword.innerHTML =msgPasswordvalid ;
            result.innerHTML = msgPasswordsMatch;
            document.getElementById("submit-btn").disabled=false;
          }

                  
}




  
  