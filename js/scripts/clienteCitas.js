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
                            console.log(servicios);


                            servicios.forEach(serv => {
                                plantilla += `
                                <div class="card mt-3">
                                    <div class="card-header">
                                        ${tipo.nomTipo} - ${tipo.tipo.categoria}
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">${serv.nombre}</h5>
                                        <p class="card-text">${serv.descripcion}</p>
                                        <small class="form-text text-muted"><b>Costo por sesión: </b>${serv.costoxsesion}</small>
                                        <a href="#" class="btn btn-success mb-3 mt-3">Agregar a carrito</a>
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

});