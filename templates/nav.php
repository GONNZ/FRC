  <!--Navigation-->

  <?php
    if (isset($_SESSION)) {
        $rol = $_SESSION["datos-login"]["idRol"];
    } else {
        session_start();
        $rol = $_SESSION["datos-login"]["idRol"];
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
                  <li class="nav-item">
                      <a class="nav-link" href="perfil.php">Perfil</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Contáctos</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Acerca de</a>
                  </li>
                  <!-- Valida rol -->
                  <?php
                    if ($rol == 1) {
                        ?>
                      <li id="administrador" class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Administrador
                          </a>
                          <input type="hidden" id="rol" value="">
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="#">Mantenimiento Usuarios</a>

                              <a class="dropdown-item" href="#">Mantenimiento Servicios</a>

                              <a class="dropdown-item" href="#">Mantenimiento Citas</a>
                          </div>
                      </li>
                  <?php
                    }
                    ?>
                  <!-- Valida rol -->
                  <li class="nav-item">
                      <a class="nav-link" id="cerrar" href="#">Cerrar Sesión</a>
                  </li>
              </ul>
          </div>
      </nav>
  </div>