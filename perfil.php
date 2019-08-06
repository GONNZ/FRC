<?php
include './templates/head.php';
?>
    <title>Perfil</title>
    <script src='js/scripts/perfil.js' type="text/javascript"> </script>
</head>

<body>

<?php
include './templates/nav.php';
?>

    <div class="container  mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="img/opcionesIMG/peopletraining.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="container">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Añadir cita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <h3>Perfil de Usuario</h3>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto ex porro sunt hic dolore similique corrupti enim iste dicta mollitia excepturi nulla aliquid neque adipisci, earum quia facilis tenetur ut.</p>

                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <h3>Seleccion de Servicios</h3>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto ex porro sunt hic dolore similique corrupti enim iste dicta mollitia excepturi nulla aliquid neque adipisci, earum quia facilis tenetur ut.</p>

                        </div>

                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae excepturi deserunt veniam odio, ea reiciendis quia suscipit aspernatur doloremque enim laboriosam dicta debitis reprehenderit alias? Nisi accusantium perferendis voluptatibus enim.</div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php
    include './templates/footer.php';
    ?>