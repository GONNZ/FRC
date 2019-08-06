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
        <div class="jumbotron colorLogin">
          <div class="container">
            <h1 class="display-4 mb-5 text-white">FRC: Funtional y Rehabilitation Center</h1>
            <div class="row">

              <div class="col-md-6 center-block">
                <div class="card">
                  <div class="card-header">
                    <h4>Inicio de sesión</h4>
                  </div>
                  <form id="product-form" class="card-body">
                    <label>Nombre de usuario:</label>
                    <div class="form-group">
                      <input type="text" id="name" placeholder="Ingrese su nombre de usuario..." class="form-control">
                    </div>
                    <label>Contraseña:</label>
                    <div class="form-group">
                      <input type="password" name="" placeholder="Ingrese su contraseña..." class="form-control">
                    </div>
                    <input type="submit" value="Iniciar Sesión" class="btn btn-primary btn-block" id="btn">
                  </form>
                </div>
              </div>
              <div class="col-md-5 m-auto">
                <h5 class="text-white">Inicia sesión para acceder a FRC</h5>
                <p class="text-white" >Accede a todos nuestros servicios disponibles, foros e información acerca de FRC</p>
                <img src="img/FRCportada.png" alt="portadaFRC" style="height: 200px">
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="jumbotron colorLogin">
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


                  <form class="card-body">
                    <label>Nombre de usuario:</label>
                    <div class="form-group">
                      <input type="text" name="" placeholder="Ingrese su nombre de usuario..." class="form-control">
                    </div>

                    <label>Cédula:</label>
                    <div class="form-group">
                      <input type="text" name="" placeholder="Ingrese su número de cédula..." class="form-control">
                    </div>

                    <label>Nombre:</label>
                    <div class="form-group">
                      <input type="text" name="" placeholder="Ingrese su nombre..." class="form-control">
                    </div>

                    <label>Apellidos:</label>
                    <div class="form-group">
                      <input type="text" name="" placeholder="Ingrese sus apellidos..." class="form-control">
                    </div>

                    <label>Teléfono:</label>
                    <div class="form-group">
                      <input type="text" name="" placeholder="Ingrese su número de teléfono..." class="form-control">
                    </div>

                    <label>Email:</label>
                    <div class="form-group">
                      <input type="email" name="" placeholder="Ingrese su email..." class="form-control">
                    </div>

                    <label>Contraseña:</label>
                    <div class="form-group">
                      <input type="password" name="" placeholder="Ingrese su contraseña..." class="form-control">
                    </div>
                    <input type="submit" value="Registrar" class="btn btn-primary btn-block" id="btn">
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>

  </div>


  <?php
  include './templates/footer.php';
  ?>