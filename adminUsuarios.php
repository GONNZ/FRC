<?php
include './templates/head.php';
?>
<script type="text/javascript" src="js/scripts/app.js"></script>
<title>Administración de usuarios</title>
</head>

<body>

    <?php
    include './templates/nav.php';
    ?>


    <div class="container">
        <div id="UsuariosMant" class="row">
            <div class="col-md-3 pt-3">
                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="display-5">Usuarios</h3>
                    </div>
                    <div class="card-body">
                        <form id="frmUsuarios">

                            <input type="hidden" id="idEdit">

                            <div class="form-group">
                                <!-- <label for="cedula">Cédula:</label> -->
                                <input type="text" class="form-control" placeholder="Cédula..." id="cedula" required>
                            </div>

                            <div class="form-group">
                                <!--   <label for="nombre">Nombre:</label> -->
                                <input type="text" class="form-control" placeholder="Nombre..." id="nombre" required>
                            </div>

                            <div class="form-group">
                                <!--  <label for="apellidos">Apellidos:</label> -->
                                <input type="text" class="form-control" placeholder="Apellidos..." id="apellidos" required>
                            </div>

                            <div class="form-group">
                                <!-- <label for="nombreUsuario">Nombre de usuario:</label> -->
                                <input type="text" class="form-control" placeholder="Nombre de usuario..." id="nombreUsuario" required>
                            </div>

                            <div class="form-group">
                                <!-- <label for="telefono">Teléfono:</label> -->
                                <input type="text" class="form-control" placeholder="Número telefónico..." id="telefono" required>
                            </div>

                            <div class="form-group">
                                <!--  <label for="email">Email:</label> -->
                                <input type="email" class="form-control" placeholder="Email..." id="email" required>
                            </div>

                            <div class="from-group mb-3">
                                <!-- <label for="idRol">Rol de usuario:</label> -->
                                <select class="form-control form-control-sm" id="idRol" required>
                                    <option value="0">Seleccione un rol...</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Cliente</option>
                                </select>
                            </div>



                            <div class="form-group">
                                <!-- <label for="contrasena">Contraseña:</label> -->
                                <input type="password" class="form-control" placeholder="Contraseña..." id="contrasena" required>
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
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Rol</th>
                            <th>Eliminar</th>
                            <th>Editar</th>
                        </tr>
                    </thead>

                    <tbody id="ListaUsuarios">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php
    include './templates/footer.php';
    ?>