$(function () {

    $(document).on('click', '#btnCitasAdm', function (e) {

        e.preventDefault();
        let valor = $('#idUsu').val();
        if (valor == '') {
            var dialog = new Messi(
                'Seleccione una opción válida para hacer la búsqueda',
                {
                    title: 'Error',
                    titleClass: 'anim error',
                    buttons: [{ id: 0, label: 'Cerrar', val: 'X' }]
                }
            );
        } else {
            let datos = {
                accion: 'admCitas',
                id: valor
            }

            $.ajax({
                type: "POST",
                url: "controlador.php",
                data: datos,
                dataType: "json",
                success: function (response) {

                    let citas = response.citas;
                    let plantilla = '';

                    plantilla = `
                    
                    <h3>Citas</h3>
                    <table class="table table-bordered text-center mt-2">
                        <thead>
                            <tr>
                                <th>ID Cita</th>
                                <th>ID Usuario</th>
                                <th>ID Servicio</th>
                                <th>Fecha</th>
                                <th>Cancelar</th>
                                <th>Facturar</th>
                            </tr>
                        </thead>
    
                        <tbody id="ListaArticulos">
                    
                    `;

                    citas.forEach(c => {

                        plantilla += `
                        
                            <tr idCita = "${c.idCita}" idServ = "${c.idServicio}">
    
                                <td>${c.idCita}</td>
                                <td>${c.idUsuario}</td>
                                <td>${c.idServicio}</td>
                                <td>${c.fechaCita}</td>
    
                                <td>
                                    <button class = "btn btn-danger btn-sm cancela-cita margin-auto">
                                    Cancelar
                                    </button>
                                </td>
                                <td>
                                    <button class = "btn btn-success btn-sm factura-cita margin-auto">
                                    Facturar
                                    </button>                    
                                </td>
                                
    
                            </tr>   
                        
                        `;
                    });

                    plantilla += `
                    
                        </tbody>
                    </table>
                    
                    `;



                    $('#tabla').html(plantilla);

                }
            });



        }
    });


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
                ListarCitasAdm();

            }
        });
    });

    $(document).on('click', '.factura-cita', function () {
        let elemento = this.parentElement.parentElement;
        idCita = $(elemento).attr('idCita');
        let datos = {
            accion: 'facCita',
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
                        'Cita enviada a facturación satisfactoriamente.',
                        {
                            title: 'Cita facturada',
                            titleClass: 'anim info',
                            buttons: [{ id: 0, label: 'Aceptar', val: 'X' }]
                        }
                    );
                } else {
                    var dialog = new Messi(
                        'Error al intentar facturar la cita',
                        {
                            title: 'Error',
                            titleClass: 'anim error',
                            buttons: [{ id: 0, label: 'Cerrar', val: 'X' }]
                        }
                    );
                }
                ListarCitasAdm();
            }
        });

        console.log(idCita);
    });

    ListarCitasAdm();
    function ListarCitasAdm() {

        let datos = {
            accion: 'CitasADM'
        }

        $.ajax({
            type: "POST",
            url: "controlador.php",
            data: datos,
            dataType: "json",
            success: function (response) {
                plantilla = "";
                citas = response.citas;
                if (response.valido) {

                    plantilla += `
                    <!-- Buscador -->
                    <div style="margin-top: 10px; margin-bottom: 20px">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Buscador de Citas</h5>

                                <!-- Form -->
                                <form id="frmCitasadm">
                                    <div class="form-row align-items-center">
                                        <div class="col-auto">
                                            <select class="form-control form-control" id="idUsu" required>
                                                <option value="">Seleccione un usuario...</option>
                                                <option value="*">Filtrar todas</option>
                    `;

                    citas.forEach(c => {
                        plantilla += `
                        <option value="${c.idUsuario}">${c.idUsuario}</option>
                        `;
                    });

                    plantilla += `
                                        </select>
                                        </div>

                                        <div class="col-auto">
                                            <button type="submit" id="btnCitasAdm" class="btn btn-outline-success btn-sm mb-2 ml-6">Buscar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    `;

                    $('#AdmCitas').html(plantilla);

                } else {
                    plantilla += `
                    
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">No hay citas pendientes</h4>
                        <hr>
                        <p>En este momento no hay citas de clientes pendientes</p>
                    </div>
                    
                    `;
                    $('#AdmCitas').html(plantilla);

                }

                $('#tabla').html('');
            }
        });

    }


});