<?php
include './templates/head.php';
?>
<title>Login</title>
<script src='js/scripts/login.js' type="text/javascript"> </script>

</head>

<body>
  <!--NAV login-->
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand brand-font" href="#">FRC</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    </nav>
  </div>


  <div class="container">

    <div class="row pt-5">


      <div class="col-12 mb-4 ">
        <div class="jumbotron bg-primary">
          <div class="container">
            <h1 class="display-4 mb-5 text-white">FRC: Funtional y Rehabilitation Center</h1>
            <div class="row">

              <div class="col-md-6 center-block" style="margin-top: 55px">
                <div class="card">
                  <div class="card-header">
                    <h4>Inicio de sesión</h4>
                  </div>
                  <!-- Form Login -->
                  <form id="loginForm" class="card-body">
                    <label>Nombre de usuario:</label>
                    <div class="form-group">
                      <input type="text" id="nomUsuario" placeholder="Ingrese su nombre de usuario..." class="form-control" required>
                    </div>
                    <label>Contraseña:</label>
                    <div class="form-group">
                      <input type="password" id="contra" placeholder="Ingrese su contraseña..." class="form-control" required>
                    </div>
                    <button type="submit" id="btnLogin" class="btn btn-success btn-block">
                      Iniciar Sesión
                    </button>
                  </form>
                  <!--  -->
                </div>
              </div>
              <div class="col-md-5 m-auto">
                <h5 class="text-white">Inicia sesión para acceder a FRC</h5>
                <p class="text-white">Accede a todos nuestros servicios disponibles, foros e información acerca de FRC</p>
                <div style="border: 1px solid black">
                  <img src="img/FRCportada.png" alt="portadaFRC" style="height: 269px">
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="jumbotron bg-primary">
          <div class="container">
            <div class="row">
              <div class="col-md-6 m-auto">
                <h3 class="display-4 mb-5 text-white">Registro</h3>
                <h5 class="text-white">¿Aún no te has registrado?</h5>
                <p class="text-white">Crea tu cuenta ahora mismo y únete a la familia FRC</p>
                <p class="text-white">Es totalmente gratis, ingresa y mira lo que FRC tiene para tí</p>

                <div class="mb-2">
                  <img src="img/opcionesIMG/Ready.jpg" alt="..." style="height: 200px; border: 2px solid black">
                </div>

                <div class="mb-2">
                  <img src="img/opcionesIMG/Gym2.webp" alt="..." style="height: 202px; border: 2px solid black">
                </div>



              </div>

              <div class="col-md-6 center-block">
                <div class="card">
                  <div class="card-header">
                    <h4>Ingresa tus datos</h4>
                  </div>



                  <form id="RegistroForm" class="card-body">
                    <label>Nombre de usuario:</label>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Nombre de usuario..." id="nombreUsuario" required>
                    </div>

                    <label>Cédula:</label>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Cédula..." id="cedula" required>
                    </div>

                    <label>Nombre:</label>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Nombre..." id="nombre" required>
                    </div>

                    <label>Apellidos:</label>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Apellidos..." id="apellidos" required>
                    </div>

                    <label>Teléfono:</label>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Número telefónico..." id="telefono" required>
                    </div>

                    <label>Email:</label>
                    <div class="form-group">
                      <input type="email" class="form-control" placeholder="Email..." id="email" required>
                    </div>

                    <label>Contraseña:</label>
                    <div class="form-group">
                      <input type="password" id="contraRegistro" placeholder="Ingrese su contraseña..." class="form-control" required>
                    </div>



                    <button type="submit" class="btn btn-success btn-block" id="btnRegistro">
                      Registrar
                    </button>

                  </form>



                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>

  </div>


  <!-- Footer -->
  <footer class="page-footer font-small bg-primary mt-5">


    <div class="container">
      <!-- Grid row-->
      <hr class="rgba-white-light" style="margin: 0 15%;">

      <!-- Grid row-->
      <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">

        <!-- Grid column -->
        <div class="col-md-8 col-12 mt-5">
          <p style="line-height: 1.7rem">FRC clínica de rehabilitación, ejercicio funcional y terapia ocupacional.</p>
          <p style="line-height: 1.7rem">Ubicados en Escazú, Santa Ana contamos con el personal y equipo adecuado para brindar un servicio de calidad bajo los estándares que sólo <b>FRC</b> puede brindar</p>
        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->
      <hr class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">
      <!-- Grid row-->
      <div class="row pb-3">
        <!-- Grid column -->
        <div class="col-md-12">
          <div class="mb-5 flex-center">
            <!-- Facebook -->
            <a href="https://es-la.facebook.com/FunctionalAndRehabilitationCenter/" class="fb-ic">
              <i class="fab fa-facebook-f fa-lg white-text mr-4"> </i>
            </a>
            <!--Linkedin -->
            <a class="li-ic">
              <i class="fab fa-linkedin-in fa-lg white-text mr-4"> </i>
            </a>
            <!--Instagram-->
            <a class="ins-ic">
              <i class="fab fa-instagram fa-lg white-text mr-4"> </i>
            </a>
          </div>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2019 Copyright
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->




  <!--Boostrap-->

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!--MD Boostrap
<script type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.5/js/mdb.min.js"></script>
-->
</body>

</html>