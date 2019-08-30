  <!--Navigation-->

  <?php
    if (isset($_SESSION)) {
        $rol = $_SESSION["datos-login"]["idRol"];
    } else {
        session_start();
        if (isset($_SESSION['datos-login'])) {
            $rol = $_SESSION["datos-login"]["idRol"];
        } else {
            header("Location:index.php");
        }
    }
    ?>

  <div>
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <a class="navbar-brand brand-font" href="home.php">FRC</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse items-menu" id="navbarColor01">
              <ul class="navbar-nav mr-auto">
                  <?php
                    if ($rol == 1) {
                        ?>

                      <li class="nav-item">
                          <a class="nav-link" href="perfil.php">Citas</a>
                      </li>
                  <?php
                    } else {
                        ?>
                      <li class="nav-item">
                          <a class="nav-link" href="perfil.php">Servicios</a>
                      </li>


                  <?php
                    }
                    ?>
             

                  <?php
                    if ($rol == 1) {
                        ?>
                      <li id="administrador" class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Administrador
                          </a>
                          <input type="hidden" id="rol" value="">
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                              <a class="dropdown-item" href="adminUsuarios.php">Mantenimiento Usuarios</a>

                              <a class="dropdown-item" href="adminTipos.php">Mantenimiento Tipos de Servicios</a>

                              <a class="dropdown-item" href="adminCategorias.php">Mantenimiento Categorías</a>

                              <a class="dropdown-item" href="adminServicios.php">Mantenimiento Servicios</a>

                          </div>
                      </li>
                  <?php
                    }
                    ?>

                  <li class="nav-item">
                      <a class="nav-link" id="cerrar" href="#">Cerrar Sesión</a>
                  </li>
              </ul>
          </div>
      </nav>
  </div>