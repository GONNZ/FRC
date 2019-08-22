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

    $('#RegistroForm').submit(function (e) {
        e.preventDefault();

        let accion = 'Registro';

        let datosUsuario = {
            cedula: $('#cedula').val(),
            nombre: $('#nombre').val(),
            apellidos: $('#apellidos').val(),
            nomUsuario: $('#nombreUsuario').val(),
            telefono: $('#telefono').val(),
            email: $('#email').val(),
            contrasena: $('#contraRegistro').val(),
            accion: accion
        }

        $.ajax({
            type: "POST",
            url: "controlador.php",
            data: datosUsuario,
            dataType: "json",
            success: function (response) {
                if (response) {

                    var dialog = new Messi(
                        'Bienvenido a la comunidad FRC, inicia sesión para ver todo lo que tenemos para ofrecerte.',
                        {
                            title: 'Registro completado satisfactoriamente',
                            titleClass: 'anim info',
                            buttons: [{ id: 0, label: 'Aceptar', val: 'X' }]
                        }
                    );

                } else {
                    var dialog = new Messi(
                        'Error al intentar registrarse.',
                        {
                            title: 'Error',
                            titleClass: 'anim error',
                            buttons: [{ id: 0, label: 'Close', val: 'X' }]
                        }
                    );
                }
            }
        });

    });

});