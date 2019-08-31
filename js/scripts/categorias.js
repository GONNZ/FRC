$(function () {
    var edit = false;
    Listar();


    //Función para listar 
    function Listar() {
        let listar = {
            accion: 'listarCategorias'
        }

        $.ajax({
            type: "POST",
            url: "controlador.php",
            data: listar,
            dataType: 'json',
            success: function (response) {
                let categorias = response;

                let plantilla = '';
                categorias.forEach(cate => {

                    plantilla += `
                    <tr idCate="${cate.idCategoria}">
                    <td>${cate.idCategoria}</td>
                    <td>${cate.categoria}</td>
                    <td>${cate.idTipo}</td>
                    <td>
                        <button class = "btn btn-danger btn-sm elimina-categoria margin-auto">
                        Eliminar
                        </button>
                    </td>

                    <td>
                        <button class = "btn btn-primary btn-sm edita-categoria">
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
    $('#frmCategoria').submit(function (e) {
        e.preventDefault();

        let accion = edit === false ? 'IngresarCategoria' : 'EditaCategoria';

        let datosCategoria = {
            nombrecate: $('#nomCat').val(),
            idCate: $('#idEdit').val(),
            idtipo: $('select[id=idTipo]').val(),
            accion: accion
        }

        $.ajax({
            type: "POST",
            url: "controlador.php",
            data: datosCategoria,
            dataType: "json",
            success: function (response) {


                if (accion == 'IngresarCategoria') {
                    //Ingresa
                    if (response) {
                        var dialog = new Messi(
                            'Categoría creada satisfactoriamente.',
                            {
                                title: 'Categoría añadida',
                                titleClass: 'anim info',
                                buttons: [{ id: 0, label: 'Aceptar', val: 'X' }]
                            }
                        );
                    } else {
                        var dialog = new Messi(
                            'Error al intentar ingresar la categoría.',
                            {
                                title: 'Error',
                                titleClass: 'anim error',
                                buttons: [{ id: 0, label: 'Close', val: 'X' }]
                            }
                        );
                    }
                    //Edita
                } else {
                    if (response) {
                        var dialog = new Messi(
                            'Categoría editada satisfactoriamente.',
                            {
                                title: 'Categoría editada',
                                titleClass: 'anim info',
                                buttons: [{ id: 0, label: 'Aceptar', val: 'X' }]
                            }
                        );
                    } else {
                        var dialog = new Messi(
                            'Error al intentar editar la categoría.',
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
                $('#frmCategoria').trigger('reset');
            }
        });

    });

    //Eliminar
    $(document).on('click', '.elimina-categoria', function () {

        let btnelimina = $(this)[0].parentElement.parentElement;
        var idc = $(btnelimina).attr('idCate');

        var dialog = new Messi(
            '¿Seguro que desea eliminar la categoría seleccionada?',
            {
                title: 'Eliminar',
                titleClass: 'error',
                buttons: [
                    { id: 0, label: 'Yes', val: idc},
                    { id: 1, label: 'No', val: -1 }
                ],
                callback: function (id) {
                    if (id != -1) {
                        let data = {
                            idCate: id,
                            accion: 'eliminacategoria'
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
                                            'Categoría eliminada satisfactoriamente.',
                                            {
                                                title: 'Categoría eliminada',
                                                titleClass: 'anim info',
                                                buttons: [{ id: 0, label: 'Aceptar', val: 'X' }]
                                            }
                                        );
                                    } else {
                                        var dialog = new Messi(
                                            'Error al intentar eliminar la categoría.',
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
    $(document).on('click', '.edita-categoria', function () {
        let btedita = $(this)[0].parentElement.parentElement;
        var ide = $(btedita).attr('idCate');

        datos = {
            id: ide,
            accion: 'formEditCategotia'
        }

        $.ajax({
            type: "POST",
            url: "controlador.php",
            data: datos,
            dataType: "json",
            success: function (response) {
                $('#idEdit').val(response.idCategoria);
                $('#nomCat').val(response.categoria);
                $('#idTipo').val(response.idTipo);
                edit = true;
            }
        });


    });


});