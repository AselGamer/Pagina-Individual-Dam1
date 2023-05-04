$(document).ready(function () 
{
 let usuCorrecto = false;
 let passCorrecta = false; 

    $("#nombreusuario").keyup(function () {
        console.log(/[A-Z]/.test($(this).val()));
    });

    $("#password").keyup(function () {
        if ($(this).val() != $("#repassword").val()) {
            passCorrecta = false;
        } else {
            passCorrecta = true;
        }
        
    });

    $("#repassword").keyup(function () {
        if ($(this).val() != $("#password").val()) {
            passCorrecta = false;
        } else {
            passCorrecta = true;
        }
        
    });

   $("#registrarse").click(function (event) 
   {
    console.log("usuario: " + usuCorrecto + " pass: " + passCorrecta);
    $(".entradaTexto").css("background-color", "");
        if (passCorrecta == false || usuCorrecto == false) {
            event.preventDefault();
        }

        if (!passCorrecta) {
            $("#password").css("background-color", "red");
            $("#repassword").css("background-color", "red");
        }

        if (/[A-Z]/.test($("#nombreusuario").val()) == true) {
            $("#nombreusuario").css("background-color", "red");
        }

        if(usuCorrecto == false && /[A-Z]/.test($("#nombreusuario").val()) == false)
        {
            $.ajax(
                {
                    data: {function: "checkUsuario", nombre_usuario: $("#nombreusuario").val()},
                    url: 'http://192.168.0.84/Pagina-Individual-Dam1/servicios.php',
                    type:'post',
                    success: function (response) {
                        arrayUsus = $.parseJSON(response);
    
                        if (arrayUsus.nombre != undefined) {
                            usuCorrecto = false;
                            $("#nombreusuario").css("background-color", "red");
                        } else {
                            usuCorrecto = true;
                            $("#registrarse").trigger("click");
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                }
            )
        }        
   });
});