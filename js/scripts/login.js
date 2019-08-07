$(function () {


    $('#loginForm').submit(function (e) {
        e.preventDefault();
        let datosLogin = {
            accion: 'Login',
            nombreUsuario: $('#nomUsuario').val(),
            contra: $('#contra').val()
        }

        $.ajax({
            type: "POST",
            url: "controlador.php",
            data: datosLogin,
            dataType: "json",
            success: function (response) {
                console.log(response);
            }
        });
        
    });



});