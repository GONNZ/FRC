$(function () {

    listarUsuarios();
    showMessage("Bienvenido", "success");

    //Función para listar en tabla
    function listarUsuarios() {
        let listar = {
            accion: 'listarUsuarios'
        }
        /*
        $.ajax({
            type: "get",
            url: "controlador.php",
            data: listar,
            success: function (response) {
                console.log(response);
            }
        });
       */

        $.post("controlador.php", listar,
            function (response) {
                let usuarios = JSON.parse(response);


                let plantilla = '';
                usuarios.forEach(usuario => {
                    plantilla += `
                    <tr>
                        <td>${usuario.id}</td>
                        <td>${usuario.cedula}</td>
                        <td>${usuario.nombre}</td>
                        <td>${usuario.apellidos}</td>
                        <td>${usuario.nombreUsuario}</td>
                        <td>${usuario.email}</td>
                        <td>${usuario.telefono}</td>
                        <td>${usuario.rol}</td>
                    
                    </tr>
                    `
                });

                $('#ListaUsuarios').html(plantilla);
            }
        );
    }







    //Funciones para la UI

    function showMessage(texto, clase) {
        const mensaje = document.createElement('div');
        mensaje.className = `alert alert-${clase} mt-4`;
        mensaje.appendChild(document.createTextNode(texto));
        //Showing in Dom
        const contenedor = document.querySelector('.container');
        const app = document.querySelector('#UsuariosMant');
        contenedor.insertBefore(mensaje, app);
        setTimeout(function () {
            document.querySelector('.alert').remove();
        }, 2000);
    }

    //_________________________________________




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
            accion: 'IngresarUsuario'
        }

        $.post("controlador.php", datosUsuario,
            function (response) {
                let inserta = JSON.parse(response);

                if (inserta) {
                    showMessage("Usuario añadido correctamente.", "success");
                } else {
                    showMessage("Error al añadir usuario", "danger");
                }
                listarUsuarios();
            });

    });



});