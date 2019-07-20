$(function () {

    listarUsuarios();

    //Función para listar en tabla
    function listarUsuarios() {
        let listar = {
            accion: 'listarUsuarios'
        }
        /*$.ajax({
            type: "GET",
            url: "controlador.php",
            data: listar,
            success: function (response) {
                console.log(response);
            }
        });*/
        $.post("controlador.php", listar,
            function (response) {
                console.log(response);
            }
        );
    }

    //Eventos del DOM
    $('#frmUsuarios').submit(function (e) {
        e.preventDefault();
        let datosUsuario = {
            cedula: $('#cedula').val(),
            nombre: $('#nombre').val(),
            apellidos: $('#apellidos').val(),
            nomUsuario: $('#nombreUsuario').val(),
            telefono: $('#telefono').val(),
            email: $('#email').val(),
            rol: $('select[id=idRol]').val(),
            contrasena: $('#contrasena').val(),
            accion: 'add'
        }

        /* 
        let rol = {
             rol: $('select[id=idRol]').val()
         }
 
         $.post("test.php", rol,
             function (response) {
                 console.log(response);
             }
         );
         */

        $.post("controlador.php", datosUsuario,
            function (response) {
                console.log(response);
            });

    });



});