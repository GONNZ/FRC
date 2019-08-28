$(function () {
    var edit = false;
    Listar();

    //Combo dinámico
    $('#idTipo').change(function (e) {
        e.preventDefault();
        let idTipo = $(this).val();
        comboDinamico(idTipo);

    });
    //Funcion para armamr dinamicamente un combo según el tipo seleccionado, se usa en función para
    //Reutilizarlo en el edit
    function comboDinamico(idTipo) {
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
    }

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
            id: $('#idEdit').val(),
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

                    if (response) {
                        var dialog = new Messi(
                            'Servicio editado satisfactoriamente.',
                            {
                                title: 'Servicio editado',
                                titleClass: 'anim info',
                                buttons: [{ id: 0, label: 'Aceptar', val: 'X' }]
                            }
                        );
                    } else {
                        var dialog = new Messi(
                            'Error al intentar editar el servicio.',
                            {
                                title: 'Error',
                                titleClass: 'anim error',
                                buttons: [{ id: 0, label: 'Close', val: 'X' }]
                            }
                        );
                    }

                    var edit = false;
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
                $('#idEdit').val(response.idServicio);
                $('#nomServ').val(response.nombre);
                $('#descripcion').val(response.descripcion);
                $('#costo').val(response.costoxsesion);
                var Categoria = response.idCategoria;

                let getTipo = {
                    id: Categoria,
                    accion: 'getTipo'
                }

                $.ajax({
                    type: "POST",
                    url: "controlador.php",
                    data: getTipo,
                    dataType: "json",
                    success: function (response) {
                        console.log(response.idTipo);
                        $('#idTipo').val(response.idTipo);
                        comboDinamico(response.idTipo);
                        console.log(Categoria);
                        $('#idCate').val(28);
                    }
                });

            }
        });

        edit = true;
    });
});