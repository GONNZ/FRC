<?php
include './templates/head.php';
include './Clases/ClaseTipos.php';
$ClaseTipos = new ClaseTipos();
$tipos = $ClaseTipos->ListarTipos();
?>
<script type="text/javascript" src="js/scripts/servicios.js"></script>
<title>Mantenimiento de Servicios</title>
</head>

<body>

    <?php
    include './templates/nav.php';
    ?>


    <div class="container">
        <div id="ServiciosMant" class="row">
            <div class="col-md-5 pt-3">
                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="display-5">Servicios</h3>
                    </div>
                    <div class="card-body">
                        <form id="frmServicios">

                            <input type="hidden" id="idEdit">



                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nombre de servicio..." id="nomServ" required>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Descripción..."></textarea>
                            </div>

                            <div class="form-group">
                                <input type="number" step="0.01" class="form-control" placeholder="Costo por sesión..." id="nomServ" required>
                            </div>

                            <div class="from-group mb-3">
                                <select class="form-control form-control" id="idTipo" required>
                                    <option value="">Seleccione un tipo...</option>
                                    <?php
                                    foreach ($tipos['tipos'] as $tipo) {
                                        ?>
                                    <option value="<?php echo $tipo['idTipo'] ?>"><?php echo $tipo['tipo'] ?></option>

                                    <?php     }
                                    ?>
                                </select>
                            </div>

                            <div id="divCate"> </div>

                            <button type="submit" class="btn btn-success btn-block text-center">
                                Guardar
                            </button>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-7 pt-3" style="text-align: center;">
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Eliminar</th>
                            <th>Editar</th>
                        </tr>
                    </thead>

                    <tbody id="ListaArticulos">

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <?php
    include './templates/footer.php';
    ?>