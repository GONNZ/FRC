$(function () {
    var edit = false;
    Listar();

    //Combo dinámico
    $('#idTipo').change(function (e) {
        e.preventDefault();
        let idTipo = $(this).val();
        let data = {
            id: idTipo,
            accion: 'comboCategorias'
        }

        $.ajax({
            type: "POST",
            url: "controlador.php",
            data: data,
            dataType: "json",
            success: function (response) {
                //console.log(response);
                $('#divCate').html(response);
            }
        });

    });

    function Listar() {
        let listar = {
            accion: 'listarServicios'
        }

        $.ajax({
            type: "POST",
            url: "controlador.php",
            data: listar,
            dataType: "json",
            success: function (servicios) {
                let plantilla = '';

                servicios.forEach(serv => {

                    plantilla += `
                        <tr idServ = "${serv.idServicio}">

                            <td>${serv.idServicio}</td>
                            <td>${serv.nombre}</td>
                            <td>${serv.idCategoria}</td>
                            <td>₡${serv.costoxsesion}</td>

                            <td>
                                <button class = "btn btn-danger btn-sm elimina-servicio margin-auto">
                                Eliminar
                                </button>
                            </td>

                            <td>
                                <button class = "btn btn-primary btn-sm edita-servicio">
                                Editar
                                </button>
                            </td>

                        </tr>
                    `

                });
                $('#ListaArticulos').html(plantilla);
            }
        });
    }


    //--------------Eventos del DOM
    //Registrar Formulario
    $('#frmServicios').submit(function (e) {
        e.preventDefault();
        let accion = edit === false ? 'IngresarServicio' : 'EditaServicio';

        let datosServicio = {
            nombre: $('#nomServ').val(),
            descripcion: $('#descripcion').val(),
            costo: $('#costo').val(),
            cate: $('select[id=idCate]').val(),
            accion: accion
        }

        $.ajax({
            type: "POST",
            url: "controlador.php",
            data: datosServicio,
            dataType: "json",
            success: function (response) {
                //Registro

                if (accion == 'IngresarServicio') {
                    if (response) {
                        var dialog = new Messi(
                            'Servicio ingresado satisfactoriamente.',
                            {
                                title: 'Servicio añadido',
                                titleClass: 'anim info',
                                buttons: [{ id: 0, label: 'Aceptar', val: 'X' }]
                            }
                        );
                    } else {
                        var dialog = new Messi(
                            'Error al intentar ingresar el servicio.',
                            {
                                title: 'Error',
                                titleClass: 'anim error',
                                buttons: [{ id: 0, label: 'Close', val: 'X' }]
                            }
                        );
                    }
                } else {

                }
                Listar();
                $('#frmServicios').trigger('reset');


                //Edición
            }
        });
    });

    //Eliminar
    $(document).on('click', '.elimina-servicio', function () {
        let btnelimina = $(this)[0].parentElement.parentElement;
        var idc = $(btnelimina).attr('idServ');

        var dialog = new Messi(
            '¿Seguro que desea eliminar el servicio seleccionado?',
            {
                title: 'Eliminar',
                titleClass: 'error',
                buttons: [
                    { id: 0, label: 'Yes', val: idc },
                    { id: 1, label: 'No', val: -1 }
                ],
                callback: function (id) {
                    if (id != -1) {
                        let data = {
                            idServ: id,
                            accion: 'eliminaServicio'
                        }

                        $.ajax({
                            type: "POST",
                            url: "controlador.php",
                            data: data,
                            dataType: "json",
                            success: function (response) {

                                //Timeout para separar las messi alert
                                setTimeout(function () {
                                    if (response) {
                                        var dialog = new Messi(
                                            'Servicio eliminado satisfactoriamente.',
                                            {
                                                title: 'Servicio eliminado',
                                                titleClass: 'anim info',
                                                buttons: [{ id: 0, label: 'Aceptar', val: 'X' }]
                                            }
                                        );
                                    } else {
                                        var dialog = new Messi(
                                            'Error al intentar eliminar el servicio.',
                                            {
                                                title: 'Error',
                                                titleClass: 'anim error',
                                                buttons: [{ id: 0, label: 'Close', val: 'X' }]
                                            }
                                        );
                                    }
                                    Listar();
                                }, 700)
                            }
                        });

                    }
                }
            }
        );

    });


    //Edita
    $(document).on('click', '.edita-servicio', function () {
        let btnelimina = $(this)[0].parentElement.parentElement;
        var ide = $(btnelimina).attr('idServ');

        datos = {
            id: ide,
            accion: 'formEditServicio'
        }

        $.ajax({
            type: "POST",
            url: "controlador.php",
            data: datos,
            dataType: "json",
            success: function (response) {
                /*   $(selector).val(value);
                  $(selector).val(value);
                  $(selector).val(value);
                  $(selector).val(value); */
                console.log(response);

            }
        });

    });
});