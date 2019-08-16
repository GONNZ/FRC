$(function () {
    var edit = false;
    listarUsuarios();


    //Función para listar en tabla
    function listarUsuarios() {
        let listar = {
            accion: 'listarUsuarios'
        }

        $.ajax({
            url: "controlador.php",
            type: 'POST',
            data: listar,
            success: function (response) {
                let usuarios = JSON.parse(response);


                let plantilla = '';
                usuarios.forEach(usuario => {
                    plantilla += `
                    <tr idUsuario="${usuario.id}">
                        <td>${usuario.id}</td>
                        <td>${usuario.cedula}</td>
                        <td>${usuario.nombre}</td>
                        <td>${usuario.apellidos}</td>
                        <td>${usuario.nombreUsuario}</td>
                        <td>${usuario.email}</td>
                        <td>${usuario.telefono}</td>
                        <td>${usuario.idRol}</td>
                        <td>
                            <button class = "btn btn-danger btn-sm elimina-usuario">
                            Eliminar
                            </button>
                        </td>

                        <td>
                            <button class = "btn btn-primary btn-sm edita-usuario">
                            Editar
                            </button>
                        </td>
                    
                    </tr>
                    `
                });

                $('#ListaUsuarios').html(plantilla);
            }
        });


    }






    //--------------Eventos del DOM

    //Registrar Formulario
    $('#frmUsuarios').submit(function (e) {
        e.preventDefault();

        let accion = edit === false ? 'IngresarUsuario' : 'EditaUsuario';

        let datosUsuario = {
            idEdit: $('#idEdit').val(),
            cedula: $('#cedula').val(),
            nombre: $('#nombre').val(),
            apellidos: $('#apellidos').val(),
            nomUsuario: $('#nombreUsuario').val(),
            telefono: $('#telefono').val(),
            email: $('#email').val(),
            rol: $('select[id=idRol]').val(),
            contrasena: $('#contrasena').val(),
            accion: accion
        }



        $.post("controlador.php", datosUsuario,
            function (response) {
                let inserta = JSON.parse(response);

                if (accion == 'IngresarUsuario') {

                    if (inserta) {

                        var dialog = new Messi(
                            'Usuario ingresado satisfactoriamente.',
                            {
                                title: 'Usuario añadido',
                                titleClass: 'anim info',
                                buttons: [{ id: 0, label: 'Aceptar', val: 'X' }]
                            }
                        );

                    } else {
                        var dialog = new Messi(
                            'Error al intentar ingresar el usuario.',
                            {
                                title: 'Error',
                                titleClass: 'anim error',
                                buttons: [{ id: 0, label: 'Close', val: 'X' }]
                            }
                        );
                    }

                } else {

                    if (inserta) {

                        var dialog = new Messi(
                            'Usuario editado correctamente.',
                            {
                                title: 'Usuario editado',
                                titleClass: 'anim info',
                                buttons: [{ id: 0, label: 'Aceptar', val: 'X' }]
                            }
                        );

                    } else {
                        var dialog = new Messi(
                            'Error al intentar editar el usuario.',
                            {
                                title: 'Error',
                                titleClass: 'anim error',
                                buttons: [{ id: 0, label: 'Aceptar', val: 'X' }]
                            }
                        );
                    }
                    edit = false;
                    $('#contrasena').removeAttr('disabled');
                }

                listarUsuarios();
                $('#frmUsuarios').trigger('reset');

            });

    });

    //Eliminar Registro

    $(document).on('click', '.elimina-usuario', function () {

        let btnelimina = $(this)[0].parentElement.parentElement;
        let id = $(btnelimina).attr('idUsuario');

        var dialog = new Messi(
            '¿Seguro que desea eliminar la categoría seleccionada?',
            {
                title: 'Eliminar',
                titleClass: 'error',
                buttons: [
                    { id: 0, label: 'Yes', val: id, class: '.caca' },
                    { id: 1, label: 'No', val: -1 }
                ],
                callback: function (id) {
                    if (id != -1) {


                        datos = {
                            id: id,
                            accion: 'eliminaUsuario'
                        }
                        $.ajax({
                            type: "POST",
                            url: "controlador.php",
                            data: datos,
                            success: function (response) {
                                setTimeout(function () {
                                    let elimina = JSON.parse(response);

                                    if (elimina) {
                                        var dialog = new Messi(
                                            'Usuario eliminado satisfactoriamente.',
                                            {
                                                title: 'Usuario eliminado',
                                                titleClass: 'anim info',
                                                buttons: [{ id: 0, label: 'Aceptar', val: 'X' }]
                                            }
                                        );
                                    } else {
                                        var dialog = new Messi(
                                            'Error al intentar eliminar el usuario.',
                                            {
                                                title: 'Error',
                                                titleClass: 'anim error',
                                                buttons: [{ id: 0, label: 'Close', val: 'X' }]
                                            }
                                        );
                                    }
                                    listarUsuarios();
                                }, 700)
                            }
                        });

                    }
                }
            }
        );





    });

    //Editar registro
    $(document).on('click', '.edita-usuario', function () {

        let btnelimina = $(this)[0].parentElement.parentElement;
        let id = $(btnelimina).attr('idUsuario');
        datos = {
            id: id,
            accion: 'llenaFormEdit'
        }
        $.ajax({
            type: "POST",
            url: "controlador.php",
            data: datos,
            success: function (response) {
                let usuario = JSON.parse(response);
                $('#idEdit').val(usuario.id);
                $('#cedula').val(usuario.cedula);
                $('#nombre').val(usuario.nombre);
                $('#apellidos').val(usuario.apellidos);
                $('#nombreUsuario').val(usuario.nombreUsuario);
                $('#telefono').val(usuario.telefono);
                $('#email').val(usuario.email);
                $('#idRol').val(usuario.idRol);
                $('#contrasena').attr('disabled', 'disabled');
                edit = true;
                
            }
        });

    });


    //Funciones para la UI

    function showMessage(texto, clase) {
        const mensaje = document.createElement('div');
        mensaje.className = `ml-4 alert alert-${clase} mt-4`;
        mensaje.appendChild(document.createTextNode(texto));
        //Showing in Dom
        const contenedor = document.querySelector('.container');
        const app = document.querySelector('#UsuariosMant');
        contenedor.insertBefore(mensaje, app);
        setTimeout(function () {
            document.querySelector('.alert').remove();
        }, 3000);
    }

    //_________________________________________


});