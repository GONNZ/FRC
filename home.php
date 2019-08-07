<?php
include './templates/head.php';
?>
<title>Home</title>
</head>

<body>




    <?php
    include './templates/nav.php';
    ?>

    <div class="container contenidop">

        <div class="row">


            <div class="col-xs-12 col-sm-4" style="margin: auto">
                <img src="img/FRCportada.png" alt="portadaFRC" style="height: 200px">

            </div>

            <div class="col-xs-12 col-sm-6 " style="text-align: center; padding-top: 30px">
                <h1>FRC</h1>
                <p>Clínica especializada en entrenamiento funcional para todo público, rehabilitación y terapia
                    ocupacional</p>
                <p>Contamos con los profesionales más capacitados e instalaciones adecuadas para dar la mejor atención
                    al cliente.</p>
            </div>
        </div>
    </div>

    <!--Contenido-->

    <div class="container-fluid pt-3">


        <div class="row">

            <div class="col-lg-6 card" style="width: 18rem; ">

                <img src="img/opcionesIMG/peopletraining.png" class="card-img-top pt-2" alt="Terapia Ocupacional" style="height: 400px; width: 630px; margin:auto">
                <div class="card-body" style="text-align: center">
                    <h5 class="card-title">Entrenamiento Funcional</h5>
                    <p class="card-text">
                        <b>Fija Objetivos</b>
                    </p>
                    <a href="#funcional" class="btn btn-outline-primary btn-lg">Obtener información</a>
                </div>
            </div>

            <div class="col-lg-6 card" style="width: 18rem; ">

                <img src="img/opcionesIMG/INOK_Services_Rehabilitation.jpg" class="card-img-top pt-2" alt="Terapia Ocupacional" style="height: 400px; width: 630px; margin:auto">
                <div class="card-body" style="text-align: center">
                    <h5 class="card-title">Rehabiitación / Terapia Ocupacional</h5>
                    <p class="card-text">
                        <b> Acompañamiento integral</b>
                    </p>
                    <a href="#terapia" class="btn btn-outline-success btn-lg">Rehabilitación</a>
                    <a href="#terapiaOC" class="btn btn-outline-warning btn-lg">Terapia Ocupacional</a>
                </div>
            </div>

            <!--Entrenamiento funcional-->
            <div class="container row" style="margin: auto;">
                <div class="col-md-12 mt-5">
                    <h1 class="pb-3" id="funcional">Entrenamiento Funcional</h1>

                    <p>
                        El entrenamiento funcional es una manera de trabajar el cuerpo donde todos los músculos se
                        involucran en la realización del ejercicio. No se basa en focalizar el esfuerzo y tensión en un
                        solo músculos, sino que la suma de ellos es la que dota de importancia este tipo de ejercicio.
                    </p>

                    <p>
                        En este tipo de entrenamiento también se incide en los músculos estabilizadores y el sentido de
                        la propiocepción, permitiendo aumentar el control sobre el propio cuerpo.
                    </p>

                    <p>
                        El entrenamiento funcional permite trabajar la musculatura del cuerpo de la misma manera que se
                        activa en un deporte determinado o en el día a día. De ahí que pueda adaptarse a todas las
                        personas y que entre los atletas de élite sea el pilar principal de sus entrenamientos, puesto
                        que esos movimientos son los que llevaran a cabo a la hora de competir.
                    </p>

                    <h2 class="ml-3"> <span class="badge badge-success p-3">Objetivos:</span></h2> <br>

                    <div class="card-deck col-12">
                        <div class="card border-primary mb-3 objetivos">
                            <div class="card-body">
                                <h5 class="card-title">Accesabilidad</h5>
                                <p class="card-text">
                                    Este entrenamiento se adapta a las necesidades de cada persona y el entrenamiento
                                    difiere dependiendo el deporte practicado o el objetivo buscado.
                                </p>
                            </div>
                        </div>
                        <div class="card border-primary mb-3 objetivos">
                            <div class="card-body">
                                <h5 class="card-title ">Ganarás fuerza específica</h5>
                                <p class="card-text">
                                    Con este tipo de entrenamiento ganarás fuerza y potencia, especialmente en los
                                    músculos más principales de tu deporte.
                                </p>
                            </div>
                        </div>
                        <div class="card border-primary mb-3 objetivos">
                            <div class="card-body">
                                <h5 class="card-title">Mejorará tu propiocepción</h5>
                                <p class="card-text">
                                    La propiocepción es la capacidad que tienen los músculos, ligamentos y
                                    articulaciones del cuerpo para adaptarse a cambios bruscos e inestables sin dañarse.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 card bg-light text-white">
                        <img src="img/opcionesIMG/banner.jpg" class="card-img mt-3 mb-3" alt="">
                        <div class="card-img-overlay">

                            <h5 class="card-title m-3">Entrenamiento Funcional</h5>
                            <p class="card-text ml-3">Basta de excusas, unete a FRC</p>

                            <a href="#" class="btn btn-outline-primary btn-lg ml-3">Ver Membresías</a>
                        </div>
                    </div>
                    <!--Fin de Ejercicio Funcional sección-->





                    <!--Rehabilitación / Terapia-->
                    <div class="container row" style="margin: auto;">
                        <div class="col-md-12 mt-5">
                            <h1 class="pb-3" id="terapia">Rehabilitación Física</h1>

                            <p>
                                <b>FRC Funtional y Rehabilitation Center</b>, cuenta con equipo y personal altamente
                                calificado para recuperar al máximo las capacidades del individuo que ha sufrido alguna
                                lesión o enfermedad y reincorporarlo a sus actividades de la vida diaria.
                            </p>



                            <!--Set de especialidades-->

                            <div class="m-3">
                                <h3 style="margin-bottom: 40px;margin-left: 12px;"> <b> FRC cuenta con sesiones de
                                        tratamiento para las siguientes ramas:
                                    </b> </h3>

                                <div class="card-deck col-12">
                                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                        <div class="card-header">Traumatología y ortopedia</div>
                                        <div class="card-body">
                                            <p class="card-text text-white">
                                                ▪ Dolor de cuello (cervicalgia).
                                            </p>
                                            <p class="card-text text-white">
                                                ▪ Dolor de espalda (dorsalgia o lumbalgia).
                                            </p>
                                            <p class="card-text text-white">
                                                ▪ Dolor y afecciones articulares hombro, muñeca, mano...
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card text-white mb-3" style="max-width: 18rem; background-color: darkgray">
                                        <div class="card-header">Reumatología</div>
                                        <div class="card-body">
                                            <p class="card-text text-white">
                                                ▪ Enfermedades por microcristales: Gota.
                                            </p>
                                            <p class="card-text text-white">
                                                ▪ Alteraciones asociadas a lupus eritematoso.
                                            </p>
                                            <p class="card-text text-white">
                                                ▪ Alteraciones vinculadas a la osteoporosis.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                        <div class="card-header">Deportiva</div>
                                        <div class="card-body">
                                            <p class="card-text text-white">
                                                ▪ Tendinosinovitis (inflamación en tendones).
                                            </p>
                                            <p class="card-text text-white">
                                                ▪ Esguinces (ruptura parcial o total de ligamentos).
                                            </p>
                                            <p class="card-text text-white">
                                                ▪ Desgarros (ruptura parcial o total de músculo).
                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <div class="card-deck col-12">
                                    <div class="card text-white mb-3" style="max-width: 18rem; background-color: darkgray">
                                        <div class="card-header">Rehabilitación neurológica</div>
                                        <div class="card-body">
                                            <p class="card-text text-white">
                                                ▪ Distrofias musculares.
                                            </p>
                                            <p class="card-text text-white">
                                                ▪ Problemas con el desarrollo del sistema nervioso (espina bífida por
                                                ejemplo).
                                            </p>
                                            <p class="card-text text-white">
                                                ▪ PCI (parálisis cerebral infantil).
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                        <div class="card-header">Geriatría</div>
                                        <div class="card-body">
                                            <p class="card-text text-white">
                                                ▪ Rehabilitación en trastornos neuromotores (afecciones de la marcha -
                                                pérdida de equilibrio por la edad)
                                            </p>
                                            <p class="card-text text-white">
                                                ▪ Rehabilitación funcional
                                            </p>
                                            <p class="card-text text-white">
                                                ▪ Rehabilitación y estimulación cognoscitiva
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card text-white mb-3" style="max-width: 18rem; background-color: darkgray">
                                        <div class="card-header">Pediatría</div>
                                        <div class="card-body">
                                            <p class="card-text text-white">
                                                ▪ Secuelas en enfermedades de los vasos sanguíneos que abastecen el
                                                cerebro.
                                            </p>
                                            <p class="card-text text-white">
                                                ▪ Alteraciones en postura.
                                            </p>
                                            <p class="card-text text-white">
                                                ▪ Alteraciones del pie (pie plano, pie equino, pie cavo).
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="col-md-12 card bg-light text-white">
                                <img src="img/opcionesIMG/fisio.jpg" class="card-img mt-3 mb-3" alt="">
                                <div class="card-img-overlay">
                                    <div style="text-align: end; color:rgb(34, 3, 3)">
                                        <h5 class="card-title m-3 mr-3 ">Terapia Física</h5>
                                        <p class="card-text mr-2">FRC los mejores para tu recuperación</p>
                                        <a href="#" class="btn btn-outline-primary btn-lg   posicion">Ver
                                            Membresías</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Fin Rehabilitación / Terapia sección-->


                    <!--Inicio de Terapia Ocupacional-->

                    <div class="container row" style="margin: auto;">
                        <div class="col-md-12 mt-5">
                            <h1 class="pb-3" id="terapiaOC">Terapia Ocupacional</h1>

                            <p>
                                <b>FRC Funtional y Rehabilitation Center</b>, cuenta con equipo y personal altamente
                                calificado para recuperar al máximo las capacidades del individuo que ha sufrido alguna
                                lesión o enfermedad y reincorporarlo a sus actividades de la vida diaria.
                            </p>

                            <div class="row">

                                <div class="col-md-4 card bg-light text-white">
                                    <img src="img/opcionesIMG/terapia.jpg" class="card-img mt-3 mb-3" alt="">
                                    <div class="card-img-overlay">
                                        <div style="color:white; position: relative; top: 360px;">
                                            <h5 class="card-title; ml-2">Terapia Ocupacional</h5>
                                            <p class="card-text ml-2"> <b>FRC</b> buscando la salud integral.</p>
                                            <a href="#" class="btn btn-outline-primary btn-lg posicion">Ver
                                                Membresías</a>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-8">

                                    <div class="jumbotron">
                                        <div class="container">
                                            <h3 class="display-6">¿Quiénes son los terapeutas ocupacionales?</h3>
                                            <p class="lead">
                                                La Organización Mundial de la Salud los define como quienes "ayudan a
                                                las personas a realizar las tareas cotidianas consiguiendo ser capaces
                                                de lograr la autorealización y pudiendo contribuir con la sociedad”.
                                            </p>
                                            <h3 class="display-6">¿Cómo interviene?</h3>
                                            <p class="lead">
                                                Los servicios que otorgan los terapeutas ocupacionales incluyen desde
                                                consultas, actividades motoras, estimulación, educación, promoción de la
                                                salud, hasta la intervención directa en la recuperación integral de la
                                                persona en su ámbito. Además, acompañan a la familia del paciente
                                                durante el proceso.
                                            </p>

                                            <ul class="list-group">

                                                <li class="list-group-item list-group-item-primary">Terapia Ocupacional
                                                    en Rehabilitación Integral</li>
                                                <li class="list-group-item list-group-item-primary">Terapia Ocupacional
                                                    en Salud Mental</li>
                                                <li class="list-group-item list-group-item-primary">Terapia Ocupacional
                                                    Neonatal y Pediatría</li>

                                            </ul>


                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>

                    <!--Fin de terapia ocupacional-->

                </div>
            </div>
        </div>
    </div>


    <?php
    include './templates/footer.php';
    ?>