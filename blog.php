<?php
include './templates/head.php';
?>
<title>Blog</title>

</head>

<body>
    
    <!--Navegación-->

    <?php
    include './templates/nav.php';
    ?>

    <!-- Contenido principal Home-->

    <div>
        <h1 class="mt-5 mb-5" style=" margin: 20px 120px">Novedades y Comunidad FRC</h1>
    </div>


    <!--Noticia 1-->
    <div class="container articulo">
        <div class="card text-center ">
            <div class="card-header noticia2" style="text-align: end; color:lightblue">
                20/06/19
            </div>
            <div class="card-body fondoArt">


                <div class="row">
                    <div class="col-md-6">


                        <article>
                            <h2>Taller Ejercicios funcional para Poblaciones Especiales</h2>
                            <p>Felicitamos a los participantes de nuestro taller de ejercicios funcionales para la
                                población
                                especial por su constante capacitación.
                                Los esperamos en abril con nuestro nuevo taller Entrenamiento funcional para niños y
                                jóvenes.

                            </p>
                        </article>

                    </div>
                    <div class="col-md-6">

                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="img/titulostaller.jpg" class="d-block w-50 img-carousel" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/taller.jpg" class="d-block w-50 img-carousel" alt="...">
                                </div>

                            </div>
                            <a class="carousel-control-prev " href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="fas fa-backward" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next " href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="fas fa-forward" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>


            </div>
            <div class="card-footer text-muted noticia2">

            </div>
        </div>
    </div>

    <!--Noticia 2-->
    <div class="container articulo">
        <div class="card text-center ">
            <div class="card-header noticia2" style="text-align: end; color:lightblue">
                20/06/19
            </div>
            <div class="card-body fondoArt">

                <div class="row">
                    <div class="col-md-12" style="text-align: center">


                        <article>
                            <h2>Día Mundial contra el cáncer: Conciencia, Prevención y Control</h2>
                            <p>La Organización Mundial de la Salud, el Centro Internacional de Investigaciones sobre el
                                Cáncer
                                (CIIC) y la Unión Internacional Contra el Cáncer (UICC) celebran el 4 de febrero de cada
                                año
                                como el Día Mundial contra el Cáncer,1​ con el objetivo de aumentar la concienciación y
                                movilizar a la sociedad para avanzar en la prevención y control de esta enfermedad.
                                En este día recordamos la importancia del Terapeuta Físico en los procesos oncológicos.
                            </p>
                        </article>

                    </div>
                    <div class="col-md-5" style="margin: auto">
                        <img src="img/CancerDay.jpg" alt="Cancer Day" style="height: 200px; ">

                    </div>
                </div>

            </div>
            <div class="card-footer text-muted noticia2">

            </div>
        </div>
    </div>




    <!--Noticia 3-->


    <div class="container articulo">
        <div class="card text-center ">
            <div class="card-header noticia2" style="text-align: end; color:lightblue">
                20/06/19
            </div>
            <div class="card-body fondoArt">

                <div class="row">
                    <div class="col-md-7">


                        <article>
                            <h2>Capacitación: Rehabilitación Cardiaca</h2>
                            <p>
                                Para Functional and Rehabilitation Center (FRC) es un honor pertenecer a las primeras
                                ZONAS
                                CARDIO
                                SEGURAS del país, contamos con profesionales especialistas en rehabilitación cardiaca,
                                entrenamiento funcional y todo el sistema de asistencia para cualquier emergencia que
                                puedan
                                presentar
                                nuestros usuarios.
                                Gracias FUNICOR por el apoyo y confianza.
                            </p>
                        </article>

                    </div>
                    <div class="col-md-5">


                        <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="img/ZonaCArd.png" class="d-block w-50 img-carousel" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/desfibrilador.png" class="d-block w-50 img-carousel" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/monitoreocard.jpg" class="d-block w-50 img-carousel" alt="...">
                                </div>
                            </div>
                            <a class="carousel-control-prev " href="#carouselExampleControls2" role="button" data-slide="prev">
                                <span class="fas fa-backward" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next " href="#carouselExampleControls2" role="button" data-slide="next">
                                <span class="fas fa-forward" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer text-muted noticia2">

            </div>
        </div>
    </div>

    <?php
    include './templates/footer.php';
    ?>