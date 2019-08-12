<?php
include './templates/head.php';
?>
<script type="text/javascript" src="js/scripts/categorias.js"></script>
<title>Administración de categorías para Servicios</title>
</head>

<body>
    <?php
    include './templates/nav.php';
    ?>

    <div class="container">
        <div id="CategoriasMant" class="row">
            <div class="col-md-3 pt-3">
                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="display-5">Categorías</h3>
                    </div>
                    <div class="card-body">
                        <form id="frmCategoria">

                            <input type="hidden" id="idEdit">

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nombre categoría..." id="nomCat" required>
                            </div>

                            <div class="from-group mb-3">
                                <select class="form-control form-control-sm" id="idTipo" required>
                                    <option value="">Seleccione un tipo...</option>
                                    <option value="1">Funcional</option>
                                    <option value="2">Terapia Física</option>
                                    <option value="3">Terapia Ocupacional</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success btn-block text-center">
                                Guardar
                            </button>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-9 pt-3">
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
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