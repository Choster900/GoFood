<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoFood</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?=constant('URL')?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=constant('URL')?>public/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=constant('URL')?>public/css/design.css">
    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css"
  rel="stylesheet"
/>
</head>
<body class="restaurant-lp">

    <!--Navigation & Intro-->
    <header>

    <?php
    require_once 'views/navbar.php';
    ?>
    <!-- Inicio Pantalla modal -->
   
        <!-- Fin de pantalla modal -->

        <!-- Intro Section -->
        <div id="home" class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url(https://mdbootstrap.com/img/Photos/Others/images/42.jpg); background-repeat: no-repeat; background-size: cover; background-position: center center;">
            <div class="mask rgba-black-slight">
                <div class="container h-100 d-flex justify-content-center align-items-center">
                    <div class="row smooth-scroll">
                        <div class="col-md-12 dark-grey-text text-center">
                            <div class="wow fadeInDown" data-wow-delay="0.2s">
                                <h2 class="display-3 font-weight-bold mb-2">GoFood</h2>
                                <hr class="hr-dark">
                                <h4 class="subtext-header mt-2 mb-2">Una empresa que se preocupa por por nuestros clientes.</h4>
                                <h4 class="mb-5">Puedes hacer tus pedidos si costo de envio.</h4>
                            </div>
                            <a class="btn btn-deep-orange btn-rounded wow fadeInUp" href="#specials" data-wow-delay="0.5s">
                                <i class="fa fa-calendar mr-2"></i>
                                <span>BIENVENIDO</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <!--/Navigation & Intro-->

    <!--Main content-->
    <main>

        <!--First container-->
        <div class="container">

            <!--Section: About-->
            <section id="about" class="section about mt-3 mb-5">

                <!--Secion heading-->
                <div class="row mt-5 mb-4">
                    <div class="col-md-12 div-color-2">
                        <div class="divider-new">
                            <h3 class="text-center text-uppercase font-weight-bold mr-3 ml-3 wow fadeIn" data-wow-delay="0.2s">¿Quienes somos?</h3>
                        </div>
                    </div>
                    <!--First row-->

                    <div class="row mt-4">

                        <!--First column-->
                        <div class="col-lg-5 col-md-12 mb-3 wow fadeIn" data-wow-delay="0.4s">

                            <!--Image-->
                            <img src="https://mdbootstrap.com/img/Others/food2.jpg" alt="" class="z-depth-0 img-fluid">

                        </div>
                        <!--/First column-->

                        <!--Second column-->
                        <div class="col-lg-6 offset-lg-1 col-md-12 wow fadeIn" data-wow-delay="0.4s">

                            <!--Title-->
                            <h4 class="text-center mb-4">Somos un sepermercado online</h4>

                            <!--Description-->
                            <p class="grey-text mb-6 mr-3 ml-3" align="justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo animi soluta ratione quisquam,
                                dicta ab cupiditate iure eaque? Repellendus voluptatum, magni impedit eaque delectus, beatae
                                maxime temporibus maiores quibusdam quasi.Rem magnam ad perferendis iusto sint tempora ea
                                voluptatibus iure, animi excepturi modi aut possimus in hic molestias repellendus illo ullam
                                odit quia velit.</p>

                        </div>
                        <!--/Second column-->

                    </div>
                    <!--/First row-->

                </div>

            </section>
            <!--/Section: About-->

        </div>
        <!--/First container-->

        <!--Streak-->
        <div class="streak streak-photo streak-md" style="background-image: url('https://mdbootstrap.com/img/Others/food31.jpg');">
            <div class="flex-center mask rgba-black-strong">
                <div class="text-center white-text">
                    <h2 class="h2-responsive mb-5">
                        <i class="fa fa-quote-left" aria-hidden="true"></i> Una comida bien equilibrada es como un poema al desarrollo de la vida.
                        <i class="fa fa-quote-right" aria-hidden="true"></i>
                    </h2>
                    <h5 class="text-center font-italic">~ Anthony Burgess</h5>
                </div>
            </div>
        </div>
        <!--/Streak-->

        <!--Second container-->
        <div class="container">

            <!--Section: Menu intro-->
            <section id="intro" class="section mt-3 mb-4">

                <!--Section heading-->
                <div class="row mt-5 mb-4">
                    <div class="col-md-12 mb-3">
                        <div class="divider-new">
                            <h3 class="text-center text-uppercase font-weight-bold mr-3 ml-3 wow fadeIn" data-wow-delay="0.2s">Unete a nosotros</h3>
                        </div>
                    </div>
                </div>

                <!--First row-->
                <div class="row smooth-scroll">

                    <!--First column-->
                    <div class="col-lg-6 col-md-12 wow fadeIn" data-wow-delay="0.4s">

                        <!--Title-->
                        <h4 class="mb-4 text-center">Unete a nosotros y descubre grandes beneficios</h4>

                        <!--Description-->
                        <p class="grey-text mb-4" align="justify">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                            deleniti atque corrupti quos dolores et quas molstias excepturi sint occaecati cupiditate non
                            provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum
                            fuga.
                        </p>

                        <!--Menu button-->
                        <div class="text-center mb-2 mt-2">
                            <a href="<?=constant('URL')?>accounts/createCounts" data-offset="100" class="btn btn btn-outline-grey btn-rounded waves-effect">
                                <strong>Crear Cuenta</strong>
                            </a>
                        </div>

                    </div>
                    <!--/First column-->

                    <!--Second column-->
                    <div class="col-lg-5 ml-auto col-md-12 mb-5 wow fadeIn" data-wow-delay="0.4s">

                        <!--Image-->
                        <img src="https://mdbootstrap.com/img/Others/food.jpg" alt="" class="z-depth-0 img-fluid">

                    </div>
                    <!--/Second column-->

                </div>
                <!--/First row-->

            </section>
            <!--/Section: Menu intro-->

        </div>

        <hr class="between-sections">

        <!--Section: Products-->
        <div class="container">

            <section class="section" id="specials">

                <!--Secion heading-->
                <div class="row mt-5 mb-4">
                    <div class="col-md-12 div-color-2">
                        <div class="divider-new">
                            <h3 class="text-center text-uppercase font-weight-bold mr-3 ml-3 wow fadeIn" data-wow-delay="0.2s">Categorias</h3>
                        </div>
                    </div>

                    <p class="grey-text text-center ml-3 mr-3 mt-1 mb-5">Puedes encontrar tus producto por categorias tomado en cuenta tus necesitades para suministrar tu casa de forma que podamos ayudarte
                        .
                    </p>

                    <!--First row-->
                    <div class="row text-center mr-2 ml-2 mt-3">

                        <!--First column-->
                        <div class="col-lg-4 col-md-12 mb-4 wow fadeIn" data-wow-delay="0.4s">

                            <!--Card-->
                            <div class="card card-cascade wider">

                                <!--Card image-->
                                <div class="view overlay zoom">
                                    <img src="https://mejorconsalud.as.com/wp-content/uploads/2016/03/toallas-blancas-cama.jpg" class="img-fluid">
                                    <a href="<?=constant('URL')?>producto/higiene">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!--/Card image-->

                                <!--Card content-->
                                <div class="card-body text-center">
                                    <!--Title-->
                                    <h4 class="card-title">
                                        <strong>Higiene</strong>
                                    </h4>

                                </div>
                                <!--/.Card content-->

                            </div>
                            <!--/.Card-->

                        </div>
                        <!--/First column-->

                        <!--Second column-->
                        <div class="col-lg-4 col-md-6 mb-4 wow fadeIn" data-wow-delay="0.4s">

                            <!--Card-->
                            <div class="card card-cascade wider">

                                <!--Card image-->
                                <div class="view overlay zoom">
                                    <img src="https://www.cdc.gov/foodsafety/images/comms/features/GettyImages-1247930626-500px.jpg" class="img-fluid">
                                    <a href="<?=constant('URL')?>filtrado/FrutasVerduras">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!--/Card image-->

                                <!--Card content-->
                                <div class="card-body text-center">
                                    <!--Title-->
                                    <h4 class="card-title">
                                        <strong>Frutas y verduras</strong>
                                    </h4>

                                </div>
                                <!--/.Card content-->

                            </div>
                            <!--/.Card-->

                        </div>
                        <!--/Second column-->

                        <!--Third column-->
                        <div class="col-lg-4 col-md-6 mb-4 wow fadeIn" data-wow-delay="0.4s">

                            <!--Card-->
                            <div class="card card-cascade wider">

                                <!--Card image-->
                                <div class="view overlay zoom">
                                    <img src="https://muysaludable.sanitas.es/wp-content/uploads/2018/05/10_carne-roja.jpg  " class="img-fluid">
                                    <a href="<?=constant('URL')?>filtrado/Carnes">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!--/Card image-->

                                <!--Card content-->
                                <div class="card-body text-center">
                                    <!--Title-->
                                    <h4 class="card-title">
                                        <strong>Carnes y enbutidos</strong>
                                    </h4>

                                </div>
                                <!--/.Card content-->

                            </div>
                            <!--/.Card-->

                        </div>
                        <!--/Third column-->

                    </div>
                    <!--/First row-->
                    <div class="row text-center mr-2 ml-2 mt-3">

                        <!--First column-->
                        <div class="col-lg-4 col-md-12 mb-4 wow fadeIn" data-wow-delay="0.4s">

                            <!--Card-->
                            <div class="card card-cascade wider">

                                <!--Card image-->
                                <div class="view overlay zoom">
                                    <img src="https://transferencia.tec.mx/wp-content/uploads/2018/07/Frijol-antioxidante-web.png" class="img-fluid">
                                    <a href="<?=constant('URL')?>filtrado/GranosBasicos">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!--/Card image-->

                                <!--Card content-->
                                <div class="card-body text-center">
                                    <!--Title-->
                                    <h4 class="card-title">
                                        <strong>Granos basicos</strong>
                                    </h4>

                                </div>
                                <!--/.Card content-->

                            </div>
                            <!--/.Card-->

                        </div>
                        <!--/First column-->

                        <!--Second column-->
                        <div class="col-lg-4 col-md-6 mb-4 wow fadeIn" data-wow-delay="0.4s">

                            <!--Card-->
                            <div class="card card-cascade wider">

                                <!--Card image-->
                                <div class="view overlay zoom">
                                    <img src="https://i.blogs.es/7fc543/alcohol/1366_2000.jpg" class="img-fluid">
                                    <a href="<?=constant('URL')?>filtrado/Bebidas">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!--/Card image-->

                                <!--Card content-->
                                <div class="card-body text-center">
                                    <!--Title-->
                                    <h4 class="card-title">
                                        <strong>Bebidas</strong>
                                    </h4>

                                </div>
                                <!--/.Card content-->

                            </div>
                            <!--/.Card-->

                        </div>
                        <!--/Second column-->

                        <!--Third column-->
                        <div class="col-lg-4 col-md-6 mb-4 wow fadeIn" data-wow-delay="0.4s">

                            <!--Card-->
                            <div class="card card-cascade wider">

                                <!--Card image-->
                                <div class="view overlay zoom">
                                    <img src="https://www.definicionabc.com/wp-content/uploads/general/Variedad.jpg" class="img-fluid">
                                    <a href="<?=constant('URL')?>filtrado/Otros">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!--/Card image-->

                                <!--Card content-->
                                <div class="card-body text-center">
                                    <!--Title-->
                                    <h4 class="card-title">
                                        <strong>Otros</strong>
                                    </h4>

                                </div>
                                <!--/.Card content-->

                            </div>
                            <!--/.Card-->

                        </div>
                        <!--/Third column-->

                    </div>

                </div>

            </section>

        </div>
        <!--/Section: Products-->

       
    </main>
    <!--/Main content-->

    <!--Footer-->
    <?php
    require_once 'views/footer.php';
    ?>
    <!-- MDB -->
    <!--       _
       .__(.)< (MEOW)
        \___)   
 ~~~~~~~~~~~~~~~~~~-->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
></script>
    <script type="text/javascript" src="<?=constant('URL')?>public/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?=constant('URL')?>public/js/popper.min.js"></script>
    <script type="text/javascript" src="<?=constant('URL')?>public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=constant('URL')?>public/js/mdb.min.js"></script>
    <script src="<?=constant('URL')?>public/js/design.js"></script>
</body>
</html>