$(function () {

    //Combo dinámico
    $('#idTipo').change(function (e) {
        e.preventDefault();
        let idTipo = $(this).val();
        comboDinamico(idTipo);

    });
    //Combo dinámico
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

    $('#frmServiciosCli').submit(function (e) {
        e.preventDefault();
        var idC = $('select[id=idCate]').val()
        let datos = {
            id: idC,
            accion: 'FiltroServicios'
        }

        $.ajax({
            type: "POST",
            url: "controlador.php",
            data: datos,
            dataType: "json",
            success: function (response) {

                let plantilla = '';

                if (response.valido) {

                    plantilla += '<h3>Resultados:</h3>';

                    var servicios = response.servicios
                    let id = idC;

                    let getTipo = {
                        id: idC,
                        accion: 'getTipo'
                    }

                    $.ajax({
                        type: "POST",
                        url: "controlador.php",
                        data: getTipo,
                        dataType: "json",
                        success: function (tipo) {



                            servicios.forEach(serv => {
                                plantilla += `
                                <div class="card mt-3">
                                    <div class="card-header">
                                        ${tipo.nomTipo} - ${tipo.tipo.categoria}
                                    </div>
                                    <div class="card-body" idServicio = "${serv.idServicio}">
                                        <div class="mt-3">
                                            <form id="formCita">
                                                <div class="form-group" style="width: 40%">
                                                    <h5 class="card-title">${serv.nombre}</h5>
                                                    <p class="card-text" style="width: 669px;">${serv.descripcion}</p>
                                                    <small class="form-text text-muted mb-2"><b>Costo por sesión: ₡</b>${serv.costoxsesion}</small>
                                                    <label class="card-text" for="fechaCita">Indique la fecha de la sesión</label>
                                                    <input type="date" class="form-control form-control-sm" id="${serv.idServicio}" required>
                                                    <button  type="submit" class="btnCarrito btn btn-success mb-3 mt-3 ml-0">Agregar a carrito</button>
                                                </div>
                                            </form>
                                        </div>
                                  </div>
                                </div>
                                `;
                            });

                            $('#Resultados').html(plantilla);
                        }
                    });
                } else {
                    plantilla = `
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Functional and Rehabilitation Center: </strong> De momento no contamos con servicios para los filtros elegidos. <br> Tomaremos tu búsqueda como una sugerencia para abrir próximamente un servicio bajo estas selecciones.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                    `;
                }

                $('#Resultados').html(plantilla);
            }
        });

    });


    //Añadir a Carrito
    $(document).on('click', '.btnCarrito', function (e) {

        e.preventDefault();
        let btn = this.parentElement.parentElement.parentElement.parentElement;
        idServ = $(btn).attr('idservicio');
        var idinputFecha = '#' + idServ;
        var fechaCita = $(idinputFecha).val();

        if (fechaCita == '') {
            var dialog = new Messi(
                'Seleccione una fecha para agregar la cita al carrito',
                {
                    title: 'Error',
                    titleClass: 'anim error',
                    buttons: [{ id: 0, label: 'Cerrar', val: 'X' }]
                }
            );
        } else {
            let datos = {
                id: idServ,
                fecha: fechaCita,
                accion: 'añadirCarrito'
            }

            $.ajax({
                type: "POST",
                url: "controlador.php",
                data: datos,
                dataType: "json",
                success: function (response) {
                    if (response) {

                        var dialog = new Messi(
                            'Servicio añadido satisfactoriamente al carrito.',
                            {
                                title: 'Servicio añadido',
                                titleClass: 'anim success',
                                buttons: [{ id: 0, label: 'Aceptar', val: 'X' }]
                            }
                        );

                    } else {

                        var dialog = new Messi(
                            'Error al intentar agregar lo seleccionado al carrito de compras',
                            {
                                title: 'Error',
                                titleClass: 'anim error',
                                buttons: [{ id: 0, label: 'Cerrar', val: 'X' }]
                            }
                        );

                    }
                }
            });
        }



    });


    $('#btnCarrito').click(function (e) {
        e.preventDefault();
        ListarCarrito();
    });


    $(document).on('click', '.btnCarritoElim', function () {
        elemento = this.parentElement.parentElement.parentElement;
        idCarrito = $(elemento).attr('indexcarrito');

        let datos = {
            accion: 'borradeCarrito',
            id: idCarrito
        }

        $.ajax({
            type: "POST",
            url: "controlador.php",
            data: datos,
            dataType: "json",
            success: function (response) {
                ListarCarrito();
            }
        });

    });


    //Evento confirma carrito
    $('#confirmaCarrito').click(function (e) {
        e.preventDefault();

        let datos = {
            accion: 'confirmaCarrito'
        }

        $.ajax({
            type: "POST",
            url: "controlador.php",
            data: datos,
            dataType: "json",
            success: function (response) {
                if (response) {
                    var dialog = new Messi(
                        'Citas agendadas satisfactoriamente.',
                        {
                            title: 'Bienvenido a la comunidad FRC',
                            titleClass: 'anim info',
                            buttons: [{ id: 0, label: 'Aceptar', val: 'X' }]
                        }
                    );
                    ListarCarrito();
                } else {
                    var dialog = new Messi(
                        'Debe agregar algún servicio al carrito antes de realizar esta acción',
                        {
                            title: 'Error',
                            titleClass: 'anim error',
                            buttons: [{ id: 0, label: 'Cerrar', val: 'X' }]
                        }
                    );
                }
            }
        });

    });

    //Evento Cancelar Cita

    $(document).on('click', '.cancela-cita', function () {
        let elemento = this.parentElement.parentElement;
        idCita = $(elemento).attr('idCita');

        let datos = {
            accion: 'cancelaCita',
            id: idCita
        }

        $.ajax({
            type: "POST",
            url: "controlador.php",
            data: datos,
            dataType: "json",
            success: function (response) {
                if (response) {
                    var dialog = new Messi(
                        'Cita cancelada satisfactoriamente.',
                        {
                            title: 'Cita cancelada',
                            titleClass: 'anim info',
                            buttons: [{ id: 0, label: 'Aceptar', val: 'X' }]
                        }
                    );
                } else {
                    var dialog = new Messi(
                        'Error al intentar cancelar la cita',
                        {
                            title: 'Error',
                            titleClass: 'anim error',
                            buttons: [{ id: 0, label: 'Cerrar', val: 'X' }]
                        }
                    );
                }
                ListarCitascli();
            }
        });

    });
    //Evento ver mis citas

    $('.misCitas').click(function (e) {
        e.preventDefault();

        ListarCitascli();
    });

    //Funciones

    //Función Listar en Modal - Carrito

    function ListarCarrito() {
        datos = {
            accion: 'getCarrito'
        }

        $.ajax({
            type: "POST",
            url: "controlador.php",
            data: datos,
            dataType: "json",
            success: function (response) {
                let plantilla = '';


                if (response == '') {

                    plantilla = `

                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Carrito Vacío</h4>
                        <p>Tu carrito aún se encuentra vacío, te invitamos a var los servicios que <b>FRC</b> tiene a tu disposición, una vez selecciones una cita, esta se verá reflejada aquí ;) </p>
                        <hr>
                        <p class="mb-0"><strong>FRC: </strong>Functional and Rehabilitation Center</p>
                     </div>

                    `;

                } else {
                    response.forEach(cita => {

                        plantilla += `
                        <div class="card mt-3">
                            <div class="card-header">
                                ${cita.tipo} - ${cita.categoria}
                            </div>
                            <div class="card-body m-0" indexCarrito="${cita.idCarrito}">
                                <div class="mt-3">
    
                                    <div style="width: 40%">
                                        <h5 class="card-title">${cita.nomServicio}</h5>
                                        <p class="card-text" style="width: 669px;">${cita.desServicio}</p>
                                        <label class="card-text" for="fechaCita">Fecha de la sesión: ${cita.fechaCita}</label>
                                        <small class="form-text text-muted mb-2"><b>Costo por sesión: ₡</b>${cita.costoServicio}</small>
                                        <button type="button" class="btnCarritoElim btn btn-danger mb-3 mt-3 ml-0" >Eliminar del carrito</button>
                                    </div>
    
                                </div>
                            </div>
                        </div>                        
                        `
                    });
                }




                $('#ContenidoCarrito').html(plantilla);
            }
        });
    }


    //Listar Citas Usuario

    function ListarCitascli() {
        let datos = {
            accion: 'ListarCitasCli'
        }

        $.ajax({
            type: "POST",
            url: "controlador.php",
            data: datos,
            dataType: "json",
            success: function (response) {

                let plantilla = '';

                if (response.valido) {

                    var citas = response.citas;

                    citas.forEach(c => {
                        idServ = c.idServicio;

                        let datos = {
                            accion: 'getServicio',
                            id: idServ
                        }

                        $.ajax({
                            type: "POST",
                            url: "controlador.php",
                            data: datos,
                            dataType: "json",
                            success: function (servicio) {
                                plantilla += `
                                
                                
                                <tr idCita = "${c.idCita}">

                                <td>${c.idCita}</td>
                                <td>${servicio.nombre}</td>
                                <td>₡ ${servicio.costoxsesion}</td>
                                <td>${c.fechaCita}</td>

                                <td>
                                    <button class = "btn btn-danger btn-sm cancela-cita margin-auto">
                                    Cancelar
                                    </button>
                                </td>

                                

                                </tr>   
                                
                                
                                `;
                                $('#ListaArticulos').html(plantilla);

                            }
                        });

                    });




                } else {
                    plantilla = `
                    <div class="alert alert-warning" role="alert">
                        <h4 class="alert-heading">Aún no posees citas agendadas</h4>
                        <p>Accede a las pestaña servicios para ver todo lo que FRC tiene para tí.</p>
                    </div>
                    `;

                    $('#CitasCli').html(plantilla);
                }


            }
        });

    }

});