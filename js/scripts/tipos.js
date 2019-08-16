$(function () {
    var edit = false;
    Listar();


    //Listar
    function Listar() {
        let listar = {
            accion: 'ListarTipos'
        }

        $.ajax({
            type: "POST",
            url: "controlador.php",
            data: listar,
            dataType: "json",
            success: function (response) {
                let tipos = response;

                let plantilla = '';
                tipos.forEach(tipo => {
                    plantilla += `
                    <tr idTipo="${tipo.idTipo}">
                    <td>${tipo.idTipo}</td>
                    <td>${tipo.tipo}</td>
                    <td>
                        <button class = "btn btn-danger btn-sm elimina-tipo margin-auto">
                        Eliminar
                        </button>
                    </td>

                    <td>
                        <button class = "btn btn-primary btn-sm edita-tipo">
                        Editar
                        </button>
                    </td>
        
                </tr>
                    `;
                });
                $('#ListaArticulos').html(plantilla);
            }
        });

    }

    //--------------Eventos del DOM
    //Registrar Formulario

    $('#frmTipos').submit(function (e) {
        e.preventDefault();

        let accion = edit === false ? 'IngresarTipo' : 'EditaTipo';

        let datosTipo = {
            tipo: $('#nomTipo').val(),
            id: $('#idEdit').val(),
            accion: accion
        }

        $.ajax({
            type: "POST",
            url: "controlador.php",
            data: datosTipo,
            dataType: "json",
            success: function (response) {

                //Ingresar
                if (accion == 'IngresarTipo') {
                    if (response) {
                        var dialog = new Messi(
                            'Tipo de servicio creado satisfactoriamente.',
                            {
                                title: 'Tipo añadido',
                                titleClass: 'anim info',
                                buttons: [{ id: 0, label: 'Aceptar', val: 'X' }]
                            }
                        );
                    } else {
                        var dialog = new Messi(
                            'Error al intentar ingresar el tipo de servicio.',
                            {
                                title: 'Error',
                                titleClass: 'anim error',
                                buttons: [{ id: 0, label: 'Close', val: 'X' }]
                            }
                        );
                    }

                    //Editar
                } else {
                    if (response) {
                        var dialog = new Messi(
                            'Tipo editado satisfactoriamente.',
                            {
                                title: 'Tipo de servicio editado',
                                titleClass: 'anim info',
                                buttons: [{ id: 0, label: 'Aceptar', val: 'X' }]
                            }
                        );
                    } else {
                        var dialog = new Messi(
                            'Error al intentar editar el tipo.',
                            {
                                title: 'Error',
                                titleClass: 'anim error',
                                buttons: [{ id: 0, label: 'Close', val: 'X' }]
                            }
                        );
                    }
                }
                Listar();
                $('#frmTipos').trigger('reset');
            }
        });

    });

    //Eliminar

    $(document).on('click', '.elimina-tipo', function () {

        let btnelimina = $(this)[0].parentElement.parentElement;
        var idc = $(btnelimina).attr('idTipo');

        var dialog = new Messi(
            '¿Seguro que desea eliminar el tipo de servicio seleccionado?',
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
                            id: id,
                            accion: 'eliminatipo'
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
                                            'Tipo eliminado satisfactoriamente.',
                                            {
                                                title: 'Tipo de servicio eliminado',
                                                titleClass: 'anim info',
                                                buttons: [{ id: 0, label: 'Aceptar', val: 'X' }]
                                            }
                                        );
                                    } else {
                                        var dialog = new Messi(
                                            'Error al intentar eliminar el tipo de servicio.',
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

    //Editar
    $(document).on('click', '.edita-tipo', function () {
        let btedita = $(this)[0].parentElement.parentElement;
        var ide = $(btedita).attr('idTipo');

        datos = {
            id: ide,
            accion: 'formEditTipo'
        }

        $.ajax({
            type: "POST",
            url: "controlador.php",
            data: datos,
            dataType: "json",
            success: function (response) {
                $('#idEdit').val(response.idTipo);
                $('#nomTipo').val(response.tipo);
                edit = true;
            }
        });


    });



});