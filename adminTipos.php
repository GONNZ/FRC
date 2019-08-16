<?php
include './templates/head.php';
?>
<script type="text/javascript" src="js/scripts/tipos.js"></script>
<title>Administración de tipos de Servicios</title>
</head>

<body>

    <?php
    include './templates/nav.php';
    ?>




    <div class="container">
        <div id="TiposMant" class="row">
            <div class="col-md-5 pt-3">
                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="display-5">Tipos de Servicio</h3>
                    </div>
                    <div class="card-body">
                        <form id="frmTipos">

                            <input type="hidden" id="idEdit">

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Tipo..." id="nomTipo" required>
                            </div>

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