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
    <?php
    require_once 'views/navbar.php';
    ?>
    <!-- Intro Section -->

    <!--Main content-->
    <main>
        <div class="container">

            <section class="section" id="specials">

                <!--Secion heading-->
                <div class="row mt-5 mb-4">
                    <div class="col-md-12 div-color-2">
                        <div class="divider-new">
                            <h3 class="text-center text-uppercase font-weight-bold mr-3 ml-3 wow fadeIn"
                                data-wow-delay="0.2s">ADMINISTRAR PAGINA</h3>
                        </div>
                    </div>
                    <p class="grey-text text-center ml-3 mr-3 mt-1 mb-5">
                        Puedes Administrar la pagina con las tarjetas que ya se encuentran,
                        todo cambio sera permanente, consulta antes de realizar una accion al grupo de Sis11A
                    </p>
                    <div class="row text-center mr-2 ml-2 mt-3">
                    <!--/First column-->
                        <div class="col-lg-4 col-md-12 mb-4 wow fadeIn" data-wow-delay="0.4s">
                            <div class="card card-cascade wider">
                                <!--Card image-->
                                <div class="view overlay zoom">
                                    <img src="https://assets.entrepreneur.com/content/3x2/2000/20170721161320-growth.jpeg"
                                        class="img-fluid" width="500px" height="500px">
                                    <?php
                                        if ($_SESSION['rol']==3) {
                                    ?>
                                    <a href="<?=constant('URL')?>producto/index">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                    <?php
                                        }else if($_SESSION['rol']==2){
                                    ?>
                                    <a href="<?=constant('URL')?>producto/index">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                    <?php
                                        }else{

                                        }
                                    ?>
                                    
                                </div>
                                <!--/Card image-->
                                <!--Card content-->
                                <div class="card-body text-center">
                                    <!--Title-->
                                    <h4 class="card-title">
                                        <strong>Producto</strong>
                                    </h4>
                                    <div class="dropdown">
                                    </div>
                                </div>
                                <!--/.Card content-->
                            </div>
                            <!--/.Card-->
                        </div> 
                    <!--Second column-->
                        <div class="col-lg-4 col-md-6 mb-4 wow fadeIn" data-wow-delay="0.4s">

                            <!--Card-->
                            <div class="card card-cascade wider">

                                <!--Card image-->
                                <div class="view overlay zoom">
                                    <img src="https://i.pinimg.com/736x/74/17/37/741737711c8909bc6a066422ab789a4d.jpg"
                                        class="img-fluid"  width="500px" height="500px">
                                    <?php
                                        if ($_SESSION['rol']==3) {
                                    ?>
                                    <a href="<?=constant('URL')?>reports/fecha">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                    <?php
                                        }else if($_SESSION['rol']==2){
                                    ?>
                                    <a href="<?=constant('URL')?>reports/fecha">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                    <?php
                                        }
                                    ?>
                                        
                                </div>
                                <!--/Card image-->
                                <!--Card content-->
                                <div class="card-body text-center">
                                    <!--Title-->
                                    <h4 class="card-title">
                                        <strong>Reportes</strong>
                                    </h4>
                                </div>
                                <!--/.Card content-->

                            </div>
                            <!--/.Card-->

                        </div>
                    <!--Third column-->
                        <div class="col-lg-4 col-md-6 mb-4 wow fadeIn" data-wow-delay="0.4s">

                            <!--Card-->
                            <div class="card card-cascade wider">

                                <!--Card image-->
                                <div class="view overlay zoom">
                                    <img src="https://atsgestion.net/wp-content/uploads/2019/12/imageedit_7_6937650249.jpg"
                                        class="img-fluid"  width="500px" height="500px">
                                    <?php
                                        if ($_SESSION['rol']==2) {
                                    ?>
                                    <a href="<?=constant('URL')?>orders/pedidos">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                    <?php
                                        }else if($_SESSION['rol']==3){
                                    ?>
                                    <a href="<?=constant('URL')?>orders/pedidos">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                    <?php       
                                        }else{

                                        }
                                    ?>
                                    
                                    
                                </div>
                                <!--/Card image-->

                                <!--Card content-->
                                <div class="card-body text-center">
                                    <!--Title-->
                                    <h4 class="card-title">
                                        <strong>Pedidos</strong>
                                    </h4>
                                </div>
                                <!--/.Card content-->

                            </div>
                            <!--/.Card-->

                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <!--/First row-->
                    <!--second row-->
                

                </div>
                <?php
                    if ($_SESSION['rol']==3) {
                        # code...
                    
                ?>
                <!-- segunfa fila -->
                <div class="row mt-5 mb-4">
                   
                    <div class="row text-center mr-2 ml-2 mt-3">
                    <!--/First column-->
                        <div class="col-lg-4 col-md-12 mb-4 wow fadeIn" data-wow-delay="0.4s">
                            <div class="card card-cascade wider">
                                <!--Card image-->
                                <div class="view overlay zoom">
                                    <img src="https://cdn-3.expansion.mx/dims4/default/e2ea14f/2147483647/strip/true/crop/1254x836+0+0/resize/1800x1200!/quality/90/?url=https%3A%2F%2Fcdn-3.expansion.mx%2F6e%2Ff0%2F574d0d41493c81052884f641004a%2Fistock-981896838.jpg"
                                        class="img-fluid" width="500px" height="500px">
                                    <?php
                                        if ($_SESSION['rol']==3) {
                                    ?>
                                    <a href="<?=constant('URL')?>empleado/administracion">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                    <?php
                                        }else{
                                    ?>
                                      
                                    <?php
                                        }
                                    ?>
                                    

                                </div>
                                <!--/Card image-->
                                <!--Card content-->
                                <div class="card-body text-center">
                                    <!--Title-->
                                    <h4 class="card-title">
                                        <strong>CLIENTES/EMPLEADOS</strong>
                                    </h4>
                                    <div class="dropdown">
                                    </div>
                                </div>
                                <!--/.Card content-->
                            </div>
                            <!--/.Card-->
                        </div> 
                    <!--Second column-->
                        <div class="col-lg-4 col-md-6 mb-4 wow fadeIn" data-wow-delay="0.4s">

                            <!--Card-->
                            <div class="card card-cascade wider">

                                <!--Card image-->
                                <div class="view overlay zoom">
                                    <img src="https://conceptodefinicion.de/wp-content/uploads/2019/08/estadistica.jpg"
                                        class="img-fluid"  width="500px" height="500px">
                                        <a href="<?=constant('URL')?>grafico/Ventas">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!--/Card image-->
                                <!--Card content-->
                                <div class="card-body text-center">
                                    <!--Title-->
                                    <h4 class="card-title">
                                        <strong>Estadisticas</strong>
                                    </h4>
                                </div>
                                <!--/.Card content-->

                            </div>
                            <!--/.Card-->

                        </div>
                    <!--Third column-->
                        <div class="col-lg-4 col-md-6 mb-4 wow fadeIn" data-wow-delay="0.4s">

                            <!--Card-->
                            <div class="card card-cascade wider">

                                <!--Card image-->
                                <div class="view overlay zoom">
                                    <img src="https://imgresizer.eurosport.com/unsafe/1200x0/filters:format(jpeg)/origin-imgresizer.eurosport.com/2020/08/24/2869243-59130868-2560-1440.jpg"
                                        class="img-fluid"  width="500px" height="500px">
                                    <a href="#">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!--/Card image-->

                                <!--Card content-->
                                <div class="card-body text-center">
                                    <!--Title-->
                                    <h4 class="card-title">
                                        <strong>...</strong>
                                    </h4>
                                </div>
                                <!--/.Card content-->

                            </div>
                            <!--/.Card-->

                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <!--/First row-->
                    <!--second row-->
                

                </div>
                <?php
                    }else{
                        
                    }
                ?>
            </section>

        </div>
    </main>

    <?php
    require_once 'views/footer.php';
    ?>

    <script type="text/javascript" src="<?=constant('URL')?>public/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?=constant('URL')?>public/js/popper.min.js"></script>
    <script type="text/javascript" src="<?=constant('URL')?>public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=constant('URL')?>public/js/mdb.min.js"></script>
    <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
></script>
    <script src="<?=constant('URL')?>public/js/design.js"></script>
</body>

</html>