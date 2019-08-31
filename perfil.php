<?php
include './templates/head.php';
session_start();
$nombre = $_SESSION["datos-login"]["nombre"] . " " . $_SESSION["datos-login"]["apellidos"];
$rol = $_SESSION["datos-login"]["idRol"];
$user = $_SESSION["datos-login"]["nombreUsuario"];
$email = $_SESSION["datos-login"]["email"];
$telefono = $_SESSION["datos-login"]["telefono"];

include './Clases/ClaseTipos.php';
include './Clases/ClaseCita.php';
$ClaseTipos = new ClaseTipos();
$Cita = new ClaseCitas();
$tipos = $ClaseTipos->ListarTipos();
$citas =  $Cita->UsuariosCitas();


//$rol = $_SESSION["datos-login"]["Rol"];
?>
<title>Perfil</title>
</head>

<body>

    <?php
    include './templates/nav.php';
    ?>



    <?php
    if ($rol == 2) {
        ?>
        <script src='js/scripts/clienteCitas.js' type="text/javascript"> </script>
        <div class="container  mt-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="img/opcionesIMG/peopletraining.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> <?php echo $nombre ?> </h5>
                            <p class="card-text">Bienvenido a tu sección <b>FRC</b> personal.</p>
                            <p class="card-text">Dentro de este apartado, tendrás acceso a todos los servicios que tenemos disponibles para vos.</p>
                            <h5 class="card-title"> Datos personales: </h5>
                            <p class="card-text">

                                <b>Nombre de usuario: </b><?php echo $user ?><br>
                                <b>Email: </b><?php echo $email ?><br>
                                <b>Teléfono: </b><?php echo $telefono ?><br>

                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="container">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Servicios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link misCitas" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Mis citas</a>
                            </li>

                            <li class="nav-item" style="position: relative;left: 436px;">

                                <!-- Button modal -->
                                <button id="btnCarrito" type="button" class="btn btn-success btn-sm mb-2 ml-6" data-toggle="modal" data-target="#exampleModalScrollable">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">Carrito <i class="fas fa-shopping-cart"></i></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Contenido Carrito -->
                                                <div id="ContenidoCarrito"> </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                <button type="button" id="confirmaCarrito" class="btn btn-primary">Confirmar Carrito</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </li>


                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                                <!-- Buscador -->
                                <div style="margin-top: 10px; margin-bottom: 20px">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Buscador de Servicios</h5>

                                            <!-- Form -->
                                            <form id="frmServiciosCli">
                                                <div class="form-row align-items-center">
                                                    <div class="col-auto">
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
                                                    <div id="divCate" class="col-auto mt-3">

                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="submit" id="btnServiciosCli" class="btn btn-outline-success btn-sm mb-2 ml-6">Buscar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div>



                                </div>

                                <div id="Resultados"></div>

                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div id="CitasCli">
                                    <h3>Citas</h3>
                                    <table class="table table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th>ID Cita</th>
                                                <th>Servicio</th>
                                                <th>Costo</th>
                                                <th>Fecha</th>
                                                <th>Cancelar</th>
                                            </tr>
                                        </thead>

                                        <tbody id="ListaArticulos">

                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    } else {
        ?>
        <script src='js/scripts/admCitas.js' type="text/javascript"> </script>
        <div class="container  mt-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="img/FRCportada.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> Administración </h5>
                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias dolorem tempore sunt quia obcaecati. Perferendis magni distinctio nobis quidem. Doloremque veritatis voluptatem saepe nisi quos, voluptates omnis eaque aliquid animi!.</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="container">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Citas de clientes</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane active fade show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div id="AdmCitas">
                                    
                                   
                                </div>
                                <div id="tabla"></div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>


    <?php
    }
    ?>

    <?php
    include './templates/footer.php';
    ?>