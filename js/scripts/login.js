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
            success: function (Login) {
                //var Login = JSON.parse(response)
                if (Login.valido) {
                    window.location.replace("home.php");
                } else {
                    alert('Usuario o contraseña incorrecto.')
                }
            }
        });

    });
});